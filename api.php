
<?php
$link = mysqli_connect("wormy2.mysql.tools", "wormy2_testcats", "@4H8S2x)cl", "wormy2_testcats");

if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    // print("MYSQL окей");
	mysqli_set_charset($link, "utf8");
}

$listdbtables = array_column(mysqli_fetch_all($link->query('SHOW TABLES')),0);

// var_dump($listdbtables);

$query ="SELECT * FROM cat_list ORDER BY `id` ASC";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк

	// echo '<div>Количество строк из базы: <b>'.$rows.'</b>';

echo '[';

    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);

        // echo '<div class="kitten kitten_id_'.$row[0].'" id="'.$row[0].'">';
		
		echo '{';
		echo "\n";

		$c_b_date = $row[2];
		$d_now = new DateTime('now');

		$c_d_interval = $d_now->diff( new DateTime($c_b_date) );
		$c_age = $c_d_interval->format('%y');

			echo '"catphoto":"'.$row[5].'",'; // Фотка котана
			echo "\n";
			echo '"catname":"'.$row[1].'",'; // Имя котана
			echo "\n";
			echo '"catbirth":"'.$row[2].'",'; // Дата рождения котана
			echo "\n";
			echo '"catweight":'.$row[3].','; // Вес котана
			echo "\n";
			echo '"catabout":"'.$row[4].'",'; // Описание котана
			echo "\n";
			echo '"catage":'.$c_age.','; // Возраст котана
			echo "\n";
			echo '"id":'.$row[0]; // ID
			echo "\n";

		echo "},";
		echo "\n";
    }

	echo ']';
	echo "\n";

    // очищаем результат
    mysqli_free_result($result);
}
mysqli_close($link);

?>
<!doctype html>
<html class="export" lang="ru">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta property=og:image content="https://www.atonua.com/wp-content/uploads/2019/11/aton_square_ava.jpg"/>
		<link rel="shortcut icon" href="https://www.atonua.com/wp-content/uploads/2019/11/aton_square_ava.jpg" type="image/png">
		<meta name="description" content="">
		<title>CATS</title>
		<link rel="stylesheet" href="normalize.css">
		<link rel="stylesheet" href="cats.css">

		<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>

		<script src="//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
		<link href="//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css" type="text/css" rel="stylesheet" />

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.contextMenu.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.contextMenu.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.ui.position.js"></script>

		<script src="js/main.js"></script>

	</head>

	<body class="">

		<div class="button-group sort-by-button-group">
		  <button class="button" data-sort-value="kitten_name">Имя</button>
		  <!-- <button class="button" data-sort-value="kitten_birth">Дата рождения</button> -->
		  <button class="button" data-sort-value="kitten_weight">Вес</button>
		  <button class="button" data-sort-value="kitten_age">Возраст</button>
		  <button class="button" data-sort-value="kitten_id">id</button>
		  <button class="button is-checked" data-sort-value="original-order">По умурчанию</button>
		  <!-- <button class="button" data-sort-value="kitten_number">Номер</button> -->
		</div>

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

	echo '<div id="kittens">';

    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);

        echo '<div class="kitten kitten_id_'.$row[0].'" id="'.$row[0].'">';

		$c_b_date = $row[2];
		$d_now = new DateTime('now');

		$c_d_interval = $d_now->diff( new DateTime($c_b_date) );
		$c_age = $c_d_interval->format('%y');

			echo '<a href="#" data-featherlight="cats/'.$row[5].'"><img src="cats/'.$row[5].'"></a>'; // Фотка котана
			echo '<div class="kitten_name">'.$row[1].'</div>'; // Имя котана
			echo '<div class="kitten_birth">'.$row[2].'</div>'; // Дата рождения котана
			echo '<div class="kitten_weight">'.$row[3].'</div>'; // Вес котана
			echo '<div class="kitten_about">'.$row[4].'</div>'; // Описание котана
			echo '<div class="kitten_age">'.$c_age.'</div>'; // Возраст котана
			echo '<div class="kitten_id">'.$row[0].'</div>'; // ID

        echo "</div>";
    }

	echo '</div>';

    // очищаем результат
    mysqli_free_result($result);
}
mysqli_close($link);

?>

<hr>

<div>
	<a href="u.php" data-featherlight="u.php" class="add_button">Добавление котана</a>
</div>

<hr>

<div class="php_learn">

	<?php echo $_SERVER['REMOTE_ADDR']; ?>
	</br>
	<?php echo $_SERVER['SERVER_ADDR']; ?>
	</br>
	<?php echo 'Текущая версия PHP: ' . phpversion(); ?>
	</br>
	

</div>

  <script src="http://coliro.com/isotope/isotope-docs/js/isotope-docs.min.js?6"></script>

	</body>
</html>
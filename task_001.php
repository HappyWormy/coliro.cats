<!doctype html>
<html class="no-js" lang="">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property=og:image content="https://www.atonua.com/wp-content/uploads/2019/11/aton_square_ava.jpg"/>
	<link rel="shortcut icon" href="https://www.atonua.com/wp-content/uploads/2019/11/aton_square_ava.jpg" type="image/png">
	<meta name="description" content="">
	<title>Results</title>

	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="style.css">
	<style>
* {
font-size: 1.1em;
}
.php_learn {
line-height: 1.4em;
}

pre {
font-size: 0.5em;
line-height: 1.1em;
color: #666;
background-color: #eee;
padding: 10px;
}

	</style>
</head>

<body>


<div class="php_learn">
<a href="/cats" class="back_cnob">Назад</a>
</div>

<div class="php_learn">

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {

	$number = $_POST['number'];
	$count_number = $_POST['count_number'];
	$fio = $_POST['fio'];
	$gradus = $_POST['gradus'];

	echo $number.', '.$count_number.', '.$fio.', '.$gradus;

?>

<br>

<?

	$numbers = str_split($number);

?>

<div class="chisla_quest">

<div>

<?

	echo 'Элементы массива: ';
	foreach($numbers as $nu)
	{
		echo '<b>'.$nu.'</b>, ';
	}	

?>

<br>

<?

// Найти сумму цифр числа

	foreach($numbers as $nu)
	{
		echo '<b>'.$nu.'</b> + ';
	}

	$num_sum = array_sum($numbers);
	
	echo '= <b>'.$num_sum.'</b>';

?>

<br>

<?

// Проверить количество вхождения цифры в число

$num_count = substr_count($number, $count_number);
echo 'В данном числе цифра <b>'.$count_number.'</b> встречается <b>'.$num_count.'</b> раза';

?>

<br>

<?

// Найти максимальное и минимальное значение массива

$max_number = max($numbers);
$min_number = min($numbers);

echo 'Самая большая цифра: <b>'.$max_number.'</b>, самая маленькая: <b>'.$min_number.'</b>';

?>
</div>
<div>

<?

	echo '<pre>';
	print_r ($numbers);
	echo '</pre>';
	
	echo '<br>';
	// echo json_encode($numbers);

?>

</div>
</div>

<hr>
<br>

<?

// Создание сокращенного варианта ФИО

echo $fio.'<br>';

$pieces = explode(" ", $fio);

list($surname, $firstname, $secondname) = explode(" ", $fio);

echo 'Фамилия: <b>'.$surname.'</b><br>';
echo 'Имя: <b>'.$firstname.'</b><br>';
echo 'Отчество: <b>'.$secondname.'</b><br>';

$shortfio = $surname.' '.mb_strtoupper(mb_substr($firstname, 0,1)).'. '.mb_strtoupper(mb_substr($secondname, 0,1)).'.';

echo '<br>';
echo 'ФИО: <b>'.$shortfio.'</b>';
echo '<br>';

?>



<br>
<hr>



<?

// Определения положения стрелки часов

$hour_count = 12/360;
$hour_temp = $gradus * $hour_count;
$hour = floor($hour_temp);

// echo $hour_count;
// echo $hour_temp;
// echo $hour;

?>

<style>
.circle-wrap .circle .mask.full,
.circle-wrap .circle .fill {
  animation: fill ease-in-out 3s;
  transform: rotate(<?php echo $gradus/2; ?>deg);
}

@keyframes fill {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(<?php echo $gradus/2; ?>deg);
  }
}
</style>

<? echo $gradus.' градусов'; ?>

<div class="circle-wrap">
	<div class="circle">
	  <div class="mask full">
		<div class="fill"></div>
	  </div>
	  <div class="mask half">
		<div class="fill"></div>
	  </div>
	  <div class="inside-circle"><?php echo $hour; ?>ч.</div>
	</div>
</div>









<?

} else { // дополнительно :)
	header("Location: index.php"); // можно использовать конструкцию header("Location: ...") для редиректа на страницу
}

?>

</div>

 </body>
</html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property=og:image content="https://www.atonua.com/wp-content/uploads/2019/11/aton_square_ava.jpg"/>
	<link rel="shortcut icon" href="https://www.atonua.com/wp-content/uploads/2019/11/aton_square_ava.jpg" type="image/png">
	<meta name="description" content="">
	<title>CATS</title>
	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="cats.css">
</head>
<body>

<?

if (isset($_POST['cat_name']) && isset($_POST['cat_birth']) && isset($_POST['cat_weight']) && isset($_POST['cat_about']) && isset($_POST['cat_photo'])){

// Параметры для подключения
$db_host = "wormy2.mysql.tools"; 
$db_user = "wormy2_testcats"; // Логин БД
$db_password = "@4H8S2x)cl"; // Пароль БД
$db_base = 'wormy2_testcats'; // Имя БД
$db_table = "cat_list"; // Имя Таблицы БД

$cat_name = $_POST['cat_name'];
$cat_birth = $_POST['cat_birth'];
$cat_weight = $_POST['cat_weight'];
$cat_about = $_POST['cat_about'];
$cat_photo = $_POST['cat_photo'];

    $mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);

	// Кодировка
	mysqli_set_charset($conn, "utf8");
	$mysqli->query('set character_set_client="utf8"');
	$mysqli->query('set character_set_results="utf8"');


    // Если есть ошибка соединения, выводим её и убиваем подключение
	if ($mysqli->connect_error) {
	    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
    
    $result = $mysqli->query("INSERT INTO ".$db_table." (cat_name,cat_birth,cat_weight,cat_about,cat_photo) VALUES ('$cat_name','$cat_birth','$cat_weight','$cat_about','$cat_photo')");
    
    if ($result == true){
    	echo "Информация занесена в базу данных";
    }else{
    	echo "Информация не занесена в базу данных";
    }

mysqli_close($mysqli);

}

?>

 <form method="POST" action="">
  <input name="cat_name" type="text" placeholder="Имя Котана"/>
  <input name="cat_birth" type="date" placeholder="Дата рождения"/>
  <input name="cat_weight" type="number" step="0.5" placeholder="Вес"/>
  <input name="cat_about" type="text" placeholder="Описание"/>
  <input name="cat_photo" type="text" placeholder="Фото"/>
  <input type="submit" value="Отправить"/>
 </form>

</body>
</html>
<?php

// Обновление котана



if (isset($_POST['cat_name']) && isset($_POST['cat_birth']) && isset($_POST['cat_weight']) && isset($_POST['cat_about']) && isset($_POST['cat_id'])){

/*

// Каталог, в который мы будем принимать файл:
$uploaddir = 'cats/';
$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);

// Копируем файл из каталога для временного хранения файлов:
if (copy($_FILES['uploadfile']['tmp_name'], $uploadfile))
{
echo "<h3>Файл успешно загружен на сервер</h3>";

}
else { echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; exit; }

*/

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
$cat_id = $_POST['cat_id'];
// $cat_photo = $_POST['cat_photo'];
// $cat_photo = $_FILES['uploadfile']['name'];


    $mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);

	// Кодировка
	mysqli_set_charset($conn, "utf8");
	$mysqli->query('set character_set_client="utf8"');
	$mysqli->query('set character_set_results="utf8"');


    // Если есть ошибка соединения, выводим её и убиваем подключение
	if ($mysqli->connect_error) {
	    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}

   // $result = $mysqli->query("INSERT INTO ".$db_table." (cat_name,cat_birth,cat_weight,cat_about,cat_photo) VALUES ('$cat_name','$cat_birth','$cat_weight','$cat_about','$cat_photo')");  

/*
	UPDATE `cat_list` SET `cat_name` = 'Элтон Джон 2' WHERE `cat_list`.`id` = 11;
	UPDATE `cat_list` SET `cat_name` = 'Элтон Джон 3', `cat_birth` = '2008-11-06', `cat_weight` = '62', `cat_about` = 'ab', `cat_photo` = '2cat_011.jpg' WHERE `cat_list`.`id` = 11;
*/

  //  $result = $mysqli->query("UPDATE ".$db_table." (cat_name,cat_birth,cat_weight,cat_about,cat_photo) VALUES ('$cat_name','$cat_birth','$cat_weight','$cat_about','$cat_photo') WHERE `id` = ".$cat_id.";");
	

    $result = $mysqli->query("UPDATE cat_list SET cat_name = '$cat_name' , cat_birth = '$cat_birth' , cat_weight = '$cat_weight' , cat_about = '$cat_about' WHERE id = '$cat_id';");
    
    if ($result == true){
    	echo "Информация занесена в базу данных";
		// echo "<br>ID = = = ".$cat_id."!";
    }else{
    	echo "Информация не занесена в базу данных";
    }

mysqli_close($mysqli);

}



/*

// Выводим информацию о загруженном файле:
echo "<h3>Информация о загруженном на сервер файле: </h3>";
echo "<p><b>Оригинальное имя загруженного файла: ".$_FILES['uploadfile']['name']."</b></p>";
echo "<p><b>Mime-тип загруженного файла: ".$_FILES['uploadfile']['type']."</b></p>";
echo "<p><b>Размер загруженного файла в байтах: ".$_FILES['uploadfile']['size']."</b></p>";
echo "<p><b>Временное имя файла: ".$_FILES['uploadfile']['tmp_name']."</b></p>";

*/


header( "refresh:3;url=http://coliro.com/cats" );




?>
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
<script src="js/main.js"></script>

	</head>

	<body class="">



 <form method="POST" action="u.php" enctype=multipart/form-data>
  <input name="cat_name" type="text" placeholder="Имя Котана"/>
  <input name="cat_birth" type="date" placeholder="Дата рождения"/>
  <input name="cat_weight" type="number" step="0.5" placeholder="Вес"/>
  <input name="cat_about" type="text" placeholder="Описание"/>
  <!-- <input name="cat_photo" type="text" placeholder="Фото"/> -->
  <input type=file name=uploadfile>
  <input type="submit" value="Отправить"/>
 </form>



	</body>
</html>
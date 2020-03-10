<!doctype html>
<html class="export" lang="ru">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta property=og:image content="https://www.atonua.com/wp-content/uploads/2019/11/aton_square_ava.jpg"/>
		<link rel="shortcut icon" href="https://www.atonua.com/wp-content/uploads/2019/11/aton_square_ava.jpg" type="image/png">
		<meta name="description" content="">
		<title>Добавление котана</title>
		<link rel="stylesheet" href="normalize.css">
		<link rel="stylesheet" href="cats.css">
	</head>

	<body class="">
	 <form method="POST" action="file.php" enctype=multipart/form-data>
		 <div class="form_item">
		  <input name="cat_name" type="text" placeholder="Имя Котана"/>
		 </div>
		 <div class="form_item">
		  <input name="cat_birth" type="date" placeholder="Дата рождения"/>
		 </div>
		 <div class="form_item">
		  <input name="cat_weight" type="number" step="0.5" placeholder="Вес"/>
		 </div>
		 <div class="form_item">
		  <input name="cat_about" type="text" placeholder="Описание"/>
		 </div>
		 <div class="form_item">
		  <input type=file name=uploadfile>
		 </div>
		 <div class="form_item">
		  <input type="submit" value="Отправить"/>
		 </div>
	 </form>

	 <a href="/cats" class="add_button">Назад</a>

	</body>

</html>
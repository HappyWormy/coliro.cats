<!doctype html>
<html class="export" lang="ru">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta property=og:image content="https://www.atonua.com/wp-content/uploads/2019/11/aton_square_ava.jpg"/>
		<link rel="shortcut icon" href="https://www.atonua.com/wp-content/uploads/2019/11/aton_square_ava.jpg" type="image/png">
		<meta name="description" content="">
		<title>Изменить котана</title>
		<link rel="stylesheet" href="normalize.css">
		<link rel="stylesheet" href="cats.css">
		
		
		<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
	</head>

	<body class="">

		<?php

		$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$url_components = parse_url($url); 
		parse_str($url_components['query'], $params);
		$the_cat_id = $params['id'];

$link = mysqli_connect("wormy2.mysql.tools", "wormy2_testcats", "@4H8S2x)cl", "wormy2_testcats");

if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    // print("MYSQL окей");
	mysqli_set_charset($link, "utf8");
}

$query ="SELECT * FROM cat_list WHERE id= $the_cat_id";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

// print_r ($result);

if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
			echo '<div class="kitten_name">'.$row[1].'</div>'; // Имя котана
?>



<script>

$('#editform').submit(function(e){
    e.preventDefault();
    $.ajax({
        url:'update.php',
        type:'post',
        data:$('#editform').serialize(),
        success:function(){
				$(".cat_edit").hide();
				$(".cat_edit_succes").show();
			// $.featherlight.close();
            //whatever you wanna do after the form is successfully submitted
        }
    });
});

</script>

	<div class="cat_edit">
	 <form method="POST" id="editform" action="update.php" enctype=multipart/form-data>
		 <div class="form_item">
		  <input name="cat_name" type="text" placeholder="Имя Котана" value="<?php echo $row[1]; ?>"/>
		 </div>
		 <div class="form_item">
		  <input name="cat_birth" type="date" placeholder="Дата рождения" value="<?php echo $row[2]; ?>"/>
		 </div>
		 <div class="form_item">
		  <input name="cat_weight" type="number" step="0.5" placeholder="Вес" value="<?php echo $row[3]; ?>"/>
		 </div>
		 <div class="form_item">
		  <input name="cat_about" type="text" placeholder="Описание"  value="<?php echo $row[4]; ?>"/>
		  <input style="display: none;" name="cat_id" type="text" placeholder="<?php echo $the_cat_id; ?>" value="<?php echo $the_cat_id; ?>"/>
		 </div>
		 <div class="form_item">
		  <!-- <input type=file name=uploadfile  value="<?php echo $row[5]; ?>" > -->
		 </div>
		 <div class="form_item">
		  <input type="submit" value="Отправить"/>
		 </div>
	 </form>
	</div>
	
	<div class="cat_edit_succes" style="display: none;">
		<h3>Котан успешно изменён!</h3>
		<a href="/cats" class="add_button">Назад</a>
	</div>


<?php
	}
    mysqli_free_result($result);
}

mysqli_close($link);

?>

	</body>

</html>
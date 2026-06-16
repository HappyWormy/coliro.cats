<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['name'];

	$surname = $_POST['surname'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	echo $name."<br />".$surname."<br />".$email."<br />".$message."<br />";
?>

</br>
<hr>
</br>

<?

$allthat = $name.$surname.$email.$message;
echo $allthat;

?>

</br>
<hr>
</br>



<?

} else { // дополнительно :)
	header("Location: index.php"); // можно использовать конструкцию header("Location: ...") для редиректа на страницу
}
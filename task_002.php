<!doctype html>
<html class="no-js" lang="">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta property=og:image content="https://www.atonua.com/wp-content/uploads/2019/11/aton_square_ava.jpg"/>
		<link rel="shortcut icon" href="https://www.atonua.com/wp-content/uploads/2019/11/aton_square_ava.jpg" type="image/png">
		<meta name="description" content="">
		<title>CATS</title>
		<link rel="stylesheet" href="normalize.css">
		<link rel="stylesheet" href="style.css">
	</head>

	<body>

<div class="php_learn">

<h2>Задания</h2>

</br>
<hr>
</br>

<div class="task_no">001</div>

<form action="task_001.php" method="post" enctype="multipart/form-data" accept-charset="UTF-8" class="tests_form">
	<div class="f_quest"><div class="f_title">Номер:</div><div class="f_form"><input name="number" type="number"></div></div>
	<div class="f_quest"><div class="f_title">Цифра:</div><div class="f_form"><input name="count_number" type="number"></div></div>
	<div class="f_quest"><div class="f_title">ФИО:</div><div class="f_form"><input name="fio" type="text"></div></div>
	<div class="f_quest"><div class="f_title">Градус:</div><div class="f_form"><input name="gradus" type="number" max="360" min="0"></div></div>
	<div class="f_quest"><input type='submit' value='Отправить'></div>
</form>

<!-- Форма -->
<!-- 

<form action="form.php" method="post">
	<p>Имя: <input name="name" type="text"></p>
	<p>Фамилия: <input name="surname" type="text"></p>
	<p>E-mail: <input name="email" type="text"></p>
	<p>Сообщение: <br /><textarea name="message" cols="30" rows="5"></textarea></p>
	<p><input type='submit' value='Отправить'></p>
</form>

-->

<hr>
</br>


</div>





<hr>

<?php
class FirstClass {
    public $var1 = "value1";

    protected function func1() {
    }
    
    public function func2() {
		echo ' тест ';
		echo ' дватест ';
    }
}

class SecondClass extends FirstClass {
    public $var2 = "value2";
}

$fc = new FirstClass();
$sc = new SecondClass();

echo $fc->var1; // value1
echo $sc->var1; // value1
$sc->func2(); // работает
echo $sc->var2; // value2
?>

<hr>

<?php
abstract class AbstClass {
    /* Данный метод должен быть определён в дочернем классе */
    abstract protected function getValue();
   
    /* Общий метод */
    public function printValue() {
        print $this->getValue() . "\n";
    }
}

class FirstClass2 extends AbstClass
{
    protected function getValue() {
        return "FirstClass";
    }    
}

$class1 = new FirstClass2;
$class1->printValue();
?>

<hr>





<!--
Типа транслитератор с трейтами
http://php720.com/lesson/60
-->

<?php
trait MyTransliterator {
	private $letters = array(
        'а' => 'a',   	'б' => 'b',     'в' => 'v',
        'г' => 'g',   	'д' => 'd',   	'е' => 'e',
        'ё' => 'e',   	'ж' => 'zh',  	'з' => 'z',
        'и' => 'i',   	'й' => 'y',   	'к' => 'k',
        'л' => 'l',   	'м' => 'm',   	'н' => 'n',
        'о' => 'o',   	'п' => 'p',   	'р' => 'r',
        'с' => 's',   	'т' => 't',   	'у' => 'u',
        'ф' => 'f',   	'х' => 'h',   	'ц' => 'c',
        'ч' => 'ch',  	'ш' => 'sh',  	'щ' => 'sch',
        'ь' => '',   	'ы' => 'y',   	'ъ' => '',
        'э' => 'e',   	'ю' => 'yu',  	'я' => 'ya',
        'А' => 'A',   	'Б' => 'B',   	'В' => 'V',
        'Г' => 'G',   	'Д' => 'D',   	'Е' => 'E',
        'Ё' => 'E',   	'Ж' => 'Zh',  	'З' => 'Z',
        'И' => 'I',   	'Й' => 'Y',   	'К' => 'K',
        'Л' => 'L',   	'М' => 'M',   	'Н' => 'N',
        'О' => 'O',   	'П' => 'P',   	'Р' => 'R',
        'С' => 'S',   	'Т' => 'T',   	'У' => 'U',
        'Ф' => 'F',   	'Х' => 'H',   	'Ц' => 'C',
        'Ч' => 'Ch',  	'Ш' => 'Sh',  	'Щ' => 'Sch',
        'Ь' => '',  	'Ы' => 'Y',   	'Ъ' => '_',
        'Э' => 'E',   	'Ю' => 'Yu',  	'Я' => 'Ya',
        'є' => 'ye', 	'ї' => 'yi', 	'і' => 'i',
        'Є' => 'YE', 	'Ї' => 'YI', 	'І' => 'I',
        ' ' => '_'
    );

	public function translate($str) {
		// заменяем символы кириллицы на символы латиницы
		return strtr(trim($str), $this->letters);
	}
}

class MyClass {
	use MyTransliterator;
	
	private $data;
	
	/**
	*	Некая функция для добавления данных в наш массив 
	*/
	public function setData(array $data) {
		$this->data = $data;
	}
	
	/**
	*	 Некая фукнция для подготовки данных
	*/
	public function getPreparedData() {
		// допустим, мы хотим сделать адрес страницы по названию
		// тогда, нам нужно перевести название с кириллическими символами на латиницу
		$this->data['url'] = strtolower($this->translate($this->data['title']));
		
		return $this->data;
	}
}

$obj = new MyClass;

$obj->setData([
	'title' => 'Сложній русский текст',
	'content' => 'Текст страницы'
]);

$data = $obj->getPreparedData();

echo "<pre>";
print_r($data);
echo "</pre>";
?>






 </body>
</html>
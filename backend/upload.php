<?php
include '../db.php';
// Все загруженные файлы помещаются в эту папку
$uploaddir = '../images/index/slider/';

// Вытаскиваем необходимые данные
$file = $_POST['file']['value'];
$name = $_POST['file']['name'];
$table = $_POST['tablename'];
$position = $_POST['position'];
// Получаем расширение файла
$getMime = explode('.', $name);
$mime = end($getMime);

// Выделим данные
$data = explode(',', $file);

// Декодируем данные, закодированные алгоритмом MIME base64
$encodedData = str_replace(' ','+',$data[1]);
$decodedData = base64_decode($encodedData);

// Вы можете использовать данное имя файла, или создать произвольное имя.
// Мы будем создавать произвольное имя!
$randomName = substr_replace(sha1(microtime(true)), '', 12).'.'.$mime;

if(file_put_contents($uploaddir.$randomName, $decodedData)) {
	switch($table){
		case 'main_slider':
		   $position = str_replace('item_','',$position);
			$insert = $db->prepare("INSERT INTO $table (img,position) VALUES ('$randomName','$position')");
			$insert->execute();
			break;
		
	}
}
else {
	echo "Что-то пошло не так.";
}
?>
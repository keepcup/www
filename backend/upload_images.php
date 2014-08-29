<?php
include '../db.php';
// Все загруженные файлы помещаются в эту папку
include 'cut_images.php';

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

	switch($table){
		case 'gallery':
			$gallery_id = $_POST['lastinsertdeid'];
			$namePath = '../images/gallery/images/'.$gallery_id."/".$randomName;
			
			list($w, $h) = getimagesize($file);
			if($w>1728 && $h>698){
				$w=($w-1728)/2;
				$h=($h-698)/2;
				crop($file,$namePath,array($w,$h,-$w,-$h));
			}else{
				resize($file,$namePath,1728,698);
			}
			$position = str_replace($table.'_','',$position);
			$insert = $db->prepare("INSERT INTO gallery_img (img,gallery_id,position) VALUES (?,?,?)");
			$insert->execute(array($namePath,$gallery_id,$position));
			break;
	}
?>
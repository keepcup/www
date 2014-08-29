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
		case 'mainslider':
			$namePath = '../images/index/'.$_POST['tablename']."/".$randomName;
			
			list($w, $h) = getimagesize($file);
			if($w>1728 && $h>698){
				$w=($w-1728)/2;
				$h=($h-698)/2;
				crop($file,$namePath,array($w,$h,-$w,-$h));
			}else{
				resize($file,$namePath,1728,698);
			}
			
			$position = str_replace($table.'_','',$position);
			$insert = $db->prepare("INSERT INTO main_slider (img,position) VALUES (?,?)");
			$insert->execute(array($namePath,$position));
			break;
		case 'insta':
			$namePath = '../images/instabudka/'.$_POST['tablename'].'_'.$_POST['tablefile'].'.'.$mime;
			list($w, $h) = getimagesize($file);
			if($_POST['tablefile'] == 13){
				if($w>640 && $h>427){
					$w=($w-640)/2;
					$h=($h-427)/2;
					crop($file,$namePath,array($w,$h,-$w,-$h));
				}else{
					resize($file,$namePath,640,427);
				}
			}else{
				if($w>1728 && $h>698){
					$w=($w-1728)/2;
					$h=($h-698)/2;
					crop($file,$namePath,array($w,$h,-$w,-$h));
				}else{
					resize($file,$namePath,1728,698);
				}
			}
			$update = $db->prepare("UPDATE $table SET img = ? WHERE id = ? ");
			$update->execute(array($namePath,$_POST['tablefile']));
			break;
		case 'photography':
			$namePath = '../images/'.$_POST['tablename']."/".$randomName;
			#узнать величину картинок
			#сохраняет и в джпг и в пнг исправить
			list($w, $h) = getimagesize($file);
			if($w>1728 && $h>698){
				$w=($w-1728)/2;
				$h=($h-698)/2;
				crop($file,$namePath,array($w,$h,-$w,-$h));
			}else{
				resize($file,$namePath,1728,698);
			}
			
			$position = str_replace($table.'_','',$position);
			$insert = $db->prepare("INSERT INTO $table (img,position) VALUES (?,?)");
			$insert->execute(array($namePath,$position));
			break;
		case 'gallery':
			$results = urldecode($_POST['textserialize']);
			$perfs = explode("&", $results);
			foreach($perfs as $i => $value) {
				$new_perfs[$i] = explode("=", $value);
			}
			$url_name = 'url_name';
			$file_name = 'file_name';
			$insert = $db->prepare("INSERT INTO $table (title,title_small,date,url_name,file_name) VALUES (?,?,?,?,?)");
			$insert->execute(array($new_perfs[0][1],$new_perfs[2][1],$new_perfs[1][1],$url_name,$file_name));
			echo $db->lastInsertId(); 
			break;
		case 'gallery_closed':
			$results = urldecode($_POST['textserialize']);
			$perfs = explode("&", $results);
			foreach($perfs as $i => $value) {
				$new_perfs[$i] = explode("=", $value);
			}
			$url_name = 'url_name';
			$file_name = 'file_name';

			// $namePath = "../images/gallery/".$randomName;
			// file_put_contents($namePath,$decodedData);

			$insert = $db->prepare("INSERT INTO gallery (title,title_small,date,url_name,file_name) VALUES (?,?,?,?,?)");
			$insert->execute(array($new_perfs[0][1],$new_perfs[2][1],$new_perfs[1][1],$url_name,$file_name));
			echo $db->lastInsertId(); 
			break;
	}
?>
 <?php
include '../db.php';
// Все загруженные файлы помещаются в эту папку
include 'cut_images.php';

// Вытаскиваем необходимые данные
$files = $_POST['file'];
// $name = $_POST['file'];
$startPosition =$_POST['startPosition'];
$table = $_POST['tablename'];
$position = $_POST['position'];
foreach ($files as $key => $value) {
	$name = $files[$key]['name'];
	$file = $files[$key]['value'];
	// Получаем расширение файла;
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
			$position = $_POST['position'];
			$gallery_id = $_POST['lastinsertedid'];
			$namePath = "../images/gallery/images/".$randomName;
			
			list($w, $h) = getimagesize($file);
			if($w>1728 && $h>698){
				$w=($w-1728)/2;
				$h=($h-698)/2;
				crop($file,$namePath,array($w,$h,-$w,-$h));
			}else{
				resize($file,$namePath,1728,698);
			}
			
				$position[$key+$startPosition] = str_replace($table.'_','',$position[$key+$startPosition]);
				$insert = $db->prepare("INSERT INTO gallery_img (img,gallery_id,position) VALUES (?,?,?)");
				$insert->execute(array($namePath,$gallery_id,$position[$key+$startPosition]));
				
			break;
		case 'gallery_closed':
			$gallery_id = $_POST['lastinsertedid'];
			$namePath = "../images/gallery/images/".$randomName;
			
			file_put_contents($namePath,$decodedData);

				$insert = $db->prepare("INSERT INTO gallery_img (img,gallery_id) VALUES (?,?)");
				$insert->execute(array($namePath,$gallery_id));
				
			break;
	}
}
	// $insert = $db->prepare("INSERT INTO gallery_img (img) VALUES (?)");
	// $insert->execute(array($file[0]['name'])); 
// ?>
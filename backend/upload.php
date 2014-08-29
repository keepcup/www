<?php
include '../db.php';
// Все загруженные файлы помещаются в эту папку
function resize($file_input, $file_output, $w_o, $h_o, $percent = false) {
	list($w_i, $h_i, $type) = getimagesize($file_input);
	if (!$w_i || !$h_i) {
		echo 'Невозможно получить длину и ширину изображения';
		return;
        }
        $types = array('','gif','jpeg','png');
        $ext = $types[$type];
        if ($ext) {
    	        $func = 'imagecreatefrom'.$ext;
    	        $img = $func($file_input);
        } else {
    	        echo 'Некорректный формат файла';
		return;
        }
	if ($percent) {
		$w_o *= $w_i / 100;
		$h_o *= $h_i / 100;
	}
	if (!$h_o) $h_o = $w_o/($w_i/$h_i);
	if (!$w_o) $w_o = $h_o/($h_i/$w_i);

	$img_o = imagecreatetruecolor($w_o, $h_o);
	imagecopyresampled($img_o, $img, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i);
	if ($type == 2) {
		return imagejpeg($img_o,$file_output,90);
	} else {
		$func = 'image'.$ext;
		return $func($img_o,$file_output);
	}
}
function crop($file_input, $file_output, $crop = 'square',$percent = false) {
	list($w_i, $h_i, $type) = getimagesize($file_input);
	if (!$w_i || !$h_i) {
		echo 'Невозможно получить длину и ширину изображения';
		return;
        }
        $types = array('','gif','jpeg','png');
        $ext = $types[$type];
        if ($ext) {
    	        $func = 'imagecreatefrom'.$ext;
    	        $img = $func($file_input);
        } else {
    	        echo 'Некорректный формат файла';
		return;
        }
	if ($crop == 'square') {
		if ($w_i > $h_i) {
			$x_o = ($w_i - $h_i) / 2;
			$min = $h_i;
		} else {
			$y_o = ($h_i - $w_i) / 2;
			$min = $w_i;
		}
		$w_o = $h_o = $min;
	} else {
		list($x_o, $y_o, $w_o, $h_o) = $crop;
		if ($percent) {
			$w_o *= $w_i / 100;
			$h_o *= $h_i / 100;
			$x_o *= $w_i / 100;
			$y_o *= $h_i / 100;
		}
    	        if ($w_o < 0) $w_o += $w_i;
	        $w_o -= $x_o;
	   	if ($h_o < 0) $h_o += $h_i;
		$h_o -= $y_o;
	}
	$img_o = imagecreatetruecolor($w_o, $h_o);
	imagecopy($img_o, $img, 0, 0, $x_o, $y_o, $w_o, $h_o);
	if ($type == 2) {
		return imagejpeg($img_o,$file_output,90);
	} else {
		$func = 'image'.$ext;
		return $func($img_o,$file_output);
	}
}

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
			$namePath = '../images/'.$_POST['tablename']."/images/".$randomName;
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
			$results = urldecode($_POST['textserialize']);
			$perfs = explode("&", $results);
			foreach($perfs as $value) {
			    $perfs[$value][] = explode("=", $value);
			}
			
			$position = str_replace($table.'_','',$position);
			$insert = $db->prepare("INSERT INTO $table (photo,position,title) VALUES (?,?,?)");
			$insert->execute(array($namePath,$position,$perfs[1][1]));
			break;
	}

?>
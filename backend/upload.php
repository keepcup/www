<?php
include '../db.php';
include 'cut_images.php';
include 'strtr.php';
$file = $_POST['file']['value'];
$name = $_POST['file']['name'];
$table = $_POST['tablename'];
$position = $_POST['position'];
$getMime = explode('.', $name);
$mime = end($getMime);

$data = explode(',', $file);

$encodedData = str_replace(' ','+',$data[1]);
$decodedData = base64_decode($encodedData);


$randomName = substr_replace(sha1(microtime(true)), '', 12).'.'.$mime;

	switch($table){
		case 'mainslider':
			$namePath = '../images/index/'.$_POST['tablename']."/".$randomName;
			
			list($w, $h) = getimagesize($file);
			if($w>1728 || $h>698){
				if($w>2500){
					resize($file, $namePath, 2000, 0);
					list($w, $h) = getimagesize($namePath);
					$w=($w-1727)/2;
					$h=($h-697)/2;
					crop($namePath,$namePath,array($w,$h,-$w,-$h));
				}else{
					$w=($w-1727)/2;
					$h=($h-697)/2;
					crop($file,$namePath,array($w,$h,-$w,-$h));
				}
			}else{
				resize($namePath,$namePath,1728,698);
			}
			
			$position = str_replace($table.'_','',$position);
			$insert = $db->prepare("INSERT INTO main_slider (img,position) VALUES (?,?)");
			$insert->execute(array($namePath,$position));
			echo $position;
			break;
		case 'insta':
			$namePath = '../images/instabudka/'.$_POST['tablename'].'_'.$_POST['tablefile'].'.'.$mime;
			list($w, $h) = getimagesize($file);
			$tablefile = $_POST['tablefile'];
			if($tablefile == '3' || $tablefile == '5' || $tablefile == '9' || $tablefile == '11' || $tablefile == '15' || $tablefile == '17' || $tablefile == '18' ){
				if($w>640 || $h>427){
					if($w>1000){
						resize($file, $namePath, 1000, 0);
						list($w, $h) = getimagesize($namePath);
						$w=($w-639)/2;
						$h=($h-426)/2;
						crop($namePath,$namePath,array($w,$h,-$w,-$h));
					}else{
						$w=($w-639)/2;
						$h=($h-426)/2;
						crop($file,$namePath,array($w,$h,-$w,-$h));
					}
				}else{
					resize($file,$namePath,640,427);
				}
			}else{
				if($w>1727 || $h>697){
					if($w>2500){
						resize($file, $namePath, 2000, 0);
						list($w, $h) = getimagesize($namePath);
						$w=($w-1727)/2;
						$h=($h-697)/2;
						crop($namePath,$namePath,array($w,$h,-$w,-$h));
					}else{
						$w=($w-1727)/2;
						$h=($h-697)/2;
						crop($file,$namePath,array($w,$h,-$w,-$h));
					}
				}else{
					resize($file,$namePath,1728,698);
				}
			}
			$update = $db->prepare("UPDATE $table SET img = ? WHERE id = ? ");
			$update->execute(array($namePath,$tablefile));
			break;
		case 'photography':
			$namePath = '../images/'.$_POST['tablename']."/".$randomName;
			$namePathPreview = "../images/".$_POST['tablename']."/preview_".$randomName;
			#узнать величину картинок
			#сохраняет и в джпг и в пнг исправить
			list($w, $h) = getimagesize($file);
			if($w>1980 ||$h>1200){
				if($w>$h){
					resize($file,$namePath,1980,0);
				}elseif($w<$h){
					resize($file,$namePath,0,1200);
				}
			}else{
				resize($file,$namePath,$w,$h);
			};
			if($w>380 || $h>250){
				if($w>1000){
					resize($file, $namePathPreview, 500, 0);
					list($w, $h) = getimagesize($namePathPreview);
					$w=(round($w-379)/2);
					$h=(round($h-249)/2);
					crop($namePathPreview,$namePathPreview,array($w,$h,-$w,-$h));
				}else{
					$w=(round($w-379)/2);
					$h=(round($h-249)/2);
					crop($file,$namePathPreview,array($w,$h,-$w,-$h));
				}
			}else{
				resize($file,$namePathPreview,$w,$h);
			};
			$position = str_replace($table.'_','',$position);
			$insert = $db->prepare("INSERT INTO $table (img,img_preview,position) VALUES (?,?,?)");
			$insert->execute(array($namePath,$namePathPreview,$position));
			break;
		case 'gallery':
			$results = urldecode($_POST['textserialize']);
			$perfs = explode("&", $results);
			foreach($perfs as $i => $value) {
				$new_perfs[$i] = explode("=", $value);
			}
			$url_name = translit($new_perfs[0][1].' '.$new_perfs[2][1]);
			$url_name = str_replace(' ','-',$url_name)."-".$new_perfs[1][1];
			$url_name = preg_replace("/[^a-z0-9-]/i","", $url_name);
			$position =implode(",", $_POST['position']);
			$position = str_replace($table.'_','',$position);
			$date = strtotime($new_perfs[1][1].'.'.date('Y'));

			$insert = $db->prepare("INSERT INTO $table (title,title_small,date,url_name,position) VALUES (?,?,?,?,?)");
			$insert->execute(array($new_perfs[0][1],$new_perfs[2][1],$date,$url_name, $position));
			echo $db->lastInsertId(); 
			break;
		case 'gallery_closed':
			$results = urldecode($_POST['textserialize']);
			$perfs = explode("&", $results);
			foreach($perfs as $i => $value) {
				$new_perfs[$i] = explode("=", $value);
			}
			$url_name = translit($new_perfs[0][1].' '.$new_perfs[2][1]);
			$url_name = str_replace(' ','-',$url_name)."-".$new_perfs[1][1];
			$date = strtotime($new_perfs[1][1].'.'.date('Y'));

			$insert = $db->prepare("INSERT INTO gallery (title,title_small,date,password,url_name) VALUES (?,?,?,?,?)");
			$insert->execute(array($new_perfs[0][1],$new_perfs[2][1],$date,$new_perfs[3][1],$url_name));
			echo $db->lastInsertId(); 
			break;
		case 'clients':
			$namePath = '../images/'.$_POST['tablename']."/".$randomName;
			
			$results = urldecode($_POST['textserialize']);
			$perfs = explode("&", $results);
			foreach($perfs as $i => $value) {
				$new_perfs[$i] = explode("=", $value);
			}
			list($w, $h) = getimagesize($file);
			if($w>$h){
				resize($file,$namePath,100,0);
			}elseif($w<$h){
				resize($file,$namePath,0,100);
			}
			$gallery_id = explode('/',$new_perfs[1][1]);
			$gallery_id = end($gallery_id);
			if(!empty($gallery_id)){
				$select = $db->prepare("SELECT id,url_name FROM gallery WHERE url_name = ?");
				$select->execute(array($gallery_id));
				$select_row = $select->fetch();
				$gallery_id = $select_row['id'];
				if(empty($gallery_id)){
					$gallery_id= 0;
				}
			}else{
				$gallery_id= 0;
			}
			$position = str_replace($table.'_','',$position);
			$insert = $db->prepare("INSERT INTO clients (name,img,gallery_id,contacts_position,main_position) VALUES (?,?,?,?,?)");
			$insert->execute(array($new_perfs[0][1],$namePath,$gallery_id,$position,$position));
			break;
		case 'blog':
			$results = urldecode($_POST['textserialize']);
			$perfs = explode("&", $results);
			foreach($perfs as $i => $value) {
				$new_perfs[$i] = explode("=", $value);
			}
			$namePath = '../images/'.$_POST['tablename']."/images/".$randomName;
			list($w, $h) = getimagesize($file);

			if($w>640 || $h>427){
				if($w>1000){
					resize($file, $namePath, 1000, 0);
					list($w, $h) = getimagesize($namePath);
					$w=($w-639)/2;
					$h=($h-426)/2;
					crop($namePath,$namePath,array($w,$h,-$w,-$h));
				}else{
					$w=($w-639)/2;
					$h=($h-426)/2;
					crop($file,$namePath,array($w,$h,-$w,-$h));
				}
			}else{
				resize($file,$namePath,640,427);
			}
			$gallery_id = explode('/',$new_perfs[4][1]);
			$gallery_id = end($gallery_id);
			if(!empty($gallery_id)){
				$select = $db->prepare("SELECT id,url_name FROM gallery WHERE url_name = ?");
				$select->execute(array($gallery_id));
				$select_row = $select->fetch();
				$gallery_id = $select_row['id'];
				if(empty($gallery_id)){
					$gallery_id= 0;
				}
			}else{
				$gallery_id= 0;
			}
			$date = strtotime($new_perfs[3][1].'.'.date('Y'));
			$insert = $db->prepare("INSERT INTO blog (title,title_small,date,img,text,gallery_id) VALUES (?,?,?,?,?,?)");
			$insert->execute(array($new_perfs[0][1],$new_perfs[1][1],$date,$namePath,$new_perfs[2][1],$gallery_id));
			break;
	}
?>
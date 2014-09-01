<?php
include '../db.php';
include 'cut_images.php';
include 'strtr.php';
$table = $_POST['tablename'];
$position = $_POST['position'];


	switch($table){
		case 'gallery':
			$results = urldecode($_POST['textserialize']);
			$perfs = explode("&", $results);
			foreach($perfs as $i => $value) {
				$new_perfs[$i] = explode("=", $value);
			}
			$url_name = translit($new_perfs[0][1].' '.$new_perfs[2][1]);
			$url_name = str_replace(' ','-',$url_name)."-".$new_perfs[1][1];

			$position =implode(",", $_POST['position']);
			$position = str_replace($table.'_','',$position);
			$update_id = $_POST['id'];

			$update = $db->prepare("UPDATE $table SET title=?, title_small =?, date = ?, url_name = ?, position = ? WHERE id = ? ");
			$update->execute(array($new_perfs[0][1],$new_perfs[2][1],$new_perfs[1][1],$url_name, $position, $update_id));
			break;
		case 'gallery_closed':
			$results = urldecode($_POST['textserialize']);
			$perfs = explode("&", $results);
			foreach($perfs as $i => $value) {
				$new_perfs[$i] = explode("=", $value);
			}
			$url_name = translit($new_perfs[0][1].' '.$new_perfs[2][1]);
			$url_name = str_replace(' ','-',$url_name)."-".$new_perfs[1][1];
			$update_id = $_POST['id'];
			
			$update = $db->prepare("UPDATE gallery SET title=?, title_small =?, date = ?, password = ?, url_name = ? WHERE id = ? ");
			$update->execute(array($new_perfs[0][1],$new_perfs[2][1],$new_perfs[1][1],$new_perfs[3][1],$url_name, $update_id ));
			
			if(!empty($_POST['file'])){
				$files = $_POST['file'];
				foreach ($files as $key => $value) {
					$name = $files[$key]['name'];
					$file = $files[$key]['value'];
					$getMime = explode('.', $name);
					$mime = end($getMime);

					$data = explode(',', $file);

					$encodedData = str_replace(' ','+',$data[1]);
					$decodedData = base64_decode($encodedData);

					$randomName = substr_replace(sha1(microtime(true)), '', 12).'.'.$mime;
				}
				$namePath = "../images/gallery/images/".$randomName;
				file_put_contents($namePath,$decodedData);

				$select = $db->prepare("SELECT img FROM gallery_img WHERE gallery_id = ?");
				$select->execute(array($update_id));
				$select_row = $select->fetch();
				unlink($select_row['img']);

				$update_2 = $db->prepare("UPDATE gallery_img SET img=? WHERE gallery_id = ? ");
				$update_2->execute(array($namePath, $update_id ));
			}
			break;
		case 'contacts':
			$results = urldecode($_POST['textserialize']);
			$perfs = explode("&", $results);
			foreach($perfs as $i => $value) {
				$new_perfs[$i] = explode("=", $value);
			}

			$update = $db->prepare("UPDATE $table SET vk=?, fb =?, insta = ?, tw = ?, mail = ?, phone1 = ?, phone2 = ?");
			$update->execute(array($new_perfs[2][1],$new_perfs[0][1],$new_perfs[4][1],$new_perfs[6][1],$new_perfs[1][1],$new_perfs[3][1],$new_perfs[5][1]));
			break;
		case 'password':
			$results = urldecode($_POST['textserialize']);
			$perfs = explode("&", $results);
			foreach($perfs as $i => $value) {
				$new_perfs[$i] = explode("=", $value);
			}

			$old_pass = sha1($new_perfs[0][1]);

			$select = $db->prepare("SELECT password FROM admin WHERE id='1'");
			$select->execute();
			$select_row = $select->fetch();

			if($old_pass == $select_row['password']){
				$new_pass = sha1($new_perfs[1][1]);
				$update = $db->prepare("UPDATE admin SET password = ? WHERE id = '1'");
				$update->execute(array($new_pass));
			};
			break;
		case 'blog':
			$update_id= $_POST['id'];
			$select = $db->prepare("SELECT img FROM blog WHERE id = ?");
			$select->execute(array($update_id));
			$select_row = $select->fetch();
			$namePath = $select_row['img'];

			$results = urldecode($_POST['textserialize']);
			$perfs = explode("&", $results);
			foreach($perfs as $i => $value) {
				$new_perfs[$i] = explode("=", $value);
			}

			if(!empty($_POST['file'])){

				$namePath = '../images/'.$_POST['tablename']."/images/".$randomName;
					$files = $_POST['file'];
				foreach ($files as $key => $value) {
					$name = $files[$key]['name'];
					$file = $files[$key]['value'];
					$getMime = explode('.', $name);
					$mime = end($getMime);
					$randomName = substr_replace(sha1(microtime(true)), '', 12).'.'.$mime;
				}
				$namePath = "../images/gallery/images/".$randomName;
				list($w, $h) = getimagesize($file);

				if($w>640 && $h>427){
					$w=($w-639)/2;
					$h=($h-426)/2;
					crop($file,$namePath,array($w,$h,-$w,-$h));
				}else{
					resize($file,$namePath,640,427);
				}
				unlink($select_row['img']);
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
			echo $select_row['id'];
			$update = $db->prepare("UPDATE blog SET title = ?,title_small=?,date=?,img=?,text = ?, gallery_id=? WHERE id = ?");
			$update->execute(array($new_perfs[0][1],$new_perfs[1][1],$new_perfs[3][1],$namePath,$new_perfs[2][1],$gallery_id,$update_id ));
			break;
	}

?>
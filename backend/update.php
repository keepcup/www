<?php
include '../db.php';
// Все загруженные файлы помещаются в эту папку
include 'cut_images.php';
include 'strtr.php';
// Вытаскиваем необходимые данные
$table = $_POST['tablename'];
$position = $_POST['position'];
// Получаем расширение файла


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
	}
?>
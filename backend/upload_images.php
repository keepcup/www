 <?php
include '../db.php';
include 'cut_images.php';

$files = $_POST['file'];
$startPosition =$_POST['startPosition'];
$table = $_POST['tablename'];
$position = $_POST['position'];
foreach ($files as $key => $value) {
	$name = $files[$key]['name'];
	$file = $files[$key]['value'];
	$getMime = explode('.', $name);
	$mime = end($getMime);

	$data = explode(',', $file);

	$encodedData = str_replace(' ','+',$data[1]);
	$decodedData = base64_decode($encodedData);

	$randomName = substr_replace(sha1(microtime(true)), '', 12).'.'.$mime;

	switch($table){
		case 'gallery':
			$position = $_POST['position'];
			$gallery_id = $_POST['lastinsertedid'];
			$namePath = "../images/gallery/images/".$randomName;
			$namePathPreview = "../images/gallery/images/preview_".$randomName;
			
			list($w, $h) = getimagesize($file);
			if($w>1980 ||$h>1200){
				if($w>$h){
					resize($file,$namePath,1980,0);
				}elseif($w<$h){
					resize($file,$namePath,0,1200);
				}
			}else{
				resize($file,$namePath,$w,$h);
			}
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
				resize($file,$namePathPreview,380,169);
			}

				$position =$key+1;
				$insert = $db->prepare("INSERT INTO gallery_img (img,img_preview,gallery_id,position) VALUES (?,?,?,?)");
				$insert->execute(array($namePath,$namePathPreview,$gallery_id,$position));
				echo $gallery_id;
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
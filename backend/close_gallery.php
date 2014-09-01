<?include '../db.php';
$select = $db->prepare("SELECT id,password FROM gallery WHERE id=?");
$select->execute(array($_POST['id']));
$row = $select->fetch();

$select_gallery_img = $db->prepare("SELECT img,gallery_id FROM gallery_img WHERE gallery_id=?");
$select_gallery_img->execute(array($_POST['id']));
$gallery_img_row = $select_gallery_img->fetch();


if($row['password'] == $_POST['password']){
	echo $gallery_img_row['img'];
}
?>

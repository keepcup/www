<?include '../db.php';
$select = $db->prepare("SELECT id,password,file_name FROM gallery WHERE id=?");
$select->execute(array($_POST['id']));
$row = $select->fetch();
if($row['password'] == $_POST['password']){
	echo $row['file_name'];
}
?>

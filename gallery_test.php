<?include 'db.php';
$select = $db->prepare("SELECT * FROM gallery WHERE id=?");
$select->execute(array($_POST['id']));
$row = $select->fetch();
if($row['password'] == $_POST['password']){
	echo '1';
}
?>

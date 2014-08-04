<?include 'db.php';
$select = $db->prepare("SELECT * FROM gallery WHERE id=1");
$select->execute();
$row = $select->fetch();
if($row['password'] == $_POST['password']){
	echo '1';
}
?>

<?php
session_start();
if($_POST['name'] !='' && !empty($_POST['name']) && !empty($_POST['password'])){
	include '../db.php';
	$select = $db->prepare("SELECT login,password FROM admin WHERE id = 1");
	$select->execute();
	$select_row = $select->fetch();
	$login = $_POST['name'];
	$password = sha1($_POST['password']);

	if($login == $select_row['login'] && $password == $select_row['password']){
		$_SESSION['admin'] = '144';
		header('Location:../cms.php');
		exit;
	}else{
		header('Location:../cms_enter.php');
		exit;
	};
}{
	header('Location:../cms_enter.php');
	exit;
}
?>
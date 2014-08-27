<?php
include '../db.php';
$table = $_POST['tablename'];
$position =implode(",", $_POST['position']);
	switch($table){
		case 'main_slider':
		    $position = str_replace('item_','',$position);
		    $insert = $db->prepare("UPDATE position SET main_slider='$position'");
			$insert->execute();
			break;
	}
?>
<?php
include '../db.php';
$table = $_POST['tablename'];
$position =implode(",", $_POST['position']);
	switch($table){
		case 'mainslider':
			$position = str_replace($table.'_','',$position);
			$insert = $db->prepare("UPDATE position SET $table='$position'");
			$insert->execute();
			break;
		case 'mainclients':
			$position = str_replace($table.'_','',$position);
			$insert = $db->prepare("UPDATE position SET $table='$position'");
			$insert->execute();
			break;
		case 'photography':
			$position = str_replace($table.'_','',$position);
			$insert = $db->prepare("UPDATE position SET $table='$position'");
			$insert->execute();
			break;
		case 'gallery':
			$position = str_replace($table.'_','',$position);
			$insert = $db->prepare("UPDATE position SET $table='$position'");
			$insert->execute();
			break;
	}
?>
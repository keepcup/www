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
			$id = $_POST['id'];
			$position = str_replace($table.'_','',$position);
			$insert = $db->prepare("UPDATE gallery SET position='$position' WHERE id = ?");
			$insert->execute(array($id));
			break;
		case 'contactsclients' || 'clients':
			$position = str_replace('clients_','',$position);
			$insert = $db->prepare("UPDATE position SET contactsClients='$position',mainClients='$position'");
			$insert->execute();
			break;
	}
?>
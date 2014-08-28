<?php
include '../db.php';
$table = $_POST['tablename'];
$deletePosition =$_POST['deletePosition'];
	switch($table){
		case 'mainslider':
			$select = $db->prepare("SELECT id,img FROM main_slider WHERE position=?");
			$select->execute(array($deletePosition));
			$select_row = $select->fetch();
			unlink($select_row['img']);
		    $delete = $db->prepare("DELETE FROM main_slider WHERE id=?");
			$delete->execute(array($select_row['id']));
			break;
		case 'photography':
			$select = $db->prepare("SELECT id,img FROM photography WHERE position=?");
			$select->execute(array($deletePosition));
			$select_row = $select->fetch();
			unlink($select_row['img']);
		    $delete = $db->prepare("DELETE FROM photography WHERE id=?");
			$delete->execute(array($select_row['id']));
			break;
	}
?>
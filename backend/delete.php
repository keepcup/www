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
		case 'gallery':
			if(!empty($_POST['gallerydeleteflag'])){
				$id = $_POST['id'];
				$select = $db->prepare("SELECT id,img FROM gallery_img WHERE gallery_id = ?");
				$select->execute(array($id));
				$select_row = $select->fetchAll();

				foreach ($select_row as $key => $value) {
					unlink($select_row[$key]['img']);
				}
				$delete = $db->prepare("DELETE FROM gallery WHERE id=?");
				$delete->execute(array($id));

				$delete = $db->prepare("DELETE FROM gallery_img WHERE gallery_id=?");
				$delete->execute(array($id));
			}else{
				$id = $_POST['id'];
				$select = $db->prepare("SELECT id,img FROM gallery_img WHERE gallery_id = ? AND position=?");
				$select->execute(array($id, $deletePosition));
				$select_row = $select->fetch();
				unlink($select_row['img']);
				$delete = $db->prepare("DELETE FROM gallery_img WHERE id=?");
				$delete->execute(array($select_row['id']));
			}
			break;
		case 'gallery_closed':
				$id = $_POST['id'];
				$select = $db->prepare("SELECT id,img FROM gallery_img WHERE gallery_id = ?");
				$select->execute(array($id));
				$select_row = $select->fetchAll();

				foreach ($select_row as $key => $value) {
					unlink($select_row[$key]['img']);
				}
				$delete = $db->prepare("DELETE FROM gallery WHERE id=?");
				$delete->execute(array($id));

				$delete = $db->prepare("DELETE FROM gallery_img WHERE gallery_id=?");
				$delete->execute(array($id));
			break;
		case 'contactsclients':
			$select = $db->prepare("SELECT id,img FROM clients WHERE contacts_position=?");
			$select->execute(array($deletePosition));
			$select_row = $select->fetch();
			unlink($select_row['img']);
			$delete = $db->prepare("DELETE FROM clients WHERE id=?");
			$delete->execute(array($select_row['id']));
			break;
	}
?>
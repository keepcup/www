<?php
$select = $db->prepare("SELECT id,url_name FROM gallery WHERE url_name = ?");
$select->execute(array($gallery_id));
$select_row = $select->fetch();
$gallery_id = $select_row['id'];
?>
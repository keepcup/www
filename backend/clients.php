<?
switch($url){
	case 'index':$limit=15;break;
	case 'contacts':$limit=99999;break;
}
if($url == 'contacts'){
	$position = $db->prepare("SELECT contactsClients FROM position");
	$position->execute();
	$position_row = $position->fetch();
	$main_clients = $position_row['contactsClients'];
}
$select = $db->prepare("SELECT * FROM clients ORDER BY FIELD( main_position,  $main_clients) LIMIT :skip");
$select->bindValue(':skip', intval($limit), PDO::PARAM_INT);
$select->execute();
$row = $select->fetchAll();
$select_count = $select->rowCount();
?>
<ul class="clients_block"><!--
	<?
	for($i=0;$i<$select_count;$i++){
		$select_gallery = $db->prepare("SELECT url_name FROM gallery WHERE id=?");
		$select_gallery->execute(array($row[$i]['gallery_id']));
		$row_gallery = $select_gallery->fetch();
	?>
--><li><a <?if($row_gallery != 0){?>href="gallery/<?echo $row_gallery['url_name']?>"<?}?>><img src="<?echo $row[$i]['img']?>" alt="<?echo $row[$i]['name']?>"></a></li><!--
	<?}?>
--></ul>	
<?include "../db.php";
$limit = $_GET['limit'];
$select = $db->prepare("SELECT * FROM gallery ORDER BY date DESC LIMIT :skip,2");
$select->bindValue(':skip', intval($limit), PDO::PARAM_INT);
$select->execute();
$row = $select->fetchAll();
$select_count = $select->rowCount();
for($i=0;$i<$select_count;$i++){

	$gallery_id = $row[$i]['id'];
	$position = $row[$i]['position'];
	$select_img = $db->prepare("SELECT img,img_preview FROM gallery_img WHERE gallery_id=? ORDER BY FIELD( position, $position) LIMIT 6");
	$select_img->execute(array($gallery_id));
	$img_row = $select_img->fetchAll();
	$select_img_count = $select_img->rowCount();

	$photo=explode(',', $row[$i]['position']);
	$photo_count=count($photo);
	if($row[$i]['password'] == ''){
		// echo date('d.m',strtotime($row[$i]['date']))
		?>
		<a href="/gallery/<?echo $row[$i]['url_name'];?>" class="gallery-bgc">
			<div class="gallery">
				<span class="id"><?echo $row[$i]['id'];?></span>
				<div class="gallery-text-belt">
					<div class="gallery-text_block">
						<p class="gallery-date"><?echo date('d.m' ,$row[$i]['date']);?></p>
						<p class="gallery-title"><span><?echo $row[$i]['title']?></span><br>
							<?echo $row[$i]['title_small']?>
						</p>
						<p class="gallery-number"><?echo $photo_count;?></p>
					</div>
				</div>
				<div class="gallery-img-belt">
					<div class="gallery-img_block">
						<?
						for($d=0;$d<$select_img_count;$d++){?>
							<img src="<?echo $img_row[$d]['img_preview'];?>" alt="">
						<?};?>
					</div>
				</div>
				<div class="gallery-shadow_box"></div>
			</div>
		</a>
	<?}elseif($row[$i]['password'] != ''){?>	
			<div class="gallery closed gallery-bgc">
				<div class="gallery-text_block">
					<p class="gallery-date"><?echo date('d.m' ,$row[$i]['date']);?></p>
					<p class="gallery-title"><span>закрытая фотогаллерея <!-- <span class="gallery-date-close">(<?echo date('d.m',strtotime($row[$i]['date']))?>)</span> --></span><br>
						введите код для просмотра фотографий
					</p>
					<p class="gallery-number"><?echo $photo_count;?></p>
				</div>
				<div class="gallery-closed">
					<div class="gallery-closed_block">
						<div class="gallery-closed_input">
							<span class="id"><?echo $row[$i]['id']?></span>
							<input type="text" class="close_gallery">
							<a href="" onclick="return false">Готово</a>
						</div>
					</div>
					<div class="gallery-shadow_box"></div>
				</div>
			</div>
	<?}
}?>

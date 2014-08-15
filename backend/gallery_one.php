<?
$select = $db->prepare("SELECT * FROM gallery LIMIT 4");
$select->execute();
$row = $select->fetchAll();
$select_count = $select->rowCount();
for($i=3;$i<$select_count;$i++){
	$photo=explode(',', $row[$i]['photo']);
	$photo_count=count($photo);
	if($row[$i]['private'] == 0){
		?>
		<div class="gallery">
			<span class="id"><?echo $row[$i]['id']?></span>
			<div class="gallery-text-belt">
				<div class="gallery-text_block">
					<p class="gallery-date"><?echo date('d.m',strtotime($row[$i]['date']))?></p>
					<p class="gallery-title"><span><?echo $row[$i]['title']?></span><br>
						<?echo $row[$i]['title_small']?>
					</p>
					<p class="gallery-number"><?echo $photo_count;?></p>
				</div>
			</div>
			<div class="gallery-img-belt">
				<div class="gallery-img_block">
					<?$photo_preview=explode(',', $row[$i]['photo_preview']);
					foreach ($photo_preview as $value) {?>
						<img src="images/gallery/images/<?echo $row[$i]['url_name'].'/'.$value?>" alt="">
					<?};?>
				</div>
			</div>
			<div class="gallery-shadow_box"></div>
		</div>
	<?}
}?>
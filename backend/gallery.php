<?include '../db.php';
$select = $db->prepare("SELECT * FROM gallery LIMIT 4");
$select->execute();
$row = $select->fetchAll();
$select_count = $select->rowCount();
for($i=0;$i<$select_count;$i++){
	if($row[$i]['private'] == 0){?>
		<div class="gallery">
			<div class="gallery-text-belt">
				<div class="gallery-text_block">
					<p class="gallery-date">24.05</p>
					<p class="gallery-title"><span>инстабудка для smashbox</span><br>
						в сети магазинов РивГош
					</p>
					<p class="gallery-number">24</p>
				</div>
			</div>
			<div class="gallery-img-belt">
				<div class="gallery-img_block">
					<?$image=explode(',', $row[$i]['photo_preview']);
					foreach ($image as $value) {?>
						<img src="images/gallery/images/<?echo $row[$i]['url_name'].'/'.$value?>" alt="">
					<?};?>
				</div>
			</div>
			<div class="gallery-shadow_box"></div>
		</div>
	<?}elseif($row[$i]['private'] == 1){
		echo '
		<div class="gallery">
			<div class="gallery-text_block">
				<p class="gallery-date">24.05</p>
				<p class="gallery-title"><span>закрытая фотогаллерея <span class="gallery-date-close">(24.07)</span></span><br>
					введите код для просмотра фотографий
				</p>
				<p class="gallery-number">39</p>
			</div>
			<div class="gallery-closed">
				<div class="gallery-closed_block">
					<div class="gallery-closed_input">
						<input type="text">
						<p>Готово</p>
					</div>
				</div>
			</div>
		</div>
		';
	}
}?>
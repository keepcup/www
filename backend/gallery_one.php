<?
$url_name = $_GET['url_name'];
$select = $db->prepare("SELECT * FROM gallery WHERE url_name=?");
$select->execute(array($url_name));
$row = $select->fetch();
$id = $row['id'];

$select_img = $db->prepare("SELECT * FROM gallery_img WHERE gallery_id=?");
$select_img->execute(array($id));
$img_row = $select_img->fetchAll();
$select_img_count = $select_img->rowCount();
?>

		<div class="gallery">
			<span class="id"><?echo $row['id']?></span>
			<div class="gallery-text-belt">
				<div class="gallery-text_block">
					<p class="gallery-date"><?echo $row['date']?></p>
					<p class="gallery-title"><span><?echo $row['title']?></span><br>
						<?echo $row['title_small']?>
					</p>
				</div>
			</div>
			<div class="gallery-img-belt">
				<div class="gallery-img_block">
					<?
					for($i=0;$i<$select_img_count;$i++){?>
						<a class="fancybox" rel="group" href="<?echo $img_row[$i]['img'];?>">
							<img src="<?echo $img_row[$i]['img_preview'];?>" alt="" />
						</a>
					<?};?>
				</div>
			</div>
			<div class="gallery-shadow_box"></div>
		</div>
<script>
		$(document).ready(function() {
			$(".fancybox").fancybox();
		});
</script>
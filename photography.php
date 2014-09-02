<?include "header.php";?>
		<div class="content photography">
			<div class="description-text_block">
				<p>
					Мы предлагаем услугу репортажной съемки, в том числе со студийным светом на пресс-воле или в любых других декорациях.
				</p>
			</div>
			<div class="img-belt">
				<?
				$position = $db->prepare("SELECT * FROM position");
				$position->execute();
				$position_row = $position->fetch();
				$photography = $position_row['photography'];
				$photography_db = $db->prepare("SELECT * FROM photography ORDER BY FIELD( position,  $photography)");
				$photography_db->execute();
				$photography_row = $photography_db->fetchAll();
				$photography_count = $photography_db->rowCount();
				for($i=0;$i<$photography_count;$i++){
				?>
				<a class="fancybox" rel="group" href="<?echo $photography_row[$i]['img'];?>">
					<img src="<?echo $photography_row[$i]['img_preview'];?>" alt="">
				</a>
				<?}?>
			</div>
		</div>
		<script>
			$(document).ready(function() {
				$(".fancybox").fancybox();
			});
		</script>
<?include "footer.php";?>
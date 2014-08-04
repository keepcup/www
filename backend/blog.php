<?
$select = $db->prepare("SELECT * FROM blog LIMIT 8");
$select->execute();
$row = $select->fetchAll();
$select_count = $select->rowCount();
for($i=0;$i<$select_count;$i++){
	/*$blog_number = $db->prepare("SELECT * FROM gallery");
	$blog_number->execute();
	$blog_number_row = $blog_number->fetchAll();*/
?>
	<div class="blog">
		<div class="blog-belt">
			<div class="blog-text_block">
				<p class="blog-title"><span><?echo $row[$i]['title']?></span>
				<br>
				<?echo $row[$i]['title_small']?></p>
			</div>
			<img src="images/blog/images/<?echo $row[$i]['photo']?>" alt="<?echo $row[$i]['url_name']?>">
			<p class="blog-date">
				<span><?echo date('d',strtotime($row[$i]['date']))?></span><?echo date('.m',strtotime($row[$i]['date']))?>
			</p>
			<ul class="blog-social">
				<a href=""><li class="blog-social-vk"></li></a>
				<a href=""><li class="blog-social-fb"></li></a>
				<a href=""><li class="blog-social-tw"></li></a>
			</ul>
			<p class="blog-number">18<span></span></p>
			<div class="blog-text-belt">
				<p class="blog-text"><?echo $row[$i]['text']?></p>
			</div>
			<div class="blog-text_display">
				<ul><li></li><li></li><li></li></ul>
			</div>
		</div>
	</div>
<?}?>
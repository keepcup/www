<?
switch($url){
	case 'index':$limit=3;break;
	case 'blog':$limit=6;break;
}
$select = $db->prepare("SELECT * FROM blog LIMIT :skip");
$select->bindValue(':skip', intval($limit), PDO::PARAM_INT);
$select->execute();
$row = $select->fetchAll();
$select_count = $select->rowCount();
for($i=0;$i<$select_count;$i++){
	if($url=='blog'){
		$photo_count=0;
		if($row[$i]['gallery_id'] !=0){
			$blog_number = $db->prepare("SELECT photo,url_name FROM gallery WHERE id=?");
			$blog_number->execute(array($row[$i]['gallery_id']));
			$blog_number_row = $blog_number->fetch();
			$photo=explode(',', $blog_number_row['photo']);
			$photo_count=count($photo);
		}
?>
		<div class="blog">
			<div class="blog-belt">
				<div class="blog-text_block">
					<p class="blog-title"><span><?echo $row[$i]['title']?></span>
					<br>
					<?echo $row[$i]['title_small']?></p>
				</div>
				<img class="blog-img" src="images/blog/images/<?echo $row[$i]['photo']?>" alt="<?echo $row[$i]['url_name']?>">
				<p class="blog-date">
					<span><?echo date('d',strtotime($row[$i]['date']))?></span><?echo date('.m',strtotime($row[$i]['date']))?>
				</p>
				<div class="addthis_toolbox blog-social" addthis:url="<?echo $_SERVER['HTTP_HOST']?>/backend/blog_repost.php?id=<?echo $row[$i]['id']?>" addthis:title="<?echo $row[$i]['title']." ".$row[$i]['title_small']?>" >
					<div class="custom_images"> 
						<!-- <a class="addthis_button_vk">
							<img class="blog-social-vk" src="images/blog/1180/social-content-vk.png" alt="Share to Facebook" />
						</a>
						<a class="addthis_button_facebook">
							<img class="blog-social-fb" src="images/blog/1180/social-content-fb.png" alt="Share to Twitter" />
						</a> -->
						<a class="addthis_button_twitter">
							<img class="blog-social-tw" src="images/blog/1180/social-content-tw.png" alt="More..." />
						</a>
					</div>
				</div>
				<?if($photo_count!=0){?><a href="<?echo $blog_number_row['url_name']?>" class="blog-number"><?echo $photo_count?><span></span></a><?}?>
				<div class="blog-text-belt">
					<p class="blog-text"><?echo $row[$i]['text']?></p>
					<a href="http://www.facebook.com/sharer.php?u=http%3A%2F%2F<?echo $_SERVER['HTTP_HOST']?>/backend/blog_repost.php?id=<?echo $row[$i]['id']?>">
						FACEBOOKKKKK
					</a>
					<a href="http://vk.com/share.php?url=http%3A%2F%2F<?echo $_SERVER['HTTP_HOST']?>/backend/blog_repost.php?id=<?echo $row[$i]['id']?>">
						VKKKVKVKVKVK
					</a>
					<a href="http://twitter.com/share?url=http%3A%2F%2F<?echo $_SERVER['HTTP_HOST']?>/backend/blog_repost.php?id=<?echo $row[$i]['id']?>&text=<?echo $row[$i]['title']." ".$row[$i]['title_small']?>">
						twitterrrrrr
					</a>					
				</div>
				<div class="blog-text_display">
					<ul><li></li><li></li><li></li></ul>

				</div>
			</div>
		</div>
<?	}elseif ($url=='index'){?>
		<div class="news">
			<img src="images/blog/images/<?echo $row[$i]['photo']?>" alt="<?echo $row[$i]['url_name']?>" class="news_img">
			<div class="news-text">
				<p class="news-date">14.05</p>
				<p class="news-title"><?echo $row[$i]['title']?></p>
			</div>
		</div>
	<?}		
}?>
 
 <!-- social buttons -->
<script>
	// $(".addthis_button_facebook").click(function(){
	// 	var title = $(this).closest(".blog-belt").find(".blog-title").text();
	// 	var url = window.location;
	// 	var description = $(this).closest(".blog-belt").find(".blog-text").text();
	// 	var image = document.location.protocol + "//" + document.location.hostname + "/" + $(this).closest(".blog-belt").find(".blog-img").attr("src");
	// 	if($("meta[property='og:title']").length) {
	// 		$("meta[property='og:title']").attr("content", title);
	// 		$("meta[property='og:url']").attr("content", url);
	// 		$("meta[property='og:description']").attr("content", description);
	// 		$("meta[property='og:image']").attr("content", image);
	// 	}else {
	// 		$("head").append('<meta property="og:title" content="' + title + '" />');
	// 		$("head").append('<meta property="og:url" content="' + url + '" />');
	// 		$("head").append('<meta property="og:description" content="' + description + '" />');
	// 		$("head").append('<meta property="og:image" content="' + image + '" />');

	// 	}
	// })
	// $(".addthis_button_vk").click(function(){
	// 	var image = document.location.protocol + "//" + document.location.hostname + "/" + $(this).closest(".blog-belt").find(".blog-img").attr("src");
	// 	if($("metameta[property='og:image']").length) {
	// 		$("meta[property='og:image']").attr("content", image);
	// 	}
	// })
</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53f4d5562d80f020"></script>


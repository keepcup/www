<?
switch($url){
	case 'index':$limit=3;break;
	case 'blog':$limit=3;break;
}
if(!empty($_GET['id'])){
	$select = $db->prepare("SELECT * FROM blog WHERE id =? ORDER BY date DESC");
	$select->execute(array($_GET['id']));
}else{
	$select = $db->prepare("SELECT * FROM blog ORDER BY date DESC LIMIT :skip ");
	$select->bindValue(':skip', intval($limit), PDO::PARAM_INT);
	$select->execute();
}

$row = $select->fetchAll();
$select_count = $select->rowCount();
for($i=0;$i<$select_count;$i++){
	if($url=='blog'){
		$photo_count=0;
		if($row[$i]['gallery_id'] !=0){
			$blog_number = $db->prepare("SELECT url_name,position FROM gallery WHERE id=?");
			$blog_number->execute(array($row[$i]['gallery_id']));
			$blog_number_row = $blog_number->fetch();

			if(!empty($blog_number_row)){
				$photo=explode(',', $blog_number_row['position']);
				$photo_count=count($photo);
			}
		}
?>
		<div class="blog">
			<div class="blog-belt">
			<?if(!empty($_GET['id'])){?><a href="/blog" class="blog_all">< все мероприятия</a><?};?>
				<div class="blog-text_block">
					<p class="blog-title"><span><?echo $row[$i]['title']?></span>
					<br>
					<?echo $row[$i]['title_small']?></p>
				</div>
				<img src="<?echo $row[$i]['img']?>" alt="">
				<p class="blog-date">
					<?$row[$i]['date'] = explode('.',date('d.m' ,$row[$i]['date']));?>
					<span><?echo $row[$i]['date'][0]?></span>.<?echo $row[$i]['date'][1]?>
				</p>
				<ul class="blog-social">
					<a href="http://vk.com/share.php?url=http%3A%2F%2F<?echo $_SERVER['HTTP_HOST']?>/backend/blog_repost.php?id=<?echo $row[$i]['id']?>"><li class="blog-social-vk"></li></a>
					<a href="http://www.facebook.com/sharer.php?u=http%3A%2F%2F<?echo $_SERVER['HTTP_HOST']?>/backend/blog_repost.php?id=<?echo $row[$i]['id']?>"><li class="blog-social-fb"></li></a>
					<a href="http://twitter.com/share?url=http%3A%2F%2F<?echo $_SERVER['HTTP_HOST']?>/blog/<?echo $row[$i]['id']?>&text=<?echo $row[$i]['title']." ".$row[$i]['title_small']?>"><li class="blog-social-tw"></li></a>	
				</ul>
				<!-- <div class="blog-social addthis_sharing_toolbox"></div> -->
				<?if($photo_count!=0){?><a href="gallery_one.php?url_name=<?echo $blog_number_row['url_name']?>" class="blog-number"><?echo $photo_count;?><span></span></a><?}?>
				<div class="blog-text-belt">
					<p class="blog-text"><?echo $row[$i]['text']?></p>
				</div>
				<div class="blog-text_display">
					<ul><li></li><li></li><li></li></ul>
				</div>
			</div>
		</div>
<?	}elseif ($url=='index'){?>		
			<div class="news">
				<a href="/blog.php?id=<?echo $row[$i]['id']?>">
					<img src="<?echo $row[$i]['img']?>" alt="<?echo $row[$i]['title']?>" class="news_img">
					<div class="news-text">
						<p class="news-date"><?echo date('d.m' ,$row[$i]['date']);?></p>
						<p class="news-title"><?echo $row[$i]['title'].'<br>'.$row[$i]['title_small']?></p>
					</div>
				</a>	
			</div>
	<?}		
}?>
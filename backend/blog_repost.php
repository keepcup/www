<?
if (in_array($_SERVER['HTTP_USER_AGENT'], array(
  'facebookexternalhit/1.1 (+https://www.facebook.com/externalhit_uatext.php)',
  'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)'
))) {
  //it's probably Facebook's bot
	include "../db.php";
	$select = $db->prepare("SELECT * FROM blog WHERE id=?");
	$select->execute(array($_GET['id']));
	$row = $select->fetchAll();
	$select_count = $select->rowCount();
	for($i=0;$i<$select_count;$i++){
		
			$photo_count=0;
			if($row[$i]['gallery_id'] !=0){
				$blog_number = $db->prepare("SELECT photo,url_name FROM gallery WHERE id=?");
				$blog_number->execute(array($row[$i]['gallery_id']));
				$blog_number_row = $blog_number->fetch();
				$photo=explode(',', $blog_number_row['photo']);
				$photo_count=count($photo);
			}
			
	?>
		<head>
			<meta property="og:type"            content="article" /> 
			<meta property="og:title"           content="<?echo $row[$i]['title']?>" />
			<meta property="og:url"           	content="<?echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>" />
			<meta property="og:image"           content="http://test.asartdesign.ru/images/blog/images/smashbox.jpg" />
			<meta property="og:description"     content="wleifuahewliufhalwueifhlawieflaiebfliaewbflaiwebfliawbeflibawleifblawiebflawbeflawbe" />
		</head>
			<!-- <div class="blog">
				<div class="blog-belt">
					<div class="blog-text_block">
						<p class="blog-title"><span><?echo $row[$i]['title']?></span>
						<br>
						<?echo $row[$i]['title_small']?></p>
					</div>
					<img class="blog-img" src="../images/blog/images/<?echo $row[$i]['photo']?>" alt="<?echo $row[$i]['url_name']?>">
					<p class="blog-date">
						<span><?echo date('d',strtotime($row[$i]['date']))?></span><?echo date('.m',strtotime($row[$i]['date']))?>
					</p>
					<?if($photo_count!=0){?><a href="<?echo $blog_number_row['url_name']?>" class="blog-number"><?echo $photo_count?><span></span></a><?}?>
					<div class="blog-text-belt">
						<p class="blog-text"><?echo $row[$i]['text']?></p>
					</div>
			</div> -->

	<?}
}
else {
  //that's not Facebook
	header("Location: http://test.asartdesign.ru/blog_soc_test.php");
	die();

}

 ?>
 <!-- social buttons -->

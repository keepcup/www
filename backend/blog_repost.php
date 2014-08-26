<?
if (in_array($_SERVER['HTTP_USER_AGENT'], array(
  'facebookexternalhit/1.1 (+https://www.facebook.com/externalhit_uatext.php)',
  'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)'
))) || (in_array($_SERVER['HTTP_USER_AGENT'], 'Twitterbot')) {
  //it's probably Facebook's bot
	include "../db.php";
	$select = $db->prepare("SELECT * FROM blog WHERE id=?");
	$select->execute(array($_GET['id']));
	$row = $select->fetchAll();
	$select_count = $select->rowCount();			
	?>
		<head>
			<meta property="og:type"            content="article" /> 
			<meta property="og:title"           content="<?echo $row[$i]['title']." ".$row[$i]['title_small']?>" />
			<meta property="og:url"           	content="<?echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>" />
			<meta property="og:image"           content="<?echo "http://".$_SERVER['HTTP_HOST']."/images/blog/images/".$row[$i]['photo']?>" />
			<meta property="og:description"     content="<?echo $row[$i]['text']?>" />
		</head>
			<!-- <div class="blog">
				<div class="blog-belt">
					<div class="blog-text_block">
						<p class="blog-title"><span><?echo $row[$i]['title']?></span>
						<br>
						<?echo $row[$i]['title_small']?></p>
					</div>
					<img class="blog-img" src="../images/blog/images/<?echo $row[$i]['photo']?>" alt="<?echo $row[$i]['url_name']?>">
					<div class="blog-text-belt">
						<p class="blog-text"><?echo $row[$i]['text']?></p>
					</div>
			</div> -->

	<?} else {
  //that's not Facebook
	header("Location: http://test.asartdesign.ru/blog_soc_test.php");
	die();

}

 ?>
 <!-- social buttons -->

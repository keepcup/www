<?php
if ((in_array($_SERVER['HTTP_USER_AGENT'], array(
  'facebookexternalhit/1.1 (+https://www.facebook.com/externalhit_uatext.php)',
  'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)'
))) || (in_array($_SERVER['HTTP_USER_AGENT'], array('Mozilla/5.0 (compatible; vkShare; +http://vk.com/dev/Share)')))) {
  //it's probably Facebook's bot
	include "../db.php";
	$select = $db->prepare("SELECT * FROM blog WHERE id=?");
	$select->execute(array($_GET['id']));
	$row = $select->fetch();
	?>
		<head>
			<meta property="og:type"            content="article" /> 
			<meta property="og:title"           content="<?echo $row['title']." ".$row['title_small']?>" />
			<meta property="og:url"           	content="<?echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."?id=".$row['id']?>" />
			<meta property="og:image"           content="<?echo "http://".$_SERVER['HTTP_HOST'].$row['img']?>" />
			<meta property="og:description"     content="<?echo $row['text']?>" />
		</head>
			<div class="blog">
				<div class="blog-belt">
					<div class="blog-text_block">
						<p class="blog-title"><span><?echo $row['title']?></span>
						<br>
						<?echo $row['title_small']?></p>
					</div>
					<img class="blog-img" src="<?echo $row['img']?>" alt="">
					<div class="blog-text-belt">
						<p class="blog-text"><?echo $row['text']?></p>
					</div>
			</div>

	<?php
	} else {
  //that's not Facebook
		$host = $_SERVER['HTTP_HOST'];
		$id   = $_GET['id'];
		header("Location: http://".$host."/blog.php?id=".$id);
		die();

}

 ?>
 <!-- social buttons -->

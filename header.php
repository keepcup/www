<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Instabudka</title>
	<link rel="stylesheet" href="css/styles.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="js/js.js"></script>
</head>
<body>
<div class="container">
	<div class="header">
		<img src="images/header/logo.png" alt="" class="logo">
		<div class="title_block">
			<div class="phone"></div>
			<ul class="phone-down">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
			<p class="title">главная</p>
			<div class="menu"></div>
			<ul class="menu-down">
				<!-- <li class="menu-social">
					<div class="menu-social_1"></div>
					<div class="menu-social_2"></div>
					<div class="menu-social_3"></div>
				</li>
				<li>фотобудка</li> -->
				<li class="insta-list">
					<p>инстабудка</p>
					<p>инстамини</p>
					<p>инсташар</p>
				</li>
				<li>фотосъёмка</li>
				<li>мобильная фотостудия</li>
				<li>галерея</li>
				<li>контакты</li>
				<li>мероприятия</li>
			</ul>
			<script>
				// $('.menu').click(function(){
				// 	var menuDown = $('.menu-down');
				// 	if(menuDown.css('display') == 'none'){
				// 		menuDown.css({"display":"block"});
				// 	}else{
				// 		menuDown.css({"display":"none"});
				// 	}
				// })
			</script>
		</div>
	</div><!--header_end-->
	<!-- header-main-1180 -->
	<div class="header-main-1180">
			<div class="header-top">
				<div class="header-top-content">
					<div class="header-social">
						<ul>
							<li id="vk"><a href="vk.com"></a></li>
							<li id="fb"><a href="facebook.com"></a></li>
							<li id="gram"><a href="instagram.com"></a></li>
						</ul>
					</div>
					<a href="/"><img src="images/header/logo.jpg" alt="" class="logo" width="250"></a>
					<div class="header-contacts">
						<p class="header-contacts-phone_1">Елизавета  +7 (906) 098 26 93</p>
						<p class="header-contacts-phone_2">Александр  +7 (916) 034 62 54</p>
						<p class="header-contacts-mail">info@instabudka.ru</p>
					</div>
				</div><!-- end of top_content -->				
			</div>
			<div class="header-menu">
				<ul>
					<li><a href="/instabudka.php">фотобудка</a></li>
					<li><a href="/photography.php">фотосъёмка</a></li>
					<li><a href="/photostudio.php">мобильная фотостудия</a></li>
					<li><a href="/gallery.php">галерея</a></li>
					<li><a href="/contacts.php">контакты</a></li>
					<li><a href="/blog.php">мероприятия</a></li>
				</ul>
			</div>
		</div><!-- end of header-main-1180 -->
<?include "db.php";?>
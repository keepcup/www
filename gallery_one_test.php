<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Instabudka</title>
	<link rel="stylesheet" href="css/styles.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="js/js.js"></script>
	<!-- Add fancyBox -->
	<link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<script type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

	
</head>
<body>
<div class="container">
	<div class="header">
		<img src="images/header/logo.png" alt="" class="logo">
		<div class="title_block">
			<div class="phone"></div>
			<ul class="phone-down">
				<li class="phone-contact">Елизавета +7 (906) 098 26 93</li>
				<li class="phone-contact">Александр +7 (916) 034 62 54</li>
				<li class="phone-social">
					<a href="/"><div class="phone-social_1"></div></a>
					<a href="/"><div class="phone-social_2"></div></a>
					<a href="/"><div class="phone-social_3"></div></a>
				</li>
				<li>
					<div class="order_button">
						<p>Заказать фотобудку</p>						
					</div>
				</li>
			</ul>
			<p class="title">главная</p>
			<div class="menu"></div>
			<ul class="menu-down">
				<li class="insta-list">
					<a href="/instabudka.php">инстабудка</a>
					<a href="/instamini.php">инстамини</a>
					<a href="/instashar.php">инсташар</a>
				</li>
				<li><a href="/photography.php">фотосъёмка</a></li>
				<li><a href="/photostudio.php">мобильная фотостудия</a></li>
				<li><a href="/gallery.php">галерея</a></li>
				<li><a href="/contacts.php">контакты</a></li>
				<li><a href="/blog.php">мероприятия</a></li>
			</ul>
			<script>
				var menuDown = $('.menu-down');
				var menu = $('.menu');
				var phoneDown = $('.phone-down');
				var phone = $('.phone');
				$('.menu').click(function(){					
					if(menuDown.css('display') == 'none'){
						menuDown.css({"display":"block"});
						menu.css({"background":"url(../images/header/menu_pikt_active.png)"});
						phoneDown.css({"display":"none"});
						phone.css({"background":"url(../images/header/phone_pikt.png)"});
					}else{
						menuDown.css({"display":"none"});
						menu.css({"background":"url(../images/header/menu_pikt.png)"});

					}
				})
				$('.phone').click(function(){
					if(phoneDown.css('display') == 'none'){
						phoneDown.css({"display":"block"});
						phone.css({"background":"url(../images/header/phone_pikt_active.png)"});
						menuDown.css({"display":"none"});
						menu.css({"background":"url(../images/header/menu_pikt.png)"});
					}else{
						phoneDown.css({"display":"none"});
						phone.css({"background":"url(../images/header/phone_pikt.png)"});

					}
				})
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
					<li class="insta-butt">
						<a href="#">фотобудка</a>
						<ul class="header-menu-down">
							<li><a href="/instabudka.php">Инстабудка</a></li>
							<li><a href="/instamini.php">Инстамини</a></li>
							<li><a href="/instashar.php">инсташар</a></li>
						</ul>
					</li>
					<li><a href="/photography.php">фотосъёмка</a></li>
					<li><a class="active-url" href="/photostudio.php">мобильная фотостудия</a></li>
					<li><a href="/gallery.php">галерея</a></li>
					<li><a href="/contacts.php">контакты</a></li>
					<li><a href="/blog.php">мероприятия</a></li>
				</ul>
			</div>			
		</div><!-- end of header-main-1180 -->
	<?include "db.php";?>
	<div class="content content_test">
		<a class="fancybox" rel="group" href="images/index/instabudka_header.jpg"><img src="images/gallery/images/smashbox/test.jpg" alt="" /></a>
		<a class="fancybox" rel="group" href="images/index/instabudka_header.jpg"><img src="images/gallery/images/smashbox/test.jpg" alt="" /></a>
		
	</div><!-- end of content -->

	<div class="footer">
		<div class="social-footer">
			<ul class="social-footer">
				<li><a href="/" class="vk_ft"></a></li>
				<li><a href="/" class="fb_ft"></a></li>
				<li><a href="/" class="inst_ft"></a></li>
			</ul>
		</div>
		<div class="order_button">
			<p>заказать фотобудку</p>
		</div>
		<p class="asart">разработка проекта <a href="http://asartdesign.ru/">Asart group</a></p>
	</div>
	<!-- footer-main-1180 -->
		<div class="footer-main-1180">
			<div class="footer-content">
				<div class="footer-left">
					<div class="footer-menu">
						<ul>
							<li><a href="/">фотобудка</a></li>
							<li><a href="/">фотосъёмка</a></li>
							<li><a href="/">мобильная фотостудия</a></li>
							<li><a href="/">галерея</a></li>
							<li><a href="/">контакты</a></li>
							<li><a href="/">мероприятия</a></li>
						</ul>
					</div>
					<div class="footer-links">
						<ul>
							<li><a href="/">&bull; инстабудка</a></li>
							<li><a href="/">&bull; инстамини</a></li>
							<li><a href="/">&bull; инсташар</a></li>
						</ul>
						<ul>
							<li><a href="/">&bull; на связи</a></li>
							<li><a href="/">&bull; наши клиенты</a></li>
							<li><a href="/">&bull; форма заказа</a></li>
						</ul>
					</div>
					<div class="footer-logos">
						<a href="/" id="asart_logo"></a>
						<div class="footer-razrab">
							<p>разработка проекта</p>
							<a href="/">Asart group</a>
						</div>
					</div>
				</div>
				<!-- EOF left -->
				<div class="footer-right">
					<div class="footer-social">
						<ul>
							<li id="ft_vk"><a href="vk.com"></a></li>
							<li id="ft_fb"><a href="facebook.com"></a></li>
							<li id="ft_gram"><a href="instagram.com"></a></li>
						</ul>
					</div>
					<div class="footer-contacts">
						<p>Елизавета +7 (906) 098 26 93</p>
						<p>Александр +7 (916) 034 62 54</p>
						<p class="email">info@instabudka.ru</p>
					</div>
					<a href="/" class="zakaz_butt">заказать фотобудку</a>
				</div>
			</div>
			<!-- end of footer_content -->
		</div>
		<!-- end of footer -->
</div><!--container_end-->

	<script type="text/javascript">
		$(document).ready(function() {
			$(".fancybox").fancybox();
		});
	</script>
</body>
</html>
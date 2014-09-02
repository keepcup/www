<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Instabudka</title>
	<link rel="stylesheet" href="css/styles.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="js/js.js"></script>

	<!-- Add fancyBox -->
	<link rel="stylesheet" href="fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.js"></script>`
</head>
<body>
<?include "db.php";?>
<?
$contacts = $db->prepare("SELECT * FROM contacts WHERE id=1");
$contacts->execute();
$contacts_row = $contacts->fetch();
?>
<div class="container">
	<div class="header">
		<a href="/"><img src="images/header/logo.png" alt="" class="logo"></a>
		<div class="title_block">
			<div class="phone"></div>
			<ul class="phone-down">
				<li class="phone-contact">Елизавета <?echo $contacts_row['phone1']?></li>
				<li class="phone-contact">Александр <?echo $contacts_row['phone2']?></li>
				<li class="phone-social">
					<a href="<?echo $contacts_row['vk']?>"><div class="phone-social_1"></div></a>
					<a href="<?echo $contacts_row['fb']?>"><div class="phone-social_2"></div></a>
					<a href="<?echo $contacts_row['insta']?>"><div class="phone-social_3"></div></a>
				</li>
				<li><a href="/contacts.php#zakaz">
					<div class="order_button">
						<p>Заказать фотобудку</p>						
					</div></a>
				</li>
			</ul>
			<p class="title">главная</p>
			<div class="menu"></div>
			<ul class="menu-down">
				<li><a href="/index.php">главная</a></li>
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
							<li id="vk"><a href="<?echo $contacts_row['vk']?>"></a></li>
							<li id="fb"><a href="<?echo $contacts_row['fb']?>"></a></li>
							<li id="gram"><a href="<?echo $contacts_row['insta']?>"></a></li>
						</ul>
					</div>
					<a href="/"><img src="images/header/logo.jpg" alt="" class="logo" width="250"></a>
					<div class="header-contacts">
						<p class="header-contacts-phone_1">Елизавета  <?echo $contacts_row['phone1']?></p>
						<p class="header-contacts-phone_2">Александр  <?echo $contacts_row['phone2']?></p>
						<p class="header-contacts-mail"><?echo $contacts_row['mail']?></p>
					</div>
				</div><!-- end of top_content -->				
			</div>
			<div class="header-menu">
				<ul>
					<li><a href="/index.php">главная</a></li>
					<li class="insta-butt">
						<a href="#">фотобудка</a>
						<ul class="header-menu-down">
							<li><a href="/instabudka.php">Инстабудка</a></li>
							<li><a href="/instamini.php">Инстамини</a></li>
							<li><a href="/instashar.php">инсташар</a></li>
						</ul>
					</li>
					<li><a href="/photography.php">фотосъёмка</a></li>
					<li><a href="/photostudio.php">мобильная фотостудия</a></li>
					<li><a href="/gallery.php">галерея</a></li>
					<li><a href="/contacts.php">контакты</a></li>
					<li><a href="/blog.php">мероприятия</a></li>
				</ul>
			</div>	
			<script>
					pathUrl = window.location.pathname;
					pathUrl = pathUrl.split(".");
					$.each($(".header-menu, .menu-down").find('a'), function(){
						 if( $(this).attr('href') == pathUrl[0]+'.'+pathUrl[1]){
						 	$('.title').text($(this).text())
						 }

						href = $(this).attr('href').split(".");
						
						if(href[0] == pathUrl[0]){
							$(this).addClass('active-url');
						}
					});
					if(pathUrl[0]=='/'){
							$(".header-menu, .menu-down").find('a:eq(0)').addClass('active-url');
						}
					$( "li.insta-butt>ul" ).hide();
					$("li.insta-butt").mouseenter(function(){
						if ( $( "li.insta-butt>ul" ).is( ":hidden" ) ) {
						    $( "li.insta-butt>ul" ).slideDown( "fast" );
						}
					});
					$("li.insta-butt").mouseleave(function(){
						$( "li.insta-butt>ul" ).slideUp( "fast", function() {
							$( "li.insta-butt>ul" ).hide();
						});
					});
				</script>	
	</div><!-- end of header-main-1180 -->

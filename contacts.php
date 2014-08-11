<?include "header.php";$url='contacts';?>
		<div class="content contacts">
			<div class="top-block-belt">
				<div class="pennant-info">
					<div class="info">
						<p class="e-mail">E-mail: info@instabudka.ru</p>
						<p class="contacts-phone first">Елизавета +7 (906) 098 26 93</p>
						<p class="contacts-phone">Александр +7 (916) 034 62 54</p>
						<p class="social-headline">Мы в социальных сетях:</p>
						<ul class="social">
							<li class="vk"><a href="vk.com"></a></li>
							<li class="fb"><a href="facebook.com"></a></li>
							<li class="gram"><a href="instagram.com"></a></li>
						</ul>
						<p class="adress">Наш адрес: г. Москва, Варшавское шоссе 17</p>
					</div>
					<div class="pennant-tails"></div>
					<div class="photo-slide">
						<img class="photo" src="images/contacts/1180/photo-slide.jpg" alt="">
						<img class="logo" src="images/header/logo.png" alt="">
					</div>				
				</div>
				<div class="map-box">
					<div id="map">
						<script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=KUrE6VwHqlJiFB2z8uVTh10GhF55PmpO"></script>
					</div>
				</div>
				<div class="zakaz">
					<h2>Заказать фотобудку</h2>
					<p>
						просто оставьте свои контакты, и мы свяжемся с вами в ближайшее время
					</p>
					<input type="text" name="e-mail" class="e-mail" value="e-mail" onfocus="if(this.value=='e-mail') this.value='';" onblur="if(!this.value) this.value='e-mail';">
					<input type="text" name="name" class="name" value="Имя" onfocus="if(this.value=='Имя') this.value='';" onblur="if(!this.value) this.value='Имя';">
					<textarea name="comments" class="comments"></textarea>
					<p class="comments-label">ваши комментарии к заказу</p>
					<div class="button-send">
						<p>Отправить заявку</p>
					</div>
				</div>
			</div>
			<div class="clients-belt">
				<p class="clients">нас выбрали</p>
				<?include 'backend/clients.php';?>
			</div>
		</div>
<?include "footer.php";?>
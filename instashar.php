<?include "header.php";
$insta_db = $db->prepare("SELECT * FROM insta");
$insta_db->execute();
$insta_row = $insta_db->fetchAll();
?>
	<div class="content instashar">
		<div class="description">
			<div class="insta-menu">
				<div class="insta-menu-block">
					<p>инсташар</p>
					<ul>
						<li>описание</li>
						<li>функции</li>
						<li>оформление</li>
					</ul>
				</div>
			</div>
			<img class="description-img" src="<?echo $insta_row[12]['img'];?>" alt="">
			<div class="belt_1180">
				<p class="description-quote">
					<span class='quote'>«</span>
					<span class='description-quote-span'>инсташар - это инстаграм принтер </span>
					<span class='description-quote-span'>в виде шара</span>
					<span class='quote'>»</span>
				</p>
			</div>
			<h2 class="instabudka_h2">описание</h2>
			<!--<div class="description-pennant"></div>-->
			<p class="description-text">
				<span>следит за вашим #хештегом в</span><br>
				<span>instagram</span><br>
				<span>ПЕЧАТАЕТ СНИМКИ ЗА 10 СЕКУНД</span>
			</p>

			<div class="belt_1180">
				<div class="description-block">
					<p class=" description-block_1">
						15 секунд<br>
						на 1 фото<br>
					</p>
				</div>
				<div class="description-block">
					<p class=" description-block_2">
						диаметр<br>
						шара — 60 см
					</p>
				</div>
				<div class="description-block">
					<p class=" description-block_3">
						аренда<br>
						на 4 часа<br>
						или более<br>
					</p>
				</div>
				<div class="description-block">
					<p class=" description-block_4">
						бесконечное<br>
						количество<br>
						фотографий
					</p>
				</div>
			</div>
		</div><!--description-end-->
		<div class="function">
			<img class="description-img" src="<?echo $insta_row[13]['img'];?>" alt="">
			<div class="belt_1180">
				<p class="description-quote function-quote">
					<span class='quote'>«</span>
					<span class='description-quote-span'>мгновенные красочные</span>
					<span class='description-quote-span'>фотографии, которые будут </span>
					<span class='description-quote-span'>напечатаны прямо на месте </span>
					<span class='description-quote-span'>из сети Instagram</span>					
					<span class='quote'>»</span>
				</p>
				<h2 class="instabudka_h2">функции</h2>
				<div class="function-block">
					<div class="function-block-content">
						<p class="function-block_1">
							оригинальный дизайн
						</p>
						<img class="function-img function-img-first" src="<?echo $insta_row[14]['img'];?>" alt="123">
						<p class="function-block_2">
							Уникальный дизайн инстаграм принтера в форме сферы; возможность установить на любой ровной поверхности или опциональной стойке; компактные размеры.
						</p>
					</div>
				</div><!--function-block-end-->
				<div class="function-block">
					<div class="function-block-content">
						<p class="function-block_1">
							мягкая цветная подсветка
						</p>
						<img class="function-img" src="images/instabudka/desc_test.jpg" alt="">
						<p class="function-block_2">
							Наш инстаграм принтер обладает встроенной цветной подсветкой, которая может светится разными цветами.
						</p>
					</div>
				</div><!--function-block-end-->
				<div class="function-block">
					<div class="function-block-content">
						<p class="function-block_1">
							безлимитная печать
						</p>
						<img class="function-img" src="images/instabudka/desc_test.jpg" alt="">
						<p class="function-block_2">
							В нашем Инсташаре встроен термосублимационный принтер с высокой скоростью печати, а также мощное программное обеспечение.
						</p>
					</div>
				</div><!--function-block-end-->
			</div>
		</div><!--function-end-->
		<div class="decor">
			<img class="description-img" src="<?echo $insta_row[15]['img'];?>" alt="">
			<div class="belt_1180">
				<p class="description-quote decor-quote">
						<span class='quote'>«</span> 
						<span class='description-quote-span'>инсташар дарит праздник всем</span>
						<span class='description-quote-span'>гостям на мероприятии</span>
						<span class='quote'>»</span>
					</p>
				<h2 class="instabudka_h2">оформление</h2>
				<div class="function-block">
					<div class="function-block-content">
						<p class="function-block_1 decor-block_1">
							брендирование <span>инстаграм принтера</span>
						</p>
						<img class="function-img function-img-first" src="<?echo $insta_row[16]['img'];?>" alt="">
						<ul class="function-block_2">
							<li>Бесплатная разработка дизайн макета внешней поверхности Инсташара;</li>
							<li>печать наклеек на поверхность с подсветкой для вашего бренда; </li>
							<li>нанесение #хештега на поверхность.</li>
						</ul>				  
					</div>
				</div><!--function-block-end-->
				<div class="function-block">
					<div class="function-block-content">
						<p class="function-block_1 decor-block_1">
							брендирование фотографий
						</p>
						<img class="function-img" src="images/instabudka/desc_test.jpg" alt="">
						<ul class="function-block_2 ">
							<li>Бесплатная разработка дизайн макета фотографий. </li>
							<li>Размер фотографий: 10х15. </li>
							<li>Возможность размещать до 8-ми кадров на 1 фото.</li>
						</ul>
					</div>
				</div><!--function-block-end-->
			</div>
		</div><!--decor-end-->
		<div class="other_gallery">
			<div class="line"></div>
			<p><a href="/gallery" class="other_gallery-text">галерея мероприятий</a></p>
			<div class="line"></div>
		</div>
	</div><!--content_end-->
<?include "footer.php";?>
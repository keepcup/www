<?include "header.php";?>
		<div class="content photostudio">
			<div class="photostudio-belt">
				<?
				$insta_db = $db->prepare("SELECT * FROM insta WHERE id = 13");
				$insta_db->execute();
				$insta_row = $insta_db->fetch();
				?>
				<img src="<?echo $insta_row['img'];?>" alt="">
				<ul>
					<li>выезд профессиональных фотографов на ваш праздник – свадьбу, корпоратив или другое событие</li>
					<li>фотосъемка со студийным освещением и оборудованием</li>
					<li>мгновенная печать фотоснимков размера 15х20 или 10х15</li>
					<li>при желании нанесение логотипа или любой надписи на фотографии</li>
				</ul>
				<div class="description">
					<p>Вы можете заказать как полностью услуги мобильной фотостудии, так и отдельно услуги фотографа или фотопечать.</p>
				</div>
			</div>
		</div>
<?include "footer.php";?>
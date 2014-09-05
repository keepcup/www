<?include "header.php";$url='index';?>
<script src="/js/idangerous.swiper-2.1.min.js"></script>
<!-- <script src="/js/idangerous.swiper.min.js"></script> -->
	<div class="content">
		<?
		$position = $db->prepare("SELECT * FROM position");
		$position->execute();
		$position_row = $position->fetch();
		$main_slider = $position_row['mainSlider'];
		$main_clients = $position_row['mainClients'];
		$slider = $db->prepare("SELECT * FROM main_slider ORDER BY FIELD( position,  $main_slider)");
		$slider->execute();
		$slider_row = $slider->fetchAll();
		$slider_count = $slider->rowCount();
		?>
		<div class="swiper-container">
			<div class="button-swiper-left"></div>
			<div class="swiper-wrapper">
				<?for($i=0;$i<$slider_count;$i++){?>
				<div class="swiper-slide">
				   <img src="<?echo $slider_row[$i]['img'];?>" alt="" class="slider_img ">
				</div>
				<?}?>
		    </div>
		    <div class="button-swiper-right"></div>
		</div>
		<h1 class="main-h1"><span>выездные фотобудки</span> <span>в аренду</span></h1>
		<div class="insta_block">
			<a href="/instabudka">
			<div class="insta insta_1">
				<p class="insta_text">инстабудка</p>
			</div>
			</a>
			<a href="/instamini">
			<div class="insta insta_2">
				<p class="insta_text">инстамини</p>
			</div>
			</a>
			<a href="/instashar">
			<div class="insta insta_3">
				<p class="insta_text">инсташар</p>
			</div>
			</a>
		</div>
		<div class="belt">
			<h2 class="main-h2">новости</h2>
				<?include 'backend/blog.php';?>
			<p class="clients">нас выбрали</p>
			<?include 'backend/clients.php';?>
		</div><!--belt-end-->
		<div class="other_clients">
			<p><a href="/contacts#clients" class="other_clients-text">другие клиенты</a></p>
			<div class="pennant"></div>
		</div>
	</div><!--content_end-->
	<script>
			window.onload = function() {
				var mySwiper = new Swiper('.swiper-container',{
					freeModeFluid: true,
				    autoplay: 20000,
				    autoplayDisableOnInteraction: false,
				    speed: 500,
				    calculateHeight:true,
				    loop: true
				})
			}
				//ReInit Swiper
				// swiper.reInit()
			var mySwiper = $('.swiper-container').swiper()
			$(window).resize(function(){
				//Unset height
				$('.swiper-container').css({height:''})
				//Calc Height
				$('.swiper-container').css({height: $('.swiper-container').find('img').height()})
				//ReInit Swiper
				mySwiper.reInit()
				page_w = $("html").width()
			})
				page_w = $("html").width();	
				$('.button-swiper-left').click(function(){
					mySwiper.swipePrev()
				})
				$('.button-swiper-right').click(function(){
					mySwiper.swipeNext()
				})
				$('.main-h1').mouseenter(function(){
					if (page_w >= 1180){
						$('.button-swiper-left').css({'display': 'block'});
						$('.button-swiper-right').css({'display': 'block'});
					}
				})
				$('.swiper-container').mouseenter(function(){
					if (page_w >= 1180){
						$('.button-swiper-left').css({'display': 'block'});
						$('.button-swiper-right').css({'display': 'block'});
					}
				})
				$('.swiper-container, .main-h1').mouseleave(function(){
					if (page_w >= 1180){
						$('.button-swiper-left').css({'display': 'none'});
						$('.button-swiper-right').css({'display': 'none'});
					}
				})
	</script>
<?include "footer.php";?>
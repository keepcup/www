<?include "header.php";$url='index';?>
<script src="/js/idangerous.swiper-2.1.min.js"></script>
<!-- <script src="/js/idangerous.swiper.min.js"></script> -->
	<div class="content">
		<?
		$slider = $db->prepare("SELECT * FROM main_slider");
		$slider->execute();
		$slider_row = $slider->fetchAll();
		$slider_count = $slider->rowCount();
		?>
		<div class="swiper-container">
			<div class="button-swiper-left"></div>
			<div class="swiper-wrapper">
				<?for($i=0;$i<$slider_count;$i++){?>
				<div class="swiper-slide">
				   <img src="images/index/slider/<?echo $slider_row[$i]['img'];?>" alt="" class="slider_img ">
				</div>
				<?}?>
		    </div>
		    <div class="button-swiper-right"></div>
		</div>
		<h1 class="main-h1"><span>выездные фотобудки</span> <span>в аренду</span></h1>
		<div class="insta_block">
			<div class="insta insta_1">
				<p class="insta_text">инстабудка</p>
			</div>
			<div class="insta insta_2">
				<p class="insta_text">инстамини</p>
			</div>
			<div class="insta insta_3">
				<p class="insta_text">инсташар</p>
			</div>
		</div>
		<div class="belt">
			<h2 class="main-h2">новости</h2>
				<?include 'backend/blog.php';?>
			<p class="clients">нас выбрали</p>
			<?include 'backend/clients.php';?>
		</div><!--belt-end-->
		<div class="other_clients">
			<p><a href="" class="other_clients-text">другие клиенты</a></p>
			<div class="pennant"></div>
		</div>
	</div><!--content_end-->
	<script>
		$(document).ready(function(){
			//Unset height
			$('.swiper-container').css({height:''})
			//Calc Height
			$('.swiper-container').css({height: $('.swiper-container').find('img').height()})
			//ReInit Swiper
			swiper.reInit()
		})
		var mySwiper = new Swiper('.swiper-container',{
			freeModeFluid: true,
		    autoplay: 20000,
		    autoplayDisableOnInteraction: false,
		    speed: 500,
		    loop: true
		})
		// var mySwiper = $('.swiper-container').swiper({
		// 	onTouchStart : function() {
		// 		//Do something when you touch the slide
		// 		alert('OMG you touch the slide!') 
		// 	}
		// 	onFirstInit : function () {
		// 		$('.swiper-container').css({height:''})
		// 		//Calc Height
		// 		$('.swiper-container').css({height: $('.swiper-container').find('img').height()})
		// 		//ReInit Swiper
		// 		mySwiper.reInit()
		// 	}
		// })
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
		// $('.swiper-container').css({height: $('.swiper-container').find('img').height()})
		// swiper.reInit()
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
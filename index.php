<?include "header.php";$url='index';?>
<script src="/js/idangerous.swiper-2.1.min.js"></script>
	<div class="content">
		<div class="swiper-container">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
				   <img src="images/index/instabudka_header.jpg" alt="" class="slider_img ">
				</div>
				<div class="swiper-slide">
				   <img src="images/index/instabudka_header.jpg" alt="" class="slider_img">
				</div>
				<div class="swiper-slide">
				   <img src="images/index/instabudka_header.jpg" alt="" class="slider_img">
				</div>
		    </div>
		</div>
		<h1><span>выездные фотобудки</span> <span>в аренду</span></h1>
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
		var mySwiper = new Swiper('.swiper-container',{
		    freeModeFluid: true,
		    autoplay: 5000,
		    speed: 500,
		    loop: true,
		    calculateHeight: true
		})
	</script>
<?include "footer.php";?>
<?include "header.php";$url='blog';?>
	<div class="content">
		<?include "backend/blog.php";?>
<div id="more"></div>
<?if(empty($_GET['id'])){?>
<script>
scroll = 600;
limit = 2;
$(window).scroll(function(){
 	if($(document).scrollTop() > $('#more').offset().top-600){
 		scroll+=400;
		    $.ajax({
		        url:'backend/more_blog.php',
		        method:'GET',
		        data:{limit:limit}
		    }).done(function(data){
		        if(data.length>0){
		            $("#more").before(data);
		        }
		    });
		limit+=2;
 	}
});

$(".blog-text_display").toggle(
	function(){
		$(this).closest(".blog-belt").find(".blog-text").css("max-height", "+=200");
	}, function() {
		$(this).closest(".blog-belt").find(".blog-text").css("max-height", "-=200");
	});
<?}?>
</script>
<?include "footer.php";?>
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

$(".blog-text_display").live( "click", function() {
	var blog = $(this).closest(".blog-belt").find(".blog-text");
	if (blog.css("max-height") == "160px") {
		blog.css("max-height", "none").css("margin-bottom", "70px");
	} else {
		blog.css("max-height", "160px").css("margin-bottom", "0");
	};
});

<?}?>
</script>
<?include "footer.php";?>


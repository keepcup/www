$(document).ready(function(){
	$('.close_gallery').on('keyup',function(){
		var close_gallery = $(this);
		var id = close_gallery.prev().text();
		var password= close_gallery.val();
		var count = password.length;
		if(count==3){
			$.post("gallery_test.php", {password: password,id:id},success);
			function success(fbf){
				if(fbf=='1'){
					close_gallery.css({"border-color":"#33cc99"});
					close_gallery.next().css({"background":"#33cc99","color":"#fff"});
					
				}
			}
		}
	});

})/*end*/
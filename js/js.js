$(document).ready(function(){
	$('.close_gallery').on('keyup',function(){
		var close_gallery = $(this);
		var id = close_gallery.prev().text();
		var password= close_gallery.val();
		var count = password.length;
		if(count==3){
			$.post("backend/close_gallery.php", {password: password,id:id},success);
			function success(fbf){
				if(fbf!=''){
					close_gallery.css({"border-color":"#33cc99"});
					close_gallery.next().css({"background":"#33cc99","color":"#fff"}).attr({"onclick":"","href":"/images/gallery/close/"+fbf});

				}
			}
		}
	});
    

})/*end*/

$(document).ready(function(){
        $(window).scroll(function(){ //во время прокрутки страницы
									 //проверяем прошли ли мы хедер-высоту менюшки
            if ($(window).scrollTop()>$(".header-main-1180").height()-$(".header-menu").height()-5){
                $(".header-menu").addClass("sticky-1180");//назначаем класс
            } else {
//если не достигли указанной высоты или когда проскролили вверх страницы удаляем класс
                $(".header-menu").removeClass("sticky-1180");
            }
            // то же для моб и планшетной версии
            if ($(window).scrollTop()>$(".header").height()-$(".title-block").height()-40){
                $(".title_block").addClass("sticky");//назначаем класс
            } else {
                $(".title_block").removeClass("sticky");
            }
        });
})
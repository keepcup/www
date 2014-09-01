$(document).ready(function(){
	$('.close_gallery').on('keyup',function(){
		var close_gallery = $(this);
		var id = close_gallery.prev().text();
		var password= close_gallery.val();
		var count = password.length;
		if(count>2){
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
                $(".insta-menu").addClass("sticky-1180-insta");
            } else {
//если не достигли указанной высоты или когда проскролили вверх страницы удаляем класс
                $(".header-menu").removeClass("sticky-1180");
                $(".insta-menu").removeClass("sticky-1180-insta");
            }
            // то же для моб и планшетной версии
            if ($(window).scrollTop()>$(".header").height()-$(".title-block").height()-40){
                $(".title_block").addClass("sticky");//назначаем класс
            } else {
                $(".title_block").removeClass("sticky");
            }

            // insta-menu lightning
            var descr = $(".content").find("h2:contains('описание')");
            var func = $(".content").find("h2:contains('функции')");
            var decor = $(".content").find("h2:contains('оформление')");
            var feat = $(".content").find("h2:contains('особенности')");
            var onPoint = 170;
            if (descr.offset().top - $(window).scrollTop() < onPoint && func.offset().top - $(window).scrollTop() >= onPoint && $(".insta-menu").find("li:contains("+descr.text()+")").hasClass("active-url") == false) {
            	$(".insta-menu").find("li").removeClass("active-url")
            	$(".insta-menu").find("li:contains("+descr.text()+")").addClass("active-url");
            } else if (func.offset().top - $(window).scrollTop() < onPoint && decor.offset().top - $(window).scrollTop() >= onPoint && $(".insta-menu").find("li:contains("+func.text()+")").hasClass("active-url") == false) {
            	$(".insta-menu").find("li").removeClass("active-url")
            	$(".insta-menu").find("li:contains("+func.text()+")").addClass("active-url");
            } else if (decor.offset().top - $(window).scrollTop() < onPoint && $(".insta-menu").find("li:contains("+decor.text()+")").hasClass("active-url") == false) {
            	if ($(location).attr('pathname') == '/instashar.php') {
            		$(".insta-menu").find("li").removeClass("active-url")
            		$(".insta-menu").find("li:contains("+decor.text()+")").addClass("active-url");
            	} else if (feat.offset().top - $(window).scrollTop() >= onPoint) {
            		$(".insta-menu").find("li").removeClass("active-url")
            		$(".insta-menu").find("li:contains("+decor.text()+")").addClass("active-url");
            	}         	
            } else if (feat.offset().top - $(window).scrollTop() < onPoint && $(".insta-menu").find("li:contains("+feat.text()+")").hasClass("active-url") == false) {
            	$(".insta-menu").find("li").removeClass("active-url")
            	$(".insta-menu").find("li:contains("+feat.text()+")").addClass("active-url");
            }
        });

        $(".insta-menu").find("li").click(function(){ 
        	var txt = $(this).text();    	
        	$('html, body').animate({scrollTop: $(".content").find("h2:contains("+txt+")").offset().top-160}, 300);
        })

})
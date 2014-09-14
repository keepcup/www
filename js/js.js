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
    pathUrl = window.location.pathname;
    pathUrl = pathUrl.split(".");
    $(window).scroll(function(){
    	if (pathUrl[0].indexOf("/insta") >= 0) {
    		if ($(window).scrollTop()>$(".header-main-1180").height()-5) {
    			$(".insta-menu").addClass("sticky-1180-insta");
    		} else {
    			$(".insta-menu").removeClass("sticky-1180-insta");
    		}
    	} else if ($(window).scrollTop()>$(".header-main-1180").height()-$(".header-menu").height()-5){
            $(".header-menu").addClass("sticky-1180");//назначаем класс
        } else {
            $(".header-menu").removeClass("sticky-1180");
        }
        if ($(window).scrollTop()>$(".header").height()-$(".title-block").height()-40){
             $(".title_block").addClass("sticky");//назначаем класс
        } else {
            $(".title_block").removeClass("sticky");
        }
    });

    if($('.insta-menu').length >0 ){
        $('.insta-butt').children('a').addClass('active-url')
        $(window).scroll(function(){ //во время прокрутки страницы
									 //проверяем прошли ли мы хедер-высоту менюшки          
  			//если не достигли указанной высоты или когда проскролили вверх страницы удаляем класс                
            // то же для моб и планшетной версии          
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
            	if (pathUrl[0].indexOf("instashar") >= 0) {
            		$(".insta-menu").find("li").removeClass("active-url")
            		$(".insta-menu").find("li:contains("+decor.text()+")").addClass("active-url");
            	} else if (feat.offset().top - $(window).scrollTop() >= onPoint) {
            		$(".insta-menu").find("li").removeClass("active-url")
            		$(".insta-menu").find("li:contains("+decor.text()+")").addClass("active-url");
            	}         	
            } else if (pathUrl[0].indexOf("instashar") <= 0) {
	            if (feat.offset().top - $(window).scrollTop() < onPoint && $(".insta-menu").find("li:contains("+feat.text()+")").hasClass("active-url") == false) {
	            	$(".insta-menu").find("li").removeClass("active-url")
	            	$(".insta-menu").find("li:contains("+feat.text()+")").addClass("active-url");   
	        	}
	        }
        });

        $(".insta-menu").find("li").click(function(){ 
        	var txt = $(this).text();    	
        	$('html, body').animate({scrollTop: $(".content").find("h2:contains("+txt+")").offset().top-160}, 300);
        })
     }
    var hashData = location.hash;
    hashData = hashData.split('#');
    if(hashData!=''){
        $('html, body').animate({
            scrollTop: $('.'+hashData[1]).offset().top-150
            }, 0);
    }
    $('.button-send').click(function(){
        $('#contacts_from').submit();
    })
    // header
    pathUrl = window.location.pathname;
    $.each($(".header-menu, .menu-down").find('a'), function(){
        if( $(this).attr('href') == pathUrl){
            $('.title').text($(this).text())
        }
        href = $(this).attr('href');
        if(href == pathUrl){
            $(this).addClass('active-url');
        }
    });
    if(pathUrl=='/'){
        $(".header-menu, .menu-down").find('a:eq(0)').addClass('active-url');
    }
                    $( "li.insta-butt>ul" ).hide();
                    $("li.insta-butt").mouseenter(function(){
                        if ( $( "li.insta-butt>ul" ).is( ":hidden" ) ) {
                            $( "li.insta-butt>ul" ).slideDown( "fast" );
                        }
                    });
                    $("li.insta-butt").mouseleave(function(){
                        $( "li.insta-butt>ul" ).slideUp( "fast", function() {
                            $( "li.insta-butt>ul" ).hide();
                        });
                    });
    var menuDown = $('.menu-down');
                var menu = $('.menu');
                var phoneDown = $('.phone-down');
                var phone = $('.phone');
                $('.menu').click(function(){                    
                    if(menuDown.css('display') == 'none'){
                        menuDown.css({"display":"block"});
                        menu.css({"background-position":"-32px 0"});
                        phoneDown.css({"display":"none"});
                        phone.css({"background-position":"0 0"});
                    }else{
                        menuDown.css({"display":"none"});
                        menu.css({"background-position":"0 0"});

                    }
                })
                $('.phone').click(function(){
                    if(phoneDown.css('display') == 'none'){
                        phoneDown.css({"display":"block"});
                        phone.css({"background-position":"-41px 0"});
                        menuDown.css({"display":"none"});
                        menu.css({"background-position":"0 0"});
                    }else{
                        phoneDown.css({"display":"none"});
                        phone.css({"background-position":"0 0"});

                    }
                })
})
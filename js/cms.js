$(document).ready(function(){
    $('.gallery-edit-form').live('mouseenter',function(){
        $(this).find('.upload_preview').addClass('scroll-content');
        $(this).find('.sortable_edit').append('<div class="slider-wrap"><div class="slider-vertical ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" style="height: 461px; margin-top: 217px;"><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="bottom: 100%; height: 434px; margin-bottom: -217px;"></a></div></div>');
        $(this).closest('.sbscroller').removeClass('scroll-pane');
        $(this).closest('.scroll-content').removeClass('scroll-content');
        $(this).closest('.upload_preview').next('div').remove();
        $('.sortable_edit').sbscroller('refresh');
    })
    $('.gallery-edit-form').live('mouseleave',function(){
        $(this).closest('.sbscroller').addClass('scroll-pane');
        $(this).closest('.upload_preview').addClass('scroll-content');
        $(this).closest('.sbscroller').append('<div class="slider-wrap"><div class="slider-vertical ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" style="height: 461px; margin-top: 217px;"><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="bottom: 100%; height: 434px; margin-bottom: -217px;"></a></div></div>');
        $(this).find('.upload_preview').removeClass('scroll-content');
        $(this).find('.sortable_edit').find('.slider-wrap').remove();
        $('.sbscroller').sbscroller('refresh');
        $(this).closest('.sbscroller').find('.slider-wrap').css({"display":"block"});
    })
    // $('.gallery').click(function(){
    //     $(this).closest('.right-content').find('.gallery-edit-form').remove();
    //     $(this).fadeOut(0);
    //     $(this).after('<div class="gallery-edit-form"><div class="CMS-buttons"><input type="text" name="h_1" class="h_1" value="ЗАГОЛОВОК 1"><input type="text" name="date" class="date" value="ДАТА"><p class="label-date">в формате 01.02</p><input type="text" name="h_2" class="h_2" value="Заголовок 2"><input type="text" name="pass" class="pass" value="ПАРОЛЬ"><p class="label-pass">максимум 5 символов</p></div><div class="gallery-photos"><div class="photo-left"><p class="top-label">Фотографии</p><div class="button"><p>Добавить фото</p><form class="frm"><input type="file" multiple class="upload_btn" /></form></div><div class="button save"><p>Сохранить</p></div><div class="button decline"><p>Отменить</p></div></div><div class="CMS-prewiew photo sortable_edit" ondragover="return false" ondragstart="return false"><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div></div></div></div>')
    //     $('.sortable_edit').sbscroller();
    //     $(".sortable_edit").find('.upload_preview').sortable({ revert:true, cancel: ".ps-scrollbar-y-rail"});
    // })
    $('.gallery-buttons').find('.edit').click(function(){
        $('.gallery-edit-form, .event-edit-form').not('.notfade').fadeOut(0);
        $('.gallery').fadeIn(0);
        $(this).closest('.gallery').next().fadeIn(100);
        $(this).closest('.gallery').fadeOut(0);
    });
    $('.decline').click(function(){
        $(this).closest('.gallery-edit-form, .event-edit-form').fadeOut(0);
        $(this).closest('.gallery-edit-form, .event-edit-form').prev().fadeIn(0);
    })
    // $('.new_gallery').find('.photo-preview').dblclick(function(){
    //     var $this=$(this);
    //     $('.galleryChecked').length
    //     if($this.hasClass('galleryChecked')){
    //         $this.removeClass('galleryChecked');
    //     }else{
    //         $this.addClass('galleryChecked');
    //     }
    // })

    $('.sortable_edit').sbscroller();
    $(".sortable_edit").find('.upload_preview').sortable({ revert:true, cancel: ".ps-scrollbar-y-rail"});
    $('.sortable').sbscroller();
    $('.sbscroller').sbscroller();
	$(".sortable").children().sortable({ revert:true, cancel: ".ps-scrollbar-y-rail"});
	/*input file*/
	$(".button").live('mousemove',function(e) {
        var offL, offR, inpStart, aaa;
        offL = $(this).offset().left;
        offT = $(this).offset().top;
        $(this).find("input").css({
            left:e.pageX-offL-160,
            top:e.pageY-offT-14
        })
    });
    $(".clients-prewiew input").iCheck({
        checkboxClass: 'icheckbox_minimal-green',
        increaseArea: '100%' 
    });
    $('.create_new_gallery').click(function(){
        $(this).closest('.create_gallery').next().next().addClass('display');
        create_new_gallery = $(this).closest('.create_gallery').next();
        if(create_new_gallery.hasClass('display')){
            create_new_gallery.removeClass('display');
        }else{
            create_new_gallery.addClass('display');
        }
    })
    $('.create_new_closed_gallery').click(function(){
        $(this).closest('.create_gallery').next().addClass('display');;
        create_new_gallery = $(this).closest('.create_gallery').next().next();
        if(create_new_gallery.hasClass('display')){
            create_new_gallery.removeClass('display');
        }else{
            create_new_gallery.addClass('display');
        }
    })
})/*end*/

$(document).ready(function(){
        $(window).scroll(function(){ //во время прокрутки страницы
                                     //проверяем прошли ли мы хедер-высоту менюшки
            var windowTop = $(window).scrollTop();                           
            if (windowTop>$(".header-main-1180").height()-$(".header-menu").height()-5){
                $(".header-menu").addClass("sticky-1180");//назначаем класс
            } else {
            //если не достигли указанной высоты или когда проскролили вверх страницы удаляем класс
                $(".header-menu").removeClass("sticky-1180");
            }
            // то же для моб и планшетной версии
            if (windowTop>$(".header").height()-$(".title-block").height()-40){
                $(".title_block").addClass("sticky");//назначаем класс
            } else {
                $(".title_block").removeClass("sticky");
            }
            if (windowTop >= 60 && windowTop < 1004) {
                if ($("a[href=#index]").hasClass("active-url") == false) {
                    $(".header-menu").find("a").removeClass("active-url");
                    $("a[href=#index]").addClass("active-url");
                }                
            } else if (windowTop >= 1004 && windowTop < 2064) {
                if ($("a[href=#instabudka]").hasClass("active-url") == false) {
                    $(".header-menu").find("a").removeClass("active-url");
                    $("a[href=#instabudka]").addClass("active-url");
                    $(".photobudka").addClass("active-url");
                }
            } else if (windowTop >= 2064 && windowTop < 3124) {
                if ($("a[href=#instamini]").hasClass("active-url") == false) {
                    $(".header-menu").find("a").removeClass("active-url");
                    $("a[href=#instamini]").addClass("active-url");
                    $(".photobudka").addClass("active-url");
                }
            } else if (windowTop >= 3124 && windowTop < 4024) {
                if ($("a[href=#instashar]").hasClass("active-url") == false) {
                    $(".header-menu").find("a").removeClass("active-url");
                    $("a[href=#instashar]").addClass("active-url");
                    $(".photobudka").addClass("active-url");
                }
            } else if (windowTop >= 4024 && windowTop < 4384) {
                if ($("a[href=#photography]").hasClass("active-url") == false) {
                    $(".header-menu").find("a").removeClass("active-url");
                    $("a[href=#photography]").addClass("active-url");
                }
            } else if (windowTop >= 4384 && windowTop < 4644) {
                if ($("a[href=#photostudio]").hasClass("active-url") == false) {
                    $(".header-menu").find("a").removeClass("active-url");
                    $("a[href=#photostudio]").addClass("active-url");
                }
            } else if (windowTop >= 4644 && windowTop < 5750) {
                if ($("a[href=#gallery]").hasClass("active-url") == false) {
                    $(".header-menu").find("a").removeClass("active-url");
                    $("a[href=#gallery]").addClass("active-url");
                }
            } else if (windowTop >= 5750 && windowTop < 6990) {
                if ($("a[href=#contacts]").hasClass("active-url") == false) {
                    $(".header-menu").find("a").removeClass("active-url");
                    $("a[href=#contacts]").addClass("active-url");
                }
            } else if (windowTop >= 6990 && windowTop < 7950) {
                if ($("a[href=#blog]").hasClass("active-url") == false) {
                    $(".header-menu").find("a").removeClass("active-url");
                    $("a[href=#blog]").addClass("active-url");
                }
            } else if (windowTop >= 7950) {
                if ($("a[href=#pass]").hasClass("active-url") == false) {
                    $(".header-menu").find("a").removeClass("active-url");
                    $("a[href=#pass]").addClass("active-url");
                }
            }
        });

        $('a[href^="#"]').click(function(){
            var target = $(this).attr('href');
            $('html, body').animate({scrollTop: $(target).offset().top-160}, 300);
            return false; 
        }); 
})
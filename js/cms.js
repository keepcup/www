$(document).ready(function(){
    // $('.sortable').perfectScrollbar({
    //     wheelSpeed: 20,
    //     wheelPropagation: false,
    //     suppressScrollX: false
    // });
	$(".sortable").sortable({ revert:true, cancel: ".ps-scrollbar-y-rail" });
    $('.CMS-prewiew').perfectScrollbar({
        wheelSpeed: 20,
        wheelPropagation: false,
        suppressScrollX: true
    });
	$(".sortable").not('.ps-scrollbar-y-rail').sortable({ revert:true, cancel: ".ps-scrollbar-y-rail" });

    // $('.sortable').perfectScrollbar({
    //     wheelSpeed: 20,
    //     wheelPropagation: false,
    //     suppressScrollX: false
    // });
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
        // $(this).closest('.gallery-edit-form').remove();
        $('.sbscroller').sbscroller('refresh');
        $(this).closest('.sbscroller').find('.slider-wrap').css({"display":"block"})
    })
    $('.gallery').click(function(){
        // alert($(this).closest('.right-content').find('.gallery-edit-form').html());
        $(this).closest('.right-content').find('.gallery-edit-form').remove();
        $(this).fadeOut(0);
        // $(this).append('<div class="gallery-edit-form"><div class="CMS-buttons"><input type="text" name="h_1" class="h_1" value="ЗАГОЛОВОК 1" '+onfocus="if(this.value=="ЗАГОЛОВОК 1") this.value='';" onblur="if(!this.value) this.value="ЗАГОЛОВОК 1";"+'><input type="text" name="date" class="date" value="ДАТА" onfocus="if(this.value=="ДАТА") this.value='';" onblur="if(!this.value) this.value="ДАТА";"><p class="label-date">в формате 01.02</p><input type="text" name="h_2" class="h_2" value="Заголовок 2" onfocus="if(this.value=="Заголовок 2") this.value='';" onblur="if(!this.value) this.value="Заголовок 2";"><input type="text" name="pass" class="pass" value="ПАРОЛЬ" onfocus="if(this.value=="ПАРОЛЬ") this.value='';" onblur="if(!this.value) this.value="ПАРОЛЬ";"><p class="label-pass">максимум 5 символов</p></div><div class="gallery-photos"><div class="photo-left"><p class="top-label">Фотографии</p><div class="button"><p>Добавить фото</p><form class="frm"><input type="file" multiple class="upload_btn" /></form></div><div class="button save"><p>Сохранить</p></div></div><div class="CMS-prewiew photo sortable" ondragover="return false" ondragstart="return false"><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div></div></div></div>')
        $(this).after('<div class="gallery-edit-form"><div class="CMS-buttons"><input type="text" name="h_1" class="h_1" value="ЗАГОЛОВОК 1"><input type="text" name="date" class="date" value="ДАТА"><p class="label-date">в формате 01.02</p><input type="text" name="h_2" class="h_2" value="Заголовок 2"><input type="text" name="pass" class="pass" value="ПАРОЛЬ"><p class="label-pass">максимум 5 символов</p></div><div class="gallery-photos"><div class="photo-left"><p class="top-label">Фотографии</p><div class="button"><p>Добавить фото</p><form class="frm"><input type="file" multiple class="upload_btn" /></form></div><div class="button save"><p>Сохранить</p></div></div><div class="CMS-prewiew photo sortable_edit" ondragover="return false" ondragstart="return false"><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div><div class="photo-preview"><img src="images/index/slider_test.png" alt=""><div class="close_cross"></div></div></div></div></div>')
        $('.sortable_edit').sbscroller();
        $(".sortable_edit").find('.upload_preview').sortable({ revert:true, cancel: ".ps-scrollbar-y-rail"});
         // $(this).closest('.sbscroller').sbscroller('disable');
        // alert( $(this).closest('.scroll-content').css('top'));
         // $('.sortable_edit').live('mouseenter',function(){
         //    $('.sortable').slider( "destroy" );
         // })
        // $(".sortable").find('.photo-preview').sortable({ revert:true, cancel: ".ps-scrollbar-y-rail"});
        // $(this).append('<div class="gallery-edit-form">
        //                 <div class="CMS-buttons">
        //                     <input type="text" name="h_1" class="h_1" value="ЗАГОЛОВОК 1">
        //                     <input type="text" name="date" class="date" value="ДАТА">
        //                     <p class="label-date">в формате 01.02</p>
        //                     <input type="text" name="h_2" class="h_2" value="Заголовок 2">
        //                     <input type="text" name="pass" class="pass" value="ПАРОЛЬ">
        //                     <p class="label-pass">максимум 5 символов</p>   
        //                 </div>
        //                 <div class="gallery-photos">
        //                     <div class="photo-left">
        //                         <p class="top-label">Фотографии</p>
        //                         <div class="button">
        //                             <p>Добавить фото</p>
        //                             <form class="frm"> 
        //                                 <input type="file" multiple class="upload_btn" />
        //                             </form>
        //                         </div>
        //                         <div class="button save">
        //                              <p>Сохранить</p>
        //                         </div>
        //                     </div>
        //                     <div class="CMS-prewiew photo sortable">
        //                         <div class="photo-preview">
        //                             <img src="images/index/slider_test.png" alt="">
        //                             <div class="close_cross"></div>
        //                         </div>
        //                     </div>
        //                 </div>
        //             </div>')
    })
    $('.sortable').sbscroller();
    $('.sbscroller').sbscroller();
	$(".sortable").children().sortable({ revert:true, cancel: ".ps-scrollbar-y-rail"});
	/*input file*/
	$(".button").mousemove(function(e) {
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
    
})/*end*/
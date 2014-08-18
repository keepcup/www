$(document).ready(function(){
    // $('.sortable').perfectScrollbar({
    //     wheelSpeed: 20,
    //     wheelPropagation: false,
    //     suppressScrollX: false
    // });
$('.sortable').sbscroller();
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
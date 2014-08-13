$(document).ready(function(){
	$(".sortable").sortable({ revert:true });
	$( "ul, li" ).disableSelection();
	/*input file*/
	$(".button").mousemove(function(e) {
        var offL, offR, inpStart, aaa;
        offL = $(this).offset().left;
        offT = $(this).offset().top;
        aaa= $(this).find("input").width();
        $(this).find("input").css({
            left:e.pageX-aaa-340,
            top:e.pageY-offT-14
        })
    });
    $(".clients-prewiew input").iCheck({
        checkboxClass: 'icheckbox_minimal-green',
        increaseArea: '100%' 
    });
})/*end*/
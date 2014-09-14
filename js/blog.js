$(document).ready(function(){
scroll = 600;
limit = 2;
$(window).scroll(function(){
    if($(document).scrollTop() > $('#more').offset().top-1000){
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
    var timeOut = 500;
    var blog = $(this).closest(".blog-belt").find(".blog-text");
    if (blog.css("max-height") == "160px") {
        blog.animate({"margin-bottom":"70px","max-height":"200","max-height":"300","max-height":"500"},timeOut);

    } else {
        blog.css("max-height", "160px").animate({"margin-bottom":"0"},500);
    };
});

})
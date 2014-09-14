$(document).ready(function(){
scroll = 600;
limit = 2;
$(window).scroll(function(){
    if($(document).scrollTop() > $('#more').offset().top-1000){
        scroll+=400;
            $.ajax({
                url:'backend/more_gallery.php',
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
})
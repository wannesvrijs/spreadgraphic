// Scroll to top

$(document).ready(function(){
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#goToTop').fadeIn();
        } else {
            $('#goToTop').fadeOut();
        }
    });
    var duration_ms = 800;
    $('#goToTop').click(function () {
        //var last_scroll = $(window).scrollTop();
        $('html, body').animate({ scrollTop: 0 }, duration_ms, function(){
            setTimeout(function(){
                $('html, body').animate({ scrollTop: last_scroll }, duration_ms);
            }, duration_ms);
        });
    });
});

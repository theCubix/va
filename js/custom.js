$(window).scroll(function() {
    $(".fullscreen-image").css({
        'opacity': 1 - (($(this).scrollTop()) / 250)
    });
});
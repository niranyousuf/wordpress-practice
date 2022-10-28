(function ($) {
    "user strict";

    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 36) {
            $('.navbar').addClass('sticky');
        } else {
            $('.navbar').removeClass('sticky');
        }
    });

    $('.owl-carousel').owlCarousel({
        loop: true,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        dots: true,
        items: 1
    });

})(jQuery);
(function ($) {
    "user strict";
    $(document).ready(function () {
        // mobile menu
        $('.products-menu').append($('.w-mega-menu'))
        $(".main_menu").prepend(`
            <div class="mobile_logo_closeButton">
                <div class="logo"><a href="#">Coding <span>Tutor</span></a></div>
                <button id="close_menu" class="close_menu"></button>
            </div>`);

        $(".navbar-toggler").on("click", () => {
            $(".main_menu").addClass("open_menu");
        });

        $(".close_menu").on("click", () => {
            $(".main_menu").removeClass("open_menu");
        });


        if ($(window).width() < 992) {
            $(".products-menu").on("click", function () {
                $(this).find(".w-mega-menu").slideToggle();
            });
        }



    });
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
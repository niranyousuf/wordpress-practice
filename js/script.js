
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

        // Post next and prev title triming function
        $(function () {
            var postTitle = $(".latest-content .latest-title a").toArray();
            const trimTitle = (title, limit = 20) => {
                const newTitle = [];
                if (title.length > limit) {
                    title.split(" ").reduce((acc, cur) => {
                        if (acc + cur.length <= limit) {
                            newTitle.push(cur);
                        }
                        return acc + cur.length;
                    }, 0);
                    // return the result
                    return `${newTitle.join(" ")} ...`;
                }
                return title;
            };

            postTitle.forEach((el) => {
                el.innerHTML = trimTitle(el.innerText, 27);
            });
        });


    });

    $(window).on("load", function () {
        function reSizeArea(e) {
            var arr = $.makeArray(e);
            var ah = $.map(arr, function (h) {
                return $(h).height();
            });
            var mh = Math.max.apply($(this).height(), ah);
            e.height(mh);
        }
        if ($(window).width() > 575) {
            reSizeArea($(".service-block"));
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


    $('.search-btn').on('click', function () {
        $('.search_overlay').addClass('show-box');
    });
    $('.search-hide').on('click', function () {
        $('.search_overlay').removeClass('show-box');
    });


}) (jQuery);


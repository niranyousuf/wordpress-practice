
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

    // ***************************************************************************************************
    // Custom search script
    // ***************************************************************************************************
    class Search {
        // 1. Describe and create/initiate our object
        constructor() {
            this.addSearchHTML();
            this.resultsDiv = $('#search__results');
            this.openBtn = $('.search-btn');
            this.closeBtn = $('.search-hide');
            this.searchOverlay = $('.search_overlay');
            this.searchField = $('#search_input');

            this.activeElement = document.activeElement;

            this.events();
            this.showOverlay = false;
            this.loaderVisible = false;
            this.previousValue;
            this.typingTimer;
        }


        // 2. Events
        events() {
            this.openBtn.on('click', this.openOverlay.bind(this));
            this.closeBtn.on('click', this.closeOverlay.bind(this));

            $(document).on('keydown', this.keyPressDispatcher.bind(this));
            this.searchField.on('keyup', this.typingLogic.bind(this))
        }


        // 3. Methods (function, action)
        typingLogic(e) {
            if (this.searchField.val() != this.previousValue) {
                clearTimeout(this.typingTimer);

                if (this.searchField.val()) {
                    if (!this.loaderVisible) {
                        this.resultsDiv.html(`<h1><span class='icon-spin6'></span></h1>`);
                        this.loaderVisible = true;
                    }
                    this.typingTimer = setTimeout(this.getResults.bind(this), 750);
                } else {
                    this.resultsDiv.html('');
                    this.loaderVisible = false;
                }
            }
            this.previousValue = this.searchField.val();
        }

        getResults() {

            $.getJSON(ctData.root_url + '/wp-json/ct/v1/search?term=' + this.searchField.val(), (results) => {
                this.resultsDiv.html(`
                    
                    <div class="row">
                        <div class="col-lg-4">
                            <h2>General Information</h2>
                            ${results.generalInfo.length ? `<ul class="search-result__list">` : `<p>No match for your search!</p>`}
                                ${results.generalInfo.map((item) => {
                                    return `<li><a href="${item.permalink}">${item.title}</a> ${item.postType == 'post' ? `by ${item.authorName}` : ''}</li>`
                                }).join('')}
                            ${results.generalInfo.length ? `</ul>` : ''}
                        </div>

                        <div class="col-lg-4">
                            <h2>Programs</h2>
                            ${results.programs.length ? `<ul class="search-result__list">` : `<p>No Programs match! <a href="${ctData.root_url}/programs}">View all programs</a></p>`}
                                ${results.programs.map((item) => {
                                    return `<li><a href="${item.permalink}">${item.title}</a></li>`
                                }).join('')}
                            ${results.programs.length ? `</ul>` : ''}

                            <h2>Professors</h2>
                            ${results.professors.length ? `<ul class="profile-lists">` : `<p>No Professors match!</p>`}
                                ${results.professors.map((item) => {
                                    return `
                                    <li class="user-profile">
                                        <a href="${item.permalink}" class="profile-card">
                                            <img class="author-image" src="${item.image}" alt="${item.title}">
                                            <p>${item.title}</p>
                                        </a>
                                    </li>
                                    `
                                }).join('')}
                            ${results.professors.length ? `</ul>` : ''}
                        </div>

                        <div class="col-lg-4">
                            <h2>Campuses</h2>
                            ${results.campuses.length ? `<ul class="search-result__list">` : `<p>No match found! <a href="${ctData.root_url}/campuses}">View all campuses</a></p>`}
                                ${results.campuses.map((item) => {
                                    return `<li><a href="${item.permalink}">${item.title}</a></li>`
                                }).join('')}
                            ${results.campuses.length ? `</ul>` : ''}
                            <h2>Events</h2>
                        </div>
                    </div>
                `);
                this.loaderVisible = false;
            });

        }

        keyPressDispatcher(e) {
            if (document.activeElement.tagName != 'INPUT' && document.activeElement.tagName != 'TEXTAREA') {
                e.keyCode === 83 && !this.showOverlay ? this.openOverlay() : null;
            }
            e.keyCode === 27 && this.showOverlay ? this.closeOverlay() : null;
        }

        openOverlay() {
            this.searchOverlay.addClass('show-box');
            $('body').addClass('no-scroll');
            this.searchField.val('');
            setTimeout(() => this.searchField.focus(), 301);
            this.showOverlay = true;

        }

        closeOverlay() {
            this.searchOverlay.removeClass('show-box');
            $('body').removeClass('no-scroll');
            this.showOverlay = false;

        }

        addSearchHTML() {
            $('body').append(`
                <div class="search_overlay">
                    <div class="search_box">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="field_group">
                                        <span class="icon icon-search"></span>
                                        <input type="text" placeholder="What are you looking for?" id="search_input" class="search_input">
                                        <span class="icon icon-cancel search-hide"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="search_results">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div id="search__results">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `)
        }
    }


    var search = new Search();

})(jQuery);

(function ($) {
    "use strict";

    $(".navbar-toggler").click(function(){
        $(this).toggleClass("open");
    });

    $("#datepicker").datepicker();


    var review = $(".player_info_item");
    if (review.length) {
        review.owlCarousel({
            items: 1,
            loop: true,
            dots: false,
            autoplay: true,
            margin: 40,
            autoplayHoverPause: true,
            autoplayTimeout: 5000,
            nav: true,
            navText: [
                '<img src="img/icon/left.svg" alt="">',
                '<img src="img/icon/right.svg" alt="">',
            ],
            responsive: {
                0: {
                    margin: 15,
                },
                600: {
                    margin: 10,
                },
                1000: {
                    margin: 10,
                }
            }
        });
    }
    $(".popup-youtube, .popup-vimeo").magnificPopup({
        // disableOn: 700,
        type: "iframe",
        mainClass: "mfp-fade",
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

    $("select").niceSelect();

    review = $(".client_review_part");
    if (review.length) {
        review.owlCarousel({
            items: 1,
            loop: true,
            dots: true,
            autoplay: true,
            autoplayHoverPause: true,
            autoplayTimeout: 5000,
            nav: false
        });
    }
    // menu fixed js code
    $(window).scroll(function () {
        var window_top = $(window).scrollTop() + 1;
        if (window_top > 50) {
            $(".main_menu").addClass("menu_fixed animated fadeInDown");
        } else {
            $(".main_menu").removeClass("menu_fixed animated fadeInDown");
        }
    });

    $(".gallery_img").magnificPopup({
        type: "image",
        gallery: {
            enabled: true,
        }
    });
})(jQuery);


$(document).ready(function () {
    var owl = $("#home_page_banner_slider").owlCarousel({
        onInitialized: function(event) {
            // Adding transform3d property
            $('.owl-stage').css('transform-style', 'preserve-3d');
        },
        loop: true,
        margin: 0,
        autoplay: true,
        nav: true,
        dots: false,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        mouseDrag: false, // Disable drag
        touchDrag: false, // Disable touch drag
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
});

$(document).ready(function () {
    var owl = $("#what_we_do_slider").owlCarousel({
        onInitialized: function(event) {
            // Adding transform3d property
            $('.owl-stage').css('transform-style', 'preserve-3d');
        },
        loop: true,
        margin: 30,
        autoplay: true,
        autoplaySpeed:3000,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 3
            }
        }
    });
});

$(document).ready(function () {
    var owl = $("#future_activity_slider").owlCarousel({
        onInitialized: function(event) {
            // Adding transform3d property
            $('.owl-stage').css('transform-style', 'preserve-3d');
        },
        loop: false,
        margin: 30,
        autoplay: false,
        autoplaySpeed:3000,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 3
            }
        }
    });
});


document.addEventListener("DOMContentLoaded", function() {
    var header = document.getElementById("mainHeader");
    if (window.location.pathname === '/' || window.location.pathname === '/index.html') {
        header.classList.add("transparent");
    }
});


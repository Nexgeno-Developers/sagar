//for search bar
    function toggleSearchBar() {
        var searchBar = document.querySelector('.search-bar');
        searchBar.classList.toggle('d-none');
    }

    function toggleSearchBar2() {
        var searchBar2 = document.querySelector('.search-bar-for-tab');
        searchBar2.classList.toggle('d-none');
    }


    
$(document).ready(function() {
    var isDragging = false;  // Track whether the image is being dragged
    var startX, startY, scrollLeft, scrollTop; // Variables for mouse position and scroll
    
    $('#zoomable-image').on('click', function(e) {
        $(this).toggleClass('zoomed'); // Toggle zoom
        $('body').toggleClass('zoomed-image'); // Add body class for panning cursor control
        isDragging = false; // Reset dragging state
    });

    // Mouse down event
    $('#zoomable-image').on('mousedown', function(e) {
        if ($(this).hasClass('zoomed')) {
            isDragging = true;
            startX = e.pageX - this.offsetLeft; // Mouse X position relative to image
            startY = e.pageY - this.offsetTop;  // Mouse Y position relative to image
            scrollLeft = $(this).parent().scrollLeft(); // Image container scroll position
            scrollTop = $(this).parent().scrollTop();
            $(this).addClass('dragging'); // Change cursor to grabbing
        }
    });

    // Mouse move event
    $('#zoomable-image').on('mousemove', function(e) {
        if (isDragging) {
            e.preventDefault(); // Prevent default action
            var x = e.pageX - this.offsetLeft; // Current mouse X
            var y = e.pageY - this.offsetTop;  // Current mouse Y
            var walkX = (x - startX) * 1; // Distance moved in X direction
            var walkY = (y - startY) * 1; // Distance moved in Y direction
            $(this).parent().scrollLeft(scrollLeft - walkX); // Scroll image container
            $(this).parent().scrollTop(scrollTop - walkY);
        }
    });

    // Mouse up and mouse leave event
    $(document).on('mouseup mouseleave', function() {
        isDragging = false;
        $('#zoomable-image').removeClass('dragging'); // Reset cursor
    });
});


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


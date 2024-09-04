function toggleSearchBar() {
	document.querySelector(".search-bar").classList.toggle("d-none")
}

function toggleSearchBar2() {
	document.querySelector(".search-bar-for-tab").classList.toggle("d-none")
}

$(document).ready(function() {
	var e, o, t, a, s = !1;
	$("#zoomable-image").on("click", function(e) {
		$(this).toggleClass("zoomed"), $("body").toggleClass("zoomed-image"), s = !1
	}), $("#zoomable-image").on("mousedown", function(n) {
		$(this).hasClass("zoomed") && (s = !0, e = n.pageX - this.offsetLeft, o = n.pageY - this.offsetTop, t = $(this).parent().scrollLeft(), a = $(this).parent().scrollTop(), $(this).addClass("dragging"))
	}), $("#zoomable-image").on("mousemove", function(n) {
		if (s) {
			n.preventDefault();
			var i = n.pageX - this.offsetLeft,
				r = n.pageY - this.offsetTop,
				l = (i - e) * 1,
				m = (r - o) * 1;
			$(this).parent().scrollLeft(t - l), $(this).parent().scrollTop(a - m)
		}
	}), $(document).on("mouseup mouseleave", function() {
		s = !1, $("#zoomable-image").removeClass("dragging")
	})
}), 

$(document).ready(function() {
	$("#home_page_banner_slider").owlCarousel({
		onInitialized: function(e) {
			$(".owl-stage").css("transform-style", "preserve-3d")
		},
		loop: !0,
		margin: 0,
		autoplay: !0,
		nav: !0,
		dots: !1,
		animateOut: "fadeOut",
		animateIn: "fadeIn",
		mouseDrag: !1,
		touchDrag: !1,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 1
			},
			1e3: {
				items: 1
			}
		}
	})
}), 

$(document).ready(function() {
	$("#what_we_do_slider").owlCarousel({
		onInitialized: function(e) {
			$(".owl-stage").css("transform-style", "preserve-3d")
		},
		loop: !0,
		margin: 30,
		autoplay: !0,
		autoplaySpeed: 3e3,
		nav: !0,
		dots: !1,
		responsive: {
			0: {
				items: 1.2,
				margin: 20
			},
			600: {
				items: 2
			},
			1e3: {
				items: 3
			}
		}
	})
}), 

$(document).ready(function() {
	$("#future_activity_slider").owlCarousel({
		onInitialized: function(e) {
			$(".owl-stage").css("transform-style", "preserve-3d")
		},
		loop: !0,
		margin: 30,
		autoplay: !1,
		autoplaySpeed: 3e3,
		nav: !0,
		dots: !1,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 2
			},
			1e3: {
				items: 3
			}
		}
	})
}), 

document.addEventListener("DOMContentLoaded",function(){
    var e=document.getElementById("mainHeader");
    ("/"===window.location.pathname||"/index.html"===window.location.pathname)&&e.classList.add("transparent")
});

document.addEventListener("DOMContentLoaded", function() {
	const lazyImages = document.querySelectorAll('img.lazy');

	// Intersection Observer setup
	const imageObserver = new IntersectionObserver((entries, observer) => {
		entries.forEach(entry => {
			if (entry.isIntersecting) {
				const img = entry.target;
				img.src = img.dataset.src; // Set src to the value of data-src
				img.classList.remove('lazy'); // Optionally remove the lazy class
				observer.unobserve(img); // Stop observing this image
			}
		});
	});

	// Start observing each lazy image
	lazyImages.forEach(image => {
		imageObserver.observe(image);
	});
});

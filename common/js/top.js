// for top
$(function () {
	urlhash = location.hash;
	if (urlhash != "" && $(urlhash).get(0)) {
		$('#enter_cover').remove();

	} else {
		// main text
		$('#base').addClass('_enter')
		$('#base').delay(200).queue(function () {
			$('#base').removeClass('_enter');
			$(this).dequeue();
		}).delay(2000).queue(function () {
			$('#enter_cover').remove();
			$(this).dequeue();
		});
	}
});

// slick
document.write('<script type="text/javascript" src="/common/js/slick/slick.min.js"></script>');
document.write('<link rel="stylesheet" href="/common/js/slick/slick.css" type="text/css">');

// for top
$(function () {
	// slick
	$('.thumb-item').slick({
		autoplay: true,
		dots: true,
		arrows: true,
		autoplaySpeed: 5000,
		speed: 600,
		fade: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		pauseOnFocus: false,
		pauseOnHover: false,
		infinite: true,
		asNavFor: '.thumb-item-nav'
	});

	$('.thumb-item-nav').slick({
		infinite: true,
		slidesToShow: 3,
		focusOnSelect: true,
		asNavFor: '.thumb-item',
	});

		$('#director').slick({
		autoplay: true,
		dots: false,
		infinite: true,
		autoplaySpeed: 3000,
		slidesToShow: 4,
		slidesToScroll: 1,
		responsive: [
			{ breakpoint: 992,
			  settings: {
					slidesToShow: 3
				}
			},
			{ breakpoint: 767,
			  settings: {
					slidesToShow: 2
				}
			},
			{ breakpoint: 576,
			  settings: {
					slidesToShow: 1
				}
			}
		]
	});

});

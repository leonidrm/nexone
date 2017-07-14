jQuery(document).ready(function ($) {
	// SwipeBox start
	$('.swipebox').swipebox();
	// SwipeBox end

	/*isotope start*/
	let $isotopeContainers = $('.isotope-container');
	let $isotopeFilters = $('.isotopeFilter');
	$(window).load(function () {
		if ($isotopeContainers.length)
			$isotopeContainers.isotope();
	});

	$isotopeFilters.on('click', 'button', function () {
		var filterValue = $(this).attr('data-filter');
		$(this).parent().parent().parent().parent().find('.isotope-container')
			.isotope({filter: filterValue});
	});
	$isotopeFilters.each(function (i, buttonGroup) {
		var $buttonGroup = $(buttonGroup);
		$buttonGroup.on('click', 'button', function () {
			$buttonGroup.find('.active').removeClass('active');
			$(this).addClass('active');
		});
	});
	// isotope end

	// navigation start
	$('.nex-menu-toggle').on('click', function () {
		$('.main-menu-hidden').slideToggle(300);
		return false;
	});
	$(window).resize(function () {
		if ($(window).width() > 992) {
			$('.main-menu-hidden').removeAttr('style');
		}
	});
	// navigation end

	// collapse class active start
	$('.panel-collapse').on('show.bs.collapse', function () {
		$(this).siblings('.panel-heading').addClass('active');
	});

	$('.panel-collapse').on('hide.bs.collapse', function () {
		$(this).siblings('.panel-heading').removeClass('active');
	});
	// collapse class active end

	// clients column slide start
	$('.nex-testimonial-v4').slick({
		slidesToShow: 2,
		autoplay: true,
		autoplaySpeed: 4000
	});
	if ($('.nex-slick-clients').length) {
		$('.nex-slick-clients').each(function(idx, item) {
			let container = jQuery(item);
			let cols = container.data('cols');
			container.slick({
				slidesToShow: cols,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 2000
			});
		});
	}
	$('.nex-slick-clients4').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
	});
	$('.nex-slick-study').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000
	});
	$('.nex-slider').slick({
		dots: true,
		infinite: true,
		speed: 500,
		fade: true,
		cssEase: 'linear',
		autoplay: true,
		autoplaySpeed: 2000
	});
	$('.nex-services-slider').slick({
		dots: true,
		infinite: true,
		autoplay: true,
		autoplaySpeed: 3000,
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 960,
				settings: {
					arrows: true,
					slidesToShow: 2
				}
			},
			{
				breakpoint: 768,
				settings: {
					arrows: false,
					slidesToShow: 1
				}
			}
		]
	});
	$('.nex-testimonials-slider').slick({
		centerMode: true,
		infinite: true,
		arrows: false,
		autoplay: true,
		autoplaySpeed: 4000,
		dots: true,
		centerPadding: '0',
		slidesToShow: 3,
		responsive: [
			{
				breakpoint: 960,
				settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '0',
					slidesToShow: 2
				}
			},
			{
				breakpoint: 768,
				settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '0',
					slidesToShow: 1
				}
			}
		]
	});
	// clients column slide end

	// sticky header start
	$(".sticker").sticky();
	// sticky header end

	// smooth scrolling start
	$('.main-menu a[href*="#"]:not([href="#"])').on('click', function () {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				$('html, body').animate({
					scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}
	});
	// smooth scrolling end

}(jQuery));
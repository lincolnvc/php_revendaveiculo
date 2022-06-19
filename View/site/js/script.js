$(document).ready(function() {

/******************************  Placeholder  ******************************/
	Placeholder.init();



/*************************  Slider Revolution  *****************************/
	if($('.banner').length) {
		$('.banner').revolution({
			startheight:500,
			startwidth:1900,
			onHoverStop: "on",
			hideThumbs:1,
			navigationArrows: 'solo',
			navigationType: "bullet",
			navigationStyle: "round",
			shadow:3,
		});    
	}



/*******************************  GMaps  ***********************************/




/***************************** Slider Range  *******************************/

	if ($('#slider-price').length) { 
		initSliderRange(
			$('#slider-price .slider'),
			'$ ',
			'',
			1000,
			100000,
			1000,
			[25000,75000],
			'hide'
		) 
	}


	if ($('#slider-km').length) {
		initSliderRange($('#slider-km .slider'),
			'',
			' mi',
			0,
			500000,
			1000,
			[50000,400000],
			'hide'
		) 
	}



/*****************************  Carousel  *********************************/
	if ($('#testimonials').length) {
		$('#testimonials').carousel()
	}



/*****************************  Accordion  *********************************/
if ($('#accordion').length) {
	$('#accordion').on('hide.bs.collapse', function (element) {
		$(element.target).prev().find('i').removeClass('icon-minus');
		$(element.target).prev().find('i').addClass('icon-plus');
	});

	$('#accordion').on('show.bs.collapse', function (element) {
		$(element.target).prev().find('i').removeClass('icon-plus');
		$(element.target).prev().find('i').addClass('icon-minus');
	});
}



/******************************* Flickr Feed *******************************/
	if ($('.flickr-feed').length) {
	    $('.flickr-feed').jflickrfeed({
    	    limit: 6,
        	qstrings: {
            	id: '52617155@N08'
        	},
        	itemTemplate: '<li><a href="{{link}}" target="_blank"><img src="{{image_s}}" alt="{{title}}" /></a></li>'
    	});
	}



/********************************  Tooltip  ********************************/

	$('.advanced').tooltip({'placement': 'bottom'})

	if ($('#body_info').length) {
		$('#body_info').tooltip({'placement': 'top'})
	}


/*********************************  Tabs  **********************************/
	if ($('#tab-car').length) {
		$('#tab-car a').click(function (e) {
			e.preventDefault()
			$(this).tab('show')
		})
	}

	if ($('#tab-car2').length) {
		$('#tab-car2 a').click(function (e) {
			e.preventDefault()
			$(this).tab('show')
		})
	}




/********************************  FancyBox  ******************************/

	if ($(".fancybox").length) {

		$(".fancybox").each(function() {
			$(this).attr('rel', $(this).data('rel'));
		});

		$(".fancybox").fancybox({
			openEffect	: 'elastic',
			closeEffect	: 'elastic'
		});
	}



/*******************************  Menu Buy  ********************************/
    if ($(".menu-buy").length) {
    	
    	$('.menu-buy .items a').hover(function (e) {
			$('.menu-buy .car').find('img').attr('src', $(this).data('img'));
    		$('.menu-buy .car').find('strong').html($(this).data('title'));
    		$('.menu-buy .car').find('span').html($(this).data('desc'));
		})
	}



/*******************************  Go to top  *******************************/
    if ($("#go-top").length) {
    	$('#go-top').click(function (e) {
			e.preventDefault()
    		$(window).scrollTo(0, 800);
    	});
	}



/****************************  Select Car Model  ***************************/
	if ($("#carousel-car-model").length) {
    	$('#carousel-car-model a').click(function (e) {
			e.preventDefault()
    		$('#carousel-car-model a').removeClass('active')
    		$(this).addClass('active')
    	});
	}



/****************************  Create SlideRange  **************************/

	if ($(".input-group.date").length) {
		$('.input-group.date').datepicker({
			format: "dd-mm-yyyy",
			language: "en",
			autoclose: true,
			todayHighlight: true
		});
	}

}); //end document ready



/****************************  Create SlideRange  **************************/

function initSliderRange(element, pre, app, min, max, step, val, tooltip) {
	element.slider({
			range: true,
			min: min,
			max: max,
			value : val,
			step: step,
			tooltip: tooltip,
		})
		.on('slide', function(ev){
			$(this).parent().parent().find('.input_range.min').val(ev.value[0])
			$(this).parent().parent().find('.span_range.min').html(pre + ev.value[0] + app)

			$(this).parent().parent().find('.input_range.max').val(ev.value[1])
			$(this).parent().parent().find('.span_range.max').html(pre + ev.value[1] + app)
		});
}



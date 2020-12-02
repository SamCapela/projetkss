$('#add_row').on('click', function()
{
	data_position = $('.data_position:last').attr('data-position');
	data_position = parseInt(data_position) + 1;
	
	html = '<div class="form-group row detail-invoice clear clearfix"><div class="col-sm-12 btn-delete"><a id="delete_this" class="btn-alert">Supprimer<input class="delete_me" type="hidden" value="" name="detail['+data_position+'][stop]"></a></div><div class="col-sm-6 mb-3 mb-sm-0"><input type="number" name="detail['+data_position+'][quantity]" class="form-control form-control-user" placeholder="Quantité"></div><div class="col-sm-6"><input type="number" name="detail['+data_position+'][price]" class="form-control form-control-user" placeholder="Prix"></div><hr><div class="margin-spacing"></div><div class="col-sm-6 mb-3 mb-sm-0"><input data-position="'+data_position+'" type="text" name="detail['+data_position+'][title]" class="form-control form-control-user data_position" placeholder="Titre de la ligne"></div><div class="col-sm-6"><input type="text" name="detail['+data_position+'][description]" class="form-control form-control-user" placeholder="Description de la ligne"></div></div>';
	  
	  $('#detail_form').append(html).addClass('new_detail_add')
})

$(document).on('click', '#delete_this', function(){
	 find =  $(this).find('input')
	  find.val('deleted')
	 $(this).parent().parent().hide()
})


(function($) {
	  "use strict"; // Start of use strict
	
	  // Toggle the side navigation
	  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
		$("body").toggleClass("sidebar-toggled");
		$(".sidebar").toggleClass("toggled");
		if ($(".sidebar").hasClass("toggled")) {
		  $('.sidebar .collapse').collapse('hide');
		};
	  });
	
	  // Close any open menu accordions when window is resized below 768px
	  $(window).resize(function() {
		if ($(window).width() < 768) {
		  $('.sidebar .collapse').collapse('hide');
		};
		
		// Toggle the side navigation when window is resized below 480px
		if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
		  $("body").addClass("sidebar-toggled");
		  $(".sidebar").addClass("toggled");
		  $('.sidebar .collapse').collapse('hide');
		};
	  });
	
	  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
	  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
		if ($(window).width() > 768) {
		  var e0 = e.originalEvent,
			delta = e0.wheelDelta || -e0.detail;
		  this.scrollTop += (delta < 0 ? 1 : -1) * 30;
		  e.preventDefault();
		}
	  });
	
	  // Scroll to top button appear
	  $(document).on('scroll', function() {
		var scrollDistance = $(this).scrollTop();
		if (scrollDistance > 100) {
		  $('.scroll-to-top').fadeIn();
		} else {
		  $('.scroll-to-top').fadeOut();
		}
	  });
	
	  // Smooth scrolling using jQuery easing
	  $(document).on('click', 'a.scroll-to-top', function(e) {
		var $anchor = $(this);
		$('html, body').stop().animate({
		  scrollTop: ($($anchor.attr('href')).offset().top)
		}, 1000, 'easeInOutExpo');
		e.preventDefault();
	  });
	
	})(jQuery); // End of use strict
	

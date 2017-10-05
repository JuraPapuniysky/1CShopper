$(function() {

	$("#account-user-photo").find(".uploaded-input-image").hide();
	$("#account-user-photo").find(".upload-photo-button").hide();
		function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$("#account-user-photo").find(".uploaded-input-image").attr('src', e.target.result);
			$("#account-user-photo").find(".uploaded-input-image").show();
		};
		reader.readAsDataURL(input.files[0]);
		}
	}
	$("#account-user-photo").find(".upload-new-img").change(function() {
		readURL(this);
		$("#account-user-photo").find(".current-img-container").hide();
		$("#account-user-photo").find(".change-photo-button").hide();
		$("#account-user-photo").find(".upload-photo-button").show();
	});




	$('#slider').slick({
	    arrows: true,
	    dots: true,
	    prevArrow: '<button class="slick-prev slick-arrow"></button>',
	    nextArrow: '<button class="slick-next slick-arrow"></button>',
	    slidesToShow: 1,
	    slidesToScroll: 1
	});


	$('.burger-menu').click(function() {
		$('.mobile-menu-container').toggleClass('hidden');
	})

	$('.header-mobile .main-menu-link').click(function(event) {
		event.preventDefault();
		$(this).siblings('.submenu-links').toggleClass('hidden');
	});

	if ($(window).width() < 768 ) {
		$('.connection-word').text('или войдите через соц. сеть');
	}

	if ($(window).width() < 768 && $('main').hasClass('page-registration')) {
		$('.connection-word').text('или зарегистрируйтесь с помощью соц. сети');
	}

});
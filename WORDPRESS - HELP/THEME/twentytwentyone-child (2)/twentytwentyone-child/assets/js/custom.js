$(document).ready(function () {
	$("#accordion > li > span").click(function() {
    	$(this).toggleClass("active").next('div').slideToggle(250)
    	.closest('li').siblings().find('span').removeClass('active').next('div').slideUp(250);
	});
});

$(window).scroll(function() {
	// For Sticky Navbar
    if ($(window).scrollTop() > 300) { 
        $('.header-area').addClass('fixed_header');
    } else {
        $('.header-area').removeClass('fixed_header');
    }
    if ($(window).scrollTop() > 400) {
        $('.header-area').addClass('stky');
        $('.schedule-button').addClass('active');
    } else {
        $('.header-area').removeClass('stky');
		$('.schedule-button').removeClass('active');
    }
});


$(window).on('load resize', function () {
    if (screen.width < 991) {
		$('.footer-logo-area ').insertBefore('.our-doctors')
	}
	else {
		$('.footer-logo-area ').insertAfter('.our-doctors')
	}
});

var swiper = new Swiper(".mySwiper", {
    slidesPerView: 2,
    grid: {
      rows: 2,
    },
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
          spaceBetween: 30,
        },
        990: {
          slidesPerView: 2,
          spaceBetween: 30,
        },
      }  
  });

  var swiper = new Swiper(".mySwiper-2", {
    slidesPerView: 1,
    spaceBetween: 30,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
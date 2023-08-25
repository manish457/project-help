
document.addEventListener('DOMContentLoaded', () => {
  "use strict";

  /**
   * Sticky header on scroll
   */
  const selectHeader = document.querySelector('#header');
  if (selectHeader) {
    document.addEventListener('scroll', () => {
      window.scrollY > 100 ? selectHeader.classList.add('sticked') : selectHeader.classList.remove('sticked');
    });
  }

  /**
   * Mobile nav toggle
   */

  const mobileNavToogleButton = document.querySelector('.mobile-nav-toggle');

  if (mobileNavToogleButton) {
    mobileNavToogleButton.addEventListener('click', function(event) {
      event.preventDefault();
      mobileNavToogle();
    });
  }

  function mobileNavToogle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    mobileNavToogleButton.classList.toggle('bi-list');
    mobileNavToogleButton.classList.toggle('bi-x');
  }

  /**
   * Hide mobile nav on same-page/hash links
   */
  document.querySelectorAll('#navbar a').forEach(navbarlink => {

    if (!navbarlink.hash) return;

    let section = document.querySelector(navbarlink.hash);
    if (!section) return;

    navbarlink.addEventListener('click', () => {
      if (document.querySelector('.mobile-nav-active')) {
        mobileNavToogle();
      }
    });
  });

  /**
   * Toggle mobile nav dropdowns
   */
  const navDropdowns = document.querySelectorAll('.navbar .dropdown > a');

  navDropdowns.forEach(el => {
    el.addEventListener('click', function(event) {
      if (document.querySelector('.mobile-nav-active')) {
        event.preventDefault();
        this.classList.toggle('active');
        this.nextElementSibling.classList.toggle('dropdown-active');

        let dropDownIndicator = this.querySelector('.dropdown-indicator');
        dropDownIndicator.classList.toggle('bi-chevron-up');
        dropDownIndicator.classList.toggle('bi-chevron-down');
      }
    })
  });

  /**
   * Scroll top button
   */
  const scrollTop = document.querySelector('.scroll-top');
  if (scrollTop) {
    const togglescrollTop = function() {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
    window.addEventListener('load', togglescrollTop);
    document.addEventListener('scroll', togglescrollTop);
    scrollTop.addEventListener('click', window.scrollTo({
      top: 0,
      behavior: 'smooth'
    }));
  }

  /**
   * Hero Slider
   */
  var swiper = new Swiper(".sliderFeaturedPosts", {
    spaceBetween: 0,
    speed: 1000,
    centeredSlides: true,
    loop: true,
    slideToClickedSlide: true,
    autoplay: {
      delay: 6000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".custom-swiper-button-next",
      prevEl: ".custom-swiper-button-prev",
    },
  });

  /**
   * Open and close the search form.
   */
  const searchOpen = document.querySelector('.js-search-open');
  const searchClose = document.querySelector('.js-search-close');
  const searchWrap = document.querySelector(".js-search-form-wrap");

  searchOpen.addEventListener("click", (e) => {
    e.preventDefault();
    searchWrap.classList.add("active");
  });

  searchClose.addEventListener("click", (e) => {
    e.preventDefault();
    searchWrap.classList.remove("active");
  });

  /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Animation on scroll function and init
   */
  function aos_init() {
    AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', () => {
    aos_init();
  });
  
  
  
  
/**
   * Featured Slider
   */  
  
  
var swiper = new Swiper('.featured-slider', {
      slidesPerView: 3,
      spaceBetween: 30,
	  loop: true,
	  breakpoints: {
        1024: {
          slidesPerView: 3,
          spaceBetween: 40,
          slidesPerColumn: 4,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 30,
          slidesPerColumn: 3,
        },
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
          slidesPerColumn: 2,
        },
        320: {
          slidesPerView: 1,
          spaceBetween: 10,
          slidesPerColumn: 1,
        }
      },
      navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    }
    });
  
  
/**
   * CONFIDENCE CLOSET Slider
   */  
    
  
var swiper = new Swiper('.confidence-closet-slider', {
      slidesPerView: 1,
      spaceBetween: 30,
	  loop: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
	   navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    }
    });
  
  
 /**
   * Brand Slider
   */  
    
  
var swiper = new Swiper('.brans-slider', {
      slidesPerView: 6,
      spaceBetween: 30,
	  loop: true,
	  autoplay: true,
	  breakpoints: {
    // when window width is >= 320px
    320: {
      slidesPerView: 2,
      spaceBetween: 20
    },
    // when window width is >= 480px
    480: {
      slidesPerView: 3,
      spaceBetween: 30
    },
    // when window width is >= 640px
    640: {
      slidesPerView: 6,
      spaceBetween: 40
    }
  }
    }); 
	
	
	
/**
   * Testimonials
   */  

var swiper = new Swiper('.testimonials', {
  slidesPerView: 1,
  centeredSlides: true,
  loop: true,
  autoplay: true,
  spaceBetween: 20,

  pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
});




/*----------------------------
        cart-plus-minus-button
       ------------------------------ */
    $(".cart-plus-minus")
    $(".qtybutton").on("click", function() {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find("input").val(newVal);
    });

    /*Active class jquery code*/

    var skillulli = $('.skill-ulli li');

    skillulli.on("click", function() {
        skillulli.removeClass("active-skill");
        $(this).addClass("active-skill");
    });

    /* Fancybox*/
    $('.fancybox').fancybox();





 /*--- Product List/Grid view---*/


const listViewButton = document.querySelector('.list-view-button');
const gridViewButton = document.querySelector('.grid-view-button');
const list = document.querySelector('ol');

listViewButton.onclick = function () {
  list.classList.remove('grid-view-filter');
  list.classList.add('list-view-filter');
}

gridViewButton.onclick = function () {
  list.classList.remove('list-view-filter');
  list.classList.add('grid-view-filter');
}




/*----------------------------
     wow js active
    ------------------------------ */
    new WOW().init();


/**
   * Related Product Slider
   */  
  










/**
   * Accordion
   */  

	function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);




	
 


});
var btn = $('#button');

        $(window).scroll(function() {
          if ($(window).scrollTop() > 300) {
            btn.addClass('show');
          } else {
            btn.removeClass('show');
          }
        });

        btn.on('click', function(e) {
          e.preventDefault();
          $('html, body').animate({scrollTop:0}, '300');
        });

        

        //===== Sticky

        $(window).on('scroll', function (event) {
            var scroll = $(window).scrollTop();
            if (scroll < 110) {
                $(".header_navbar").removeClass("sticky");
                $(".header_navbar_1 .header_logo img").attr("src", "assets/images/logo.png");
            } else {
                $(".header_navbar").addClass("sticky");
                $(".header_navbar_1 .header_logo img").attr("src", "assets/images/logo-2.png");
            }
        });

       
        /*for header menu*/

        $(document).ready(function () {

            if ($(window).width() <= 991) {
                var Sidemenu = function () {
                    this.$menuItem = $('.main-nav a');
                };

                function init() {
                    var $this = Sidemenu;
                    $('.main-nav a').on('click', function (e) {
                        if ($(this).parent().hasClass('has-submenu')) {
                            e.preventDefault();
                        }
                        if (!$(this).hasClass('submenu')) {
                            $('ul', $(this).parents('ul:first')).slideUp(350);
                            $('a', $(this).parents('ul:first')).removeClass('submenu');
                            $(this).next('ul').slideDown(350);
                            $(this).addClass('submenu');
                        } else if ($(this).hasClass('submenu')) {
                            $(this).removeClass('submenu');
                            $(this).next('ul').slideUp(350);
                        }
                    });
                }

                // Sidebar Initiate
                init();
            }


            $('body').append('<div class="sidebar-overlay"></div>');
            $(document).on('click', '#mobile_btn', function () {
                $('main-wrapper').toggleClass('slide-nav');
                $('.sidebar-overlay').toggleClass('opened');
                $('html').addClass('menu-opened');
                return false;
            });

            $(document).on('click', '.sidebar-overlay', function () {
                $('html').removeClass('menu-opened');
                $(this).removeClass('opened');
                $('main-wrapper').removeClass('slide-nav');
            });

            $(document).on('click', '#menu_close', function () {
                $('html').removeClass('menu-opened');
                $('.sidebar-overlay').removeClass('opened');
                $('main-wrapper').removeClass('slide-nav');
            });
        });

        //-- Plugin implementation
(function($) {
  $.fn.countTo = function(options) {
    return this.each(function() {
      //-- Arrange
      var FRAME_RATE = 60; // Predefine default frame rate to be 60fps
      var $el = $(this);
      var countFrom = parseInt($el.attr('data-count-from'));
      var countTo = parseInt($el.attr('data-count-to'));
      var countSpeed = $el.attr('data-count-speed'); // Number increment per second

      //-- Action
      var rafId;
      var increment;
      var currentCount = countFrom;
      var countAction = function() {              // Self looping local function via requestAnimationFrame
        if(currentCount < countTo) {              // Perform number incremeant
          $el.text(Math.floor(currentCount));     // Update HTML display
          increment = countSpeed / FRAME_RATE;    // Calculate increment step
          currentCount += increment;              // Increment counter
          rafId = requestAnimationFrame(countAction);
        } else {                                  // Terminate animation once it reaches the target count number
          $el.text(countTo);                      // Set to the final value before everything stops
          //cancelAnimationFrame(rafId);
        }
      };
      rafId = requestAnimationFrame(countAction); // Initiates the looping function
    });
  };
}(jQuery));

//-- Executing
$('.number-counter').countTo();



//=== float-contact =====//

(function($, root, undefined) {
  $(function() {

    var Engine = {
      ui : {
        init : function() {
          var self = this;

          self.floatbox.init();

        },

        floatbox : {
          objLib : {
            floatbox : $("#planofloat"),
            floatbox_opener : $(".contact-opener")
          },
          init : function() {
            var self = this;
            self.open();
            self.close();

            self.objLib.floatbox_opener.click(function() {
              if (self.objLib.floatbox.hasClass('op')) {
                self.objLib.floatbox.animate({
                  "right" : "-302px"
                }, {
                  duration : 300
                }).removeClass('op');
              } else {
                self.objLib.floatbox.animate({
                  "right" : "0px"
                }, {
                  duration : 300
                }).addClass('op');
              }
            });

          },
          open : function() {
            var self = this;
            $('#collapseServicos').on('shown.bs.collapse',
                function() {
                  self.objLib.floatbox_opener.fadeIn();
                  self.objLib.floatbox.animate({
                    "right" : "0px"
                  }, {
                    duration : 300
                  }).addClass('op');
                });
          },
          close : function() {
            var self = this;
            $('#collapseServicos')
                .on(
                    'hidden.bs.collapse',
                    function() {
                      self.objLib.floatbox_opener
                          .fadeOut('fast');
                      self.objLib.floatbox.animate({
                        "right" : "-302px"
                      }, {
                        duration : 100
                      }).removeClass('op');
                    });
          }
        },

      },
    };

    Engine.ui.init(); // Iniciar Motor

  });
})(jQuery, this);

//=== contact-form=====//
$('input').focus(function(){
          $(this).parents('.form-group').addClass('focused');
        });

        $('input').blur(function(){
          var inputValue = $(this).val();
          if ( inputValue == "" ) {
            $(this).removeClass('filled');
            $(this).parents('.form-group').removeClass('focused');  
          } else {
            $(this).addClass('filled');
          }
        })  


//***********isotope-filter***********//

 /*$(".all-portfolios").isotope({
        itemSelector: '.single-portfolio',
        layoutMode: 'fitRows',
    });*/
    
    $('ul.filter li').click(function(){ 
        
      $("ul.filter li").removeClass("active");
      $(this).addClass("active");        

        var selector = $(this).attr('data-filter'); 
        $(".all-portfolios").isotope({ 
            filter: selector, 
            animationOptions: { 
                duration: 750, 
                easing: 'linear', 
                queue: false, 
            } 
        }); 
      return false; 
    }); 
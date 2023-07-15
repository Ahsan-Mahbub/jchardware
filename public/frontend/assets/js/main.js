$(document).ready(function() {
    // Client Slider
	$('.hero-slide-inner').owlCarousel({
	  loop:true,
	  margin:0,
	  items:1,
	  autoplay:true,
	  navText:['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
	  nav:false,
	  dots:true,
	  autoplayTimeout:5000,
	  autoplayHoverPause: false,
	  autoplaySpeed: 5000,
	  animateOut: 'fadeOut',
	  animateIn: 'fadeIn',
	  responsive:{
	      0:{
	          items:1,
	          nav:false,
	      },
	      767:{
	          items:1,
	          nav:false,
	      },
	      992:{
	          items:1,
	          nav:true
	      },
	      1200:{
	          items:1,
	          nav:true
	      },
	      1600:{
	          items:1,
	          nav:true
	      }
	  }
	});
    
});


(function ($) {
"use strict";
var PUS = {};
    /*==========================================
            :: slicknav
    ==========================================*/
    PUS.slicknav = function () {
        $(".site-menu").slicknav({
            allowParentLinks: true,
            prependTo: '#mobile-menu-wrap',
            label: '',
        });

        $(".mobile-menu-trigger").on("click", function(e) {
            $(".mobile-menu-container").addClass("menu-open");
            $("body").css("overflow-y","hidden");
            e.stopPropagation();
        });

        $(".mobile-menu-close").on("click", function(e) {
            $(".mobile-menu-container").removeClass("menu-open");
            $("body").css("overflow-y","auto");
            e.stopPropagation();
        });  
    };
    $(document).ready(function () {
        PUS.slicknav();
    });
})(jQuery);

function showProductCat() {
  var htmlShow = document.getElementById("product-cat");
  if (htmlShow.style.display === "none") {
    htmlShow.style.display = "block";
  } else {
    htmlShow.style.display = "none";
  }
}
$(document).ready(function(){

	$('.product-thumbnail').click(function() {
		$(".main-product-img").attr('src', $(this).attr('src'));
	})

  // Add smooth scrolling to all links
  $("a").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      event.preventDefault();

      // Store hash
      var hash = this.hash;
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
        window.location.hash = hash;
      });
    } // End if
  });
});
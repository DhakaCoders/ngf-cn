(function($) {

/*Google Map Style*/


var windowWidth = $(window).width();
$('.navbar-toggle').on('click', function(){
	$('#mobile-nav').slideToggle(300);
});
	
  
//matchHeightCol
if($('.mHc').length){
  $('.mHc').matchHeight();
};
if($('.mHc1').length){
  $('.mHc1').matchHeight();
};
if($('.mHc2').length){
  $('.mHc2').matchHeight();
};
if($('.mHc3').length){
  $('.mHc3').matchHeight();
};
if($('.mHc4').length){
  $('.mHc4').matchHeight();
};
if($('.mHc5').length){
  $('.mHc5').matchHeight();
};
if($('.mHc6').length){
  $('.mHc6').matchHeight();
};
$(window).load(function() {
//matchHeightCol
  if($('.mHc').length){
    $('.mHc').matchHeight();
  };
  if($('.mHc1').length){
    $('.mHc1').matchHeight();
  };
  if($('.mHc2').length){
    $('.mHc2').matchHeight();
  };
  if($('.mHc3').length){
    $('.mHc3').matchHeight();
  };
  if($('.mHc4').length){
    $('.mHc4').matchHeight();
  };
  if($('.mHc5').length){
    $('.mHc5').matchHeight();
  };
  if($('.mHc6').length){
    $('.mHc6').matchHeight();
  };
});

//$('[data-toggle="tooltip"]').tooltip();

//banner animation
$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  $('.page-banner-bg').css({
    '-webkit-transform' : 'scale(' + (1 + scroll/2000) + ')',
    '-moz-transform'    : 'scale(' + (1 + scroll/2000) + ')',
    '-ms-transform'     : 'scale(' + (1 + scroll/2000) + ')',
    '-o-transform'      : 'scale(' + (1 + scroll/2000) + ')',
    'transform'         : 'scale(' + (1 + scroll/2000) + ')'
  });
});


if($('.fancybox').length){
  $('.fancybox').fancybox({
      //openEffect  : 'none',
      //closeEffect : 'none'
    });

}


/**
Responsive on 767px
*/

// if (windowWidth <= 767) {
$('.toggle-btn').on('click', function(){
  $(this).toggleClass('menu-expend');
  $('.toggle-bar ul').slideToggle(500);
});


// }



// http://codepen.io/norman_pixelkings/pen/NNbqgG
// https://stackoverflow.com/questions/38686650/slick-slides-on-pagination-hover


/**
Slick slider
*/
if( $('.responsive-slider').length ){
    $('.responsive-slider').slick({
      dots: true,
      infinite: false,
      autoplay: true,
      autoplaySpeed: 4000,
      speed: 700,
      slidesToShow: 4,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
}



/* BS form Validator*/
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();




if( $('.plansGrdsSlider').length ){
    $('.plansGrdsSlider').slick({
      dots: true,
      infinite: false,
      arrows:false,
      autoplay: false,
      autoplaySpeed: 4000,
      speed: 700,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
}

if( $('.latestNewsGrdsSlider').length ){
    $('.latestNewsGrdsSlider').slick({
      dots: true,
      infinite: false,
      autoplay: false,
      arrows:false,
      autoplaySpeed: 4000,
      speed: 700,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint:992,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
}

// contact form-val
if( $('.contact-form-wrp').length ){
  $('.contact-form-wrp .wpforms-container .wpforms-form .wpforms-submit-container button').on('click', function(){
    $('.wpforms-field input[required],.wpforms-field select[required]').parents('.wpforms-field').addClass('wpforms-has-error');
    $('.wpforms-field input[required],.wpforms-field select[required]').addClass('wpforms-error');
  });
}


if( $('.wpforms-error').length ){
  $('.wpforms-error').on('click', function(){
    $(this).parents('.wpforms-field').removeClass('wpforms-has-error');
  });
}

$(".type-order-format .woocommerce-input-wrapper span").each(function(){
      $(this).append('<div class="radio-custom"></div>')
});
$(".billing-address-wrap .same-as-shipping-address,.login-info p:first-child,#billing_personal_recom .woocommerce-input-wrapper,#billing_acttion_insp .woocommerce-input-wrapper").each(function(){
      $(this).append('<div class="checkbox-custom"></div>')
});

/*$('.fl-select-cntlr select').addClass('selectpicker');*/
if( $('.fl-select-cntlr').length ){
 $('.fl-select-cntlr select').select2();
}

if( $('#pa_fitness-type').length ){
 $('#pa_fitness-type').select2();
}


if( $('.main-img-crtl').length ){
   $('.main-img-crtl').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: true,
    autoplay:false,
    adaptiveHeight: true,
    asNavFor: '.thumbnails-cntlr .thumbnails',
     prevArrow: $('.fpsprv'),
    nextArrow: $('.fpsnxt'),
  });
}


if( $('.thumbnails-cntlr .thumbnails').length ){
  $('.thumbnails-cntlr .thumbnails').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.main-img-crtl',
    dots: false,
    arrows: false,
    infinite:true,
    autoplay:false,
    focusOnSelect: true,
  });
}

if( $('.relatedProGrdsSlider').length ){
    $('.relatedProGrdsSlider').slick({
      dots: true,
      infinite: false,
      autoplay: false,
      arrows:false,
      autoplaySpeed: 4000,
      speed: 700,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint:768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 575,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
}



  if( $('.hamburger-cntlr').length ){
    $('.hamburger-cntlr').click(function(){
      $('body').toggleClass('allWork');
    });
  }
  if( $('li.menu-item-has-children > a').length ){
    $('li.menu-item-has-children > a').click(function(e){
     event.preventDefault();
     $(this).next().slideToggle(300);
     $(this).parent().toggleClass('sub-menu-arrow');
   });
  }

  if(windowWidth <=767){
    if( $('.clientLogoSlider').length ){
      $('.clientLogoSlider').slick({
        dots: false,
        infinite: false,
        autoplay: true,
        arrows:false,
        autoplaySpeed: 4000,
        speed: 700,
        slidesToShow: 3,
        slidesToScroll: 1
      });
    }
  }


if (windowWidth <= 767) {
  $('.ftr-top-col h6').on('click', function(){
    $(this).toggleClass('active');
    $(this).parent().siblings().find('h6').removeClass('active');
    $(this).parent().find('.ftr-top-col-menu').slideToggle(300);
    $(this).parent().siblings().find('.ftr-top-col-menu').slideUp(300);
  });
}


$(".hdr-white-skew").css('border-left-width', windowWidth);
$(".ftr-white-skew").css('border-right-width', windowWidth);
$(".page-bnr-skew").css('border-right-width', windowWidth);
$(".hm-bnr-skew").css('border-left-width', windowWidth);

  
$(window).resize(function() { 
  var window2Width = $(window).width();
  $(".hdr-white-skew").css('border-left-width', window2Width);
  $(".ftr-white-skew").css('border-right-width', window2Width);
  $(".page-bnr-skew").css('border-right-width', window2Width);
  $(".hm-bnr-skew").css('border-left-width', window2Width);
});




if( $('.dfpTestimonialSlider').length ){
    $('.dfpTestimonialSlider').slick({
      dots: true,
      infinite: false,
      autoplay: false,
      autoplaySpeed: 4000,
      speed: 700,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows:false
    });
}

if( $('.blogDetailsSlider').length ){
    $('.blogDetailsSlider').slick({
      dots: true,
      infinite: false,
      autoplay: false,
      arrows: false,
      autoplaySpeed: 4000,
      speed: 700,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
}

 if (windowWidth <= 639) {
  if( $('.dfpBlogSlider').length ){
    $('.dfpBlogSlider').slick({
      dots: true,
      infinite: false,
      autoplay: false,
      arrows: false,
      autoplaySpeed: 4000,
      speed: 700,
      slidesToShow: 1,
      slidesToScroll: 1
    });
  }
}


 if( $('.referntiesDetailsSlider').length ){
    $('.referntiesDetailsSlider').slick({
      dots: true,
      infinite: false,
      autoplay: false,
      arrows: false,
      autoplaySpeed: 4000,
      speed: 700,
      slidesToShow: 2,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
}


if( $('.qty1').length ){
  $('.qty1').each(function() {
    var spinner = $(this),
      input = spinner.find('input[type="number"]'),
      btnUp = spinner.find('.plus'),
      btnDown = spinner.find('.minus'),
      min = 1,
      max = input.attr('max');

    btnUp.click(function() {
      var oldValue = parseFloat(input.val());
      if (oldValue <= max) {
        var newVal = oldValue;
      } else {
        var newVal = oldValue + 1;
      }
      spinner.find("input").val(newVal);
      spinner.find("input").trigger("change");
    });

    btnDown.click(function() {
      var oldValue = parseFloat(input.val());
      if (oldValue <= min) {
        var newVal = oldValue;
      } else {
        var newVal = oldValue - 1;
      }
      spinner.find("input").val(newVal);
      spinner.find("input").trigger("change");
    });

  });

}



  if(windowWidth <=767){
    if( $('.ovomblfvSlider').length ){
      $('.ovomblfvSlider').slick({
        dots: true,
        infinite: false,
        autoplay: true,
        arrows:false,
        autoplaySpeed: 4000,
        speed: 700,
        slidesToShow: 1,
        slidesToScroll: 1,
        slidesPerRow: 3,
        responsive: [
        {
          breakpoint: 768,
          settings: {
            infinite: false,
            rows:1,
            slidesPerRow: 2,
            slidesToShow: 1,
            slidesToScroll: 1,
          }
        }
        ]
      });
    }
  }

  if(windowWidth <=767){
    if( $('.werkmsgSlider').length ){
      $('.werkmsgSlider').slick({
        dots: true,
        infinite: false,
        autoplay: true,
        arrows:false,
        autoplaySpeed: 4000,
        speed: 700,
        slidesToShow: 1,
        slidesToScroll: 1,
        slidesPerRow: 3,
        responsive: [
        {
          breakpoint: 768,
          settings: {
            infinite: false,
            rows:1,
            slidesPerRow: 2,
            slidesToShow: 1,
            slidesToScroll: 1,
          }
        }
        ]
      });
    }
  }

if( $('.faqSlider1').length ){
    $('.faqSlider1').slick({
      dots: true,
      arrows:false,
      infinite: false,
      autoplay: false,
      rows: 2,
      slidesPerRow: 2,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplaySpeed: 4000,
      speed: 700,    
          responsive: [
      {
        breakpoint: 768,
        settings: {
          infinite: false,
          rows: 3,
          slidesPerRow: 1,
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      }
    ]
      
    });
    $('.faq-slide-item').parent().addClass('ovo-faq-slider-addcls');
}
  if( $('.faqSlider2').length ){
    if(windowWidth <=639){
      $('.faqSlider2').slick({
        dots: true,
        arrows:false,
        infinite: false,
        autoplay: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplaySpeed: 4000,
        speed: 700,          
      });
    }else{
      $('.faqSlider2').slick({
        dots: true,
        arrows:false,
        infinite: false,
        autoplay: false,
        rows: 2,
        slidesPerRow: 2,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplaySpeed: 4000,
        speed: 700,        
      });
      $('.faq-slide-item').parent().addClass('ovo-faq-slider-addcls');

    }
  }

  if(windowWidth <=767){
    if( $('.ovomblfvSlider').length ){
      $('.ovomblfvSlider').slick({
        dots: false,
        infinite: false,
        autoplay: true,
        arrows:false,
        autoplaySpeed: 4000,
        speed: 700,
        slidesToShow: 1,
        slidesToScroll: 1
      });
    }
  }


/*$('.relatedProGrdsSlider').each(function() {
    var $this = $(this);
    var count = this.find('.slick-dots').children().length;
    //var count = this.find('ul.slick-dots').length;
    if (count = 1) {
      $('.slick-dots').hide();
    }
    alert(count);
    if ($this.children().length > 1) {
        $this.slick({
           dots: false
        });
        alert()
    }
});*/

/*var relatedProGrdsSliderCount = $('.dfpTestimonialSlider ul.slick-dots').children().length;
if (relatedProGrdsSliderCount = 1) {
      $('.dfpTestimonialSlider ul.slick-dots').addClass('tt');
}
*/

})(jQuery);

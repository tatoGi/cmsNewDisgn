$('.main-slider').slick({
    nextArrow: false,
    prevArrow: false,
    // autoplay:true,
    // autoplaySpeed:2500,
    // infinite: true,W
    prevArrow:$('#left-arrow'),
    nextArrow:$('#right-arrow'),
    dots: true
  });
  
  $(document).ready(function(){
    $('.project-slider').slick({
        centerMode: true,
        autoplay:true,
        autoplaySpeed:3500,
        centerPadding: '150px',
        slidesToShow: 3,
        nextArrow: false,
        prevArrow: false,
        responsive: [
          {
            breakpoint: 1638,
            settings: {
              centerMode: true,
              centerPadding: '90px',
              slidesToShow: 3
            }
          },
          {
            breakpoint: 1399,
            settings: {
              centerMode: true,
              centerPadding: '90px',
              slidesToShow: 3
            }
          },
          {
            breakpoint: 1199,
            settings: {
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 3
            }
          },
          {
            breakpoint: 991,
            settings: {
              centerMode: true,
              centerPadding: '60px',
              slidesToShow: 3
            }
          },
          {
            breakpoint: 768,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 3
            }
          },
          {
            breakpoint: 574,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '90px',
              slidesToShow: 1
            }
          }
        ]
      });
  });
  $(document).ready(function() {
    // $type = document.getElementById('type').value;
    // alert($type);
    $(".slick-dots li button").text(" ");
 });

 $(window).scroll(function(){
    var headSticky = $('.header-container'),
        scroll = $(window).scrollTop();
  
    if (scroll >= 1) headSticky.addClass('header-bg');
    else headSticky.removeClass('header-bg');
  });
  $(document).on('click', '.navigation nav li', function(){
    $(this).addClass('colored').siblings().removeClass('colored');
  })

  $('.burger-lines').on('click', function(){
    $('.burger').toggleClass('opens');
  });
  
  function openPos(evt, positName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active-color", "");
    }
    document.getElementById(positName).style.display = "block";
    evt.currentTarget.className += " active-color";
  }

  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#searchList .search-results").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
    });
  });


    
  $(document).on('click', '.burger-links ul li span', function(){
    if (!$(this).closest('.burger-links ul li').hasClass('burger-link-active')) {
      $('.burger-links ul li').removeClass('burger-link-active');    
    }
    $(this).closest('.burger-links ul li').toggleClass('burger-link-active'); 
  });

  $(document).ready(function() {
    var liLoop = document.getElementsByClassName("burger-submenu");
    for(var i = 0; i < liLoop.length; i++){
        $(liLoop[i]).closest('.burger-links ul li').addClass("arrow-hide"); 
    }

 });

 
$(document).ready(function (){
  setTimeout(() => { 
    var alertBox = document.getElementsByClassName("alert");
    $(alertBox).css('display', 'none')
  }, 4000);
});
 
// $(document).ready(function() {
//   var hiddenText = document.getElementsByClassName("hidden-link-mob");
//   var WorkH = document.getElementsByClassName("work-h");
//   if($(hiddenText).is(':empty')){
//     $(WorkH).css("display", "none");
//   } else {
//     $(WorkH).css("display", "initial");
//   }

// });

$('.count').each(function () {
  $(this).prop('Counter',0).animate({
      Counter: $(this).text()
  }, {
      duration: 4000,
      easing: 'swing',
      step: function (now) {
          $(this).text(Math.ceil(now));
      }
  });
});


window.sr = ScrollReveal();
sr.reveal('.about-text .text', {
  duration: 1000,
  origin: 'left',
  distance: '400px',
  mobile: false
});

sr.reveal('.about-text h1', {
  duration: 1500,
  origin: 'left',
  distance: '400px',
  mobile: false
});

sr.reveal('.pad-l .card-padding:nth-child(1n)', {
  duration: 500,
  origin: 'bottom',
  distance: '150px',
  viewFactor: 0.2,
  mobile: false
});
sr.reveal('.pad-l .card-padding:nth-child(2n)', {
  duration: 1000,
  origin: 'bottom',
  distance: '150px',
  viewFactor: 0.2,
  mobile: false
});
sr.reveal('.pad-l .card-padding:nth-child(3n)', {
  duration: 1500,
  origin: 'bottom',
  distance: '150px',
  viewFactor: 0.2,
  mobile: false
})
sr.reveal('.pad-l .card-padding:nth-child(4n)', {
  duration: 2500,
  origin: 'bottom',
  distance: '150px',
  viewFactor: 0.2,
  mobile: false
});

sr.reveal('.more-link', {
  duration: 1000,
  delay: 500,
  origin: 'bottom',
  distance: '30px',
  mobile: false
});
sr.reveal('.project-slider', {
  duration: 2000,
  origin: 'bottom',
  distance: '150px',
  mobile: false
});
sr.reveal('.project-text h1', {
  duration: 1500,
  origin: 'left',
  distance: '400px',
  mobile: false
});

sr.reveal('.project-text .text', {
  duration: 1500,
  origin: 'right',
  distance: '400px',
  mobile: false
});
sr.reveal('.services-text h1', {
  duration: 1000,
  origin: 'left',
  distance: '200px',
  mobile: false
});
sr.reveal('.services-text h3', {
  duration: 1500,
  origin: 'left',
  distance: '200px',
  mobile: false
});

sr.reveal('.services-row .mg-center-2:nth-child(3n-2)', {
  duration: 1500, 
  origin: 'left',
  distance: '200px',
  mobile:false
});
sr.reveal('.services-row .mg-center-2:nth-child(2n)', {
  duration: 1500, 
  origin: 'bottom',
  distance: '200px',
  mobile:false
});
sr.reveal('.services-row .mg-center-2:nth-child(3n)', {
  duration: 1500, 
  origin: 'right',
  distance: '200px',
  mobile:false
});

sr.reveal('.tabs', {
  duration: 1500, 
  origin: 'bottom',
  distance: '300px',
  mobile:false
});

sr.reveal('.recent-project-text', {
  duration: 2000, 
  origin: 'right',
  distance: '100px',
  mobile:false
});
sr.reveal('.projects-links .left-side-links', {
  duration: 2000, 
  origin: 'left',
  distance: '100px',
  mobile:false
});
sr.reveal('.projects-links .right-side-links', {
  duration: 2000, 
  origin: 'right',
  distance: '100px',
  mobile:false
});

sr.reveal('.advert-item', {
  duration: 1500,
  origin: 'left',
  distance: '200px',
  mobile: false
});

sr.reveal('.advert-contact', {
  duration: 1500,
  origin: 'right',
  distance: '200px',
  mobile: false
});

sr.reveal('.fot-col', {
  duration: 1500, 
  origin: 'top',
  distance: '200px',
  mobile: false
});

// sr.reveal('.home-banner', {
//   duration: 1500, 
//   origin: 'top',
//   mobile: false
// });

sr.reveal('.text-area .title-text', {
  duration: 2200, 
  delay: 300,
  origin: 'bottom',
  distance: '30px',
  mobile: false
});
sr.reveal('.text-area .text', {
  duration: 2000, 
  origin: 'left',
  distance: '1000px',
  mobile: false
});
sr.reveal('.right-side-img', {
  duration: 1500, 
  origin: 'right',
  distance: '300px',
  mobile: false
});

sr.reveal('.about-content .row .card-padding:nth-child(1n)', {
  duration: 500,
  origin: 'bottom',
  distance: '150px',
  viewFactor: 0.2,
  mobile: false
});
sr.reveal('.about-content .row .card-padding:nth-child(2n)', {
  duration: 1000,
  origin: 'bottom',
  distance: '150px',
  viewFactor: 0.2,
  mobile: false
});
sr.reveal('.about-content .row .card-padding:nth-child(3n)', {
  duration: 1500,
  origin: 'bottom',
  distance: '150px',
  mobile: false
})
sr.reveal('.about-content .row .card-padding:nth-child(4n)', {
  duration: 2500,
  origin: 'bottom',
  distance: '150px',
  mobile: false
});
sr.reveal('.bandcamp', {
  duration: 2000,
  origin: 'left',
  distance: '450px',
  mobile: false
});
sr.reveal('.pagination', {
  duration: 1200,
  origin: 'bottom',
  distance: '50px',
  mobile: false
});
sr.reveal('.projects-links .team-list-links h1', {
  duration: 1500,
  origin: 'left',
  distance: '200px',
  mobile: false
});
sr.reveal('.projects-links .team-list-links .list-links', {
  duration: 1500,
  origin: 'right',
  distance: '400px',
  mobile: false
});

sr.reveal('.detail-text-area h1', {
  duration: 1500,
  origin: 'left',
  distance: '400px',
  mobile: false
});
sr.reveal('.detail-text-area h2', {
  duration: 1100,
  origin: 'left',
  distance: '400px',
  mobile: false
});
sr.reveal('.detail-text-area .text', {
  duration: 2000,
  origin: 'left',
  distance: '400px',
  mobile: false
});
sr.reveal('.special-row-box .p-r-2', {
  duration: 1500,
  origin: 'bottom',
  distance: '400px',
  mobile: false
});

sr.reveal('.services-boxes .service-text-box .img-icon', {
  duration: 1000,
  origin: 'left',
  distance: '400px',
  mobile: false
});
sr.reveal('.services-boxes .service-text-box h1', {
  duration: 1200,
  origin: 'left',
  distance: '400px',
  mobile: false
});
sr.reveal('.services-boxes .service-text-box .text', {
  duration: 1800,
  origin: 'left',
  distance: '600px',
  mobile: false
});

sr.reveal('.services-boxes .service-text-box ul li:nth-child(1n)', {
  duration: 2000,
  origin: 'bottom',
  distance: '30px',
  mobile: false
});
sr.reveal('.services-boxes .service-text-box ul li:nth-child(2n)', {
  duration: 2200,
  origin: 'bottom',
  distance: '30px',
  mobile: false
});
sr.reveal('.services-boxes .service-text-box ul li:nth-child(3n)', {
  duration: 2400,
  origin: 'bottom',
  distance: '30px',
  mobile: false
});
sr.reveal('.services-boxes .service-text-box ul li:nth-child(4n)', {
  duration: 2600,
  origin: 'bottom',
  distance: '30px',
  mobile: false
});
sr.reveal('.services-boxes .service-text-box .booking-service', {
  duration: 2000,
  delay: 300,
  origin: 'bottom',
  distance: '30px',
  mobile: false
});
sr.reveal('.services-boxes .hide-service-img', {
  duration: 2000,
  origin: 'right',
  distance: '300px',
  mobile: false
});
sr.reveal('.team-members-list .team-list-links h1', {
  duration: 2000,
  origin: 'left',
  distance: '300px',
  mobile: false
});
sr.reveal('.team-members-list .team-list-links .list-links', {
  duration: 2000,
  origin: 'right',
  distance: '300px',
  mobile: false
});

sr.reveal('.contact .contact-box h1', {
  duration: 1500,
  origin: 'left',
  distance: '300px',
  mobile: false
});

sr.reveal('.contact .contact-box .contact-links span:first-child', {
  duration: 1500,
  origin: 'left',
  distance: '300px',
  mobile: false
});
sr.reveal('.contact .contact-box .contact-links span:nth-child(2n)', {
  duration: 1500,
  delay: 100,
  origin: 'left',
  distance: '300px',
  mobile: false
});
sr.reveal('.contact .contact-box .contact-links span:nth-child(3n)', {
  duration: 1500,
  delay: 200,
  origin: 'left',
  distance: '300px',
  mobile: false
});
sr.reveal('.contact .contact-box .contact-links span:nth-child(4n)', {
  duration: 1500,
  delay: 300,
  origin: 'left',
  distance: '300px',
  mobile: false
});
sr.reveal('.contact .contact-box .contact-links span:nth-child(5n)', {
  duration: 1500,
  delay: 400,
  origin: 'left',
  distance: '300px',
  mobile: false
});
sr.reveal('.contact .contact-box .contact-links span:nth-child(6n)', {
  duration: 1500,
  delay: 500,
  origin: 'left',
  distance: '300px',
  mobile: false
});
sr.reveal('.contact .contact-box .contact-links span:nth-child(7n)', {
  duration: 1500,
  delay: 500,
  origin: 'left',
  distance: '300px',
  mobile: false
});
sr.reveal('.contact .hidden-img', {
  duration: 1500,
  origin: 'right',
  distance: '300px',
  mobile: false
});

sr.reveal('.map-side .map-bg', {
  duration: 1500,
  origin: 'bottom',
  distance: '20px',
  mobile: false
});
sr.reveal('.map-side .map-box', {
  duration: 1500,
  delay: 200,
  origin: 'bottom',
  distance: '40px',
  mobile: false
});

// sr.reveal('.contact-form .form-box h1', {
//   duration: 1500,
//   origin: 'top',
//   distance: '30px',
//   mobile: false
// });
// sr.reveal('.contact-form .form-box form', {
//   duration: 1500,
//   origin: 'bottom',
//   distance: '60px',
//   mobile: false
// });

sr.reveal('.contact-form .form-box .btn-contact', {
  duration: 1500,
  delay: 200,
  origin: 'bottom',
  distance: '30px',
  mobile: false
});
sr.reveal('.person-info .person-box h1' , {
  duration: 1500,
  origin: 'left',
  distance: '300px',
  mobile: false
});
sr.reveal('.person-info .person-box .person-info-box' , {
  duration: 1500,
  delay: 300,
  origin: 'left',
  distance: '300px',
  mobile: false
});
sr.reveal('.person-info .person-box .person-special h2' , {
  duration: 1500,
  delay: 300,
  origin: 'left',
  distance: '300px',
  mobile: false
});
sr.reveal('.person-info .person-box .person-special ul' , {
  duration: 1500,
  delay: 400,
  origin: 'bottom',
  distance: '50px',
  mobile: false
});
sr.reveal('.person-info .person-box .person-special .person-contact-link' , {
  duration: 1500,
  delay: 600,
  origin: 'bottom',
  distance: '50px',
  mobile: false
});
sr.reveal('.person-info-text' , {
  duration: 1500,
  delay: 200,
  origin: 'bottom',
  distance: '50px',
  mobile: false
});



$(document).ready(function(){
  console.log('Javascript Loaded...');
  localStorage.setItem('eventBugShown', 'true');

  $('.hero-slide-container').slick({
    infinite: true,
    autoplay: true,
    autoplaySpeed: 5000,
    fade: true,
    dots: true,
    lazyLoad: 'ondemand',
    speed: 1200,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          arrows: true,
          dots: true
        }
      },
      {
        breakpoint: 992,
        settings: {
          arrows: true,
          dots: true
        }
      },
      {
        breakpoint: 768,
        settings: {
          arrows: true,
          dots: true
        }
      } ,
      {
        breakpoint: 576,
        settings: {
          arrows: false,
          dots: true
        }
      }     

    ]      
  });
  $('.hero-slide-container').fadeIn();


  // On before slide change
$('.hero-slide-container').on('beforeChange', function(event, slick, currentSlide, nextSlide){
  $('.hero-background').removeClass('active');
  $('div[data-slick-index = "'+nextSlide+'"]').find('.hero-background').addClass('active');
});


// $('hero-slide-container .slick-arrow').on('click', function() {
// $('.hero-background').removeClass('active');
// });

  $('.testimonials-container').slick({
    autoplay: true,
    autoplaySpeed: 6000,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          arrows: false
        }
      } 
    ]      
  });  


    $('.product-carousel').slick({
    autoplay: true,
    autoplaySpeed: 2500,
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    // centerMode: true,
    arrows: false,
    pauseOnHover: false,
    speed: 1000,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 4,
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
        }
      } 
    ]  
  });  
  $('.product-carousel').fadeIn();

      $('.adv-slider').slick({
    autoplay: true,
    autoplaySpeed: 3000,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    pauseOnHover: true,
    speed: 1000,
    fade: true
  }); 

  $('#tab').easyResponsiveTabs({
    activetab_bg: '#ffffff',
    inactive_bg: '#ffffff',
    fit: true,
    active_content_border_color: '#ffffff',
  });  




console.log(localStorage.getItem('bug'));
 $('.bug').addClass(localStorage.getItem('bug'));

$('.bug-close').on('click', function() {
    localStorage.setItem('bug', 'inactive');
    $('.bug').removeClass('active');
    $('.bug').addClass('inactive');
});

$('.bug-icon').on('click', function() {
    localStorage.setItem('bug', 'active');
    $('.bug').removeClass('inactive');
    $('.bug').addClass(localStorage.getItem('bug'));
});


function loadFaq() {
  $("#trigger li").first().addClass('active');
  $(".faq-general").fadeIn(100);
  $( "#trigger li" ).click(function() {
    $("#trigger li").removeClass('active');
    $(this).addClass('active');
    $faq = ".faq-" + $(this).attr('id');
    $( ".faq-item" ).hide();
    $( $faq ).fadeIn();
  });
}

if ($("body").hasClass("page-faq")) {
  loadFaq();
}


$(".gpx-drawer:first").addClass('active');

$('.drawer-title').on('click', function() {


   if ($(this).closest('.gpx-drawer').hasClass('active')) {
     console.log('active');
     $(this).closest('.gpx-drawer').removeClass('active');
   } else {
     console.log('nope');
      // $('.gpx-drawer').removeClass('active');
      $(this).closest('.gpx-drawer').toggleClass('active');     
   }
  // $(this).parent().find('.drawer-content').toggle();
});


$('.upcoming-filter a').on('click', function() {
  var myFilter = "." + $(this).data("filter");
  console.log(myFilter);
  // $(".event-row").filter(myFilter).hide(); 
  $('.upcoming-filter a').removeClass('active');
  $(this).addClass('active');
   $('.event-row').hide();
    $(myFilter).fadeIn(300);
});

$('.mobile-nav-trigger').on('click', function() {
  $('.mobile-links-container').addClass('active');
  $('body').addClass('nav-open');
});
$('.nav-close').on('click', function() {
  $('.mobile-links-container').removeClass('active');
  $('body').removeClass('nav-open');
});

$('.mobile-links-container a').on('click', function() {
  $('.mobile-links-container').removeClass('active');
  $('body').removeClass('nav-open');
});


function myFunction(winsize) {
  if (winsize.matches) { // If media query matches
   $('.mobile-links-container').removeClass('active'); 
   $('body').removeClass('nav-open');
  }
}

var winsize = window.matchMedia("(min-width: 1200px)")
myFunction(winsize) // Call listener function at run time
winsize.addListener(myFunction) // Attach listener function on state changes




});

function chat(){
  console.log('toggle chat');
  $('.chat-window').toggle();
}


$('#speakerToggle').on('click', function() {
  $('.speaker-container').toggle();
});

$('#speakerToggle').on('click', function(){
  $(this).html() == "Hide Speakers" ? $(this).html('View Speakers') : $(this).html('Hide Speakers');
});







// chat window controls
$('.chat-toggle').on('click', function() {
  console.log('chat');
  if ($(this).closest('.chat-window').hasClass('active')) {
    console.log('active');
    $(this).closest('.chat-window').removeClass('active');
  } else {
    console.log('nope');
     // $('.chat-window').removeClass('active');
     $(this).closest('.chat-window').toggleClass('active');     
  }  
});
// chat window controls
$('.chat-bug').on('click', function() {
  console.log('chat');
  if ($('.chat-window').hasClass('active')) {
    console.log('active');
    $('.chat-window').removeClass('active');
  } else {
    console.log('nope');
     // $('.chat-window').removeClass('active');
     $('.chat-window').toggleClass('active');     
  }  
});


// chat window controls
$('.chat-toggle-control').on('click', function() {
  console.log('chat');
  if ($(this).closest('.presentation-chat-container').hasClass('docked')) {
    console.log('active');
    $(this).closest('.presentation-chat-container').removeClass('docked');
  } else {
    console.log('nope');
     // $('.presentation-chat-container').removeClass('active');
     $(this).closest('.presentation-chat-container').toggleClass('docked');     
  }  
});
















// chat help controls
$('.chat-question').on('click', function() {
  console.log('chat');
  if ($(this).next('.chat-answer').hasClass('docked')) {
    console.log('active');

    $(this).removeClass('docked');
    $(this).next('.chat-answer').removeClass('docked');
  } else {
    console.log('nope');
     // $('.chat-answer').removeClass('active');
     $('.chat-question').removeClass('docked');
     $('.chat-answer').removeClass('docked');     
     $(this).addClass('docked');     
     $(this).next('.chat-answer').addClass('docked');     
  }  
});

// chat help controls
$('.chat-help-toggle').on('click', function() {
  console.log('chat');
  if ($('.chat-help').hasClass('active')) {
    console.log('active');
    $(this).removeClass('active');
    $('.chat-help').removeClass('active');
  } else {
    console.log('nope');
     // $('.presentation-chat-container').removeClass('active');
     $(this).toggleClass('active');
     $('.chat-help').toggleClass('active');     
  }  
});






// presentation timing
function calcTime(offset) {
  // create Date object for current location
  var d = new Date();

  // convert to msec
  // subtract local time zone offset
  // get UTC time in msec
  var utc = d.getTime() + (d.getTimezoneOffset() * 60000);

  // create new Date object for different city
  // using supplied offset
  var nd = new Date(utc + (3600000*offset));

  // return time as a string
  return nd.toLocaleTimeString([], {timeStyle: 'short'});
}

console.log(calcTime('-4'));



function getHour24(timeString)
{
    time = null;
    var matches = timeString.match(/^(\d{1,2}):00 (\w{2})/);
    if (matches != null && matches.length == 3)
    {
        time = parseInt(matches[1]);
        if (matches[2] == 'PM')
        {
            time += 12;
        }
    }
    return time;
}




var enablePresButtons = function(){  
  
  $( ".presentation-item" ).each(function( index ) {
    // console.log($(this).find('.start-time').text());    
    var startTime = $(this).find('.start-time').text();
    var endTime = $(this).find('.end-time').text();


    var starttime = $(this).find('.start-time').text();
    var starthours = Number(starttime.match(/^(\d+)/)[1]);
    var startminutes = Number(starttime.match(/:(\d+)/)[1]);
    var SAMPM = starttime.match(/\s(.*)$/)[1];
    if(SAMPM == "PM" && starthours<12) starthours = starthours+12;
    if(SAMPM == "AM" && starthours==12) starthours = starthours-12;
    var sHours = starthours.toString();
    var sMinutes = startminutes.toString();
    if(starthours<10) sHours = "0" + sHours;
    if(startminutes<10) sMinutes = "0" + sMinutes;
    console.log(sHours + ":" + sMinutes);
    var startTimeMil = sHours + ":" + sMinutes;


    var endtime = $(this).find('.end-time').text();
    var endhours = Number(endtime.match(/^(\d+)/)[1]);
    var endminutes = Number(endtime.match(/:(\d+)/)[1]);    
    var EAMPM = endtime.match(/\s(.*)$/)[1];
    if(EAMPM == "PM" && endhours<12) endhours = endhours+12;
    if(EAMPM == "AM" && endhours==12) endhours = endhours-12;    
    var eHours = endhours.toString();
    var eMinutes = endminutes.toString();
    if(endhours<10) eHours = "0" + eHours;
    if(endminutes<10) eMinutes = "0" + eMinutes;
    console.log(eHours + ":" + eMinutes);
    var endTimeMil = eHours + ":" + eMinutes;

    var currenttime = calcTime('-4');
    var currenthours = Number(currenttime.match(/^(\d+)/)[1]);
    var currentminutes = Number(currenttime.match(/:(\d+)/)[1]);    
    var CAMPM = currenttime.match(/\s(.*)$/)[1];
    if(CAMPM == "PM" && currenthours<12) currenthours = currenthours+12;
    if(CAMPM == "AM" && currenthours==12) currenthours = currenthours-12;    
    var cHours = currenthours.toString();
    var cMinutes = currentminutes.toString();
    if(currenthours<10) cHours = "0" + cHours;
    if(currentminutes<10) cMinutes = "0" + cMinutes;
    console.log(cHours + ":" + cMinutes);    
    var curTimeMil = cHours + ":" + cMinutes;



   
  
  
    if (curTimeMil >= startTimeMil && curTimeMil < endTimeMil ){
      // console.log('in progress');
      $(this).find('a.button').removeClass('disabled');
      $(this).find('a.button').text('JOIN NOW');
    } else if(curTimeMil >= endTimeMil)  {
      $(this).find('a.button').addClass('disabled');
      $(this).find('a.button').text('ON DEMAND');
    } else {
      $(this).find('a.button').addClass('disabled');
      $(this).find('a.button').text('STARTING SOON');    
    }
  
  })
  }





  if ($('#presentation-list').length > 0) {

    if ($('#presentation-list').hasClass('On-Demand')) {
      $('.button-state').text('On-Demand');
      $('.button-state').removeClass('disabled');
    } else {
      setInterval(enablePresButtons, 1000*15);
      enablePresButtons();  
    }
  
  }
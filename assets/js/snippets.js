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
  
  // console.log(calcTime('-5'));
  
  
  var d = new Date();
  var n = d.getTime();
  // console.log(n);
  
  
  var enablePresButtons = function(){  
  
  $( ".presentation-item" ).each(function( index ) {
    // console.log($(this).find('.start-time').text());    
    var UTC_hours = new Date().getUTCHours() - 7; //Don't add 1 here       
    var myLocalHours = new Date().getHours();
    var startTime = $(this).find('.start-time').text();
    var endTime = $(this).find('.end-time').text();
  
    // console.log(UTC_hours);
    // console.log(myLocalHours);
    // console.log("start: " + startTime);
    // console.log("end: " + endTime);
  
    // var d = new Date();
    // var utc = d.getTime() + (d.getTimezoneOffset() * 60000);
    // console.log(utc);
   
  
  
    // if ((calcTime('-6.9')) >= startTime && (calcTime('-7')) < endTime ){
    //   // console.log('in progress');
    //   $(this).find('a.button').removeClass('disabled');
    //   $(this).find('a.button').text('JOIN NOW');
    // } else if((calcTime('-7')) >= endTime)  {
    //   $(this).find('a.button').addClass('disabled');
    //   $(this).find('a.button').text('STARTING SOON');
    // } else {
    //   $(this).find('a.button').addClass('disabled');
    //   $(this).find('a.button').text('STARTING SOON');    
    // }
  
  })
  }
  
  setInterval(enablePresButtons, 1000*15);
  enablePresButtons();
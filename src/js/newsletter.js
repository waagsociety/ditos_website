!function(){
  var messages = $('div[data-type="message"]');
  //check if user updates the email field

  $('.form .email').keyup(function(event){      
    //check if user has pressed the enter button (event.which == 13)
    if(event.which!= 13) {
      //if not..
      //hide messages and loading bar 
      messages.removeClass('slide-in is-visible');
      $('.form').removeClass('is-submitted').find('.loading').off('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
    }
    var emailInput = $(this);
    var insertedEmail = emailInput.val();
    var atPosition = insertedEmail.indexOf("@");
    var dotPosition = insertedEmail.lastIndexOf(".");
    
    if (atPosition< 1 || dotPosition<atPosition+2 ) {
      $('.form').removeClass('is-active').find('.loading').off('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
    } else {
      //if he has..
      //show the submit button
      $('.form').addClass('is-active');
    }
  });

  //backspace doesn't fire the keyup event in android mobile
  //so we check if the email input is focused to hide messages and loading bar 
  $('.form .email').on('focus', function(){
    messages.removeClass('slide-in is-visible');
    $('.form').removeClass('is-submitted').find('.loading').off('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
  }); 

  //you should replace this part with your ajax function
  $('.submit').on('click', function(event){
    if($('.form').hasClass('is-active')) {
      event.preventDefault();
      //show the loading bar and the corrisponding message
      $('.form').addClass('is-submitted').find('.loading').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
        showMessage();
        $('.form').submit();
      });

      //if transitions are not supported - show messages
      if($('html').hasClass('no-csstransitions')) {
        showMessage();
      }
    }
  });

  function showMessage() {
    if( $('#success').is(':checked') ) {
      $('.response-success').addClass('slide-in');
    } else if ( $('#error').is(':checked') ) {
      $('.response-error').addClass('is-visible');
    } else {
      $('.response-notification').addClass('is-visible');
    }
  }
}()

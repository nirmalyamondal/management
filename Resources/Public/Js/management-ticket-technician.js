$(document).ready(function(){
  $(window).scroll(function () {
      if ($(this).scrollTop() > 50) {
        $('#back-to-top').fadeIn();
      } else {
        $('#back-to-top').fadeOut();
      }
  });
  // scroll body to 0px on click
  $('#back-to-top').click(function () {
      $('body,html').animate({
        scrollTop: 0
      }, 400);
  return false;
  });
});

// Validate ticket edit form for "passcode"

    $(document).ready(function() {    
      //$('.ticket-edit-form .management_passcode_error').removeClass("show").addClass("hidden");
      $(".mgmt-form-submit").click(function(event){
        var passcodeGp = $('.ticket-edit-form #management_passcode').val();
        var passcodeDb = $('.ticket-edit-form .management_passcodeDb').text();       
        if((passcodeGp != passcodeDb) || (passcodeGp == '')){
          //Error Found
          $('.ticket-edit-form .management_passcode_error').removeClass("hidden").addClass("show");
          //alert('Failed: passcodeGp='+passcodeGp+' passcodeDb='+passcodeDb);          
          event.preventDefault();
          return false;
        } else {
          $('.ticket-edit-form .management_passcode_error').removeClass("show").addClass("hidden");   
          //alert('Success: passcodeGp='+passcodeGp+' passcodeDb='+passcodeDb);          
        }
      }); 

    });

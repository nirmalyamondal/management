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

$(function () {
    $("#pdate").datepicker(
      {
        dateFormat: 'dd-mm-yy'
      }
    );
    /*$("#amcstart").datepicker(
      {
        dateFormat: "dd-mm-yy"
      }).datepicker("setDate", "0");*/
    $("#amcstart").datepicker(
      {
        dateFormat: "dd-mm-yy"
      }
    );  
    $("#newProduct #amcexpire").datepicker(
      {
        dateFormat: "dd-mm-yy"
      }).datepicker("setDate", "0");
    //Edit product
    $("#editProduct #amcexpire").datepicker(
      {
        dateFormat: "dd-mm-yy"
      });
    

    //$("#newProduct").validate({  
    $('#newProductSubmit').click( function() {    
      var amcExpire = $('#amcexpire').val();
      if(amcExpire) {
        var amcStart      = $("#amcstart").val();
        var amcStartArr   = amcStart.split("-"); //dd-mm-yyyy
        var amcStartTime  = new Date(amcStartArr[2], amcStartArr[1] - 1, amcStartArr[0]); // new Date(yyyy, mm, dd);

        var amcExpireArr   = amcExpire.split("-"); //dd-mm-yyyy
        var amcExpireTime  = new Date(amcExpireArr[2], amcExpireArr[1] - 1, amcExpireArr[0]); // new Date(yyyy, mm, dd);
        //alert(amcstartTime+' '+$('#amcexpire').val());
        if (amcStartTime > amcExpireTime){
          alert('AMC Expire date should be greater than '+$('#amcstart').val());
          return false;
        }
      }
    });

});


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

$(function(){
  var $table = $('#tx_management_domain_model_customer_table'),
  // initialize tablesorter & pager
  $table
    .tablesorter({
      theme: 'blue',
      widgets: ['zebra', 'columns', 'filter']
    })
});

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

  // initialize custom pager script BEFORE initializing tablesorter/tablesorter pager
  // custom pager looks like this:
  // 1 | 2 … 5 | 6 | 7 … 99 | 100
  //   _       _   _        _     adjacentSpacer
  //       _           _          distanceSpacer
  // _____               ________ ends (2 default)
  //         _________            aroundCurrent (1 default)

  var $table = $('#tx_management_domain_model_ticket_table'),
    $pager = $('#tx_management_domain_model_ticket_pager');

  $.tablesorter.customPagerControls({
    table          : $table,                   // point at correct table (string or jQuery object)
    pager          : $pager,                   // pager wrapper (string or jQuery object)
    pageSize       : '.left a',                // container for page sizes
    currentPage    : '.right a',               // container for page selectors
    ends           : 2,                        // number of pages to show of either end
    aroundCurrent  : 1,                        // number of pages surrounding the current page
    link           : '<a href="#">{page}</a>', // page element; use {page} to include the page number
    currentClass   : 'current',                // current page class name
    adjacentSpacer : '<span> | </span>',       // spacer for page numbers next to each other
    distanceSpacer : '<span> &#133; <span>',   // spacer for page numbers away from each other (ellipsis = &#133;)
    addKeyboard    : true,                     // use left,right,up,down,pageUp,pageDown,home, or end to change current page
    pageKeyStep    : 10                        // page step to use for pageUp and pageDown
  });

  // initialize tablesorter & pager
  $table
    .tablesorter({
      theme: 'blue',
      widgets: ['zebra', 'columns', 'filter']
    })
    .tablesorterPager({
      // target the pager markup - see the HTML block below
      container: $pager,
      size: 10,
      output: 'showing: {startRow} to {endRow} ({filteredRows})'
    });

});

$(function(){

  // initialize custom pager script BEFORE initializing tablesorter/tablesorter pager
  // custom pager looks like this:
  // 1 | 2 … 5 | 6 | 7 … 99 | 100
  //   _       _   _        _     adjacentSpacer
  //       _           _          distanceSpacer
  // _____               ________ ends (2 default)
  //         _________            aroundCurrent (1 default)

  var $table = $('#tx_management_domain_model_message_table'),
    $pager = $('#tx_management_domain_model_message_pager');

  $.tablesorter.customPagerControls({
    table          : $table,                   // point at correct table (string or jQuery object)
    pager          : $pager,                   // pager wrapper (string or jQuery object)
    pageSize       : '.left a',                // container for page sizes
    currentPage    : '.right a',               // container for page selectors
    ends           : 2,                        // number of pages to show of either end
    aroundCurrent  : 1,                        // number of pages surrounding the current page
    link           : '<a href="#">{page}</a>', // page element; use {page} to include the page number
    currentClass   : 'current',                // current page class name
    adjacentSpacer : '<span> | </span>',       // spacer for page numbers next to each other
    distanceSpacer : '<span> &#133; <span>',   // spacer for page numbers away from each other (ellipsis = &#133;)
    addKeyboard    : true,                     // use left,right,up,down,pageUp,pageDown,home, or end to change current page
    pageKeyStep    : 10                        // page step to use for pageUp and pageDown
  });

  // initialize tablesorter & pager
  $table
    .tablesorter({
      theme: 'blue',
      widgets: ['zebra', 'columns']
    })
    .tablesorterPager({
      // target the pager markup - see the HTML block below
      container: $pager,
      size: 10,
      output: 'showing: {startRow} to {endRow} ({filteredRows})'
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


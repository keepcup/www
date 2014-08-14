$(document).ready(function(){
    // $('.CMS-prewiew').perfectScrollbar({
    //     wheelSpeed: 20,
    //     wheelPropagation: false,
    //     suppressScrollX: true
    // });
     $(function() {
    //scrollpane parts
    var scrollPane = $( ".scroll-pane" ),
      scrollContent = $( ".scroll-content" );
 
    //build slider
    var scrollbar = $( ".scroll-bar" ).slider({
      slide: function( event, ui ) {
        if ( scrollContent.height() > scrollPane.height() ) {
          scrollContent.css( "margin-top", Math.round(
            ui.value / 100 * ( scrollPane.height() - scrollContent.height() )
          ) + "px" );
        } else {
          scrollContent.css( "margin-top", 0 );
        }
      }
    });
 
    //append icon to handle
    var handleHelper = scrollbar.find( ".ui-slider-handle" )
    .mousedown(function() {
      scrollbar.height( handleHelper.height() );
    })
    .mouseup(function() {
      scrollbar.height( "100%" );
    })
    .append( "<span class='ui-icon ui-icon-grip-dotted-vertical'></span>" )
    .wrap( "<div class='ui-handle-helper-parent'></div>" ).parent();
 
    //change overflow to hidden now that slider handles the scrolling
    scrollPane.css( "overflow", "hidden" );
 
    //size scrollbar and handle proportionally to scroll distance
    function sizeScrollbar() {
      var remainder = scrollContent.height() - scrollPane.height();
      var proportion = remainder / scrollContent.height();
      var handleSize = scrollPane.height() - ( proportion * scrollPane.height() );
      scrollbar.find( ".ui-slider-handle" ).css({
        height: handleSize,
        "margin-top": -handleSize / 2
      });
      handleHelper.height( "" ).height( scrollbar.height() - handleSize );
    }
 
    //reset slider value based on scroll content position
    function resetValue() {
      var remainder = scrollPane.height() - scrollContent.height();
      var leftVal = scrollContent.css( "margin-top" ) === "auto" ? 0 :
        parseInt( scrollContent.css( "margin-top" ) );
      var percentage = Math.round( leftVal / remainder * 100 );
      scrollbar.slider( "value", percentage );
    }
 
    //if the slider is 100% and window gets larger, reveal content
    function reflowContent() {
        var showing = scrollContent.height() + parseInt( scrollContent.css( "margin-top" ), 10 );
        var gap = scrollPane.height() - showing;
        if ( gap > 0 ) {
          scrollContent.css( "margin-top", parseInt( scrollContent.css( "margin-top" ), 10 ) + gap );
        }
    }
 
    //change handle position on window resize
    $( window ).resize(function() {
      resetValue();
      sizeScrollbar();
      reflowContent();
    });
    //init scrollbar size
    setTimeout( sizeScrollbar, 10 );//safari wants a timeout
  });
	$(".sortable").sortable({ revert:true, cancel: ".ps-scrollbar-y-rail" });
	/*input file*/
	$(".button").mousemove(function(e) {
        var offL, offR, inpStart, aaa;
        offL = $(this).offset().left;
        offT = $(this).offset().top;
        $(this).find("input").css({
            left:e.pageX-offL-160,
            top:e.pageY-offT-14
        })
    });
    $(".clients-prewiew input").iCheck({
        checkboxClass: 'icheckbox_minimal-green',
        increaseArea: '100%' 
    });
    
})/*end*/
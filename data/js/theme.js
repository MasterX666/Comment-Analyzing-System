;(function($) {
    "use strict";

    /*----------------------------------------------------*/
    /*  Main slider js
    /*----------------------------------------------------*/
    function home_main_slider(){
        if ( $('.main_slider_inner').length ){
            jQuery('.main_slider_inner').camera({
                height: '700px',
                loader: true,
                navigation: true,
                autoPlay:false,
                time: 4000,
                playPause: false,
                pagination: false,
                thumbnails: false,
                overlayer: true
            });
        }
    }

    /*----------------------------------------------------*/
    /*  Range slider js
    /*----------------------------------------------------*/
    function slider_range(){
         if ( $('#slider-range').length ){
             $( "#slider-range" ).slider({
                  range: true,
                  min: 0,
                  max: 450,
                  values: [ 50, 300 ],
                  slide: function( event, ui ) {
                    $( "#amount" ).val( "$" + ui.values[ 0 ] + "                       $" + ui.values[ 1 ] );
                }
            });
            $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
              "                       $" + $( "#slider-range" ).slider( "values", 1 ) );
         }
     }
    
    /*----------------------------------------------------*/
    /*  DatePicker
    /*----------------------------------------------------*/ 
    function datepicker(){
        if ( $('#datetimepicker12').length ){
            $('#datetimepicker12').datepicker({
                inline: true,
                sideBySide: true
            });
        }
    }
    
    /*----------------------------------------------------*/
    /*  Image Hover
    /*----------------------------------------------------*/ 
    function image_hover(){
        if ( $('.blog_image').length ){
            $(' .blog_image ').each( function() { $(this).hoverdir(); } );
        }
    }
    
    
     new WOW().init();
    
    
    /*Function Calls*/
    home_main_slider();
    slider_range();
    datepicker();
    image_hover();
    
})(jQuery)
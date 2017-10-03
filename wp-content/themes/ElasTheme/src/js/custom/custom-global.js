//'use strict';


var initMapParam;
var map = null;
var sliderOpts;

(function ($) {
// home bottom slider
    $(document).ready(function () {
        if ($('.slider-home-card').length <= 0) {
            return;
        }
        var $slider_card = $('.slider-home-card').slick({
            dots: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            centerMode: false,
            arrows: true,
            centerPadding: '60px',

            variableWidth: true,
            responsive: [
                {
                    breakpoint: 1500,
                    settings: {
                        dots: true,
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        centerMode: false,
                        arrows: true,
                        centerPadding: '60px',
                        variableWidth: true
                    }
                },
                {
                    breakpoint: 1374,
                    settings: {
                        arrows: true,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 2
                    }
                },

                {
                    breakpoint: 1050,
                    settings: {
                        arrows: true,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                }
            ]

        });
function centeredFullWidch() {
    if ($(window).width() >= 1370) {

        setTimeout(function() {
            $(".slider-home-card ").find('.slick-track').css({'transform': 'translate3d(0px, 0px, 0px)' });
        }, 1000);
        // console.log("yes");
    } else {
        // console.log("no");
        return 0;
    }
}
        centeredFullWidch()


            $(window).on('resize', function () {
                centeredFullWidch()
            });

});
}(jQuery));

(function ($) {

    // logo light
    $(document).ready(function () {
        if ($('body').hasClass('page-template-pagebuilder-homepage')) {

            //  $('#site-logo img').attr('src', '/wp-content/uploads/2017/07/logo-light.svg');
            $('.left_section .logo img').attr('src', '/wp-content/themes/ElasTheme/img/White.svg');
            //console.log("light-logo")
        }
    });

}(jQuery));
(function ($) {


    $(document).ready(function () {



// home select All tab first
        $('#section_item_gallery ul.title_categories li.categories_list:first-child').addClass('active');
        $('#section_item_gallery .tab-content .tab-pane:first-child').addClass('active');

        //our-apartments select All tab first
        $('.our_apartments ul.title_categories li.categories_list:first-child').addClass('active');
        $('.our_apartments .tab-content .tab-pane:first-child').addClass('active');
        $('.categories_section .tab-content  .tab-pane:first-child').addClass('active');



        //Dropdown select with Boostrap
        $(document.body).on('click', '.dropdown-menu li', function (event) {
            $(".our_apartments .categories_list").removeClass('active');
            $(".our_apartments .tab-pane").removeClass('active');

        });

        $('.our_apartments  .dropdown-menu li a').on('click', function () {
            var data = $(this).text();
            // $(this).closest('.dropdown-toggle').find('span[data-bind="label"]').text('data');
            $(this).closest('.our_apartments  .dropdown').find('.dropdown-toggle span[data-bind="label"]').text(data);
            // console.log(data);
        });



        //end our-apartments select All tab first
        var url = document.location.toString();

        if (url.match('#')) {
            $('.our_apartments ul.title_categories li.categories_list:first-child').removeClass('active');
            $('.our_apartments .tab-content .tab-pane:first-child').removeClass('active');
            $('.categories_section .tab-content  .tab-pane:first-child').removeClass('active');


           var l=  $('.nav-tabs a[href=#' + url.split('#')[1] + ']').tab('show');


        }



        $('.nav-tabs  a[href=#' + url.split('#')[1] + ']').on('shown', function (e) {
            console.log('e.target' , e.target.hash);
            window.location.hash = e.target.hash;
        });


        var page = $(".our_apartments");
       // console.log("page");
        if(page.length > 0 ){
          //  console.log("tre");

            $(".kategorien-ul li a ").attr({
                role:"tab",
                'data-toggle':"tab",
                 'aria-expanded':"true"
            });

            $('.kategorien-ul li a').on('click', function () {
                var data = $(this).text();
                // $(this).closest('.dropdown-toggle').find('span[data-bind="label"]').text('data');
                $(this).closest('.dropdown').find('.dropdown-toggle span[data-bind="label"]').text(data).addClass('active');

                $('.our_apartments  .dropdown-menu li a').closest('.our_apartments  .dropdown').find('.dropdown-toggle span[data-bind="label"]').text(data);
                // console.log(data);

            });
        }



    });

}(jQuery));



(function ($) {


    $(document).ready(function () {
        new ReserveDatePicker('#save_dates_input', {editable: false});


        //hotel page slider
        $('.slider-for').slick({
            swipe: true,
            draggable: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            // infinite: true,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            swipe: true,
            draggable: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: true,
            centerMode: true,
            focusOnSelect: true,
            infinite: true,

            responsive: [
                {
                    breakpoint: 700,
                    settings: {
                        infinite: true,
                        arrows: false,
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 530,
                    settings: {
                        infinite: true,
                        arrows: false,
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 400,
                    settings: {
                        infinite: true,
                        arrows: false,
                        slidesToShow: 3
                    }
                }
            ]
        });
    });


    /////////////////map
    $(document).ready(function () {
        function new_map($el) {
            // var

            var markers = $el.find('.marker');
            // vars
            var args = {
                zoom: 16,
                center: new google.maps.LatLng(0, 0),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            // create map
            var map = new google.maps.Map($el[0], args);
            // add a markers reference
            map.markers = [];
            // add markers
            markers.each(function () {

                add_marker($(this), map);

            });
            // center map
            center_map(map);
            // return
            return map;

        }

        /*
         *  center_map
         *
         *  This function will center the map, showing all markers attached to this map
         */

        function center_map(map) {
            // vars
            var bounds = new google.maps.LatLngBounds();
            // loop through all markers and create bounds
            $.each(map.markers, function (i, marker) {
                var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
                bounds.extend(latlng);
            });

            // only 1 marker?
            if (map.markers.length == 1) {
                // set center of map
                map.setCenter(bounds.getCenter());
                map.setZoom(16);
            }
            else {
                // fit to bounds
                map.fitBounds(bounds);
            }

        }

        /*
         *  add_marker
         *
         *  This function will add a marker to the selected Google Map
         */
        var image = {
            path: 'M15.6,0C7,0,0,7,0,15.6S15.7,50,15.7,50s15.6-25.8,15.6-34.4S24.2,0,15.6,0z M15.6,23.1c-4.1,0-7.5-3.3-7.5-7.5c0-4.1,3.3-7.5,7.5-7.5c4.1,0,7.5,3.3,7.5,7.5C23.1,19.7,19.7,23.1,15.6,23.1z',
            fillColor: 'transparent',
            fillOpacity: 1,
            scale: 0.8,
            strokeWeight: 0,
            anchor: new google.maps.Point(20, 40)
        };

        function add_marker($marker, map) {
            // var
            var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));
            // create marker
            var marker = new google.maps.Marker({
                position: latlng,
                icon: image,
                map: map

            });
            // add to array
            map.markers.push(marker);

            //if marker contains HTML, add it to an infoWindow
            if ($marker.html()) {
                // create info window
                var infowindow = new google.maps.InfoWindow({
                    content: $marker.html()
                });

                // show info window when marker is clicked
                google.maps.event.addListener(marker, 'click', function () {

                    infowindow.open(map, marker);

                });
            }
        }

        $('.acf-map').each(function () {

            // create map
            map = new_map($(this));

        });

    });


})(jQuery);

(function ($) {
// Equal heights
    $(document).ready(function () {
        /* Jquery Equal heights plugin by status201.nl */
        !function(i){i.fn.equalHeights=function(n){var o,e={onResize:!0,onLoad:!0},t=i.extend({},e,n),h={},s=0,u=[],a=0,d=0,c=i(this);return c.length<2?this:(t.onResize&&i(window).resize(function(){o&&window.clearTimeout(o),o=window.setTimeout(function(){c.equalHeights({onResize:!1,onLoad:!1})},100)}),t.onLoad&&i(window).load(function(){c.equalHeights({onResize:!1,onLoad:!1})}),c.each(function(){u=i(this),u.height("auto"),a=u.height(),a>0&&(d=u.position().top,s=d in h,s?a>h[d]?(h[d]=a,i(c).filter(function(){return i(this).position().top==d}).height(a)):u.height(h[d]):h[d]=a)}),this)}}(jQuery);

        $(document).ready(function () {
            $('.wrapper_posts_item').equalHeights();
        });
    });

})(jQuery);


(function ($) {
// single page anchor
    $(document).ready(function () {
        $(".bottom_scroll, .bottom_scroll_top").click(function (e) {

            e.preventDefault();

            $('html, body').animate({
                scrollTop: $($.attr(this, 'href')).offset().top
            }, 1500);
        });

    });

})(jQuery);



(function ($) {
    /*
     jQuery Masked Input
        */


    $('#contact_telephone').mask('+99 999 99 999 99' ,{placeholder:' '});
    //
     $('.your-tel input').mask('+99 999 999 99 99' ,{placeholder:' '});

})(jQuery);


(function ($) {

    //iphone keyboard not hiding when tapping the screen

    $(document).ready(function () {

        var page_ipad = $("#single_apartament_page");
        // console.log("page");
        if(page_ipad.length > 0 ) {

            var $has_calendar = $("#single_apartament_page .has_calendar");
            var $start_date = $has_calendar.find('#start_date');
            var $end_date = $has_calendar.find('#end_date');

            $has_calendar.click(function () {
                document.activeElement.blur();
                //console.log("blur");
            });

            $start_date.click(function (event) {
                event.stopPropagation();

            });
            $end_date.click(function (event) {
                event.stopPropagation();
                //alert("uerf")

            });
        }

    });
})(jQuery);



(function ($) {
    $(document).ready(function () {
        $(".tab-content").find('.clearfix').css({'opacity': ' 0.2' });
        $(".tab-content").find('.clearfix').fadeTo( "slow" , 1, function() {
            // Animation complete.
        });


        $('#section_item_gallery .categories_list a').on('click', function(){
            $(document).trigger('CHANGE_TAB');
            $(".tab-content").find('.clearfix').css({'transform': ' translateZ(0px) translateX(0px)', 'width':'unset' });
            $(".tab-content").find('.clearfix').css({'opacity': ' 0.2' });
            $(".tab-content").find('.clearfix').fadeTo( "slow" , 1, function() {
                // Animation complete.
            });
        });

        if ($('.tabs_item_block').length > 0){
            var homeSlider = new HomeSlider();
            homeSlider.init();
        }
        return null;
        console.error('STOP IT!');

       //  var $sly;
       //  var $slidingTabPane;
       // var $frame ;
       //  var $clearfix;
       //  var $scrollbar;
       //  initActiveSlider();
       //
       //  $(document).on('CHANGE_TAB', function () {
       //      setTimeout(function(){
       //          initActiveSlider();
       //
       //      }, 50)
       //
       //
       //      initSliding(fixCss);
       //
       //      // setTimeout(function(){
       //      //      fixCss();
       //      // }, 15)
       //  });
       //
       //  function containerWidth() {
       //      return $clearfix.width();
       //  }
       //
       //  function slidingElementWidth() {
       //      var slides = $slidingTabPane.find('.wrapper_posts_item');
       //      return slides.length * (parseInt(slides.css('width')) + 24);
       //  }
       //
       //
       //
       //  function fixCss() {
       //      setTimeout(function() {
       //          console.log('tab ') ;
       //          if (slidingElementWidth() < containerWidth()) {
       //              $scrollbar.hide();
       //              $frame.find('.clearfix').css({'justify-content': 'center'});
       //          } else {
       //              $scrollbar.show();
       //              $frame.find('.clearfix').css({'justify-content':'unset'});
       //          }
       //      }, 300);
       //  }
       //
       //  function resizeWindow() {
       //      $(window).on('resize', function () {
       //          $sly.stop();
       //          $sly.reload();
       //          reInitMob();
       //      });
       //  }
       //
       //
       //  function reInitMob() {
       //
       //      if ($(window).width() <= 660) {
       //
       //          $sly.stop();
       //          $sly.destroy();
       //      } else {
       //
       //          $sly.init();
       //      }
       //  }
       //
       //
       //  function initSliding(clb) {
       //      $sly.init();
       //      resizeWindow();
       //      reInitMob();
       //      // bedCss();
       //      if (clb)
       //          setTimeout(clb(), 2000);
       //  }
       //
       //  initSliding();
       //
       //
       //  function initActiveSlider(){
       //      $('.tabs_item_block .tab-pane:visible').each(function(){
       //          $slidingTabPane = $(this);
       //          if ($slidingTabPane.data('sliderIsActive')){
       //              return;
       //          }
       //          //console.log('initActiveSlider', $slidingTabPane);
       //          $slidingTabPane.data('sliderIsActive', true);
       //
       //          $frame = $slidingTabPane.find('.frame');
       //           $clearfix = $slidingTabPane.find('.clearfix');
       //          $scrollbar = $slidingTabPane.find('.scrollbar');
       //
       //
       //          $sly = new Sly($frame, {
       //              horizontal: 1,
       //              itemNav: 'centered',
       //              smart: 1,
       //              activateOn: 'click',
       //              scrollSource: null,
       //              mouseDragging: 1,
       //              touchDragging: 1,
       //              releaseSwing: 1,
       //              startAt: 4,
       //              scrollBar: $scrollbar,
       //              scrollBy: 0,
       //              speed: 300,
       //              elasticBounds: 0,
       //              easing: 'easeOutExpo',
       //
       //
       //
       //              dragHandle:    1,    // Whether the scrollbar handle should be dragable.
       //              dynamicHandle: 1,    // Scrollbar handle represents the relation between hidden and visible content.
       //              minHandleSize: 385,   // Minimal height or width (depends on sly direction) of a handle in pixels.
       //              clickBar:      0
       //         })/*.init()*/;
       //        });
       //  }

    });
})(jQuery);




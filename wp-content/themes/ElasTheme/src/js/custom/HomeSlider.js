'use strict';

(function($, window){


    var MOBILE_WIDTH = 660;

    function HomeSlider () {
        this.lastWindowWidth = $(window).width();
        this.$tabsItemBlock = $('.tabs_item_block');
        this.$tabPanes = this.$tabsItemBlock.find('.tab-pane');
        this.$currentTabPane = null;
        this.$currentFrame = null;
        this.$currentClearfix = null;
        this.$currentScrollbar = null;
        this.sly = null;

      //  this.$currentScrollbar && this.$currentScrollbar.hide();
    }
    HomeSlider.prototype.init = function () {
       // console.log('HomeSlider init');
        var _this = this;
        _this._initMobileSwipes();
        _this._centerAllElementsOnLoad();
        $(document).on('CHANGE_TAB', function () {
            setTimeout(function(){
                _this._reInitDesktop();
            }, 50);


        });
        $(window).on('resize', function () {
        //    console.log("resize native");
            if (_this.lastWindowWidth === $(window).width()) {
                return;
            }else {
              //  console.log("resize");
                _this.lastWindowWidth = $(window).width();
                _this._reInitDesktop();
            }
        });
        _this._reInitDesktop();
        // fix apple
        _this._fixApple();
    };
    HomeSlider.prototype._reInitDesktop = function () {
       // console.log('HomeSlider _reInitDesktop');
        var _this = this;
        _this._cacheCurrentElements();
        if (_this._isTooManyItems()) {
           // console.log('slider');
            _this._unCenterCurrent();
            _this._initSly();
            _this._recalculateSly();
        } else {
          //  console.log('center');
            _this._destroySly();
            _this._centerCurrent();
        }
    };
    // DESKTOP version - SLY
    HomeSlider.prototype._initSly = function () {
        var _this = this;
        //alert('_initSly');
       // console.log(_this);
        _this.$currentFrame.children('ul').eq(0);

        _this.sly = new Sly(_this.$currentFrame, {

            horizontal: 1,
            itemNav: 'basic',
            smart: 1,
            activateOn: 'click',
            scrollSource: null,
            mouseDragging: 1,
            touchDragging: 1,
            releaseSwing: 1,
            startAt: 4,
            scrollBar: _this.$currentScrollbar,

            scrollBy: 0,
            speed: 300,
            elasticBounds: 0,
            easing: 'easeOutExpo',

            dragHandle:    1,    // Whether the scrollbar handle should be dragable.
            dynamicHandle: 1,    // Scrollbar handle represents the relation between hidden and visible content.
            minHandleSize: 385,   // Minimal height or width (depends on sly direction) of a handle in pixels.
            clickBar:      0
        }).init()


    };
    HomeSlider.prototype._destroySly = function () {
      //  console.log('_destroySly');
        var _this = this;
         _this.sly.destroy();
    };
    HomeSlider.prototype._recalculateSly = function () {
   //    console.log('_recalculateSly');
        // alert("_recalculateSly");
        var _this = this;
        _this.sly.stop();
        _this.sly.reload();
    };
    // DESKTOP version - center elements
    HomeSlider.prototype._centerAllElementsOnLoad = function () {
        var _this = this;
        this.$tabPanes.each(function(){
            _this._centerElement($(this).find('.clearfix'));
            $(this).find('.scrollbar').hide();


        });
    };
    HomeSlider.prototype._centerCurrent = function () {
        this.$currentScrollbar.hide();
        this._centerElement(this.$currentClearfix);

    };

    HomeSlider.prototype._centerElement = function (e) {
       // console.log(e);
          e.css({'justify-content': 'center'});

       // console.log(" e 1 ",  e);
    };
    HomeSlider.prototype._unCenterCurrent = function () {
        // this.$currentScrollbar.show();
         this.$currentClearfix.css({'justify-content':'unset'});
       // console.log(" this.$currentClearfix 1 ",  this.$currentClearfix);
    };
    // DESKTOP version HELPERS
    HomeSlider.prototype._cacheCurrentElements = function () {
        this.$currentTabPane = this.$tabsItemBlock.find('.tab-pane:visible');
        this.$currentClearfix = this.$currentTabPane.find('.clearfix');
        this.$currentScrollbar = this.$currentTabPane.find('.scrollbar');
        this.$currentFrame = this.$currentTabPane.find('.frame');
    };
    HomeSlider.prototype._isTooManyItems = function () {
        return this._containerWidth() < this._tabPaneWidth();
    };
    HomeSlider.prototype._tabPaneWidth = function () {
        var slides = this.$currentTabPane.find('.wrapper_posts_item');
        return slides.length * (parseInt(slides.css('width')) + 24);
    };
    HomeSlider.prototype._containerWidth = function () {
        return $(window).width();
    };

    // MOBILE VERSION
    HomeSlider.prototype._initMobileSwipes = function () {
        var _this = this;
     //   console.log('HomeSlider _initMobileVersion');
        // this.$tabPanes.hammer().on("panleft panright", function(e){
        //     console.log('pan', arguments);
        //     e.preventDefault();
        //     e.stopPropagation();
        //     return false;
        // });
        var tabs = $('.title_categories .categories_list ');
        var activeTabIndex  = 0;

        $( ".tab-content .frame" ).each(function() {
            this.addEventListener('touchstart', handleTouchStart, false);
            this.addEventListener('touchmove', handleTouchMove, false);
        });

        var xDown = null;
        var yDown = null;

        function handleTouchStart(evt) {
            xDown = evt.touches[0].clientX;
            yDown = evt.touches[0].clientY;
        };
        function handleTouchMove(evt) {
            if ( ! xDown || ! yDown ) {
                return;
            }
            var xUp = evt.touches[0].clientX;
            var yUp = evt.touches[0].clientY;

            var xDiff = xDown - xUp;
            var yDiff = yDown - yUp;

            if ( Math.abs( xDiff ) > Math.abs( yDiff ) ) {/*most significant*/
                if ( xDiff > 0 ) {
                    /* left swipe */
                    //console.log("left", activeTabIndex);
                    activeTabIndex = (activeTabIndex + 1) % tabs.length;
                    swichTab();
                } else {
                    activeTabIndex = (activeTabIndex + tabs.length - 1) % tabs.length;
                    swichTab();
                }
            } else {
                if ( yDiff > 0 ) {
                    /* up swipe */
                } else {
                    /* down swipe */
                }
            }
            /* reset values */
            xDown = null;
            yDown = null;
        };
        function swichTab () {
            if (!_this._isMobile()) {
                return;
            }
            $(".title_categories .active").removeClass('active');
            $(".tab-content .active").removeClass('active');
            $(".title_categories .categories_list:eq(" + activeTabIndex + ")").addClass("active");
            $(".tab-content .tab-pane:eq(" + activeTabIndex + ")").addClass("active");
        }
    };
    // HELPERS
    HomeSlider.prototype._fixApple = function () {
        window.blockMenuHeaderScroll = false;
        $("body").on('touchstart', function(e)
        {
            if ($(e.target).closest('#mobileMenuHeader').length == 1)
            {
                window.blockMenuHeaderScroll = true;
            }
        });
        $(window).on('touchend', function()
        {
            window.blockMenuHeaderScroll = false;
        });
        $(window).on('touchmove', function(e)
        {
            if (window.blockMenuHeaderScroll)
            {
                e.preventDefault();
            }
        });
    };
    HomeSlider.prototype._isMobile = function () {
        return $(window).width() < MOBILE_WIDTH;
    };
    window.HomeSlider = HomeSlider




})(jQuery, window);





(function($) {
    "use strict";

    window.edgt = {};
    edgt.modules = {};

    edgt.scroll = 0;
    edgt.window = $(window);
    edgt.document = $(document);
    edgt.windowWidth = $(window).width();
    edgt.windowHeight = $(window).height();
    edgt.body = $('body');
    edgt.html = $('html, body');
    edgt.htmlEl = $('html');
    edgt.menuDropdownHeightSet = false;
    edgt.defaultHeaderStyle = '';
    edgt.minVideoWidth = 1500;
    edgt.videoWidthOriginal = 1280;
    edgt.videoHeightOriginal = 720;
    edgt.videoRatio = 1280/720;

	function edgtTransitionEvent() {
		var el = document.createElement('transitionDetector'),
			transEndEventNames = {
				'WebkitTransition' : 'webkitTransitionEnd',// Saf 6, Android Browser
				'MozTransition'    : 'transitionend',      // only for FF < 15
				'transition'       : 'transitionend'       // IE10, Opera, Chrome, FF 15+, Saf 7+
			};

		for(var t in transEndEventNames){
			if( el.style[t] !== undefined ){
				return transEndEventNames[t];
			}
		}
	}

	edgt.transitionEnd = edgtTransitionEvent();

    edgt.edgtOnDocumentReady = edgtOnDocumentReady;
    edgt.edgtOnWindowLoad = edgtOnWindowLoad;
    edgt.edgtOnWindowResize = edgtOnWindowResize;
    edgt.edgtOnWindowScroll = edgtOnWindowScroll;

    $(document).ready(edgtOnDocumentReady);
    $(window).load(edgtOnWindowLoad);
    $(window).resize(edgtOnWindowResize);
    $(window).scroll(edgtOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtOnDocumentReady() {
        edgt.scroll = $(window).scrollTop();

        //set global variable for header style which we will use in various functions
        if(edgt.body.hasClass('edgt-dark-header')){ edgt.defaultHeaderStyle = 'edgt-dark-header';}
        if(edgt.body.hasClass('edgt-light-header')){ edgt.defaultHeaderStyle = 'edgt-light-header';}

    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function edgtOnWindowLoad() {

    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function edgtOnWindowResize() {
        edgt.windowWidth = $(window).width();
        edgt.windowHeight = $(window).height();
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function edgtOnWindowScroll() {
        edgt.scroll = $(window).scrollTop();
    }



    //set boxed layout width variable for various calculations

    switch(true){
        case edgt.body.hasClass('edgt-grid-1300'):
            edgt.boxedLayoutWidth = 1350;
            break;
        case edgt.body.hasClass('edgt-grid-1200'):
            edgt.boxedLayoutWidth = 1250;
            break;
        case edgt.body.hasClass('edgt-grid-1000'):
            edgt.boxedLayoutWidth = 1050;
            break;
        case edgt.body.hasClass('edgt-grid-800'):
            edgt.boxedLayoutWidth = 850;
            break;
        default :
            edgt.boxedLayoutWidth = 1150;
            break;
    }

})(jQuery);
(function ($) {
    "use strict";

    var common = {};
    edgt.modules.common = common;

    common.edgtIsTouchDevice = edgtIsTouchDevice;
    common.edgtDisableSmoothScrollForMac = edgtDisableSmoothScrollForMac;
    common.edgtFluidVideo = edgtFluidVideo;
    common.edgtPreloadBackgrounds = edgtPreloadBackgrounds;
    common.edgtPrettyPhoto = edgtPrettyPhoto;
    common.edgtCheckHeaderStyleOnScroll = edgtCheckHeaderStyleOnScroll;
    common.edgtInitParallax = edgtInitParallax;
    //common.edgtSmoothScroll = edgtSmoothScroll;
    common.edgtEnableScroll = edgtEnableScroll;
    common.edgtDisableScroll = edgtDisableScroll;
    common.edgtWheel = edgtWheel;
    common.edgtKeydown = edgtKeydown;
    common.edgtPreventDefaultValue = edgtPreventDefaultValue;
    common.edgtSlickSlider = edgtSlickSlider;
    common.edgtInitSelfHostedVideoPlayer = edgtInitSelfHostedVideoPlayer;
    common.edgtSelfHostedVideoSize = edgtSelfHostedVideoSize;
    common.edgtInitBackToTop = edgtInitBackToTop;
    common.edgtBackButtonShowHide = edgtBackButtonShowHide;
    common.edgtSmoothTransition = edgtSmoothTransition;
    common.edgtgetScrollX = edgtgetScrollX;
    common.edgtgetScrollY = edgtgetScrollY;
    common.edgtInitCustomMenuDropdown = edgtInitCustomMenuDropdown;
    common.edgtInitSelect2 = edgtInitSelect2;
    common.edgtLazyImages = edgtLazyImages;
    common.edgtRequestAnimationFrame = edgtRequestAnimationFrame;

    common.edgtOnDocumentReady = edgtOnDocumentReady;
    common.edgtOnWindowLoad = edgtOnWindowLoad;
    common.edgtOnWindowResize = edgtOnWindowResize;
    common.edgtOnWindowScroll = edgtOnWindowScroll;
    common.edgtIsTouchDevice = edgtIsTouchDevice;

    $(document).ready(edgtOnDocumentReady);
    $(window).load(edgtOnWindowLoad);
    $(window).resize(edgtOnWindowResize);
    $(window).scroll(edgtOnWindowScroll);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtOnDocumentReady() {
        edgtLazyImages();
        edgtTouchDeviceBodyClass();
        edgtDisableSmoothScrollForMac();
        edgtFluidVideo();
        edgtPreloadBackgrounds();
        edgtPrettyPhoto();
        edgtInitElementsAnimations();
        edgtInitAnchor().init();
        edgtInitVideoBackground();
        edgtInitVideoBackgroundSize();
        edgtSetContentBottomMargin();
        //edgtSmoothScroll();
        edgtSlickSlider();
        edgtInitSelfHostedVideoPlayer();
        edgtSelfHostedVideoSize();
        edgtInitBackToTop();
        edgtBackButtonShowHide();
        edgtInitCustomMenuDropdown();
        edgtInitSelect2();
        edgtIEVersion();
        edgtSVGSpinner();
        edgtRequestAnimationFrame();
    }

	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	function edgtOnWindowLoad() {
		edgtCheckHeaderStyleOnScroll(); //called on load since all content needs to be loaded in order to calculate row's position right
		edgtSmoothTransition();
	}

	/*
	 All functions to be called on $(window).resize() should be in this function
	 */
	function edgtOnWindowResize() {
		edgtInitVideoBackgroundSize();
		edgtSelfHostedVideoSize();
	}

    /*
     All functions to be called on $(window).scroll() should be in this function
     */
    function edgtOnWindowScroll() {
        edgtLazyImages();
    }

    /*
     ** Disable shortcodes animation on appear for touch devices
     */
    function edgtTouchDeviceBodyClass() {
        if (edgtIsTouchDevice()) {
            edgt.body.addClass('edgt-no-animations-on-touch');
        }
    }

    function edgtIsTouchDevice() {
        return Modernizr.touch && !edgt.body.hasClass('edgt-no-animations-on-touch');
    }

    /*
     ** Disable smooth scroll for mac if smooth scroll is enabled
     */
    function edgtDisableSmoothScrollForMac() {
        var os = navigator.appVersion.toLowerCase();

        if (os.indexOf('mac') > -1 && edgt.body.hasClass('edgt-smooth-scroll')) {
            edgt.body.removeClass('edgt-smooth-scroll');
        }
    }

    function edgtFluidVideo() {
        fluidvids.init({
            selector: ['iframe'],
            players: ['www.youtube.com', 'player.vimeo.com']
        });
    }

    /**
     * Init Slick Slider
     */
    function edgtSlickSlider() {

        var sliders = $('.edgt-slick-slider');

        if (sliders.length) {
            sliders.each(function () {
                var thisSlider = $(this);

                thisSlider.on('init', function () {

                    // change default opacity on init
                    thisSlider.css({'opacity': '1'});

                }).slick({
                    dots: false,
                    arrows: true,
                    fade: true,
                    autoplay: true,
                    autoplaySpeed: 3000,
                    infinite: true,
                    speed: 800,
                    cssEase: 'cubic-bezier(0.23, 1, 0.32, 1)'
                });

            });
        }
    }


    function edgtInitSelect2() {
        if ($('.wpcf7-select').length) {
            $('.wpcf7-select').select2();
        }

        if ($('.edgt-footer-bottom-holder select')) {
            $('.edgt-footer-bottom-holder select').select2();
        }

        if ($('.edgt-footer-top-holder select')) {
            $('.edgt-footer-top-holder select').select2();
        }

        if ($('aside.edgt-sidebar select')) {
            $('aside.edgt-sidebar select').select2();
        }

        if ($('.wpb_widgetised_column select')) {
            $('.wpb_widgetised_column select').select2();
        }
    }

    /*
     *	Preload background images for elements that have 'edgt-preload-background' class
     */
    function edgtPreloadBackgrounds() {

        $(".edgt-preload-background").each(function () {
            var preloadBackground = $(this);
            if (preloadBackground.css("background-image") !== "" && preloadBackground.css("background-image") != "none") {

                var bgUrl = preloadBackground.attr('style');

                bgUrl = bgUrl.match(/url\(["']?([^'")]+)['"]?\)/);
                bgUrl = bgUrl ? bgUrl[1] : "";

                if (bgUrl) {
                    var backImg = new Image();
                    backImg.src = bgUrl;
                    $(backImg).load(function () {
                        preloadBackground.removeClass('edgt-preload-background');
                    });
                }
            } else {
                $(window).load(function () {
                    preloadBackground.removeClass('edgt-preload-background');
                }); //make sure that edgt-preload-background class is removed from elements with forced background none in css
            }
        });
    }

    /* This prettyPhoto script is added because of our video banner shortcode*/
    function edgtPrettyPhoto() {
        /*jshint multistr: true */
        var markupWhole = '<div class="pp_pic_holder"> \
                        <div class="ppt">&nbsp;</div> \
                        <div class="pp_top"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                        <div class="pp_content_container"> \
                            <div class="pp_left"> \
                            <div class="pp_right"> \
                                <div class="pp_content"> \
                                    <div class="pp_loaderIcon"></div> \
                                    <div class="pp_fade"> \
                                        <a href="#" class="pp_expand" title="Expand the image">Expand</a> \
                                        <div class="pp_hoverContainer"> \
                                            <a class="pp_next" href="#"><span class="fa fa-angle-right"></span></a> \
                                            <a class="pp_previous" href="#"><span class="fa fa-angle-left"></span></a> \
                                        </div> \
                                        <div id="pp_full_res"></div> \
                                        <div class="pp_details"> \
                                            <div class="pp_nav"> \
                                                <a href="#" class="pp_arrow_previous">Previous</a> \
                                                <p class="currentTextHolder">0/0</p> \
                                                <a href="#" class="pp_arrow_next">Next</a> \
                                            </div> \
                                            <p class="pp_description"></p> \
                                            {pp_social} \
                                            <a class="pp_close" href="#">Close</a> \
                                        </div> \
                                    </div> \
                                </div> \
                            </div> \
                            </div> \
                        </div> \
                        <div class="pp_bottom"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                    </div> \
                    <div class="pp_overlay"></div>';

        $("a[data-rel^='prettyPhoto']").prettyPhoto({
            hook: 'data-rel',
            animation_speed: 'normal', /* fast/slow/normal */
            slideshow: false, /* false OR interval time in ms */
            autoplay_slideshow: false, /* true/false */
            opacity: 0.80, /* Value between 0 and 1 */
            show_title: true, /* true/false */
            allow_resize: true, /* Resize the photos bigger than viewport. true/false */
            horizontal_padding: 0,
            default_width: 960,
            default_height: 540,
            counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
            theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
            hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
            wmode: 'opaque', /* Set the flash wmode attribute */
            autoplay: true, /* Automatically start videos: True/False */
            modal: false, /* If set to true, only the close button will close the window */
            overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
            keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
            deeplinking: false,
            custom_markup: '',
            social_tools: false,
            markup: markupWhole
        });
    }

    /*
     *	Check header style on scroll, depending on row settings
     */
    function edgtCheckHeaderStyleOnScroll() {

        if ($('[data-edgt_header_style]').length > 0 && edgt.body.hasClass('edgt-header-style-on-scroll')) {

            var waypointSelectors = $('.wpb_row.edgt-section');
            var changeStyle = function (element) {
                if(element.data("edgt_header_style") !== undefined) {
                    edgt.body.removeClass('edgt-dark-header edgt-light-header').addClass(element.data("edgt_header_style"));
                } else {
                    edgt.body.removeClass('edgt-dark-header edgt-light-header').addClass('' + edgt.defaultHeaderStyle);
                }
            };

            waypointSelectors.waypoint(function (direction) {
                if (direction === 'down') {
                    changeStyle($(this.element));
                }
            }, {offset: 0});

            waypointSelectors.waypoint(function (direction) {
                if (direction === 'up') {
                    changeStyle($(this.element));
                }
            }, {
                offset: function () {
                    return -$(this.element).outerHeight();
                }
            });
        }
    }

    /*
     *	Start animations on elements
     */
    function edgtInitElementsAnimations() {

        var touchClass = $('.edgt-no-animations-on-touch'),
            noAnimationsOnTouch = true,
            elements = $('.edgt-grow-in, .edgt-fade-in-down, .edgt-element-from-fade, .edgt-element-from-left, .edgt-element-from-right, .edgt-element-from-top, .edgt-element-from-bottom, .edgt-flip-in, .edgt-x-rotate, .edgt-z-rotate, .edgt-y-translate, .edgt-fade-in, .edgt-fade-in-left-x-rotate'),
            animationClass,
            animationData;

        if (touchClass.length) {
            noAnimationsOnTouch = false;
        }

        if (elements.length > 0 && noAnimationsOnTouch) {
            elements.each(function () {
                $(this).appear(function () {
                    animationData = $(this).data('animation');
                    if (typeof animationData !== 'undefined' && animationData !== '') {
                        animationClass = animationData;
                        $(this).addClass(animationClass + '-on');
                    }
                }, {accX: 0, accY: edgtGlobalVars.vars.edgtElementAppearAmount});
            });
        }

    }


    /*
     **	Sections with parallax background image
     */
    function edgtInitParallax() {

        if ($('.edgt-parallax-section-holder').length) {
            $('.edgt-parallax-section-holder').each(function () {

                var parallaxElement = $(this);
                if (parallaxElement.hasClass('edgt-full-screen-height-parallax')) {
                    parallaxElement.height(edgt.windowHeight);
                    parallaxElement.find('.edgt-parallax-content-outer').css('padding', 0);
                }
                var speed = parallaxElement.data('edgt-parallax-speed') * 0.4;
                parallaxElement.parallax("50%", speed);
            });
        }
    }

    /*
     **	Anchor functionality
     */
    var edgtInitAnchor = edgt.modules.common.edgtInitAnchor = function () {

        /**
         * Set active state on clicked anchor
         * @param anchor, clicked anchor
         */
        var setActiveState = function (anchor) {

            $('.edgt-main-menu .edgt-active-item, .edgt-mobile-nav .edgt-active-item, .edgt-vertical-menu .edgt-active-item, .edgt-fullscreen-menu .edgt-active-item').removeClass('edgt-active-item');
            anchor.parent().addClass('edgt-active-item');

            $('.edgt-main-menu a, .edgt-mobile-nav a, .edgt-vertical-menu a, .edgt-fullscreen-menu a').removeClass('current');
            anchor.addClass('current');
        };

        /**
         * Check anchor active state on scroll
         */
        var checkActiveStateOnScroll = function () {

            $('[data-edgt-anchor]').waypoint(function (direction) {
                if (direction === 'down') {
                    setActiveState($("a[href='" + window.location.href.split('#')[0] + "#" + $(this.element).data("edgt-anchor") + "']"));
                }
            }, {offset: '50%'});

            $('[data-edgt-anchor]').waypoint(function (direction) {
                if (direction === 'up') {
                    setActiveState($("a[href='" + window.location.href.split('#')[0] + "#" + $(this.element).data("edgt-anchor") + "']"));
                }
            }, {
                offset: function () {
                    return -($(this.element).outerHeight() - 150);
                }
            });

        };

        /**
         * Check anchor active state on load
         */
        var checkActiveStateOnLoad = function () {
            var hash = window.location.hash.split('#')[1];

            if (hash !== "" && $('[data-edgt-anchor="' + hash + '"]').length > 0) {
                //triggers click which is handled in 'anchorClick' function
                var linkURL = window.location.href.split('#')[0] + "#" + hash;
                $("a[href='" + linkURL + '"').trigger("click");
            }
        };

        /**
         * Calculate header height to be substract from scroll amount
         * @param anchoredElementOffset, anchorded element offest
         */
        var headerHeihtToSubtract = function (anchoredElementOffset) {

            if (edgt.modules.header.behaviour == 'edgt-sticky-header-on-scroll-down-up') {
                if(anchoredElementOffset > edgt.modules.header.stickyAppearAmount) {
                    edgt.modules.header.isStickyVisible = true;
                } else {
                    edgt.modules.header.isStickyVisible = false;
                }
            }

            if (edgt.modules.header.behaviour == 'edgt-sticky-header-on-scroll-up') {
                if(anchoredElementOffset > edgt.scroll) {
                    edgt.modules.header.isStickyVisible = false;
                }
            }

            var headerHeight = edgt.modules.header.isStickyVisible ? edgtGlobalVars.vars.edgtStickyHeaderTransparencyHeight : edgtPerPageVars.vars.edgtHeaderTransparencyHeight;

            return headerHeight;
        };

        /**
         * Handle anchor click
         */
        var anchorClick = function () {
            edgt.document.on("click", ".edgt-main-menu a, .edgt-vertical-menu a, .edgt-fullscreen-menu a, .edgt-btn, .edgt-anchor, .edgt-mobile-nav a", function () {
                var scrollAmount;
                var anchor = $(this);
                var hash = anchor.prop("hash").split('#')[1];

                if (hash !== "" && $('[data-edgt-anchor="' + hash + '"]').length > 0 /*&& anchor.attr('href').split('#')[0] == window.location.href.split('#')[0]*/) {

                    var anchoredElementOffset = $('[data-edgt-anchor="' + hash + '"]').offset().top;
                    scrollAmount = $('[data-edgt-anchor="' + hash + '"]').offset().top - headerHeihtToSubtract(anchoredElementOffset);

                    setActiveState(anchor);

                    edgt.html.stop().animate({
                        scrollTop: Math.round(scrollAmount)
                    }, 1000, function () {
                        //change hash tag in url
                        if (history.pushState) {
                            history.pushState(null, null, '#' + hash);
                        }
                    });
                    return false;
                }
            });
        };

        return {
            init: function () {
                if ($('[data-edgt-anchor]').length) {
                    anchorClick();
                    checkActiveStateOnScroll();
                    $(window).load(function () {
                        checkActiveStateOnLoad();
                    });
                }
            }
        };

    };

    /*
     **	Video background initialization
     */
    function edgtInitVideoBackground() {

        $('.edgt-section .edgt-video-wrap .edgt-video').mediaelementplayer({
            enableKeyboard: false,
            iPadUseNativeControls: false,
            pauseOtherPlayers: false,
            // force iPhone's native controls
            iPhoneUseNativeControls: false,
            // force Android's native controls
            AndroidUseNativeControls: false
        });

        //mobile check
        if (navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)) {
            edgtInitVideoBackgroundSize();
            $('.edgt-section .edgt-mobile-video-image').show();
            $('.edgt-section .edgt-video-wrap').remove();
        }
    }

    /*
     **	Calculate video background size
     */
    function edgtInitVideoBackgroundSize() {

        $('.edgt-section .edgt-video-wrap').each(function () {

            var element = $(this);
            var sectionWidth = element.closest('.edgt-section').outerWidth();
            element.width(sectionWidth);

            var sectionHeight = element.closest('.edgt-section').outerHeight();
            edgt.minVideoWidth = edgt.videoRatio * (sectionHeight + 20);
            element.height(sectionHeight);

            var scaleH = sectionWidth / edgt.videoWidthOriginal;
            var scaleV = sectionHeight / edgt.videoHeightOriginal;
            var scale = scaleV;
            if (scaleH > scaleV)
                scale = scaleH;
            if (scale * edgt.videoWidthOriginal < edgt.minVideoWidth) {
                scale = edgt.minVideoWidth / edgt.videoWidthOriginal;
            }

            element.find('video, .mejs-overlay, .mejs-poster').width(Math.ceil(scale * edgt.videoWidthOriginal + 2));
            element.find('video, .mejs-overlay, .mejs-poster').height(Math.ceil(scale * edgt.videoHeightOriginal + 2));
            element.scrollLeft((element.find('video').width() - sectionWidth) / 2);
            element.find('.mejs-overlay, .mejs-poster').scrollTop((element.find('video').height() - (sectionHeight)) / 2);
            element.scrollTop((element.find('video').height() - sectionHeight) / 2);
        });

    }

    /*
     **	Set content bottom margin because of the uncovering footer
     */
    function edgtSetContentBottomMargin() {
        var uncoverFooter = $('.edgt-footer-uncover');

        if (uncoverFooter.length) {
            $('.edgt-content').css('margin-bottom', $('.edgt-footer-inner').height());
        }
    }

    /*
     ** Initiate Smooth Scroll
     */
    //function edgtSmoothScroll(){
    //
    //	if(edgt.body.hasClass('edgt-smooth-scroll')){
    //
    //		var scrollTime = 0.4;			//Scroll time
    //		var scrollDistance = 300;		//Distance. Use smaller value for shorter scroll and greater value for longer scroll
    //
    //		var mobile_ie = -1 !== navigator.userAgent.indexOf("IEMobile");
    //
    //		var smoothScrollListener = function(event){
    //			event.preventDefault();
    //
    //			var delta = event.wheelDelta / 120 || -event.detail / 3;
    //			var scrollTop = edgt.window.scrollTop();
    //			var finalScroll = scrollTop - parseInt(delta * scrollDistance);
    //
    //			TweenLite.to(edgt.window, scrollTime, {
    //				scrollTo: {
    //					y: finalScroll, autoKill: !0
    //				},
    //				ease: Power1.easeOut,
    //				autoKill: !0,
    //				overwrite: 5
    //			});
    //		};
    //
    //		if (!$('html').hasClass('touch') && !mobile_ie) {
    //			if (window.addEventListener) {
    //				window.addEventListener('mousewheel', smoothScrollListener, false);
    //				window.addEventListener('DOMMouseScroll', smoothScrollListener, false);
    //			}
    //		}
    //	}
    //}

    function edgtDisableScroll() {

        if (window.addEventListener) {
            window.addEventListener('DOMMouseScroll', edgtWheel, false);
        }
        window.onmousewheel = document.onmousewheel = edgtWheel;
        document.onkeydown = edgtKeydown;

        if (edgt.body.hasClass('edgt-smooth-scroll')) {
            window.removeEventListener('mousewheel', smoothScrollListener, false);
            window.removeEventListener('DOMMouseScroll', smoothScrollListener, false);
        }
    }

    function edgtEnableScroll() {
        if (window.removeEventListener) {
            window.removeEventListener('DOMMouseScroll', edgtWheel, false);
        }
        window.onmousewheel = document.onmousewheel = document.onkeydown = null;

        if (edgt.body.hasClass('edgt-smooth-scroll')) {
            window.addEventListener('mousewheel', smoothScrollListener, false);
            window.addEventListener('DOMMouseScroll', smoothScrollListener, false);
        }
    }

    function edgtWheel(e) {
        edgtPreventDefaultValue(e);
    }

    function edgtKeydown(e) {
        var keys = [37, 38, 39, 40];

        for (var i = keys.length; i--;) {
            if (e.keyCode === keys[i]) {
                edgtPreventDefaultValue(e);
                return;
            }
        }
    }

    function edgtPreventDefaultValue(e) {
        e = e || window.event;
        if (e.preventDefault) {
            e.preventDefault();
        }
        e.returnValue = false;
    }

    function edgtInitSelfHostedVideoPlayer() {

        var players = $('.edgt-self-hosted-video');
        players.mediaelementplayer({
            audioWidth: '100%'
        });
    }

    function edgtSelfHostedVideoSize() {

        $('.edgt-self-hosted-video-holder .edgt-video-wrap').each(function () {
            var thisVideo = $(this);

            var videoWidth = thisVideo.closest('.edgt-self-hosted-video-holder').outerWidth();
            var videoHeight = videoWidth / edgt.videoRatio;

            if (navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)) {
                thisVideo.parent().width(videoWidth);
                thisVideo.parent().height(videoHeight);
            }

            thisVideo.width(videoWidth);
            thisVideo.height(videoHeight);

            thisVideo.find('video, .mejs-overlay, .mejs-poster').width(videoWidth);
            thisVideo.find('video, .mejs-overlay, .mejs-poster').height(videoHeight);
        });
    }

    function edgtToTopButton(a) {

        var b = $("#edgt-back-to-top");
        b.removeClass('off on');
        if (a === 'on') {
            b.addClass('on');
        } else {
            b.addClass('off');
        }
    }

    function edgtBackButtonShowHide() {
        edgt.window.scroll(function () {
            var b = $(this).scrollTop();
            var c = $(this).height();
            var d;
            if (b > 0) {
                d = b + c / 2;
            } else {
                d = 1;
            }
            if (d < 1e3) {
                edgtToTopButton('off');
            } else {
                edgtToTopButton('on');
            }
        });
    }

    function edgtInitBackToTop() {
        var backToTopButton = $('#edgt-back-to-top');
        backToTopButton.on('click', function (e) {
            e.preventDefault();
            edgt.html.animate({scrollTop: 0}, edgt.window.scrollTop() / 3, 'easeInOutExpo');
        });
    }

    function edgtSmoothTransition() {
        var loader = $('body > .edgt-smooth-transition-loader.edgt-mimic-ajax');
        var removeLoader = function () {
            if (loader.find('svg').length && !edgt.body.is('[class*="edgt-ms-ie"]')) {
                $(document).on('svgDrawn', function () {
                    loader.find('svg').remove();
                    loader.slideUp(1000, 'easeInOutExpo');
                });
            } else {
                loader.fadeOut(800, 'easeInOutQuint');
            }
        };

        if (loader.length) {
            removeLoader();
            $(window).on('pageshow', function (event) {
                if (event.originalEvent.persisted) {
                    removeLoader();
                }
            });

            $('a').on('click', function (e) {
                var a = $(this);
                if (
                    e.which === 1 && // check if the left mouse button has been pressed
                    a.attr('href').indexOf(window.location.host) >= 0 && // check if the link is to the same domain
                    (typeof a.data('rel') === 'undefined') && //Not pretty photo link
                    (typeof a.attr('rel') === 'undefined') && //Not VC pretty photo link
                    (typeof a.attr('target') === 'undefined' || a.attr('target') === '_self') && // check if the link opens in the same window
                    (a.attr('href').split('#')[0] !== window.location.href.split('#')[0]) // check if it is an anchor aiming for a different page
                ) {
                    e.preventDefault();
                    loader.addClass('edgt-hide-spinner');
                    loader.fadeIn(300, 'easeInOutQuint', function () {
                        window.location = a.attr('href');
                    });
                }
            });
        }
    }

    function edgtgetScrollX() {
        return (window.pageXOffset != null) ? window.pageXOffset : (document.documentElement.scrollLeft != null) ? document.documentElement.scrollLeft : document.body.scrollLeft;
    }
    function edgtgetScrollY() {
        return (window.pageYOffset != null) ? window.pageYOffset : (document.documentElement.scrollTop != null) ? document.documentElement.scrollTop : document.body.scrollTop;
    }

    function edgtInitCustomMenuDropdown() {
        var menus = $('.edgt-sidebar .widget_nav_menu .menu');

        var dropdownOpeners,
            currentMenu;


        if (menus.length) {
            menus.each(function () {
                currentMenu = $(this);

                dropdownOpeners = currentMenu.find('li.menu-item-has-children > a');

                if (dropdownOpeners.length) {
                    dropdownOpeners.each(function () {
                        var currentDropdownOpener = $(this);

                        currentDropdownOpener.on('click', function (e) {
                            e.preventDefault();

                            var dropdownToOpen = currentDropdownOpener.parent().children('.sub-menu');

                            if (dropdownToOpen.is(':visible')) {
                                dropdownToOpen.slideUp();
                                currentDropdownOpener.removeClass('edgt-custom-menu-active');
                            } else {
                                dropdownToOpen.slideDown();
                                currentDropdownOpener.addClass('edgt-custom-menu-active');
                            }
                        });
                    });
                }
            });
        }
    }

    /**
     * Loads images that are set to be 'lazy'
     */
    function edgtLazyImages() {
        $.fn.preloader = function (action, callback) {
            if (!!action && action == 'destroy') {
                this.find('.edgt-preloader').remove();
            } else {
                var block = $('<div class="edgt-preloader"></div>');
                $('<svg xmlns="http://www.w3.org/2000/svg" version="1.1" height="75" width="75" viewbox="0 0 75 75"><circle stroke-linecap="round" cx="37.5" cy="37.5" r="33.5" stroke-width="8"/></svg>').appendTo(block);
                block.appendTo(this);
                if (typeof callback == 'function')
                    callback();
            }
            return this;
        };

        $('img[data-image][data-lazy="true"]:not(.lazyLoading)').each(function (i, object) {

            object = $(object);

            if (object.attr('data-ratio')) {
                object.height(object.width() * object.data('ratio'));

            }

            var rect = object[0].getBoundingClientRect(),
                vh = (edgt.windowHeight || document.documentElement.clientHeight),
                vw = (edgt.windowWidth || document.documentElement.clientWidth),
                oh = object.outerHeight(),
                ow = object.outerWidth();


            if (
                ( rect.top !== 0 || rect.right !== 0 || rect.bottom !== 0 || rect.left !== 0 ) &&
                ( rect.top >= 0 || rect.top + oh >= 0 ) &&
                ( rect.bottom >= 0 && rect.bottom - oh - vh <= 0 ) &&
                ( rect.left >= 0 || rect.left + ow >= 0 ) &&
                ( rect.right >= 0 && rect.right - ow - vw <= 0 )
            ) {

                var p = object.parent();
                if (!!p) {
                    p.preloader('init');
                }
                object.addClass('lazyLoading');

                var imageObj = new Image();

                $(imageObj).on('load', function () {

                    p.preloader('destroy');
                    object
                        .removeAttr('data-image')
                        .removeData('image')
                        .removeAttr('data-lazy')
                        .removeData('lazy')
                        .removeClass('lazyLoading');

                    object.attr('src', $(this).attr('src'));
                    object.height('auto');

                }).attr('src', object.data('image'));
            }
        });
    }

    /*
     * IE version
     */
    function edgtIEVersion() {
        var ua = window.navigator.userAgent;
        var version;

        var msie = ua.indexOf('MSIE ');
        if (msie > 0) {
            // IE 10 or older => return version number
            version = parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
        }

        var trident = ua.indexOf('Trident/');
        if (trident > 0) {
            // IE 11 => return version number
            var rv = ua.indexOf('rv:');
            version = parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
        }

        var edge = ua.indexOf('Edge/');
        if (edge > 0) {
            // Edge (IE 12+) => return version number
            version = parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
        }

        if ((version !== undefined) && (version !== '')) {
            edgt.body.addClass('edgt-ms-ie-' + version);
        }
    }

    function edgtSVGSpinner() {
        if ($('.edgt-smooth-transition-loader path').length) {

            if (!edgt.body.is('[class*="edgt-ms-ie"]')) {
                $('.edgt-smooth-transition-loader path').closest('.edgt-blink').one('animationiteration webkitAnimationIteration', function () {
                    $(this).removeClass('edgt-blink');
                });
                var draw = function () {
                    var path = document.querySelector('.edgt-smooth-transition-loader path');
                    var length = path.getTotalLength();
                    // Clear any previous transition
                    path.style.transition = path.style.WebkitTransition =
                        'none';
                    // Set up the starting positions
                    path.style.strokeDasharray = length + ' ' + length;
                    path.style.strokeDashoffset = length;
                    path.style.opacity = '0';
                    // Trigger a layout so styles are calculated & the browser
                    // picks up the starting position before animating
                    path.getBoundingClientRect();
                    // Define our transition
                    path.style.transition = path.style.WebkitTransition =
                        'all 4s ease-in-out';
                    // Go!
                    path.style.strokeDashoffset = '0';
                    path.style.opacity = '1';
                    setTimeout(function () {
                        $(document).trigger('svgDrawn');
                    }, 4000);
                };

                draw();

                //repeat if needed
                setInterval(function () {
                    if ($('.edgt-smooth-transition-loader svg').length) {
                        draw();
                    }
                }, 4000);
            }
        }
    }


    /*
     * Request Animation Frame shim
     */
    function edgtRequestAnimationFrame() {
        window.requestNextAnimationFrame =
            (function () {
                var originalWebkitRequestAnimationFrame,
                    wrapper,
                    callback,
                    geckoVersion = 0,
                    userAgent = navigator.userAgent,
                    index = 0,
                    self = this;

                // Workaround for Chrome 10 bug where Chrome
                // does not pass the time to the animation function

                if (window.webkitRequestAnimationFrame) {
                    // Define the wrapper

                    wrapper = function (time) {
                        if (time === undefined) {
                            time = +new Date();
                        }

                        self.callback(time);
                    };

                    // Make the switch

                    originalWebkitRequestAnimationFrame = window.webkitRequestAnimationFrame;

                    window.webkitRequestAnimationFrame = function (callback, element) {
                        self.callback = callback;

                        // Browser calls the wrapper and wrapper calls the callback

                        originalWebkitRequestAnimationFrame(wrapper, element);
                    };
                }

                // Workaround for Gecko 2.0, which has a bug in
                // mozRequestAnimationFrame() that restricts animations
                // to 30-40 fps.

                if (window.mozRequestAnimationFrame) {
                    // Check the Gecko version. Gecko is used by browsers
                    // other than Firefox. Gecko 2.0 corresponds to
                    // Firefox 4.0.

                    index = userAgent.indexOf('rv:');

                    if (userAgent.indexOf('Gecko') !== -1) {
                        geckoVersion = userAgent.substr(index + 3, 3);

                        if (geckoVersion === '2.0') {
                            // Forces the return statement to fall through
                            // to the setTimeout() function.

                            window.mozRequestAnimationFrame = undefined;
                        }
                    }
                }

                return window.requestAnimationFrame ||
                    window.webkitRequestAnimationFrame ||
                    window.mozRequestAnimationFrame ||
                    window.oRequestAnimationFrame ||
                    window.msRequestAnimationFrame ||

                    function (callback, element) {
                        var start,
                            finish;

                        window.setTimeout(function () {
                            start = +new Date();
                            callback(start);
                            finish = +new Date();

                            self.timeout = 1000 / 60 - (finish - start);

                        }, self.timeout);
                    };
            })
            ();
    }

})(jQuery);
(function ($) {
	'use strict';

	var ajax = {};

	edgt.modules.ajax = ajax;

	var animation = {};
	ajax.animation = animation;

	ajax.edgtFetchPage = edgtFetchPage;
	ajax.edgtInitAjax = edgtInitAjax;
	ajax.edgtHandleLinkClick = edgtHandleLinkClick;
	ajax.edgtInsertFetchedContent = edgtInsertFetchedContent;
	ajax.edgtInitBackBehavior = edgtInitBackBehavior;
	ajax.edgtSetActiveState = edgtSetActiveState;
	ajax.edgtReinitiateAll = edgtReinitiateAll;
	ajax.edgtHandleMeta = edgtHandleMeta;

	ajax.edgtOnDocumentReady = edgtOnDocumentReady;
	ajax.edgtOnWindowLoad = edgtOnWindowLoad;
	ajax.edgtOnWindowResize = edgtOnWindowResize;
	ajax.edgtOnWindowScroll = edgtOnWindowScroll;

	$(document).ready(edgtOnDocumentReady);
	$(window).load(edgtOnWindowLoad);
	$(window).resize(edgtOnWindowResize);
	$(window).scroll(edgtOnWindowScroll);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtOnDocumentReady() {
		edgtInitAjax();
	}

	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	function edgtOnWindowLoad() {
	}

	/*
	 All functions to be called on $(window).resize() should be in this function
	 */
	function edgtOnWindowResize() {
	}

	/*
	 All functions to be called on $(window).scroll() should be in this function
	 */
	function edgtOnWindowScroll() {
	}


	var loadedPageFlag = true; // Indicates whether the page is loaded
	var firstLoad = true; // Indicates whether this is the first loaded page, for back button functionality
	animation.type = null;
	animation.time = 500; // Duration of animation for the content to be changed
	animation.simultaneous = true; // False indicates that the new content should wait for the old content to disappear, true means that it appears at the same time as the old content disappears
	animation.loader = null;
	animation.loaderTime = 500;

	/**
	 * Fetching the targeted page
	 */
	function edgtFetchPage(params, destinationSelector, targetSelector) {

		function setDefaultParam(key, value) {
			params[key] = typeof params[key] !== 'undefined' ? params[key] : value;
		}

		destinationSelector = typeof destinationSelector !== 'undefined' ? destinationSelector : '.edgt-content';
		targetSelector = typeof targetSelector !== 'undefined' ? targetSelector : '.edgt-content';

		// setting default ajax parameters
		params = typeof params !== 'undefined' ? params : {};

		setDefaultParam('url', window.location.href);
		setDefaultParam('type', 'POST');
		setDefaultParam('success', function (response) {
			var jResponse = $(response);

			var meta = jResponse.find('.edgt-meta');
			if (meta.length) {
				edgtHandleMeta(meta);
			}

			var new_content = jResponse.find(targetSelector);
			if (!new_content.length) {
				loadedPageFlag = true;
				return false;
			}
			else {
				edgtInsertFetchedContent(params.url, new_content, destinationSelector);
			}
		});

		// setting data parameters
		setDefaultParam('ajaxReq', 'yes');
		//setDefaultParam('hasHeader', edgt.body.find('header').length ? true : false);
		//setDefaultParam('hasFooter', edgt.body.find('footer').length ? true : false);

		$.ajax({
			url: params.url,
			type: params.type,
			data: {
				ajaxReq: params.ajaxReq
				//hasHeader: params.hasHeader,
				//hasFooter: params.hasFooter
			},
			success: params.success
		});
	}

	function edgtInitAjax() {
		edgt.body.removeClass('page-not-loaded'); // Might be necessary for ajax calls
		animation.loader = $('body > .edgt-smooth-transition-loader.edgt-ajax');
		if (animation.loader.length) {
			animation.loader.fadeOut(animation.loaderTime);
			$(window).focus(function () {
				animation.loader.fadeOut(animation.loaderTime);
			});

			if (edgt.body.hasClass('woocommerce') || edgt.body.hasClass('woocommerce-page')) {
				return false;
			}
			else {
				edgtInitBackBehavior();
				$(document).on('click', 'a[target!="_blank"]:not(.no-ajax):not(.no-link)', function (click) {
					var link = $(this);

					if (click.ctrlKey === 1) { // Check if CTRL key is held with the click
						window.open(link.attr('href'), '_blank');
						return false;
					}

					if (link.parents('.edgt-ptf-load-more').length) {
						return false;
					} // Don't initiate ajax for portfolio load more link

					if (link.parents('.edgt-blog-load-more-button').length) {
						return false;
					} // Don't initiate ajax for blog load more link

					if (link.parents('edgt-post-info-comments').length) { // If it's a comment link, don't load any content, just scroll to the comments section
						var hash = link.attr('href').split("#")[1];
						$('html, body').scrollTop($("#" + hash).offset().top);
						return false;
					}

					if (window.location.href.split('#')[0] == link.attr('href').split('#')[0]) {
						return false;
					} //  If the link leads to the same page, don't use ajax

					if (link.closest('.edgt-no-animation').length === 0) { // If no parents are set to no-animation...

						if (document.location.href.indexOf("?s=") >= 0) { // Don't use ajax if currently on search page
							return true;
						}
						if (link.attr('href').indexOf("wp-admin") >= 0) { // Don't use ajax for wp-admin
							return true;
						}
						if (link.attr('href').indexOf("wp-content") >= 0) { // Don't use ajax for wp-content
							return true;
						}

						if (jQuery.inArray(link.attr('href').split('#')[0], edgtGlobalVars.vars.no_ajax_pages) !== -1) { // If the target page is a no-ajax page, don't use ajax
							document.location.href = link.attr('href');
							return false;
						}

						if ((link.attr('href') !== "http://#") && (link.attr('href') !== "#")) { // Don't use ajax if the link is empty
							//disableHashChange = true;

							var url = link.attr('href');
							var start = url.indexOf(window.location.protocol + '//' + window.location.host); // Check if the link leads to the same domain
							if (start === 0) {
								if (!loadedPageFlag) {
									return false;
								} //if page is not loaded don't load next one
								click.preventDefault();
								click.stopImmediatePropagation();
								click.stopPropagation();
								if (!link.is('.current')) {
									edgtHandleLinkClick(link);
								}
							}

						} else {
							return false;
						}
					}
				});
			}
		}
	}

	function edgtInitBackBehavior() {
		if (window.history.pushState) {
			/* the below code is to override back button to get the ajax content without reload*/
			$(window).on('popstate', function () {

				var url = location.href;
				if (!firstLoad && loadedPageFlag) {
					loadedPageFlag = false;
					edgtFetchPage({
						url: url
					});
				}
			});
		}
	}

	function edgtHandleLinkClick(link) {
		loadedPageFlag = false;
		animation.loader.fadeIn(animation.loaderTime);
		edgtFetchPage({
			url: link.attr('href')
		});
	}

	function edgtSetActiveState(url) {
		var me = $("nav a[href='" + url + "'], .widget_nav_menu a[href='" + url + "']");

		$('.edgt-main-menu a, .edgt-mobile-nav a, .edgt-mobile-nav h4, .edgt-vertical-menu a, .popup_menu a, .widget_nav_menu a').removeClass('current').parent().removeClass('edgt-active-item');
		//$('.main_menu a, .mobile_menu a, .mobile_menu h4, .vertical_menu a, .popup_menu a').parent().removeClass('active');
		$('.widget_nav_menu ul.menu > li').removeClass('current-menu-item');

		me.each(function () {
			var me = $(this);

			if (me.closest('.second').length === 0) {
				me.parent().addClass('edgt-active-item');
			} else {
				me.closest('.second').parent().addClass('edgt-active-item');
			}

			if (me.closest('.edgt-mobile-nav').length > 0) {
				me.closest('.level0').addClass('edgt-active-item');
				me.closest('.level1').addClass('edgt-active-item');
				me.closest('.level2').addClass('edgt-active-item');
			}

			if (me.closest('.widget_nav_menu').length > 0) {
				me.closest('.widget_nav_menu').find('.menu-item').addClass('current-menu-item');
			}


			//$('.edgt-main-menu a, .edgt-mobile-nav a, .edgt-vertical-menu a, .popup_menu a').removeClass('current');
			me.addClass('current');
		});
	}

	function edgtReinitiateAll() {
		$(document).off(); // Remove all event handlers before reinitialization
		$(window).off();
		edgt.body.off().find('*').off(); // Remove all event handlers before reinitialization

		edgt.edgtOnDocumentReady();
		edgt.edgtOnWindowLoad();
		edgt.edgtOnWindowResize();
		edgt.edgtOnWindowScroll();

		var modules = ['common', 'ajax', 'header', 'title', 'shortcodes', 'woocommerce', 'portfolio', 'blog', 'like'];
		for (var i = 0; i < modules.length; i++) {
			if (1 || typeof edgt.modules[modules[i]] !== 'undefined') {
				edgt.modules[modules[i]].edgtOnDocumentReady();
				edgt.modules[modules[i]].edgtOnWindowLoad();
				edgt.modules[modules[i]].edgtOnWindowResize();
				edgt.modules[modules[i]].edgtOnWindowScroll();
			}
		}
	}

	function edgtHandleMeta(meta_data) {
		// set up title, meta description and meta keywords
		var newTitle = meta_data.find(".edgt-seo-title").text();
		var pageTransition = meta_data.find(".edgt-page-transition").text();
		var newDescription = meta_data.find(".edgt-seo-description").text();
		var newKeywords = meta_data.find(".edgt-seo-keywords").text();
		if (typeof pageTransition !== 'undefined') {
			animation.type = pageTransition;
		}
		if ($('head meta[name="description"]').length) {
			$('head meta[name="description"]').attr('content', newDescription);
		} else if (typeof newDescription !== 'undefined') {
			$('<meta name="description" content="' + newDescription + '">').prependTo($('head'));
		}
		if ($('head meta[name="keywords"]').length) {
			$('head meta[name="keywords"]').attr('content', newKeywords);
		} else if (typeof newKeywords !== 'undefined') {
			$('<meta name="keywords" content="' + newKeywords + '">').prependTo($('head'));
		}
		document.title = newTitle;

		var newBodyClasses = meta_data.find(".edgt-body-classes").text();
		var myArray = newBodyClasses.split(',');
		edgt.body.removeClass();
		for (var i = 0; i < myArray.length; i++) {
			if (myArray[i] !== "edgt-page-not-loaded") {
				edgt.body.addClass(myArray[i]);
			}
		}

		if ($("#wp-admin-bar-edit").length > 0) {
			// set up edit link when wp toolbar is enabled
			var pageId = meta_data.find("#edgt-page-id").text();
			var old_link = $('#wp-admin-bar-edit a').attr("href");
			var new_link = old_link.replace(/(post=).*?(&)/, '$1' + pageId + '$2');
			$('#wp-admin-bar-edit a').attr("href", new_link);
		}
	}

	function edgtInsertFetchedContent(url, new_content, destinationSelector) {
		destinationSelector = typeof destinationSelector !== 'undefined' ? destinationSelector : '.edgt-content';
		var destination = edgt.body.find(destinationSelector);

		new_content.height(destination.height()).css({
			'position': 'absolute',
			'opacity': 0,
			'overflow': 'hidden'
		}).insertBefore(destination);

		new_content.waitForImages(function () {
			if (url.indexOf('#') !== -1) {
				$('<a class="edgt-temp-anchor edgt-anchor" href="' + url + '" style="display: none"></a>').appendTo('body');
			}
			edgtReinitiateAll();

			if (animation.type == "fade") {
				destination.stop().fadeTo(animation.time, 0, function () {
					destination.remove();
					if (window.history.pushState) {
						if (url !== window.location.href) {
							window.history.pushState({path: url}, '', url);
						}

						//does Google Analytics code exists on page?
						if (typeof _gaq !== 'undefined') {
							//add new url to Google Analytics so it can be tracked
							_gaq.push(['_trackPageview', url]);
						}
					} else {
						document.location.href = window.location.protocol + '//' + window.location.host + '#' + url.split(window.location.protocol + '//' + window.location.host)[1];
					}
					edgtSetActiveState(url);
					edgt.body.animate({scrollTop: 0}, animation.time, 'swing');
				});
				setTimeout(function () {
					new_content.css('position', 'relative').height('').stop().fadeTo(animation.time, 1, function () {
						loadedPageFlag = true;
						firstLoad = false;
						animation.loader.fadeOut(animation.loaderTime, function () {
							var anch = $('.edgt-temp-anchor');
							if (anch.length) {
								anch.trigger('click').remove();
							}
						});
					});
				}, !animation.simultaneous * animation.time);
			}
		});
	}


})(jQuery);
(function ($) {
	"use strict";

	var header = {};
	edgt.modules.header = header;

	header.isStickyVisible = false;
	header.stickyAppearAmount = 0;
	header.behaviour = '';
	header.edgtSideArea = edgtSideArea;
	header.edgtSideAreaScroll = edgtSideAreaScroll;
	header.edgtFullscreenMenu = edgtFullscreenMenu;
	header.edgtInitMobileNavigation = edgtInitMobileNavigation;
	header.edgtMobileHeaderBehavior = edgtMobileHeaderBehavior;
	header.edgtSetDropDownMenuPosition = edgtSetDropDownMenuPosition;
	header.edgtDropDownMenu = edgtDropDownMenu;
	header.edgtSearch = edgtSearch;

	header.edgtOnDocumentReady = edgtOnDocumentReady;
	header.edgtOnWindowLoad = edgtOnWindowLoad;
	header.edgtOnWindowResize = edgtOnWindowResize;
	header.edgtOnWindowScroll = edgtOnWindowScroll;

	$(document).ready(edgtOnDocumentReady);
	$(window).load(edgtOnWindowLoad);
	$(window).resize(edgtOnWindowResize);
	$(window).scroll(edgtOnWindowScroll);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtOnDocumentReady() {
		edgtHeaderBehaviour();
		edgtSideArea();
		edgtSideAreaScroll();
		edgtFullscreenMenu();
		edgtInitMobileNavigation();
		edgtMobileHeaderBehavior();
		edgtSetDropDownMenuPosition();
		edgtDropDownMenu();
		edgtSearch();
		edgtVerticalMenu().init();
	}

	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	function edgtOnWindowLoad() {
		edgtSetDropDownMenuPosition();
	}

	/*
	 All functions to be called on $(window).resize() should be in this function
	 */
	function edgtOnWindowResize() {
		edgtDropDownMenu();
	}

	/*
	 All functions to be called on $(window).scroll() should be in this function
	 */
	function edgtOnWindowScroll() {

	}


	/*
	 **	Show/Hide sticky header on window scroll
	 */
	function edgtHeaderBehaviour() {

		var header = $('.edgt-page-header');
		var stickyHeader = $('.edgt-sticky-header');
		var fixedHeaderWrapper = $('.edgt-fixed-wrapper');

		var headerMenuAreaOffset = $('.edgt-page-header').find('.edgt-fixed-wrapper').length ? $('.edgt-page-header').find('.edgt-fixed-wrapper').offset().top : null;

		var stickyAppearAmount;
        var headerAppear;


		switch (true) {
			// sticky header that will be shown when user scrolls up
			case edgt.body.hasClass('edgt-sticky-header-on-scroll-up'):
				edgt.modules.header.behaviour = 'edgt-sticky-header-on-scroll-up';
				var docYScroll1 = $(document).scrollTop();
				stickyAppearAmount = edgtGlobalVars.vars.edgtTopBarHeight + edgtGlobalVars.vars.edgtLogoAreaHeight + edgtGlobalVars.vars.edgtMenuAreaHeight + edgtGlobalVars.vars.edgtStickyHeaderHeight;

				headerAppear = function () {
					var docYScroll2 = $(document).scrollTop();

					if ((docYScroll2 > docYScroll1 && docYScroll2 > stickyAppearAmount) || (docYScroll2 < stickyAppearAmount)) {
						edgt.modules.header.isStickyVisible = false;
						stickyHeader.removeClass('header-appear').find('.edgt-main-menu .second').removeClass('edgt-drop-down-start');
					} else {
						edgt.modules.header.isStickyVisible = true;
						stickyHeader.addClass('header-appear');
					}

					docYScroll1 = $(document).scrollTop();
				};
				headerAppear();

				$(window).scroll(function () {
					headerAppear();
				});

				break;

			// sticky header that will be shown when user scrolls both up and down
			case edgt.body.hasClass('edgt-sticky-header-on-scroll-down-up'):
				var setStickyScrollAmount = function () {
					var amount;

					if (isStickyAmountFullScreen()) {
						amount = edgt.window.height();
					} else {
						if (edgtPerPageVars.vars.edgtStickyScrollAmount !== 0) {
							amount = edgtPerPageVars.vars.edgtStickyScrollAmount;
						} else {
							amount = edgtGlobalVars.vars.edgtTopBarHeight + edgtGlobalVars.vars.edgtLogoAreaHeight + edgtGlobalVars.vars.edgtMenuAreaHeight;
						}
					}

					stickyAppearAmount = amount;
				};

				var isStickyAmountFullScreen = function () {
					var fullScreenStickyAmount = edgtPerPageVars.vars.edgtStickyScrollAmountFullScreen;

					return typeof fullScreenStickyAmount !== 'undefined' && fullScreenStickyAmount === true;
				};

				edgt.modules.header.behaviour = 'edgt-sticky-header-on-scroll-down-up';
				setStickyScrollAmount();
				edgt.modules.header.stickyAppearAmount = stickyAppearAmount; //used in anchor logic

				headerAppear = function () {
					if (edgt.scroll < stickyAppearAmount) {
						edgt.modules.header.isStickyVisible = false;
						stickyHeader.removeClass('header-appear').find('.edgt-main-menu .second').removeClass('edgt-drop-down-start');
					} else {
						edgt.modules.header.isStickyVisible = true;
						stickyHeader.addClass('header-appear');
					}
				};

				headerAppear();

				$(window).scroll(function () {
					headerAppear();
				});

				break;

			// on scroll down, part of header will be sticky
			case edgt.body.hasClass('edgt-fixed-on-scroll'):
				edgt.modules.header.behaviour = 'edgt-fixed-on-scroll';
				var headerFixed = function () {
					if (edgt.scroll < headerMenuAreaOffset) {
						fixedHeaderWrapper.removeClass('fixed');
						header.css('margin-bottom', 0);
					}
					else {
						fixedHeaderWrapper.addClass('fixed');
						header.css('margin-bottom', fixedHeaderWrapper.height());
					}
				};

				headerFixed();

				$(window).scroll(function () {
					headerFixed();
				});

				break;
		}
	}

	/**
	 * Show/hide side area
	 */
	function edgtSideArea() {

		var wrapper = $('.edgt-wrapper'),
			sideMenu = $('.edgt-side-menu'),
			sideMenuButtonOpen = $('a.edgt-side-menu-button-opener'),
			cssClass,
		//Flags
			slideFromRight = false,
			slideWithContent = false,
			slideUncovered = false;

		if (edgt.body.hasClass('edgt-side-menu-slide-from-right')) {

			cssClass = 'edgt-right-side-menu-opened';
			wrapper.prepend('<div class="edgt-cover"/>');
			slideFromRight = true;

		} else if (edgt.body.hasClass('edgt-side-menu-slide-with-content')) {

			cssClass = 'edgt-side-menu-open';
			slideWithContent = true;

		} else if (edgt.body.hasClass('edgt-side-area-uncovered-from-content')) {

			cssClass = 'edgt-right-side-menu-opened';
			slideUncovered = true;

		}

		$('a.edgt-side-menu-button-opener, a.edgt-close-side-menu').on('click', function (e) {
			e.preventDefault();

			if (!sideMenuButtonOpen.hasClass('opened')) {

				sideMenuButtonOpen.addClass('opened');
				edgt.body.addClass(cssClass);

				if (slideFromRight) {
					$('.edgt-wrapper .edgt-cover').on('click', function () {
						edgt.body.removeClass('edgt-right-side-menu-opened');
						sideMenuButtonOpen.removeClass('opened');
					});
				}

				if (slideUncovered) {
					sideMenu.css({
						'visibility': 'visible'
					});
				}

				var currentScroll = $(window).scrollTop();
				$(window).scroll(function () {
					if (Math.abs(edgt.scroll - currentScroll) > 400) {
						edgt.body.removeClass(cssClass);
						sideMenuButtonOpen.removeClass('opened');
						if (slideUncovered) {
							var hideSideMenu = setTimeout(function () {
								sideMenu.css({'visibility': 'hidden'});
								clearTimeout(hideSideMenu);
							}, 400);
						}
					}
				});

			} else {

				sideMenuButtonOpen.removeClass('opened');
				edgt.body.removeClass(cssClass);
				if (slideUncovered) {
					var hideSideMenu = setTimeout(function () {
						sideMenu.css({'visibility': 'hidden'});
						clearTimeout(hideSideMenu);
					}, 400);
				}

			}

			if (slideWithContent) {

				e.stopPropagation();
				wrapper.on('click', function () {
					e.preventDefault();
					sideMenuButtonOpen.removeClass('opened');
					edgt.body.removeClass('edgt-side-menu-open');
				});

			}

		});

	}

	/*
	 **  Smooth scroll functionality for Side Area
	 */
	function edgtSideAreaScroll() {

		var sideMenu = $('.edgt-side-menu');

		if (sideMenu.length) {
			sideMenu.niceScroll({
				scrollspeed: 60,
				mousescrollstep: 40,
				cursorwidth: 0,
				cursorborder: 0,
				cursorborderradius: 0,
				cursorcolor: "transparent",
				autohidemode: false,
				horizrailenabled: false
			});
		}
	}

	/**
	 * Init Fullscreen Menu
	 */
	function edgtFullscreenMenu() {

		if ($('a.edgt-fullscreen-menu-opener').length) {

			var popupMenuOpener = $('a.edgt-fullscreen-menu-opener'),
				popupMenuHolderOuter = $(".edgt-fullscreen-menu-holder-outer"),
				cssClass,
			//Flags for type of animation
				fadeRight = false,
				fadeTop = false,
			//Widgets
				widgetAboveNav = $('.edgt-fullscreen-above-menu-widget-holder'),
				widgetBelowNav = $('.edgt-fullscreen-below-menu-widget-holder'),
			//Menu
				menuItems = $('.edgt-fullscreen-menu-holder-outer nav > ul > li > a'),
				menuItemWithChild = $('.edgt-fullscreen-menu > ul li.has_sub > a'),
				menuItemWithoutChild = $('.edgt-fullscreen-menu ul li:not(.has_sub) a');


			//set height of popup holder and initialize nicescroll
			popupMenuHolderOuter.height(edgt.windowHeight).niceScroll({
				scrollspeed: 30,
				mousescrollstep: 20,
				cursorwidth: 0,
				cursorborder: 0,
				cursorborderradius: 0,
				cursorcolor: "transparent",
				autohidemode: false,
				horizrailenabled: false
			}); //200 is top and bottom padding of holder

			//set height of popup holder on resize
			$(window).resize(function () {
				popupMenuHolderOuter.height(edgt.windowHeight);
			});

			if (edgt.body.hasClass('edgt-fade-push-text-right')) {
				cssClass = 'edgt-push-nav-right';
				fadeRight = true;
			} else if (edgt.body.hasClass('edgt-fade-push-text-top')) {
				cssClass = 'edgt-push-text-top';
				fadeTop = true;
			}

			//Appearing animation
			if (fadeRight || fadeTop) {
				if (widgetAboveNav.length) {
					widgetAboveNav.children().css({
						'-webkit-animation-delay': 0 + 'ms',
						'-moz-animation-delay': 0 + 'ms',
						'animation-delay': 0 + 'ms'
					});
				}
				menuItems.each(function (i) {
					$(this).css({
						'-webkit-animation-delay': (i + 1) * 70 + 'ms',
						'-moz-animation-delay': (i + 1) * 70 + 'ms',
						'animation-delay': (i + 1) * 70 + 'ms'
					});
				});
				if (widgetBelowNav.length) {
					widgetBelowNav.children().css({
						'-webkit-animation-delay': (menuItems.length + 1) * 70 + 'ms',
						'-moz-animation-delay': (menuItems.length + 1) * 70 + 'ms',
						'animation-delay': (menuItems.length + 1) * 70 + 'ms'
					});
				}
			}

			// Open popup menu
			popupMenuOpener.on('click', function (e) {
				e.preventDefault();

				var closeFS = function () {
					popupMenuOpener.removeClass('opened');
					edgt.body.removeClass('edgt-fullscreen-menu-opened');
					edgt.body.removeClass('edgt-fullscreen-fade-in').addClass('edgt-fullscreen-fade-out');
					edgt.body.addClass(cssClass);
					if (!edgt.body.hasClass('page-template-full_screen-php')) {
						edgt.modules.common.edgtEnableScroll();
					}
					$("nav.edgt-fullscreen-menu ul.sub_menu").slideUp(200, function () {
						$('nav.popup_menu').getNiceScroll().resize();
					});
				};

				var openFS = function () {
					popupMenuOpener.addClass('opened');
					edgt.body.addClass('edgt-fullscreen-menu-opened');
					edgt.body.removeClass('edgt-fullscreen-fade-out').addClass('edgt-fullscreen-fade-in');
					edgt.body.removeClass(cssClass);
					if (!edgt.body.hasClass('page-template-full_screen-php')) {
						edgt.modules.common.edgtDisableScroll();
					}
				};

				if (!popupMenuOpener.hasClass('opened')) {
					openFS();
					$(document).keyup(function (e) {
						if (e.keyCode === 27) {
							closeFS();
						}
					});
				} else {
					closeFS();
				}

				$(document).mouseup(function (e) {
					var container = $(".edgt-fullscreen-menu, .edgt-fullscreen-menu-opener");
					if (!container.is(e.target) && container.has(e.target).length === 0) {
						closeFS();
					}
				});
			});

			//logic for open sub menus in popup menu
			menuItemWithChild.on('tap click', function (e) {
				e.preventDefault();

				if ($(this).parent().hasClass('has_sub')) {
					var submenu = $(this).parent().find('> ul.sub_menu');
					if (submenu.is(':visible')) {
						submenu.slideUp(200, function () {
							popupMenuHolderOuter.getNiceScroll().resize();
						});
						$(this).parent().removeClass('open_sub');
					} else {

					    // close other sub menus
                        $(this).parent().parent().find('.open_sub > ul.sub_menu').slideUp(200, function () {
                            popupMenuHolderOuter.getNiceScroll().resize();
                        });
                        $(this).parent().parent().children('.open_sub').removeClass('open_sub');


                        $(this).parent().addClass('open_sub');
						submenu.slideDown(200, function () {
							popupMenuHolderOuter.getNiceScroll().resize();
						});
					}
				}
				return false;
			});

			//if link has no submenu and if it's not dead, than open that link
			menuItemWithoutChild.on('click', function (e) {

				if (($(this).attr('href') !== "http://#") && ($(this).attr('href') !== "#")) {

					if (e.which === 1) {
						popupMenuOpener.removeClass('opened');
						edgt.body.removeClass('edgt-fullscreen-menu-opened');
						edgt.body.removeClass('edgt-fullscreen-fade-in').addClass('edgt-fullscreen-fade-out');
						edgt.body.addClass(cssClass);
						$("nav.edgt-fullscreen-menu ul.sub_menu").slideUp(200, function () {
							$('nav.popup_menu').getNiceScroll().resize();
						});
						edgt.modules.common.edgtEnableScroll();
					}
				} else {
					return false;
				}

			});

		}


	}

	function edgtInitMobileNavigation() {
		var navigationOpener = $('.edgt-mobile-header .edgt-mobile-menu-opener');
		var navigationHolder = $('.edgt-mobile-header .edgt-mobile-nav');
		var dropdownOpener = $('.edgt-mobile-nav .mobile_arrow, .edgt-mobile-nav h4, .edgt-mobile-nav a[href*="#"]');
		var animationSpeed = 200;

		//whole mobile menu opening / closing
		if (navigationOpener.length && navigationHolder.length) {
			navigationOpener.on('tap click', function (e) {
				e.stopPropagation();
				e.preventDefault();

				if (navigationHolder.is(':visible')) {
					navigationHolder.slideUp(animationSpeed);
				} else {
					navigationHolder.slideDown(animationSpeed);
				}
			});
		}

		//dropdown opening / closing
		if (dropdownOpener.length) {
			dropdownOpener.each(function () {
				$(this).on('tap click', function (e) {
					var dropdownToOpen = $(this).nextAll('ul').first();

					if (dropdownToOpen.length) {
						e.preventDefault();
						e.stopPropagation();

						var openerParent = $(this).parent('li');
						if (dropdownToOpen.is(':visible')) {
							dropdownToOpen.slideUp(animationSpeed);
							openerParent.removeClass('edgt-opened');
						} else {
							dropdownToOpen.slideDown(animationSpeed);
							openerParent.addClass('edgt-opened');
						}
					}

				});
			});
		}

		$('.edgt-mobile-nav a, .edgt-mobile-logo-wrapper a').on('click tap', function (e) {
			if ($(this).attr('href') !== 'http://#' && $(this).attr('href') !== '#') {
				navigationHolder.slideUp(animationSpeed);
			}
		});
	}

	function edgtMobileHeaderBehavior() {
		if (edgt.body.hasClass('edgt-sticky-up-mobile-header')) {
			var stickyAppearAmount;
			var mobileHeader = $('.edgt-mobile-header');
			var adminBar = $('#wpadminbar');
			var mobileHeaderHeight = mobileHeader.length ? mobileHeader.height() : 0;
			var adminBarHeight = adminBar.length ? adminBar.height() : 0;

			var docYScroll1 = $(document).scrollTop();
			stickyAppearAmount = mobileHeaderHeight + adminBarHeight;

			$(window).scroll(function () {
				var docYScroll2 = $(document).scrollTop();

				if (docYScroll2 > stickyAppearAmount) {
					mobileHeader.addClass('edgt-animate-mobile-header');
				} else {
					mobileHeader.removeClass('edgt-animate-mobile-header');
				}

				if ((docYScroll2 > docYScroll1 && docYScroll2 > stickyAppearAmount) || (docYScroll2 < stickyAppearAmount)) {
					mobileHeader.removeClass('mobile-header-appear');
					mobileHeader.css('margin-bottom', 0);

					if (adminBar.length) {
						mobileHeader.find('.edgt-mobile-header-inner').css('top', 0);
					}
				} else {
					mobileHeader.addClass('mobile-header-appear');
					mobileHeader.css('margin-bottom', stickyAppearAmount);

					//if(adminBar.length) {
					//    mobileHeader.find('.edgt-mobile-header-inner').css('top', adminBarHeight);
					//}
				}

				docYScroll1 = $(document).scrollTop();
			});
		}

	}


	/**
	 * Set dropdown position
	 */
	function edgtSetDropDownMenuPosition() {

		var menuItems = $(".edgt-drop-down > ul > li.narrow");
		menuItems.each(function (i) {

			var browserWidth = edgt.windowWidth - 16; // 16 is width of scroll bar
			var menuItemPosition = $(this).offset().left;
			var dropdownMenuWidth = $(this).find('.second .inner ul').width();

			var menuItemFromLeft = 0;
			if (edgt.body.hasClass('boxed')) {
				menuItemFromLeft = edgt.boxedLayoutWidth - (menuItemPosition - (browserWidth - edgt.boxedLayoutWidth ) / 2);
			} else {
				menuItemFromLeft = browserWidth - menuItemPosition;
			}

			var dropDownMenuFromLeft; //has to stay undefined beacuse 'dropDownMenuFromLeft < dropdownMenuWidth' condition will be true

			if ($(this).find('li.sub').length > 0) {
				dropDownMenuFromLeft = menuItemFromLeft - dropdownMenuWidth;
			}

			if (menuItemFromLeft < dropdownMenuWidth || dropDownMenuFromLeft < dropdownMenuWidth) {
				$(this).find('.second').addClass('right');
				$(this).find('.second .inner ul').addClass('right');
			}
		});

	}


	function edgtDropDownMenu() {

		var menu_items = $('.edgt-drop-down > ul > li');

		menu_items.each(function (i) {
			if ($(menu_items[i]).find('.second').length > 0) {

				var dropDownSecondDiv = $(menu_items[i]).find('.second');

				if ($(menu_items[i]).hasClass('wide')) {

					var dropdown = $(this).find('.inner > ul');
					var dropdownPadding = parseInt(dropdown.css('padding-left').slice(0, -2)) + parseInt(dropdown.css('padding-right').slice(0, -2));
					var dropdownWidth = dropdown.outerWidth();

					if (!$(this).hasClass('left_position') && !$(this).hasClass('right_position')) {
						dropDownSecondDiv.css('left', 0);
					}

					//set columns to be same height - start
					var tallest = 0;
					$(this).find('.second > .inner > ul > li').each(function () {
						var thisHeight = $(this).height();
						if (thisHeight > tallest) {
							tallest = thisHeight;
						}
					});
					$(this).find('.second > .inner > ul > li').css("height", ""); // delete old inline css - via resize
					$(this).find('.second > .inner > ul > li').height(tallest);
					//set columns to be same height - end

					if (!edgt.body.hasClass('edgt-full-width-wide-menu') || edgt.body.hasClass('edgt-boxed')) {
						if (!$(this).hasClass('left_position') && !$(this).hasClass('right_position')) {
							setTimeout(function () {
								var left_position = (edgt.windowWidth - 2 * (edgt.windowWidth - dropdown.offset().left)) / 2 + (dropdownWidth + dropdownPadding) / 2;
								dropDownSecondDiv.css('left', -left_position);
							}, 300);
						}
					} else {
						if (!$(this).hasClass('left_position') && !$(this).hasClass('right_position')) {
							setTimeout(function () {
								var left_position = dropdown.offset().left;

								dropDownSecondDiv.css('left', -left_position);
								dropDownSecondDiv.css('width', edgt.windowWidth);
							}, 300);
						}
					}
				}

				if (!edgt.menuDropdownHeightSet) {
					$(menu_items[i]).data('original_height', dropDownSecondDiv.height() + 'px');
					dropDownSecondDiv.height(0);
				}

				if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
					$(menu_items[i]).on("touchstart mouseenter", function () {
						dropDownSecondDiv.css({
							'height': $(menu_items[i]).data('original_height'),
							'overflow': 'visible',
							'visibility': 'visible',
							'opacity': '1'
						});
					}).on("mouseleave", function () {
						dropDownSecondDiv.css({
							'height': '0px',
							'overflow': 'hidden',
							'visibility': 'hidden',
							'opacity': '0'
						});
					});

				} else {
					if (edgt.body.hasClass('edgt-dropdown-animate-height')) {
						$(menu_items[i]).mouseenter(function () {
							dropDownSecondDiv.css({
								'visibility': 'visible',
								'height': '0px',
								'opacity': '0'
							});
							dropDownSecondDiv.stop().animate({
								'height': $(menu_items[i]).data('original_height'),
								opacity: 1
							}, 200, function () {
								dropDownSecondDiv.css('overflow', 'visible');
							});
						}).mouseleave(function () {
							dropDownSecondDiv.stop().animate({
								'height': '0px'
							}, 0, function () {
								dropDownSecondDiv.css({
									'overflow': 'hidden',
									'visibility': 'hidden'
								});
							});
						});
					} else {
						var config = {
							interval: 0,
							over: function () {
								setTimeout(function () {
									dropDownSecondDiv.addClass('edgt-drop-down-start');
									dropDownSecondDiv.stop().css({'height': $(menu_items[i]).data('original_height')});
								}, 150);
							},
							timeout: 150,
							out: function () {
								dropDownSecondDiv.stop().css({'height': '0px'});
								dropDownSecondDiv.removeClass('edgt-drop-down-start');
							}
						};
						$(menu_items[i]).hoverIntent(config);
					}
				}
			}
		});
		$('.edgt-drop-down ul li.wide ul li a').on('click', function (e) {
			if (e.which === 1) {
				var $this = $(this);
				setTimeout(function () {
					$this.mouseleave();
				}, 500);
			}
		});

		edgt.menuDropdownHeightSet = true;
	}

	/**
	 * Init Search Types
	 */
	function edgtSearch() {

		var searchOpener = $('a.edgt-search-opener'),
			searchClose,
			searchForm,
			touch = false;

		if ($('html').hasClass('touch')) {
			touch = true;
		}

		if (searchOpener.length > 0) {
			//Check for type of search
			if (edgt.body.hasClass('edgt-fullscreen-search')) {

				edgtFullscreenSearch();

			} else if (edgt.body.hasClass('edgt-search-slides-from-window-top')) {

				searchForm = $('.edgt-search-slide-window-top');
				searchClose = $('.edgt-search-close');
				edgtSearchWindowTop();

			} else if (edgt.body.hasClass('edgt-search-covers-header')) {

				edgtSearchCoversHeader();

			}

			//Check for hover color of search
			if (typeof searchOpener.data('hover-color') !== 'undefined') {
				var changeSearchColor = function (event) {
					event.data.searchOpener.css('color', event.data.color);
				};

				var originalColor = searchOpener.css('color');
				var hoverColor = searchOpener.data('hover-color');

				searchOpener.on('mouseenter', {searchOpener: searchOpener, color: hoverColor}, changeSearchColor);
				searchOpener.on('mouseleave', {searchOpener: searchOpener, color: originalColor}, changeSearchColor);
			}

		}

		/**
		 * Search slides from window top type of search
		 */
		function edgtSearchWindowTop() {

			searchOpener.on('click', function (e) {
				e.preventDefault();

				var yPos = 0;
				if ($('.title').hasClass('has_parallax_background')) {
					yPos = parseInt($('.title.has_parallax_background').css('backgroundPosition').split(" ")[1]);
				}

				if (searchForm.height() === 0) {
					$('.edgt-search-slide-window-top input[type="text"]').focus();
					//Push header bottom
					edgt.body.addClass('edgt-search-open');
					$('.title.has_parallax_background').animate({
						'background-position-y': (yPos + 50) + 'px'
					}, 150);
				} else {
					edgt.body.removeClass('edgt-search-open');
					$('.title.has_parallax_background').animate({
						'background-position-y': (yPos - 50) + 'px'
					}, 150);
				}

				$(window).scroll(function () {
					if (searchForm.height() !== 0 && edgt.scroll > 50) {
						edgt.body.removeClass('edgt-search-open');
						$('.title.has_parallax_background').css('backgroundPosition', 'center ' + (yPos) + 'px');
					}
				});

				searchClose.on('click', function (e) {
					e.preventDefault();
					edgt.body.removeClass('edgt-search-open');
					$('.title.has_parallax_background').animate({
						'background-position-y': (yPos) + 'px'
					}, 150);
				});

			});
		}

		/**
		 * Search covers header type of search
		 */
		function edgtSearchCoversHeader() {

			searchOpener.on('click', function (e) {
				e.preventDefault();
				var searchFormHeight,
					searchFormHolder = $('.edgt-search-cover .edgt-form-holder-outer'),
					searchForm,
					searchFormLandmark; // there is one more div element if header is in grid

				if ($(this).closest('.edgt-grid').length) {
					searchForm = $(this).closest('.edgt-grid').children().first();
					searchFormLandmark = searchForm.parent();
				}
				else {
					searchForm = $(this).closest('.edgt-menu-area').children().first();
					searchFormLandmark = searchForm;
				}

				if ($(this).closest('.edgt-sticky-header').length > 0) {
					searchForm = $(this).closest('.edgt-sticky-header').children().first();
				}
				if ($(this).closest('.edgt-mobile-header').length > 0) {
					searchForm = $(this).closest('.edgt-mobile-header').children().children().first();
				}

				//Find search form position in header and height
				if (searchFormLandmark.parent().hasClass('edgt-logo-area')) {
					searchFormHeight = edgtGlobalVars.vars.edgtLogoAreaHeight;
				} else if (searchFormLandmark.parent().hasClass('edgt-top-bar')) {
					searchFormHeight = edgtGlobalVars.vars.edgtTopBarHeight;
				} else if (searchFormLandmark.parent().hasClass('edgt-menu-area')) {
					searchFormHeight = edgtGlobalVars.vars.edgtMenuAreaHeight;
				} else if (searchFormLandmark.hasClass('edgt-sticky-header')) {
					searchFormHeight = edgtGlobalVars.vars.edgtMenuAreaHeight;
				} else if (searchFormLandmark.parent().hasClass('edgt-mobile-header')) {
					searchFormHeight = $('.edgt-mobile-header-inner').height();
				}

				searchFormHolder.height(searchFormHeight);
				searchForm.stop(true).fadeIn(600);
				$('.edgt-search-cover input[type="text"]').focus();
				$('.edgt-search-close, .content, footer').on('click', function (e) {
					e.preventDefault();
					searchForm.stop(true).fadeOut(450);
				});
				searchForm.blur(function () {
					searchForm.stop(true).fadeOut(450);
				});
			});

		}

		/**
		 * Fullscreen search (two types: fade and from circle)
		 */
		function edgtFullscreenSearch(fade, fromCircle) {

			var searchHolder = $('.edgt-fullscreen-search-holder'),
				searchOverlay = $('.edgt-fullscreen-search-overlay'),
				fieldHolder = searchHolder.find('.edgt-field-holder');

			searchOpener.on('click', function (e) {
				e.preventDefault();

				//Fullscreen search fade
				if (searchHolder.hasClass('edgt-animate')) {
					searchClose();
				} else {
					searchOpen();
				}

				//Close on click away
				$(document).mouseup(function (e) {
					if (!fieldHolder.is(e.target) && fieldHolder.has(e.target).length === 0) {
						e.preventDefault();
						searchClose();
					}
				});
				//Close on escape
				$(document).keyup(function (e) {
					if (e.keyCode === 27) { //KeyCode for ESC button is 27
						searchClose();
					}
				});

				function searchClose() {
					edgt.body.removeClass('edgt-fullscreen-search-opened');
					searchHolder.removeClass('edgt-animate');
					edgt.body.removeClass('edgt-search-fade-in');
					edgt.body.addClass('edgt-search-fade-out');
					if (!edgt.body.hasClass('page-template-full_screen-php')) {
						edgt.modules.common.edgtEnableScroll();
					}
					fieldHolder.find('.edgt-search-field').blur().val('');
				}

				function searchOpen() {
					edgt.body.addClass('edgt-fullscreen-search-opened');
					edgt.body.removeClass('edgt-search-fade-out');
					edgt.body.addClass('edgt-search-fade-in');
					searchHolder.addClass('edgt-animate');
					if (!edgt.body.hasClass('page-template-full_screen-php')) {
						edgt.modules.common.edgtDisableScroll();
					}
					setTimeout(function () {
						fieldHolder.find('.edgt-search-field').focus();
					}, 400);
				}

			});

			//Text input focus change
			$('.edgt-fullscreen-search-holder .edgt-search-field').focus(function () {
				$('.edgt-fullscreen-search-holder .edgt-field-holder .edgt-line').css("width", "100%");
			});

			$('.edgt-fullscreen-search-holder .edgt-search-field').blur(function () {
				$('.edgt-fullscreen-search-holder .edgt-field-holder .edgt-line').css("width", "0");
			});

		}

	}

	/**
	 * Function object that represents vertical menu area.
	 * @returns {{init: Function}}
	 */
	var edgtVerticalMenu = function () {
		/**
		 * Main vertical area object that used through out function
		 * @type {jQuery object}
		 */
		var verticalMenuObject = $('.edgt-vertical-menu-area');

		/**
		 * Resizes vertical area. Called whenever height of navigation area changes
		 * It first check if vertical area is scrollable, and if it is resizes scrollable area
		 */
		var resizeVerticalArea = function () {

		};

		/**
		 * Checks if vertical area is scrollable (if it has edgt-with-scroll class)
		 *
		 * @returns {bool}
		 */
		var verticalAreaScrollable = function () {
			return verticalMenuObject.hasClass('edgt-with-scroll');
		};

		/**
		 * Initialzes navigation functionality. It checks navigation type data attribute and calls proper functions
		 */
		var initNavigation = function () {
			var verticalNavObject = verticalMenuObject.find('.edgt-vertical-menu');
			var navigationType = typeof verticalNavObject.data('navigation-type') !== 'undefined' ? verticalNavObject.data('navigation-type') : '';

			switch (navigationType) {
				//case 'dropdown-toggle':
				//    dropdownHoverToggle();
				//    break;
				//case 'dropdown-toggle-click':
				//    dropdownClickToggle();
				//    break;
				//case 'float':
				//    dropdownFloat();
				//    break;
				//case 'slide-in':
				//    dropdownSlideIn();
				//    break;
				default:
					dropdownFloat();
					break;
			}

			/**
			 * Initializes floating navigation type (it comes from the side as a dropdown)
			 */
			function dropdownFloat() {
				var menuItems = verticalNavObject.find('ul li.menu-item-has-children');
				var allDropdowns = menuItems.find(' > .second, > ul');

				menuItems.each(function () {
					var elementToExpand = $(this).find(' > .second, > ul');
					var menuItem = this;

					if (Modernizr.touch) {
						var dropdownOpener = $(this).find('> a');

						dropdownOpener.on('click tap', function (e) {
							e.preventDefault();
							e.stopPropagation();

							if (elementToExpand.hasClass('edgt-float-open')) {
								elementToExpand.removeClass('edgt-float-open');
								$(menuItem).removeClass('open');
							} else {
								if (!$(this).parents('li').hasClass('open')) {
									menuItems.removeClass('open');
									allDropdowns.removeClass('edgt-float-open');
								}

								elementToExpand.addClass('edgt-float-open');
								$(menuItem).addClass('open');
							}
						});
					} else {
						//must use hoverIntent because basic hover effect doesn't catch dropdown
						//it doesn't start from menu item's edge
						$(this).hoverIntent({
							over: function () {
								elementToExpand.addClass('edgt-float-open');
								$(menuItem).addClass('open');
							},
							out: function () {
								elementToExpand.removeClass('edgt-float-open');
								$(menuItem).removeClass('open');
							},
							timeout: 100
						});
					}
				});
			}

		};


		/**
		 * Initializes scrolling in vertical area. It checks if vertical area is scrollable before doing so
		 */
		var initVerticalAreaScroll = function () {
			if (verticalAreaScrollable()) {

				var verticalAreaScroll = function (event) {
					var delta = 0;
					if (!event) event = window.event;
					if (event.wheelDelta) {
						delta = event.wheelDelta / 120;
					} else if (event.detail) {
						delta = -event.detail / 3;
					}
					if (delta)
						handle(delta);
					if (event.preventDefault)
						event.preventDefault();
					event.returnValue = false;
				};

				var handle = function (delta) {
					if (delta < 0) {
						if (Math.abs(margin) <= maxMargin) {
							margin += delta * 20;
							$(verticalMenuObjectInner).css('margin-top', margin);
						}
					}
					else {
						if (margin <= -20) {
							margin += delta * 20;
							$(verticalMenuObjectInner).css('margin-top', margin);
						}
					}
				};

				var browserHeight = edgt.windowHeight;
				var verticalMenuObjectInner = verticalMenuObject.find('.edgt-vertical-menu-area-inner');
				var verticalMenuHeight = verticalMenuObjectInner.outerHeight() + parseInt(verticalMenuObjectInner.css('padding-top')) + parseInt(verticalMenuObjectInner.css('padding-bottom'));
				var margin = 0;
				var maxMargin = verticalMenuHeight - browserHeight;

				$(verticalMenuObject).on('mouseenter', function () {
					edgt.modules.common.edgtDisableScroll();
					if (window.addEventListener) {
						window.addEventListener('mousewheel', verticalAreaScroll, false);
						window.addEventListener('DOMMouseScroll', verticalAreaScroll, false);
					}
					window.onmousewheel = document.onmousewheel = verticalAreaScroll;
				});
				$(verticalMenuObject).on('mouseleave', function () {
					edgt.modules.common.edgtEnableScroll();
					window.removeEventListener('mousewheel', verticalAreaScroll, false);
					window.removeEventListener('DOMMouseScroll', verticalAreaScroll, false);
				});
			}
		};

		return {
			/**
			 * Calls all necessary functionality for vertical menu area if vertical area object is valid
			 */
			init: function () {
				if (verticalMenuObject.length) {
					initNavigation();
					initVerticalAreaScroll();
				}
			}
		};
	};

})(jQuery);
(function($) {
    "use strict";

    var title = {};
    edgt.modules.title = title;

    title.edgtParallaxTitle = edgtParallaxTitle;

    title.edgtOnDocumentReady = edgtOnDocumentReady;
    title.edgtOnWindowLoad = edgtOnWindowLoad;
    title.edgtOnWindowResize = edgtOnWindowResize;
    title.edgtOnWindowScroll = edgtOnWindowScroll;

    $(document).ready(edgtOnDocumentReady);
    $(window).load(edgtOnWindowLoad);
    $(window).resize(edgtOnWindowResize);
    $(window).scroll(edgtOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtOnDocumentReady() {
        edgtParallaxTitle();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function edgtOnWindowLoad() {

    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function edgtOnWindowResize() {

    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function edgtOnWindowScroll() {

    }
    

    /*
     **	Title image with parallax effect
     */
    function edgtParallaxTitle(){
        if($('.edgt-title.edgt-has-parallax-background').length > 0 && $('.touch').length === 0){

            var parallaxBackground = $('.edgt-title.edgt-has-parallax-background');
            var parallaxBackgroundWithZoomOut = $('.edgt-title.edgt-has-parallax-background.edgt-zoom-out');

            var backgroundSizeWidth = parallaxBackground.data('background-width') !== undefined ? parseInt(parallaxBackground.data('background-width').match(/\d+/)) : 0;
            var titleHolderHeight = parallaxBackground.data('height');

            if(!titleHolderHeight) {
                titleHolderHeight = parallaxBackground.height();
            }

            var titleRate = (titleHolderHeight / 10000) * 7;
            var titleYPos = -(edgt.scroll * titleRate);

            //set position of background on doc ready
            parallaxBackground.css({'background-position': 'center '+ (titleYPos+edgtGlobalVars.vars.edgtAddForAdminBar) +'px' });
            parallaxBackgroundWithZoomOut.css({'background-size': backgroundSizeWidth-edgt.scroll + 'px auto'});

            //set position of background on window scroll
            $(window).scroll(function() {
                titleYPos = -(edgt.scroll * titleRate);
                parallaxBackground.css({'background-position': 'center ' + (titleYPos+edgtGlobalVars.vars.edgtAddForAdminBar) + 'px' });
                parallaxBackgroundWithZoomOut.css({'background-size': backgroundSizeWidth-edgt.scroll + 'px auto'});
            });

        }
    }

})(jQuery);

(function ($) {
    'use strict';

    var shortcodes = {};

    edgt.modules.shortcodes = shortcodes;

    shortcodes.edgtInitCounter = edgtInitCounter;
    shortcodes.edgtInitProgressBars = edgtInitProgressBars;
    shortcodes.edgtInitCountdown = edgtInitCountdown;
    shortcodes.edgtInitMessages = edgtInitMessages;
    shortcodes.edgtInitMessageHeight = edgtInitMessageHeight;
    shortcodes.edgtInitTestimonials = edgtInitTestimonials;
    shortcodes.edgtInitCarousels = edgtInitCarousels;
    shortcodes.edgtInitPieChart = edgtInitPieChart;
    shortcodes.edgtInitPieChartDoughnut = edgtInitPieChartDoughnut;
    shortcodes.edgtInitTabs = edgtInitTabs;
    shortcodes.edgtInitTabIcons = edgtInitTabIcons;
    shortcodes.edgtInitBlogListMasonry = edgtInitBlogListMasonry;
    shortcodes.edgtCustomFontResize = edgtCustomFontResize;
    shortcodes.edgtInitImageGallery = edgtInitImageGallery;
    shortcodes.edgtInitAccordions = edgtInitAccordions;
    shortcodes.edgtShowGoogleMap = edgtShowGoogleMap;
    shortcodes.edgtInitPortfolioListMasonry = edgtInitPortfolioListMasonry;
    shortcodes.edgtInitProductListMasonry = edgtInitProductListMasonry;
    shortcodes.edgtInitProductListLookbookMasonry = edgtInitProductListLookbookMasonry;
    shortcodes.edgtInitPortfolioListPinterest = edgtInitPortfolioListPinterest;
    shortcodes.edgtInitPortfolio = edgtInitPortfolio;
    shortcodes.edgtInitPortfolioMasonryFilter = edgtInitPortfolioMasonryFilter;
    shortcodes.edgtInitPortfolioLoadMore = edgtInitPortfolioLoadMore;
    shortcodes.edgtInitMatchLoadMore = edgtInitMatchLoadMore;
    shortcodes.edgtPortfolioAppearEffect = edgtPortfolioAppearEffect;
    shortcodes.edgtCheckSliderForHeaderStyle = edgtCheckSliderForHeaderStyle;
    shortcodes.edgtProcess = edgtProcess;
    shortcodes.edgtTwitterSlider = edgtTwitterSlider;
    shortcodes.edgtComparisonPricingTables = edgtComparisonPricingTables;
    shortcodes.edgtBlogSlider = edgtBlogSlider;
    shortcodes.edgtResizeBlogSlider = edgtResizeBlogSlider;
    shortcodes.edgtTeamSlider = edgtTeamSlider;
    shortcodes.edgtCardSlider = edgtCardSlider;
    shortcodes.edgtOnDocumentReady = edgtOnDocumentReady;
    shortcodes.edgtOnWindowLoad = edgtOnWindowLoad;
    shortcodes.edgtOnWindowResize = edgtOnWindowResize;
    shortcodes.edgtOnWindowScroll = edgtOnWindowScroll;
    shortcodes.emptySpaceResponsive = emptySpaceResponsive;
    shortcodes.edgtInitVerticalSplitSlider = edgtInitVerticalSplitSlider;
    shortcodes.edgtTiltHoverEffect = edgtTiltHoverEffect;
    shortcodes.edgtParentChildFilter = edgtParentChildFilter;
    shortcodes.edgtInitBackgroundSlider = edgtInitBackgroundSlider;
    shortcodes.edgtInitItemShowcase = edgtInitItemShowcase;
    shortcodes.edgtInitUnorderedList = edgtInitUnorderedList;
    shortcodes.edgtInitIWTShortcode = edgtInitIWTShortcode;

    $(document).ready(edgtOnDocumentReady);
    $(window).load(edgtOnWindowLoad);
    $(window).resize(edgtOnWindowResize);
    $(window).scroll(edgtOnWindowScroll);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtOnDocumentReady() {
        edgtInitItemShowcase();
        edgtInitCounter();
        edgtInitProgressBars();
        edgtInitCountdown();
        edgtInitBackgroundSlider();
        edgtIcon().init();
        edgtInitMessages();
        edgtInitMessageHeight();
        edgtInitPieChart();
        edgtInitPieChartDoughnut();
        edgtInitTabs();
        edgtInitTabIcons();
        edgtButton().init();
        edgtPricingTableWithIcon().init();
        edgtInitBlogListMasonry();
        edgtInitProductListMasonry();
        edgtInitProductListLookbookMasonry();
        edgtCustomFontResize();
        edgtInitImageGallery();
        edgtTwitterSlider();
        edgtBlogSlider();
        edgtResizeBlogSlider();
        edgtTeamSlider();
        edgtCardSlider();
        edgtInitAccordions();
        edgtShowGoogleMap();
        edgtInitPortfolioListMasonry();
        edgtInitPortfolioListPinterest();
        edgtInitPortfolio();
        edgtInitPortfolioMasonryFilter();
        edgtInitPortfolioLoadMore();
        edgtInitMatchLoadMore();
        edgtSlider().init();
        edgtSocialIconWidget().init();
        edgtProcess().init();
        edgtComparisonPricingTables().init();
        emptySpaceResponsive().init();
        edgtInitVerticalSplitSlider();
        edgtInitTestimonials();
        edgtInitCarousels();
        edgtInitMiniTextSlider();
        edgtTiltHoverEffect();
        edgtParentChildFilter();
        edgtInitUnorderedList();
        edgtInitIWTShortcode();
    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function edgtOnWindowLoad() {
        edgtPortfolioAppearEffect();
        edgtInitElementsHolderResponsiveStyle();
        edgt.modules.common.edgtInitParallax();
    }

    /*
     All functions to be called on $(window).resize() should be in this function
     */
    function edgtOnWindowResize() {
        edgtCustomFontResize();
        edgtInitPortfolioListPinterest();
        edgt.modules.common.edgtInitParallax();
    }

    /*
     All functions to be called on $(window).scroll() should be in this function
     */
    function edgtOnWindowScroll() {

    }

    /**
     * Init item showcase shortcode
     */
    function edgtInitItemShowcase() {
        var itemShowcase = $('.edgt-item-showcase-holder');

        if (itemShowcase.length) {
            itemShowcase.each(function () {
                var thisItemShowcase = $(this),
                    leftItems = thisItemShowcase.find('.edgt-is-left'),
                    rightItems = thisItemShowcase.find('.edgt-is-right'),
                    itemImage = thisItemShowcase.find('.edgt-is-image');

                //logic
                leftItems.wrapAll("<div class='edgt-is-item-holder edgt-is-left-holder' />");
                rightItems.wrapAll("<div class='edgt-is-item-holder edgt-is-right-holder' />");
                thisItemShowcase.animate({opacity: 1}, 200);

                var leftHolder = thisItemShowcase.find('.edgt-is-left-holder');
                var rightHolder = thisItemShowcase.find('.edgt-is-right-holder');

                leftHolder.css({
                    'background-color': thisItemShowcase.data('left-holder-background'),
                    'padding': thisItemShowcase.data('holder-padding')
                });
                rightHolder.css({
                    'background-color': thisItemShowcase.data('right-holder-background'),
                    'padding': thisItemShowcase.data('holder-padding')
                });
                setTimeout(function () {
                    thisItemShowcase.appear(function () {
                        itemImage.addClass('edgt-appeared');
                        if (edgt.windowWidth > 1200) {
                            itemAppear('.edgt-is-left-holder .edgt-is-item');
                            itemAppear('.edgt-is-right-holder .edgt-is-item');
                        } else {
                            itemAppear('.edgt-is-item');
                        }
                    }, {accX: 0, accY: edgtGlobalVars.vars.edgtElementAppearAmount});
                }, 100);

                //appear animation trigger
                function itemAppear(itemCSSClass) {
                    thisItemShowcase.find(itemCSSClass).each(function (i) {
                        var thisListItem = $(this);
                        setTimeout(function () {
                            thisListItem.addClass('edgt-appeared');
                        }, i * 150);
                    });
                }
            });
        }
    }


    /**
     * Counter Shortcode
     */
    function edgtInitCounter() {

        var counters = $('.edgt-counter');


        if (counters.length) {
            counters.each(function () {
                var counter = $(this);
                counter.appear(function () {
                    counter.parent().css({'opacity': 1});

                    //Counter zero type
                    if (counter.hasClass('zero')) {
                        var max = parseFloat(counter.text());
                        counter.countTo({
                            from: 0,
                            to: max,
                            speed: 1500,
                            refreshInterval: 100
                        });
                    } else {
                        counter.absoluteCounter({
                            speed: 2000,
                            fadeInDelay: 1000
                        });
                    }

                }, {accX: 0, accY: edgtGlobalVars.vars.edgtElementAppearAmount});
            });
        }

    }

    /*
     **	Horizontal progress bars shortcode
     */
    function edgtInitProgressBars() {

        var progressBar = $('.edgt-progress-bar');

        if (progressBar.length) {

            progressBar.each(function () {

                var thisBar = $(this);

                thisBar.appear(function () {
                    edgtInitToCounterProgressBar(thisBar);
                    if (thisBar.find('.edgt-floating.edgt-floating-inside') !== 0) {
                        var floatingInsideMargin = thisBar.find('.edgt-progress-content').height();
                        floatingInsideMargin += parseFloat(thisBar.find('.edgt-progress-title-holder').css('padding-bottom'));
                        floatingInsideMargin += parseFloat(thisBar.find('.edgt-progress-title-holder').css('margin-bottom'));
                        thisBar.find('.edgt-floating-inside').css('margin-bottom', -(floatingInsideMargin) + 'px');
                    }
                    var percentage = thisBar.find('.edgt-progress-content').data('percentage'),
                        progressContent = thisBar.find('.edgt-progress-content'),
                        progressNumber = thisBar.find('.edgt-progress-number');

                    progressContent.css('width', '0%');
                    progressContent.animate({'width': percentage + '%'}, 1500);
                    progressNumber.css('left', '0%');
                    progressNumber.animate({'left': percentage + '%'}, 1500);

                });
            });
        }
    }

    /*
     **	Counter for horizontal progress bars percent from zero to defined percent
     */
    function edgtInitToCounterProgressBar(progressBar) {
        var percentage = parseFloat(progressBar.find('.edgt-progress-content').data('percentage'));
        var percent = progressBar.find('.edgt-progress-number .edgt-percent');
        if (percent.length) {
            percent.each(function () {
                var thisPercent = $(this);
                thisPercent.parents('.edgt-progress-number-wrapper').css('opacity', '1');
                thisPercent.countTo({
                    from: 0,
                    to: percentage,
                    speed: 1500,
                    refreshInterval: 50
                });
            });
        }
    }

    /*
     **	Function to close message shortcode
     */
    function edgtInitMessages() {
        var message = $('.edgt-message');
        if (message.length) {
            message.each(function () {
                var thisMessage = $(this);
                thisMessage.find('.edgt-close').on('click', function (e) {
                    e.preventDefault();
                    $(this).parent().parent().fadeOut(500);
                });
            });
        }
    }

    /*
     **	Init message height
     */
    function edgtInitMessageHeight() {
        var message = $('.edgt-message.edgt-with-icon');
        if (message.length) {
            message.each(function () {
                var thisMessage = $(this);
                var textHolderHeight = thisMessage.find('.edgt-message-text-holder').height();
                var iconHolderHeight = thisMessage.find('.edgt-message-icon-holder').height();

                if (textHolderHeight > iconHolderHeight) {
                    thisMessage.find('.edgt-message-icon-holder').height(textHolderHeight);
                } else {
                    thisMessage.find('.edgt-message-text-holder').height(iconHolderHeight);
                }
            });
        }
    }

    /**
     * Countdown Shortcode
     */
    function edgtInitCountdown() {

        var countdowns = $('.edgt-countdown'),
            year,
            month,
            day,
            hour,
            minute,
            timezone,
            monthLabel,
            dayLabel,
            hourLabel,
            minuteLabel,
            secondLabel;

        if (countdowns.length) {

            countdowns.each(function () {

                //Find countdown elements by id-s
                var countdownId = $(this).attr('id'),
                    countdown = $('#' + countdownId),
                    digitFontSize,
                    digitColor,
                    labelFontSize,
                    labelColor;

                //Get data for countdown
                year = countdown.data('year');
                month = countdown.data('month');
                day = countdown.data('day');
                hour = countdown.data('hour');
                minute = countdown.data('minute');
                timezone = countdown.data('timezone');
                monthLabel = countdown.data('month-label');
                dayLabel = countdown.data('day-label');
                hourLabel = countdown.data('hour-label');
                minuteLabel = countdown.data('minute-label');
                secondLabel = countdown.data('second-label');
                digitFontSize = countdown.data('digit-size');
                digitColor = countdown.data('digit-color');
                labelFontSize = countdown.data('label-size');
                labelColor = countdown.data('label-color');

                var padZeros = countdown.hasClass('type-two');

                //Initialize countdown
                countdown.countdown({
                    until: new Date(year, month - 1, day, hour, minute, 44),
                    labels: ['Years', monthLabel, 'Weeks', dayLabel, hourLabel, minuteLabel, secondLabel],
                    format: 'yodHMS',
                    timezone: timezone,
                    padZeroes: !padZeros,
                    onTick: setCountdownStyle
                });

                function setCountdownStyle() {
                    countdown.find('.countdown-amount').css({
                        'font-size': digitFontSize + 'px',
                        'line-height': digitFontSize + 'px',
                        'color': digitColor
                    });
                    countdown.find('.countdown-period').css({
                        'font-size': labelFontSize + 'px',
                        'color': labelColor
                    });
                }

            });

        }

    }

    /**
     * Object that represents icon shortcode
     * @returns {{init: Function}} function that initializes icon's functionality
     */
    var edgtIcon = edgt.modules.shortcodes.edgtIcon = function () {
        //get all icons on page
        var icons = $('.edgt-icon-shortcode');

        /**
         * Function that triggers icon animation and icon animation delay
         */
        var iconAnimation = function (icon) {
            if (icon.hasClass('edgt-icon-animation')) {
                icon.appear(function () {
                    icon.parent('.edgt-icon-animation-holder').addClass('edgt-icon-animation-show');
                }, {accX: 0, accY: edgtGlobalVars.vars.edgtElementAppearAmount});
            }
        };

        /**
         * Function that triggers icon hover color functionality
         */
        var iconHoverColor = function (icon) {
            if (typeof icon.data('hover-color') !== 'undefined') {
                var changeIconColor = function (event) {
                    event.data.icon.css('color', event.data.color);
                };

                var iconElement = icon.find('.edgt-icon-element');
                var hoverColor = icon.data('hover-color');
                var originalColor = iconElement.css('color');

                if (hoverColor !== '') {
                    icon.on('mouseenter', {icon: iconElement, color: hoverColor}, changeIconColor);
                    icon.on('mouseleave', {icon: iconElement, color: originalColor}, changeIconColor);
                }
            }
        };

        /**
         * Function that triggers icon holder background color hover functionality
         */
        var iconHolderBackgroundHover = function (icon) {
            if (typeof icon.data('hover-background-color') !== 'undefined') {
                var changeIconBgColor = function (event) {
                    event.data.icon.css('background-color', event.data.color);
                };

                var hoverBackgroundColor = icon.data('hover-background-color');
                var originalBackgroundColor = icon.css('background-color');

                if (hoverBackgroundColor !== '') {
                    icon.on('mouseenter', {icon: icon, color: hoverBackgroundColor}, changeIconBgColor);
                    icon.on('mouseleave', {icon: icon, color: originalBackgroundColor}, changeIconBgColor);
                }
            }
        };

        /**
         * Function that initializes icon holder border hover functionality
         */
        var iconHolderBorderHover = function (icon) {
            if (typeof icon.data('hover-border-color') !== 'undefined') {
                var changeIconBorder = function (event) {
                    event.data.icon.css('border-color', event.data.color);
                };

                var hoverBorderColor = icon.data('hover-border-color');
                var originalBorderColor = icon.css('border-color');

                if (hoverBorderColor !== '') {
                    icon.on('mouseenter', {icon: icon, color: hoverBorderColor}, changeIconBorder);
                    icon.on('mouseleave', {icon: icon, color: originalBorderColor}, changeIconBorder);
                }
            }
        };

        return {
            init: function () {
                if (icons.length) {
                    icons.each(function () {
                        iconAnimation($(this));
                        iconHoverColor($(this));
                        iconHolderBackgroundHover($(this));
                        iconHolderBorderHover($(this));
                    });

                }
            }
        };
    };

    /**
     * Object that represents social icon widget
     * @returns {{init: Function}} function that initializes icon's functionality
     */
    var edgtSocialIconWidget = edgt.modules.shortcodes.edgtSocialIconWidget = function () {
        //get all social icons on page
        var icons = $('.edgt-social-icon-widget-holder');

        /**
         * Function that triggers icon hover color functionality
         */
        var socialIconHoverColor = function (icon) {
            if (typeof icon.data('hover-color') !== 'undefined') {
                var changeIconColor = function (event) {
                    event.data.icon.css('color', event.data.color);
                };

                var iconElement = icon;
                var hoverColor = icon.data('hover-color');
                var originalColor = iconElement.css('color');

                if (hoverColor !== '') {
                    icon.on('mouseenter', {icon: iconElement, color: hoverColor}, changeIconColor);
                    icon.on('mouseleave', {icon: iconElement, color: originalColor}, changeIconColor);
                }
            }
        };

        return {
            init: function () {
                if (icons.length) {
                    icons.each(function () {
                        socialIconHoverColor($(this));
                    });

                }
            }
        };
    };

    /**
     * Init testimonials shortcode
     */
    function edgtInitTestimonials() {

        var testimonial_sliders = $('.edgt-testimonials');
        if (testimonial_sliders.length) {
            testimonial_sliders.each(function () {

                var thisTestimonial = $(this);

                thisTestimonial.appear(function () {
                    thisTestimonial.css('visibility', 'visible');
                }, {accX: 0, accY: edgtGlobalVars.vars.edgtElementAppearAmount});

                var fadeSlides = function () {
                    var slides = thisTestimonial.find('.slick-slide');

                    slides.removeClass('edgt-fade-in edgt-fade-out');

                    slides.each(function () {
                        var currentSlide = $(this),
                            sliderWindowOffsetLeft = thisTestimonial.find('.slick-list').offset().left,
                            sliderWindowWidth = thisTestimonial.find('.slick-list').outerWidth(),
                            currentSlideOffsetLeft = currentSlide.offset().left,
                            currentSlideWidth = currentSlide.outerWidth();


                        if (currentSlideOffsetLeft >= sliderWindowOffsetLeft && currentSlideOffsetLeft + currentSlideWidth <= sliderWindowOffsetLeft + sliderWindowWidth) {
                            currentSlide.addClass('edgt-fade-out');
                        }

                        if (currentSlideOffsetLeft < sliderWindowOffsetLeft && currentSlideOffsetLeft + currentSlideWidth > 0) {
                            currentSlide.addClass('edgt-fade-in');
                        }

                        if (currentSlideOffsetLeft > sliderWindowOffsetLeft && currentSlideOffsetLeft < edgt.windowWidth) {
                            currentSlide.addClass('edgt-fade-in');
                        }
                    });
                };

                thisTestimonial.on('beforeChange', function () {
                    fadeSlides();
                });


                thisTestimonial.on('init', function () {
                    // change default opacity on init
                    thisTestimonial.css({'opacity': '1'});
                    thisTestimonial.find('.slick-active').addClass('edgt-fade-in');

                }).slick({
                    infinite: true,
                    autoplay: true,
                    autoplaySpeed: 3000,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    fade: false,
                    cssEase: 'cubic-bezier(.38,.76,0,.87)',
                    arrows: true,
                    dots: false,
                    speed: 800
                });
            });

        }

    }

    /**
     * Init Carousel shortcode
     */
    function edgtInitCarousels() {

        var carouselHolders = $('.edgt-carousel-holder'),
            carousel,
            numberOfItems;

        if (carouselHolders.length) {
            carouselHolders.each(function () {
                carousel = $(this).children('.edgt-carousel');
                numberOfItems = carousel.data('items');

                var showNav = carousel.data('navigation');

                if (typeof showNav !== 'undefined') {
                    showNav = showNav === 'yes';
                } else {
                    showNav = false;
                }

                carousel.on('init', function () {
                    // change default opacity on init
                    carousel.addClass('appeared');

                }).slick({
                    slidesToScroll: 1,
                    slidesToShow: numberOfItems,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    arrows: showNav,
                    speed: 600,
                    responsive: [
                        {
                            breakpoint: 1025,
                            settings: {
                                slidesToShow: 4
                            }
                        },
                        {
                            breakpoint: 769,
                            settings: {
                                slidesToShow: 3
                            }
                        },
                        {
                            breakpoint: 481,
                            settings: {
                                slidesToShow: 1
                            }
                        }
                    ]
                });
            });
        }
    }

    function edgtTwitterSlider() {
        var twitterSliders = $('.edgt-twitter-slider-inner');

        if (twitterSliders.length) {
            twitterSliders.each(function () {
                var twitterSlider = $(this);
                twitterSlider.on('init', function () {

                    // change default opacity on init
                    twitterSlider.css({'opacity': '1'});
                }).slick({
                    slidesToShow: 1,
                    arrows: false,
                    dots: false,
                    speed: 750,
                    cssEase: 'cubic-bezier(.19,1,.22,1)',
                    swipeToSlide: true,
                    autoplay: true,
                    autoplaySpeed: 3000,
                });
            });
        }
    }

    /**
     * Init Pie Chart and Pie Chart With Icon shortcode
     */
    function edgtInitPieChart() {

        var pieCharts = $('.edgt-pie-chart-holder, .edgt-pie-chart-with-icon-holder');

        if (pieCharts.length) {

            pieCharts.each(function () {

                var pieChart = $(this),
                    percentageHolder = pieChart.children('.edgt-percentage, .edgt-percentage-with-icon'),
                    barColor,
                    trackColor,
                    lineWidth = 8,
                    size = 194;

                if (typeof percentageHolder.data('size') !== 'undefined' && percentageHolder.data('size') !== '') {
                    size = percentageHolder.data('size');
                }

                if (typeof pieChart.data('bar-color') !== 'undefined' && pieChart.data('bar-color') !== '') {
                    barColor = pieChart.data('bar-color');
                }

                if (typeof pieChart.data('track-color') !== 'undefined' && pieChart.data('track-color') !== '') {
                    trackColor = pieChart.data('track-color');
                }

                percentageHolder.appear(function () {
                    initToCounterPieChart(pieChart);
                    percentageHolder.css('opacity', '1');

                    percentageHolder.easyPieChart({
                        barColor: barColor,
                        trackColor: trackColor,
                        scaleColor: false,
                        lineCap: 'butt',
                        lineWidth: lineWidth,
                        animate: 1500,
                        size: size
                    });
                }, {accX: 0, accY: edgtGlobalVars.vars.edgtElementAppearAmount});

            });

        }

    }

    /*
     **	Counter for pie chart number from zero to defined number
     */
    function initToCounterPieChart(pieChart) {

        pieChart.css('opacity', '1');
        var counter = pieChart.find('.edgt-to-counter'),
            max = parseFloat(counter.text());
        counter.countTo({
            from: 0,
            to: max,
            speed: 1500,
            refreshInterval: 50
        });

    }

    /**
     * Init Pie Chart shortcode
     */
    function edgtInitPieChartDoughnut() {

        var pieCharts = $('.edgt-pie-chart-doughnut-holder, .edgt-pie-chart-pie-holder');

        pieCharts.each(function () {

            var pieChart = $(this),
                canvas = pieChart.find('canvas'),
                chartID = canvas.attr('id'),
                chart = document.getElementById(chartID).getContext('2d'),
                data = [],
                jqChart = $(chart.canvas); //Convert canvas to JQuery object and get data parameters

            for (var i = 1; i <= 10; i++) {

                var chartItem,
                    value = jqChart.data('value-' + i),
                    color = jqChart.data('color-' + i);

                if (typeof value !== 'undefined' && typeof color !== 'undefined') {
                    chartItem = {
                        value: value,
                        color: color
                    };
                    data.push(chartItem);
                }

            }

            if (canvas.hasClass('edgt-pie')) {
                new Chart(chart).Pie(data,
                    {segmentStrokeColor: 'transparent'}
                );
            } else {
                new Chart(chart).Doughnut(data,
                    {segmentStrokeColor: 'transparent'}
                );
            }

        });

    }

    /*
     **	Init tabs shortcode
     */
    function edgtInitTabs() {

        var tabs = $('.edgt-tabs');
        if (tabs.length) {
            tabs.each(function () {
                var thisTabs = $(this);

                thisTabs.children('.edgt-tab-container').each(function (index) {
                    index = index + 1;
                    var that = $(this),
                        link = that.attr('id'),
                        navItem = that.parent().find('.edgt-tabs-nav li:nth-child(' + index + ') a'),
                        navLink = navItem.attr('href');

                    link = '#' + link;

                    if (link.indexOf(navLink) > -1) {
                        navItem.attr('href', link);
                    }
                });

                if (thisTabs.hasClass('edgt-horizontal')) {
                    thisTabs.tabs();
                }
                else if (thisTabs.hasClass('edgt-vertical')) {
                    thisTabs.tabs().addClass('ui-tabs-vertical ui-helper-clearfix');
                    thisTabs.find('.edgt-tabs-nav > ul >li').removeClass('ui-corner-top').addClass('ui-corner-left');
                }
            });
        }
    }

    /*
     **	Generate icons in tabs navigation
     */
    function edgtInitTabIcons() {

        var tabContent = $('.edgt-tab-container');
        if (tabContent.length) {

            tabContent.each(function () {
                var thisTabContent = $(this);

                var id = thisTabContent.attr('id');
                var icon = '';
                if (typeof thisTabContent.data('icon-html') !== 'undefined' || thisTabContent.data('icon-html') !== 'false') {
                    icon = thisTabContent.data('icon-html');
                }

                var tabNav = thisTabContent.parents('.edgt-tabs').find('.edgt-tabs-nav > li > a[href="#' + id + '"]');

                if (typeof(tabNav) !== 'undefined') {
                    tabNav.children('.edgt-icon-frame').append(icon);
                }
            });
        }
    }

    /**
     * Button object that initializes whole button functionality
     * @type {Function}
     */
    var edgtButton = edgt.modules.shortcodes.edgtButton = function () {
        //all buttons on the page
        var buttons = $('.edgt-btn');

        /**
         * Initializes button hover color
         * @param button current button
         */
        var buttonHoverColor = function (button) {
            if (typeof button.data('hover-color') !== 'undefined') {
                var changeButtonColor = function (event) {
                    event.data.button.css('color', event.data.color);
                };

                var originalColor = button.css('color');
                var hoverColor = button.data('hover-color');

                button.on('mouseenter', {button: button, color: hoverColor}, changeButtonColor);
                button.on('mouseleave', {button: button, color: originalColor}, changeButtonColor);
            }
        };


        /**
         * Initializes button hover background color
         * @param button current button
         */
        var buttonHoverBgColor = function (button) {
            if (typeof button.data('hover-bg-color') !== 'undefined') {
                var changeButtonBg = function (event) {
                    event.data.button.css('background-color', event.data.color);
                };

                var originalBgColor = button.css('background-color');
                var hoverBgColor = button.data('hover-bg-color');

                button.on('mouseenter', {button: button, color: hoverBgColor}, changeButtonBg);
                button.on('mouseleave', {button: button, color: originalBgColor}, changeButtonBg);
            }
        };

        /**
         * Initializes button border color
         * @param button
         */
        var buttonHoverBorderColor = function (button) {
            if (typeof button.data('hover-border-color') !== 'undefined') {
                var changeBorderColor = function (event) {
                    event.data.button.css('border-color', event.data.color);
                };

                var originalBorderColor = button.css('borderTopColor'); //take one of the four sides
                var hoverBorderColor = button.data('hover-border-color');

                button.on('mouseenter', {button: button, color: hoverBorderColor}, changeBorderColor);
                button.on('mouseleave', {button: button, color: originalBorderColor}, changeBorderColor);
            }
        };

        return {
            init: function () {
                if (buttons.length) {
                    buttons.each(function () {
                        buttonHoverColor($(this));
                        buttonHoverBgColor($(this));
                        buttonHoverBorderColor($(this));
                    });
                }
            }
        };
    };

    /**
     * PricingTable object that initializes whole pricing table functionality
     * @type {Function}
     */
    var edgtPricingTableWithIcon = edgt.modules.shortcodes.edgtPricingTableWithIcon = function () {
        var pricingTables = $('.edgt-pricing-table-wi');

        /**
         * Initializes button hover background color
         * @param button current button
         */
        var pricingTableBgColor = function (pricingTable) {
            if (typeof pricingTable.data('hover-bg-color') !== 'undefined') {
                var changePricingTableBg = function (event) {
                    event.data.pricingTable.css('background-color', event.data.color);
                };

                var originalBgColor = pricingTable.css('background-color');
                var hoverBgColor = pricingTable.data('hover-bg-color');

                pricingTable.on('mouseenter', {pricingTable: pricingTable, color: hoverBgColor}, changePricingTableBg);
                pricingTable.on('mouseleave', {
                    pricingTable: pricingTable,
                    color: originalBgColor
                }, changePricingTableBg);
            }
        };

        return {
            init: function () {
                if (pricingTables.length) {
                    pricingTables.each(function () {
                        pricingTableBgColor($(this));
                    });
                }
            }
        };
    };

    /*
     **	Init blog list masonry type
     */
    function edgtInitBlogListMasonry() {
        var blogList = $('.edgt-blog-list-holder.edgt-masonry');
        if (blogList.length) {
            blogList.each(function () {
                var container = $(this);

                container.waitForImages(function () {
                    container.css('visibility', 'visible');

                    container.isotope({
                        itemSelector: 'article',
                        masonry: {
                            columnWidth: '.edgt-blog-masonry-grid-sizer'
                        }
                    });
                });
            });
        }
    }

    /*
     **	Custom Font resizing
     */
    function edgtCustomFontResize() {
        var customFont = $('.edgt-custom-font-holder');
        if (customFont.length) {
            customFont.each(function () {
                var thisCustomFont = $(this);
                var fontSize;
                var lineHeight;
                var coef1 = 1;
                var coef2 = 1;

                if (edgt.windowWidth < 1200) {
                    coef1 = 0.8;
                }

                if (edgt.windowWidth < 1000) {
                    coef1 = 0.7;
                }

                if (edgt.windowWidth < 768) {
                    coef1 = 0.6;
                    coef2 = 0.7;
                }

                if (edgt.windowWidth < 600) {
                    coef1 = 0.5;
                    coef2 = 0.6;
                }

                if (edgt.windowWidth < 480) {
                    coef1 = 0.4;
                    coef2 = 0.5;
                }

                if (typeof thisCustomFont.data('font-size') !== 'undefined' && thisCustomFont.data('font-size') !== false) {
                    fontSize = parseInt(thisCustomFont.data('font-size'));

                    if (fontSize > 70) {
                        fontSize = Math.round(fontSize * coef1);
                    }
                    else if (fontSize > 35) {
                        fontSize = Math.round(fontSize * coef2);
                    }

                    thisCustomFont.css('font-size', fontSize + 'px');
                }

                if (typeof thisCustomFont.data('line-height') !== 'undefined' && thisCustomFont.data('line-height') !== false) {
                    lineHeight = parseInt(thisCustomFont.data('line-height'));

                    if (lineHeight > 70 && edgt.windowWidth < 1200) {
                        lineHeight = '1.2em';
                    }
                    else if (lineHeight > 35 && edgt.windowWidth < 768) {
                        lineHeight = '1.2em';
                    }
                    else {
                        lineHeight += 'px';
                    }

                    thisCustomFont.css('line-height', lineHeight);
                }
            });
        }
    }

    /*
     **	Show Google Map
     */
    function edgtShowGoogleMap() {

        if ($('.edgt-google-map').length) {
            $('.edgt-google-map').each(function () {

                var element = $(this);

                var customMapStyle;
                if (typeof element.data('custom-map-style') !== 'undefined') {
                    customMapStyle = element.data('custom-map-style');
                }

                var colorOverlay;
                if (typeof element.data('color-overlay') !== 'undefined' && element.data('color-overlay') !== false) {
                    colorOverlay = element.data('color-overlay');
                }

                var saturation;
                if (typeof element.data('saturation') !== 'undefined' && element.data('saturation') !== false) {
                    saturation = element.data('saturation');
                }

                var lightness;
                if (typeof element.data('lightness') !== 'undefined' && element.data('lightness') !== false) {
                    lightness = element.data('lightness');
                }

                var zoom;
                if (typeof element.data('zoom') !== 'undefined' && element.data('zoom') !== false) {
                    zoom = element.data('zoom');
                }

                var pin;
                if (typeof element.data('pin') !== 'undefined' && element.data('pin') !== false) {
                    pin = element.data('pin');
                }

                var mapHeight;
                if (typeof element.data('height') !== 'undefined' && element.data('height') !== false) {
                    mapHeight = element.data('height');
                }

                var uniqueId;
                if (typeof element.data('unique-id') !== 'undefined' && element.data('unique-id') !== false) {
                    uniqueId = element.data('unique-id');
                }

                var scrollWheel;
                if (typeof element.data('scroll-wheel') !== 'undefined') {
                    scrollWheel = element.data('scroll-wheel');
                }
                var addresses;
                if (typeof element.data('addresses') !== 'undefined' && element.data('addresses') !== false) {
                    addresses = element.data('addresses');
                }

                var map = "map_" + uniqueId;
                var geocoder = "geocoder_" + uniqueId;
                var holderId = "edgt-map-" + uniqueId;

                edgtInitializeGoogleMap(customMapStyle, colorOverlay, saturation, lightness, scrollWheel, zoom, holderId, mapHeight, pin, map, geocoder, addresses);
            });
        }

    }

    /*
     **	Init Google Map
     */
    function edgtInitializeGoogleMap(customMapStyle, color, saturation, lightness, wheel, zoom, holderId, height, pin, map, geocoder, data) {

        if (typeof google !== 'object') {
            return;
        }

        var mapStyles = [
            {
                stylers: [
                    {hue: color},
                    {saturation: saturation},
                    {lightness: lightness},
                    {gamma: 1}
                ]
            }
        ];

        var googleMapStyleId;

        if (customMapStyle) {
            googleMapStyleId = 'edgt-style';
        } else {
            googleMapStyleId = google.maps.MapTypeId.ROADMAP;
        }

        var qoogleMapType = new google.maps.StyledMapType(mapStyles,
            {name: "Edge Google Map"});

        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(-34.397, 150.644);

        if (!isNaN(height)) {
            height = height + 'px';
        }

        var myOptions = {

            zoom: zoom,
            scrollwheel: wheel,
            center: latlng,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL,
                position: google.maps.ControlPosition.RIGHT_CENTER
            },
            scaleControl: false,
            scaleControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            streetViewControl: false,
            streetViewControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            panControl: false,
            panControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            mapTypeControl: false,
            mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'edgt-style'],
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            mapTypeId: googleMapStyleId
        };

        map = new google.maps.Map(document.getElementById(holderId), myOptions);
        map.mapTypes.set('edgt-style', qoogleMapType);

        var index;

        for (index = 0; index < data.length; ++index) {
            edgtInitializeGoogleAddress(data[index], pin, map, geocoder);
        }

        var holderElement = document.getElementById(holderId);
        holderElement.style.height = height;
    }

    /*
     **	Init Google Map Addresses
     */
    function edgtInitializeGoogleAddress(data, pin, map, geocoder) {
        if (data === '')
            return;
        var contentString = '<div id="content">' +
            '<div id="siteNotice">' +
            '</div>' +
            '<div id="bodyContent">' +
            '<p>' + data + '</p>' +
            '</div>' +
            '</div>';
        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        geocoder.geocode({'address': data}, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    icon: pin,
                    title: data.store_title
                });
                google.maps.event.addListener(marker, 'click', function () {
                    infowindow.open(map, marker);
                });

                google.maps.event.addDomListener(window, 'resize', function () {
                    map.setCenter(results[0].geometry.location);
                });

            }
        });
    }

    function edgtInitAccordions() {
        var accordion = $('.edgt-accordion-holder');
        if (accordion.length) {
            accordion.each(function () {

                var thisAccordion = $(this);

                if (thisAccordion.hasClass('edgt-accordion')) {

                    thisAccordion.accordion({
                        animate: "swing",
                        collapsible: false,
                        active: 0,
                        icons: "",
                        heightStyle: "content"
                    });
                }

                if (thisAccordion.hasClass('edgt-toggle')) {

                    var toggleAccordion = $(this);
                    var toggleAccordionTitle = toggleAccordion.find('.edgt-title-holder');
                    var toggleAccordionContent = toggleAccordionTitle.next();

                    toggleAccordion.addClass("accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset");
                    toggleAccordionTitle.addClass("ui-accordion-header ui-helper-reset ui-state-default ui-corner-top ui-corner-bottom");
                    toggleAccordionContent.addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").hide();

                    toggleAccordionTitle.each(function () {
                        var thisTitle = $(this);
                        thisTitle.on('mouseenter mouseleave', function () {
                            thisTitle.toggleClass("ui-state-hover");
                        });

                        thisTitle.on('click', function () {
                            thisTitle.toggleClass('ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom');
                            thisTitle.next().toggleClass('ui-accordion-content-active').slideToggle(400);
                        });
                    });
                }
            });
        }
    }

    function edgtInitImageGallery() {

        var galleries = $('.edgt-image-gallery');

        if (galleries.length) {
            galleries.each(function () {
                var gallery = $(this).children('.edgt-image-gallery-slider'),
                    autoplay = gallery.data('autoplay'),
                    arrows = (gallery.data('arrows') == 'yes'),
                    dots = (gallery.data('dots') == 'yes');
                if (dots) {
                    gallery.addClass('slick-dots');
                }
                gallery.on('init', function () {

                    // change default opacity on init
                    gallery.css({'opacity': '1'});
                }).slick({
                    singleItem: true,
                    autoplay: autoplay !== 'disable',
                    autoplaySpeed: autoplay * 1000,
                    arrows: arrows,
                    dots: dots,
                    slideSpeed: 600
                });
            });
        }

    }

    /**
     * Initializes portfolio list
     */
    function edgtInitPortfolio() {
        var portList = $('.edgt-portfolio-list-holder-outer.edgt-ptf-standard, .edgt-portfolio-list-holder-outer.edgt-ptf-gallery, .edgt-portfolio-list-holder-outer.edgt-ptf-simple');
        if (portList.length) {
            portList.each(function () {
                var thisPortList = $(this);
                edgtInitPortMixItUp(thisPortList);
            });
        }
    }

    /**
     * Initializes mixItUp function for specific container
     */
    function edgtInitPortMixItUp(container) {
        var filterClass = '';
        if (container.hasClass('edgt-ptf-has-filter')) {
            filterClass = container.find('.edgt-portfolio-filter-holder-inner ul li').data('class');
            filterClass = '.' + filterClass;
        }

        var holderInner = container.find('.edgt-portfolio-list-holder');
        holderInner.mixItUp({
            callbacks: {
                onMixLoad: function () {
                    holderInner.find('article').css('visibility', 'visible');
                    edgt.modules.common.edgtInitParallax(); //since there is no height of portoflio holder before loading animation
                },
                onMixStart: function () {
                    holderInner.find('article').css('visibility', 'visible');
                    container.find('.edgt-ptf-list-load-more').css('visibility', 'hidden');
                },
                onMixBusy: function () {
                    holderInner.find('article').css('visibility', 'visible');
                },
                onMixEnd: function () {
                    edgtTiltHoverEffect();
                    edgtPortfolioAppearEffect();
                    container.find('.edgt-ptf-list-load-more').css('visibility', 'visible');
                }
            },
            selectors: {
                filter: filterClass
            },
            animation: {
                duration: 600,
                effects: 'fade',
            }
        });

    }

    /*
     **	Init portfolio list masonry type
     */
    function edgtInitPortfolioListMasonry() {
        var portList = $('.edgt-portfolio-list-holder-outer.edgt-ptf-masonry');
        if (portList.length) {
            portList.each(function () {
                var thisPortList = $(this).children('.edgt-portfolio-list-holder');

                edgtResizeMasonry(thisPortList);

                edgtInitMasonry(thisPortList);
                $(window).resize(function () {
                    edgtResizeMasonry(thisPortList);
                    edgtInitMasonry(thisPortList);
                });
            });
        }
    }

    function edgtInitMasonry(container) {
        container.animate({opacity: 1});
        container.waitForImages(function () {
            container.isotope({
                itemSelector: '.edgt-portfolio-item',
                resizable: false,
                layoutMode: 'packery',
                packery: {
                    columnWidth: '.edgt-portfolio-list-masonry-grid-sizer'
                }
            });
            container.parent().find('.edgt-ptf-list-load-more').css('visibility', 'visible');
            container.addClass('edgt-appeared');
        });
    }

    function edgtResizeMasonry(container) {

        var size = container.find('.edgt-portfolio-list-masonry-grid-sizer').width();

        var defaultMasonryItem = container.find('.edgt-default-masonry-item');
        var largeWidthMasonryItem = container.find('.edgt-large-width-masonry-item');
        var largeHeightMasonryItem = container.find('.edgt-large-height-masonry-item');
        var largeWidthHeightMasonryItem = container.find('.edgt-large-width-height-masonry-item');

        defaultMasonryItem.css('height', size);
        largeHeightMasonryItem.css('height', Math.round(2 * size));

        if (edgt.windowWidth > 768) {
            largeWidthHeightMasonryItem.css('height', Math.round(2 * size));
            largeHeightMasonryItem.css('height', Math.round(2 * size));
            largeWidthMasonryItem.css('height', size);
        } else {
            largeWidthHeightMasonryItem.css('height', size);
            largeHeightMasonryItem.css('height', size);
        }
    }

    /**
     * Initializes portfolio pinterest
     */
    function edgtInitPortfolioListPinterest() {

        var portList = $('.edgt-portfolio-list-holder-outer.edgt-ptf-pinterest');
        if (portList.length) {
            portList.each(function () {
                var thisPortList = $(this).children('.edgt-portfolio-list-holder');
                edgtInitPinterest(thisPortList);
                $(window).resize(function () {
                    edgtInitPinterest(thisPortList);
                });
            });

        }
    }

    function edgtInitPinterest(container) {
        container.animate({opacity: 1});
        container.waitForImages(function () {
            container.isotope({
                layoutMode: 'packery',
                itemSelector: '.edgt-portfolio-item',
                packery: {
                    columnWidth: '.edgt-portfolio-list-masonry-grid-sizer'
                }
            });
            container.parent().find('.edgt-ptf-list-load-more').css('visibility', 'visible');
        });

    }

    /**
     * Initializes portfolio masonry filter
     */
    function edgtInitPortfolioMasonryFilter() {

        var filterHolder = $('.edgt-portfolio-filter-holder.edgt-masonry-filter');

        if (filterHolder.length) {
            filterHolder.each(function () {

                var thisFilterHolder = $(this);

                var portfolioIsotopeAnimation = null;

                var filter = thisFilterHolder.find('ul li').data('class');

                thisFilterHolder.find('.filter:first').addClass('current');

                thisFilterHolder.find('.filter').on('click', function () {

                    var currentFilter = $(this);
                    clearTimeout(portfolioIsotopeAnimation);

                    $('.isotope, .isotope .isotope-item').css('transition-duration', '0.8s');

                    portfolioIsotopeAnimation = setTimeout(function () {
                        $('.isotope, .isotope .isotope-item').css('transition-duration', '0s');
                    }, 700);

                    var selector = $(this).attr('data-filter');
                    thisFilterHolder.siblings('.edgt-portfolio-list-holder-outer').find('.edgt-portfolio-list-holder').isotope({filter: selector});

                    thisFilterHolder.find('.filter').removeClass('current');
                    currentFilter.addClass('current');

                    return false;

                });
            });
        }
    }

    function edgtParentChildFilter() {

        var filterHolder = $('.edgt-portfolio-filter-holder');

        if (filterHolder.length) {
            filterHolder.each(function () {

                var thisFilterHolder = $(this);
                //parent child filter
                var parentCategories = thisFilterHolder.find('.parent-filter');

                parentCategories.on('click', function () {
                    var activeParent = $(this);

                    parentCategories.each(function () {
                        $(this).removeClass('active');
                    });
                    activeParent.addClass('active');

                    var parentId = activeParent.data('group-id');

                    var children = $(this).siblings('ul');

                    children.each(function () {
                        if ($(this).data('parent-id') == parentId) {
                            var thisItem = $(this);
                            setTimeout(function () {
                                thisItem.fadeIn();
                            }, 500);
                        }
                        else {
                            $(this).fadeOut();
                        }
                    });
                });
            });
        }
    }

    /**
     * Initializes portfolio load more function
     */
    function edgtInitPortfolioLoadMore() {
        var portList = $('.edgt-portfolio-list-holder-outer.edgt-ptf-load-more');
        if (portList.length) {
            portList.each(function () {

                var thisPortList = $(this);
                var thisPortListInner = thisPortList.find('.edgt-portfolio-list-holder');
                var nextPage;
                var maxNumPages;
                var loadMoreButton = thisPortList.find('.edgt-ptf-list-load-more a');
                var loadMoreInitialText = loadMoreButton.text();
                var loadMoreLoadingText = edgtGlobalVars.vars.edgtPtfLoadMoreMessage;

                if (typeof thisPortList.data('max-num-pages') !== 'undefined' && thisPortList.data('max-num-pages') !== false) {
                    maxNumPages = thisPortList.data('max-num-pages');
                }

                loadMoreButton.on('click', function (e) {
                    var loadMoreDatta = edgtGetPortfolioAjaxData(thisPortList);
                    nextPage = loadMoreDatta.nextPage;
                    loadMoreButton.text(loadMoreLoadingText);
                    e.preventDefault();
                    e.stopPropagation();
                    if (nextPage <= maxNumPages) {
                        var ajaxData = edgtSetPortfolioAjaxData(loadMoreDatta);
                        $.ajax({
                            type: 'POST',
                            data: ajaxData,
                            url: edgtCoreAjaxUrl,
                            success: function (data) {
                                nextPage++;
                                thisPortList.data('next-page', nextPage);
                                var response = $.parseJSON(data);
                                var responseHtml = edgtConvertHTML(response.html); //convert response html into jQuery collection that Mixitup can work with
                                thisPortList.waitForImages(function () {
                                    setTimeout(function () {
                                        if (thisPortList.hasClass('edgt-ptf-masonry') || thisPortList.hasClass('edgt-ptf-pinterest')) {
                                            thisPortListInner.isotope().append(responseHtml).isotope('appended', responseHtml).isotope('reloadItems');
                                            if (thisPortList.hasClass('edgt-ptf-masonry')) {
                                                edgtResizeMasonry(thisPortList);
                                                edgtTiltHoverEffect();
                                            }
                                        } else {
                                            thisPortListInner.mixItUp('append', responseHtml);
                                        }
                                        loadMoreButton.text(loadMoreInitialText);
                                    }, 400);
                                });
                            }
                        });
                    }
                    if (nextPage === maxNumPages) {
                        loadMoreButton.hide();
                    }
                });

            });
        }
    }

    function edgtConvertHTML(html) {
        var newHtml = $.trim(html),
            $html = $(newHtml),
            $empty = $();

        $html.each(function (index, value) {
            if (value.nodeType === 1) {
                $empty = $empty.add(this);
            }
        });

        return $empty;
    }

    /**
     * Initializes portfolio load more data params
     * @param portfolio list container with defined data params
     * return array
     */
    function edgtGetPortfolioAjaxData(container) {
        var returnValue = {};

        returnValue.type = '';
        returnValue.columns = '';
        returnValue.gridSize = '';
        returnValue.orderBy = '';
        returnValue.order = '';
        returnValue.number = '';
        returnValue.imageSize = '';
        returnValue.customImageDimensions = '';
        returnValue.filter = '';
        returnValue.filterOrderBy = '';
        returnValue.category = '';
        returnValue.selectedProjects = '';
        returnValue.showLoadMore = '';
        returnValue.titleTag = '';
        returnValue.showCategories = '';
        returnValue.nextPage = '';
        returnValue.maxNumPages = '';
        returnValue.showExcerpt = '';
        returnValue.shaderBackgroundStyle = '';
        returnValue.shaderBackgroundColor = '';

        if (typeof container.data('type') !== 'undefined' && container.data('type') !== false) {
            returnValue.type = container.data('type');
        }

        if (typeof container.data('grid-size') !== 'undefined' && container.data('grid-size') !== false) {
            returnValue.gridSize = container.data('grid-size');
        }

        if (typeof container.data('columns') !== 'undefined' && container.data('columns') !== false) {
            returnValue.columns = container.data('columns');
        }

        if (typeof container.data('order-by') !== 'undefined' && container.data('order-by') !== false) {
            returnValue.orderBy = container.data('order-by');
        }

        if (typeof container.data('order') !== 'undefined' && container.data('order') !== false) {
            returnValue.order = container.data('order');
        }

        if (typeof container.data('number') !== 'undefined' && container.data('number') !== false) {
            returnValue.number = container.data('number');
        }

        if (typeof container.data('image-size') !== 'undefined' && container.data('image-size') !== false) {
            returnValue.imageSize = container.data('image-size');
        }

        if (typeof container.data('custom-image-dimensions') !== 'undefined' && container.data('custom-image-dimensions') !== false) {
            returnValue.customImageDimensions = container.data('custom-image-dimensions');
        }

        if (typeof container.data('filter') !== 'undefined' && container.data('filter') !== false) {
            returnValue.filter = container.data('filter');
        }

        if (typeof container.data('filter-order-by') !== 'undefined' && container.data('filter-order-by') !== false) {
            returnValue.filterOrderBy = container.data('filter-order-by');
        }

        if (typeof container.data('category') !== 'undefined' && container.data('category') !== false) {
            returnValue.category = container.data('category');
        }

        if (typeof container.data('selected-projects') !== 'undefined' && container.data('selected-projects') !== false) {
            returnValue.selectedProjects = container.data('selected-projects');
        }

        if (typeof container.data('show-load-more') !== 'undefined' && container.data('show-load-more') !== false) {
            returnValue.showLoadMore = container.data('show-load-more');
        }

        if (typeof container.data('title-tag') !== 'undefined' && container.data('title-tag') !== false) {
            returnValue.titleTag = container.data('title-tag');
        }

        if (typeof container.data('show-categories') !== 'undefined' && container.data('show-categories') !== false) {
            returnValue.showCategories = container.data('show-categories');
        }

        if (typeof container.data('next-page') !== 'undefined' && container.data('next-page') !== false) {
            returnValue.nextPage = container.data('next-page');
        }

        if (typeof container.data('max-num-pages') !== 'undefined' && container.data('max-num-pages') !== false) {
            returnValue.maxNumPages = container.data('max-num-pages');
        }

        if (typeof container.data('show-excerpt') !== 'undefined' && container.data('show-excerpt') !== false) {
            returnValue.showExcerpt = container.data('show-excerpt');
        }

        if (typeof container.data('text-length') !== 'undefined' && container.data('text-length') !== false) {
            returnValue.textLength = container.data('text-length');
        }

        if (typeof container.data('shader-background-style') !== 'undefined' && container.data('shader-background-style') !== false) {
            returnValue.shaderBackgroundStyle = container.data('shader-background-style');
        }

        if (typeof container.data('shader-background-color') !== 'undefined' && container.data('shader-background-color') !== false) {
            returnValue.shaderBackgroundColor = container.data('shader-background-color');
        }

        return returnValue;
    }

    /**
     * Sets portfolio load more data params for ajax function
     * @param portfolio list container with defined data params
     * return array
     */
    function edgtSetPortfolioAjaxData(container) {
        var returnValue = {
            action: 'edgt_core_portfolio_ajax_load_more',
            type: container.type,
            columns: container.columns,
            gridSize: container.gridSize,
            orderBy: container.orderBy,
            order: container.order,
            number: container.number,
            imageSize: container.imageSize,
            customImageDimensions: container.customImageDimensions,
            filter: container.filter,
            filterOrderBy: container.filterOrderBy,
            category: container.category,
            selectedProjectes: container.selectedProjectes,
            showLoadMore: container.showLoadMore,
            titleTag: container.titleTag,
            showCategories: container.showCategories,
            nextPage: container.nextPage,
            showExcerpt: container.showExcerpt,
            textLength: container.textLength,
            shaderBackgroundStyle: container.shaderBackgroundStyle,
            shaderBackgroundColor: container.shaderBackgroundColor,
        };
        return returnValue;
    }

    /*
     * Portfolio Appear effect
     */
    function edgtPortfolioAppearEffect() {
        var ptfLists = $('.edgt-portfolio-list-holder-outer.edgt-appear-effect');

        if (ptfLists.length && !edgt.htmlEl.hasClass('touch')) {
            ptfLists.each(function () {
                var ptfList = $(this),
                    article = ptfList.find('article');

                if (ptfList.hasClass('edgt-one-by-one')) {
                    var animateCycle = 5, // rewind delay
                        animateCycleCounter = 0;

                    article.not('edgt-appeared').each(function () {
                        var currentArticle = $(this);

                        setTimeout(function () {
                            currentArticle.appear(function () {
                                animateCycleCounter++;

                                if (animateCycleCounter == animateCycle) {
                                    animateCycleCounter = 0;
                                }

                                setTimeout(function () {
                                    currentArticle.addClass('edgt-appeared');
                                }, animateCycleCounter * 250);
                            }, {accX: 0, accY: 0});
                        }, 30);
                    });
                }

                if (ptfList.hasClass('edgt-random')) {
                    var randomize = function (n) {
                        var queue = [];

                        for (var i = 0; i < numberOfItems; i++) {
                            var queueElement = Math.floor(Math.random() * numberOfItems);

                            if (jQuery.inArray(queueElement, queue) > 0) {
                                --i;
                            } else {
                                queue.push(queueElement);
                            }
                        }

                        return queue;
                    };

                    var numberOfItems = article.length,
                        r = randomize(numberOfItems);

                    article.not('edgt-appeared').each(function (i) {
                        var currentArticle = $(this);

                        currentArticle.appear(function () {
                            setTimeout(function () {
                                currentArticle.addClass('edgt-appeared');
                            }, r[i] * 80);
                        });
                    });
                }

            });
        }
    }

    /**
     * Initializes matches load more function
     */
    function edgtInitMatchLoadMore() {
        var matchList = $('.edgt-match-list-holder-outer.edgt-match-load-more');
        if (matchList.length) {
            matchList.each(function () {

                var thisMatchList = $(this);
                var thisMatchListInner = thisMatchList.find('.edgt-match-list-holder');
                var nextPage;
                var maxNumPages;
                var loadMoreButton = thisMatchList.find('.edgt-match-list-load-more a');
                var loadMoreInitialText = loadMoreButton.text();
                var loadMoreLoadingText = edgtGlobalVars.vars.edgtPtfLoadMoreMessage;

                if (typeof thisMatchListInner.data('max-num-pages') !== 'undefined' && thisMatchListInner.data('max-num-pages') !== false) {
                    maxNumPages = thisMatchListInner.data('max-num-pages');
                }

                loadMoreButton.on('click', function (e) {
                    var loadMoreDatta = edgtGetMatchAjaxData(thisMatchListInner);
                    nextPage = loadMoreDatta.nextPage;
                    loadMoreButton.text(loadMoreLoadingText);
                    e.preventDefault();
                    e.stopPropagation();

                    if (nextPage <= maxNumPages) {

                        var ajaxData = edgtSetMatchAjaxData(loadMoreDatta);
                        $.ajax({
                            type: 'POST',
                            data: ajaxData,
                            url: edgtCoreAjaxUrl,
                            success: function (data) {
                                nextPage++;
                                thisMatchListInner.data('next-page', nextPage);
                                var response = $.parseJSON(data);
                                var responseHtml = edgtConvertHTML(response.html);
                                thisMatchListInner.waitForImages(function () {
                                    setTimeout(function () {
                                        thisMatchListInner.append(responseHtml);
                                        loadMoreButton.text(loadMoreInitialText);
                                    }, 400);
                                });
                            }
                        });

                    }
                    if (nextPage === maxNumPages) {
                        loadMoreButton.hide();
                    }
                });

            });
        }
    }

    /**
     * Initializes match load more data params
     * @param match list container with defined data params
     * return array
     */
    function edgtGetMatchAjaxData(container) {
        var returnValue = {};

        returnValue.orderBy = '';
        returnValue.order = '';
        returnValue.number = '';
        returnValue.category = '';
        returnValue.selectedProjects = '';
        returnValue.titleTag = '';
        returnValue.teamTitleTag = '';
        returnValue.showLoadMore = '';
        returnValue.showCategories = '';
        returnValue.showDate = '';
        returnValue.showResult = '';
        returnValue.nextPage = '';
        returnValue.skin = '';
        returnValue.maxNumPages = '';

        if (typeof container.data('order-by') !== 'undefined' && container.data('order-by') !== false) {
            returnValue.orderBy = container.data('order-by');
        }

        if (typeof container.data('order') !== 'undefined' && container.data('order') !== false) {
            returnValue.order = container.data('order');
        }

        if (typeof container.data('number') !== 'undefined' && container.data('number') !== false) {
            returnValue.number = container.data('number');
        }

        if (typeof container.data('category') !== 'undefined' && container.data('category') !== false) {
            returnValue.category = container.data('category');
        }

        if (typeof container.data('selected-projects') !== 'undefined' && container.data('selected-projects') !== false) {
            returnValue.selectedProjects = container.data('selected-projects');
        }

        if (typeof container.data('title-tag') !== 'undefined' && container.data('title-tag') !== false) {
            returnValue.titleTag = container.data('title-tag');
        }

        if (typeof container.data('team-title-tag') !== 'undefined' && container.data('team-title-tag') !== false) {
            returnValue.teamTitleTag = container.data('team-title-tag');
        }

        if (typeof container.data('show-load-more') !== 'undefined' && container.data('show-load-more') !== false) {
            returnValue.showLoadMore = container.data('show-load-more');
        }

        if (typeof container.data('show-categories') !== 'undefined' && container.data('show-categories') !== false) {
            returnValue.showCategories = container.data('show-categories');
        }

        if (typeof container.data('show-date') !== 'undefined' && container.data('show-date') !== false) {
            returnValue.showDate = container.data('show-date');
        }

        if (typeof container.data('show-result') !== 'undefined' && container.data('show-result') !== false) {
            returnValue.showResult = container.data('show-result');
        }

        if (typeof container.data('next-page') !== 'undefined' && container.data('next-page') !== false) {
            returnValue.nextPage = container.data('next-page');
        }

        if (typeof container.data('skin') !== 'undefined' && container.data('skin') !== false) {
            returnValue.skin = container.data('skin');
        }

        if (typeof container.data('max-num-pages') !== 'undefined' && container.data('max-num-pages') !== false) {
            returnValue.maxNumPages = container.data('max-num-pages');
        }

        return returnValue;
    }

    /**
     * Sets match load more data params for ajax function
     * @param match list container with defined data params
     * return array
     */
    function edgtSetMatchAjaxData(container) {
        var returnValue = {
            action: 'edgt_core_match_ajax_load_more',
            orderBy: container.orderBy,
            order: container.order,
            number: container.number,
            category: container.category,
            selectedProjectes: container.selectedProjectes,
            showLoadMore: container.showLoadMore,
            titleTag: container.titleTag,
            teamTitleTag: container.teamTitleTag,
            showCategories: container.showCategories,
            showDate: container.showDate,
            showResult: container.showResult,
            skin: container.skin,
            nextPage: container.nextPage,
        };
        return returnValue;
    }

    /**
     * Slider object that initializes whole slider functionality
     * @type {Function}
     */
    var edgtSlider = edgt.modules.shortcodes.edgtSlider = function () {

        //all sliders on the page
        var sliders = $('.edgt-slider .carousel');
        //image regex used to extract img source
        var imageRegex = /url\(["']?([^'")]+)['"]?\)/;
        //default responsive breakpoints set
        var responsiveBreakpointSet = [1600, 1200, 900, 650, 500, 320];
        //var init for coefficiens array
        var coefficientsGraphicArray;
        var coefficientsTitleArray;
        var coefficientsSubtitleArray;
        var coefficientsTextArray;
        var coefficientsButtonArray;
        //var init for slider elements responsive coefficients
        var sliderGraphicCoefficient;
        var sliderTitleCoefficient;
        var sliderSubtitleCoefficient;
        var sliderTextCoefficient;
        var sliderButtonCoefficient;
        var sliderTitleCoefficientLetterSpacing;
        var sliderSubtitleCoefficientLetterSpacing;
        var sliderTextCoefficientLetterSpacing;

        /*** Functionality for translating image in slide - START ***/

        var matrixArray = {
            zoom_center: '1.2, 0, 0, 1.2, 0, 0',
            zoom_top_left: '1.2, 0, 0, 1.2, -150, -150',
            zoom_top_right: '1.2, 0, 0, 1.2, 150, -150',
            zoom_bottom_left: '1.2, 0, 0, 1.2, -150, 150',
            zoom_bottom_right: '1.2, 0, 0, 1.2, 150, 150'
        };

        // regular expression for parsing out the matrix components from the matrix string
        var matrixRE = /\([0-9epx\.\, \t\-]+/gi;

        // parses a matrix string of the form "matrix(n1,n2,n3,n4,n5,n6)" and
        // returns an array with the matrix components
        var parseMatrix = function (val) {
            return val.match(matrixRE)[0].substr(1).split(",").map(function (s) {
                return parseFloat(s);
            });
        };

        // transform css property names with vendor prefixes;
        // the plugin will check for values in the order the names are listed here and return as soon as there
        // is a value; so listing the W3 std name for the transform results in that being used if its available
        var transformPropNames = [
            "transform",
            "-webkit-transform"
        ];

        var getTransformMatrix = function (el) {
            // iterate through the css3 identifiers till we hit one that yields a value
            var matrix = null;
            transformPropNames.some(function (prop) {
                matrix = el.css(prop);
                return (matrix !== null && matrix !== "");
            });

            // if "none" then we supplant it with an identity matrix so that our parsing code below doesn't break
            matrix = (!matrix || matrix === "none") ?
                "matrix(1,0,0,1,0,0)" : matrix;
            return parseMatrix(matrix);
        };

        // set the given matrix transform on the element; note that we apply the css transforms in reverse order of how its given
        // in "transformPropName" to ensure that the std compliant prop name shows up last
        var setTransformMatrix = function (el, matrix) {
            var m = "matrix(" + matrix.join(",") + ")";
            for (var i = transformPropNames.length - 1; i >= 0; --i) {
                el.css(transformPropNames[i], m + ' rotate(0.01deg)');
            }
        };

        // interpolates a value between a range given a percent
        var interpolate = function (from, to, percent) {
            return from + ((to - from) * (percent / 100));
        };

        $.fn.transformAnimate = function (opt) {
            // extend the options passed in by caller
            var options = {
                transform: "matrix(1,0,0,1,0,0)"
            };
            $.extend(options, opt);

            // initialize our custom property on the element to track animation progress
            this.css("percentAnim", 0);

            // supplant "options.step" if it exists with our own routine
            var sourceTransform = getTransformMatrix(this);
            var targetTransform = parseMatrix(options.transform);
            options.step = function (percentAnim, fx) {
                // compute the interpolated transform matrix for the current animation progress
                var $this = $(this);
                var matrix = sourceTransform.map(function (c, i) {
                    return interpolate(c, targetTransform[i],
                        percentAnim);
                });

                // apply the new matrix
                setTransformMatrix($this, matrix);

                // invoke caller's version of "step" if one was supplied;
                if (opt.step) {
                    opt.step.apply(this, [matrix, fx]);
                }
            };

            // animate!
            return this.stop().animate({percentAnim: 100}, options);
        };

        /*** Functionality for translating image in slide - END ***/


        /**
         * Calculate heights for slider holder and slide item, depending on window width, but only if slider is set to be responsive
         * @param slider, current slider
         * @param defaultHeight, default height of slider, set in shortcode
         * @param responsive_breakpoint_set, breakpoints set for slider responsiveness
         * @param reset, boolean for reseting heights
         */
        var setSliderHeight = function (slider, defaultHeight, responsive_breakpoint_set, reset) {
            var sliderHeight = defaultHeight;
            if (!reset) {
                if (edgt.windowWidth > responsive_breakpoint_set[0]) {
                    sliderHeight = defaultHeight;
                } else if (edgt.windowWidth > responsive_breakpoint_set[1]) {
                    sliderHeight = defaultHeight * 0.75;
                } else if (edgt.windowWidth > responsive_breakpoint_set[2]) {
                    sliderHeight = defaultHeight * 0.6;
                } else if (edgt.windowWidth > responsive_breakpoint_set[3]) {
                    sliderHeight = defaultHeight * 0.55;
                } else if (edgt.windowWidth <= responsive_breakpoint_set[3]) {
                    sliderHeight = defaultHeight * 0.45;
                }
            }

            slider.css({'height': (sliderHeight) + 'px'});
            slider.find('.edgt-slider-preloader').css({'height': (sliderHeight) + 'px'});
            slider.find('.edgt-slider-preloader .edgt-ajax-loader').css({'display': 'block'});
            slider.find('.item').css({'height': (sliderHeight) + 'px'});
        };

        /**
         * Calculate heights for slider holder and slide item, depending on window size, but only if slider is set to be full height
         * @param slider, current slider
         */
        var setSliderFullHeight = function (slider) {
            var mobileHeaderHeight = edgt.windowWidth < 1000 ? edgtGlobalVars.vars.edgtMobileHeaderHeight + $('.edgt-top-bar').height() : 0;
            slider.css({'height': (edgt.windowHeight - mobileHeaderHeight) + 'px'});
            slider.find('.edgt-slider-preloader').css({'height': (edgt.windowHeight) + 'px'});
            slider.find('.edgt-slider-preloader .edgt-ajax-loader').css({'display': 'block'});
            slider.find('.item').css({'height': (edgt.windowHeight) + 'px'});
        };

        /**
         * Set initial sizes for slider elements and put them in global variables
         * @param slideItem, each slide
         * @param index, index od slide item
         */
        var setSizeGlobalVariablesForSlideElements = function (slideItem, index) {
            window["slider_graphic_width_" + index] = [];
            window["slider_graphic_height_" + index] = [];
            window["slider_title_" + index] = [];
            window["slider_subtitle_" + index] = [];
            window["slider_text_" + index] = [];
            window["slider_button1_" + index] = [];
            window["slider_button2_" + index] = [];

            //graphic size
            window["slider_graphic_width_" + index].push(parseFloat(slideItem.find('.edgt-thumb img').data("width")));
            window["slider_graphic_height_" + index].push(parseFloat(slideItem.find('.edgt-thumb img').data("height")));

            // font-size (0)
            window["slider_title_" + index].push(parseFloat(slideItem.find('.edgt-slide-title').css("font-size")));
            window["slider_subtitle_" + index].push(parseFloat(slideItem.find('.edgt-slide-subtitle').css("font-size")));
            window["slider_text_" + index].push(parseFloat(slideItem.find('.edgt-slide-text').css("font-size")));
            window["slider_button1_" + index].push(parseFloat(slideItem.find('.edgt-btn:eq(0)').css("font-size")));
            window["slider_button2_" + index].push(parseFloat(slideItem.find('.edgt-btn:eq(1)').css("font-size")));

            // line-height (1)
            window["slider_title_" + index].push(parseFloat(slideItem.find('.edgt-slide-title').css("line-height")));
            window["slider_subtitle_" + index].push(parseFloat(slideItem.find('.edgt-slide-subtitle').css("line-height")));
            window["slider_text_" + index].push(parseFloat(slideItem.find('.edgt-slide-text').css("line-height")));
            window["slider_button1_" + index].push(parseFloat(slideItem.find('.edgt-btn:eq(0)').css("line-height")));
            window["slider_button2_" + index].push(parseFloat(slideItem.find('.edgt-btn:eq(1)').css("line-height")));

            // letter-spacing (2)
            window["slider_title_" + index].push(parseFloat(slideItem.find('.edgt-slide-title').css("letter-spacing")));
            window["slider_subtitle_" + index].push(parseFloat(slideItem.find('.edgt-slide-subtitle').css("letter-spacing")));
            window["slider_text_" + index].push(parseFloat(slideItem.find('.edgt-slide-text').css("letter-spacing")));
            window["slider_button1_" + index].push(parseFloat(slideItem.find('.edgt-btn:eq(0)').css("letter-spacing")));
            window["slider_button2_" + index].push(parseFloat(slideItem.find('.edgt-btn:eq(1)').css("letter-spacing")));

            // margin-bottom (3)
            window["slider_title_" + index].push(parseFloat(slideItem.find('.edgt-slide-title').css("margin-bottom")));
            window["slider_subtitle_" + index].push(parseFloat(slideItem.find('.edgt-slide-subtitle').css("margin-bottom")));


            // slider_button padding top/bottom(3), padding left/right(4)
            window["slider_button1_" + index].push(parseFloat(slideItem.find('.edgt-btn:eq(0)').css("padding-top")));
            window["slider_button2_" + index].push(parseFloat(slideItem.find('.edgt-btn:eq(1)').css("padding-top")));

            window["slider_button1_" + index].push(parseFloat(slideItem.find('.edgt-btn:eq(0)').css("padding-left")));
            window["slider_button2_" + index].push(parseFloat(slideItem.find('.edgt-btn:eq(1)').css("padding-left")));
        };

        /**
         * Set responsive coefficients for slider elements
         * @param responsiveBreakpointSet, responsive breakpoints
         * @param coefficientsGraphicArray, responsive coeaficcients for graphic
         * @param coefficientsTitleArray, responsive coeaficcients for title
         * @param coefficientsSubtitleArray, responsive coeaficcients for subtitle
         * @param coefficientsTextArray, responsive coeaficcients for text
         * @param coefficientsButtonArray, responsive coeaficcients for button
         */
        var setSliderElementsResponsiveCoeffeicients = function (responsiveBreakpointSet, coefficientsGraphicArray, coefficientsTitleArray, coefficientsSubtitleArray, coefficientsTextArray, coefficientsButtonArray) {

            function coefficientsSetter(graphicArray, titleArray, subtitleArray, textArray, buttonArray) {
                sliderGraphicCoefficient = graphicArray;
                sliderTitleCoefficient = titleArray;
                sliderSubtitleCoefficient = subtitleArray;
                sliderTextCoefficient = textArray;
                sliderButtonCoefficient = buttonArray;
            }

            if (edgt.windowWidth > responsiveBreakpointSet[0]) {
                coefficientsSetter(coefficientsGraphicArray[0], coefficientsTitleArray[0], coefficientsSubtitleArray[0], coefficientsTextArray[0], coefficientsButtonArray[0]);
            } else if (edgt.windowWidth > responsiveBreakpointSet[1]) {
                coefficientsSetter(coefficientsGraphicArray[1], coefficientsTitleArray[1], coefficientsSubtitleArray[1], coefficientsTextArray[1], coefficientsButtonArray[1]);
            } else if (edgt.windowWidth > responsiveBreakpointSet[2]) {
                coefficientsSetter(coefficientsGraphicArray[2], coefficientsTitleArray[2], coefficientsSubtitleArray[2], coefficientsTextArray[2], coefficientsButtonArray[2]);
            } else if (edgt.windowWidth > responsiveBreakpointSet[3]) {
                coefficientsSetter(coefficientsGraphicArray[3], coefficientsTitleArray[3], coefficientsSubtitleArray[3], coefficientsTextArray[3], coefficientsButtonArray[3]);
            } else if (edgt.windowWidth > responsiveBreakpointSet[4]) {
                coefficientsSetter(coefficientsGraphicArray[4], coefficientsTitleArray[4], coefficientsSubtitleArray[4], coefficientsTextArray[4], coefficientsButtonArray[4]);
            } else if (edgt.windowWidth > responsiveBreakpointSet[5]) {
                coefficientsSetter(coefficientsGraphicArray[5], coefficientsTitleArray[5], coefficientsSubtitleArray[5], coefficientsTextArray[5], coefficientsButtonArray[5]);
            } else {
                coefficientsSetter(coefficientsGraphicArray[6], coefficientsTitleArray[6], coefficientsSubtitleArray[6], coefficientsTextArray[6], coefficientsButtonArray[6]);
            }

            // letter-spacing decrease quicker
            sliderTitleCoefficientLetterSpacing = sliderTitleCoefficient;
            sliderSubtitleCoefficientLetterSpacing = sliderSubtitleCoefficient;
            sliderTextCoefficientLetterSpacing = sliderTextCoefficient;
            if (edgt.windowWidth <= responsiveBreakpointSet[0]) {
                sliderTitleCoefficientLetterSpacing = sliderTitleCoefficient / 2;
                sliderSubtitleCoefficientLetterSpacing = sliderSubtitleCoefficient / 2;
                sliderTextCoefficientLetterSpacing = sliderTextCoefficient / 2;
            }
        };

        /**
         * Set sizes for slider elements
         * @param slideItem, each slide
         * @param index, index od slide item
         * @param reset, boolean for reseting sizes
         */
        var setSliderElementsSize = function (slideItem, index, reset) {

            if (reset) {
                sliderGraphicCoefficient = sliderTitleCoefficient = sliderSubtitleCoefficient = sliderTextCoefficient = sliderButtonCoefficient = sliderTitleCoefficientLetterSpacing = sliderSubtitleCoefficientLetterSpacing = sliderTextCoefficientLetterSpacing = 1;
            }

            slideItem.find('.edgt-thumb').css({
                "width": Math.round(window["slider_graphic_width_" + index][0] * sliderGraphicCoefficient) + 'px',
                "height": Math.round(window["slider_graphic_height_" + index][0] * sliderGraphicCoefficient) + 'px'
            });

            slideItem.find('.edgt-slide-title').css({
                "font-size": Math.round(window["slider_title_" + index][0] * sliderTitleCoefficient) + 'px',
                "line-height": Math.round(window["slider_title_" + index][1] * sliderTitleCoefficient) + 'px',
                "letter-spacing": Math.round(window["slider_title_" + index][2] * sliderTitleCoefficient) + 'px',
                "margin-bottom": Math.round(window["slider_title_" + index][3] * sliderTitleCoefficient) + 'px'
            });

            slideItem.find('.edgt-slide-subtitle').css({
                "font-size": Math.round(window["slider_subtitle_" + index][0] * sliderSubtitleCoefficient) + 'px',
                "line-height": Math.round(window["slider_subtitle_" + index][1] * sliderSubtitleCoefficient) + 'px',
                "margin-bottom": Math.round(window["slider_subtitle_" + index][3] * sliderSubtitleCoefficient) + 'px',
                "letter-spacing": Math.round(window["slider_subtitle_" + index][2] * sliderSubtitleCoefficientLetterSpacing) + 'px'
            });

            slideItem.find('.edgt-slide-text').css({
                "font-size": Math.round(window["slider_text_" + index][0] * sliderTextCoefficient) + 'px',
                "line-height": Math.round(window["slider_text_" + index][1] * sliderTextCoefficient) + 'px',
                "letter-spacing": Math.round(window["slider_text_" + index][2] * sliderTextCoefficientLetterSpacing) + 'px'
            });

            slideItem.find('.edgt-btn:eq(0)').css({
                "font-size": Math.round(window["slider_button1_" + index][0] * sliderButtonCoefficient) + 'px',
                "line-height": Math.round(window["slider_button1_" + index][1] * sliderButtonCoefficient) + 'px',
                "letter-spacing": Math.round(window["slider_button1_" + index][2] * sliderButtonCoefficient) + 'px',
                "padding-top": Math.round(window["slider_button1_" + index][3] * sliderButtonCoefficient) + 'px',
                "padding-bottom": Math.round(window["slider_button1_" + index][3] * sliderButtonCoefficient) + 'px',
                "padding-left": Math.round(window["slider_button1_" + index][4] * sliderButtonCoefficient) + 'px',
                "padding-right": Math.round(window["slider_button1_" + index][4] * sliderButtonCoefficient) + 'px'
            });
            slideItem.find('.edgt-btn:eq(1)').css({
                "font-size": Math.round(window["slider_button2_" + index][0] * sliderButtonCoefficient) + 'px',
                "line-height": Math.round(window["slider_button2_" + index][1] * sliderButtonCoefficient) + 'px',
                "letter-spacing": Math.round(window["slider_button2_" + index][2] * sliderButtonCoefficient) + 'px',
                "padding-top": Math.round(window["slider_button2_" + index][3] * sliderButtonCoefficient) + 'px',
                "padding-bottom": Math.round(window["slider_button2_" + index][3] * sliderButtonCoefficient) + 'px',
                "padding-left": Math.round(window["slider_button2_" + index][4] * sliderButtonCoefficient) + 'px',
                "padding-right": Math.round(window["slider_button2_" + index][4] * sliderButtonCoefficient) + 'px'
            });
        };

        /**
         * Set heights for slider and elemnts depending on slider settings (full height, responsive height od set height)
         * @param slider, current slider
         */
        var setHeights = function (slider) {

            var defaultHeight;

            slider.find('.item').each(function (i) {
                setSizeGlobalVariablesForSlideElements($(this), i);
                setSliderElementsSize($(this), i, false);
            });

            if (slider.hasClass('edgt-full-screen')) {

                setSliderFullHeight(slider);

                $(window).resize(function () {
                    setSliderElementsResponsiveCoeffeicients(responsiveBreakpointSet, coefficientsGraphicArray, coefficientsTitleArray, coefficientsSubtitleArray, coefficientsTextArray, coefficientsButtonArray);
                    setSliderFullHeight(slider);
                    slider.find('.item').each(function (i) {
                        setSliderElementsSize($(this), i, false);
                    });
                });

            } else if (slider.hasClass('edgt-responsive-height')) {

                defaultHeight = slider.data('height');
                setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, false);

                $(window).resize(function () {
                    setSliderElementsResponsiveCoeffeicients(responsiveBreakpointSet, coefficientsGraphicArray, coefficientsTitleArray, coefficientsSubtitleArray, coefficientsTextArray, coefficientsButtonArray);
                    setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, false);
                    slider.find('.item').each(function (i) {
                        setSliderElementsSize($(this), i, false);
                    });
                });

            } else {
                defaultHeight = slider.data('height');

                slider.find('.edgt-slider-preloader').css({'height': (slider.height()) + 'px'});
                slider.find('.edgt-slider-preloader .edgt-ajax-loader').css({'display': 'block'});

                if(edgt.windowWidth < 1000) {
                    setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, false);
                } else {
                    setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, true);
                }

                $(window).resize(function () {
                    setSliderElementsResponsiveCoeffeicients(responsiveBreakpointSet, coefficientsGraphicArray, coefficientsTitleArray, coefficientsSubtitleArray, coefficientsTextArray, coefficientsButtonArray);
                    if (edgt.windowWidth < 1000) {
                        setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, false);
                        slider.find('.item').each(function (i) {
                            setSliderElementsSize($(this), i, false);
                        });
                    } else {
                        setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, true);
                        slider.find('.item').each(function (i) {
                            setSliderElementsSize($(this), i, true);
                        });
                    }
                });
            }
        };

        /**
         * Set prev/next numbers on navigation arrows
         * @param slider, current slider
         * @param currentItem, current slide item index
         * @param totalItemCount, total number of slide items
         */
        var setPrevNextNumbers = function (slider, currentItem, totalItemCount) {
            if (currentItem === 1) {
                slider.find('.left.carousel-control .prev').html(totalItemCount);
                slider.find('.right.carousel-control .next').html(currentItem + 1);
            } else if (currentItem == totalItemCount) {
                slider.find('.left.carousel-control .prev').html(currentItem - 1);
                slider.find('.right.carousel-control .next').html(1);
            } else {
                slider.find('.left.carousel-control .prev').html(currentItem - 1);
                slider.find('.right.carousel-control .next').html(currentItem + 1);
            }
        };

        /**
         * Set video background size
         * @param slider, current slider
         */
        var initVideoBackgroundSize = function (slider) {
            var min_w = 1500; // minimum video width allowed
            var video_width_original = 1920;  // original video dimensions
            var video_height_original = 1080;
            var vid_ratio = 1920 / 1080;

            slider.find('.item .edgt-video .edgt-video-wrap').each(function () {

                var slideWidth = edgt.windowWidth;
                var slideHeight = $(this).closest('.carousel').height();

                $(this).width(slideWidth);

                min_w = vid_ratio * (slideHeight + 20);
                $(this).height(slideHeight);

                var scale_h = slideWidth / video_width_original;
                var scale_v = (slideHeight - edgtGlobalVars.vars.edgtMenuAreaHeight) / video_height_original;
                var scale = scale_v;
                if (scale_h > scale_v)
                    scale = scale_h;
                if (scale * video_width_original < min_w) {
                    scale = min_w / video_width_original;
                }

                $(this).find('video, .mejs-overlay, .mejs-poster').width(Math.ceil(scale * video_width_original + 2));
                $(this).find('video, .mejs-overlay, .mejs-poster').height(Math.ceil(scale * video_height_original + 2));
                $(this).scrollLeft(($(this).find('video').width() - slideWidth) / 2);
                $(this).find('.mejs-overlay, .mejs-poster').scrollTop(($(this).find('video').height() - slideHeight) / 2);
                $(this).scrollTop(($(this).find('video').height() - slideHeight) / 2);
            });
        };

        /**
         * Init video background
         * @param slider, current slider
         */
        var initVideoBackground = function (slider) {
            $('.item .edgt-video-wrap .video').mediaelementplayer({
                enableKeyboard: false,
                iPadUseNativeControls: false,
                pauseOtherPlayers: false,
                // force iPhone's native controls
                iPhoneUseNativeControls: false,
                // force Android's native controls
                AndroidUseNativeControls: false
            });

            $(window).resize(function () {
                initVideoBackgroundSize(slider);
            });

            //mobile check
            if (navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)) {
                $('.edgt-slider .edgt-mobile-video-image').show();
                $('.edgt-slider .edgt-video-wrap').remove();
            }
        };

        /**
         * initiate slider
         * @param slider, current slider
         * @param currentItem, current slide item index
         * @param totalItemCount, total number of slide items
         * @param slideAnimationTimeout, timeout for slide change
         */
        var initiateSlider = function (slider, totalItemCount, slideAnimationTimeout) {

            //set active class on first item
            slider.find('.carousel-inner .item:first-child').addClass('active');
            //check for header style
            edgtCheckSliderForHeaderStyle($('.carousel .active'), slider.hasClass('edgt-header-effect'));
            // setting numbers on carousel controls
            if (slider.hasClass('edgt-slider-numbers')) {
                setPrevNextNumbers(slider, 1, totalItemCount);
            }
            // set video background if there is video slide
            if (slider.find('.item video').length) {
                initVideoBackgroundSize(slider);
                initVideoBackground(slider);
            }

            //init slider
            if (slider.hasClass('edgt-auto-start')) {
                slider.carousel({
                    interval: slideAnimationTimeout,
                    pause: false
                });

                //pause slider when hover slider button
                slider.find('.slide_buttons_holder .qbutton')
                    .mouseenter(function () {
                        slider.carousel('pause');
                    })
                    .mouseleave(function () {
                        slider.carousel('cycle');
                    });
            } else {
                slider.carousel({
                    interval: 0,
                    pause: false
                });
            }


            //initiate image animation
            if ($('.carousel-inner .item:first-child').hasClass('edgt-animate-image') && edgt.windowWidth > 1000) {
                slider.find('.carousel-inner .item.edgt-animate-image:first-child .edgt-image').transformAnimate({
                    transform: "matrix(" + matrixArray[$('.carousel-inner .item:first-child').data('edgt_animate_image')] + ")",
                    duration: 30000
                });
            }
        };

        return {
            init: function () {
                if (sliders.length) {
                    sliders.each(function () {
                        var $this = $(this);
                        var src;
                        var slideAnimationTimeout = $this.data('slide_animation_timeout');
                        var totalItemCount = $this.find('.item').length;
                        if ($this.data('edgt_responsive_breakpoints')) {
                            if ($this.data('edgt_responsive_breakpoints') == 'set2') {
                                responsiveBreakpointSet = [1600, 1300, 1000, 768, 567, 320];
                            }
                        }
                        coefficientsGraphicArray = $this.data('edgt_responsive_graphic_coefficients').split(',');
                        coefficientsTitleArray = $this.data('edgt_responsive_title_coefficients').split(',');
                        coefficientsSubtitleArray = $this.data('edgt_responsive_subtitle_coefficients').split(',');
                        coefficientsTextArray = $this.data('edgt_responsive_text_coefficients').split(',');
                        coefficientsButtonArray = $this.data('edgt_responsive_button_coefficients').split(',');

                        setSliderElementsResponsiveCoeffeicients(responsiveBreakpointSet, coefficientsGraphicArray, coefficientsTitleArray, coefficientsSubtitleArray, coefficientsTextArray, coefficientsButtonArray);

                        setHeights($this);

                        /*** wait until first video or image is loaded and than initiate slider - start ***/
                        var backImg;

                        if (edgt.htmlEl.hasClass('touch')) {
                            if ($this.find('.item:first-child .edgt-mobile-video-image').length > 0) {
                                src = imageRegex.exec($this.find('.item:first-child .edgt-mobile-video-image').attr('style'));
                            } else {
                                src = imageRegex.exec($this.find('.item:first-child .edgt-image').attr('style'));
                            }
                            if (src) {
                                backImg = new Image();
                                backImg.src = src[1];
                                $(backImg).load(function () {
                                    $('.edgt-slider-preloader').fadeOut(500);
                                    initiateSlider($this, totalItemCount, slideAnimationTimeout);
                                });
                            }
                        } else {
                            if ($this.find('.item:first-child video').length > 0) {
                                $this.find('.item:first-child video').get(0).addEventListener('loadeddata', function () {
                                    $('.edgt-slider-preloader').fadeOut(500);
                                    initiateSlider($this, totalItemCount, slideAnimationTimeout);
                                });
                            } else {
                                src = imageRegex.exec($this.find('.item:first-child .edgt-image').attr('style'));
                                if (src) {
                                    backImg = new Image();
                                    backImg.src = src[1];
                                    $(backImg).load(function () {
                                        $('.edgt-slider-preloader').fadeOut(500);
                                        initiateSlider($this, totalItemCount, slideAnimationTimeout);
                                    });
                                }
                            }
                        }
                        /*** wait until first video or image is loaded and than initiate slider - end ***/

                        /* before slide transition - start */
                        $this.on('slide.bs.carousel', function () {
                            $this.addClass('edgt-in-progress');
                            $this.find('.active .edgt-slider-content-outer').fadeTo(250, 0);
                        });
                        /* before slide transition - end */

                        /* after slide transition - start */
                        $this.on('slid.bs.carousel', function () {
                            $this.removeClass('edgt-in-progress');
                            $this.find('.active .edgt-slider-content-outer').fadeTo(0, 1);

                            // setting numbers on carousel controls
                            if ($this.hasClass('edgt-slider-numbers')) {
                                var currentItem = $('.item').index($('.item.active')[0]) + 1;
                                setPrevNextNumbers($this, currentItem, totalItemCount);
                            }

                            // initiate image animation on active slide and reset all others
                            $('.item.edgt-animate-image .edgt-image').stop().css({
                                'transform': '',
                                '-webkit-transform': ''
                            });
                            if ($('.item.active').hasClass('edgt-animate-image') && edgt.windowWidth > 1000) {
                                $('.item.edgt-animate-image.active .edgt-image').transformAnimate({
                                    transform: "matrix(" + matrixArray[$('.item.edgt-animate-image.active').data('edgt_animate_image')] + ")",
                                    duration: 30000
                                });
                            }
                        });
                        /* after slide transition - end */

                        /* swipe functionality - start */
                        $this.swipe({
                            swipeLeft: function () {
                                $this.carousel('next');
                            },
                            swipeRight: function () {
                                $this.carousel('prev');
                            },
                            threshold: 20
                        });
                        /* swipe functionality - end */

                    });

                    //adding parallax functionality on slider
                    if ($('.no-touch .carousel').length) {
                        var skrollr_slider = skrollr.init({
                            smoothScrolling: false,
                            forceHeight: false
                        });
                        skrollr_slider.refresh();
                    }

                    $(window).scroll(function () {
                        //set control class for slider in order to change header style
                        if ($('.edgt-slider .carousel').height() < edgt.scroll) {
                            $('.edgt-slider .carousel').addClass('edgt-disable-slider-header-style-changing');
                        } else {
                            $('.edgt-slider .carousel').removeClass('edgt-disable-slider-header-style-changing');
                            edgtCheckSliderForHeaderStyle($('.edgt-slider .carousel .active'), $('.edgt-slider .carousel').hasClass('edgt-header-effect'));
                        }

                        //hide slider when it is out of viewport
                        if ($('.edgt-slider .carousel').hasClass('edgt-full-screen') && edgt.scroll > edgt.windowHeight && edgt.windowWidth > 1000) {
                            $('.edgt-slider .carousel').find('.carousel-inner, .carousel-indicators').hide();
                        } else if (!$('.edgt-slider .carousel').hasClass('edgt-full-screen') && edgt.scroll > $('.edgt-slider .carousel').height() && edgt.windowWidth > 1000) {
                            $('.edgt-slider .carousel').find('.carousel-inner, .carousel-indicators').hide();
                        } else {
                            $('.edgt-slider .carousel').find('.carousel-inner, .carousel-indicators').show();
                        }
                    });
                }
            }
        };
    };

    /**
     * Check if slide effect on header style changing
     * @param slide, current slide
     * @param headerEffect, flag if slide
     */

    function edgtCheckSliderForHeaderStyle(slide, headerEffect) {

        if ($('.edgt-slider .carousel').not('.edgt-disable-slider-header-style-changing').length > 0) {

            var slideHeaderStyle = "";
            if (slide.hasClass('light')) {
                slideHeaderStyle = 'edgt-light-header';
            }
            if (slide.hasClass('dark')) {
                slideHeaderStyle = 'edgt-dark-header';
            }

            if (slideHeaderStyle !== "") {
                if (headerEffect) {
                    edgt.body.removeClass('edgt-dark-header edgt-light-header').addClass(slideHeaderStyle);
                }
            } else {
                if (headerEffect) {
                    edgt.body.removeClass('edgt-dark-header edgt-light-header').addClass(edgt.defaultHeaderStyle);
                }

            }
        }
    }

    function edgtProcess() {
        var processes = $('.edgt-process-holder');

        var processAnimation = function (process) {
            if (!edgt.body.hasClass('edgt-no-animations-on-touch')) {
                var items = process.find('.edgt-process-item-holder');
                var background = process.find('.edgt-process-bg-holder');

                process.appear(function () {
                    $(this).addClass('appeared');

                    process.find(".edgt-process-item-holder").each(function (i) {
                        var thisProcess = $(this);

                        setTimeout(function () {
                            thisProcess.addClass("item-appeared");
                        }, i * 250);
                    });

                }, {accX: 0, accY: edgtGlobalVars.vars.edgtElementAppearAmount});
            }
        };

        return {
            init: function () {
                if (processes.length) {
                    processes.each(function () {
                        processAnimation($(this));
                    });
                }
            }
        };
    }

    function edgtComparisonPricingTables() {
        var pricingTablesHolder = $('.edgt-comparision-pricing-tables-holder');

        var alterPricingTableColumn = function (holder) {
            var featuresHolder = holder.find('.edgt-cpt-features-item');
            var pricingTables = holder.find('.edgt-comparision-table-holder');

            if (pricingTables.length) {
                pricingTables.each(function () {
                    var currentPricingTable = $(this);
                    var pricingItems = currentPricingTable.find('.edgt-cpt-table-content li');

                    if (pricingItems.length) {
                        pricingItems.each(function (i) {
                            var pricingItemFeature = featuresHolder[i];
                            var pricingItem = this;
                            var pricingItemContent = pricingItem.innerHTML;

                            if (typeof pricingItemFeature !== 'undefined') {
                                pricingItem.innerHTML = '<span class="edgt-cpt-table-item-feature">' + $(pricingItemFeature).text() + ': </span>' + pricingItemContent;
                            }
                        });
                    }
                });
            }
        };

        return {
            init: function () {
                if (pricingTablesHolder.length) {
                    pricingTablesHolder.each(function () {
                        alterPricingTableColumn($(this));
                    });
                }
            }
        };
    }

    function edgtResizeBlogSlider(slider) {
        if (slider !== undefined && slider.hasClass('masonry')) {
            var slides = slider.find('article');
            var sliderHeight = slider.find('.slick-track').height();

            if (slides.length) {
                slides.each(function () {
                    var thisSlide = $(this);
                    var setHeight = sliderHeight - $(this).find('.edgt-post-info').outerHeight();

                    if (thisSlide.hasClass('format-link') || thisSlide.hasClass('format-quote')) {
                        thisSlide.find('.edgt-post-text-inner').css('height', setHeight);
                    }
                    else {
                        thisSlide.find('.edgt-post-text-inner').css('height', setHeight - $(this).find('.edgt-post-image').outerHeight());
                    }
                });

                $(window).resize(function () {
                    if (this.resizeTO) clearTimeout(this.resizeTO);
                    this.resizeTO = setTimeout(function () {
                        $(this).trigger('resizeEnd');
                    }, 500);
                });

                $(window).on('resizeEnd', function () {
                    slides.each(function () {
                        $(this).find('.edgt-post-text-inner').css('height', 'auto');
                    });

                    sliderHeight = slider.find('.slick-track').height();

                    slides.each(function () {
                        var thisSlide = $(this);
                        var setHeight = sliderHeight - $(this).find('.edgt-post-info').outerHeight();

                        if (thisSlide.hasClass('format-link') || thisSlide.hasClass('format-quote')) {
                            thisSlide.find('.edgt-post-text-inner').css('height', setHeight);
                        }
                        else {
                            thisSlide.find('.edgt-post-text-inner').css('height', setHeight - $(this).find('.edgt-post-image').outerHeight());
                        }
                    });

                });
            }
        }
    }

    function edgtBlogSlider() {
        var blogSliders = $('.edgt-blog-slider-holder');

        if (blogSliders.length) {
            blogSliders.each(function () {
                var thisSlider = $(this);

                var dots = typeof thisSlider.data('dots') !== 'undefined' && thisSlider.data('dots') === 'yes';
                if (dots) {
                    thisSlider.addClass('slick-dots');
                }

                thisSlider.on('init', function () {

                    // change default opacity on init
                    thisSlider.waitForImages(function () {
                        setTimeout(edgtResizeBlogSlider(thisSlider), 400);
                    });
                    thisSlider.addClass('appeared');
                }).slick({
                    dots: dots,
                    arrows: false,
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: false,
                    responsive: [
                        {
                            breakpoint: 1025,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
                            }
                        },
                        {
                            breakpoint: 769,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
            });
        }
    }

    function edgtTeamSlider() {
        var teamSliders = $('.edgt-team-slider');

        if (teamSliders.length) {
            teamSliders.each(function () {


                var thisSlider = $(this);

                var dots = (thisSlider.data('dots') == 'yes');

                if (dots) {
                    thisSlider.addClass('slick-dots');
                }

                var numberOfItems = thisSlider.data('number_of_items');

                thisSlider.on('init', function () {

                    // change default opacity on init
                    thisSlider.addClass('appeared');
                }).slick({
                    infinite: true,
                    autoplay: true,
                    autoplaySpeed: 3000,
                    cssEase: 'cubic-bezier(.38,.76,0,.87)',
                    dots: dots,
                    arrows: false,
                    slidesToScroll: 1,
                    slidesToShow: numberOfItems,
                    responsive: [
                        {
                            breakpoint: 1025,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3
                            }
                        },
                        {
                            breakpoint: 769,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
                            }
                        },
                        {
                            breakpoint: 601,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]

                });
            });
        }
    }

    function edgtCardSlider() {
        var cardSliders = $('.edgt-card-slider');

        if (cardSliders.length) {
            cardSliders.each(function () {


                var thisSlider = $(this);

                var dots = (thisSlider.data('dots') == 'yes');

                if (dots) {
                    thisSlider.addClass('slick-dots');
                }

                var numberOfItems = thisSlider.data('number_of_items');

                thisSlider.on('init', function () {

                    // change default opacity on init
                    thisSlider.addClass('appeared');
                }).slick({
                    dots: dots,
                    arrows: false,
                    slidesToScroll: numberOfItems,
                    slidesToShow: numberOfItems,
                    responsive: [
                        {
                            breakpoint: 1281,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3
                            }
                        },
                        {
                            breakpoint: 1025,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
                            }
                        },
                        {
                            breakpoint: 769,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]

                });
            });
        }
    }

    function emptySpaceResponsive() {
        var emptySpaces = $('.vc_empty_space');

        var sizes = {
            'large_laptop': 1559,
            'laptop': 1279,
            'tablet_landscape': 1023,
            'tablet_portrait': 767,
            'phone_landscape': 599,
            'phone_portrait': 479
        };

        var sizeValues = function () {
            var values = [];
            for (var size in sizes) {
                values.push(sizes[size]);
            }

            return values;
        }();

        var getHeights = function (emptySpace) {
            var heights = {};

            for (var size in sizes) {
                var dataValue = emptySpace.data(size);
                if (typeof dataValue !== 'undefined' && dataValue !== '') {
                    heights[size] = dataValue;
                }
            }

            return heights;
        };

        var usedSizes = function (emptySpace) {
            var usedSizes = [];

            for (var size in sizes) {
                var dataValue = emptySpace.data(size);
                if (typeof dataValue !== 'undefined' && dataValue !== '') {
                    usedSizes.push(sizes[size]);
                }
            }

            return usedSizes;
        };

        var resizeEmptySpace = function (heights, emptySpace) {
            if (typeof heights !== 'undefined') {
                var originalHeight = emptySpace.data('original-height');
                var sizeValues = usedSizes(emptySpace);
                var heightestSize = Math.max.apply(null, sizeValues);

                for (var size in sizes) {
                    if (edgt.windowWidth <= sizes[size]) {
                        emptySpace.height(heights[size]);
                    } else if (edgt.windowWidth > heightestSize) {
                        emptySpace.height(originalHeight);
                    }
                }
            }
        };

        return {
            init: function () {
                if (emptySpaces.length) {
                    emptySpaces.each(function () {
                        var heights = getHeights($(this));

                        resizeEmptySpace(heights, $(this));

                        var thisEmptySpace = $(this);

                        $(window).resize(function () {
                            resizeEmptySpace(heights, thisEmptySpace);
                        });
                    });
                }
            }
        };
    }

    /*
     **	Vertical Split Slider
     */
    function edgtInitVerticalSplitSlider() {

        if (edgt.body.hasClass('edgt-vertical-split-screen-initialized')) {
            edgt.body.removeClass('edgt-vertical-split-screen-initialized');
            $.fn.multiscroll.destroy();
        }

        var defaultHeaderStyle = '';
        if (edgt.body.hasClass('edgt-light-header')) {
            defaultHeaderStyle = 'light';
        } else if (edgt.body.hasClass('edgt-dark-header')) {
            defaultHeaderStyle = 'dark';
        }

        if ($('.edgt-vertical-split-slider').length) {
            var slider = $('.edgt-vertical-split-slider');

            slider.height(edgt.windowHeight).animate({opacity: 1}, 300);
            slider.multiscroll({
                scrollingSpeed: 700,
                easing: 'easeInOutQuart',
                navigation: true,
                useAnchorsOnLoad: false,
                sectionSelector: '.edgt-vss-ms-section',
                leftSelector: '.edgt-vss-ms-left',
                rightSelector: '.edgt-vss-ms-right',
                afterRender: function () {
                    edgtCheckVerticalSplitSectionsForHeaderStyle($('.edgt-vss-ms-right .edgt-vss-ms-section:last-child').data('header-style'), defaultHeaderStyle);
                    edgt.body.addClass('edgt-vertical-split-screen-initialized');
                    var contactForm7 = $('div.wpcf7 > form');
                        if(contactForm7.length) {
                          contactForm7.each(function(){
                           var thisForm = $(this);
                           
                           thisForm.find('.wpcf7-submit').off().on('click', function(e){
                            e.preventDefault();
                            wpcf7.submit(thisForm);
                           });
                          });
                        } // this function need to be initialized after initVerticalSplitSlide

                    //prepare html for smaller screens - start //
                    var verticalSplitSliderResponsive = $("<div class='edgt-vertical-split-slider-responsive' />");
                    slider.after(verticalSplitSliderResponsive);
                    var leftSide = $('.edgt-vertical-split-slider .edgt-vss-ms-left > div');
                    var rightSide = $('.edgt-vertical-split-slider .edgt-vss-ms-right > div');

                    for (var i = 0; i < leftSide.length; i++) {
                        verticalSplitSliderResponsive.append($(leftSide[i]).clone(true));
                        verticalSplitSliderResponsive.append($(rightSide[leftSide.length - 1 - i]).clone(true));
                    }

                    //prepare google maps clones
                    if ($('.edgt-vertical-split-slider-responsive .edgt-google-map').length) {
                        $('.edgt-vertical-split-slider-responsive .edgt-google-map').each(function () {
                            var map = $(this);
                            map.empty();
                            var num = Math.floor((Math.random() * 100000) + 1);
                            map.attr('id', 'edgt-map-' + num);
                            map.data('unique-id', num);
                        });
                    }

                    edgtButton().init();
                    edgtInitPortfolioListMasonry();
                    edgtInitPortfolioListPinterest();
                    edgtInitPortfolio();
                    edgtShowGoogleMap();
                    edgtInitProgressBars();
                },

                onLeave: function (index, nextIndex, direction) {

                    $("#multiscroll-nav").removeClass("direction-up direction-down").addClass("direction-" + direction);
                    edgtInitProgressBars();
                    edgtCheckVerticalSplitSectionsForHeaderStyle($($('.edgt-vss-ms-right .edgt-vss-ms-section')[$(".edgt-vss-ms-right .edgt-vss-ms-section").length - nextIndex]).data('header-style'), defaultHeaderStyle);
                }
            });

            if (edgt.windowWidth <= 1024) {
                $.fn.multiscroll.destroy();
            } else {
                $.fn.multiscroll.build();
            }

            $(window).resize(function () {
                if (edgt.windowWidth <= 1024) {
                    $.fn.multiscroll.destroy();
                } else {
                    $.fn.multiscroll.build();
                }

            });
        }
    }

    /*
     **	Check slides on load and slide change for header style changing
     */
    function edgtCheckVerticalSplitSectionsForHeaderStyle(section_header_style, default_header_style) {

        if (section_header_style != undefined && section_header_style != '') {
            edgt.body.removeClass('edgt-light-header edgt-dark-header').addClass('edgt-' + section_header_style + '-header');
        } else if (default_header_style != '') {
            edgt.body.removeClass('edgt-light-header edgt-dark-header').addClass('edgt-' + default_header_style + '-header');
        } else {
            edgt.body.removeClass('edgt-light-header edgt-dark-header');
        }
    }

    function edgtInitMiniTextSlider() {
        var sliders = $('.edgt-mini-text-slider');

        if (sliders.length) {
            sliders.each(function () {
                var mts = $(this).find('.edgt-mts-inner');
                mts.owlCarousel({
                    singleItem: true,
                    autoPlay: 4000,
                    navigation: true,
                    autoHeight: false,
                    pagination: false,
                    slideSpeed: 450,
                    stopOnHover: true,
                    transitionStyle: 'backSlide', //fade, fadeUp, backSlide, goDown
                    navigationText: [
                        '<span class="edgt-prev-icon"><span class="arrow_carrot-left"></span></span>',
                        '<span class="edgt-next-icon"><span class="arrow_carrot-right"></span></span>'
                    ],
                    afterInit: function () {
                        mts.css('visibility', 'visible');
                    }
                });
            });
        }
    }

    /*
     **	Init product list Masonry type
     */
    function edgtInitProductListMasonry() {
        var productList = $('.edgt-pl-holder.woocommerce.masonry');
        if (productList.length) {
            productList.each(function () {
                var thisProductList = $(this).children('.edgt-pl-outer');


                edgtResizeProductMasonry(thisProductList);
                edgtInitProductMasonry(thisProductList);

                $(window).resize(function () {
                    edgtResizeProductMasonry(thisProductList);
                    edgtInitProductMasonry(thisProductList);
                });
            });
        }
    }


    /*
     **	Init product list Lookbook Masonry type
     */
    function edgtInitProductListLookbookMasonry() {
        var productList = $('.edgt-pl-holder.woocommerce.lookbook-masonry');
        if (productList.length) {
            productList.each(function () {
                var thisProductList = $(this).children('.edgt-pl-outer');


                edgtResizeProductMasonry(thisProductList);
                edgtInitProductMasonry(thisProductList);

                $(window).resize(function () {
                    edgtResizeProductMasonry(thisProductList);
                    edgtInitProductMasonry(thisProductList);
                });
            });
        }
    }

    function edgtInitProductMasonry(container) {
        container.animate({opacity: 1});
        container.waitForImages(function () {
            container.isotope({
                itemSelector: '.edgt-pl-item',
                resizable: false,
                layoutMode: 'packery',
                packery: {
                    columnWidth: '.edgt-product-list-masonry-grid-sizer'
                }
            });
            container.addClass('edgt-appeared');
        });
    }

    function edgtResizeProductMasonry(container) {

        var size = container.find('.edgt-product-list-masonry-grid-sizer').width() * 1.25;

        var defaultMasonryItem = container.find('.eldritch_edge_square');
        var largeWidthMasonryItem = container.find('.eldritch_edge_large_width');
        var largeHeightMasonryItem = container.find('.eldritch_edge_large_height');
        var largeWidthHeightMasonryItem = container.find('.eldritch_edge_large_width_height');

        defaultMasonryItem.css('height', size);

        if (edgt.windowWidth > 600) {
            largeWidthHeightMasonryItem.css('height', Math.round(2 * size));
            largeHeightMasonryItem.css('height', Math.round(2 * size));
            largeWidthMasonryItem.css('height', size);
        } else {
            largeWidthHeightMasonryItem.css('height', size);
            largeHeightMasonryItem.css('height', size);
        }
    }


    function edgtTiltHoverEffect() {
        var tiltElements = $('.edgt-hover-tilt');

        if (tiltElements.length && !$('html').hasClass('touch')) {
            tiltElements.each(function () {
                var tiltElement = $(this),
                    imageWrappers = tiltElement.find('.edgt-ptf-item-image-holder'),
                    maxMove = 10, //maximum movement in px
                    move = 0, //move
                    w,
                    h,
                    topOffset,
                    leftOffset,
                    xPos,
                    yPos,
                    xShift,
                    yShift,
                    pause,
                    pauseFlag = true;

                //tilt set
                imageWrappers.mouseenter(function () {
                    var currentWrapper = $(this);

                    w = currentWrapper.outerWidth();
                    h = currentWrapper.outerHeight();
                    topOffset = currentWrapper.offset().top;
                    leftOffset = currentWrapper.offset().left;
                    xPos = 0;
                    yPos = 0;

                    currentWrapper.css('transform', 'translate3d(0,0,0) scale(1.03)');

                    pause = setTimeout(function () {
                        pauseFlag = false;
                    }, 200); //wait for image to be zoomed in

                    currentWrapper.mousemove(function (event) {
                        if (pauseFlag) {
                            event.stopPropagation();
                        }
                        else {
                            currentWrapper.css('transition', 'none');

                            xPos = event.pageX - leftOffset;
                            yPos = event.pageY - topOffset;
                            xShift = ((w / 2 - xPos) / w * 2) * move;
                            yShift = ((h / 2 - yPos) / h * 2) * move;

                            var transformOffset = "translate3d(" + xShift + "px, " + yShift + "px, 0) scale(1.03)";

                            currentWrapper.css('transform', transformOffset);

                            if (move < maxMove) {
                                move += 0.3; //increment slowly to its final value to avoid flicker on first move
                            }
                        }
                    });

                });

                //tilt reset
                imageWrappers.mouseleave(function () {
                    clearTimeout(pause);
                    move = 0;
                    pauseFlag = true;

                    var currentWrapper = $(this);
                    currentWrapper.css('transition', 'all .2s');
                    currentWrapper.css('transform', 'translate3d(0,0,0) scale(1)');
                });
            });
        }
    }

    /*
     **	Elements Holder responsive style
     */
    function edgtInitElementsHolderResponsiveStyle() {

        var elementsHolder = $('.edgt-elements-holder');

        if (elementsHolder.length) {
            elementsHolder.each(function () {
                var thisElementsHolder = $(this),
                    elementsHolderItem = thisElementsHolder.children('.edgt-elements-holder-item'),
                    style = '',
                    responsiveStyle = '';

                elementsHolderItem.each(function () {
                    var thisItem = $(this),
                        itemClass = '',
                        largeLaptop = '',
                        smallLaptop = '',
                        ipadLandscape = '',
                        ipadPortrait = '',
                        mobileLandscape = '',
                        mobilePortrait = '';


                    if (typeof thisItem.data('item-class') !== 'undefined' && thisItem.data('item-class') !== false) {
                        itemClass = thisItem.data('item-class');
                    }
                    if (typeof thisItem.data('1280-1440') !== 'undefined' && thisItem.data('1280-1440') !== false) {
                        largeLaptop = thisItem.data('1280-1440');
                    }
                    if (typeof thisItem.data('1024-1280') !== 'undefined' && thisItem.data('1024-1280') !== false) {
                        smallLaptop = thisItem.data('1024-1280');
                    }
                    if (typeof thisItem.data('768-1024') !== 'undefined' && thisItem.data('768-1024') !== false) {
                        ipadLandscape = thisItem.data('768-1024');
                    }
                    if (typeof thisItem.data('600-768') !== 'undefined' && thisItem.data('600-768') !== false) {
                        ipadPortrait = thisItem.data('600-768');
                    }
                    if (typeof thisItem.data('480-600') !== 'undefined' && thisItem.data('480-600') !== false) {
                        mobileLandscape = thisItem.data('480-600');
                    }
                    if (typeof thisItem.data('480') !== 'undefined' && thisItem.data('480') !== false) {
                        mobilePortrait = thisItem.data('480');
                    }

                    if (largeLaptop.length || smallLaptop.length || ipadLandscape.length || ipadPortrait.length || mobileLandscape.length || mobilePortrait.length) {

                        if (largeLaptop.length) {
                            responsiveStyle += "@media only screen and (min-width: 1280px) and (max-width: 1440px) {.edgt-elements-holder-item-content." + itemClass + " { padding: " + largeLaptop + " !important; } }";
                        }
                        if (smallLaptop.length) {
                            responsiveStyle += "@media only screen and (min-width: 1024px) and (max-width: 1280px) {.edgt-elements-holder-item-content." + itemClass + " { padding: " + smallLaptop + " !important; } }";
                        }
                        if (ipadLandscape.length) {
                            responsiveStyle += "@media only screen and (min-width: 768px) and (max-width: 1024px) {.edgt-elements-holder-item-content." + itemClass + " { padding: " + ipadLandscape + " !important; } }";
                        }
                        if (ipadPortrait.length) {
                            responsiveStyle += "@media only screen and (min-width: 600px) and (max-width: 768px) {.edgt-elements-holder-item-content." + itemClass + " { padding: " + ipadPortrait + " !important; } }";
                        }
                        if (mobileLandscape.length) {
                            responsiveStyle += "@media only screen and (min-width: 480px) and (max-width: 600px) {.edgt-elements-holder-item-content." + itemClass + " { padding: " + mobileLandscape + " !important; } }";
                        }
                        if (mobilePortrait.length) {
                            responsiveStyle += "@media only screen and (max-width: 480px) {.edgt-elements-holder-item-content." + itemClass + " { padding: " + mobilePortrait + " !important; } }";
                        }
                    }
                });

                if (responsiveStyle.length) {
                    style = '<style type="text/css" data-type="connect_edge_modules_shortcodes_eh_custom_css">' + responsiveStyle + '</style>';
                }

                if (style.length) {
                    $('head').append(style);
                }
            });
        }
    }

    /*
     **	Background Slider
     */
    function edgtInitBackgroundSlider() {

        var backgroundSliders = $('.edgt-bckg-slider');

        if (backgroundSliders.length) {
            backgroundSliders.each(function () {


                var thisSlider = $(this);

                thisSlider.on('init', function () {

                    // change default opacity on init
                    thisSlider.addClass('appeared');
                }).slick({
                    dots: false,
                    arrows: true,
                    slidesToScroll: 1,
                    slidesToShow: 1
                });
            });
        }

    }


    /*
     * Unordered List animation
     */
    function edgtInitUnorderedList() {
        var unorderedLists = $('.edgt-unordered-list.edgt-animate-list');

        if (unorderedLists.length && !edgt.htmlEl.hasClass('touch')) {
            unorderedLists.appear(function () {
                var unorderedList = $(this),
                    listItems = unorderedList.find('li');

                listItems.each(function (i) {
                    var listItem = $(this);

                    setTimeout(function () {
                        listItem.addClass('edgt-list-item-appeared');
                    }, i * 150);
                });
            }, {accX: 0, accY: edgtGlobalVars.vars.edgtElementAppearAmount});
        }
    }


    /*
     * Icon With Text Shortcode animation
     */
    function edgtInitIWTShortcode() {
        var iwtShortcodes = $('.edgt-iwt.edgt-iwt-loading-animation');

        if (iwtShortcodes.length && !edgt.htmlEl.hasClass('touch')) {
            iwtShortcodes.appear(function () {
                var iwtShortcode = $(this),
                    delay = parseInt(iwtShortcode.data('loading-animation-delay'));

                if (!delay > 0) {
                    delay = 0;
                }

                setTimeout(function () {
                    iwtShortcode.addClass('edgt-iwt-item-appeared');
                }, delay);
            }, {accX: 0, accY: edgtGlobalVars.vars.edgtElementAppearAmount});
        }
    }
})
(jQuery);
(function ($) {
	'use strict';

	var woocommerce = {};
	edgt.modules.woocommerce = woocommerce;

	woocommerce.edgtInitQuantityButtons = edgtInitQuantityButtons;
	woocommerce.edgtInitSelect2 = edgtInitSelect2;

	woocommerce.edgtOnDocumentReady = edgtOnDocumentReady;
	woocommerce.edgtOnWindowLoad = edgtOnWindowLoad;
	woocommerce.edgtOnWindowResize = edgtOnWindowResize;

	woocommerce.edgtProductImagesMinHeight = edgtProductImagesMinHeight;

	$(document).ready(edgtOnDocumentReady);
	$(window).load(edgtOnWindowLoad);
	$(window).resize(edgtOnWindowResize);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtOnDocumentReady() {
		edgtInitQuantityButtons();
		edgtInitButtonLoading();
		edgtInitSelect2();
		edgtProductImagesMinHeight();
		edgtInitSingleProductLightbox();
	}

	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	function edgtOnWindowLoad() {

	}

	/*
	 All functions to be called on $(window).resize() should be in this function
	 */
	function edgtOnWindowResize() {
		edgtProductImagesMinHeight();
	}

	function edgtInitQuantityButtons() {
		$(document).on('click', '.edgt-quantity-minus, .edgt-quantity-plus', function (e) {
			e.stopPropagation();

			var button = $(this),
				inputField = button.siblings('.edgt-quantity-input'),
				step = parseFloat(inputField.attr('step')),
				max = parseFloat(inputField.attr('max')),
				minus = false,
				inputValue = parseFloat(inputField.val()),
				newInputValue;

			if (button.hasClass('edgt-quantity-minus')) {
				minus = true;
			}

			if (minus) {
				newInputValue = inputValue - step;
				if (newInputValue >= 1) {
					inputField.val(newInputValue);
				} else {
					inputField.val(0);
				}
			} else {
				newInputValue = inputValue + step;
				if (max === undefined) {
					inputField.val(newInputValue);
				} else {
					if (newInputValue >= max) {
						inputField.val(max);
					} else {
						inputField.val(newInputValue);
					}
				}
			}

			inputField.trigger('change');
		});
	}

	function edgtInitButtonLoading() {

        $(".add_to_cart_button").on('click', function(){
        	console.log("fqewfewfefewf");
            $(this).text(edgtGlobalVars.vars.edgtAddingToCart);
        });

    }

	/*
	 ** Init select2 script for select html dropdowns
	 */
	function edgtInitSelect2() {
		var orderByDropDown = $('.woocommerce-ordering .orderby');
		if (orderByDropDown.length) {
			orderByDropDown.select2({
				minimumResultsForSearch: Infinity
			});
		}

		var shippingCountryCalc = $('#calc_shipping_country');
		if (shippingCountryCalc.length) {
			shippingCountryCalc.select2();
		}

		var shippingStateCalc = $('.cart-collaterals .shipping select#calc_shipping_state');
		if (shippingStateCalc.length) {
			shippingStateCalc.select2();
		}

		var variableProducts = $('.edgt-single-product-content .variations select');
		if (variableProducts.length) {
			variableProducts.select2();
		}
	}

	/* calculate product images section min height because of absolute position */
	function edgtProductImagesMinHeight() {
		var hh = $('.edgt-woo-single-page .product .images .woocommerce-product-gallery__image:first-child').height();
		$('.edgt-woo-single-page .product .images').css({'min-height': hh});

		//woocommerce 3.0
		$('.edgt-woo-single-page .product .images figure').css({'min-height': hh});
	}

	/*
	 ** Init Product Single Pretty Photo attributes
	 */
	function edgtInitSingleProductLightbox() {
		var item = $('.edgt-woo-single-page.edgt-woo-single-has-pretty-photo .images .woocommerce-product-gallery__image');

		if(item.length) {
			item.children('a').attr('data-rel', 'prettyPhoto[woo_single_pretty_photo]');

			if (typeof edgt.modules.common.edgtPrettyPhoto === "function") {
				edgt.modules.common.edgtPrettyPhoto();
			}
		}
	}

})(jQuery);
(function ($) {
	'use strict';

	var portfolio = {};
	edgt.modules.portfolio = portfolio;

	portfolio.edgtOnDocumentReady = edgtOnDocumentReady;
	portfolio.edgtOnWindowLoad = edgtOnWindowLoad;
	portfolio.edgtOnWindowResize = edgtOnWindowResize;
	portfolio.edgtOnWindowScroll = edgtOnWindowScroll;

	$(document).ready(edgtOnDocumentReady);
	$(window).load(edgtOnWindowLoad);
	$(window).resize(edgtOnWindowResize);
	$(window).scroll(edgtOnWindowScroll);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtOnDocumentReady() {
		portfolio.edgtPortfolioSlider();
        edgtPortfolioHorizontalScroll();
        edgtInitPortfolioHorizontallyScrollingWidth();
        edgtInitPortfolioHorizontallyScrollingParallax();
	}

	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	function edgtOnWindowLoad() {
		edgtPortfolioSingleFollow().init();
	}

	/*
	 All functions to be called on $(window).resize() should be in this function
	 */
	function edgtOnWindowResize() {

	}

	/*
	 All functions to be called on $(window).scroll() should be in this function
	 */
	function edgtOnWindowScroll() {

	}

	portfolio.edgtPortfolioSlider = function () {
		var sliders = $('.edgt-portfolio-slider-holder');

		var setPortfolioResponsiveOptions = function (slider, options) {
			var columns = slider.data('columns');
			if (typeof columns === 'number') {
				options.slidesToShow = columns;
				options.slidesToScroll = columns;
				options.arrows = false;
			}
		};

		if (sliders.length) {
			sliders.each(function () {
				var sliderHolder = $(this).find('.edgt-portfolio-slider-list');
				var options = {};

				options.dots = typeof sliderHolder.data('dots') !== 'undefined' && sliderHolder.data('dots') === 'yes';

				if(options.dots){
					sliderHolder.addClass('slick-dots');
				}

				options.infinite = true;
				options.autoplay = true;

				setPortfolioResponsiveOptions(sliderHolder, options);
                options.responsive = [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
							slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
							slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
							slidesToScroll: 1
                        }
                    }
                ];

                sliderHolder.on('init', function(){
                	$(this).css('visibility','visible');
                });

				sliderHolder.slick(options);
			});
		}
	};


	var edgtPortfolioSingleFollow = function () {

		var info = $('.edgt-follow-portfolio-info .small-images.edgt-portfolio-single-holder .edgt-portfolio-info-holder, ' +
		'.edgt-follow-portfolio-info .small-slider.edgt-portfolio-single-holder .edgt-portfolio-info-holder');

		if (info.length) {
			var infoHolder = info.parent(),
				infoHolderOffset = infoHolder.offset().top,
				infoHolderHeight = infoHolder.height(),
				mediaHolder = $('.edgt-portfolio-media'),
				mediaHolderHeight = mediaHolder.height(),
				header = $('.header-appear, .edgt-fixed-wrapper'),
				headerHeight = (header.length) ? header.height() : 0;
		}

		var infoHolderPosition = function () {

			if (info.length) {

				if (mediaHolderHeight > infoHolderHeight) {
					if (edgt.scroll > infoHolderOffset) {
						info.animate({
							marginTop: (edgt.scroll - (infoHolderOffset) + edgtGlobalVars.vars.edgtAddForAdminBar + headerHeight + 20) //20 px is for styling, spacing between header and info holder
						});
					}
				}

			}
		};

		var recalculateInfoHolderPosition = function () {

			if (info.length) {
				if (mediaHolderHeight > infoHolderHeight) {
					if (edgt.scroll > infoHolderOffset) {

						if (edgt.scroll + headerHeight + edgtGlobalVars.vars.edgtAddForAdminBar + infoHolderHeight + 20 < infoHolderOffset + mediaHolderHeight) {    //20 px is for styling, spacing between header and info holder

							//Calculate header height if header appears
							if ($('.header-appear, .edgt-fixed-wrapper').length) {
								headerHeight = $('.header-appear, .edgt-fixed-wrapper').height();
							}
							info.stop().animate({
								marginTop: (edgt.scroll - (infoHolderOffset) + edgtGlobalVars.vars.edgtAddForAdminBar + headerHeight + 20) //20 px is for styling, spacing between header and info holder
							});
							//Reset header height
							headerHeight = 0;
						}
						else {
							info.stop().animate({
								marginTop: mediaHolderHeight - infoHolderHeight
							});
						}
					} else {
						info.stop().animate({
							marginTop: 0
						});
					}
				}
			}
		};

		return {

			init: function () {
				if (!edgt.modules.common.edgtIsTouchDevice()) {
					infoHolderPosition();
					$(window).scroll(function () {
						recalculateInfoHolderPosition();
					});
				}
			}

		};

	};

    function edgtPortfolioHorizontalScroll() {

        if (edgt.windowWidth > 750) {

            if($('.edgt-horizontally-scrolling-portfolio-list-page').length){

                $('html').addClass('edgt-horizontally-scrolling-html');

                $(window).mousewheel(function (event, delta) {
                    if (Math.abs(delta) >= 20)
                        delta /= 20;


                    event.preventDefault();
                    var curScroll = {
                        x: edgt.modules.common.edgtgetScrollX(),
                        y: edgt.modules.common.edgtgetScrollY()
                    };

                    TweenMax.to(curScroll, 0.5, {
                        x: curScroll.x - (delta * 500),
                        onUpdate: function () {
                            window.scrollTo(curScroll.x, curScroll.y);
                        }
                    });
                });

            }
        }

    }


    function edgtInitPortfolioHorizontallyScrollingWidth(){

        if (edgt.windowWidth  > 750) {
            if($('.edgt-horizontally-scrolling-portfolio-list-holder').length){

                var holders = $('.edgt-horizontally-scrolling-portfolio-list-holder');

                holders.each(function(){
                    var holder = $(this),
                        row = holder.find('.edgt-hspl-images-row:first'),
                        completeWidth = 0;

                    holder.waitForImages(function() {

                        if (edgt.windowWidth  > 1024) {
                            holder.height($('body').height());
                        } else {
                            holder.height($('body').height() - edgtGlobalVars.vars.edgtMobileHeaderHeight);
                        }

                        $('.edgt-hspl-cover-image').width(Math.ceil($('.edgt-wrapper').width()));


                        if($('.edgt-hspl-cover-image').length){

                            completeWidth = completeWidth + $('.edgt-hspl-cover-image').width();
                        }

                        if(row.length) {
                            var rowArticles = row.find('article');

                            var allArticles = holder.find('.edgt-hspl-images-row').find('article');
                            allArticles.each(function(){
                                var article = $(this);
                                article.width(article.find('img').width());

                            });

                            rowArticles.each(function(){
                                var article = $(this);
                                completeWidth = completeWidth + Math.ceil(article.width());
                            });
                        }

                        holder.width(completeWidth); // Bottom Passepartout is same like left and right and beacause of that we use it here instead of right
                        $('.edgt-horizontally-scrolling-portfolio-list-holder').css('opacity', 1);
                    });

                });
            }
        } else {
            $('.edgt-horizontally-scrolling-portfolio-list-holder').css('opacity', 1);
        }
    }

    function edgtInitPortfolioHorizontallyScrollingParallax(){
        if (edgt.windowWidth  > 1024) {
            if($('.edgt-hspl-cover-image').length){
                $('.edgt-hspl-cover-image').each(function() {

                    var parallaxElement = $(this);
                    var speed = 0.3;
                    parallaxElement.verticalParallax('50%', speed);
                });
            }
        }

    }

})(jQuery);
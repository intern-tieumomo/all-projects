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
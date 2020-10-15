/*------------------------------------------------------------------

  Slider Revolution

-------------------------------------------------------------------*/
function initSliderRevolution() {
    if (typeof $.fn.revolution === 'undefined') {
        return;
    }

    const _this = this;
    $('.rs-youplay').each(function () {
        const item = $(this);

        // options
        const rsOptions = {
            dottedOverlay: 'none',
            navigationType: 'bullet',
            navigationArrows: 'solo',
            navigationStyle: 'preview4',
            spinner: 'spinner4',


            sliderType: 'standard',
            sliderLayout: item.hasClass('rs-fullscreen') ? 'fullscreen' : 'auto',
            delay: 9000,
            navigation: {
                keyboardNavigation: 'off',
                keyboard_direction: 'horizontal',
                mouseScrollNavigation: 'off',
                mouseScrollReverse: 'default',
                onHoverStop: 'off',
                touch: {
                    touchenabled: 'on',
                    swipe_threshold: 75,
                    swipe_min_touches: 1,
                    swipe_direction: 'horizontal',
                    drag_block_vertical: false,
                },
                arrows: {
                    enable: true,
                    style: 'hermes',
                    tmp: '<div class="tp-arr-allwrapper"><div class="tp-arr-imgholder"></div></div>',
                },
                bullets: {
                    enable: true,
                    style: 'hebe',
                    tmp: '<span class="tp-bullet-image"></span>',
                    hide_onmobile: true,
                    hide_under: 600,
                    hide_onleave: true,
                    hide_delay: 200,
                    hide_delay_mobile: 1200,
                    direction: 'horizontal',
                    h_align: 'center',
                    v_align: 'bottom',
                    h_offset: 0,
                    v_offset: 30,
                    space: 5,
                },
            },
            viewPort: {
                enable: true,
                outof: 'pause',
                visible_area: '80%',
                presize: false,
            },
            responsiveLevels: [1240, 1024, 778, 480],
            visibilityLevels: [1240, 1024, 778, 480],
            gridwidth: [1240, 1024, 778, 480],
            gridheight: [600, 600, 500, 400],
            lazyType: 'smart',
            parallax: {
                type: 'mouse',
                origo: 'slidercenter',
                speed: 2000,
                levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50, 46, 47, 48, 49, 50, 55],
            },
            shadow: 0,
            stopLoop: 'off',
            stopAfterLoops: -1,
            stopAtSlide: -1,
            shuffle: 'off',
            autoHeight: 'off',
            hideThumbsOnMobile: 'off',
            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            debugMode: false,
            fallbacks: {
                simplifyAll: 'off',
                nextSlideOnWindowFocus: 'off',
                disableFocusListener: false,
            },
        };

        // init
        $(document).ready(() => {
            const slider = item.find('.tp-banner, .rev_slider').show().revolution(rsOptions);

            slider.on('revolution.slide.onloaded', () => {
                _this.refresh();
            });
        });
    });
}

export { initSliderRevolution };

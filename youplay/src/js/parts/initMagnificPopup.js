/*------------------------------------------------------------------

  Magnific Popup

-------------------------------------------------------------------*/
function initMagnificPopup() {
    if (typeof $.fn.magnificPopup === 'undefined') {
        return;
    }

    const mpOptions = {
        closeOnContentClick: true,
        closeBtnInside: false,
        fixedContentPos: false,
        mainClass: 'mfp-no-margins mfp-img-mobile mfp-with-fade',
        tLoading: '<div class="preloader"></div>',
        removalDelay: 300,
        image: {
            verticalFit: true,
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
        },
    };

    // image popup
    $('.image-popup').magnificPopup($.extend({
        type: 'image',
    }, mpOptions));

    // video popup
    $('.video-popup').magnificPopup($.extend({
        type: 'iframe',
    }, mpOptions));

    // gallery popup
    $('.gallery-popup').each(function () {
        $(this).magnificPopup($.extend({
            delegate: '.owl-item:not(.cloned) a, .flickity-slider > div a',
            type: 'image',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1], // Will preload 0 - before current, and 1 after the current image
            },
            callbacks: {
                elementParse(item) {
                    // Function will fire for each target element
                    // "item.el" is a target DOM element (if present)
                    // "item.src" is a source that you may modify
                    const video = /youtube.com|youtu.be|vimeo.com/g.test(item.src);

                    if (video) {
                        item.type = 'iframe';
                    } else {
                        item.type = 'image';
                    }
                },
            },
        }, mpOptions));
    });
}

export { initMagnificPopup };

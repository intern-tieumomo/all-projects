/*------------------------------------------------------------------

  Owl Carousel
  DEPRECATED: used only for users who is not added Flickity

-------------------------------------------------------------------*/
function initOwlCarousel() {
    if (typeof $.fn.owlCarousel === 'undefined') {
        return;
    }

    let id = 0;

    $('.owl-carousel').each(function () {
        const className = `youplay-carousel-${id++}`;
        const autoplay = $(this).attr('data-autoplay');
        const loop = $(this).attr('data-loop') !== 'false';
        const stagePadding = parseFloat($(this).attr('data-stage-padding') || 0);
        const itemPadding = parseFloat($(this).attr('data-item-padding') || 0);
        $(this).owlCarousel({
            loop,
            stagePadding,
            dots: true,
            autoplay: !!autoplay,
            autoplayTimeout: autoplay,
            autoplaySpeed: 600,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 3,
                },
                500: {
                    items: 4,
                },
                992: {
                    items: 5,
                },
                1200: {
                    items: 6,
                },
            },
        }).addClass(className);
        if (itemPadding) {
            $(`<style>.${className} .owl-item { padding-left: ${itemPadding}px; padding-right: ${itemPadding}px; }</style>`).appendTo('head');
        }
    });

    // use Flickity instead
    if (typeof window.Flickity === 'undefined') {
        return;
    }

    $('.youplay-carousel').each(function () {
        const className = `youplay-carousel-${id++}`;
        const autoplay = $(this).attr('data-autoplay');
        const loop = $(this).attr('data-loop') !== 'false';
        const stagePadding = parseFloat($(this).attr('data-stage-padding') || 70);
        const itemPadding = parseFloat($(this).attr('data-item-padding') || 0);
        $(this).addClass('owl-carousel').owlCarousel({
            loop,
            stagePadding,
            nav: true,
            dots: false,
            autoplay: !!autoplay,
            autoplayTimeout: autoplay,
            autoplaySpeed: 600,
            autoplayHoverPause: true,
            navText: ['', ''],
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 2,
                },
                992: {
                    items: 3,
                },
                1200: {
                    items: 4,
                },
            },
        }).addClass(className);
        if (itemPadding) {
            $(`<style>.${className} .owl-item { padding-left: ${itemPadding}px; padding-right: ${itemPadding}px; }</style>`).appendTo('head');
        }
    });
    $('.youplay-slider').each(function () {
        const className = `youplay-carousel-${id++}`;
        const autoplay = $(this).attr('data-autoplay');
        const loop = $(this).attr('data-loop') !== 'false';
        $(this).addClass('owl-carousel').owlCarousel({
            loop,
            nav: false,
            autoplay: !!autoplay,
            autoplayTimeout: autoplay,
            autoplaySpeed: 600,
            autoplayHoverPause: true,
            items: 1,
        }).addClass(className);
    });
}

export { initOwlCarousel };

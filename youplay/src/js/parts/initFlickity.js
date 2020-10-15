/*------------------------------------------------------------------

  Flickity

-------------------------------------------------------------------*/
function initFlickity() {
    if (typeof window.Flickity === 'undefined') {
        return;
    }

    /*
     * Hack to add imagesLoaded event
     * https://github.com/metafizzy/flickity/issues/328
     */
    Flickity.prototype.imagesLoaded = function () {
        if (!this.options.imagesLoaded) {
            return;
        }
        const _this = this;
        let timeout = false;

        imagesLoaded(this.slider).on('progress', (instance, image) => {
            const cell = _this.getParentCell(image.img);
            _this.cellSizeChange(cell && cell.element);
            if (!_this.options.freeScroll) {
                _this.positionSliderAtSelected();
            }
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                _this.dispatchEvent('imagesLoadedTimeout', null, [image.img, cell.element]);
            }, 100);
        });
    };

    // prevent click event fire when drag carousel
    function noClickEventOnDrag($carousel) {
        $carousel.on('dragStart.flickity', function () {
            $(this).find('.flickity-viewport').addClass('is-dragging');
        });
        $carousel.on('dragEnd.flickity', function () {
            $(this).find('.flickity-viewport').removeClass('is-dragging');
        });
    }

    let id = 0;

    $('.youplay-carousel').each(function () {
        // wrap all childs
        $(this).children().wrap('<div>');

        const className = `youplay-carousel-${id++}`;
        const autoplay = parseInt($(this).attr('data-autoplay'), 10) || false;
        const dots = $(this).attr('data-dots') === 'true' || false;
        const arrows = $(this).attr('data-arrows') !== 'false' || false;
        const loop = $(this).attr('data-loop') !== 'false';
        const stagePadding = parseFloat($(this).attr('data-stage-padding') || 70);
        const itemPadding = parseFloat($(this).attr('data-item-padding') || 0);

        let styles = '';

        if (itemPadding) {
            styles += `.${className} .flickity-slider > * { padding: 0 ${itemPadding}px; }`;
        }
        if (stagePadding) {
            styles += `.${className} .flickity-slider { margin-left: ${stagePadding}px; }`;

            // Size 4
            styles += `.${className}.flickity-enabled .flickity-slider > * { width: calc(25% - ${stagePadding * 2 / 4}px); }`;
            styles += '@media (min-width: 767px) and (max-width: 991px) {';
            styles += `.${className}.flickity-enabled .flickity-slider > * { width: calc(33.3334% - ${stagePadding * 2 / 3}px); }`;
            styles += '}';
            styles += '@media (max-width: 767px) {';
            styles += `.${className}.flickity-enabled .flickity-slider > * { width: calc(50% - ${stagePadding * 2 / 2}px); }`;
            styles += '}';
            styles += '@media (max-width: 532px) {';
            styles += `.${className}.flickity-enabled .flickity-slider > * { width: calc(100% - ${stagePadding * 2}px); }`;
            styles += '}';

            // Size 1
            styles += `.${className}.flickity-enabled.youplay-carousel-size-1 .flickity-slider > * { width: calc(100% - ${stagePadding * 2}px); }`;

            // Size 2
            styles += `.${className}.flickity-enabled.youplay-carousel-size-2 .flickity-slider > * { width: calc(50% - ${stagePadding * 2 / 2}px); }`;
            styles += '@media (max-width: 767px) {';
            styles += `.${className}.flickity-enabled.youplay-carousel-size-2 .flickity-slider > * { width: calc(100% - ${stagePadding * 2}px); }`;
            styles += '}';

            // Size 3
            styles += `.${className}.flickity-enabled.youplay-carousel-size-3 .flickity-slider > * { width: calc(33.3334% - ${stagePadding * 2 / 3}px); }`;
            styles += '@media (min-width: 767px) and (max-width: 991px) {';
            styles += `.${className}.flickity-enabled.youplay-carousel-size-3 .flickity-slider > * { width: calc(50% - ${stagePadding * 2 / 2}px); }`;
            styles += '}';
            styles += '@media (max-width: 767px) {';
            styles += `.${className}.flickity-enabled.youplay-carousel-size-3 .flickity-slider > * { width: calc(100% - ${stagePadding * 2}px); }`;
            styles += '}';

            // Size 5
            styles += `.${className}.flickity-enabled.youplay-carousel-size-5 .flickity-slider > * { width: calc(20% - ${stagePadding * 2 / 5}px); }`;
            styles += '@media (min-width: 767px) and (max-width: 991px) {';
            styles += `.${className}.flickity-enabled.youplay-carousel-size-5 .flickity-slider > * { width: calc(25% - ${stagePadding * 2 / 4}px); }`;
            styles += '}';
            styles += '@media (max-width: 767px) {';
            styles += `.${className}.flickity-enabled.youplay-carousel-size-5 .flickity-slider > * { width: calc(33.3334% - ${stagePadding * 2 / 3}px); }`;
            styles += '}';
            styles += '@media (max-width: 532px) {';
            styles += `.${className}.flickity-enabled.youplay-carousel-size-5 .flickity-slider > * { width: calc(50% - ${stagePadding * 2 / 2}px); }`;
            styles += '}';

            // Size 6
            styles += `.${className}.flickity-enabled.youplay-carousel-size-6 .flickity-slider > * { width: calc(16.666% - ${stagePadding * 2 / 6}px); }`;
            styles += '@media (min-width: 767px) and (max-width: 991px) {';
            styles += `.${className}.flickity-enabled.youplay-carousel-size-6 .flickity-slider > * { width: calc(20% - ${stagePadding * 2 / 5}px); }`;
            styles += '}';
            styles += '@media (max-width: 767px) {';
            styles += `.${className}.flickity-enabled.youplay-carousel-size-6 .flickity-slider > * { width: calc(25% - ${stagePadding * 2 / 4}px); }`;
            styles += '}';
            styles += '@media (max-width: 532px) {';
            styles += `.${className}.flickity-enabled.youplay-carousel-size-6 .flickity-slider > * { width: calc(33.3334% - ${stagePadding * 2 / 3}px); }`;
            styles += '}';
        }

        if (styles) {
            $(`<style>${styles}</style>`).appendTo('head');
        }

        $(this).addClass(className).flickity({
            cellAlign: 'left',
            wrapAround: loop,
            contain: true,
            prevNextButtons: arrows,
            pageDots: dots,
            autoPlay: autoplay,
            pauseAutoPlayOnHover: true,
            selectedAttraction: 0.1,
            friction: 0.6,
            imagesLoaded: true,
        });

        noClickEventOnDrag($(this));
    });

    // social horizontal navigation
    $('.youplay-user-navigation > ul, .youplay-user-navigation > div > ul').each(function () {
        $(this).flickity({
            cellAlign: 'left',
            wrapAround: false,
            contain: true,
            prevNextButtons: false,
            pageDots: false,
            selectedAttraction: 0.1,
            friction: 0.6,
            freeScroll: true,
        });

        noClickEventOnDrag($(this));
    });
}

export { initFlickity };

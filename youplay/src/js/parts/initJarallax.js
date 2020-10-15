/*------------------------------------------------------------------

  Jarallax

-------------------------------------------------------------------*/
function initJarallax() {
    if (!this.options.parallax || this.isMobile) {
        return;
    }

    // in older versions used skrollr for parallax
    if (typeof window.skrollr !== 'undefined' && typeof this.skrollr === 'undefined') {
        this.skrollr = window.skrollr.init({
            smoothScrolling: false,
            forceHeight: false,
        });
    }

    // in newest versions used Jarallax plugin
    if (typeof $.fn.jarallax === 'undefined') {
        return;
    }

    // banners
    $('.youplay-banner-parallax .image').each(function () {
        const speed = parseFloat($(this).attr('data-speed'));
        const $banner = $(this).closest('.youplay-banner-parallax');
        const $info = $banner.children('.info');
        const isTopBanner = $banner.hasClass('banner-top');
        $(this).jarallax({
            speed: Number.isNaN(speed) ? 0.4 : speed,
            onScroll(calc) {
                if (!isTopBanner) {
                    return;
                }
                const pos = calc.beforeTop !== 0 ? -1 : 1;
                const scrollInfo = pos * Math.min(150, 150 * (1 - calc.visiblePercent));

                $info.css({
                    opacity: calc.visiblePercent < 0 ? 1 : calc.visiblePercent,
                    transform: `translate3d(0, ${scrollInfo}px, 0)`,
                });
            },
        });
    });

    // footer parallax
    $('.youplay-footer-parallax').each(function () {
        const $this = $(this);
        const $img = $this.children('.image');
        const $wrapper = $this.children('.wrapper');
        const $social = $this.find('.social > .container');
        const opts = {
            onScroll(calc) {
                const scroll = Math.max(-50, -50 * (1 - calc.visiblePercent));
                $wrapper.css({
                    transform: `translate3d(0, ${scroll.toFixed(1)}%, 0)`,
                });
                $social.css({
                    transform: 'translate3d(0, 0, 0)',
                    opacity: calc.visiblePercent < 0 ? 1 : calc.visiblePercent,
                });
            },
        };

        if (!$img.length) {
            opts.type = 'custom';
            opts.imgSrc = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
            opts.imgWidth = 1;
            opts.imgHeight = 1;

            $this.jarallax(opts);
        } else {
            $img.jarallax(opts);
        }
    });
}

export { initJarallax };

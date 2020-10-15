import { options } from './parts/_options';
import { fadeBetweenPages } from './parts/fadeBetweenPages';
import { initAnchors } from './parts/initAnchors';
import { initFacebook } from './parts/initFacebook';
import { initInstagram } from './parts/initInstagram';
import { initTwitter } from './parts/initTwitter';
import { initNavbar } from './parts/initNavbar';
import { initForms } from './parts/initForms';
import { initSearch } from './parts/initSearch';
import { initObjectFitImages } from './parts/initObjectFitImages';
import { initFlickity } from './parts/initFlickity';
import { initOwlCarousel } from './parts/initOwlCarousel';
import { initMagnificPopup } from './parts/initMagnificPopup';
import { initSliderRevolution } from './parts/initSliderRevolution';
import { initIsotope } from './parts/initIsotope';
import { initHexagonRating } from './parts/initHexagonRating';
import { initJarallax } from './parts/initJarallax';


/*------------------------------------------------------------------

  Youplay Class

-------------------------------------------------------------------*/
class YOUPLAY {
    constructor(newOptions) {
        const self = this;

        self.options = newOptions;

        self.$window = $(window);
        self.$document = $(document);

        // check if mobile
        self.isMobile = /Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/g.test(navigator.userAgent || navigator.vendor || window.opera);

        // navbar
        self.navbarSmall = false;
        self.navbarMaxTop = 100;
    }

    init(newOptions) {
        // prt:sc:dm

        const self = this;

        // init options
        self.options = $.extend({}, this.options, newOptions);

        function initPlugins() {
            // navbar set to small
            if (!self.options.navbarSmall) {
                self.options.navbarSmall = $('.navbar-youplay').hasClass('navbar-small');
            }

            // init tooltips and popovers
            $('[data-toggle="tooltip"]').tooltip({
                container: 'body',
            });
            $('[data-toggle="popover"]').popover();

            // fade between pages
            self.fadeBetweenPages();
            self.initAnchors();
            self.initFacebook();
            self.initInstagram();
            self.initTwitter();
            self.initNavbar();
            self.initForms();
            self.initSearch();

            // Plugins
            self.initObjectFitImages();
            self.initFlickity();
            self.initOwlCarousel();
            self.initMagnificPopup();
            self.initSliderRevolution();
            self.initIsotope();
            self.initHexagonRating();


            // accordions
            $('.youplay-accordion, .panel-group').find('.collapse').on('shown.bs.collapse', function () {
                $(this).parent().find('.icon-plus').removeClass('icon-plus')
                    .addClass('icon-minus');
                self.refresh();
            }).on('hidden.bs.collapse', function () {
                $(this).parent().find('.icon-minus').removeClass('icon-minus')
                    .addClass('icon-plus');
                self.refresh();
            });


            // jarallax init after all plugins
            self.initJarallax();
        }

        if ($('.page-preloader').length) {
            // after page load
            $(window).on('load', () => {
                initPlugins();

                // some timeout after plugins init
                setTimeout(() => {
                    // hide preloader
                    $('.page-preloader').fadeOut(function () {
                        $(this).find('> *').remove();
                    });
                }, 200);
            })

                // fix safari back button
                // thanks http://stackoverflow.com/questions/8788802/prevent-safari-loading-from-cache-when-back-button-is-clicked
                .on('pageshow', (e) => {
                    if (e.originalEvent.persisted) {
                        $('.page-preloader').hide();
                    }
                });
        } else {
            initPlugins();
            $(window).on('load', () => {
                self.refresh();
            });
        }
    }

    // eslint-disable-next-line
    refresh() {
        window.dispatchEvent(new Event('resize'));
    }
    fadeBetweenPages() {
        return fadeBetweenPages.call(this);
    }
    initAnchors() {
        return initAnchors.call(this);
    }
    initFacebook() {
        return initFacebook.call(this);
    }
    initInstagram() {
        return initInstagram.call(this);
    }
    initTwitter() {
        return initTwitter.call(this);
    }
    initNavbar() {
        return initNavbar.call(this);
    }
    initForms() {
        return initForms.call(this);
    }
    initSearch() {
        return initSearch.call(this);
    }
    initObjectFitImages() {
        return initObjectFitImages.call(this);
    }
    initFlickity() {
        return initFlickity.call(this);
    }
    initOwlCarousel() {
        return initOwlCarousel.call(this);
    }
    initMagnificPopup() {
        return initMagnificPopup.call(this);
    }
    initSliderRevolution() {
        return initSliderRevolution.call(this);
    }
    initIsotope() {
        return initIsotope.call(this);
    }
    initHexagonRating() {
        return initHexagonRating.call(this);
    }
    initJarallax() {
        return initJarallax.call(this);
    }
}


/*------------------------------------------------------------------

  Init Youplay

-------------------------------------------------------------------*/
window.youplay = new YOUPLAY(options);

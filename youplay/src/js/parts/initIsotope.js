/*------------------------------------------------------------------

  Isotope

-------------------------------------------------------------------*/
function initIsotope() {
    if (typeof $.fn.isotope === 'undefined') {
        return;
    }

    const self = this;

    $('.isotope').each(function () {
        const curIsotopeOptions = $(this).find('.isotope-options');

        // init items
        const $grid = $(this).find('.isotope-list').isotope({
            itemSelector: '.item',
        });

        // refresh for parallax images and isotope images position
        if ($grid.imagesLoaded) {
            $grid.imagesLoaded().progress(() => {
                $grid.isotope('layout');
            });
        }
        $grid.on('arrangeComplete', () => {
            self.refresh();
        });


        // click on filter button
        curIsotopeOptions.on('click', '> :not(.active)', function (e) {
            $(this).addClass('active').siblings().removeClass('active');
            const curFilter = $(this).attr('data-filter');

            e.preventDefault();

            $grid.isotope({
                filter() {
                    if (curFilter === 'all') {
                        return true;
                    }

                    let itemFilters = $(this).attr('data-filters');

                    if (itemFilters) {
                        itemFilters = itemFilters.split(',');
                        // eslint-disable-next-line
                        for (const k in itemFilters) {
                            if (itemFilters[k].replace(/\s/g, '') === curFilter) {
                                return true;
                            }
                        }
                    }
                    return false;
                },
            });
        });
    });
}

export { initIsotope };

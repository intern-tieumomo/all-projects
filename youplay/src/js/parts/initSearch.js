/*------------------------------------------------------------------

  Search

-------------------------------------------------------------------*/
function initSearch() {
    const self = this;

    // toggle search block
    self.searchToggle = function (type) {
        const $searchBlock = $('.search-block');
        const opened = $searchBlock.hasClass('active');

        // no open when opened and no close when closed
        if (type === 'close' && !opened || type === 'open' && opened) {
            return;
        }

        // hide
        if (opened) {
            $searchBlock.removeClass('active');

            // show
        } else {
            $searchBlock.addClass('active');
            setTimeout(() => {
                $searchBlock.find('input').focus();
            }, 120);
        }
    };

    // toggle search block
    self.$document.on('click', '.search-toggle', (e) => {
        e.preventDefault();
        e.stopPropagation();
        self.searchToggle();
    });
    // close search on ESC press
    self.$document.on('keyup', (e) => {
        if (e.keyCode === 27) {
            self.searchToggle('close');
        }
    });
}

export { initSearch };

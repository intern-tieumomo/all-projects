/*------------------------------------------------------------------

  Fade Between Pages
  note: use .no-fade classname for links, that not need to fade

-------------------------------------------------------------------*/
function fadeBetweenPages() {
    const _this = this;

    // prevent fade between pages if there is no preloader
    if (!_this.options.fadeBetweenPages || !$('.page-preloader').length) {
        return;
    }

    _this.$document.on('click', 'a:not(.no-fade):not([target="_blank"]):not(.btn):not(.button):not([href*="#"]):not([href^="mailto"]):not([href^="javascript:"]):not(.search-toggle)', function (e) {
        // default prevented
        if (e.isDefaultPrevented()) {
            return;
        }

        // prevent for gallery
        if ($(this).parents('.gallery-popup:eq(0)').length) {
            return;
        }

        // stop if empty attribute
        if (!$(this).attr('href')) {
            return;
        }

        const href = this.href;

        if ($(this).hasClass('dropdown-toggle')) {
            if ($(this).next('.dropdown-menu').css('visibility') === 'hidden' || $(this).parent().hasClass('open')) {
                return;
            }
        }

        if (href) {
            e.preventDefault();

            $('.page-preloader').fadeIn(400, () => {
                window.location.href = href;
            });
        }
    });
}

export { fadeBetweenPages };

/*------------------------------------------------------------------

  Navbar

-------------------------------------------------------------------*/
function initNavbar() {
    const self = this;

    // navbar size
    self.navbarSize = function (curTop) {
        if (curTop > this.navbarMaxTop && !this.navbarSmall) {
            this.navbarSmall = true;
            $('.navbar-youplay').addClass('navbar-small');
        }

        if (curTop <= this.navbarMaxTop && this.navbarSmall) {
            this.navbarSmall = false;
            $('.navbar-youplay').removeClass('navbar-small');
        }
    };

    // navbar collapse
    self.navbarCollapse = function () {
        const _this = this;

        _this.$document.on('click', '.navbar-youplay [data-toggle=off-canvas]', function () {
            const $toggleTarget = $('.navbar-youplay').find($(this).attr('data-target'));
            const collapsed = $toggleTarget.hasClass('collapse');
            $toggleTarget[`${collapsed ? 'remove' : 'add'}Class`]('collapse');
            $('.navbar-youplay')[`${collapsed ? 'add' : 'remove'}Class`]('youplay-navbar-collapsed');
        });

        let resizeTimeout;
        _this.$window.on('resize', () => {
            $('.navbar-youplay').addClass('no-transition');

            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                $('.navbar-youplay').removeClass('no-transition');
            }, 50);
        });

        // close navbar if clicked on content
        _this.$document.on('click', '.youplay-navbar-collapsed ~ .content-wrap', () => {
            $('.navbar-youplay').find('[data-toggle=off-canvas]').click();
        });

        // prevent follow link when there is dropdown
        if (!_this.options.fadeBetweenPages || !$('.page-preloader').length) {
            _this.$document.on('click', '.navbar-youplay .dropdown-toggle', function () {
                if ($(this).next('.dropdown-menu').css('visibility') === 'visible' && !$(this).parent().hasClass('open')) {
                    window.location.href = this.href;
                }
            });
        }
    };

    // navbar submenu fix
    self.navbarSubmenuFix = function () {
        const $navbar = $('.navbar-youplay');

        // don't close submenu if click on child submenu toggle
        $navbar.on('click', '.dropdown-menu .dropdown-toggle', function (e) {
            $(this).parent('.dropdown').toggleClass('open');
            e.preventDefault();
            e.stopPropagation();
        });

        // don't close submenu with form if one of the inputs focused
        $navbar.on('focus', 'input, textarea, button', function () {
            $(this).parents('.dropdown').addClass('open');
        });
    };

    // navbar collapse
    self.navbarCollapse();

    // navbar set to small
    if (!self.options.navbarSmall) {
        self.$window.on('scroll', () => {
            self.navbarSize(self.$window.scrollTop());
        });
        self.navbarSize(self.$window.scrollTop());
    }

    // navbar submenu fix
    // no close submenu if click on child submenu toggle
    self.navbarSubmenuFix();
}

export { initNavbar };

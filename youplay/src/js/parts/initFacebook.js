/*------------------------------------------------------------------

  Init Facebook

-------------------------------------------------------------------*/
function initFacebook() {
    if (!$('.fb-page').length) {
        return;
    }
    const self = this;

    $('body').append('<div id="fb-root"></div>');

    (function (d, s, id) {
        if (window.location.protocol === 'file:') {
            return;
        }
        const fjs = d.getElementsByTagName(s)[0];

        if (d.getElementById(id)) {
            return;
        }
        const js = d.createElement(s); js.id = id;
        js.src = '//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    // resize on facebook widget loaded
    window.fbAsyncInit = function () {
        window.FB.Event.subscribe('xfbml.render', () => {
            self.refresh();
        });
    };
}

export { initFacebook };

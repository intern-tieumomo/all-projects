/*------------------------------------------------------------------

  Instagram

-------------------------------------------------------------------*/
function initInstagram() {
    const self = this;
    const $instagram = $('.youplay-instagram');
    if (!$instagram.length || !self.options.php.instagram) {
        return;
    }

    /**
     * Templating a instagram item using '{{ }}' braces
     * @param  {Object} data Instagram item details are passed
     * @return {String} Templated string
     */
    const templating = function (data, temp) {
        const tempVariables = ['link', 'image', 'caption'];

        for (let i = 0, len = tempVariables.length; i < len; i++) {
            temp = temp.replace(new RegExp(`{{${tempVariables[i]}}}`, 'gi'), data[tempVariables[i]]);
        }

        return temp;
    };

    $instagram.each(function () {
        const $this = $(this);
        const instagramOptions = {
            userID: $this.attr('data-instagram-user-id') || null,
            count: $this.attr('data-instagram-count') || 6,
            template: $this.attr('data-instagram-template') || [
                '<div class="col-xs-4">',
                '    <a href="{{link}}" target="_blank">',
                '        <img src="{{image}}" alt="{{caption}}" class="kh-img-stretch">',
                '    </a>',
                '</div>',
            ].join(' '),
            loadingText: 'Loading...',
            failText: 'Failed to load data',
            apiPath: self.options.php.instagram,
        };

        // stop if running in file protocol
        if (window.location.protocol === 'file:') {
            $this.html(`<div class="col-xs-12">${instagramOptions.failText}</div>`);
            // eslint-disable-next-line
            console.error('You should run you website on webserver with PHP to get working Twitter');
            return;
        }

        if (!instagramOptions.userID) {
            $this.html(`<div class="col-xs-12">${instagramOptions.failText}</div>`);
            // eslint-disable-next-line
            console.error('If you want to fetch instagram images, you must define the user ID. How to get it see here - http://jelled.com/instagram/lookup-user-id');
            return;
        }

        $this.html(`<div class="col-xs-12">${instagramOptions.loadingText}</div>`);

        // Fetch instagram images
        $.getJSON(instagramOptions.apiPath, {
            userID: instagramOptions.userID,
            count: instagramOptions.count,
        }, (response) => {
            $this.html('');

            for (let i = 0; i < instagramOptions.count; i++) {
                let instaItem = false;
                if (response[i]) {
                    instaItem = response[i];
                } else if (response.statuses && response.statuses[i]) {
                    instaItem = response.statuses[i];
                } else {
                    break;
                }

                const tempData = {
                    link: instaItem.link,
                    image: instaItem.images.thumbnail.url,
                    caption: instaItem.caption,
                };

                $this.append(templating(tempData, instagramOptions.template));
            }

            // resize window
            self.refresh();
        }).fail((a) => {
            $this.html(`<div class="col-xs-12">${instagramOptions.failText}</div>`);
            // eslint-disable-next-line
            console.error(a.responseText);
        });
    });
}

export { initInstagram };

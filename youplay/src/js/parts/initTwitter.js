/*------------------------------------------------------------------

  Twitter
  https://github.com/sonnyt/Tweetie

-------------------------------------------------------------------*/
function initTwitter() {
    const $twtFeeds = $('.youplay-twitter');
    const self = this;
    if (!$twtFeeds.length || !self.options.php.twitter) {
        return;
    }

    /**
     * Templating a tweet using '{{ }}' braces
     * @param  {Object} data Tweet details are passed
     * @return {String}      Templated string
     */
    const templating = function (data, temp) {
        const tempVariables = ['date', 'tweet', 'avatar', 'url', 'retweeted', 'screen_name', 'user_name'];

        for (let i = 0, len = tempVariables.length; i < len; i++) {
            temp = temp.replace(new RegExp(`{{${tempVariables[i]}}}`, 'gi'), data[tempVariables[i]]);
        }

        return temp;
    };

    $twtFeeds.each(function () {
        const $this = $(this);
        const twitterOptions = {
            username: $this.attr('data-twitter-user-name') || null,
            list: null,
            hashtag: $this.attr('data-twitter-hashtag') || null,
            count: $this.attr('data-twitter-count') || 2,
            hideReplies: $this.attr('data-twitter-hide-replies') === 'true',
            template: $this.attr('data-twitter-template') || [
                '<div>',
                '    <div class="youplay-twitter-icon"><i class="fab fa-twitter"></i></div>',
                '    <div class="youplay-twitter-date date">',
                '        <span>{{date}}</span>',
                '    </div>',
                '    <div class="youplay-twitter-text">',
                '       {{tweet}}',
                '    </div>',
                '</div>',
            ].join(' '),
            loadingText: 'Loading...',
            failText: 'Failed to load data',
            apiPath: self.options.php.twitter,
        };

        // stop if running in file protocol
        if (window.location.protocol === 'file:') {
            $this.html(twitterOptions.failText);
            // eslint-disable-next-line
            console.error('You should run you website on webserver with PHP to get working Twitter');
            return;
        }

        if (twitterOptions.list && !twitterOptions.username) {
            $this.html(twitterOptions.failText);
            // eslint-disable-next-line
            console.error('If you want to fetch tweets from a list, you must define the username of the list owner.');
            return;
        }

        // Set loading
        $this.html(`<span>${twitterOptions.loadingText}</span>`);

        // Fetch tweets
        $.getJSON(twitterOptions.apiPath, {
            username: twitterOptions.username,
            list: twitterOptions.list,
            hashtag: twitterOptions.hashtag,
            count: twitterOptions.count,
            exclude_replies: twitterOptions.hideReplies,
        }, (twt) => {
            $this.html('');

            for (let i = 0; i < twitterOptions.count; i++) {
                let tweet = false;
                if (twt[i]) {
                    tweet = twt[i];
                } else if (twt.statuses && twt.statuses[i]) {
                    tweet = twt.statuses[i];
                } else {
                    break;
                }

                const tempData = {
                    user_name: tweet.user.name,
                    date: tweet.date_formatted,
                    tweet: tweet.text_entitled,
                    avatar: `<img src="${tweet.user.profile_image_url}" />`,
                    url: `https://twitter.com/${tweet.user.screen_name}/status/${tweet.id_str}`,
                    retweeted: tweet.retweeted,
                    screen_name: `@${tweet.user.screen_name}`,
                };

                $this.append(templating(tempData, twitterOptions.template));
            }

            // resize window
            self.refresh();
        }).fail((a) => {
            $this.html(twitterOptions.failText);
            // eslint-disable-next-line
            console.error(a.responseText);
        });
    });
}

export { initTwitter };

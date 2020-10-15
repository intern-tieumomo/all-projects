(function($) {
    'use strict';

    var like = {};
    edgt.modules.like = like;

    like.edgtLikes = edgtLikes;

    like.edgtOnDocumentReady = edgtOnDocumentReady;
    like.edgtOnWindowLoad = edgtOnWindowLoad;
    like.edgtOnWindowResize = edgtOnWindowResize;
    like.edgtOnWindowScroll = edgtOnWindowScroll;

    $(document).ready(edgtOnDocumentReady);
    $(window).load(edgtOnWindowLoad);
    $(window).resize(edgtOnWindowResize);
    $(window).scroll(edgtOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtOnDocumentReady() {
        edgtLikes();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function edgtOnWindowLoad() {

    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function edgtOnWindowResize() {

    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function edgtOnWindowScroll() {

    }
    

    function edgtLikes() {

        $(document).on('click','.edgt-like', function() {

            var likeLink = $(this),
                id = likeLink.attr('id'),
				postID = likeLink.data('post-id'),
                type;

            if ( likeLink.hasClass('liked') ) {
                return false;
            }

            if(typeof likeLink.data('type') !== 'undefined') {
                type = likeLink.data('type');
            }

            var dataToPass = {
                action: 'eldritch_edge_like',
                likes_id: id,
                type: type,
				like_nonce: $('#edgtf_like_nonce_'+postID).val()
            };

            var like = $.post(edgtLike.ajaxurl, dataToPass, function( data ) {

                likeLink.html(data).addClass('liked').attr('title','You already like this!');

                if(type !== 'portfolio_list') {
                    likeLink.children('span').css('opacity',1);
                }

            });

            return false;
        });

    }


})(jQuery);
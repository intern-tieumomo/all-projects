(function($) {
    "use strict";

    var title = {};
    edgt.modules.title = title;

    title.edgtParallaxTitle = edgtParallaxTitle;

    title.edgtOnDocumentReady = edgtOnDocumentReady;
    title.edgtOnWindowLoad = edgtOnWindowLoad;
    title.edgtOnWindowResize = edgtOnWindowResize;
    title.edgtOnWindowScroll = edgtOnWindowScroll;

    $(document).ready(edgtOnDocumentReady);
    $(window).load(edgtOnWindowLoad);
    $(window).resize(edgtOnWindowResize);
    $(window).scroll(edgtOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtOnDocumentReady() {
        edgtParallaxTitle();
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
    

    /*
     **	Title image with parallax effect
     */
    function edgtParallaxTitle(){
        if($('.edgt-title.edgt-has-parallax-background').length > 0 && $('.touch').length === 0){

            var parallaxBackground = $('.edgt-title.edgt-has-parallax-background');
            var parallaxBackgroundWithZoomOut = $('.edgt-title.edgt-has-parallax-background.edgt-zoom-out');

            var backgroundSizeWidth = parallaxBackground.data('background-width') !== undefined ? parseInt(parallaxBackground.data('background-width').match(/\d+/)) : 0;
            var titleHolderHeight = parallaxBackground.data('height');

            if(!titleHolderHeight) {
                titleHolderHeight = parallaxBackground.height();
            }

            var titleRate = (titleHolderHeight / 10000) * 7;
            var titleYPos = -(edgt.scroll * titleRate);

            //set position of background on doc ready
            parallaxBackground.css({'background-position': 'center '+ (titleYPos+edgtGlobalVars.vars.edgtAddForAdminBar) +'px' });
            parallaxBackgroundWithZoomOut.css({'background-size': backgroundSizeWidth-edgt.scroll + 'px auto'});

            //set position of background on window scroll
            $(window).scroll(function() {
                titleYPos = -(edgt.scroll * titleRate);
                parallaxBackground.css({'background-position': 'center ' + (titleYPos+edgtGlobalVars.vars.edgtAddForAdminBar) + 'px' });
                parallaxBackgroundWithZoomOut.css({'background-size': backgroundSizeWidth-edgt.scroll + 'px auto'});
            });

        }
    }

})(jQuery);

(function($) {
    "use strict";

    window.edgt = {};
    edgt.modules = {};

    edgt.scroll = 0;
    edgt.window = $(window);
    edgt.document = $(document);
    edgt.windowWidth = $(window).width();
    edgt.windowHeight = $(window).height();
    edgt.body = $('body');
    edgt.html = $('html, body');
    edgt.htmlEl = $('html');
    edgt.menuDropdownHeightSet = false;
    edgt.defaultHeaderStyle = '';
    edgt.minVideoWidth = 1500;
    edgt.videoWidthOriginal = 1280;
    edgt.videoHeightOriginal = 720;
    edgt.videoRatio = 1280/720;

	function edgtTransitionEvent() {
		var el = document.createElement('transitionDetector'),
			transEndEventNames = {
				'WebkitTransition' : 'webkitTransitionEnd',// Saf 6, Android Browser
				'MozTransition'    : 'transitionend',      // only for FF < 15
				'transition'       : 'transitionend'       // IE10, Opera, Chrome, FF 15+, Saf 7+
			};

		for(var t in transEndEventNames){
			if( el.style[t] !== undefined ){
				return transEndEventNames[t];
			}
		}
	}

	edgt.transitionEnd = edgtTransitionEvent();

    edgt.edgtOnDocumentReady = edgtOnDocumentReady;
    edgt.edgtOnWindowLoad = edgtOnWindowLoad;
    edgt.edgtOnWindowResize = edgtOnWindowResize;
    edgt.edgtOnWindowScroll = edgtOnWindowScroll;

    $(document).ready(edgtOnDocumentReady);
    $(window).load(edgtOnWindowLoad);
    $(window).resize(edgtOnWindowResize);
    $(window).scroll(edgtOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtOnDocumentReady() {
        edgt.scroll = $(window).scrollTop();

        //set global variable for header style which we will use in various functions
        if(edgt.body.hasClass('edgt-dark-header')){ edgt.defaultHeaderStyle = 'edgt-dark-header';}
        if(edgt.body.hasClass('edgt-light-header')){ edgt.defaultHeaderStyle = 'edgt-light-header';}

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
        edgt.windowWidth = $(window).width();
        edgt.windowHeight = $(window).height();
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function edgtOnWindowScroll() {
        edgt.scroll = $(window).scrollTop();
    }



    //set boxed layout width variable for various calculations

    switch(true){
        case edgt.body.hasClass('edgt-grid-1300'):
            edgt.boxedLayoutWidth = 1350;
            break;
        case edgt.body.hasClass('edgt-grid-1200'):
            edgt.boxedLayoutWidth = 1250;
            break;
        case edgt.body.hasClass('edgt-grid-1000'):
            edgt.boxedLayoutWidth = 1050;
            break;
        case edgt.body.hasClass('edgt-grid-800'):
            edgt.boxedLayoutWidth = 850;
            break;
        default :
            edgt.boxedLayoutWidth = 1150;
            break;
    }

})(jQuery);
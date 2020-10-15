(function ($) {
	'use strict';

	var portfolio = {};
	edgt.modules.portfolio = portfolio;

	portfolio.edgtOnDocumentReady = edgtOnDocumentReady;
	portfolio.edgtOnWindowLoad = edgtOnWindowLoad;
	portfolio.edgtOnWindowResize = edgtOnWindowResize;
	portfolio.edgtOnWindowScroll = edgtOnWindowScroll;

	$(document).ready(edgtOnDocumentReady);
	$(window).load(edgtOnWindowLoad);
	$(window).resize(edgtOnWindowResize);
	$(window).scroll(edgtOnWindowScroll);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtOnDocumentReady() {
		portfolio.edgtPortfolioSlider();
        edgtPortfolioHorizontalScroll();
        edgtInitPortfolioHorizontallyScrollingWidth();
        edgtInitPortfolioHorizontallyScrollingParallax();
	}

	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	function edgtOnWindowLoad() {
		edgtPortfolioSingleFollow().init();
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

	portfolio.edgtPortfolioSlider = function () {
		var sliders = $('.edgt-portfolio-slider-holder');

		var setPortfolioResponsiveOptions = function (slider, options) {
			var columns = slider.data('columns');
			if (typeof columns === 'number') {
				options.slidesToShow = columns;
				options.slidesToScroll = columns;
				options.arrows = false;
			}
		};

		if (sliders.length) {
			sliders.each(function () {
				var sliderHolder = $(this).find('.edgt-portfolio-slider-list');
				var options = {};

				options.dots = typeof sliderHolder.data('dots') !== 'undefined' && sliderHolder.data('dots') === 'yes';

				if(options.dots){
					sliderHolder.addClass('slick-dots');
				}

				options.infinite = true;
				options.autoplay = true;

				setPortfolioResponsiveOptions(sliderHolder, options);
                options.responsive = [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
							slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
							slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
							slidesToScroll: 1
                        }
                    }
                ];

                sliderHolder.on('init', function(){
                	$(this).css('visibility','visible');
                });

				sliderHolder.slick(options);
			});
		}
	};


	var edgtPortfolioSingleFollow = function () {

		var info = $('.edgt-follow-portfolio-info .small-images.edgt-portfolio-single-holder .edgt-portfolio-info-holder, ' +
		'.edgt-follow-portfolio-info .small-slider.edgt-portfolio-single-holder .edgt-portfolio-info-holder');

		if (info.length) {
			var infoHolder = info.parent(),
				infoHolderOffset = infoHolder.offset().top,
				infoHolderHeight = infoHolder.height(),
				mediaHolder = $('.edgt-portfolio-media'),
				mediaHolderHeight = mediaHolder.height(),
				header = $('.header-appear, .edgt-fixed-wrapper'),
				headerHeight = (header.length) ? header.height() : 0;
		}

		var infoHolderPosition = function () {

			if (info.length) {

				if (mediaHolderHeight > infoHolderHeight) {
					if (edgt.scroll > infoHolderOffset) {
						info.animate({
							marginTop: (edgt.scroll - (infoHolderOffset) + edgtGlobalVars.vars.edgtAddForAdminBar + headerHeight + 20) //20 px is for styling, spacing between header and info holder
						});
					}
				}

			}
		};

		var recalculateInfoHolderPosition = function () {

			if (info.length) {
				if (mediaHolderHeight > infoHolderHeight) {
					if (edgt.scroll > infoHolderOffset) {

						if (edgt.scroll + headerHeight + edgtGlobalVars.vars.edgtAddForAdminBar + infoHolderHeight + 20 < infoHolderOffset + mediaHolderHeight) {    //20 px is for styling, spacing between header and info holder

							//Calculate header height if header appears
							if ($('.header-appear, .edgt-fixed-wrapper').length) {
								headerHeight = $('.header-appear, .edgt-fixed-wrapper').height();
							}
							info.stop().animate({
								marginTop: (edgt.scroll - (infoHolderOffset) + edgtGlobalVars.vars.edgtAddForAdminBar + headerHeight + 20) //20 px is for styling, spacing between header and info holder
							});
							//Reset header height
							headerHeight = 0;
						}
						else {
							info.stop().animate({
								marginTop: mediaHolderHeight - infoHolderHeight
							});
						}
					} else {
						info.stop().animate({
							marginTop: 0
						});
					}
				}
			}
		};

		return {

			init: function () {
				if (!edgt.modules.common.edgtIsTouchDevice()) {
					infoHolderPosition();
					$(window).scroll(function () {
						recalculateInfoHolderPosition();
					});
				}
			}

		};

	};

    function edgtPortfolioHorizontalScroll() {

        if (edgt.windowWidth > 750) {

            if($('.edgt-horizontally-scrolling-portfolio-list-page').length){

                $('html').addClass('edgt-horizontally-scrolling-html');

                $(window).mousewheel(function (event, delta) {
                    if (Math.abs(delta) >= 20)
                        delta /= 20;


                    event.preventDefault();
                    var curScroll = {
                        x: edgt.modules.common.edgtgetScrollX(),
                        y: edgt.modules.common.edgtgetScrollY()
                    };

                    TweenMax.to(curScroll, 0.5, {
                        x: curScroll.x - (delta * 500),
                        onUpdate: function () {
                            window.scrollTo(curScroll.x, curScroll.y);
                        }
                    });
                });

            }
        }

    }


    function edgtInitPortfolioHorizontallyScrollingWidth(){

        if (edgt.windowWidth  > 750) {
            if($('.edgt-horizontally-scrolling-portfolio-list-holder').length){

                var holders = $('.edgt-horizontally-scrolling-portfolio-list-holder');

                holders.each(function(){
                    var holder = $(this),
                        row = holder.find('.edgt-hspl-images-row:first'),
                        completeWidth = 0;

                    holder.waitForImages(function() {

                        if (edgt.windowWidth  > 1024) {
                            holder.height($('body').height());
                        } else {
                            holder.height($('body').height() - edgtGlobalVars.vars.edgtMobileHeaderHeight);
                        }

                        $('.edgt-hspl-cover-image').width(Math.ceil($('.edgt-wrapper').width()));


                        if($('.edgt-hspl-cover-image').length){

                            completeWidth = completeWidth + $('.edgt-hspl-cover-image').width();
                        }

                        if(row.length) {
                            var rowArticles = row.find('article');

                            var allArticles = holder.find('.edgt-hspl-images-row').find('article');
                            allArticles.each(function(){
                                var article = $(this);
                                article.width(article.find('img').width());

                            });

                            rowArticles.each(function(){
                                var article = $(this);
                                completeWidth = completeWidth + Math.ceil(article.width());
                            });
                        }

                        holder.width(completeWidth); // Bottom Passepartout is same like left and right and beacause of that we use it here instead of right
                        $('.edgt-horizontally-scrolling-portfolio-list-holder').css('opacity', 1);
                    });

                });
            }
        } else {
            $('.edgt-horizontally-scrolling-portfolio-list-holder').css('opacity', 1);
        }
    }

    function edgtInitPortfolioHorizontallyScrollingParallax(){
        if (edgt.windowWidth  > 1024) {
            if($('.edgt-hspl-cover-image').length){
                $('.edgt-hspl-cover-image').each(function() {

                    var parallaxElement = $(this);
                    var speed = 0.3;
                    parallaxElement.verticalParallax('50%', speed);
                });
            }
        }

    }

})(jQuery);
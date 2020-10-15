(function ($) {
	"use strict";


	var blog = {};
	edgt.modules.blog = blog;

	blog.edgtInitAudioPlayer = edgtInitAudioPlayer;
	blog.edgtInitBlogMasonry = edgtInitBlogMasonry;
	blog.edgtInitBlogMasonryGallery = edgtInitBlogMasonryGallery;
	blog.edgtInitBlogSplit = edgtInitBlogSplit;
	blog.edgtInitBlogLoadMore = edgtInitBlogLoadMore;

	blog.edgtOnDocumentReady = edgtOnDocumentReady;
	blog.edgtOnWindowLoad = edgtOnWindowLoad;
	blog.edgtOnWindowResize = edgtOnWindowResize;
	blog.edgtOnWindowScroll = edgtOnWindowScroll;

	$(document).ready(edgtOnDocumentReady);
	$(window).load(edgtOnWindowLoad);
	$(window).resize(edgtOnWindowResize);
	$(window).scroll(edgtOnWindowScroll);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtOnDocumentReady() {
		edgtInitAudioPlayer();
		edgtInitBlogMasonry();
		edgtInitBlogLoadMore();
		edgtInitBlogSplit();
		edgtInitBlogMasonryGallery();
	}

	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	function edgtOnWindowLoad() {
		edgtGetInfiniteScrollTriggerPosition();
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


	function edgtInitAudioPlayer() {

		var players = $('audio.edgt-blog-audio');

		players.mediaelementplayer({
			audioWidth: '100%'
		});
	}

	function edgtInitBlogSplit() {
		if ($('.edgt-blog-holder.edgt-blog-type-split').length) {
			var container = $('.edgt-blog-holder.edgt-blog-type-split');

			container.waitForImages(function () {
				container.isotope({
					layoutMode: 'vertical'
				});
			});

			container.find('article').appear(function () {
				$(this).addClass('appeared');
			});
		}
	}

	function edgtInitBlogMasonry() {
		if ($('.edgt-blog-holder.edgt-blog-type-masonry').length) {
			var container = $('.edgt-blog-holder.edgt-blog-type-masonry');

			container.waitForImages(function () {
				container.isotope({
					itemSelector: 'article',
					resizable: false,
					masonry: {
						columnWidth: '.edgt-blog-masonry-grid-sizer',
						gutter: '.edgt-blog-masonry-grid-gutter'
					}
				});
			});

			var filters = $('.edgt-filter-blog-holder');
			$('.edgt-filter').on('click', function () {
				var filter = $(this);
				var selector = filter.attr('data-filter');
				filters.find('.edgt-active').removeClass('edgt-active');
				filter.addClass('edgt-active');
				container.isotope({filter: selector});
				return false;
			});
		}
	}

	function edgtInitBlogMasonryGallery() {

		var container = $('.edgt-blog-holder.edgt-blog-type-masonry-gallery');
		if (container.length) {
			container.each(function () {
				var thisBlogList = $(this);

				edgtBlogResizeMasonryGallery(thisBlogList);

				edgtBlogInitMasonryGallery(thisBlogList);
				$(window).resize(function () {
					edgtBlogResizeMasonryGallery(thisBlogList);
					edgtBlogInitMasonryGallery(thisBlogList);
				});

				if (!edgt.htmlEl.hasClass('touch')) {
					$(window).load(function(){
						var article = thisBlogList.find('article'),
							offset = article.first().offset().top,
							cycle = 0,
						    n = 0;

						article.each(function(){
						    var currentArticle = $(this);
						    if (currentArticle.offset().top == offset) {
						        cycle ++;
						    }
						});
						
						article.not('edgt-appeared').appear(function(){
						    var currentArticle = $(this);

						    if (n == cycle) {
						        n = 0;
						    }

						    setTimeout(function(){
						        currentArticle.addClass('edgt-appeared')
						    }, n * 200);

						    n++;
						},{accX: 0, accY: edgtGlobalVars.vars.edgtElementAppearAmount});
					});
				}
			});
		}

	}


	function edgtBlogInitMasonryGallery(container) {
		container.waitForImages(function () {
			container.isotope({
				itemSelector: 'article',
				resizable: false,
				layoutMode: 'packery',
				packery: {
					columnWidth: '.edgt-blog-masonry-gallery-grid-sizer'
				}
			});
			container.addClass('edgt-appeared');
		});
	}

	function edgtBlogResizeMasonryGallery(container) {
		var size = container.find('.edgt-blog-masonry-gallery-grid-sizer').width();

		var defaultMasonryItem = container.find('.edgt-post-size-square');
		var largeWidthMasonryItem = container.find('.edgt-post-size-large-width');
		var largeHeightMasonryItem = container.find('.edgt-post-size-large-height');
		var largeWidthHeightMasonryItem = container.find('.edgt-post-size-large-width-height');

		defaultMasonryItem.css('height', size);
		largeWidthMasonryItem.css('height', size);
		largeHeightMasonryItem.css('height', Math.round(2 * size));

		if (edgt.windowWidth > 600) {
			largeWidthHeightMasonryItem.css('height', Math.round(2 * size));
		} else {
			largeWidthHeightMasonryItem.css('height', size);
		}
	}

	/*
	 Initialize load more ajax pagination
	 */
	function edgtInitBlogLoadMore() {
		var blogHolder = $('.edgt-blog-holder.edgt-blog-load-more');

		var loadMoreButton;

		if (blogHolder.hasClass('edgt-blog-type-masonry')) {
			loadMoreButton = blogHolder.next().find('.edgt-btn');
		}
		else {
			loadMoreButton = blogHolder.find('.edgt-load-more-ajax-pagination .edgt-btn');
		}

		// on click initialize ajax pagination
		loadMoreButton.on('click', function (e) {
			e.preventDefault();
			e.stopPropagation();

			edgtInitAjaxPagination(blogHolder, loadMoreButton);

		});
	}

	/*
	 Initialize infinite scroll ajax pagination
	 */

	function edgtGetInfiniteScrollTriggerPosition() {
		var blogHolder = $('.edgt-blog-holder.edgt-blog-infinite-scroll');
		var trigger = $('.edgt-infinite-scroll-trigger');

		if (trigger.length) {
			edgt.window.scroll(function () {
				if (!blogHolder.hasClass('edgt-ajax-started') && (edgt.windowHeight + edgt.window.scrollTop() > trigger.offset().top)) {
					blogHolder.addClass('edgt-ajax-started');
					edgtInitAjaxPagination(blogHolder, '');
				}
			});
		}
	}

	function edgtInitAjaxPagination(container, loadMoreButton) { //if not load more pagination, proceed empty string
		var nextPage;
		var maxNumPages;
		var loadMoreDatta = getBlogAjaxPaginationData(container);
		maxNumPages = container.data('max-pages');
		nextPage = loadMoreDatta.nextPage;

		var nonceHolder = $('body').find('input[name*="edgtf_blog_load_more_nonce_"]');

		console.log(container);

		loadMoreDatta.blog_load_more_id = nonceHolder.attr('name').substring(nonceHolder.attr('name').length - 4, nonceHolder.attr('name').length);
		loadMoreDatta.blog_load_more_nonce = nonceHolder.val();

		if (nextPage <= maxNumPages) {
			var ajaxData = setBlogLoadMoreAjaxData(loadMoreDatta);
			$.ajax({
				type: 'POST',
				data: ajaxData,
				url: EdgeAjaxUrl,
				success: function (data) {
					nextPage++;
					container.data('next-page', nextPage);
					var response = $.parseJSON(data);
					var responseHtml = response.html;
					container.waitForImages(function () {
						if (container.hasClass('edgt-blog-type-masonry')) {
							container.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
							edgtInitBlogMasonry();
						}
						else {
							container.find('article:last').after(responseHtml); // Append the new content
						}
						setTimeout(function () {
							edgt.modules.blog.edgtInitAudioPlayer();
							edgt.modules.common.edgtSlickSlider();
							edgt.modules.common.edgtFluidVideo();
						}, 400);
						container.removeClass('edgt-ajax-started');
					});
				}
			});
		}

		if (nextPage === maxNumPages) {
			if (loadMoreButton !== '') {
				loadMoreButton.hide();
			}
		}

	}

	function getBlogAjaxPaginationData(container) {

		var returnValue = {};

		returnValue.nextPage = '';
		returnValue.number = '';
		returnValue.category = '';
		returnValue.blogType = '';
		returnValue.archiveCategory = '';
		returnValue.archiveAuthor = '';
		returnValue.archiveTag = '';
		returnValue.archiveDay = '';
		returnValue.archiveMonth = '';
		returnValue.archiveYear = '';

		if (typeof container.data('next-page') !== 'undefined' && container.data('next-page') !== false) {
			returnValue.nextPage = container.data('next-page');
		}
		if (typeof container.data('post-number') !== 'undefined' && container.data('post-number') !== false) {
			returnValue.number = container.data('post-number');
		}
		if (typeof container.data('category') !== 'undefined' && container.data('category') !== false) {
			returnValue.category = container.data('category');
		}
		if (typeof container.data('blog-type') !== 'undefined' && container.data('blog-type') !== false) {
			returnValue.blogType = container.data('blog-type');
		}
		if (typeof container.data('archive-category') !== 'undefined' && container.data('archive-category') !== false) {
			returnValue.archiveCategory = container.data('archive-category');
		}
		if (typeof container.data('archive-author') !== 'undefined' && container.data('archive-author') !== false) {
			returnValue.archiveAuthor = container.data('archive-author');
		}
		if (typeof container.data('archive-tag') !== 'undefined' && container.data('archive-tag') !== false) {
			returnValue.archiveTag = container.data('archive-tag');
		}
		if (typeof container.data('archive-day') !== 'undefined' && container.data('archive-day') !== false) {
			returnValue.archiveDay = container.data('archive-day');
		}
		if (typeof container.data('archive-month') !== 'undefined' && container.data('archive-month') !== false) {
			returnValue.archiveMonth = container.data('archive-month');
		}
		if (typeof container.data('archive-year') !== 'undefined' && container.data('archive-year') !== false) {
			returnValue.archiveYear = container.data('archive-year');
		}

		return returnValue;

	}

	function setBlogLoadMoreAjaxData(container) {

		var returnValue = {
			action: 'eldritch_edge_blog_load_more',
			nextPage: container.nextPage,
			number: container.number,
			category: container.category,
			blogType: container.blogType,
			archiveCategory: container.archiveCategory,
			archiveAuthor: container.archiveAuthor,
			archiveTag: container.archiveTag,
			archiveDay: container.archiveDay,
			archiveMonth: container.archiveMonth,
			archiveYear: container.archiveYear,
			blog_load_more_id: container.blog_load_more_id,
			blog_load_more_nonce: container.blog_load_more_nonce
		};

		return returnValue;
	}


})(jQuery);
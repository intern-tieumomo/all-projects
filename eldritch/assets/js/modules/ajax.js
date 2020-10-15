(function ($) {
	'use strict';

	var ajax = {};

	edgt.modules.ajax = ajax;

	var animation = {};
	ajax.animation = animation;

	ajax.edgtFetchPage = edgtFetchPage;
	ajax.edgtInitAjax = edgtInitAjax;
	ajax.edgtHandleLinkClick = edgtHandleLinkClick;
	ajax.edgtInsertFetchedContent = edgtInsertFetchedContent;
	ajax.edgtInitBackBehavior = edgtInitBackBehavior;
	ajax.edgtSetActiveState = edgtSetActiveState;
	ajax.edgtReinitiateAll = edgtReinitiateAll;
	ajax.edgtHandleMeta = edgtHandleMeta;

	ajax.edgtOnDocumentReady = edgtOnDocumentReady;
	ajax.edgtOnWindowLoad = edgtOnWindowLoad;
	ajax.edgtOnWindowResize = edgtOnWindowResize;
	ajax.edgtOnWindowScroll = edgtOnWindowScroll;

	$(document).ready(edgtOnDocumentReady);
	$(window).load(edgtOnWindowLoad);
	$(window).resize(edgtOnWindowResize);
	$(window).scroll(edgtOnWindowScroll);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtOnDocumentReady() {
		edgtInitAjax();
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


	var loadedPageFlag = true; // Indicates whether the page is loaded
	var firstLoad = true; // Indicates whether this is the first loaded page, for back button functionality
	animation.type = null;
	animation.time = 500; // Duration of animation for the content to be changed
	animation.simultaneous = true; // False indicates that the new content should wait for the old content to disappear, true means that it appears at the same time as the old content disappears
	animation.loader = null;
	animation.loaderTime = 500;

	/**
	 * Fetching the targeted page
	 */
	function edgtFetchPage(params, destinationSelector, targetSelector) {

		function setDefaultParam(key, value) {
			params[key] = typeof params[key] !== 'undefined' ? params[key] : value;
		}

		destinationSelector = typeof destinationSelector !== 'undefined' ? destinationSelector : '.edgt-content';
		targetSelector = typeof targetSelector !== 'undefined' ? targetSelector : '.edgt-content';

		// setting default ajax parameters
		params = typeof params !== 'undefined' ? params : {};

		setDefaultParam('url', window.location.href);
		setDefaultParam('type', 'POST');
		setDefaultParam('success', function (response) {
			var jResponse = $(response);

			var meta = jResponse.find('.edgt-meta');
			if (meta.length) {
				edgtHandleMeta(meta);
			}

			var new_content = jResponse.find(targetSelector);
			if (!new_content.length) {
				loadedPageFlag = true;
				return false;
			}
			else {
				edgtInsertFetchedContent(params.url, new_content, destinationSelector);
			}
		});

		// setting data parameters
		setDefaultParam('ajaxReq', 'yes');
		//setDefaultParam('hasHeader', edgt.body.find('header').length ? true : false);
		//setDefaultParam('hasFooter', edgt.body.find('footer').length ? true : false);

		$.ajax({
			url: params.url,
			type: params.type,
			data: {
				ajaxReq: params.ajaxReq
				//hasHeader: params.hasHeader,
				//hasFooter: params.hasFooter
			},
			success: params.success
		});
	}

	function edgtInitAjax() {
		edgt.body.removeClass('page-not-loaded'); // Might be necessary for ajax calls
		animation.loader = $('body > .edgt-smooth-transition-loader.edgt-ajax');
		if (animation.loader.length) {
			animation.loader.fadeOut(animation.loaderTime);
			$(window).focus(function () {
				animation.loader.fadeOut(animation.loaderTime);
			});

			if (edgt.body.hasClass('woocommerce') || edgt.body.hasClass('woocommerce-page')) {
				return false;
			}
			else {
				edgtInitBackBehavior();
				$(document).on('click', 'a[target!="_blank"]:not(.no-ajax):not(.no-link)', function (click) {
					var link = $(this);

					if (click.ctrlKey === 1) { // Check if CTRL key is held with the click
						window.open(link.attr('href'), '_blank');
						return false;
					}

					if (link.parents('.edgt-ptf-load-more').length) {
						return false;
					} // Don't initiate ajax for portfolio load more link

					if (link.parents('.edgt-blog-load-more-button').length) {
						return false;
					} // Don't initiate ajax for blog load more link

					if (link.parents('edgt-post-info-comments').length) { // If it's a comment link, don't load any content, just scroll to the comments section
						var hash = link.attr('href').split("#")[1];
						$('html, body').scrollTop($("#" + hash).offset().top);
						return false;
					}

					if (window.location.href.split('#')[0] == link.attr('href').split('#')[0]) {
						return false;
					} //  If the link leads to the same page, don't use ajax

					if (link.closest('.edgt-no-animation').length === 0) { // If no parents are set to no-animation...

						if (document.location.href.indexOf("?s=") >= 0) { // Don't use ajax if currently on search page
							return true;
						}
						if (link.attr('href').indexOf("wp-admin") >= 0) { // Don't use ajax for wp-admin
							return true;
						}
						if (link.attr('href').indexOf("wp-content") >= 0) { // Don't use ajax for wp-content
							return true;
						}

						if (jQuery.inArray(link.attr('href').split('#')[0], edgtGlobalVars.vars.no_ajax_pages) !== -1) { // If the target page is a no-ajax page, don't use ajax
							document.location.href = link.attr('href');
							return false;
						}

						if ((link.attr('href') !== "http://#") && (link.attr('href') !== "#")) { // Don't use ajax if the link is empty
							//disableHashChange = true;

							var url = link.attr('href');
							var start = url.indexOf(window.location.protocol + '//' + window.location.host); // Check if the link leads to the same domain
							if (start === 0) {
								if (!loadedPageFlag) {
									return false;
								} //if page is not loaded don't load next one
								click.preventDefault();
								click.stopImmediatePropagation();
								click.stopPropagation();
								if (!link.is('.current')) {
									edgtHandleLinkClick(link);
								}
							}

						} else {
							return false;
						}
					}
				});
			}
		}
	}

	function edgtInitBackBehavior() {
		if (window.history.pushState) {
			/* the below code is to override back button to get the ajax content without reload*/
			$(window).on('popstate', function () {

				var url = location.href;
				if (!firstLoad && loadedPageFlag) {
					loadedPageFlag = false;
					edgtFetchPage({
						url: url
					});
				}
			});
		}
	}

	function edgtHandleLinkClick(link) {
		loadedPageFlag = false;
		animation.loader.fadeIn(animation.loaderTime);
		edgtFetchPage({
			url: link.attr('href')
		});
	}

	function edgtSetActiveState(url) {
		var me = $("nav a[href='" + url + "'], .widget_nav_menu a[href='" + url + "']");

		$('.edgt-main-menu a, .edgt-mobile-nav a, .edgt-mobile-nav h4, .edgt-vertical-menu a, .popup_menu a, .widget_nav_menu a').removeClass('current').parent().removeClass('edgt-active-item');
		//$('.main_menu a, .mobile_menu a, .mobile_menu h4, .vertical_menu a, .popup_menu a').parent().removeClass('active');
		$('.widget_nav_menu ul.menu > li').removeClass('current-menu-item');

		me.each(function () {
			var me = $(this);

			if (me.closest('.second').length === 0) {
				me.parent().addClass('edgt-active-item');
			} else {
				me.closest('.second').parent().addClass('edgt-active-item');
			}

			if (me.closest('.edgt-mobile-nav').length > 0) {
				me.closest('.level0').addClass('edgt-active-item');
				me.closest('.level1').addClass('edgt-active-item');
				me.closest('.level2').addClass('edgt-active-item');
			}

			if (me.closest('.widget_nav_menu').length > 0) {
				me.closest('.widget_nav_menu').find('.menu-item').addClass('current-menu-item');
			}


			//$('.edgt-main-menu a, .edgt-mobile-nav a, .edgt-vertical-menu a, .popup_menu a').removeClass('current');
			me.addClass('current');
		});
	}

	function edgtReinitiateAll() {
		$(document).off(); // Remove all event handlers before reinitialization
		$(window).off();
		edgt.body.off().find('*').off(); // Remove all event handlers before reinitialization

		edgt.edgtOnDocumentReady();
		edgt.edgtOnWindowLoad();
		edgt.edgtOnWindowResize();
		edgt.edgtOnWindowScroll();

		var modules = ['common', 'ajax', 'header', 'title', 'shortcodes', 'woocommerce', 'portfolio', 'blog', 'like'];
		for (var i = 0; i < modules.length; i++) {
			if (1 || typeof edgt.modules[modules[i]] !== 'undefined') {
				edgt.modules[modules[i]].edgtOnDocumentReady();
				edgt.modules[modules[i]].edgtOnWindowLoad();
				edgt.modules[modules[i]].edgtOnWindowResize();
				edgt.modules[modules[i]].edgtOnWindowScroll();
			}
		}
	}

	function edgtHandleMeta(meta_data) {
		// set up title, meta description and meta keywords
		var newTitle = meta_data.find(".edgt-seo-title").text();
		var pageTransition = meta_data.find(".edgt-page-transition").text();
		var newDescription = meta_data.find(".edgt-seo-description").text();
		var newKeywords = meta_data.find(".edgt-seo-keywords").text();
		if (typeof pageTransition !== 'undefined') {
			animation.type = pageTransition;
		}
		if ($('head meta[name="description"]').length) {
			$('head meta[name="description"]').attr('content', newDescription);
		} else if (typeof newDescription !== 'undefined') {
			$('<meta name="description" content="' + newDescription + '">').prependTo($('head'));
		}
		if ($('head meta[name="keywords"]').length) {
			$('head meta[name="keywords"]').attr('content', newKeywords);
		} else if (typeof newKeywords !== 'undefined') {
			$('<meta name="keywords" content="' + newKeywords + '">').prependTo($('head'));
		}
		document.title = newTitle;

		var newBodyClasses = meta_data.find(".edgt-body-classes").text();
		var myArray = newBodyClasses.split(',');
		edgt.body.removeClass();
		for (var i = 0; i < myArray.length; i++) {
			if (myArray[i] !== "edgt-page-not-loaded") {
				edgt.body.addClass(myArray[i]);
			}
		}

		if ($("#wp-admin-bar-edit").length > 0) {
			// set up edit link when wp toolbar is enabled
			var pageId = meta_data.find("#edgt-page-id").text();
			var old_link = $('#wp-admin-bar-edit a').attr("href");
			var new_link = old_link.replace(/(post=).*?(&)/, '$1' + pageId + '$2');
			$('#wp-admin-bar-edit a').attr("href", new_link);
		}
	}

	function edgtInsertFetchedContent(url, new_content, destinationSelector) {
		destinationSelector = typeof destinationSelector !== 'undefined' ? destinationSelector : '.edgt-content';
		var destination = edgt.body.find(destinationSelector);

		new_content.height(destination.height()).css({
			'position': 'absolute',
			'opacity': 0,
			'overflow': 'hidden'
		}).insertBefore(destination);

		new_content.waitForImages(function () {
			if (url.indexOf('#') !== -1) {
				$('<a class="edgt-temp-anchor edgt-anchor" href="' + url + '" style="display: none"></a>').appendTo('body');
			}
			edgtReinitiateAll();

			if (animation.type == "fade") {
				destination.stop().fadeTo(animation.time, 0, function () {
					destination.remove();
					if (window.history.pushState) {
						if (url !== window.location.href) {
							window.history.pushState({path: url}, '', url);
						}

						//does Google Analytics code exists on page?
						if (typeof _gaq !== 'undefined') {
							//add new url to Google Analytics so it can be tracked
							_gaq.push(['_trackPageview', url]);
						}
					} else {
						document.location.href = window.location.protocol + '//' + window.location.host + '#' + url.split(window.location.protocol + '//' + window.location.host)[1];
					}
					edgtSetActiveState(url);
					edgt.body.animate({scrollTop: 0}, animation.time, 'swing');
				});
				setTimeout(function () {
					new_content.css('position', 'relative').height('').stop().fadeTo(animation.time, 1, function () {
						loadedPageFlag = true;
						firstLoad = false;
						animation.loader.fadeOut(animation.loaderTime, function () {
							var anch = $('.edgt-temp-anchor');
							if (anch.length) {
								anch.trigger('click').remove();
							}
						});
					});
				}, !animation.simultaneous * animation.time);
			}
		});
	}


})(jQuery);
(function ($) {
	"use strict";

	var header = {};
	edgt.modules.header = header;

	header.isStickyVisible = false;
	header.stickyAppearAmount = 0;
	header.behaviour = '';
	header.edgtSideArea = edgtSideArea;
	header.edgtSideAreaScroll = edgtSideAreaScroll;
	header.edgtFullscreenMenu = edgtFullscreenMenu;
	header.edgtInitMobileNavigation = edgtInitMobileNavigation;
	header.edgtMobileHeaderBehavior = edgtMobileHeaderBehavior;
	header.edgtSetDropDownMenuPosition = edgtSetDropDownMenuPosition;
	header.edgtDropDownMenu = edgtDropDownMenu;
	header.edgtSearch = edgtSearch;

	header.edgtOnDocumentReady = edgtOnDocumentReady;
	header.edgtOnWindowLoad = edgtOnWindowLoad;
	header.edgtOnWindowResize = edgtOnWindowResize;
	header.edgtOnWindowScroll = edgtOnWindowScroll;

	$(document).ready(edgtOnDocumentReady);
	$(window).load(edgtOnWindowLoad);
	$(window).resize(edgtOnWindowResize);
	$(window).scroll(edgtOnWindowScroll);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtOnDocumentReady() {
		edgtHeaderBehaviour();
		edgtSideArea();
		edgtSideAreaScroll();
		edgtFullscreenMenu();
		edgtInitMobileNavigation();
		edgtMobileHeaderBehavior();
		edgtSetDropDownMenuPosition();
		edgtDropDownMenu();
		edgtSearch();
		edgtVerticalMenu().init();
	}

	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	function edgtOnWindowLoad() {
		edgtSetDropDownMenuPosition();
	}

	/*
	 All functions to be called on $(window).resize() should be in this function
	 */
	function edgtOnWindowResize() {
		edgtDropDownMenu();
	}

	/*
	 All functions to be called on $(window).scroll() should be in this function
	 */
	function edgtOnWindowScroll() {

	}


	/*
	 **	Show/Hide sticky header on window scroll
	 */
	function edgtHeaderBehaviour() {

		var header = $('.edgt-page-header');
		var stickyHeader = $('.edgt-sticky-header');
		var fixedHeaderWrapper = $('.edgt-fixed-wrapper');

		var headerMenuAreaOffset = $('.edgt-page-header').find('.edgt-fixed-wrapper').length ? $('.edgt-page-header').find('.edgt-fixed-wrapper').offset().top : null;

		var stickyAppearAmount;
        var headerAppear;


		switch (true) {
			// sticky header that will be shown when user scrolls up
			case edgt.body.hasClass('edgt-sticky-header-on-scroll-up'):
				edgt.modules.header.behaviour = 'edgt-sticky-header-on-scroll-up';
				var docYScroll1 = $(document).scrollTop();
				stickyAppearAmount = edgtGlobalVars.vars.edgtTopBarHeight + edgtGlobalVars.vars.edgtLogoAreaHeight + edgtGlobalVars.vars.edgtMenuAreaHeight + edgtGlobalVars.vars.edgtStickyHeaderHeight;

				headerAppear = function () {
					var docYScroll2 = $(document).scrollTop();

					if ((docYScroll2 > docYScroll1 && docYScroll2 > stickyAppearAmount) || (docYScroll2 < stickyAppearAmount)) {
						edgt.modules.header.isStickyVisible = false;
						stickyHeader.removeClass('header-appear').find('.edgt-main-menu .second').removeClass('edgt-drop-down-start');
					} else {
						edgt.modules.header.isStickyVisible = true;
						stickyHeader.addClass('header-appear');
					}

					docYScroll1 = $(document).scrollTop();
				};
				headerAppear();

				$(window).scroll(function () {
					headerAppear();
				});

				break;

			// sticky header that will be shown when user scrolls both up and down
			case edgt.body.hasClass('edgt-sticky-header-on-scroll-down-up'):
				var setStickyScrollAmount = function () {
					var amount;

					if (isStickyAmountFullScreen()) {
						amount = edgt.window.height();
					} else {
						if (edgtPerPageVars.vars.edgtStickyScrollAmount !== 0) {
							amount = edgtPerPageVars.vars.edgtStickyScrollAmount;
						} else {
							amount = edgtGlobalVars.vars.edgtTopBarHeight + edgtGlobalVars.vars.edgtLogoAreaHeight + edgtGlobalVars.vars.edgtMenuAreaHeight;
						}
					}

					stickyAppearAmount = amount;
				};

				var isStickyAmountFullScreen = function () {
					var fullScreenStickyAmount = edgtPerPageVars.vars.edgtStickyScrollAmountFullScreen;

					return typeof fullScreenStickyAmount !== 'undefined' && fullScreenStickyAmount === true;
				};

				edgt.modules.header.behaviour = 'edgt-sticky-header-on-scroll-down-up';
				setStickyScrollAmount();
				edgt.modules.header.stickyAppearAmount = stickyAppearAmount; //used in anchor logic

				headerAppear = function () {
					if (edgt.scroll < stickyAppearAmount) {
						edgt.modules.header.isStickyVisible = false;
						stickyHeader.removeClass('header-appear').find('.edgt-main-menu .second').removeClass('edgt-drop-down-start');
					} else {
						edgt.modules.header.isStickyVisible = true;
						stickyHeader.addClass('header-appear');
					}
				};

				headerAppear();

				$(window).scroll(function () {
					headerAppear();
				});

				break;

			// on scroll down, part of header will be sticky
			case edgt.body.hasClass('edgt-fixed-on-scroll'):
				edgt.modules.header.behaviour = 'edgt-fixed-on-scroll';
				var headerFixed = function () {
					if (edgt.scroll < headerMenuAreaOffset) {
						fixedHeaderWrapper.removeClass('fixed');
						header.css('margin-bottom', 0);
					}
					else {
						fixedHeaderWrapper.addClass('fixed');
						header.css('margin-bottom', fixedHeaderWrapper.height());
					}
				};

				headerFixed();

				$(window).scroll(function () {
					headerFixed();
				});

				break;
		}
	}

	/**
	 * Show/hide side area
	 */
	function edgtSideArea() {

		var wrapper = $('.edgt-wrapper'),
			sideMenu = $('.edgt-side-menu'),
			sideMenuButtonOpen = $('a.edgt-side-menu-button-opener'),
			cssClass,
		//Flags
			slideFromRight = false,
			slideWithContent = false,
			slideUncovered = false;

		if (edgt.body.hasClass('edgt-side-menu-slide-from-right')) {

			cssClass = 'edgt-right-side-menu-opened';
			wrapper.prepend('<div class="edgt-cover"/>');
			slideFromRight = true;

		} else if (edgt.body.hasClass('edgt-side-menu-slide-with-content')) {

			cssClass = 'edgt-side-menu-open';
			slideWithContent = true;

		} else if (edgt.body.hasClass('edgt-side-area-uncovered-from-content')) {

			cssClass = 'edgt-right-side-menu-opened';
			slideUncovered = true;

		}

		$('a.edgt-side-menu-button-opener, a.edgt-close-side-menu').on('click', function (e) {
			e.preventDefault();

			if (!sideMenuButtonOpen.hasClass('opened')) {

				sideMenuButtonOpen.addClass('opened');
				edgt.body.addClass(cssClass);

				if (slideFromRight) {
					$('.edgt-wrapper .edgt-cover').on('click', function () {
						edgt.body.removeClass('edgt-right-side-menu-opened');
						sideMenuButtonOpen.removeClass('opened');
					});
				}

				if (slideUncovered) {
					sideMenu.css({
						'visibility': 'visible'
					});
				}

				var currentScroll = $(window).scrollTop();
				$(window).scroll(function () {
					if (Math.abs(edgt.scroll - currentScroll) > 400) {
						edgt.body.removeClass(cssClass);
						sideMenuButtonOpen.removeClass('opened');
						if (slideUncovered) {
							var hideSideMenu = setTimeout(function () {
								sideMenu.css({'visibility': 'hidden'});
								clearTimeout(hideSideMenu);
							}, 400);
						}
					}
				});

			} else {

				sideMenuButtonOpen.removeClass('opened');
				edgt.body.removeClass(cssClass);
				if (slideUncovered) {
					var hideSideMenu = setTimeout(function () {
						sideMenu.css({'visibility': 'hidden'});
						clearTimeout(hideSideMenu);
					}, 400);
				}

			}

			if (slideWithContent) {

				e.stopPropagation();
				wrapper.on('click', function () {
					e.preventDefault();
					sideMenuButtonOpen.removeClass('opened');
					edgt.body.removeClass('edgt-side-menu-open');
				});

			}

		});

	}

	/*
	 **  Smooth scroll functionality for Side Area
	 */
	function edgtSideAreaScroll() {

		var sideMenu = $('.edgt-side-menu');

		if (sideMenu.length) {
			sideMenu.niceScroll({
				scrollspeed: 60,
				mousescrollstep: 40,
				cursorwidth: 0,
				cursorborder: 0,
				cursorborderradius: 0,
				cursorcolor: "transparent",
				autohidemode: false,
				horizrailenabled: false
			});
		}
	}

	/**
	 * Init Fullscreen Menu
	 */
	function edgtFullscreenMenu() {

		if ($('a.edgt-fullscreen-menu-opener').length) {

			var popupMenuOpener = $('a.edgt-fullscreen-menu-opener'),
				popupMenuHolderOuter = $(".edgt-fullscreen-menu-holder-outer"),
				cssClass,
			//Flags for type of animation
				fadeRight = false,
				fadeTop = false,
			//Widgets
				widgetAboveNav = $('.edgt-fullscreen-above-menu-widget-holder'),
				widgetBelowNav = $('.edgt-fullscreen-below-menu-widget-holder'),
			//Menu
				menuItems = $('.edgt-fullscreen-menu-holder-outer nav > ul > li > a'),
				menuItemWithChild = $('.edgt-fullscreen-menu > ul li.has_sub > a'),
				menuItemWithoutChild = $('.edgt-fullscreen-menu ul li:not(.has_sub) a');


			//set height of popup holder and initialize nicescroll
			popupMenuHolderOuter.height(edgt.windowHeight).niceScroll({
				scrollspeed: 30,
				mousescrollstep: 20,
				cursorwidth: 0,
				cursorborder: 0,
				cursorborderradius: 0,
				cursorcolor: "transparent",
				autohidemode: false,
				horizrailenabled: false
			}); //200 is top and bottom padding of holder

			//set height of popup holder on resize
			$(window).resize(function () {
				popupMenuHolderOuter.height(edgt.windowHeight);
			});

			if (edgt.body.hasClass('edgt-fade-push-text-right')) {
				cssClass = 'edgt-push-nav-right';
				fadeRight = true;
			} else if (edgt.body.hasClass('edgt-fade-push-text-top')) {
				cssClass = 'edgt-push-text-top';
				fadeTop = true;
			}

			//Appearing animation
			if (fadeRight || fadeTop) {
				if (widgetAboveNav.length) {
					widgetAboveNav.children().css({
						'-webkit-animation-delay': 0 + 'ms',
						'-moz-animation-delay': 0 + 'ms',
						'animation-delay': 0 + 'ms'
					});
				}
				menuItems.each(function (i) {
					$(this).css({
						'-webkit-animation-delay': (i + 1) * 70 + 'ms',
						'-moz-animation-delay': (i + 1) * 70 + 'ms',
						'animation-delay': (i + 1) * 70 + 'ms'
					});
				});
				if (widgetBelowNav.length) {
					widgetBelowNav.children().css({
						'-webkit-animation-delay': (menuItems.length + 1) * 70 + 'ms',
						'-moz-animation-delay': (menuItems.length + 1) * 70 + 'ms',
						'animation-delay': (menuItems.length + 1) * 70 + 'ms'
					});
				}
			}

			// Open popup menu
			popupMenuOpener.on('click', function (e) {
				e.preventDefault();

				var closeFS = function () {
					popupMenuOpener.removeClass('opened');
					edgt.body.removeClass('edgt-fullscreen-menu-opened');
					edgt.body.removeClass('edgt-fullscreen-fade-in').addClass('edgt-fullscreen-fade-out');
					edgt.body.addClass(cssClass);
					if (!edgt.body.hasClass('page-template-full_screen-php')) {
						edgt.modules.common.edgtEnableScroll();
					}
					$("nav.edgt-fullscreen-menu ul.sub_menu").slideUp(200, function () {
						$('nav.popup_menu').getNiceScroll().resize();
					});
				};

				var openFS = function () {
					popupMenuOpener.addClass('opened');
					edgt.body.addClass('edgt-fullscreen-menu-opened');
					edgt.body.removeClass('edgt-fullscreen-fade-out').addClass('edgt-fullscreen-fade-in');
					edgt.body.removeClass(cssClass);
					if (!edgt.body.hasClass('page-template-full_screen-php')) {
						edgt.modules.common.edgtDisableScroll();
					}
				};

				if (!popupMenuOpener.hasClass('opened')) {
					openFS();
					$(document).keyup(function (e) {
						if (e.keyCode === 27) {
							closeFS();
						}
					});
				} else {
					closeFS();
				}

				$(document).mouseup(function (e) {
					var container = $(".edgt-fullscreen-menu, .edgt-fullscreen-menu-opener");
					if (!container.is(e.target) && container.has(e.target).length === 0) {
						closeFS();
					}
				});
			});

			//logic for open sub menus in popup menu
			menuItemWithChild.on('tap click', function (e) {
				e.preventDefault();

				if ($(this).parent().hasClass('has_sub')) {
					var submenu = $(this).parent().find('> ul.sub_menu');
					if (submenu.is(':visible')) {
						submenu.slideUp(200, function () {
							popupMenuHolderOuter.getNiceScroll().resize();
						});
						$(this).parent().removeClass('open_sub');
					} else {

					    // close other sub menus
                        $(this).parent().parent().find('.open_sub > ul.sub_menu').slideUp(200, function () {
                            popupMenuHolderOuter.getNiceScroll().resize();
                        });
                        $(this).parent().parent().children('.open_sub').removeClass('open_sub');


                        $(this).parent().addClass('open_sub');
						submenu.slideDown(200, function () {
							popupMenuHolderOuter.getNiceScroll().resize();
						});
					}
				}
				return false;
			});

			//if link has no submenu and if it's not dead, than open that link
			menuItemWithoutChild.on('click', function (e) {

				if (($(this).attr('href') !== "http://#") && ($(this).attr('href') !== "#")) {

					if (e.which === 1) {
						popupMenuOpener.removeClass('opened');
						edgt.body.removeClass('edgt-fullscreen-menu-opened');
						edgt.body.removeClass('edgt-fullscreen-fade-in').addClass('edgt-fullscreen-fade-out');
						edgt.body.addClass(cssClass);
						$("nav.edgt-fullscreen-menu ul.sub_menu").slideUp(200, function () {
							$('nav.popup_menu').getNiceScroll().resize();
						});
						edgt.modules.common.edgtEnableScroll();
					}
				} else {
					return false;
				}

			});

		}


	}

	function edgtInitMobileNavigation() {
		var navigationOpener = $('.edgt-mobile-header .edgt-mobile-menu-opener');
		var navigationHolder = $('.edgt-mobile-header .edgt-mobile-nav');
		var dropdownOpener = $('.edgt-mobile-nav .mobile_arrow, .edgt-mobile-nav h4, .edgt-mobile-nav a[href*="#"]');
		var animationSpeed = 200;

		//whole mobile menu opening / closing
		if (navigationOpener.length && navigationHolder.length) {
			navigationOpener.on('tap click', function (e) {
				e.stopPropagation();
				e.preventDefault();

				if (navigationHolder.is(':visible')) {
					navigationHolder.slideUp(animationSpeed);
				} else {
					navigationHolder.slideDown(animationSpeed);
				}
			});
		}

		//dropdown opening / closing
		if (dropdownOpener.length) {
			dropdownOpener.each(function () {
				$(this).on('tap click', function (e) {
					var dropdownToOpen = $(this).nextAll('ul').first();

					if (dropdownToOpen.length) {
						e.preventDefault();
						e.stopPropagation();

						var openerParent = $(this).parent('li');
						if (dropdownToOpen.is(':visible')) {
							dropdownToOpen.slideUp(animationSpeed);
							openerParent.removeClass('edgt-opened');
						} else {
							dropdownToOpen.slideDown(animationSpeed);
							openerParent.addClass('edgt-opened');
						}
					}

				});
			});
		}

		$('.edgt-mobile-nav a, .edgt-mobile-logo-wrapper a').on('click tap', function (e) {
			if ($(this).attr('href') !== 'http://#' && $(this).attr('href') !== '#') {
				navigationHolder.slideUp(animationSpeed);
			}
		});
	}

	function edgtMobileHeaderBehavior() {
		if (edgt.body.hasClass('edgt-sticky-up-mobile-header')) {
			var stickyAppearAmount;
			var mobileHeader = $('.edgt-mobile-header');
			var adminBar = $('#wpadminbar');
			var mobileHeaderHeight = mobileHeader.length ? mobileHeader.height() : 0;
			var adminBarHeight = adminBar.length ? adminBar.height() : 0;

			var docYScroll1 = $(document).scrollTop();
			stickyAppearAmount = mobileHeaderHeight + adminBarHeight;

			$(window).scroll(function () {
				var docYScroll2 = $(document).scrollTop();

				if (docYScroll2 > stickyAppearAmount) {
					mobileHeader.addClass('edgt-animate-mobile-header');
				} else {
					mobileHeader.removeClass('edgt-animate-mobile-header');
				}

				if ((docYScroll2 > docYScroll1 && docYScroll2 > stickyAppearAmount) || (docYScroll2 < stickyAppearAmount)) {
					mobileHeader.removeClass('mobile-header-appear');
					mobileHeader.css('margin-bottom', 0);

					if (adminBar.length) {
						mobileHeader.find('.edgt-mobile-header-inner').css('top', 0);
					}
				} else {
					mobileHeader.addClass('mobile-header-appear');
					mobileHeader.css('margin-bottom', stickyAppearAmount);

					//if(adminBar.length) {
					//    mobileHeader.find('.edgt-mobile-header-inner').css('top', adminBarHeight);
					//}
				}

				docYScroll1 = $(document).scrollTop();
			});
		}

	}


	/**
	 * Set dropdown position
	 */
	function edgtSetDropDownMenuPosition() {

		var menuItems = $(".edgt-drop-down > ul > li.narrow");
		menuItems.each(function (i) {

			var browserWidth = edgt.windowWidth - 16; // 16 is width of scroll bar
			var menuItemPosition = $(this).offset().left;
			var dropdownMenuWidth = $(this).find('.second .inner ul').width();

			var menuItemFromLeft = 0;
			if (edgt.body.hasClass('boxed')) {
				menuItemFromLeft = edgt.boxedLayoutWidth - (menuItemPosition - (browserWidth - edgt.boxedLayoutWidth ) / 2);
			} else {
				menuItemFromLeft = browserWidth - menuItemPosition;
			}

			var dropDownMenuFromLeft; //has to stay undefined beacuse 'dropDownMenuFromLeft < dropdownMenuWidth' condition will be true

			if ($(this).find('li.sub').length > 0) {
				dropDownMenuFromLeft = menuItemFromLeft - dropdownMenuWidth;
			}

			if (menuItemFromLeft < dropdownMenuWidth || dropDownMenuFromLeft < dropdownMenuWidth) {
				$(this).find('.second').addClass('right');
				$(this).find('.second .inner ul').addClass('right');
			}
		});

	}


	function edgtDropDownMenu() {

		var menu_items = $('.edgt-drop-down > ul > li');

		menu_items.each(function (i) {
			if ($(menu_items[i]).find('.second').length > 0) {

				var dropDownSecondDiv = $(menu_items[i]).find('.second');

				if ($(menu_items[i]).hasClass('wide')) {

					var dropdown = $(this).find('.inner > ul');
					var dropdownPadding = parseInt(dropdown.css('padding-left').slice(0, -2)) + parseInt(dropdown.css('padding-right').slice(0, -2));
					var dropdownWidth = dropdown.outerWidth();

					if (!$(this).hasClass('left_position') && !$(this).hasClass('right_position')) {
						dropDownSecondDiv.css('left', 0);
					}

					//set columns to be same height - start
					var tallest = 0;
					$(this).find('.second > .inner > ul > li').each(function () {
						var thisHeight = $(this).height();
						if (thisHeight > tallest) {
							tallest = thisHeight;
						}
					});
					$(this).find('.second > .inner > ul > li').css("height", ""); // delete old inline css - via resize
					$(this).find('.second > .inner > ul > li').height(tallest);
					//set columns to be same height - end

					if (!edgt.body.hasClass('edgt-full-width-wide-menu') || edgt.body.hasClass('edgt-boxed')) {
						if (!$(this).hasClass('left_position') && !$(this).hasClass('right_position')) {
							setTimeout(function () {
								var left_position = (edgt.windowWidth - 2 * (edgt.windowWidth - dropdown.offset().left)) / 2 + (dropdownWidth + dropdownPadding) / 2;
								dropDownSecondDiv.css('left', -left_position);
							}, 300);
						}
					} else {
						if (!$(this).hasClass('left_position') && !$(this).hasClass('right_position')) {
							setTimeout(function () {
								var left_position = dropdown.offset().left;

								dropDownSecondDiv.css('left', -left_position);
								dropDownSecondDiv.css('width', edgt.windowWidth);
							}, 300);
						}
					}
				}

				if (!edgt.menuDropdownHeightSet) {
					$(menu_items[i]).data('original_height', dropDownSecondDiv.height() + 'px');
					dropDownSecondDiv.height(0);
				}

				if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
					$(menu_items[i]).on("touchstart mouseenter", function () {
						dropDownSecondDiv.css({
							'height': $(menu_items[i]).data('original_height'),
							'overflow': 'visible',
							'visibility': 'visible',
							'opacity': '1'
						});
					}).on("mouseleave", function () {
						dropDownSecondDiv.css({
							'height': '0px',
							'overflow': 'hidden',
							'visibility': 'hidden',
							'opacity': '0'
						});
					});

				} else {
					if (edgt.body.hasClass('edgt-dropdown-animate-height')) {
						$(menu_items[i]).mouseenter(function () {
							dropDownSecondDiv.css({
								'visibility': 'visible',
								'height': '0px',
								'opacity': '0'
							});
							dropDownSecondDiv.stop().animate({
								'height': $(menu_items[i]).data('original_height'),
								opacity: 1
							}, 200, function () {
								dropDownSecondDiv.css('overflow', 'visible');
							});
						}).mouseleave(function () {
							dropDownSecondDiv.stop().animate({
								'height': '0px'
							}, 0, function () {
								dropDownSecondDiv.css({
									'overflow': 'hidden',
									'visibility': 'hidden'
								});
							});
						});
					} else {
						var config = {
							interval: 0,
							over: function () {
								setTimeout(function () {
									dropDownSecondDiv.addClass('edgt-drop-down-start');
									dropDownSecondDiv.stop().css({'height': $(menu_items[i]).data('original_height')});
								}, 150);
							},
							timeout: 150,
							out: function () {
								dropDownSecondDiv.stop().css({'height': '0px'});
								dropDownSecondDiv.removeClass('edgt-drop-down-start');
							}
						};
						$(menu_items[i]).hoverIntent(config);
					}
				}
			}
		});
		$('.edgt-drop-down ul li.wide ul li a').on('click', function (e) {
			if (e.which === 1) {
				var $this = $(this);
				setTimeout(function () {
					$this.mouseleave();
				}, 500);
			}
		});

		edgt.menuDropdownHeightSet = true;
	}

	/**
	 * Init Search Types
	 */
	function edgtSearch() {

		var searchOpener = $('a.edgt-search-opener'),
			searchClose,
			searchForm,
			touch = false;

		if ($('html').hasClass('touch')) {
			touch = true;
		}

		if (searchOpener.length > 0) {
			//Check for type of search
			if (edgt.body.hasClass('edgt-fullscreen-search')) {

				edgtFullscreenSearch();

			} else if (edgt.body.hasClass('edgt-search-slides-from-window-top')) {

				searchForm = $('.edgt-search-slide-window-top');
				searchClose = $('.edgt-search-close');
				edgtSearchWindowTop();

			} else if (edgt.body.hasClass('edgt-search-covers-header')) {

				edgtSearchCoversHeader();

			}

			//Check for hover color of search
			if (typeof searchOpener.data('hover-color') !== 'undefined') {
				var changeSearchColor = function (event) {
					event.data.searchOpener.css('color', event.data.color);
				};

				var originalColor = searchOpener.css('color');
				var hoverColor = searchOpener.data('hover-color');

				searchOpener.on('mouseenter', {searchOpener: searchOpener, color: hoverColor}, changeSearchColor);
				searchOpener.on('mouseleave', {searchOpener: searchOpener, color: originalColor}, changeSearchColor);
			}

		}

		/**
		 * Search slides from window top type of search
		 */
		function edgtSearchWindowTop() {

			searchOpener.on('click', function (e) {
				e.preventDefault();

				var yPos = 0;
				if ($('.title').hasClass('has_parallax_background')) {
					yPos = parseInt($('.title.has_parallax_background').css('backgroundPosition').split(" ")[1]);
				}

				if (searchForm.height() === 0) {
					$('.edgt-search-slide-window-top input[type="text"]').focus();
					//Push header bottom
					edgt.body.addClass('edgt-search-open');
					$('.title.has_parallax_background').animate({
						'background-position-y': (yPos + 50) + 'px'
					}, 150);
				} else {
					edgt.body.removeClass('edgt-search-open');
					$('.title.has_parallax_background').animate({
						'background-position-y': (yPos - 50) + 'px'
					}, 150);
				}

				$(window).scroll(function () {
					if (searchForm.height() !== 0 && edgt.scroll > 50) {
						edgt.body.removeClass('edgt-search-open');
						$('.title.has_parallax_background').css('backgroundPosition', 'center ' + (yPos) + 'px');
					}
				});

				searchClose.on('click', function (e) {
					e.preventDefault();
					edgt.body.removeClass('edgt-search-open');
					$('.title.has_parallax_background').animate({
						'background-position-y': (yPos) + 'px'
					}, 150);
				});

			});
		}

		/**
		 * Search covers header type of search
		 */
		function edgtSearchCoversHeader() {

			searchOpener.on('click', function (e) {
				e.preventDefault();
				var searchFormHeight,
					searchFormHolder = $('.edgt-search-cover .edgt-form-holder-outer'),
					searchForm,
					searchFormLandmark; // there is one more div element if header is in grid

				if ($(this).closest('.edgt-grid').length) {
					searchForm = $(this).closest('.edgt-grid').children().first();
					searchFormLandmark = searchForm.parent();
				}
				else {
					searchForm = $(this).closest('.edgt-menu-area').children().first();
					searchFormLandmark = searchForm;
				}

				if ($(this).closest('.edgt-sticky-header').length > 0) {
					searchForm = $(this).closest('.edgt-sticky-header').children().first();
				}
				if ($(this).closest('.edgt-mobile-header').length > 0) {
					searchForm = $(this).closest('.edgt-mobile-header').children().children().first();
				}

				//Find search form position in header and height
				if (searchFormLandmark.parent().hasClass('edgt-logo-area')) {
					searchFormHeight = edgtGlobalVars.vars.edgtLogoAreaHeight;
				} else if (searchFormLandmark.parent().hasClass('edgt-top-bar')) {
					searchFormHeight = edgtGlobalVars.vars.edgtTopBarHeight;
				} else if (searchFormLandmark.parent().hasClass('edgt-menu-area')) {
					searchFormHeight = edgtGlobalVars.vars.edgtMenuAreaHeight;
				} else if (searchFormLandmark.hasClass('edgt-sticky-header')) {
					searchFormHeight = edgtGlobalVars.vars.edgtMenuAreaHeight;
				} else if (searchFormLandmark.parent().hasClass('edgt-mobile-header')) {
					searchFormHeight = $('.edgt-mobile-header-inner').height();
				}

				searchFormHolder.height(searchFormHeight);
				searchForm.stop(true).fadeIn(600);
				$('.edgt-search-cover input[type="text"]').focus();
				$('.edgt-search-close, .content, footer').on('click', function (e) {
					e.preventDefault();
					searchForm.stop(true).fadeOut(450);
				});
				searchForm.blur(function () {
					searchForm.stop(true).fadeOut(450);
				});
			});

		}

		/**
		 * Fullscreen search (two types: fade and from circle)
		 */
		function edgtFullscreenSearch(fade, fromCircle) {

			var searchHolder = $('.edgt-fullscreen-search-holder'),
				searchOverlay = $('.edgt-fullscreen-search-overlay'),
				fieldHolder = searchHolder.find('.edgt-field-holder');

			searchOpener.on('click', function (e) {
				e.preventDefault();

				//Fullscreen search fade
				if (searchHolder.hasClass('edgt-animate')) {
					searchClose();
				} else {
					searchOpen();
				}

				//Close on click away
				$(document).mouseup(function (e) {
					if (!fieldHolder.is(e.target) && fieldHolder.has(e.target).length === 0) {
						e.preventDefault();
						searchClose();
					}
				});
				//Close on escape
				$(document).keyup(function (e) {
					if (e.keyCode === 27) { //KeyCode for ESC button is 27
						searchClose();
					}
				});

				function searchClose() {
					edgt.body.removeClass('edgt-fullscreen-search-opened');
					searchHolder.removeClass('edgt-animate');
					edgt.body.removeClass('edgt-search-fade-in');
					edgt.body.addClass('edgt-search-fade-out');
					if (!edgt.body.hasClass('page-template-full_screen-php')) {
						edgt.modules.common.edgtEnableScroll();
					}
					fieldHolder.find('.edgt-search-field').blur().val('');
				}

				function searchOpen() {
					edgt.body.addClass('edgt-fullscreen-search-opened');
					edgt.body.removeClass('edgt-search-fade-out');
					edgt.body.addClass('edgt-search-fade-in');
					searchHolder.addClass('edgt-animate');
					if (!edgt.body.hasClass('page-template-full_screen-php')) {
						edgt.modules.common.edgtDisableScroll();
					}
					setTimeout(function () {
						fieldHolder.find('.edgt-search-field').focus();
					}, 400);
				}

			});

			//Text input focus change
			$('.edgt-fullscreen-search-holder .edgt-search-field').focus(function () {
				$('.edgt-fullscreen-search-holder .edgt-field-holder .edgt-line').css("width", "100%");
			});

			$('.edgt-fullscreen-search-holder .edgt-search-field').blur(function () {
				$('.edgt-fullscreen-search-holder .edgt-field-holder .edgt-line').css("width", "0");
			});

		}

	}

	/**
	 * Function object that represents vertical menu area.
	 * @returns {{init: Function}}
	 */
	var edgtVerticalMenu = function () {
		/**
		 * Main vertical area object that used through out function
		 * @type {jQuery object}
		 */
		var verticalMenuObject = $('.edgt-vertical-menu-area');

		/**
		 * Resizes vertical area. Called whenever height of navigation area changes
		 * It first check if vertical area is scrollable, and if it is resizes scrollable area
		 */
		var resizeVerticalArea = function () {

		};

		/**
		 * Checks if vertical area is scrollable (if it has edgt-with-scroll class)
		 *
		 * @returns {bool}
		 */
		var verticalAreaScrollable = function () {
			return verticalMenuObject.hasClass('edgt-with-scroll');
		};

		/**
		 * Initialzes navigation functionality. It checks navigation type data attribute and calls proper functions
		 */
		var initNavigation = function () {
			var verticalNavObject = verticalMenuObject.find('.edgt-vertical-menu');
			var navigationType = typeof verticalNavObject.data('navigation-type') !== 'undefined' ? verticalNavObject.data('navigation-type') : '';

			switch (navigationType) {
				//case 'dropdown-toggle':
				//    dropdownHoverToggle();
				//    break;
				//case 'dropdown-toggle-click':
				//    dropdownClickToggle();
				//    break;
				//case 'float':
				//    dropdownFloat();
				//    break;
				//case 'slide-in':
				//    dropdownSlideIn();
				//    break;
				default:
					dropdownFloat();
					break;
			}

			/**
			 * Initializes floating navigation type (it comes from the side as a dropdown)
			 */
			function dropdownFloat() {
				var menuItems = verticalNavObject.find('ul li.menu-item-has-children');
				var allDropdowns = menuItems.find(' > .second, > ul');

				menuItems.each(function () {
					var elementToExpand = $(this).find(' > .second, > ul');
					var menuItem = this;

					if (Modernizr.touch) {
						var dropdownOpener = $(this).find('> a');

						dropdownOpener.on('click tap', function (e) {
							e.preventDefault();
							e.stopPropagation();

							if (elementToExpand.hasClass('edgt-float-open')) {
								elementToExpand.removeClass('edgt-float-open');
								$(menuItem).removeClass('open');
							} else {
								if (!$(this).parents('li').hasClass('open')) {
									menuItems.removeClass('open');
									allDropdowns.removeClass('edgt-float-open');
								}

								elementToExpand.addClass('edgt-float-open');
								$(menuItem).addClass('open');
							}
						});
					} else {
						//must use hoverIntent because basic hover effect doesn't catch dropdown
						//it doesn't start from menu item's edge
						$(this).hoverIntent({
							over: function () {
								elementToExpand.addClass('edgt-float-open');
								$(menuItem).addClass('open');
							},
							out: function () {
								elementToExpand.removeClass('edgt-float-open');
								$(menuItem).removeClass('open');
							},
							timeout: 100
						});
					}
				});
			}

		};


		/**
		 * Initializes scrolling in vertical area. It checks if vertical area is scrollable before doing so
		 */
		var initVerticalAreaScroll = function () {
			if (verticalAreaScrollable()) {

				var verticalAreaScroll = function (event) {
					var delta = 0;
					if (!event) event = window.event;
					if (event.wheelDelta) {
						delta = event.wheelDelta / 120;
					} else if (event.detail) {
						delta = -event.detail / 3;
					}
					if (delta)
						handle(delta);
					if (event.preventDefault)
						event.preventDefault();
					event.returnValue = false;
				};

				var handle = function (delta) {
					if (delta < 0) {
						if (Math.abs(margin) <= maxMargin) {
							margin += delta * 20;
							$(verticalMenuObjectInner).css('margin-top', margin);
						}
					}
					else {
						if (margin <= -20) {
							margin += delta * 20;
							$(verticalMenuObjectInner).css('margin-top', margin);
						}
					}
				};

				var browserHeight = edgt.windowHeight;
				var verticalMenuObjectInner = verticalMenuObject.find('.edgt-vertical-menu-area-inner');
				var verticalMenuHeight = verticalMenuObjectInner.outerHeight() + parseInt(verticalMenuObjectInner.css('padding-top')) + parseInt(verticalMenuObjectInner.css('padding-bottom'));
				var margin = 0;
				var maxMargin = verticalMenuHeight - browserHeight;

				$(verticalMenuObject).on('mouseenter', function () {
					edgt.modules.common.edgtDisableScroll();
					if (window.addEventListener) {
						window.addEventListener('mousewheel', verticalAreaScroll, false);
						window.addEventListener('DOMMouseScroll', verticalAreaScroll, false);
					}
					window.onmousewheel = document.onmousewheel = verticalAreaScroll;
				});
				$(verticalMenuObject).on('mouseleave', function () {
					edgt.modules.common.edgtEnableScroll();
					window.removeEventListener('mousewheel', verticalAreaScroll, false);
					window.removeEventListener('DOMMouseScroll', verticalAreaScroll, false);
				});
			}
		};

		return {
			/**
			 * Calls all necessary functionality for vertical menu area if vertical area object is valid
			 */
			init: function () {
				if (verticalMenuObject.length) {
					initNavigation();
					initVerticalAreaScroll();
				}
			}
		};
	};

})(jQuery);
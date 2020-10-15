(function ($) {
	'use strict';

	var woocommerce = {};
	edgt.modules.woocommerce = woocommerce;

	woocommerce.edgtInitQuantityButtons = edgtInitQuantityButtons;
	woocommerce.edgtInitSelect2 = edgtInitSelect2;

	woocommerce.edgtOnDocumentReady = edgtOnDocumentReady;
	woocommerce.edgtOnWindowLoad = edgtOnWindowLoad;
	woocommerce.edgtOnWindowResize = edgtOnWindowResize;

	woocommerce.edgtProductImagesMinHeight = edgtProductImagesMinHeight;

	$(document).ready(edgtOnDocumentReady);
	$(window).load(edgtOnWindowLoad);
	$(window).resize(edgtOnWindowResize);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtOnDocumentReady() {
		edgtInitQuantityButtons();
		edgtInitButtonLoading();
		edgtInitSelect2();
		edgtProductImagesMinHeight();
		edgtInitSingleProductLightbox();
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
		edgtProductImagesMinHeight();
	}

	function edgtInitQuantityButtons() {
		$(document).on('click', '.edgt-quantity-minus, .edgt-quantity-plus', function (e) {
			e.stopPropagation();

			var button = $(this),
				inputField = button.siblings('.edgt-quantity-input'),
				step = parseFloat(inputField.attr('step')),
				max = parseFloat(inputField.attr('max')),
				minus = false,
				inputValue = parseFloat(inputField.val()),
				newInputValue;

			if (button.hasClass('edgt-quantity-minus')) {
				minus = true;
			}

			if (minus) {
				newInputValue = inputValue - step;
				if (newInputValue >= 1) {
					inputField.val(newInputValue);
				} else {
					inputField.val(0);
				}
			} else {
				newInputValue = inputValue + step;
				if (max === undefined) {
					inputField.val(newInputValue);
				} else {
					if (newInputValue >= max) {
						inputField.val(max);
					} else {
						inputField.val(newInputValue);
					}
				}
			}

			inputField.trigger('change');
		});
	}

	function edgtInitButtonLoading() {

        $(".add_to_cart_button").on('click', function(){
        	console.log("fqewfewfefewf");
            $(this).text(edgtGlobalVars.vars.edgtAddingToCart);
        });

    }

	/*
	 ** Init select2 script for select html dropdowns
	 */
	function edgtInitSelect2() {
		var orderByDropDown = $('.woocommerce-ordering .orderby');
		if (orderByDropDown.length) {
			orderByDropDown.select2({
				minimumResultsForSearch: Infinity
			});
		}

		var shippingCountryCalc = $('#calc_shipping_country');
		if (shippingCountryCalc.length) {
			shippingCountryCalc.select2();
		}

		var shippingStateCalc = $('.cart-collaterals .shipping select#calc_shipping_state');
		if (shippingStateCalc.length) {
			shippingStateCalc.select2();
		}

		var variableProducts = $('.edgt-single-product-content .variations select');
		if (variableProducts.length) {
			variableProducts.select2();
		}
	}

	/* calculate product images section min height because of absolute position */
	function edgtProductImagesMinHeight() {
		var hh = $('.edgt-woo-single-page .product .images .woocommerce-product-gallery__image:first-child').height();
		$('.edgt-woo-single-page .product .images').css({'min-height': hh});

		//woocommerce 3.0
		$('.edgt-woo-single-page .product .images figure').css({'min-height': hh});
	}

	/*
	 ** Init Product Single Pretty Photo attributes
	 */
	function edgtInitSingleProductLightbox() {
		var item = $('.edgt-woo-single-page.edgt-woo-single-has-pretty-photo .images .woocommerce-product-gallery__image');

		if(item.length) {
			item.children('a').attr('data-rel', 'prettyPhoto[woo_single_pretty_photo]');

			if (typeof edgt.modules.common.edgtPrettyPhoto === "function") {
				edgt.modules.common.edgtPrettyPhoto();
			}
		}
	}

})(jQuery);
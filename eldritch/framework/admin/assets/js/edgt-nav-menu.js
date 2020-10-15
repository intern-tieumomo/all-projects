(function($) {
	'use strict';

	$(document).ready(function() {
        edgtUpdateIconOptions();
		edgtInitAdditionalItemOptions();
	});

	/**
	 * Function that serializes additional menu item options in a single field.
	 */
	function edgtInitAdditionalItemOptions() {
		var navForm = $('#update-nav-menu');

		navForm.on('change', '[data-item-option]', function() {
			edgtGenerateSerializedString();
		});
	}

	function edgtGenerateSerializedString() {
		var dataArrayString = '';
		var navForm = $('#update-nav-menu');
		var menuItemsData = navForm.find("[data-name]");

		console.log(menuItemsData);

		menuItemsData.each(function() {
			//get it's value and name
			var attributeName = $(this).data('name');
			var attributeVal  = $(this).val();

			if(attributeVal !== '') {
				//check if current field is checkbox
				if($(this).is('input[type="checkbox"]')) {
					//append it to serialized string only if it's checked
					if($(this).is(':checked')) {
						dataArrayString += attributeName+"="+attributeVal+'&';
					}
				} else {
					dataArrayString += attributeName+"="+attributeVal+'&';
				}
			}
		});

		//remove last & character
		dataArrayString = dataArrayString.substr(0, dataArrayString.length - 1);

		if($('input[name="edgt_menu_options"]').length) {
			$('input[name="edgt_menu_options"]').val(encodeURIComponent(dataArrayString));
		} else {
			//generate hidden input field html with serialized string value
			var hiddenMenuItem = '<input type="hidden" name="edgt_menu_options" value="'+encodeURIComponent(dataArrayString)+'">';

			//append hidden options field to navigation form
			navForm.append(hiddenMenuItem);
		}
	}

    /**
     * Function that loads icon options via AJAX based on icon pack option
     */
    function edgtUpdateIconOptions() {
        var navForm = $('#update-nav-menu');

        navForm.on('change', '[data-icon-pack]', function() {
            var chosenIconPack = $(this).find('option:selected').val();
            var iconDropdown   = $(this).parents('p').first().next('.edgt-icon-select-holder').find('select');
            var spinner        = $(this).parents('li.menu-item').first().find('.spinner');

            var data = {
                action: 'update_admin_nav_icon_options',
                icon_pack: chosenIconPack,
				update_nav_menu_nonce: $('#update-nav-menu').find('#update-nav-menu-nonce').val()
            }

            spinner.show();
            iconDropdown.attr('disabled', 'disabled');

            $.post(ajaxurl, data, function(data){
                iconDropdown.html(data)
                spinner.hide();
                iconDropdown.removeAttr('disabled');
            });
        });
    }
})(jQuery);
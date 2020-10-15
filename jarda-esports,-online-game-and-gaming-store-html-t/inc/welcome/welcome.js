( function( $ ) {

	'use strict';

	$(document).ready(function($){

		$('.news-vibrant-message .notice-dismiss').on('click', function(e) {

			e.preventDefault();

			var $this = $(this);

			var nonce = $(this).parent().data('nonce');

			$.ajax({
				type     : 'GET',
				dataType : 'json',
				url      : ajaxurl,
				data     : {
					'action'   : 'news_vibrant_notice_dissmiss',
					'_wpnonce' : nonce
				},
				success  : function (response) {
					if ( true === response.status ) {
						$this.parents('#cv-theme-message').fadeOut('slow');
					}
				}
			});
		});
	});

} )( jQuery );
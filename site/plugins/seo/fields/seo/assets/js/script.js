(function($) {
	"use strict";
	var controller;
	var title_fallback = '';
	var fieldvalue = [];
	var description_fallback = '';

	$.fn.seo = function() {
		return this.each(function() {
			/* Init plugin - Start */
			var field = $(this);
			var fieldname = 'seo';

			if(field.data( fieldname )) {
				return true;
			} else {
				field.data( fieldname, true );
			}
			/* Init plugin - End */

			$.fn.controller();
			$.fn.loadData();
			$.fn.updateData();
			$.fn.actions();
			$.fn.preview('title');
			$.fn.preview('description');
			$.fn.emptyDescription();

			$.fn.countTitle();
			$.fn.countDescription();
		});
	};

	// Actions
	$.fn.actions = function() {
		// Seo title edit click
		$( '.seo' ).on('click', '.seo-wrap-title', function(){
			$.fn.toggle('title');
		});

		// Seo description edit click
		$( '.seo' ).on('click', '.seo-wrap-description', function(){
			$.fn.toggle('description');
			$('.seo-input-description').trigger("autosize.resize");
		});

		$('.seo-input-title, .seo-input-description').on('keyup keypress', function() {
			$.fn.updateData();
			$.fn.renderValue();

			$.fn.preview('title');
			$.fn.preview('description');
			$.fn.emptyDescription();

			$.fn.countTitle();
			$.fn.countDescription();
		});

		$(document).keyup(function(e) {
			if (e.keyCode == 27 && ( $('.seo-input-title').is(":focus") || $('.seo-input-description').is(":focus") ) ) {
				$.fn.close();
			}
		});
	};

	// Empty description data attribute
	$.fn.emptyDescription = function() {
		if( $('.seo-input-description').val() == '' ) {
			$('.seo').attr('data-seo-description-empty', true);
		} else {
			$('.seo').removeAttr('data-seo-description-empty');
		}
	};

	// Preview
	$.fn.preview = function(type) {
		var out = '';
		if( fieldvalue[type] ) {
			out = fieldvalue[type];
		} else if( controller[type]['fallback'] ) {
			out = controller[type]['fallback'];
		}

		out = $.fn.replaceValues(out);

		var prefix = ( controller[type].prefix ) ? controller[type].prefix : '';
		var suffix = ( controller[type].suffix ) ? controller[type].suffix : '';
		var result = prefix + out + suffix;

		if( type == 'description') {
			result = $.fn.sliceDescription(result);
		}

		result = $.fn.escapeTags(result);

		$('.seo-view-' + type).html( result );
	};

	// Replace values
	$.fn.replaceValues = function(input) {
		if( controller.values && input ) {
			$.each(controller.values, function( key, value ) {
				var find = '{{' + key + '}}';
				var re = new RegExp(find, 'g');
				input = input.replace(re, value);
			});
		}
		return input;
	};

	// Controller
	$.fn.controller = function() {
		var json = $('.seo').attr('data-seo-controller');
		controller = jQuery.parseJSON( json );
	};

	// Toggle edit mode
	$.fn.toggle = function(type) {
		var state = $('.seo').attr('data-' + type + '-active');

		$.fn.close();

		if( state == 'true' ) {
			$('.seo').removeAttr('data-' + type + '-active');
		} else {
			$('.seo').attr('data-' + type + '-active', true);
		}
	};

	// Close
	$.fn.close = function() {
		$('.seo').removeAttr('data-title-active');
		$('.seo').removeAttr('data-description-active');
	};

	// Render hidden value
	$.fn.renderValue = function() {
		var render = '';
		render = "  -\n  seo-title: " + '"' + $.fn.escapeDoubleQuotes(fieldvalue.title) + '"' + "\n";
		render += "  seo-description: " + '"' + $.fn.escapeDoubleQuotes(fieldvalue.description) + '"';
		$('.seo-render').val(render);
	};

	$.fn.loadData = function() {
		$('.seo-input-title').val(controller.title.field);
		$('.seo-input-description').val(controller.description.field);
	};

	// Update data
	$.fn.updateData = function() {
		fieldvalue.title = $.fn.sanitize( $('.seo-input-title').val() );
		fieldvalue.description = $.fn.sanitize( $('.seo-input-description').val() );
	};

	// Sanitize from return character
	$.fn.sanitize = function(input) {
		input = input.replace(/(\r\n|\n|\r)/gm,' ');
		input = input.replace( /\s\s+/g, ' ' );
		return input;
	};

	// Slice
	$.fn.sliceDescription = function(text) {
		var sliced = text.slice(0,controller.description.limit);
		text = ( text == sliced ) ? text : sliced + '...';
		return text;
	};

	// Escape double quotes
	$.fn.escapeDoubleQuotes = function(text) {
		return text.replace(/\"/g,'\\"');
	};

	// Escape tags
	$.fn.escapeTags = function(text) {
		text = text.replace(/\</g,"&lt;");
		text = text.replace(/\>/g,"&gt;");
		return text;
	};

	// Count title
	$.fn.countTitle = function() {
		var obj = $('.seo-view-title');
		if( obj[0] ) {
			$('.seo-title-count').html( obj[0].scrollWidth + '/512' );
			if( obj.outerWidth() < obj[0].scrollWidth || obj.text().length == 0 ) {
				$('.seo-title-count').addClass('seo-warning');
			} else {
				$('.seo-title-count').removeClass('seo-warning');
			}
		} else {
			$('.seo-title-count').html( '0/512' );
			$('.seo-title-count').addClass('seo-warning');
		}
	};

	// Count description
	$.fn.countDescription = function() {
		var count = 0;
		if( fieldvalue.description.length > 0 ) {
			count = fieldvalue.description.length + controller.description.prefix.length + controller.description.suffix.length;
		}
		$('.seo-description .seo-count').html( count + '/' + controller.description.limit );
		if( fieldvalue.description.length > controller.description.limit || fieldvalue.description.length == 0 ) {
			$('.seo-description .seo-count').addClass('seo-warning');
		} else {
			$('.seo-description .seo-count').removeClass('seo-warning');
		}
	};

})(jQuery);
;( function( $ ) {
		
	'use strict';

	var XT_WOOVS_ADMIN = {};
	var wp = window.wp;
	var file_frame;
			
	XT_WOOVS_ADMIN = {
		
		init: function() {

		    this.notices();
			this.initColorPicker();
			this.initMediaUpload();
			this.initQuickEdit();
		},

        notices: function() {

            setTimeout(function() {

                $('.xt_woovs-notice').each(function() {
                    $(this).prependTo('#wpbody-content');
                });

            },10);
        },

        initColorPicker: function() {
	
			$('.wp-picker-container').each(function() {

                var $old = $(this).find('.xt_woovs-color-picker');
                if($old.length) {
                    var $parent = $(this).parent();
                    var $input = $old.clone();
                    $old.remove();
                    $(this).remove();
                    $parent.append($input);
                }
			});	
			
			$('.xt_woovs-color-picker').wpColorPicker({
                change: function (event, ui) {
                    var $this = $(event.target).closest('.wp-picker-container');
                    var color = ui.color.toString();

                    $(document).trigger('xt_woovs_color_selected', [$this, color]);

                },

                /**
                 * @param {Event} event - standard jQuery event, produced by "Clear"
                 * button.
                 */
                clear: function (event) {
                    var $this = $(event.target).closest('.wp-picker-container');

                    $(document).trigger('xt_woovs_color_removed', [$this, xt_woovs.color_placeholder]);
                }
            });
		
		},
		
		initMediaUpload: function() {	

			var onBrowseEvent = function(e) {

                e.preventDefault();

                var $this = $(this);
                var $wrap = $this.closest('.xt_woovs_image_picker');

                if (file_frame) {
                    file_frame.close();
                }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: $(this).data('uploader-title'),
                    button: {
                        text: $(this).data('uploader-button-text'),
                    },
                    multiple: false
                });

                file_frame.on('select', function() {

                    var attachment = file_frame.state().get( 'selection' ).first().toJSON();
                    var $field = $this.parents('.xt_woovs_image_picker').find('input[type=hidden]');

                    $field.val( attachment.id );

                    $this.parents('.xt_woovs_image_picker').find('img').attr( 'src', attachment.url );

                    $wrap.find('.xt_woovs_remove_meta_img').css('display', 'inline-block');

                    $(document).trigger('xt_woovs_image_selected', [$wrap, attachment.url]);

                });

                file_frame.open();

            };

			var onRemoveEvent = function (e) {

                e.preventDefault();

                var $this = $(e.target);
                var $wrap = $this.closest('.xt_woovs_image_picker');
                var $input = $wrap.find('input[type=hidden]');
                var $img = $wrap.find('img');

                $input.val( '' );

                $img.attr( 'src', xt_woovs.placeholder );
                $this.css('display', 'none');

                $(document).trigger('xt_woovs_image_removed', [$wrap, xt_woovs.placeholder]);

            };

			var onChangeEvent = function (e) {

                var $this = $(this);
                var $wrap = $this.closest('.xt_woovs_image_picker');

                if($this.val() === '') {

                    $wrap.find('.xt_woovs_remove_meta_img').trigger('click');
                }

            };

            $(document).off('click', '.xt_woovs-meta-uploader', onBrowseEvent)
                .off( 'click', '.xt_woovs_remove_meta_img', onRemoveEvent)
                .off( 'change', '.xt_woovs-term-image', onChangeEvent);

			$(document).on('click', '.xt_woovs-meta-uploader', onBrowseEvent)
				.on( 'click', '.xt_woovs_remove_meta_img', onRemoveEvent)
				.on( 'change', '.xt_woovs-term-image', onChangeEvent);
		},

		initQuickEdit: function() {
			
			var self = this;

			var onEdit = function( e ) {

                e.preventDefault();

                var $this = $(this);
                var $row = $this.closest('tr');

                setTimeout(function() {

                    var $edit_row = $('.inline-edit-row.inline-editor');
                    var $column = $( '.column-thumb', $row);
                    var $preview = $( '.swatch-preview', $column);
                    var tooltip = $( '.swatch-tooltip-input', $column).val();
                    var tooltip_text = $( '.swatch-tooltip-text-input', $column).val();
                    var tooltip_image = $( '.swatch-tooltip-image-input', $column).data('url');
                    var tooltip_image_id = $( '.swatch-tooltip-image-input', $column).val();

                    // Update fields
                    if($preview.hasClass('swatch-color')) {

                        var color = $preview.css('background-color');

                        self.initColorPicker();

                        if(color) {
                            $( '.xt_woovs-color-picker', $edit_row ).val( color ).trigger('change');
                        }

                        $( 'select[name="color_swatch_tooltip"]', $edit_row ).val( tooltip );

                    }else if($preview.hasClass('swatch-image')) {

                        var thumb = $column.find('.swatch-image-input').data('url');
                        var thumb_id = $column.find('.swatch-image-input').val();

                        $( 'input[name="image"]', $edit_row ).val( thumb_id ).trigger('change');
                        $('.xt_woovs_image_picker.swatch_image img', $edit_row).attr('src', thumb);

                        $( 'select[name="image_swatch_tooltip"]', $edit_row ).val( tooltip );
                    }

                    $('input[name="swatch_tooltip_text"]', $edit_row).closest('label').addClass('xt_woovs-inline-edit-hidden');
                    $('input[name="swatch_tooltip_image"]', $edit_row).closest('label').addClass('xt_woovs-inline-edit-hidden');

                    if(tooltip === 'text') {

                        $('input[name="swatch_tooltip_text"]', $edit_row).val(tooltip_text);
                        $('input[name="swatch_tooltip_text"]', $edit_row).closest('label').removeClass('xt_woovs-inline-edit-hidden');

                    }else if(tooltip === 'image') {

                        $('input[name="swatch_tooltip_image"]', $edit_row ).val( tooltip_image_id ).trigger('change');
                        $('.xt_woovs_image_picker.tooltip_image img', $edit_row).attr('src', tooltip_image);

                        $('input[name="swatch_tooltip_image"]', $edit_row).closest('label').removeClass('xt_woovs-inline-edit-hidden');
                    }

                    $('.xt_woovs-tooltip-select', $edit_row).on('change', function() {

                        $(this).val();

                        $('input[name="swatch_tooltip_text"]', $edit_row).closest('label').addClass('xt_woovs-inline-edit-hidden');
                        $('input[name="swatch_tooltip_image"]', $edit_row).closest('label').addClass('xt_woovs-inline-edit-hidden');

                        if($(this).val() === 'text') {

                            $('input[name="swatch_tooltip_text"]', $edit_row).closest('label').removeClass('xt_woovs-inline-edit-hidden');

                        }else if($(this).val() === 'image') {

                            $('input[name="swatch_tooltip_image"]', $edit_row).closest('label').removeClass('xt_woovs-inline-edit-hidden');
                        }
                    });


                    if($preview.hasClass('swatch-image')) {

                        // Show remove image button
                        $('.xt_woovs_remove_meta_img', $edit_row).each(function() {
                            var thumb_id = $(this).parent().find('.xt_woovs-term-image').val();

                            if(thumb_id !== '' && thumb_id.search(/images\/placeholder\.png/i) === -1) {
                                $(this).css('display', 'inline-block');
                            }
                        });
                    }

                }, 10);

            };

			if( $('#the-list').length ) {

                $('#the-list').off( 'click', '.editinline', onEdit);
				$('#the-list').on( 'click', '.editinline', onEdit);
				
			}
		}
	};

    $( function () {
		
		XT_WOOVS_ADMIN.init();
		window.XT_WOOVS_ADMIN = XT_WOOVS_ADMIN;
	});

})( jQuery );	
jQuery(function () {
	var locHash = location.hash.replace("#", "")
	locHash = locHash ? locHash : 'global_setting';
	jQuery('a[rel=tabs]').each(function () {
		value = jQuery(this).attr('href').replace("#", "");		
		if (value == locHash ) {
			jQuery('#'+value).css({'display':'block'});
		} else {
			jQuery('#'+value).css({'display':'none'});
		}
	});
	jQuery('a[rel=tabs]').click(function () {
		jQuery('.has-table').css({'display':'none'});
		var value = jQuery(this).attr('href').replace("#", "");
		jQuery('#'+value).css({'display':'block'});
		location.hash = value;
		return false;
	});
	
	var this_slide = 0;

	jQuery('.wpts-image, .wpts-image-button').click(function() {
		this_slide = jQuery(this).attr('id').replace("wpts-image-button-", "").replace("wpts-image-", "");
		formfield = jQuery('#wpts-image-'+this_slide).attr('name');
		tb_show('Added Slider Images', 'media-upload.php?type=image&amp;tab=library&amp;TB_iframe=true');
		return false;
	});
	window.send_to_editor = function(html) {
		imgurl = jQuery('img',html).attr('src');
		jQuery('#wpts-image-'+this_slide).val(imgurl);
		tb_remove();
	}
	
	if (jQuery('#wpts-navigation-image').checked == false) {
		jQuery('.block-width-navimg').hide();
	} else {
		jQuery('.block-width-navimg').show();
	}
	jQuery('#wpts-navigation-image').change(function () {
		if (jQuery('#wpts-navigation-image').is(':checked')) {
			jQuery('.block-width-navimg').slideDown('slow');
		} else {
			jQuery('.block-width-navimg').hide();
		}
	});	
});
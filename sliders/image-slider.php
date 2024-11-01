<?php
/**
 *  Copyright 2011-2012 TemplateAcess. (email: info@templateaccess.com)
 **/
?>
<script type="text/javascript" language="javascript">
jQuery(function($) {
	$('.wpts-desctext').each(function () {
		if ($(this).attr('checked')) {
			$('#block-'+$(this).attr('id')).slideDown();
		} else {
			$('#block-'+$(this).attr('id')).hide();
		}
	});
	$('.wpts-desctext').change(function () {
		if ($(this).attr('checked')) {
			$('#block-'+$(this).attr('id')).slideDown();
		} else {
			$('#block-'+$(this).attr('id')).hide();
		}
	});
});
</script>

<div id="image_upload" class="has-table">
  <form method="post" action="options.php" class="wpts">
    <?php wp_nonce_field('update-options'); ?>
    <strong>Custom Fields</strong> <br />
    <br />
    For each post you want to be featured you should have a custom field with<br />
    the full url for an image and an optional field with the text for the title bar.<br />
    <br />
    <?php
		$cs_items = get_option('wpts-items') ? get_option('wpts-items') : 5;
		$i = 1;
		$list_option = '';
		while ($cs_items >= $i) :

		$checked = get_option('wpts-desctext-'.$i) ? 'checked' : '';
		$checked_hide = get_option('wpts-desctext-'.$i) ? '' : 'hide';
	?>
    <br />
    <label for="wpts-image-<?php echo $i; ?>"><strong>Upload image #<?php echo $i; ?>.</strong></label>
    <br />
    <br />
    <input id="wpts-image-<?php echo $i; ?>" type="text" class="wpts-image" size="36" name="wpts-image-<?php echo $i; ?>" value="<?php echo get_option('wpts-image-'.$i); ?>" />
    <input id="wpts-image-button-<?php echo $i; ?>" class="wpts-image-button" type="button" value="Upload Image" />
    <br />
    <br />
    <label>URL field (free by default):</label>
    <input name="wpts-url-<?php echo $i; ?>" id="wpts-url-<?php echo $i; ?>" size="25" value="<?php echo get_option('wpts-url-'.$i); ?>">
    </input>
    <br />
    <br />
    <label>If description is needed:</label>
    <input name="wpts-desctext-<?php echo $i; ?>" class="wpts-desctext" id="desc-check-<?php echo $i; ?>" type="checkbox" value="1" <?php echo $checked;?> />
    <br />
    <br />
    <div class="desctext <?php echo $checked_hide;?>" id="block-desc-check-<?php echo $i; ?>" >
      <label>Title field ('<?php echo THIS_PLUGIN_NAME; ?> Title' by default):</label>
      <input name="wpts-title-<?php echo $i; ?>" id="wpts-title-<?php echo $i; ?>" size="25" value="<?php echo get_option('wpts-title-'.$i); ?>">
      </input>
      <br />
      <br />
      <label>Text field ('<?php echo THIS_PLUGIN_NAME; ?> Text' by default):</label>
      <textarea name="wpts-text-<?php echo $i; ?>" id="wpts-text-<?php echo $i; ?>" cols="50" rows="5"><?php echo get_option('wpts-text-'.$i); ?></textarea>
      <br />
      <br />
    </div>
    <hr />
    <?php
		$list_option .= ($list_option ? ',' : ''). "wpts-image-{$i},wpts-desctext-{$i},wpts-title-{$i},wpts-url-{$i},wpts-text-{$i}";
		$i++;
		endwhile;
	?>
    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="tabs" value="image_upload" />
    <input type="hidden" name="page_options" value="<?php echo $list_option; ?>" />
    <br />
    <input type="submit" name="Submit" value="<?php _e('Update Slide') ?>" />
  </form>
</div>

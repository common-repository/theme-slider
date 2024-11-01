<?php
/**
 *  Copyright 2011-2012 TemplateAcess. (email: info@templateaccess.com)
 **/
?>

<div id="config_setting" class="has-table">
  <form method="post" action="options.php" class="wpts">
    <?php wp_nonce_field('update-options'); ?>
    <strong>Set Piecemaker-Slider parameters:</strong> <br />
    <br />
    <label>Width in pixels (slider):<br />
      <i>(970px by default)</i></label>
    <input name="wpts-piecemaker-width-slider" id="wpts-piecemaker-width-slider" size="5" value="<?php echo get_option('wpts-piecemaker-width-slider'); ?>">
    </input>
    <br />
    <br />
    <label>Height in pixels (slider):<br />
      <i>(440px by default)</i></label>
    <input name="wpts-piecemaker-height-slider" id="wpts-piecemaker-height-slider" size="5" value="<?php echo get_option('wpts-piecemaker-height-slider'); ?>">
    </input>
    <br />
    <br />
    <label>Width in pixels (image):<br />
      <i>(970px by default)</i></label>
    <input name="wpts-piecemaker-width" id="wpts-piecemaker-width" size="5" value="<?php echo get_option('wpts-piecemaker-width'); ?>">
    </input>
    <br />
    <br />
    <label>Height in pixels (image):<br />
      <i>(540px by default)</i></label>
    <input name="wpts-piecemaker-height" id="wpts-piecemaker-height" size="5" value="<?php echo get_option('wpts-piecemaker-height'); ?>">
    </input>
    <br />
    <br />
    <label>Flash with shadow:<br /></label>
    <?php if(get_option('wpts-piecemaker-shadow') != ""){ $ch_shadow = "checked=''"; } else { $ch_shadow = ''; }?>
    <input type="checkbox" id="wpts-piecemaker-shadow" name="wpts-piecemaker-shadow" value="1" <?php echo $ch_shadow; ?> /> <small>shadow under the slider.</small>
    <br />
    <br />
    <label for="wpts-piecemaker-segment">Segments:<br />
      <i>(9 by default)</i></label>
    <input name="wpts-piecemaker-segment" id="wpts-piecemaker-segment" type="text" value="<?php echo get_option('wpts-piecemaker-segment'); ?>" />
    <small>Number of segments in which the image will be sliced.</small> <br />
    <br />
    <label for="wpts-piecemaker-tween-time">Tween Time:<br />
      <i>(3 by default)</i></label>
    <input name="wpts-piecemaker-tween-time" id="wpts-piecemaker-tween-time" type="text" value="<?php echo get_option('wpts-piecemaker-tween-time'); ?>" />
    <small>Number of seconds for each element to be turned.</small> <br />
    <br />
    <label for="wpts-piecemaker-tween-delay">Tween Delay:<br />
      <i>(0.1 by default)</i></label>
    <input name="wpts-piecemaker-tween-delay" id="wpts-piecemaker-tween-delay" type="text" value="<?php echo get_option('wpts-piecemaker-tween-delay'); ?>" />
    <small>Number of seconds from one element starting to turn to the next element starting.</small> <br />
    <br />
    <label for="wpts-piecemaker-tween-type">Tween Type:<br />
      <i>('linear' by default)</i></label>
    <?php
      	$array_tween_type = array('linear','easeInSine','easeOutSine','easeInOutSine','easeInCubic','easeOutCubic','easeInOutCubic','easeOutInCubic','easeInQuint','easeOutQuint','easeInOutQuint','easeOutInQuint','easeInCirc','easeOutCirc','easeInOutCirc','easeOutInCirc','easeInBack','easeOutBack','easeInOutBack','easeOutInBack','easeInQuad','easeOutQuad','easeInOutQuad','easeOutInQuad','easeInQuart','easeOutQuart','easeInOutQuart','easeOutInQuart','easeInExpo','easeOutExpo','easeInOutExpo','easeOutInExpo','easeInElastic','easeOutElastic','easeInOutElastic','easeOutInElastic','easeInBounce','easeOutBounce','easeInOutBounce','easeOutInBounce');
	  ?>
    <select name="wpts-piecemaker-tween-type" id="wpts-piecemaker-tween-type">
      <?php for ($i=0;$i<sizeof($array_tween_type);$i++) {
    	echo "<option ".(get_option('wpts-piecemaker-tween-type')==$array_tween_type[$i] ? 'selected' : '')." >".$array_tween_type[$i]."</option>";
    } ?>
    </select>
    <small>Type of animation transition.</small> <br />
    <br />
    <label for="wpts-piecemaker-z-distance">Z Distance:<br />
      <i>(0.1 by default)</i></label>
    <input name="wpts-piecemaker-z-distance" id="wpts-piecemaker-z-distance" type="text" value="<?php echo get_option('wpts-piecemaker-z-distance'); ?>" />
    <small>to which extend are the cubes moved on z axis when being tweened. Negative values bring the cube closer to the camera, positive values take it further away. A good range is roughly between -200 and 700.</small> <br />
    <br />
    <label for="wpts-piecemaker-expand">Expand:<br />
      <i>(25 by default)</i></label>
    <input name="wpts-piecemaker-expand" id="wpts-piecemaker-expand" type="text" value="<?php echo get_option('wpts-piecemaker-expand'); ?>" />
    <small>To which etxend are the cubes moved away from each other when tweening.</small> <br />
    <br />
    <label for="wpts-piecemaker-inner-color">Inner Color:<br />
      <i>(0x000000 by default)</i></label>
    <input name="wpts-piecemaker-inner-color" id="wpts-piecemaker-inner-color" type="text" value="<?php echo get_option('wpts-piecemaker-inner-color'); ?>" />
    <small>Color of the sides of the elements in hex values (e.g. 0x000000 for black)</small> <br />
    <br />
    <label for="wpts-piecemaker-text-background">Text Background Color:<br />
      <i>(0x666666 by default)</i></label>
    <input name="wpts-piecemaker-text-background" id="wpts-piecemaker-text-background" type="text" value="<?php echo get_option('wpts-piecemaker-text-background'); ?>" />
    <small>Color of the description text background in hex values (e.g. 0xFF0000 for red)</small> <br />
    <br />
    <label for="wpts-piecemaker-text-distance">Text Distance:<br />
      <i>(25 by default)</i></label>
    <input name="wpts-piecemaker-text-distance" id="wpts-piecemaker-text-distance" type="text" value="<?php echo get_option('wpts-piecemaker-text-distance'); ?>" />
    <small>Distance of the info text to the borders of its background.</small> <br />
    <br />
    <label for="wpts-piecemaker-shadow-darkness">Shadow Darkness:<br />
      <i>(25 by default)</i></label>
    <input name="wpts-piecemaker-shadow-darkness" id="wpts-piecemaker-shadow-darkness" type="text" value="<?php echo get_option('wpts-piecemaker-shadow-darkness'); ?>" />
    <small>To which extend are the sides shadowed, when the elements are tweening and the sided move towards the background. 100 is black, 0 is no darkening.</small> <br />
    <br />
    <label for="wpts-piecemaker-auto-play">Auto Play:<br />
      <i>(2 by default)</i></label>
    <input name="wpts-piecemaker-auto-play" id="wpts-piecemaker-auto-play" type="text" value="<?php echo get_option('wpts-piecemaker-auto-play'); ?>" />
    <small>Number of seconds to the next image when autoplay is on. Set 0, if you don't want autoplay.</small> <br />
    <br />
    <label>Not use default css:</label>
    <?php if(get_option('wpts-piecemaker-style') != ""){ $ch = "checked=''"; } else { $ch = ''; }?>
    <input type="checkbox" id="wpts-piecemaker-style" name="wpts-piecemaker-style" <?php echo $ch ?> />
    <br />
    <br />
    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="wpts-piecemaker-width-slider,wpts-piecemaker-height-slider,wpts-piecemaker-width,wpts-piecemaker-height,wpts-piecemaker-shadow,wpts-piecemaker-segment,wpts-piecemaker-tween-time,wpts-piecemaker-tween-delay,wpts-piecemaker-tween-type,wpts-piecemaker-z-distance,wpts-piecemaker-expand,wpts-piecemaker-inner-color,wpts-piecemaker-text-background,wpts-piecemaker-text-distance,wpts-piecemaker-shadow-darkness,wpts-piecemaker-auto-play,wpts-piecemaker-style" />
    <br />
    <input type="submit" name="Submit" value="<?php _e('Update Options') ?>" />
  </form>
</div>

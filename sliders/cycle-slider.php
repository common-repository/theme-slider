<?php
/**
 *  Copyright 2011-2012 TemplateAcess. (email: info@templateaccess.com)
 **/
?>

<div id="config_setting" class="has-table">
  <form method="post" action="options.php" class="wpts">
    <?php wp_nonce_field('update-options'); ?>
    <strong>Set Cycle-Slider parameters:</strong> <br />
    <br />
    <label>Width in pixels (slider):<br />
      <i>(565px by default)</i></label>
    <input name="wpts-cycle-width-slider" id="wpts-cycle-width-slider" size="5" value="<?php echo get_option('wpts-cycle-width-slider'); ?>">
    </input>
    <br />
    <br />
    <label>Height in pixels (slider):<br />
      <i>(290px by default)</i></label>
    <input name="wpts-cycle-height-slider" id="wpts-cycle-height-slider" size="5" value="<?php echo get_option('wpts-cycle-height-slider'); ?>">
    </input>
    <br />
    <br />
    <label>Width in pixels (image):<br />
      <i>(565px by default)</i></label>
    <input name="wpts-cycle-width" id="wpts-cycle-width" size="5" value="<?php echo get_option('wpts-cycle-width'); ?>">
    </input>
    <br />
    <br />
    <label>Height in pixels (image):<br />
      <i>(290px by default)</i></label>
    <input name="wpts-cycle-height" id="wpts-cycle-height" size="5" value="<?php echo get_option('wpts-cycle-height'); ?>">
    </input>
    <br />
    <br />
    <label>Slide Display Duration in ms:<br />
      <i>(5000ms by default)</i></label>
    <input name="wpts-cycle-delay" id="wpts-cycle-delay" size="5" value="<?php echo get_option('wpts-cycle-delay'); ?>">
    </input>
    <br />
    <br />
    <label>Choose your fx:<br />
      <i>(fade by default)</i></label>
    <?php
	$wpscFade = 	(get_option('wpts-cycle-scrollUp') == '' && get_option('wpts-cycle-shuffle') == '')
						? "checked"
						: (get_option('wpts-cycle-fade') == 'fade'
							? "checked"
							 : "");
	$wpscScrollUp = get_option('wpts-cycle-scrollUp') == 'scrollUp' ? "checked" : "";
	$wpscShuffle = 	get_option('wpts-cycle-shuffle') == 'shuffle' ? "checked" : "";
?>
    <label class="free_width">
      <input type="checkbox" id="wpts-cycle-fade" name="wpts-cycle-fade" value="fade" <?php echo $wpscFade ?> />
      fade</label>
    <label class="free_width">
      <input type="checkbox" id="wpts-cycle-scrollUp" name="wpts-cycle-scrollUp" value="scrollUp" <?php echo $wpscScrollUp ?> />
      scrollUp</label>
    <label class="free_width">
      <input type="checkbox" id="wpts-cycle-shuffle" name="wpts-cycle-shuffle" value="shuffle" <?php echo $wpscShuffle ?> />
      shuffle</label>
    <br />
    <br />
    <label>Hide navigation:</label>
    <?php if(get_option('wpts-cycle-navigation') != ""){ $ch = "checked=''"; } else { $ch = ''; }?>
    <input type="checkbox" id="wpts-cycle-navigation" name="wpts-cycle-navigation" <?php echo $ch ?> />
    <br />
    <br />
    <label>Use number navigation:</label>
    <?php if(get_option('wpts-cycle-navigation-number') != ""){ $ch = "checked='checked'"; } else { $ch = ''; }?>
    <input type="checkbox" id="wpts-cycle-navigation-number" name="wpts-cycle-navigation-number" <?php echo $ch ?> value="1" />
    <br />
    <br />
    <label>Use image navigation:</label>
    <?php if(get_option('wpts-cycle-navigation-image') != ""){ $ch = "checked=''"; } else { $ch = ''; }?>
    <input type="checkbox" id="wpts-cycle-navigation-image" name="wpts-cycle-navigation-image" <?php echo $ch ?> value="1" />
    <br />
    <div style="padding:10px;" class="block-width-navimg"> <strong>Navigation Images Size:</strong><br />
      <label>Image width:</label>
      <input name="wpts-cycle-width-navimg" id="wpts-cycle-width-navimg" size="5" value="<?php echo get_option('wpts-cycle-width-navimg'); ?>">
      <br />
      <label>Image height:</label>
      <input name="wpts-cycle-height-navimg" id="wpts-cycle-height-navimg" size="5" value="<?php echo get_option('wpts-cycle-height-navimg'); ?>">
      <br />
    </div>
    <br />
    <label>Use theme cycle slider styles:</label>
    <?php if(get_option('wpts-cycle-style') != ""){ $ch = "checked=''"; } else { $ch = ''; }?>
    <input type="checkbox" id="wpts-cycle-style" name="wpts-cycle-style" <?php echo $ch; ?> />
    <br />
    <br />
    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="wpts-cycle-width-navimg,wpts-cycle-height-navimg,wpts-cycle-width-slider,wpts-cycle-height-slider,wpts-cycle-width,wpts-cycle-height,wpts-cycle-delay,wpts-cycle-fade,wpts-cycle-scrollUp,wpts-cycle-shuffle,wpts-cycle-navigation,wpts-cycle-navigation-image,wpts-cycle-navigation-number,wpts-cycle-style" />
    <br />
    <input type="submit" name="Submit" value="<?php _e('Update Options') ?>" />
  </form>
</div>

<?php
/**
 *  Copyright 2011-2012 TemplateAcess. (email: info@templateaccess.com)
 **/
?>

<div id="config_setting" class="has-table">
  <form method="post" action="options.php" class="wpts">
    <?php wp_nonce_field('update-options'); ?>
    <strong>Set Coin-Slider parameters:</strong> <br />
    <br />
    <label>Width in pixels (slider):<br />
      <i>(565px by default)</i></label>
    <input name="wpts-coin-width-slider" id="wpts-coin-width-slider" size="5" value="<?php echo get_option('wpts-coin-width-slider'); ?>">
    </input>
    <br />
    <br />
    <label>Height in pixels (slider):<br />
      <i>(290px by default)</i></label>
    <input name="wpts-coin-height-slider" id="wpts-coin-height-slider" size="5" value="<?php echo get_option('wpts-coin-height-slider'); ?>">
    </input>
    <br />
    <br />
    <label>Width in pixels (image):<br />
      <i>(565px by default)</i></label>
    <input name="wpts-coin-width" id="wpts-coin-width" size="5" value="<?php echo get_option('wpts-coin-width'); ?>">
    </input>
    <br />
    <br />
    <label>Height in pixels (image):<br />
      <i>(290px by default)</i></label>
    <input name="wpts-coin-height" id="wpts-coin-height" size="5" value="<?php echo get_option('wpts-coin-height'); ?>">
    </input>
    <br />
    <br />
    <label>Number of Squares per Width:<br />
      <i>(7 by default)</i></label>
    <input name="wpts-coin-spw" id="wpts-coin-spw" size="5" value="<?php echo get_option('wpts-coin-spw'); ?>">
    </input>
    <br />
    <br />
    <label>Number of Squares per Height:<br />
      <i>(5 by default)</i></label>
    <input name="wpts-coin-sph" id="wpts-coin-sph" size="5" value="<?php echo get_option('wpts-coin-sph'); ?>">
    </input>
    <br />
    <br />
    <label>Slide Display Duration in ms:<br />
      <i>(5000ms by default)</i></label>
    <input name="wpts-coin-delay" id="wpts-coin-delay" size="5" value="<?php echo get_option('wpts-coin-delay'); ?>">
    </input>
    <br />
    <br />
    <label>Choose your slide transition effect:</label>
    <?php
	$csRandom = (get_option('wpts-coin-effect') == 'random' || get_option('wpts-coin-effect') == '') ? "checked" : "";
	$csSwirl = get_option('wpts-coin-effect') == 'swirl' ? "checked" : "";
	$ftRain = get_option('wpts-coin-effect') == 'rain' ? "checked" : "";
 ?>
    <input type="radio" name="wpts-coin-effect" class="wpts-coin-effect" value="" <?php echo $csRandom; ?>>
    Random
    <input type="radio" name="wpts-coin-effect" class="wpts-coin-effect" value="swirl" <?php echo $csSwirl; ?>>
    Swirl
    <input type="radio" name="wpts-coin-effect" class="wpts-coin-effect" value="rain" <?php echo $csRain; ?>>
    Rain <br />
    <br />
    <label>Hide navigation:</label>
    <?php if(get_option('wpts-coin-navigation') != ""){ $ch = "checked='checked'"; } else { $ch = ''; }?>
    <input type="checkbox" id="wpts-coin-navigation" name="wpts-coin-navigation" <?php echo $ch; ?> />
    <br />
    <br />
    <label>Always Show navigation:</label>
    <?php if(get_option('wpts-coin-navigationShow') == "always"){ $ch = "checked='checked'"; } else { $ch = ''; }?>
    <input type="checkbox" id="wpts-coin-navigationShow" name="wpts-coin-navigationShow" <?php echo $ch; ?> value='always' />
    <br />
    <br />
    <label>Use theme coin slider styles:</label>
    <?php if(get_option('wpts-coin-style') != ""){ $ch = "checked=''"; } else { $ch = ''; }?>
    <input type="checkbox" id="wpts-coin-style" name="wpts-coin-style" <?php echo $ch; ?> />
    <br />
    <br />
    <label>Image Repeat:</label>
    <?php if(get_option('wpts-coin-repeat') != ""){ $ch = "checked=''"; } else { $ch = ''; }?>
    <input type="checkbox" id="wpts-coin-repeat" name="wpts-coin-repeat" <?php echo $ch; ?> />
    <br />
    <br />
    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="wpts-coin-width-slider,wpts-coin-height-slider,wpts-coin-width,wpts-coin-height,wpts-coin-delay,wpts-coin-spw,wpts-coin-sph,wpts-coin-effect,wpts-coin-navigation,wpts-coin-navigationShow,wpts-coin-style,wpts-coin-repeat" />
    <br />
    <input type="submit" name="Submit" value="<?php _e('Update Options') ?>" />
  </form>
</div>

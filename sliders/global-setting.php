<?php
/**
 *  Copyright 2011-2012 TemplateAcess. (email: info@templateaccess.com)
 **/
?>

<div id="global_setting" class="has-table">
  <form method="post" action="options.php" class="wpts">
    <?php wp_nonce_field('update-options'); ?>
    <strong>Set Global Config <?php echo THIS_PLUGIN_NAME; ?> parameters:</strong> <br />
	<br />
	WP Theme Slider is a WordPress plugin that allows you use three different image sliders on your WordPress blog.<br />
	To switch, simply change the slider type (radio button) and click "Update Settings".<br />
	You can use Cycle Slider, Coin Slider, or the dazzling 3D Piecemaker Slider.<br />
    <br />
    You should add this code to your template file where you want the <?php echo THIS_PLUGIN_NAME; ?> gallery to be displayed:<br />
    <br />
    <code>&lt;&#63;php include (WP_PLUGIN_URL .'/<?php echo THIS_PLUGIN_FOLDER; ?>/wp-theme-slider.php'); &#63;&#62;</code> <br />
    <br />
    <br />
    <?php
		$wptsCycle = (get_option('wpts-slider') == 'cycle' || get_option('wpts-slider') == '') ? "checked" : "";
		$wptsCoin = get_option('wpts-slider') == 'coin' ? "checked" : "";
		$wptsPiecemaker = get_option('wpts-slider') == 'piecemaker' ? "checked" : "";
	//echo '1'.$wptsCycle.'; 2'.$wptsCoin.'; 3'.$wptsPiecemaker.';';
	?>
    <label>Choose your slider scripts:</label>
    <br />
    <label class="free_width">
      <input type="radio" name="wpts-slider" class="wpts-slider" value="cycle" <?php echo $wptsCycle; ?>>
      Cycle Slider</label>
    <label class="free_width">
      <input type="radio" name="wpts-slider" class="wpts-slider" value="coin" <?php echo $wptsCoin; ?>>
      Coin Slider</label>
    <label class="free_width">
      <input type="radio" name="wpts-slider" class="wpts-slider" value="piecemaker" <?php echo $wptsPiecemaker; ?>>
      Piecemaker Slider</label>
    <br />
    <br />
    <br />
    <label>Number of slides to display:<br />
      <i>(5 by default)</i></label>
    <input name="wpts-items" id="wpts-items" size="5" value="<?php echo get_option('wpts-items'); ?>">
    </input>
    <br />
    <br />
    <label>Show posts or static slide:<br />
      <i>(Posts is not checked)</i></label>
    <?php if(get_option('wpts-static') != ""){ $ch = "checked=''"; } else { $ch = ''; }?>
    <input type="checkbox" id="wpts-static" name="wpts-static" <?php echo $ch ?> />
    <br />
    <br />
    <label>Show post from the category:</label>
    <input name="wpts-category" id="wpts-category" size="25" value="<?php echo get_option('wpts-category'); ?>">
    </input>
    <br />
    <br />
    <br />
    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="tabs" value="global_setting" />
    <input type="hidden" name="page_options" value="wpts-category,wpts-static,wpts-items,wpts-slider" />
    <br />
    <input type="submit" name="Submit" value="<?php _e('Update Setting') ?>" />
  </form>
  <br />
  <hr>
  <?php if ($setting) { ?>
  <strong>To install settings from the default configuration</strong><br />
  <br />
  From: <?php echo $link_to_config; ?>
  <form method="post" action="options.php" class="wpts">
    <?php wp_nonce_field('update-options'); ?>
    <?php

		$array_keys = array();
		$need_version = '0.9.0'; $this_version = '0.8.1';
		foreach ($config_wpts_default as $keys => $values) {
			$this_version = ($keys == 'wpts-version') ? $values : $this_version;
			echo "<input type='hidden' name='{$keys}' value='{$values}' />\n";
			$array_keys[] = $keys;
		}
		$list_keys = implode(",", $array_keys);
	?>
    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="tabs" value="global_setting" />
    <br />
    <?php if ($need_version > $this_version) { ?>
    <h3>You should restructure Default Setting to the current plugin version </h3>
    <br />
    <input type="hidden" name="wpts-update-version" value="2" />
    <input type="hidden" name="page_options" value="wpts-update-version" />
    <input type="submit" name="Submit" value="<?php _e('Restructure') ?>" style="padding:5px; border:1px solid #F00;" />
    <?php

	} else { ?>
    <input type="hidden" name="page_options" value="<?php echo $list_keys; ?>" />
    <input type="submit" name="Submit" value="<?php _e('Load Default Setting') ?>" />
    <?php } ?>
  </form>
  <br />
  <hr>
  <strong>To change the default settings</strong><br />
  <br />
  To: <?php echo $link_to_config; ?>
  <form method="post" action="options.php" class="wpts">
    <?php wp_nonce_field('update-options'); ?>
    <input type="hidden" name="wpts-config" value="2" />
    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="tabs" value="global_setting" />
    <input type="hidden" name="page_options" value="wpts-config" />
    <br />
    <input type="submit" name="Submit" value="<?php _e('Save Setting') ?>" />
  </form>
  <?php } else { ?>
  <h2>The configuration file is not available</h2>
  </br>
  <strong>To make reserve copying of plugin settings you should create the theme-config folder with config.php file inside in your current theme folder.</strong><br />
  <?php } ?>
</div>

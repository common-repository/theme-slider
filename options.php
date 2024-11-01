<?php
/**
 *  Copyright 2011-2012 TemplateAcess. (email: info@templateaccess.com)
 **/

$location = $options_page; // Form Action URI
include (THIS_PLUGIN_DIR.'/plugin-update.php');

$array_param = array( // all variables used in config file
	// global data
	'wpts-version',
	'wpts-category',
	'wpts-static',
	'wpts-items',
	'wpts-slider',
	// slider array data
	//'wpts-images-',
	//'wpts-url-',
	//'wpts-desctext-',
	//'wpts-title-',
	//'wpts-text-',
	// coin slider data
	'wpts-coin-width-slider',
	'wpts-coin-height-slider',
	'wpts-coin-width',
	'wpts-coin-height',
	'wpts-coin-delay',
	'wpts-coin-spw',
	'wpts-coin-sph',
	'wpts-coin-effect',
	'wpts-coin-navigation',
	'wpts-coin-navigationShow',
	'wpts-coin-style',
	'wpts-coin-repeat',
	'wpts-coin-fade',
	// cycle slider data
	'wpts-cycle-width-slider',
	'wpts-cycle-height-slider',
	'wpts-cycle-width',
	'wpts-cycle-height',
	'wpts-cycle-delay',
	'wpts-cycle-navigation',
	'wpts-cycle-navigation-number',
	'wpts-cycle-navigation-image',
	'wpts-cycle-width-navimg',
	'wpts-cycle-height-navimg',
	'wpts-cycle-style',
	// piecemaker slider data
	'wpts-piecemaker-width-slider',
	'wpts-piecemaker-height-slider',
	'wpts-piecemaker-width',
	'wpts-piecemaker-height',
	'wpts-piecemaker-shadow',
	'wpts-piecemaker-scrollUp',
	'wpts-piecemaker-shuffle',
	'wpts-piecemaker-segment',
	'wpts-piecemaker-tween-time',
	'wpts-piecemaker-tween-delay',
	'wpts-piecemaker-tween-type',
	'wpts-piecemaker-z-distance',
	'wpts-piecemaker-expand',
	'wpts-piecemaker-inner-color',
	'wpts-piecemaker-text-background',
	'wpts-piecemaker-text-distance',
	'wpts-piecemaker-shadow-darkness',
	'wpts-piecemaker-auto-play',
	'wpts-piecemaker-style',
);

$create_folder = 1;
$setting = false;

function wpts_slider_conf_default ($array_param) { // load default config
	$conf_default = '<?php'."\n";
	foreach ($array_param as $params) {
		$conf_default .= '$config_wpts["'.$params.'"] = "'.get_option($params).'";'."\n";
	}
	$conf_default .= '?>';
	return $conf_default;
}
function wpts_slider_conf () { // load default config from file
	if (file_exists(THIS_THEME_DIR.'/theme-config/config.php')) {
		include (THIS_THEME_DIR.'/theme-config/config.php');
		return $config_wpts ? $config_wpts : $config_wspc;
	}
	return false;
}
function wpts_slider_conf_save ($data) { // save default config
	if ($data) {
		file_put_contents(THIS_THEME_DIR.'/theme-config/config.php', $data);
		return true;
	}
	return false;
}

if (function_exists('check_setting_folder')) { // check whether all required cofiguration files are in ('/theme-config/config.php')
	$setting = check_setting_folder ();
}
if ($setting) {
	if (function_exists('wpts_slider_conf')) {
		$config_wpts_default = wpts_slider_conf(); // fetch default settings from the configuration file
	}
	if (get_option('wpts-update-version') == 2) { // if the config file version is old, it should be updated by pressing the corresponding button on the page
		if (function_exists('update_old_data')) {
			update_old_data(); // recreate the config file with new settings
		}
		update_option('wpts-update-version', 1);
	}
}

foreach ($array_param as $params) { // read new settings from the DB
	$config_wpts[$params] = get_option($params) ? get_option($params) : $config_wpts_default[$params];
}

if (function_exists('wpts_slider_conf_default')) { // create a variable that should be addeded later to the config file
	$conf_default = wpts_slider_conf_default($array_param);
}
// save the settings into the default setting file
if (get_option('wpts-config') == 2) {
	if (function_exists('wpts_slider_conf_save')) {
		wpts_slider_conf_save($conf_default);
	}
	update_option('wpts-config', 1);
}

// link to the configuration file for data output
$link_to_config = str_replace(get_bloginfo('wpurl').'/', '', get_bloginfo('template_url')).'/theme-config/config.php';

?>
<style>
.cs label { width: 250px; float: left; }
.cs label.free_width { width:auto; float:left; padding:0 20px 0 0; }
#content_wrap { border:1px solid #CCC; padding:10px; margin:0; border-radius:10px; }
.options_tabs { height:30px; margin:0 0 0 20px; }
.options_tabs li { float:left; padding:5px 10px; border:1px solid #CCC; background:#F1F1F1; font: 13px/18px Georgia, "Times New Roman", "Bitstream Charter", Times, serif; border-top-left-radius: 6px; border-top-right-radius: 6px; border-bottom:0; margin:0 1px 0 0; }
.decstext { display:block; }
.decstext .hide { display:none; }
#header small { display:block; padding:0 0 6px 20px;}
</style>
<div id="slider_framework" class="wrap">
  <div id="header">
    <h2>WP <?php echo THIS_PLUGIN_NAME; ?> Configuration</h2>
	<small>version #<?php echo THIS_VERSION; ?></small>
	<small>Date create: <?php echo THIS_PLUGIN_DATE_CREATE; ?></small>
  </div>
  <ul class="options_tabs">
    <li><a href="#global_setting" rel="tabs">Global Setting</a><span></span></li>
    <li><a href="#config_setting" rel="tabs">Config Slider Setting</a><span></span></li>
	<?php if (get_option('wpts-static') == 'on') { ?>
		<li><a href="#image_upload" rel="tabs">Image</a><span></span></li>
	<?php } ?>
  </ul>
  <div id="content_wrap">
    <div id="content">
        <?php
			include ('sliders/global-setting.php'); // include the page with global settings
			if ($wptsCoin) { // include the page with the required slider
				include ('sliders/coin-slider.php');
			} else if ($wptsPiecemaker) {
				include ('sliders/piecemaker-slider.php');
			} else {
				include ('sliders/cycle-slider.php');
			}
			if (get_option('wpts-static') == 'on') {
				include ('sliders/image-slider.php'); // include the page with the slide settings for the slider
			}
		?>
    </div>
  </div>
</div>

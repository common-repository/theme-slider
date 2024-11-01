<?php

/**
 *  Copyright 2011-2012 TemplateAcess. (email: info@templateaccess.com)
 **/

//$array_param_old = array( // work plugins values old
//	'wpsc-category',
//	'wpsc-static',
//	'wpsc-items',
//	'wpsc-slider',
//	'wpsc-width-slider',
//	'wpsc-height-slider',
//	'wpsc-width',
//	'wpsc-height',
//	'wpsc-delay',
//	'wpsc-spw',
//	'wpsc-sph',
//	'wpsc-effect',
//	'wpsc-navigation',
//	'wpsc-navigation-number',
//	'wpsc-navigation-image',
//	'wpsc-width-navimg',
//	'wpsc-height-navimg',
//	'wpsc-navigationShow',
//	'wpsc-style',
//	'wpsc-repeat',
//	'wpsc-fade',
//	'wpsc-scrollUp',
//	'wpsc-shuffle',
//	'wpsc-segment',
//	'wpsc-tween-time',
//	'wpsc-tween-delay',
//	'wpsc-tween-type',
//	'wpsc-z-distance',
//	'wpsc-expand',
//	'wpsc-inner-color',
//	'wpsc-text-background',
//	'wpsc-text-distance',
//	'wpsc-shadow-darkness',
//	'wpsc-auto-play',
//);

function update_old_data () {
	global $config_wpts_default, $array_param;
	$config_wpsc_default_old = $config_wpts_default;
	$config_wpts_default = array();

	// config global values
	$config_wpts_default['wpts-version'] 	= THIS_VERSION;
	$config_wpts_default['wpts-category'] 	= $config_wpsc_default_old['wpsc-category'];
	$config_wpts_default['wpts-static'] 	= $config_wpsc_default_old['wpsc-static'];
	$config_wpts_default['wpts-items'] 		= $config_wpsc_default_old['wpsc-items'];
	$config_wpts_default['wpts-slider'] 	= $config_wpsc_default_old['wpsc-slider'];
	//$config_wpts_default['wpts-images-'];
	//$config_wpts_default['wpts-url-'];
	//$config_wpts_default['wpts-desctext-'];
	//$config_wpts_default['wpts-title-'];
	//$config_wpts_default['wpts-text-'];
	// config coin slider
	$config_wpts_default['wpts-coin-width-slider']		= $config_wpsc_default_old['wpsc-width-slider'];
	$config_wpts_default['wpts-coin-height-slider']		= $config_wpsc_default_old['wpsc-height-slider'];
	$config_wpts_default['wpts-coin-width']				= $config_wpsc_default_old['wpsc-width'];
	$config_wpts_default['wpts-coin-height']			= $config_wpsc_default_old['wpsc-height'];
	$config_wpts_default['wpts-coin-delay']				= $config_wpsc_default_old['wpsc-delay'];
	$config_wpts_default['wpts-coin-spw']				= $config_wpsc_default_old['wpsc-spw'];
	$config_wpts_default['wpts-coin-sph']				= $config_wpsc_default_old['wpsc-sph'];
	$config_wpts_default['wpts-coin-effect']			= $config_wpsc_default_old['wpsc-effect'];
	$config_wpts_default['wpts-coin-navigation']		= $config_wpsc_default_old['wpsc-navigation'];
	$config_wpts_default['wpts-coin-navigationShow']	= $config_wpsc_default_old['wpsc-navigationShow'];
	$config_wpts_default['wpts-coin-style']				= $config_wpsc_default_old['wpsc-style'];
	$config_wpts_default['wpts-coin-repeat']			= $config_wpsc_default_old['wpsc-repeat'];
	$config_wpts_default['wpts-coin-fade']				= $config_wpsc_default_old['wpsc-fade'];
	// config cycle slider
	$config_wpts_default['wpts-cycle-width-slider']			= $config_wpsc_default_old['wpsc-width-slider'];
	$config_wpts_default['wpts-cycle-height-slider']		= $config_wpsc_default_old['wpsc-height-slider'];
	$config_wpts_default['wpts-cycle-width']				= $config_wpsc_default_old['wpsc-width'];
	$config_wpts_default['wpts-cycle-height']				= $config_wpsc_default_old['wpsc-height'];
	$config_wpts_default['wpts-cycle-delay']				= $config_wpsc_default_old['wpsc-delay'];
	$config_wpts_default['wpts-cycle-navigation']			= $config_wpsc_default_old['wpsc-navigation'];
	$config_wpts_default['wpts-cycle-navigation-number']	= $config_wpsc_default_old['wpsc-navigation-number'];
	$config_wpts_default['wpts-cycle-navigation-image']		= $config_wpsc_default_old['wpsc-navigation-image'];
	$config_wpts_default['wpts-cycle-width-navimg']			= $config_wpsc_default_old['wpsc-width-navimg'];
	$config_wpts_default['wpts-cycle-height-navimg']		= $config_wpsc_default_old['wpsc-height-navimg'];
	$config_wpts_default['wpts-cycle-style']				= $config_wpsc_default_old['wpsc-style'];
	// config piecemaker slider
	$config_wpts_default['wpts-piecemaker-width-slider']	= $config_wpsc_default_old['wpsc-width-slider'];
	$config_wpts_default['wpts-piecemaker-height-slider']	= $config_wpsc_default_old['wpsc-height-slider'];
	$config_wpts_default['wpts-piecemaker-width']			= $config_wpsc_default_old['wpsc-width'];
	$config_wpts_default['wpts-piecemaker-height']			= $config_wpsc_default_old['wpsc-height'];
	$config_wpts_default['wpts-piecemaker-shadow']			= 0;
	$config_wpts_default['wpts-piecemaker-scrollUp']		= $config_wpsc_default_old['wpsc-scrollUp'];
	$config_wpts_default['wpts-piecemaker-shuffle']			= $config_wpsc_default_old['wpsc-shuffle'];
	$config_wpts_default['wpts-piecemaker-segment']			= $config_wpsc_default_old['wpsc-segment'];
	$config_wpts_default['wpts-piecemaker-tween-time']		= $config_wpsc_default_old['wpsc-tween-time'];
	$config_wpts_default['wpts-piecemaker-tween-delay']		= $config_wpsc_default_old['wpsc-tween-delay'];
	$config_wpts_default['wpts-piecemaker-tween-type']		= $config_wpsc_default_old['wpsc-tween-type'];
	$config_wpts_default['wpts-piecemaker-z-distance']		= $config_wpsc_default_old['wpsc-z-distance'];
	$config_wpts_default['wpts-piecemaker-expand']			= $config_wpsc_default_old['wpsc-expand'];
	$config_wpts_default['wpts-piecemaker-inner-color']		= $config_wpsc_default_old['wpsc-inner-color'];
	$config_wpts_default['wpts-piecemaker-text-background']	= $config_wpsc_default_old['wpsc-text-background'];
	$config_wpts_default['wpts-piecemaker-text-distance']	= $config_wpsc_default_old['wpsc-text-distance'];
	$config_wpts_default['wpts-piecemaker-shadow-darkness']	= $config_wpsc_default_old['wpsc-shadow-darkness'];
	$config_wpts_default['wpts-piecemaker-auto-play']		= $config_wpsc_default_old['wpsc-auto-play'];
	$config_wpts_default['wpts-piecemaker-style']			= $config_wpsc_default_old['wpsc-style'];

	$conf_default = '<?php'."\n";
	foreach ($array_param as $params) {
		$conf_default .= '$config_wpts["'.$params.'"] = "'.$config_wpts_default[$params].'";'."\n";
	}
	$conf_default .= '?>';
	if (function_exists('wpts_slider_conf_save')) {
		wpts_slider_conf_save($conf_default);
	}
}

function check_setting_folder () {
	global $create_folder;
	$folder = THIS_THEME_DIR.'/theme-config/';
	$file = $folder.'config.php';
	if(!is_dir($folder)) {
		if ($create_folder++ != 2) {
			@mkdir($folder, 0755); //create the new folder
			check_setting_folder ();
		}
		return false;
	}
	if (!file_exists($file)) {
		$create_file = fopen($file, "w+"); //create the new file
		if (!$create_file) {
			return false;
		}
		fclose($create_file);
		$chmod = chmod($file, 0755); //set the appropriate permissions.
	}
	return true;
}

?>
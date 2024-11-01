<?php
/*
Plugin Name: WP Theme Slider
Plugin URI: http://www.templateaccess.com/theme-slider
Description: WP Theme Slider is a WordPress plugin that allows you use three different image scrollers/sliders on your Wo
Version: 1.0.0
Author: TemplateAccess (Bursak Aleksander)
Author URI: http://www.templateaccess.com/
*/

/*  Copyright 2011-2012 TemplateAcess. (email: info@templateaccess.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/* Definitions */
define('THIS_VERSION', '1.0.0');
define('THIS_PLUGIN_DATE_CREATE', 'December 2011');
define('THIS_PLUGIN_NAME', 'Theme Slider');
define('THIS_PLUGIN_DESCRIPTION', 'WP Theme Slider is a WordPress plugin that allows you use three different image scrollers/sliders on your Wo');
define('THIS_PLUGIN_FOLDER', 'theme-slider');
define('THIS_PLUGIN_DIR', str_replace('\\','/',WP_PLUGIN_DIR.'/'.dirname(plugin_basename(__FILE__))));
define('THIS_PLUGIN_URL', str_replace('\\','/',WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__))));
define('THIS_THEME_DIR', ABSPATH.str_replace(get_bloginfo('wpurl').'/', '', get_bloginfo('template_url')));

/* options page */
$options_page = get_option('siteurl') . '/wp-admin/admin.php?page='.THIS_PLUGIN_FOLDER.'/options.php';

/* Adds our admin theme under "Options" */
function wpts_options_page() {
	add_theme_page(THIS_PLUGIN_NAME, THIS_PLUGIN_NAME, 10, THIS_PLUGIN_FOLDER.'/options.php');
}

function wpts_head () {
	$script = "<!-- ".THIS_PLUGIN_NAME." START  -->\n";
	//echo get_option('wpts-style');
	switch (get_option('wpts-slider')) {
		case 'cycle':
			if (get_option('wpts-cycle-style')!='on') {
				$script .= "<link rel=\"stylesheet\" href=\"".THIS_PLUGIN_URL."/css/wp-cycle-slider.css.php\" type=\"text/css\" media=\"screen\" charset=\"utf-8\"/>\n";
			}
		break;
		case 'coin':
			if (get_option('wpts-coin-style')!='on') {
				$script .= "<link rel=\"stylesheet\" href=\"".THIS_PLUGIN_URL."/css/wp-coin-slider.css.php\" type=\"text/css\" media=\"screen\" charset=\"utf-8\"/>\n";
			}
		break;
		case 'piecemaker':
		break;
	}
	switch (get_option('wpts-slider')) {
		case 'cycle':
			$script .= "<script type=\"text/javascript\" src=\"".THIS_PLUGIN_URL."/scripts/cycle-slider.min.js\"></script>\n";
		break;
		case 'coin':
			$script .= "<script type=\"text/javascript\" src=\"".THIS_PLUGIN_URL."/scripts/coin-slider.js\"></script>\n";
		break;
		case 'piecemaker':
			$script .= "<script type=\"text/javascript\" src=\"".THIS_PLUGIN_URL."/scripts/swfobject/swfobject.js\"></script>\n";
		break;
	}
	$script .= "<!-- ".THIS_PLUGIN_NAME." END  -->\n";
	echo $script;
}


function my_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-upload', THIS_PLUGIN_URL.'/scripts/script.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');
}

function my_admin_styles() {
	wp_enqueue_style('thickbox');
}

if (isset($_GET['page']) && $_GET['page'] == THIS_PLUGIN_FOLDER.'/options.php') {
	add_action('admin_print_scripts', 'my_admin_scripts');
	add_action('admin_print_styles', 'my_admin_styles');
}

include(THIS_PLUGIN_DIR."/widget-wptheme-slider.php"); // include wiget settings
add_action('wp_head', 'wpts_head');
add_action('admin_menu', 'wpts_options_page');
add_action('widgets_init', create_function('', 'register_widget("WPSlider");')); // init widget

?>
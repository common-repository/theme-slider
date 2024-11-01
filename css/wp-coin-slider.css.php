<?php
header("Content-type: text/css");
$path_dir = explode('wp-content', $_SERVER["SCRIPT_FILENAME"]);
require_once($path_dir[0].'wp-load.php');

$holderWidth = get_option('wpts-coin-width') ? get_option('wpts-coin-width') : 565;
$holderHeight = get_option('wpts-coin-height') ? get_option('wpts-coin-height') : 290;
$WidthImg = get_option('wpts-coin-width-slider') ? get_option('wpts-coin-width-slider') : 565;
$HeightImg = get_option('wpts-coin-height-slider') ? get_option('wpts-coin-height-slider') : 290;

?>

/*
	Coin Slider jQuery plugin CSS styles
	http://workshop.rs/projects/coin-slider
*/

.slider { margin:0; float:left; padding:0; width:<?php echo $holderWidth; ?>px; height: <?php echo $holderHeight; ?>px; position:relative;}
#coin-slider-coin-slider { width: <?php echo $holderWidth ?>px; height: <?php echo $holderHeight; ?>px;}

.coin-slider { overflow: hidden; zoom: 1; position: relative; }
.coin-slider a { text-decoration: none; outline: none; border: none; }

.cs-buttons { top:-30px; font-size: 0px; padding: 10px; float: left; }
.cs-buttons a { margin-left: 5px; height: 10px; width: 10px; float: left; border: 1px solid #B8C4CF; color: #B8C4CF; text-indent: -1000px; }
.cs-active { background-color: #B8C4CF; color: #FFFFFF; }

.cs-title { right:60px; bottom:0; margin:0; padding:20px 30px; color: #ffffff; text-transform: none; position:relative; width:300px; background: url(<?php echo THIS_PLUGIN_URL; ?>/images/overlay.png) repeat; }
.caption-title { display: block; padding: 12px 0 16px; color: #fbfbfb; font-size:24px; font-weight: normal; font-family:Liberation sans, Arial, Verdana, sans-serif;}
.caption-date { color:#ffffff; font-style: normal; font-size: 11px; text-transform: none; padding: 0 0 0; line-height: 20px; }
.caption-date span { color:#fbfbfb; }
.caption-content { color: #ffffff; line-height: 20px; padding: 0 0 19px; }

.cs-prev,
.cs-next { background:url(<?php echo THIS_PLUGIN_URL; ?>/images/overlay.png) repeat left top; color: #FFFFFF; padding: 5px 15px; }
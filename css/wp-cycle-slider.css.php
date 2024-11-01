<?php
header("Content-type: text/css");
//$path_dir = str_replace($_SERVER["SCRIPT_NAME"],'',$_SERVER["SCRIPT_FILENAME"]);
$path_dir = explode('wp-content', $_SERVER["SCRIPT_FILENAME"]);
require_once($path_dir[0].'wp-load.php');

$WidthImg = get_option('wpts-cycle-width-slider') ? get_option('wpts-cycle-width-slider') : 565;
$HeightImg = get_option('wpts-cycle-height-slider') ? get_option('wpts-cycle-height-slider') : 290;
$holderWidth = get_option('wpts-cycle-width') ? get_option('wpts-cycle-width') : 565;
$holderHeight = get_option('wpts-cycle-height') ? get_option('wpts-cycle-height') : 290;

?>

/*
	Cycle Slider jQuery plugin CSS styles
	http://jquery.malsup.com/cycle/
*/

.slider { margin:0; float:left; padding:0; width:<?php echo $holderWidth; ?>px; height: <?php echo $holderHeight; ?>px; position:relative;}
div#slideshow { width:<?php echo $holderWidth; ?>px; height:<?php echo $holderHeight; ?>px; padding:0; margin:0 auto; }
.slider-item { width:<?php echo $holderWidth; ?>px !important; height:<?php echo $HeightImg; ?>px; position:relative; }
.slider_content_inner img { border: none; }

.cs-title { right:60px; bottom:0; margin:0; padding:10px 30px; color: #ffffff; text-transform: none; position:absolute; width:300px; background: url(<?php echo THIS_PLUGIN_URL; ?>/images/overlay.png) repeat; }
.caption-title { display: block; padding: 10px 0; color: #fbfbfb; font-size:24px; font-weight: normal; font-family:Liberation sans, Arial, Verdana, sans-serif;}
.caption-date { display: block; color:#ffffff; font-style: normal; font-size: 11px; text-transform: none; padding: 0 0 0; line-height: 20px; }
.caption-date span { color:#fbfbfb; }
.caption-content { display: block; color: #ffffff; line-height: 20px; padding: 0 0 19px; }

.controls-center { top:-20px; left: 50%; margin-left: -35px; position: relative; width:100px; height:20px; z-index:1000;}
.controls-center ul li { float:left;}
.controls-center ul li a { margin-left: 5px; height: 10px; width: 10px; float: left; border: 1px solid #B8C4CF; color: #B8C4CF; }
.controls-center ul li a img.spacer { width:10px; height: 10px; }
.controls-center ul li a:hover,
.controls-center ul li.activeSlide a { background-color: #B8C4CF; color: #FFFFFF; }

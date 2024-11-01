<?php
$path_dir = explode('wp-content', $_SERVER["SCRIPT_FILENAME"]);
require_once($path_dir[0].'wp-load.php');
$out = '';
$i = 0;
$wptsConf['wpts-items']							= get_option('wpts-items') ? get_option('wpts-items') : 5;
$wptsConf['wpts-static'] 						= get_option('wpts-static');
$wptsConf['wpts-piecemaker-width-slider']		= get_option('wpts-piecemaker-width-slider') ? get_option('wpts-piecemaker-width-slider') : 970;
$wptsConf['wpts-piecemaker-height-slider']		= get_option('wpts-piecemaker-height-slider') ? get_option('wpts-piecemaker-height-slider') : 440;

$wptsConf['wpts-piecemaker-width']				= get_option('wpts-piecemaker-width') ? get_option('wpts-piecemaker-width') : 970;
$wptsConf['wpts-piecemaker-height']				= get_option('wpts-piecemaker-height') ? get_option('wpts-piecemaker-height') : 540;

$wptsConf['wpts-piecemaker-segment']			= get_option('wpts-piecemaker-segment') ? get_option('wpts-piecemaker-segment') : 9;
$wptsConf['wpts-piecemaker-tween-time']			= get_option('wpts-piecemaker-tween-time') ? get_option('wpts-piecemaker-tween-time') : 3;
$wptsConf['wpts-piecemaker-tween-delay']		= get_option('wpts-piecemaker-tween-delay') ? get_option('wpts-piecemaker-tween-delay') : 0.1;
$wptsConf['wpts-piecemaker-tween-type']			= get_option('wpts-piecemaker-tween-type') ? get_option('wpts-piecemaker-tween-type') : 'linear';
$wptsConf['wpts-piecemaker-z-distance']			= get_option('wpts-piecemaker-z-distance') ? get_option('wpts-piecemaker-z-distance') : 0.1;
$wptsConf['wpts-piecemaker-expand']				= get_option('wpts-piecemaker-expand') ? get_option('wpts-piecemaker-expand') : 25;
$wptsConf['wpts-piecemaker-inner-color']		= get_option('wpts-piecemaker-inner-color') ? get_option('wpts-piecemaker-inner-color') : '0x000000';
$wptsConf['wpts-piecemaker-text-background']	= get_option('wpts-piecemaker-text-background') ? get_option('wpts-piecemaker-text-background') : '0x666666';
$wptsConf['wpts-piecemaker-text-distance']		= get_option('wpts-piecemaker-text-distance') ? get_option('wpts-piecemaker-text-distance') : 25;
$wptsConf['wpts-piecemaker-shadow-darkness']	= get_option('wpts-piecemaker-shadow-darkness') ? get_option('wpts-piecemaker-shadow-darkness') : 25;
$wptsConf['wpts-piecemaker-auto-play']			= get_option('wpts-piecemaker-auto-play') ? get_option('wpts-piecemaker-auto-play') : 2;

header("Content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n";
echo "<Piecemaker>\n";
echo "<Settings>\n";
echo "<imageWidth>".$wptsConf['wpts-piecemaker-width-slider']."</imageWidth>\n";
echo "<imageHeight>".$wptsConf['wpts-piecemaker-height-slider']."</imageHeight>\n";
echo "<segments>".$wptsConf['wpts-piecemaker-segment']."</segments>\n";
echo "<tweenTime>".$wptsConf['wpts-piecemaker-tween-time']."</tweenTime>\n";
echo "<tweenDelay>".$wptsConf['wpts-piecemaker-tween-delay']."</tweenDelay>\n";
echo "<tweenType>".$wptsConf['wpts-piecemaker-tween-type']."</tweenType>\n";
echo "<zDistance>".$wptsConf['wpts-piecemaker-z-distance']."</zDistance>\n";
echo "<expand>".$wptsConf['wpts-piecemaker-expand']."</expand>\n";
echo "<innerColor>".$wptsConf['wpts-piecemaker-inner-color']."</innerColor>\n";
echo "<textBackground>".$wptsConf['wpts-piecemaker-text-background']."</textBackground>\n";
echo "<textDistance>".$wptsConf['wpts-piecemaker-text-distance']."</textDistance>\n";
echo "<shadowDarknent>".$wptsConf['wpts-piecemaker-shadow-darkness']."</shadowDarknent>\n";
echo "<autoplay>".$wptsConf['wpts-piecemaker-auto-play']."</autoplay>\n";
echo "<countItem>".$wptsConf['wpts-static']."</countItem>\n";
echo "</Settings>\n\n";

if ($wptsConf['wpts-static']) {
	while ($i <= $wptsConf['wpts-items']) :
		$wptsConf['wpts-piecemaker-image'] 		= get_option('wpts-image-'.$i)	? get_option('wpts-image-'.$i) 	: '';
		$wptsConf['wpts-piecemaker-text'] 		= get_option('wpts-text-'.$i) 	? get_option('wpts-text-'.$i) 	: THIS_PLUGIN_NAME.' Title';
		$wptsConf['wpts-piecemaker-url'] 		= get_option('wpts-url-'.$i) 	? get_option('wpts-url-'.$i) 	: '#';
		$wptsConf['wpts-piecemaker-title']		= get_option('wpts-title-'.$i)	? get_option('wpts-title-'.$i) 	: THIS_PLUGIN_NAME.' Text';
		$wptsConf['wpts-piecemaker-desctext']	= get_option('wpts-desctext-'.$i);

		if ($wptsConf['wpts-piecemaker-image']) :
			$out .= "<Image Filename='".str_replace('http://','',$wptsConf['wpts-piecemaker-image'])."'>\n";
			if ($wptsConf['wpts-piecemaker-desctext']) :
				$out .= "<Text>\n";
				$out .= "<headline>".$wptsConf['wpts-piecemaker-title']."</headline>\n";
				$out .= "<break>Ӂ</break>\n";
				$out .= "<paragraph></paragraph>\n";
				$out .= "<break>Ӂ</break>\n";
				$out .= "<inline><![CDATA[".$wptsConf['wpts-piecemaker-text']."]]></inline>\n";
				$out .= "Ӂ<a href='".$wptsConf['wpts-piecemaker-url']."' target='_blank'>View >></a>\n";
				$out .= "</Text>\n";
			endif;
			$out .= "</Image>\n\n";
		endif;
		$i++;
	endwhile;
} else {
	if (get_option('wpts-piecemaker-category')) {
		query_posts('showposts='.($wptsConf['wpts-items']*2).'&cat='.get_option('wpts-piecemaker-category'));
	} else {
		query_posts('showposts='.($wptsConf['wpts-items']*2));
	}
	if (have_posts()) {
		while (have_posts() && $i<$wptsConf['wpts-items']) : the_post();
			$image_attributes = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full'); // returns an array
			$wptsConf['wpts-piecemaker-image']  = $image_attributes[0];
			$wptsConf['wpts-piecemaker-text'] 	= get_the_excerpt();
			$wptsConf['wpts-piecemaker-url'] 	= get_permalink();
			$wptsConf['wpts-piecemaker-title']	= get_the_title();

			if (has_post_thumbnail()) {
				$out .= "<Image Filename='".str_replace('http://','',$wptsConf['wpts-piecemaker-image'])."'>\n";
				$out .= "<Text>\n";
				$out .= "<headline>".$wptsConf['wpts-piecemaker-title']."</headline>\n";
				$out .= "<break>Ӂ</break>\n";
				$out .= "<paragraph></paragraph>\n";
				$out .= "<break>Ӂ</break>\n";
				$out .= "<inline>".$wptsConf['wpts-piecemaker-text']."</inline>\n";
				$out .= "Ӂ<a href='".$wptsConf['wpts-piecemaker-url']."' target='_blank'>View >></a>\n";
				$out .= "</Text>\n";
				$out .= "</Image>\n\n";
			}
			$i++;
		endwhile;
	}
}

echo $out;
echo "</Piecemaker>";
?>
<?php
/**
 *  Copyright 2011-2012 TemplateAcess. (email: info@templateaccess.com)
 **/

$tmp_query = $wp_query;

$out = "";
$out_slider = '';
$i = 0;
$no 				= get_option('wpts-items') ? get_option('wpts-items') : 5;
$wptsStatic 		= get_option('wpts-static');
$wptsEffect 		= get_option('wpts-coin-effect') ? get_option('wpts-coin-effect') : '';
$wptsSpw			= get_option('wpts-coin-spw') ? get_option('wpts-coin-spw') : 7;
$wptsSph			= get_option('wpts-coin-sph') ? get_option('wpts-coin-sph') : 5;
$wptsWidth 			= get_option('wpts-coin-width') ? get_option('wpts-coin-width') : 565;
$wptsHeight 		= get_option('wpts-coin-height') ? get_option('wpts-coin-height') : 290;
$wptsWidthSlider 	= get_option('wpts-coin-width-slider') ? get_option('wpts-coin-width-slider') : 565;
$wptsHeightSlider 	= get_option('wpts-coin-height-slider') ? get_option('wpts-coin-height-slider') : 290;
$wptsDelay 			= get_option('wpts-coin-delay') ? get_option('wpts-coin-delay') : 5000;
$wptsNavigation 	= get_option('wpts-coin-navigation') ? 'false' : 'true';
$wptsRepeat 		= get_option('wpts-coin-repeat') ? 'repeat' : 'no-repeat';
$wptsnavigationShow	= get_option('wpts-coin-navigationShow') == 'always' ? 'always' : 'hover';
$wptsnavigationImage= get_option('wpts-coin-navigation-image') == '1' ? true : false;



if ($wptsStatic) {

	$out = "<div id='coin-slider'>";

	while ($i++ < $no) {

		$wptsImage 		= get_option('wpts-image-'.$i)	? get_option('wpts-image-'.$i) 	: '';
		$wptsText 		= get_option('wpts-text-'.$i) 	? get_option('wpts-text-'.$i) 	: THIS_PLUGIN_NAME.' Title';
		$wptsUrl 		= get_option('wpts-url-'.$i) 	? get_option('wpts-url-'.$i) 	: '#';
		$wptsTitle		= get_option('wpts-title-'.$i)	? get_option('wpts-title-'.$i) 	: THIS_PLUGIN_NAME.' Text';
		$wptsDesctext	= get_option('wpts-desctext-'.$i);

		if ($wptsImage) :
			$out_slider .= "<a href='{$wptsUrl}'>".
								"<img src='".$wptsImage."' alt='{$wptsTitle}' border='0' />";
			if ($wptsDesctext) :
				$out_slider .= "<span>".
									"<span class='caption-title'>{$wptsTitle}</span>".
									"<span class='caption-content'>".$wptsText."</span>".
								"</span>";
			endif;
			$out_slider .= "</a>\n";
		endif;

	}

	$out .= $out_slider."</div>\n";

} else {

	if (get_option('wpts-category')) {
		query_posts('showposts=10&cat='.get_option('wpts-coin-category'));
	} else {
		query_posts('showposts=10');
	}

	if (have_posts()) :

		$out = "<div id='coin-slider'>";

		while (have_posts() && $i++<$no) : the_post();

			$image 		= get_the_post_thumbnail($post->ID, array($wptsWidth,$wptsHeight));
			$text 		= get_the_excerpt();

			$permalink 	= get_permalink();
			$thetitle	= get_the_title();

			if (has_post_thumbnail()) :
				$out_slider .= "<a href='{$permalink}'>".
						"".$image."".
							"<span>".
								"<span class='caption-date'>".get_the_time('M. d, Y')."  / ".get_comments_number(0, 1, '%')." ".__('Comments')."</span>".
								"<span class='caption-title'>{$thetitle}</span>".
								"<span class='caption-content'>".
								"".$text."</span>".
							"</span>".
						"</a>\n";
			endif;

		//$i++;
		endwhile;

		$out .= $out_slider."</div>\n";

	endif;

}

$wp_query = $tmp_query;

$out .= "
<script type='text/javascript'>
jQuery(function ($) {
	$('#coin-slider').coinslider({width: $wptsWidthSlider,height: $wptsHeightSlider, spw: $wptsSpw, sph: $wptsSph, delay: $wptsDelay, navigation: $wptsNavigation, effect: '$wptsEffect', repeatBg: '$wptsRepeat', navigationShow: '$wptsnavigationShow'});
});
</script>
";

echo $out;
?>
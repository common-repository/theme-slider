<?php
/**
 *  Copyright 2011-2012 TemplateAcess. (email: info@templateaccess.com)
 **/

$tmp_query = $wp_query;

$out = "";
$out_slider = '';
$out_button = '';
$i = 0;
$count_i = '';
$no 				= get_option('wpts-items') ? get_option('wpts-items') : 5;
$wptsWidth 			= get_option('wpts-cycle-width') ? get_option('wpts-cycle-width') : 565;
$wptsHeight 		= get_option('wpts-cycle-height') ? get_option('wpts-cycle-height') : 290;
$wptsDelay 			= get_option('wpts-cycle-delay') ? get_option('wpts-cycle-delay') : 5000;
$wptsNavigationNum 	= get_option('wpts-cycle-navigation-number') ? true : false;
$wptsStatic 		= get_option('wpts-static');

if (get_option('wpts-cycle-shuffle')=='' && get_option('wpts-cycle-scrollUp')=='') {
	$wptsFX[] = 'fade';
} else {
	if (get_option('wpts-cycle-fade')) $wptsFX[] = get_option('wpts-cycle-fade');
}
if (get_option('wpts-cycle-scrollUp')) $wptsFX[] = get_option('wpts-cycle-scrollUp');
if (get_option('wpts-cycle-shuffle')) $wptsFX[] = get_option('wpts-cycle-shuffle');
$wptsFX = implode(",", $wptsFX);

if ($wptsStatic) {

	$out = "<!-- start slideshow --><div id='slideshow'>";
	$out_button = "<ul id='slider_nav'>";

	while ($i++ < $no) :

		$wptsImage 		= get_option('wpts-image-'.$i)	? get_option('wpts-image-'.$i) 	: '';
		$wptsText 		= get_option('wpts-text-'.$i) 	? get_option('wpts-text-'.$i) 	: THIS_PLUGIN_NAME.' Title';
		$wptsUrl 		= get_option('wpts-url-'.$i) 	? get_option('wpts-url-'.$i) 	: '/';
		$wptsTitle		= get_option('wpts-title-'.$i)	? get_option('wpts-title-'.$i) 	: THIS_PLUGIN_NAME.' Text';
		$wptsDesctext	= get_option('wpts-desctext-'.$i);

		if ($wptsImage) :
			$out_slider .= "<div class='slider-item'>\n<a href='{$wptsUrl}'><img src='{$wptsImage}' alt='{$wptsTitle}' width='{$wptsWidth}' height='{$wptsHeight}' border='0' /></a>\n";
			if ($wptsDesctext) {
				$out_slider .= "<div class='cs-title'>\n".
								"<span class='caption-title'>{$wptsTitle}</span>\n".
								"<span class='caption-content'>".$wptsText."</span>\n".
								"</div>\n";
			}
			$out_slider .= "</div>\n";
			$count_i = $i;
			if (get_option('wpts-cycle-navigation-image')) {
				$out_button .= "<li><a href='#'><img src='{$wptsImage}' alt='slide {$count_i}' width='".get_option('wpts-cycle-width-navimg')."' height='".get_option('wpts-cycle-height-navimg')."' /></a></li><!-- Slide {$count_i} -->\n";
			} else if ($wptsNavigationNum) {
				$out_button .= "<li><a href='#' title='slide {$count_i}'>".$count_i."</a></li><!-- Slide {$count_i} -->\n";
			} else {
				$out_button .= "<li><a href='#' title='slide {$count_i}'><img class='spacer' src='".THIS_PLUGIN_URL."/images/spacer.gif' alt='slide {$count_i}' border='0' /></a></li><!-- Slide {$count_i} -->\n";
			}

		endif;
	endwhile;
	$out .= $out_slider."</div><div class='clr'></div><!-- end #slideshow -->\n";
	$out_button .= "</ul>";

} else {

	if (get_option('wpts-category')) {
		query_posts('showposts=10&cat='.get_option('wpts-category'));
	} else {
		query_posts('showposts=10');
	}

	if (have_posts()) {

		$out = "<!-- start slideshow --><div id='slideshow'>";
		$out_button = "<ul id='slider_nav'>";

		while (have_posts() && $i<$no) : the_post();

			$wptsImage 	= get_the_post_thumbnail($post->ID, array($wptsWidth,$wptsHeight));
			$wptsImageTh= get_the_post_thumbnail($post->ID, array(get_option('wpts-cycle-width-navimg'),get_option('wpts-cycle-height-navimg')));
			$wptsText 	= get_the_excerpt();
			$wptsUrl 	= get_permalink();
			$wptsTitle	= get_the_title();

			if (has_post_thumbnail()) {
				$out_slider .= "<div class='slider-item'>\n<a href='{$wptsUrl}'>{$wptsImage}</a>\n";
				$out_slider .= "<div class='cs-title'>".
								"<span class='caption-date'>".get_the_time('M. d, Y')."  / ".get_comments_number(0, 1, '%')." ".__('Comments')."</span>".
								"<span class='caption-title'>{$wptsTitle}</span>".
								"<span class='caption-content'>".$wptsText."</span>\n".
								"</div>";
				$out_slider .= "</div>\n";

				$count_i = $i+1;
				if (get_option('wpts-cycle-navigation-image')) {
					$out_button .= "<li><a href='#'>{$wptsImageTh}</a></li><!-- Slide {$count_i} -->\n";
				} else if ($wptsNavigationNum) {
					$out_button .= "<li><a href='#' title='slide {$count_i}'>".$count_i."</a></li><!-- Slide {$count_i} -->\n";
				} else {
					$out_button .= "<li><a href='#' title='slide {$count_i}'><img class='spacer' src='".THIS_PLUGIN_URL."/images/spacer.gif' alt='slide {$count_i}' border='0' /></a></li><!-- Slide {$count_i} -->\n";
				}
			}

			$i++;
		endwhile;
		$out .= $out_slider."</div><div class='clr'></div><!-- end #slideshow -->\n";
		$out_button .= "</ul>";
	}

}

$wp_query = $tmp_query;

$out .= "
	<div class='controls-center'>
	<div class='slider_controls'>
		{$out_button}
	</div>
	<div class='clr'></div>
	</div>";

$out .= "<script type='text/javascript'>
jQuery(function ($) {
	$('#slideshow').cycle({
		fx:     '$wptsFX',
		speed:  'slow',
		timeout: $wptsDelay,
		pager:  '#slider_nav',
		pagerAnchorBuilder: function(idx, slide) {
			// return sel string for existing anchor
			return '#slider_nav li:eq(' + (idx) + ') a';
		}
	});
});
</script>
";

echo $out;
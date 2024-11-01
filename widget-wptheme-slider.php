<?php

class WPSlider extends WP_Widget {
	function WPSlider() {
		// widget actual processes
		parent::WP_Widget( /* Base ID */'wp_theme_slider_widget', /* Name */THIS_PLUGIN_NAME, array('description' => THIS_PLUGIN_DESCRIPTION));
	}

	function form($instance) {
		// outputs the options form on admin
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
			echo '<h3>'.THIS_PLUGIN_NAME.'</h3>';
			echo 'version '.THIS_VERSION;
			echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	function widget($args, $instance) {
		extract($args);
		// outputs the content of the widget
		if (function_exists('get_option_tree')) {
			if (get_option_tree('slider_main')){
				echo $before_widget;
				include (THIS_PLUGIN_DIR .'/'. 'wp-theme-slider.php');
				echo $after_widget;
			} else {
				get_option_tree('slider_main', '', true);
			}
		} else {
			echo $before_widget;
			include (THIS_PLUGIN_DIR .'/'. 'wp-theme-slider.php');
			echo $after_widget;
		}
	}
}

?>
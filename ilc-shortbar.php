<?php
/**
 * Plugin Name: ILC Shortbar
 * Plugin URI: https://startfunction.com
 * Description: Creates creates multiple sidebars that can be called using a related shortcode.
 * Author: Elio Rivero
 * Author URI: https://startfunction.com
 * Version: 1.0.0
 */

// Set the number 3 to the number of sidebars you want
$ILC_Shortcode_Sidebar = new ILC_Shortcode_Sidebar(3);

class ILC_Shortcode_Sidebar {

	public $count = 1;

	function __construct($count = 1) {
		// Load localization file
		add_action('plugins_loaded', array(&$this, 'localization'));
		// Store number of sidebars
		$this->count = $count;
		// Register sidebars
		add_action('init', array(&$this, 'register_sidebars'));
		// Add shortcodes
		for($s = 0; $s < $count; $s++) {
			add_shortcode('shortbar'.$s, array(&$this, 'shortcode'));
		}
	}
	
	function register_sidebars() {
		for($s = 0; $s < $this->count; $s++) {
			register_sidebar(array(
				'name'  => __('Shortcode Sidebar', 'ilc').' '.$s,
				'id' 	=> 'shortbar'.$s,
				'description' => sprintf(__('Widgets dropped in this area can be shown using the shortcode [shortbar%s]', 'ilc'), $s),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' 	=> '</div>',
				'before_title' 	=> '<h4 class="widgettitle">',
				'after_title' 	=> '</h4>'
			));
		}
	}

	function shortcode( $atts, $content, $tag ) {
		ob_start();
		dynamic_sidebar($tag);
		$html = ob_get_contents();
		ob_end_clean();
		return $html;
	}
	
	function localization() {
		// Translation files must be in a folder named "languages" next to this file
		load_plugin_textdomain( 'ilc', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
	}
}
?>

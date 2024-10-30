<?php
	/**
	 * @package  MIR Shortcodes
	 */
	namespace MSCInc\Base;

	class BaseController {
		public $plugin_path;
		public $plugin_url;
		public $plugin;

		public function __construct() {
			$this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
			$this->plugin_url  = plugin_dir_url( dirname( __FILE__, 2 ) );
			$this->plugin      = plugin_basename( dirname( __FILE__, 3 ) ) . '/mir-blocks-and-shortcodes.php';

			add_filter( 'admin_footer_text', '__return_false' );
			add_filter( 'update_footer', '__return_false', 11 );
			add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) );
		}

		function load_plugin_textdomain() {
			load_textdomain( 'mir-blocks-and-shortcodes', $this->plugin_path . 'lang/mir-blocks-and-shortcodes-' . get_locale() . '.mo' );
		}
	}
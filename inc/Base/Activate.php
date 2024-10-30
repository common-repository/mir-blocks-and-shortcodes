<?php
	/**
	 * @package  MIR Shortcodes
	 */

	namespace MSCInc\Base;

	class Activate {
		public static function activate() {

			/**
			 * Initial all things that are needed
			 */

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

			flush_rewrite_rules();

			$default = array();
			if ( ! get_option( 'mir_shortcodes' ) ) {
				update_option( 'mir_shortcodes', $default );
			}
			if ( ! get_option( 'mir_shortcodes_cpt' ) ) {
				update_option( 'mir_shortcodes_cpt', $default );
			}
			if ( ! get_option( 'mir_shortcodes_tax' ) ) {
				update_option( 'mir_shortcodes_tax', $default );
			}
		}
	}
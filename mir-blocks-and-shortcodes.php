<?php
	/**
	 * @package  MIR Shortcodes
	 */

	/*
		Plugin Name: MIR blocks and shortcodes
		Description: It's a block / shortcode toolbox which makes your wordpress live much easier.

		Version: 1.0.0
		Author: Make It Run GmbH
		Author URI: https://mirsoftware.de
		Text Domain: mir-blocks-and-shortcodes
	*/

	/* Copyright 2019 Make It Run GmbH */

	require_once( 'frontend-templates/function/msc-progress-bar.php' );
	require_once( 'frontend-templates/function/msc-stats.php' );
	require_once( 'frontend-templates/function/msc-presentation-box-1.php' );
	require_once( 'frontend-templates/function/msc-presentation-box-2.php' );
	require_once( 'frontend-templates/function/msc-rotating-icon-circle.php' );

	// If this file is called firectly, abort!
	defined( 'ABSPATH' ) or die( 'Hey, what are you doing here?' );
	// Require once the Composer Autoload
	if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
		require_once dirname( __FILE__ ) . '/vendor/autoload.php';
	}

	/**
	 * The code that runs during plugin activation
	 */
	function activate_mir_shortcodes() {
		MSCInc\Base\Activate::activate();
	}

	register_activation_hook( __FILE__, 'activate_mir_shortcodes' );

	/**
	 * The code that runs during plugin deactivation
	 */
	function deactivate_mir_shortcodes() {
		MSCInc\Base\Deactivate::deactivate();
	}

	register_deactivation_hook( __FILE__, 'deactivate_mir_shortcodes' );

	/**
	 * Initialize all the core classes of the plugin
	 */
	if ( class_exists( 'MSCInc\\Init' ) ) {
		MSCInc\Init::register_services();
	}
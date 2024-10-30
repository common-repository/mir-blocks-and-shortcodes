<?php
	require_once( 'msc-general.php' );

	function msc_accordion_tab_shortcode_handler( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'title' => 'Tab %d',
			'height' => '',
			'checked' => 'false'
		), $atts, 'msc_accordion_tab'));

		return msc_accordion_tab( $atts['title'], $atts['height'], $atts['checked'], $content );
	}

	add_shortcode( 'msc_accordion', 'msc_accordion_tab_shortcode_handler' );

	function msc_accordion_tab( $title, $height, $checked, $content = null ) {

		$x = $GLOBALS['acc_tab_count'];
		$GLOBALS['acc_tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['acc_tab_count'] ), 'content' =>  $content, 'checked' => $checked, 'height' => $height );

		$GLOBALS['acc_tab_count']++;
		return null;
	}

	function msc_accordion_tab_block_handler( $atts, $content = null ) {
		return msc_accordion_tab( $atts['title'], $atts['height'], $atts['checked'], $content );
	}

	function msc_accordion_tab_block() {

		$dir = dirname( __FILE__ );
		$js  = 'msc_block_accordion_tab.js';

		wp_register_script(
			'mir-blocks-and-shortcodes-msc-accordion-tab',
			plugins_url( $js, __FILE__ ),
			array(
				'wp-blocks',
				'wp-i18n',
				'wp-element',
				'wp-components',
				'wp-editor'
			),
			filemtime( "$dir/$js" )
		);

		$plugin_url = plugins_url();
		wp_localize_script( 'mir-blocks-and-shortcodes-msc-accordion-tab', 'msc_parameters', array(
			'pluginUrl' => $plugin_url,
		) );

		register_block_type( 'mir-blocks-and-shortcodes/msc-accordion-tab', array(
			'editor_script'   => 'mir-blocks-and-shortcodes-msc-accordion-tab',
			'render_callback' => 'msc_accordion_tab_block_handler',
			'attributes'      => [
				'title'  => [
					'default' => 'Tab %d'
				],
				'height'    => [
					'default' => ''
				],
				'checked' => [
					'default' => false
				]
			]
		) );
	}

	add_action( 'init', 'msc_accordion_tab_block' );
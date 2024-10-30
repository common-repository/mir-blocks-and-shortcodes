<?php
	require_once( 'msc-general.php' );

	function msc_stats_shortcode_handler( $atts ) {

		$atts = shortcode_atts(
			array(
				'from'                       => 0,
				'to'                         => 100,
				'speed'                      => 5000,
				'decimals'                   => 0,
				'background_color'           => '',
				'border_color'               => '',
				'title_color'                => '',
				'counter_color'              => '',
				'ready_animation'            => true,
				'ready_animation_text'       => 'Ready!',
				'ready_animation_text_color' => '',
				'title'                      => ''
			), $atts, 'msc_stats' );

		return msc_stats( $atts['from'], $atts['to'], $atts['speed'], $atts['decimals'], $atts['background_color'], $atts['border_color'], $atts['title_color'], $atts['counter_color'], $atts['ready_animation'], $atts['ready_animation_text'], $atts['ready_animation_text_color'], $atts['title'] );
	}

	add_shortcode( 'msc_stats', 'msc_stats_shortcode_handler' );

	function msc_stats( $from, $to, $speed, $decimals, $background_color, $border_color, $title_color, $counter_color, $ready_animation, $ready_animation_text, $ready_animation_text_color, $title ) {

		$background_color           = ltrim( $background_color, '#' );
		$border_color               = ltrim( $border_color, '#' );
		$title_color                = ltrim( $title_color, '#' );
		$counter_color              = ltrim( $counter_color, '#' );
		$ready_animation_text_color = ltrim( $ready_animation_text_color, '#' );

		$readyAnimationDiv = '<div class="mp-stats-ready">' . $ready_animation_text . '</div>';
		if ( $ready_animation === false ) {
			$readyAnimationDiv = '';
		} elseif ( $ready_animation === 'false' ) {
			$readyAnimationDiv = '';
		}

		$mpsTitleDiv = '';
		if ( ! empty( $title ) ) {
			$mpsTitleDiv = '<div class="mp-stats-title" style="' . ( ! empty( $title_color ) ? 'color:#' . $title_color . ';' : '' ) . '">' . $title . '</div>';
		}

		return get_msc_header() . '<div class="mp-stats" style="' . ( ! empty( $background_color ) ? 'background-color:#' . $background_color . ';' : '' ) . ( ! empty( $border_color ) ? 'border-color:#' . $border_color . ';' : '' ) . '">
					<div class="mp-stats-ready-wrap mp-stats-ready-display" style="' . ( ! empty( $ready_animation_text_color ) ? 'color:#' . $ready_animation_text_color . ';' : '' ) . '">'
		       . $readyAnimationDiv .
		       '</div>
					<div class="mp-stats-counter" style="' . ( ! empty( $counter_color ) ? 'color:#' . $counter_color . ';' : '' ) . '" data-from="' . $from . '" data-to="' . $to . '" data-speed="' . $speed . '" data-decimals="' . $decimals . '"></div>'
		       . $mpsTitleDiv .
		       '</div>' . get_msc_footer();
	}

	function msc_stats_block_handler( $atts ) {
		return msc_stats( $atts['from'], $atts['to'], $atts['speed'], $atts['decimals'], $atts['background_color'], $atts['border_color'], $atts['title_color'], $atts['counter_color'], $atts['ready_animation'], $atts['ready_animation_text'], $atts['ready_animation_text_color'], $atts['title'] );
	}

	function msc_stats_block() {

		$dir = dirname( __FILE__ );
		$js  = 'msc_block_stats.js';

		wp_register_script(
			'mir-blocks-and-shortcodes-msc-stats',
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
		wp_localize_script( 'mir-blocks-and-shortcodes-msc-stats', 'msc_parameters', array(
			'pluginUrl' => $plugin_url,
		) );

		register_block_type( 'mir-blocks-and-shortcodes/msc-stats', array(
			'editor_script'   => 'mir-blocks-and-shortcodes-msc-stats',
			'render_callback' => 'msc_stats_block_handler',
			'attributes'      => [
				'from'                       => [
					'default' => 0
				],
				'to'                         => [
					'default' => 100
				],
				'speed'                      => [
					'default' => 5000
				],
				'decimals'                   => [
					'default' => 0
				],
				'background_color'           => [
					'default' => ''
				],
				'border_color'               => [
					'default' => ''
				],
				'title_color'                => [
					'default' => ''
				],
				'counter_color'              => [
					'default' => ''
				],
				'ready_animation'            => [
					'default' => true
				],
				'ready_animation_text'       => [
					'default' => 'Ready!'
				],
				'ready_animation_text_color' => [
					'default' => ''
				],
				'title'                      => [
					'default' => ''
				]
			]
		) );
	}

	add_action( 'init', 'msc_stats_block' );
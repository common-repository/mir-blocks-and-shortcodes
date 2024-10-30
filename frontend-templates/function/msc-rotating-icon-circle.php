<?php
	require_once( 'msc-general.php' );

	function msc_rotating_icon_circle_shortcode_handler( $atts ) {

		$atts = shortcode_atts(
			array(
				'icon'         => 'arrows-alt',
				'icon_style'   => 'fas',
				'icon_size'    => 'fa-lg',
				'icon_color'   => '28527b',
				'circle_color' => '28527b',
				'center'       => false,
				'size'         => 96
			), $atts, 'msc_rotating_icon_circle' );

		return msc_rotating_icon_circle( $atts['icon'], $atts['icon_style'], $atts['icon_size'], $atts['icon_color'], $atts['circle_color'], $atts['center'], $atts['size'] );
	}

	add_shortcode( 'msc_rotating_icon_circle', 'msc_rotating_icon_circle_shortcode_handler' );

	function msc_rotating_icon_circle( $icon, $icon_style, $icon_size, $icon_color, $circle_color, $center, $size ) {

		$centeredDiv    = '';
		$centeredDivEnd = '';
		if ( $center == 'true' ) {
			$centeredDiv    = '<div class="text-center">';
			$centeredDivEnd = '</div>';
		}

		$icon_color   = ltrim( $icon_color, '#' );
		$circle_color = ltrim( $circle_color, '#' );

		return
			get_msc_header() . $centeredDiv .
			'<div class="circle_ct" style="width:' . $size . 'px;height:' . $size . 'px;">
					<div class="circle_ct_img" style="width:' . $size . 'px;height:' . $size . 'px;background-color:#' . $circle_color . ';"></div>
	                <i style="color:#' . $icon_color . ';" class="' . $icon_style . ' fa-' . $icon . ' ' . $icon_size . '"></i>
	            </div>'
			. $centeredDivEnd . get_msc_footer();
	}

	function msc_rotating_icon_circle_block_handler( $atts ) {
		return msc_rotating_icon_circle( $atts['icon'], $atts['icon_style'], $atts['icon_size'], $atts['icon_color'], $atts['circle_color'], $atts['center'], $atts['size'] );
	}

	function msc_rotating_icon_circle_block() {

		$dir      = dirname( __FILE__ );
		$js = 'msc_block_rotating_icon_circle.js';

		wp_register_script(
			'mir-blocks-and-shortcodes-msc-rotating-icon-circle',
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
		wp_localize_script( 'mir-blocks-and-shortcodes-msc-rotating-icon-circle', 'msc_parameters', array(
			'pluginUrl' => $plugin_url,
		) );

		register_block_type( 'mir-blocks-and-shortcodes/msc-rotating-icon-circle', array(
			'editor_script'   => 'mir-blocks-and-shortcodes-msc-rotating-icon-circle',
			'render_callback' => 'msc_rotating_icon_circle_block_handler',
			'attributes'      => [
				'icon'         => [
					'default' => 'arrows-alt'
				],
				'icon_style'   => [
					'default' => 'fas'
				],
				'icon_size'    => [
					'default' => 'fa-lg'
				],
				'icon_color'   => [
					'default' => '28527b'
				],
				'circle_color' => [
					'default' => '28527b'
				],
				'center'       => [
					'default' => false
				],
				'size'         => [
					'default' => 96
				]
			]
		) );
	}

	add_action( 'init', 'msc_rotating_icon_circle_block' );
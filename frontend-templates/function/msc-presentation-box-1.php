<?php
	require_once( 'msc-general.php' );

	function msc_presentation_box_1_shortcode_handler( $atts ) {

		$atts = shortcode_atts(
			array(
				'css'                    => '',
				'center'                 => false,
				'title'                  => '',
				'content'                => '',
				'background_color'       => 'e5ebee',
				'border_color'           => 'c9d4dd',
				'title_background_color' => '28527b',
				'content_color'          => '5a6a7a',
				'imageurl'               => '',
				'animation'              => false,
				'direction'              => ''
			), $atts, 'msc_presentation_box_1' );

		return msc_presentation_box_1( $atts['css'], $atts['center'], $atts['title'], $atts['content'], $atts['background_color'], $atts['border_color'], $atts['title_background_color'], $atts['content_color'], $atts['imageurl'], $atts['animation'], $atts['direction'] );
	}

	add_shortcode( 'msc_presentation_box_1', 'msc_presentation_box_1_shortcode_handler' );

	function msc_presentation_box_1( $css, $center, $title, $content, $background_color, $border_color, $title_background_color, $content_color, $imageurl, $animation, $direction ) {

		$background_color         = ltrim( $background_color, '#' );
		$border_color             = ltrim( $border_color, '#' );
		$title_background_color   = ltrim( $title_background_color, '#' );
		$content_color = ltrim( $content_color, '#' );

		$anDirec = '';
		if ( $animation == 'true' ) {
			if ( $direction == 'left' ) {
				$anDirec = 'ccs-bounceInLeft';
			} elseif ( $direction == 'top' ) {
				$anDirec = 'ccs-fadeInTop';
			} else {
				$anDirec = 'ccs-bounceInRight';
			}
		}

		$pbCssDiv    = '';
		$pbCssDivEnd = '';
		if ( ! empty( $css ) ) {
			$pbCssDiv    = '<div style="' . $css . '">';
			$pbCssDivEnd = '</div>';
		}

		$pbCenterDiv    = '<div class="text-center">';
		$pbCenterDivEnd = '</div>';
		if ( $center === false ) {
			$pbCenterDiv    = '';
			$pbCenterDivEnd = '';
		} elseif ( $center === 'false' ) {
			$pbCenterDiv    = '';
			$pbCenterDivEnd = '';
		}

		$pbimgTag = '';
		if ( ! empty( $imageurl ) ) {
			$pbimgTag = '<img src="' . $imageurl . '" class="projectBoxImg_ct" alt="' . $title . '" />';
		}

		return get_msc_header() . $pbCssDiv . $pbCenterDiv .
		       '<div class="projectBoxBg_ct ' . $anDirec . '" style="' . ( ! empty( $background_color ) ? 'background-color:#' . $background_color . ';' : '' ) . ( ! empty( $border_color ) ? 'border-color:#' . $border_color . ';' : '' ) . '">' . $pbimgTag .
		       '<div class="projectBoxTitle_ct" style="' . ( ! empty( $title_background_color ) ? 'background-color:#' . $title_background_color . ';' : '' ) . ( ! empty( $border_color ) ? 'border-bottom-color:#' . $border_color . ';' : '' ) . '">'
		       . $title .
		       '</div>
              <div class="projectBoxContent_ct" style="' . ( ! empty( $content_color ) ? 'color:#' . $content_color . ';' : '' ) . '">'
		       . do_shortcode( $content ) .
		       '</div>
          </div>' . $pbCenterDivEnd . $pbCssDivEnd . get_msc_footer();
	}

	function msc_presentation_box_1_block_handler( $atts ) {
		return msc_presentation_box_1( $atts['css'], $atts['center'], $atts['title'], $atts['content'], $atts['background_color'], $atts['border_color'], $atts['title_background_color'], $atts['content_color'], $atts['imageurl'], $atts['animation'], $atts['direction'] );
	}

	function msc_presentation_box_1_block() {

		$dir = dirname( __FILE__ );
		$js  = 'msc_block_presentation_box_1.js';

		wp_register_script(
			'mir-blocks-and-shortcodes-msc-presentation-box-1',
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
		wp_localize_script( 'mir-blocks-and-shortcodes-msc-presentation-box-1', 'msc_parameters', array(
			'pluginUrl' => $plugin_url,
		) );

		register_block_type( 'mir-blocks-and-shortcodes/msc-presentation-box-1', array(
			'editor_script'   => 'mir-blocks-and-shortcodes-msc-presentation-box-1',
			'render_callback' => 'msc_presentation_box_1_block_handler',
			'attributes'      => [
				'css'                    => [
					'default' => ''
				],
				'center'                 => [
					'default' => false
				],
				'title'                  => [
					'default' => ''
				],
				'content'                => [
					'default' => ''
				],
				'background_color'       => [
					'default' => 'e5ebee'
				],
				'border_color'           => [
					'default' => 'c9d4dd'
				],
				'title_background_color' => [
					'default' => '28527b'
				],
				'content_color'          => [
					'default' => '5a6a7a'
				],
				'imageurl'               => [
					'default' => ''
				],
				'animation'              => [
					'default' => false
				],
				'direction'              => [
					'default' => ''
				]
			]
		) );
	}

	add_action( 'init', 'msc_presentation_box_1_block' );
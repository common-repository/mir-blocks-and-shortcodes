<?php
	require_once( 'msc-general.php' );

	function msc_presentation_box_2_shortcode_handler( $atts ) {

		$atts = shortcode_atts(
			array(
				'css'                           => '',
				'center'                        => false,
				'imageurl'                      => '',
				'ribbon'                        => true,
				'ribbontext'                    => '',
				'content'                       => '',
				'name'                          => '',
				'description'                   => '',
				'animation'                     => false,
				'direction'                     => '',
				'facebook'                      => '',
				'twitter'                       => '',
				'youtube'                       => '',
				'linkedin'                      => '',
				'xing'                          => '',
				'google'                        => '',
				'tumblr'                        => '',
				'pinterest'                     => '',
				'instagram'                     => '',
				'vine'                          => '',
				'digg'                          => '',
				'dribbble'                      => '',
				'background_color'              => 'dce3ea',
				'border_color'                  => 'b9c5d1',
				'name_color'                    => '28527b',
				'content_and_description_color' => '5a6a7a',
			), $atts, 'msc_presentation_box_2' );

		return msc_presentation_box_2( $atts['css'], $atts['center'], $atts['imageurl'], $atts['ribbon'], $atts['ribbontext'], $atts['content'], $atts['name'], $atts['description'], $atts['animation'], $atts['direction'], $atts['facebook'], $atts['twitter'], $atts['youtube'], $atts['linkedin'], $atts['xing'], $atts['google'], $atts['tumblr'], $atts['pinterest'], $atts['instagram'], $atts['vine'], $atts['digg'], $atts['dribbble'], $atts['background_color'], $atts['border_color'], $atts['name_color'], $atts['content_and_description_color'] );
	}

	add_shortcode( 'msc_presentation_box_2', 'msc_presentation_box_2_shortcode_handler' );

	function msc_presentation_box_2( $css, $center, $imageurl, $ribbon, $ribbontext, $content, $name, $description, $animation, $direction, $facebook, $twitter, $youtube, $linkedin, $xing, $google, $tumblr, $pinterest, $instagram, $vine, $digg, $dribbble, $background_color, $border_color, $name_color, $content_and_description_color ) {

		$background_color              = ltrim( $background_color, '#' );
		$border_color                  = ltrim( $border_color, '#' );
		$name_color                    = ltrim( $name_color, '#' );
		$content_and_description_color = ltrim( $content_and_description_color, '#' );

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

		if ( ! empty( $facebook ) ) {
			$sm_li = "<li><a href='" . $facebook . "' target='_blank'><i class='fab fa-facebook'></i></a></li>";
		}
		if ( ! empty( $twitter ) ) {
			$sm_li .= "<li><a href='" . $twitter . "' target='_blank'><i class='fab fa-twitter'></i></a></li>";
		}
		if ( ! empty( $youtube ) ) {
			$sm_li .= "<li><a href='" . $youtube . "' target='_blank'><i class='fab fa-youtube'></i></a></li>";
		}
		if ( ! empty( $linkedin ) ) {
			$sm_li .= "<li><a href='" . $linkedin . "' target='_blank'><i class='fab fa-linkedin'></i></a></li>";
		}
		if ( ! empty( $xing ) ) {
			$sm_li .= "<li><a href='" . $xing . "' target='_blank'><i class='fab fa-xing'></i></a></li>";
		}
		if ( ! empty( $google ) ) {
			$sm_li .= "<li><a href='" . $google . "' target='_blank'><i class='fab fa-google'></i></a></li>";
		}
		if ( ! empty( $tumblr ) ) {
			$sm_li .= "<li><a href='" . $tumblr . "' target='_blank'><i class='fab fa-tumblr'></i></a></li>";
		}
		if ( ! empty( $pinterest ) ) {
			$sm_li .= "<li><a href='" . $pinterest . "' target='_blank'><i class='fab fa-pinterest'></i></a></li>";
		}
		if ( ! empty( $instagram ) ) {
			$sm_li .= "<li><a href='" . $instagram . "' target='_blank'><i class='fab fa-instagram'></i></a></li>";
		}
		if ( ! empty( $vine ) ) {
			$sm_li .= "<li><a href='" . $vine . "' target='_blank'><i class='fab fa-vine'></i></a></li>";
		}
		if ( ! empty( $digg ) ) {
			$sm_li .= "<li><a href='" . $digg . "' target='_blank'><i class='fab fa-digg'></i></a></li>";
		}
		if ( ! empty( $dribbble ) ) {
			$sm_li .= "<li><a href='" . $dribbble . "' target='_blank'><i class='fab fa-dribbble'></i></a></li>";
		}

		$pb2CssDiv    = '';
		$pb2CssDivEnd = '';
		if ( ! empty( $css ) ) {
			$pb2CssDiv    = '<div style="' . $css . '">';
			$pb2CssDivEnd = '</div>';
		}

		$pb2CenterDiv    = '<div class="text-center">';
		$pb2CenterDivEnd = '</div>';
		if ( $center === false ) {
			$pb2CenterDiv    = '';
			$pb2CenterDivEnd = '';
		} elseif ( $center === 'false' ) {
			$pb2CenterDiv    = '';
			$pb2CenterDivEnd = '';
		}

		if ( $ribbon == 'false' ) {
			$pb2ribbonDiv = '';
		} else {
			if ( $ribbontext == '' ) {
				$pb2ribbonDiv = '<div class="ribbon"><div><i class="fa fa-arrow-right"></i></div></div>';
			} else {
				$pb2ribbonDiv = '<div class="ribbon"><div>' . $ribbontext . '</div></div>';
			}
		}

		$pb2imgTag = '';
		if ( ! empty( $imageurl ) ) {
			$pb2imgTag = '<img src="' . $imageurl . '" class="projectBoxImg_ct" alt="' . $name . '" />';
		}

		$pbBuildSmDiv = '';
		if ( ! empty( $sm_li ) ) {
			$pbBuildSmDiv = '<ul class="PersonSocialMedia_ct">' . $sm_li . '</ul>';
		}

		return get_msc_header() . $pb2CssDiv . '' . $pb2CenterDiv .
		       '<div class="PersonBoxBg_ct ' . $anDirec . '" style="' . ( ! empty( $background_color ) ? 'background-color:#' . $background_color . ';' : '' ) . ( ! empty( $border_color ) ? 'border-color:#' . $border_color . ';' : '' ) . '">'
		       . $pb2ribbonDiv . '' . $pb2imgTag .
		       '<div class="PersonNameBox_ct" style="' . ( ! empty( $name_color ) ? 'color:#' . $name_color . ';' : '' ) . '">'
		       . $name .
		       '</div>
            <div class="PersonBoxContent_ct" style="' . ( ! empty( $content_and_description_color ) ? 'color:#' . $content_and_description_color . ';' : '' ) . '">'
		       . $description .
		       '</div>
            <div class="text-center">' . $pbBuildSmDiv .
		       '<div class="PersonNameBoxCustomText_ct" style="' . ( ! empty( $content_and_description_color ) ? 'color:#' . $content_and_description_color . ';' : '' ) . '">' . do_shortcode( $content ) .
		       '</div></div>
          </div>' . $pb2CenterDivEnd . '' . $pb2CssDivEnd . get_msc_footer();
	}

	function msc_presentation_box_2_block_handler( $atts ) {
		return msc_presentation_box_2( $atts['css'], $atts['center'], $atts['imageurl'], $atts['ribbon'], $atts['ribbontext'], $atts['content'], $atts['name'], $atts['description'], $atts['animation'], $atts['direction'], $atts['facebook'], $atts['twitter'], $atts['youtube'], $atts['linkedin'], $atts['xing'], $atts['google'], $atts['tumblr'], $atts['pinterest'], $atts['instagram'], $atts['vine'], $atts['digg'], $atts['dribbble'], $atts['background_color'], $atts['border_color'], $atts['name_color'], $atts['content_and_description_color'] );
	}

	function msc_presentation_box_2_block() {

		$dir = dirname( __FILE__ );
		$js  = 'msc_block_presentation_box_2.js';

		wp_register_script(
			'mir-blocks-and-shortcodes-msc-presentation-box-2',
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
		wp_localize_script( 'mir-blocks-and-shortcodes-msc-presentation-box-2', 'msc_parameters', array(
			'pluginUrl' => $plugin_url,
		) );

		register_block_type( 'mir-blocks-and-shortcodes/msc-presentation-box-2', array(
			'editor_script'   => 'mir-blocks-and-shortcodes-msc-presentation-box-2',
			'render_callback' => 'msc_presentation_box_2_block_handler',
			'attributes'      => [
				'css'                           => [
					'default' => ''
				],
				'center'                        => [
					'default' => false
				],
				'imageurl'                      => [
					'default' => ''
				],
				'ribbon'                        => [
					'default' => true
				],
				'ribbontext'                    => [
					'default' => ''
				],
				'content'                       => [
					'default' => ''
				],
				'name'                          => [
					'default' => ''
				],
				'description'                   => [
					'default' => ''
				],
				'animation'                     => [
					'default' => false
				],
				'direction'                     => [
					'default' => ''
				],
				'facebook'                      => [
					'default' => ''
				],
				'twitter'                       => [
					'default' => ''
				],
				'youtube'                       => [
					'default' => ''
				],
				'linkedin'                      => [
					'default' => ''
				],
				'xing'                          => [
					'default' => ''
				],
				'google'                        => [
					'default' => ''
				],
				'tumblr'                        => [
					'default' => ''
				],
				'pinterest'                     => [
					'default' => ''
				],
				'instagram'                     => [
					'default' => ''
				],
				'vine'                          => [
					'default' => ''
				],
				'digg'                          => [
					'default' => ''
				],
				'dribbble'                      => [
					'default' => ''
				],
				'background_color'              => [
					'default' => 'dce3ea'
				],
				'border_color'                  => [
					'default' => 'b9c5d1'
				],
				'name_color'                    => [
					'default' => '28527b'
				],
				'content_and_description_color' => [
					'default' => '5a6a7a'
				],
			]
		) );
	}

	add_action( 'init', 'msc_presentation_box_2_block' );
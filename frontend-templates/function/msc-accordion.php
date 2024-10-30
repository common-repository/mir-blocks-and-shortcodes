<?php
	require_once( 'msc-general.php' );

	function msc_accordion_shortcode_handler( $atts, $content = null ) {

		$atts = shortcode_atts(
			array(
				'width'  => '80%',
				'css'    => '',
				'center' => 'false'
			), $atts, 'msc_accordion' );

		return msc_accordion( $atts['width'], $atts['css'], $atts['center'], $content );
	}

	add_shortcode( 'msc_accordion', 'msc_accordion_shortcode_handler' );

	function msc_accordion( $width, $css, $center, $content = null ) {

		$GLOBALS['acc_tab_count'] = 0;

		do_shortcode( $content );

		$accCenter = ( $center );
		if ( $accCenter == 'false' ) {
			$accCenterDiv    = '';
			$accCenterDivEnd = '';
		} else {
			$accCenterDiv    = '<div class="centerBlock">';
			$accCenterDivEnd = '</div>';
		}

		$accCss   = ( $css );
		$cssWidth = ( $width );
		if ( $cssWidth == '' ) {
			$accBuildDiv = '<section class="ac-container" style="' . $accCss . '">';
		} else {
			$accBuildDiv = '<section class="ac-container" style="width:' . $cssWidth . ';' . $accCss . '">';
		}

		$return = "";
		if ( is_array( $GLOBALS['acc_tabs'] ) ) {
			foreach ( $GLOBALS['acc_tabs'] as $k => $tab ) {

				$height = ( $tab['height'] );
				$result = startsWithNumber( $height );
				if ( $result === true ) {
					$heightpx = $tab['height'];
					$height   = 'ac-custom';
				}

				$chk = ( $tab['checked'] );
				if ( $chk == 'false' ) {
					$chkVal = '';
				} else {
					$chkVal = 'checked';
				}

				$acc_tabs[] = '<div><input id="ac-' . $k . '" name="accordion-1" type="checkbox" ' . $chkVal . ' /><label class="ac-tk" for="ac-' . $k . '">' . $tab['title'] . '</label><article class="' . $height . '"><p>' . do_shortcode( $tab['content'] ) . '</p></article><input type="hidden" class="hfch" value="' . $heightpx . '"/></div>';
				$heightpx   = '';
				$height     = '';

				$chkVal = '';
			}
			$return = $accCenterDiv . '' . $accBuildDiv . '' . implode( $acc_tabs ) . '</section>' . $accCenterDivEnd;
		}

		return $return;
	}

	function msc_accordion_block_handler( $atts, $content = null ) {
		return msc_accordion( $atts['width'], $atts['css'], $atts['center'], $content );
	}

	function msc_accordion_block() {

		$dir = dirname( __FILE__ );
		$js  = 'msc_block_accordion.js';

		wp_register_script(
			'mir-blocks-and-shortcodes-msc-accordion',
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
		wp_localize_script( 'mir-blocks-and-shortcodes-msc-accordion', 'msc_parameters', array(
			'pluginUrl' => $plugin_url,
		) );

		register_block_type( 'mir-blocks-and-shortcodes/msc-accordion', array(
			'editor_script'   => 'mir-blocks-and-shortcodes-msc-accordion',
			'render_callback' => 'msc_accordion_block_handler',
			'attributes'      => [
				'width'  => [
					'default' => '80%'
				],
				'css'    => [
					'default' => ''
				],
				'center' => [
					'default' => false
				]
			]
		) );
	}

	add_action( 'init', 'msc_accordion_block' );
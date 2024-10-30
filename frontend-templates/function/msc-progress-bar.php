<?php
	require_once( 'msc-general.php' );

	function msc_progress_bar_shortcode_handler( $atts ) {

		$atts = shortcode_atts(
			array(
				'value'    => 50,
				'type'     => 'default',
				'animated' => false,
				'title'    => '',
				'striped'  => false
			), $atts, 'msc_progress_bar' );

		return msc_progress_bar( $atts['value'], $atts['type'], $atts['animated'], $atts['title'], $atts['striped'] );
	}

	add_shortcode( 'msc_progress_bar', 'msc_progress_bar_shortcode_handler' );

	function msc_progress_bar( $value, $type, $animated, $title, $striped ) {

		$proBarTypeCss = "bg-default";
		if ( $type != 'default' ) {
			$proBarTypeCss = 'bg-' . $type;
		}

		$proBarAnimatedClass = 'progress-bar-animated';
		if ( $animated === false ) {
			$proBarAnimatedClass = '';
		} elseif ( $animated === 'false' ) {
			$proBarAnimatedClass = '';
		}

		$proBarStripedCss = 'progress-bar-striped';
		if ( $striped === false ) {
			$proBarStripedCss = '';
		} elseif ( $striped === 'false' ) {
			$proBarStripedCss = '';
		}

		return get_msc_header() . '
			<div class="progress">
			  <div class="progress-bar ' . $proBarTypeCss . ' ' . $proBarStripedCss . ' ' . $proBarAnimatedClass . '" role="progressbar" data-valuenow="' . $value . '" data-valuemax="0" data-valuemax="100" style="width: ' . $value . '%">
				' . $title . '
			  </div>
			</div>' . get_msc_footer();
	}

	function msc_progress_bar_block_handler( $atts ) {
		return msc_progress_bar( $atts['value'], $atts['type'], $atts['animated'], $atts['title'], $atts['striped'] );
	}

	function msc_progress_bar_block() {

		$dir = dirname( __FILE__ );
		$js  = 'msc_block_progress_bar.js';

		wp_register_script(
			'mir-blocks-and-shortcodes-msc-progress-bar',
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
		wp_localize_script( 'mir-blocks-and-shortcodes-msc-progress-bar', 'msc_parameters', array(
			'pluginUrl' => $plugin_url,
		) );

		register_block_type( 'mir-blocks-and-shortcodes/msc-progress-bar', array(
			'editor_script'   => 'mir-blocks-and-shortcodes-msc-progress-bar',
			'render_callback' => 'msc_progress_bar_block_handler',
			'attributes'      => [
				'value'  => [
					'default' => 50
				],
				'type'    => [
					'default' => 'default'
				],
				'animated' => [
					'default' => false
				],
				'title' => [
					'default' => ''
				],
				'striped' => [
					'default' => false
				]
			]
		) );
	}

	add_action( 'init', 'msc_progress_bar_block' );
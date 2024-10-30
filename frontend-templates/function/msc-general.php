<?php
	add_filter( 'widget_text', 'do_shortcode' );
	add_filter( 'block_categories', function( $categories, $post ) {
		return array_merge(
			$categories,
			array(
				array(
					'slug'  => 'msc-shortcodes',
					'title' => 'MIR Shortcodes',
				),
			)
		);
	}, 10, 2 );

	function get_msc_header() {
		return '<section class="msc-content-area">
    				<div class="msc-inner-content">';
	}

	function get_msc_footer() {
		return '</div><!-- msc-inner-content -->
					</section><!-- msc-content-area -->';
	}

	function msc_enqueue_frontend_resources() {

		//Enqueue styles
		$css_enqueue_path = "/wp-content/plugins/mir-blocks-and-shortcodes/frontend-templates/assets/css/";

		wp_enqueue_style( 'msc_animate_css', $css_enqueue_path . 'animate.min.css' );
		wp_enqueue_style( 'msc_fontawesome_css', '//use.fontawesome.com/releases/v5.8.1/css/all.css' );
		wp_enqueue_style( 'msc_style_css', $css_enqueue_path . 'msc_style.css' );

		//Enqueue scripts
		wp_enqueue_script( 'jquery' );
		$js_enqueue_path = "/wp-content/plugins/mir-blocks-and-shortcodes/frontend-templates/assets/js/";

		wp_enqueue_script( 'msc_popper_js', $js_enqueue_path . 'popper.min.js', '', '', false );
		wp_enqueue_script( 'msc_bootstrap_js', $js_enqueue_path . 'bootstrap.js', '', '', false );
		wp_enqueue_script( 'msc_scripts_js', $js_enqueue_path . 'msc_scripts.js', '', '', true );

	}
	add_action( 'wp_enqueue_scripts', 'msc_enqueue_frontend_resources' );

	function msc_enqueue_editor_assets() {

		$plugin_url = plugins_url();

		wp_enqueue_style( 'msc_block_style', $plugin_url . '/mir-blocks-and-shortcodes/assets/css/msc_block_style.css' );
		wp_enqueue_style( 'msc_block_general', $plugin_url . '/mir-blocks-and-shortcodes/frontend-templates/assets/css/msc_style.css' );
		wp_enqueue_style( 'msc_block_fontawesome', '//use.fontawesome.com/releases/v5.8.1/css/all.css' );
		wp_enqueue_script( 'msc_block_scripts_js', $plugin_url . '/mir-blocks-and-shortcodes/frontend-templates/assets/js/msc_scripts.js', '', '', false );
	}

	add_action( 'enqueue_block_editor_assets', 'msc_enqueue_editor_assets' );
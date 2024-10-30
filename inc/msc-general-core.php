<?php

	/**
	 * @param $lang
	 * @param $page
	 *
	 * @return string
	 */
	function msc_get_local_page_title( $page ) {
		switch ( get_locale() ) {
			case 'de_DE':
				switch ( $page ) {
					case 'overview':
						return "Übersicht";
						break;
				}
				break;
			case "en_US":
			case "en_CA":
			case "en_AU":
			case "en_GB":
			default:
				switch ( $page ) {
					case 'overview':
						return "Overview";
						break;
				}
				break;
		}
	}

<?php
/**
 * Common theme functions
 *
 * @package WordPress
 * @subpackage Slavija
 * @since Slavija 1.0
 */

function get_language_code($locale) {
	if ( $locale == 'sr_RS' ) {
		return "";
	} else if ( $locale == 'en_US' ) {
		return "en";
	} else if ( $locale == 'ru_RU' ) {
		return "ru";
	}
	return "NULL";
}

function get_contact_us_page_id($locale) {
	if ( $locale == 'sr_RS' ) {
		return 4127;
	} else if ( $locale == 'en_US' ) {
		return 0;
	} else if ( $locale == 'ru_RU' ) {
		return 7741;
	}
	return -1;
}

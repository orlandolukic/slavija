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

/**
 * Change this function only when adding new language.
 * Purpose of this function is to extract ID of the contact_us page.
 */
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

/**
 * Get all languages available on the system
 */
function get_all_languages_list() {
	$ret = array();

	$ret["sr_RS"] = array(			
		"language_image" => get_template_directory_uri() . "/images/serbian_flag.webp",
		"language_name" => __("Srpski", "slavija"),
		"language_link" => "https://slavijadoo.co.rs/"
	);
	$ret["en_US"] = array(			
		"language_image" => get_template_directory_uri() . "/images/usa_flag.webp",
		"language_name" => __("Engleski", "slavija"),
		"language_link" => "https://slavijadoo.co.rs/en/"
	);
	$ret["ru_RU"] = array(			
		"language_image" => get_template_directory_uri() . "/images/russian_flag.webp",
		"language_name" => __("Ruski", "slavija"),
		"language_link" => "https://slavijadoo.co.rs/ru/"
	);

	return $ret;
}

/**
 * Get selected language and it's data
 */
function get_selected_language($locale) {

	if ( $locale !== "sr_RS" && $locale !== "en_US" && $locale !== "ru_RU" ) {
		return NULL;
	}
	
	// Get all languages, and than choose one based on locale
	$language_list = get_all_languages_list();

	return $language_list[$locale];
}

/**
 * Get list of other languages
 */
function get_languages_list_other_than($locale) {
	
	// Get all languages in list
	$language_list = get_all_languages_list();
	$ret = array();

	foreach ($language_list as $key => $value) {
		if ( $key === $locale ) {
			continue;
		}
		$ret[$key] = $value;
	}

	return $ret;
}

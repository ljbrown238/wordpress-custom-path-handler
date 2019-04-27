<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class CustomPathHandler {

	public $cb;

	public function __construct($slug, $cb) {

		// Registered user callback to handle actual output content
		$this->cb = $cb;

		// Check if request matches this custom page slug, otherwise leave promptly
		if (str_replace('/','', $slug) !== str_replace('/','',parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))) {
			return;
		}

		// Ensure no other output is generated except what we explicitly generate
		ob_start();
		add_action('shutdown',[$this,'cb_shutdown'],0);
		add_filter('final_output',[$this,'cb_final_output']);

		return;
	}

	public function cb_shutdown () {

		// Code hints from: https://stackoverflow.com/questions/772510/wordpress-filter-to-modify-final-html-output/22818089#22818089

		// Iterate over each ob level, accumulating each buffer's output
		$final = '';
		for ($i = 0; $i < ob_get_level(); $i++) {
			$final .= ob_get_clean();
		}

		// Apply any filters to the final output
		echo apply_filters('final_output', $final);
	}

	public function cb_final_output ($output) {
		// We are ready for final output.  Call the user's callback so they can generate custom output themselves.
		return ($this->cb)();
	}

}
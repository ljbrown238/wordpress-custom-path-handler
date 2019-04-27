<?php
/*
 * Plugin Name: WordPress Custom Path Handler
 * Plugin URI: https://github.com/ljbrown238/wordpress-custom-path-handler.git
 * Description: WordPress plugin to demonstrate creating a custom path to output custom data.
 * Version: 0.0.1
 * Author:  Loren J. Brown <ljbrown238@hotmail.com>
 * Author URI: http://www.quantumpeg.com
 * GitHub Plugin URI: https://github.com/ljbrown238/wordpress-custom-path-handler.git
 * GitHub Branch:     master
 */

if ( ! defined( 'ABSPATH' ) ) exit;

require_once( 'CustomPathHandler.php' );


// Endpoint to generate a PDF
new CustomPathHandler('/generate-pdf', function() {

	// Small white box
	$pdf_base64 = 'JVBERi0xLjAKMSAwIG9iajw8L1R5cGUvQ2F0YWxvZy9QYWdlcyAyIDAgUj4+ZW5kb2JqIDIgMCBvYmo8PC9UeXBlL1BhZ2VzL0tpZHNbMyAwIFJdL0NvdW50IDE+PmVuZG9iaiAzIDAgb2JqPDwvVHlwZS9QYWdlL01lZGlhQm94WzAgMCAzIDNdPj5lbmRvYmoKeHJlZgowIDQKMDAwMDAwMDAwMCA2NTUzNSBmCjAwMDAwMDAwMTAgMDAwMDAgbgowMDAwMDAwMDUzIDAwMDAwIG4KMDAwMDAwMDEwMiAwMDAwMCBuCnRyYWlsZXI8PC9TaXplIDQvUm9vdCAxIDAgUj4+CnN0YXJ0eHJlZgoxNDkKJUVPRgo=';

	header('Content-Type: application/pdf');
	header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
	return base64_decode($pdf_base64);

});


// Endpoint to generate a PNG
new CustomPathHandler('/generate-png', function() {

	// Small red dot
	$png_base64 = 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8z8DwBwAFAgH9XSO6wwAAAABJRU5ErkJggg==';

	header('Content-Type: image/png');
	header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
	return base64_decode($png_base64);

});


// Endpoint to generate JSON data from the WordPress database
new CustomPathHandler('/generate-json', function() {

	global $wpdb;

	// Just get the option property names and matching values for the home and blogname
	$options = $wpdb->get_results("SELECT option_name, option_value FROM $wpdb->options WHERE option_name in ('home','blogname')");

	header('Content-Type: application/json');
	header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
	return json_encode($options);

});

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


// Generate a PDF if it was requested
new CustomPathHandler('/generate-pdf', function() {

	// Small white box
	$pdf_base64 = 'JVBERi0xLjAKMSAwIG9iajw8L1R5cGUvQ2F0YWxvZy9QYWdlcyAyIDAgUj4+ZW5kb2JqIDIgMCBvYmo8PC9UeXBlL1BhZ2VzL0tpZHNbMyAwIFJdL0NvdW50IDE+PmVuZG9iaiAzIDAgb2JqPDwvVHlwZS9QYWdlL01lZGlhQm94WzAgMCAzIDNdPj5lbmRvYmoKeHJlZgowIDQKMDAwMDAwMDAwMCA2NTUzNSBmCjAwMDAwMDAwMTAgMDAwMDAgbgowMDAwMDAwMDUzIDAwMDAwIG4KMDAwMDAwMDEwMiAwMDAwMCBuCnRyYWlsZXI8PC9TaXplIDQvUm9vdCAxIDAgUj4+CnN0YXJ0eHJlZgoxNDkKJUVPRgo=';

	header('Content-Type: application/pdf');
	header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
	return base64_decode($pdf_base64);

});


// Generate a PNG if it was requested
new CustomPathHandler('/generate-png', function() {

	// Small red dot
	$png_base64 = 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8z8DwBwAFAgH9XSO6wwAAAABJRU5ErkJggg==';

	header('Content-Type: image/png');
	header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
	return base64_decode($png_base64);

});


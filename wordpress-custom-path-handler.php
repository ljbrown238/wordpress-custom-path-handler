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

require_once( 'GeneratePDF.php' );
require_once( 'GeneratePNG.php' );
require_once( 'GenerateJSON.php' );


// Endpoint to generate a PDF
new CustomPathHandler('/generate-pdf', [new GeneratePDF(),'process_endpoint']);

// Endpoint to generate a PNG
new CustomPathHandler('/generate-png', [new GeneratePNG(),'process_endpoint']);

// Endpoint to generate JSON data from the WordPress database
new CustomPathHandler('/generate-json',[new GenerateJSON(),'process_endpoint']);

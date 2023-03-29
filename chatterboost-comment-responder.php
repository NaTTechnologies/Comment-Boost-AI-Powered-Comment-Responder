<?php
/*
Plugin Name: ChatterBoost: AI-Powered Comment Responder
Description: Utiliza la inteligencia artificial para responder automáticamente y de forma personalizada a los comentarios en tu sitio web.
Version: 1.0
Author: NaT Technologies
Author URI: https://www.nattechnologiesagency.com/
License: GPLv2 or later
Text Domain: chatterboost
*/

// Define constants
define( 'CHATTERBOOST_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'CHATTERBOOST_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Include required files
require_once( CHATTERBOOST_PLUGIN_DIR . 'chatterboost-reply-js.php' );
require_once( CHATTERBOOST_PLUGIN_DIR . 'chatterboost-reply-option.php' );
require_once( CHATTERBOOST_PLUGIN_DIR . 'chatterboost-settings.php' );

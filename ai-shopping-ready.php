<?php

/**
 * Plugin Name: AI Shopping Ready
 * Description: Helps WooCommerce stores improve product data for AI shopping platforms.
 * Version: 1.0.0
 * Author: Your Company
 * Text Domain: ai-shopping-ready
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


/*
|--------------------------------------------------------------------------
| Plugin Constants
|--------------------------------------------------------------------------
*/

define( 'ASR_VERSION', '1.0.0' );

define( 'ASR_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

define( 'ASR_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

define( 'ASR_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );


/*
|--------------------------------------------------------------------------
| Load Core Dependencies
|--------------------------------------------------------------------------
*/

require_once ASR_PLUGIN_DIR . 'includes/class-asr-loader.php';

require_once ASR_PLUGIN_DIR . 'includes/class-asr-core.php';

require_once ASR_PLUGIN_DIR . 'includes/class-asr-activator.php';


/*
|--------------------------------------------------------------------------
| Register Activation Hook
|--------------------------------------------------------------------------
*/

register_activation_hook(
    __FILE__,
    array( 'ASR_Activator', 'activate' )
);


/*
|--------------------------------------------------------------------------
| Initialize Plugin
|--------------------------------------------------------------------------
*/

function asr_run_plugin() {

    $plugin = new ASR_Core();

    $plugin->run();

}

asr_run_plugin();

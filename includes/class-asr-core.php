
<?php

/**
 * The core plugin class.
 *
 * @package AI_Shopping_Ready
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class ASR_Core {

    /**
     * Plugin loader instance.
     *
     * @var ASR_Loader
     */
    protected $loader;


    /**
     * Admin controller instance.
     *
     * @var ASR_Admin
     */
    protected $admin;

    /**
     * WooCommerce compatibility checker.
     *
     * @var ASR_WooCommerce_Compatibility
     */
    protected $woocommerce_compatibility;




    /**
     * Initialize the core functionality.
     */
    public function __construct() {

        $this->load_dependencies();

        $this->define_admin_hooks();

        $this->define_module_hooks();

    }


    /**
     * Load required plugin classes.
     */
    private function load_dependencies() {

        require_once ASR_PLUGIN_DIR . 'includes/class-asr-loader.php';

        require_once ASR_PLUGIN_DIR . 'admin/class-asr-admin.php';

        require_once ASR_PLUGIN_DIR . 'modules/woocommerce-integration/class-asr-woocommerce-compatibility.php';

        $this->loader = new ASR_Loader();

        $this->admin = new ASR_Admin();

        $this->woocommerce_compatibility = new ASR_WooCommerce_Compatibility();

    }


    /**
     * Register admin functionality.
     */
    private function define_admin_hooks() {

        $this->loader->add_action(
            'admin_menu',
            $this->admin,
            'add_plugin_admin_menu'
        );

        $this->loader->add_action(
            'admin_enqueue_scripts',
            $this->admin,
            'enqueue_styles'
        );

        $this->loader->add_action(
            'admin_enqueue_scripts',
            $this->admin,
            'enqueue_scripts'
        );

    }


    /**
     * Register project module functionality.
     */
    private function define_module_hooks() {

    // WooCommerce availability check.
    $this->loader->add_action(
        'plugins_loaded',
        $this->woocommerce_compatibility,
        'check_woocommerce',
        20,
        0
    );

    // WooCommerce dependency warning.
    $this->loader->add_action(
        'admin_notices',
        $this->woocommerce_compatibility,
        'display_missing_notice',
        10,
        0
    );

}


    /**
     * Execute registered hooks.
     */
    public function run() {

        $this->loader->run();

    }

}

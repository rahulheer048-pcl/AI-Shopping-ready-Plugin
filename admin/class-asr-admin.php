
<?php

/**
 * Handles all admin-related functionality.
 *
 * @package AI_Shopping_Ready
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class ASR_Admin {

    /**
     * Dashboard page hook suffix.
     *
     * @var string
     */
    private $dashboard_page_hook;


    /**
     * Register the admin menu.
     */
    public function add_plugin_admin_menu() {

        $this->dashboard_page_hook = add_menu_page(
            __( 'AI Shopping Ready', 'ai-shopping-ready' ),
            __( 'AI Shopping Ready', 'ai-shopping-ready' ),
            'manage_options',
            'ai-shopping-ready',
            array( $this, 'display_dashboard' ),
            'dashicons-chart-line',
            56
        );

    }


    /**
     * Load admin CSS.
     *
     * @param string $hook_suffix Current admin page hook.
     */
    public function enqueue_styles( $hook_suffix ) {

        if ( $this->dashboard_page_hook !== $hook_suffix ) {
            return;
        }

        wp_enqueue_style(
            'asr-admin',
            ASR_PLUGIN_URL . 'assets/css/admin.css',
            array(),
            ASR_VERSION
        );

    }


    /**
     * Load admin JavaScript.
     *
     * @param string $hook_suffix Current admin page hook.
     */
    public function enqueue_scripts( $hook_suffix ) {

        if ( $this->dashboard_page_hook !== $hook_suffix ) {
            return;
        }

        wp_enqueue_script(
            'asr-admin',
            ASR_PLUGIN_URL . 'assets/js/admin.js',
            array( 'jquery' ),
            ASR_VERSION,
            true
        );

    }


    /**
     * Display the plugin dashboard.
     */
    public function display_dashboard() {

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        require_once ASR_PLUGIN_DIR . 'admin/views/admin-dashboard.php';

    }

}

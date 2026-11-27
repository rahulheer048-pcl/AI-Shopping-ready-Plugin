<?php
/**
 * Checks WooCommerce availability and compatibility.
 * 
 * @package AI_Shopping_Ready
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class ASR_WooCommerce_Compatibility{
    /**
     * WooCommerce availability status.
     * 
     * @var bool
     */
    private $woocommerce_available = false;

    /**
     * Check whether WooCommerce is available.
     */
    public function check_woocommerce() {
        if(
            class_exists('WooCommerce') &&
        function_exists('WC')){
            $this->woocommerce_available = true;

            /**
             * Fires when WooCommerce is available
             */
            do_action( 'asr_woocommerce_ready' );

            return;
        }

        $this->woocommerce_available = false;

    }


    /**
     * Display WooCommerce dependency warning.
     */
    public function display_missing_notice() {

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        if ( $this->woocommerce_available ) {
            return;
        }

        ?>
        <div class="notice notice-warning">
            <p>
                <strong>AI Shopping Ready:</strong>
                WooCommerce is not active.
                Please install and activate WooCommerce
                to use product integration features.
            </p>
        </div>
        <?php

    }

}
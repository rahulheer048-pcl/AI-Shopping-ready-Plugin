
<?php

/**
 * Handles WooCommerce product retrieval.
 *
 * @package AI_Shopping_Ready
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class ASR_Product_Repository {

    /**
     * Retrieve WooCommerce products.
     *
     * @param array $args Product query arguments.
     * @return array|WP_Error
     */
    public function get_products( $args = array() ) {

        // Check WooCommerce availability.
        if ( ! function_exists( 'wc_get_products' ) ) {
            return new WP_Error(
                'asr_woocommerce_unavailable',
                'WooCommerce product API is not available.'
            );
        }

        // Default product query arguments.
        $defaults = array(
            'status'  => 'publish',
            'limit'   => 20,
            'page'    => 1,
            'orderby' => 'date',
            'order'   => 'DESC',
        );

        // Merge custom arguments with defaults.
        $query_args = wp_parse_args( $args, $defaults );

        // Validate pagination values.
        $query_args['limit'] = min(
            100,
            max( 1, absint( $query_args['limit'] ) )
        );

        $query_args['page'] = max(
            1,
            absint( $query_args['page'] )
        );

        // Retrieve products using WooCommerce API.
        $products = wc_get_products( $query_args );

        if ( ! is_array( $products ) ) {
            return new WP_Error(
                'asr_product_retrieval_failed',
                'Unable to retrieve WooCommerce products.'
            );
        }

        return $products;
    }


    /**
     * Retrieve a single WooCommerce product.
     *
     * @param int $product_id WooCommerce product ID.
     * @return WC_Product|false|WP_Error
     */
    public function get_product( $product_id ) {

        if ( ! function_exists( 'wc_get_product' ) ) {
            return new WP_Error(
                'asr_woocommerce_unavailable',
                'WooCommerce product API is not available.'
            );
        }

        $product_id = absint( $product_id );

        if ( ! $product_id ) {
            return false;
        }

        $product = wc_get_product( $product_id );

        if ( ! $product instanceof WC_Product ) {
            return false;
        }

        return $product;
    }

}

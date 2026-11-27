
<?php

/**
 * Extracts and normalizes WooCommerce product data.
 *
 * @package AI_Shopping_Ready
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class ASR_Product_Data {

    /**
     * Extract product information.
     *
     * @param WC_Product $product WooCommerce product object.
     * @return array|WP_Error
     */
    public function extract( $product ) {

        // Validate product object.
        if ( ! $product instanceof WC_Product ) {

            return new WP_Error(
                'asr_invalid_product',
                'Invalid WooCommerce product object.'
            );
        }

        // Extract basic product information.
        $product_data = array(

            'id'   => $product->get_id(),

            'name' => $product->get_name(),

            'slug' => $product->get_slug(),

            'sku'  => $product->get_sku(),

            'type' => $product->get_type(),

            'status' => $product->get_status(),

            'description' => $product->get_description(),

            'short_description' => $product->get_short_description(),

            'permalink' => $product->get_permalink(),

            'regular_price' => $product->get_regular_price(),

            'sale_price' => $product->get_sale_price(),

            'price' => $product->get_price(),

            'on_sale' => $product->is_on_sale(),

            'stock_status' => $product->get_stock_status(),

            'stock_quantity' => $product->get_stock_quantity(),

            'manage_stock' => $product->get_manage_stock(),

            'weight' => $product->get_weight(),

            'length' => $product->get_length(),

            'width' => $product->get_width(),

            'height' => $product->get_height(),

            'image_id' => $product->get_image_id(),

            'gallery_image_ids' => $product->get_gallery_image_ids(),

            'category_ids' => $product->get_category_ids(),

            'tag_ids' => $product->get_tag_ids(),

            'created_at' => $product->get_date_created()
                ? $product->get_date_created()->date( 'Y-m-d H:i:s' )
                : null,

            'updated_at' => $product->get_date_modified()
                ? $product->get_date_modified()->date( 'Y-m-d H:i:s' )
                : null,

        );

        return $product_data;

    }

}

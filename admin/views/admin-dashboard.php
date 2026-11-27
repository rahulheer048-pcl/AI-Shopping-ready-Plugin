
<?php

/**
 * AI Shopping Ready dashboard view.
 *
 * @package AI_Shopping_Ready
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>

<div class="wrap asr-dashboard">

    <div class="asr-dashboard-header">

        <div>
            <h1><?php esc_html_e( 'AI Shopping Ready', 'ai-shopping-ready' ); ?></h1>

            <p>
                <?php
                esc_html_e(
                    'Manage your WooCommerce product data and AI shopping readiness.',
                    'ai-shopping-ready'
                );
                ?>
            </p>
        </div>

        <span class="asr-version">
            <?php echo esc_html( 'Version ' . ASR_VERSION ); ?>
        </span>

    </div>


    <div class="asr-dashboard-cards">

        <div class="asr-card">
            <h3><?php esc_html_e( 'Total Products', 'ai-shopping-ready' ); ?></h3>
            <p class="asr-card-value">--</p>
            <span><?php esc_html_e( 'Awaiting WooCommerce integration', 'ai-shopping-ready' ); ?></span>
        </div>


        <div class="asr-card">
            <h3><?php esc_html_e( 'Products Analyzed', 'ai-shopping-ready' ); ?></h3>
            <p class="asr-card-value">--</p>
            <span><?php esc_html_e( 'Analysis not started', 'ai-shopping-ready' ); ?></span>
        </div>


        <div class="asr-card">
            <h3><?php esc_html_e( 'Products Optimized', 'ai-shopping-ready' ); ?></h3>
            <p class="asr-card-value">--</p>
            <span><?php esc_html_e( 'Optimization not started', 'ai-shopping-ready' ); ?></span>
        </div>

    </div>


    <div class="asr-dashboard-section">

        <h2><?php esc_html_e( 'Getting Started', 'ai-shopping-ready' ); ?></h2>

        <p>
            <?php
            esc_html_e(
                'Your AI Shopping Ready dashboard is ready. The next step is connecting WooCommerce and fetching your product data.',
                'ai-shopping-ready'
            );
            ?>
        </p>

    </div>

</div>

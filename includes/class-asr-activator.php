<?php

/**
 * Fired during plugin activation.
 *
 * @package AI_Shopping_Ready
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class ASR_Activator {

    /**
     * Run plugin activation tasks.
     */
    public static function activate() {

        self::check_requirements();

        self::set_default_options();

        self::set_database_version();

    }


    /**
     * Check minimum plugin requirements.
     */
    private static function check_requirements() {

        if ( version_compare( PHP_VERSION, '7.3', '<' ) ) {

            wp_die(
                esc_html__( 'AI Shopping Ready requires PHP 7.3 or higher.', 'ai-shopping-ready' )
            );

        }

    }


    /**
     * Set default plugin options.
     */
    private static function set_default_options() {

        if ( false === get_option( 'asr_plugin_version' ) ) {

            add_option( 'asr_plugin_version', ASR_VERSION );

        }

    }


    /**
     * Set the database schema version.
     */
    private static function set_database_version() {

        if ( false === get_option( 'asr_db_version' ) ) {

            add_option( 'asr_db_version', '1.0.0' );

        }

    }

}

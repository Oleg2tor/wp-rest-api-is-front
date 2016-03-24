<?php
/*
Plugin Name: WP REST API (V2) is_front
Description: WP REST API (V2) Modifications for is_front endpoint.
Author: Oleg Kostin
Version: 1.0
Author URI: http://pmr.io
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Check if WP REST API is active
 **/
if ( in_array( 'rest-api/plugin.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) :

    if ( ! function_exists ( 'wp_rest_is_front_init' ) ) :

        /**
         * Init JSON REST API is_front routes.
         *
         * @since 1.0.0
         */
        function wp_rest_is_front_init() {
            register_rest_field(
                'page',
                'is_front',
                array(
                    'get_callback' => 'wp_rest_is_front_return',
                )
            );
        }

        /**
         * Handler for updating page data with is_front.
         *
         * @since 1.0.0
         *
         * @param array $object The object from the response
         * @param string $field_name Name of field
         * @param WP_REST_Request $request Current request
         *
         * @return bool
         */
        function wp_rest_is_front_return( $object, $field_name, $request ) {
            return (int)get_option( 'page_on_front' ) === $object['id'];
        }

        add_action( 'init', 'wp_rest_is_front_init' );

    endif;


endif;

<?php
/*
Plugin Name: WP REST API (V2) isFront
Description: WP REST API (V2) Modifications for isFront endpoint.
Author: Oleg Kostin
Version: 1.0
Author URI: http://pmr.io
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! function_exists ( 'wp_rest_is_front_init' ) ) :

    /**
     * Init JSON REST API isFront routes.
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

    // Return settings
    function wp_rest_is_front_return( $object, $field_name, $request ) {
        return (int)get_option( 'page_on_front' ) === $object['id'];
    }

    add_action( 'init', 'wp_rest_is_front_init' );

endif;

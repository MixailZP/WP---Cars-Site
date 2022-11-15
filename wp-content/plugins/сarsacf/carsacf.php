<?php
/*
Plugin Name: Cars ACF
Plugin URI: https://example.com/
Description: Плагин-метабокс для авто
Version: 1.0
Requires PHP: 7.3.26
Author: Mihail made metabox
Author URI: https://example.com/
License: GPLv2 or later
*/

if(!defined('ABSPATH')){
    die;
}

function hcf_register_metabox(){
    add_meta_box('car', 'Cars Fields', 'hcf_metabox_display', 'car' );
}

add_action( 'add_meta_boxes', 'hcf_register_metabox' );

function hcf_metabox_display(){
    include plugin_dir_path( __FILE__ ) . 'form.php';
}

function hcf_save( $post_id ){
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
        return;
    }
    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }
    $field_list = [
        'hcf_color',
        'hcf_fluel',
        'hcf_strong',
        'hcf_price',
        'hcf_published_date'
    ];
    foreach ( $field_list as $fieldName ){
        if ( array_key_exists( $fieldName, $_POST ) ) {
            update_post_meta(
                $post_id,
                $fieldName,
                sanitize_text_field( $_POST[ $fieldName ] )
            );
        }
    }
}
add_action( 'save_post', 'hcf_save' );
<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


if ( ! defined( 'WPESTATE_CHLD_THEME_DIRECTORY_URL' ) ) {
    // Replace the version number of the theme on each release.
    define( 'WPESTATE_CHLD_THEME_DIRECTORY_URL', get_template_directory_uri() );
}

if ( ! defined( 'WPESTATE_CHLD_THEME_DIRECTORY_PATH' ) ) {
    // Replace the version number of the theme on each release.
    define( 'WPESTATE_CHLD_THEME_DIRECTORY_PATH', get_stylesheet_directory_uri() );
}


add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parenthandle = 'twentytwentytwo-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
    );

    wp_enqueue_script( 'forms_action', get_stylesheet_directory_uri() . '/assets/js/theme.js', array('jquery'), '', true );

    wp_enqueue_style( 'child-ttt-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );

}


// ********************* Custom post type Car + taxonomy**************************

add_action( 'init', 'create_posttype' );
function create_posttype(){

    register_taxonomy(
        'brand',
        'car',
        $args = array(
            'show_admin_column' => true,
            'hierarchical' => true,
            'labels' => array(
                'name'                     => 'Brand',
                'singular_name'            => 'Brand',
                'menu_name'                => 'Brand', 
                'all_items'                => 'All Brands',
                'edit_item'                => 'Edit Brand',
                'view_item'                => 'View Brand', 
                'update_item'              => 'Update Brand',
                'add_new_item'             => 'Add New Brand',
                'new_item_name'            => 'Name New Brand',
                'parent_item'              => 'Parent Brand',
                'parent_item_colon'        => 'Parent Colon Brand:',
                'search_items'             => 'Search Brand',
                'popular_items'            => 'Popular Brand', 
                'add_or_remove_items'      => 'Add or Remove Brand',
                'choose_from_most_used'    => 'Choose from most used Brands',
                'not_found'                => 'Brand Not Found',
                'back_to_items'            => '← Back to Brand',
            )
        )
        
    );

    register_taxonomy(
        'manufacturer-country',
        'car',
        $args = array(
            'show_admin_column' => true,
            'hierarchical' => true,
                'labels' => array(
                    'name'                     => 'Manufactur Country', 
                    'singular_name'            => 'Manufacturer Country',
                    'menu_name'                => 'Manufacturer Country', 
                    'all_items'                => 'All Manufactures Countries',
                    'edit_item'                => 'Edit Manufacturer Country',
                    'view_item'                => 'View Manufacturer Country', 
                    'update_item'              => 'Update Manufacturer Country',
                    'add_new_item'             => 'Add New Manufactur Country',
                    'new_item_name'            => 'Name New Manufacturer Country',
                    'parent_item'              => 'Parent Manufactures Country', 
                    'parent_item_colon'        => 'Parent Colon Manufacturer Country',
                    'search_items'             => 'Search Manufactur Country',
                    'popular_items'            => 'Popular Manufacturer Country', 
                    'add_or_remove_items'      => 'Add or Remove Manufacturer Country',
                    'choose_from_most_used'    => 'Choose from most used Manufacturer Country',
                    'not_found'                => 'Manufactur Country Not Found',
                    'back_to_items'            => '← Back to Manufacturer Country',
                )
            )
    );

    register_post_type( 'car',
        array(
                'labels' => array(
                'name' => ( 'Cars' ),
                'singular_name' => ( 'Car' ),
                'add_new' => ('Add New Car'), 
                'add_new_item'       => ('Add New Car'),
                'edit_item'          => ('Edit Car'), 
                'view_item'          => ('View item car'), 
                'search_items'       => ('Search Car'), 
                'not_found'          => ('Car not found'),
                ),
            'menu_position' => 4,
            'supports' => array('title', 'editor', 'thumbnail', 'post-formats'),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-car',
            
        )
    );
}


/****************************** Theme customizer:  *********************************************/

// *** add phone ***
function customize_register_action( $wp_customize ) {
    $a = $wp_customize;
    $wp_customize->add_setting(
            'title_tagline_phone',
            array(
                'default' => '+38(050) 777-77-77',
            )
        );
    $wp_customize->add_control(
        'title_tagline_phone',
        array(
            'label'   => 'Phone Number',
            'section' => 'title_tagline',
            'type'    => 'text',
        )
    );

//*** add logo ***
    add_theme_support(
        'custom-logo', array(
        'height' => 70,
        'width'  => 110,
        )
    );
}
add_action( 'customize_register', 'customize_register_action' );

function thubnails_setup(){
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'thubnails_setup');


/****************************** Add ShortCode for 10-Cars on Page *********************************************/

add_shortcode( 'allcars-code', 'cars_shortcode_function' );
function cars_shortcode_function( $atts, $content = null ) {
    global $post;
    $post_id = get_the_ID();

    $stati_children = new WP_Query(array(
            'post_type' => 'car',
            'post_parent' => wp_get_post_parent_id($post_id),
            'orderby' => 'rand',
            'posts_per_page' => 10
        )
    );
    
    $output ='<div class="pages-wrap">';
    if($stati_children->have_posts()) :
        while($stati_children->have_posts()): $stati_children->the_post();

        $output .= '<ul><li><div class="last-pages-img"><a href="'. get_the_permalink() .'"><img src="'. get_the_post_thumbnail( get_the_id() ) . '</a></div><p><a href="'. get_the_permalink() .'">'. get_the_title() .'</a></p></li></ul>';
        
        endwhile;
    endif; wp_reset_query();
    $output .='</div>';
    return $output;
}


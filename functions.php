<?php
add_action('wp_enqueue_scripts', 'childhood_styles');
add_action('wp_enqueue_scripts', 'childhood_scripts');

function childhood_styles() {
    wp_enqueue_style( 'childhood-style', get_stylesheet_uri() );
    wp_enqueue_style( 'style-toys', get_template_directory_uri()
    . '/assets/styles/style-toys.css' );
};

function childhood_scripts() {
    wp_enqueue_script( 'childhood-scripts', get_template_directory_uri()
    . '/assets/js/main.min.js', array(), null, true );
};

add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );

add_filter( 'nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 3 );
function filter_nav_menu_link_attributes($atts, $item, $args) {
    if ($args->menu === 'Main') {
        $atts['class'] = 'header__nav-item';

        if ($item->current) {
            $atts['class'] .= ' header__nav-item-active';
        }
        if( $item->ID === 176 && ( in_category( 'soft_toys' ) || in_category( 'edu_toys' ))){
            $atts['class'] .= ' header__nav-item-active';
        }
    };

    return $atts;
}

add_filter('category_link', 'remove_string_category', 99 );
function remove_string_category($a){
	return str_replace( 'category/', '', $a );
}

?>
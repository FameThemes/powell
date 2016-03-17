<?php
/**
 * OnePress Child Theme Functions
 *
 */

/**
 * Enqueue child theme style
 */
add_action( 'wp_enqueue_scripts', 'powell_child_enqueue_styles', 15 );
function powell_child_enqueue_styles()
{
    wp_enqueue_style('onepress-child-style', get_stylesheet_directory_uri() . '/style.css');
}

/**
 * Remove header transparent function
 *
 * @param $wp_customize
 */
function powell_customizer( $wp_customize ){
    $wp_customize->remove_setting( 'onepress_header_transparent' );
    $wp_customize->remove_control( 'onepress_header_transparent' );

}
add_action( 'customize_register', 'powell_customizer', 75 );


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function powell_body_classes( $classes ) {
    if ( is_page_template( 'template-frontpage.php' ) ) {
        $classes[] = 'header-transparent';
    }
    return $classes;
}
add_filter( 'body_class', 'powell_body_classes', 75 );
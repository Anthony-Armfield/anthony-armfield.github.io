<?php 
/**
 * U-Design Theme and WooCommerce Specific Shortcodes
 * 
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


/*
 * Shortcode: udesign_wc_top_rated_products
 * 
 * Usage: [udesign_wc_top_rated_products title="Top rated products" number="3"]
 * 
 * Options: title="Top rated products" number="3"
 * 
 */
function udesign_wc_top_rated_products_func( $atts ) {
    $atts = shortcode_atts( array(
        'title' => esc_html__('Top rated products', 'woocommerce'), 
        'number' => 3
    ), $atts, 'udesign_wc_top_rated_products' );
    
    
    // The widget's class name.
    $widget = esc_html( 'WC_Widget_Top_Rated_Products' );
    
    // The current widget instance's settings.
    $instance = array(
        'title' => esc_html( $atts['title'] ),
        'number' => $atts['number']
    );
    
    // Generate random ID.
    $id = rand(1000, 1999);
    
    // Widget's custom arguments.
    $args = array(
        'widget_id' => 'arbitrary-instance-'.$id,
        'before_widget' => '<div class="widget udesign-wc-shortcode woocommerce widget_top_rated_products substitute_widget_class">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    );

    ob_start();
    the_widget( $widget, $instance, $args );
    return ob_get_clean();
    
}
add_shortcode('udesign_wc_top_rated_products','udesign_wc_top_rated_products_func'); 




/*
 * Shortcode: udesign_wc_products
 * 
 * Usage: [udesign_wc_products title="Products" number="5" show="" orderby="date" order="desc" hide_free="0" show_hidden="0"]
 * 
 * Options: 
 *      title="Products" 
 *      number="5"
 *      show=""  - options: leave blank for all products, 'featured', 'onsale'
 *      orderby="date"  - options: 'date', 'price', 'rand', 'sales'
 *      order="desc"  - options: 'asc', 'desc'
 *      hide_free="0" 
 *      show_hidden="0"
 * 
 */
function udesign_wc_products_func( $atts ) {
    $atts = shortcode_atts( array(
        'title' => esc_html__('Products', 'woocommerce'), 
        'number' => 5,
        'show' => '',
        'orderby' => 'date',
        'order' => 'desc',
        'hide_free' => 0,
        'show_hidden' => 0
    ), $atts, 'udesign_wc_products' );
    
    
    // The widget's class name.
    $widget = esc_html( 'WC_Widget_Products' );
    
    // The current widget instance's settings.
    $instance = array(
        'title' => esc_html( $atts['title'] ),
        'number' => $atts['number'],
        'show' => $atts['show'],
        'orderby' => $atts['orderby'],
        'order' => $atts['order'],
        'hide_free' => $atts['hide_free'],
        'show_hidden' => $atts['show_hidden']
    );
    
    // Generate random ID.
    $id = rand(2000, 2999);
    
    // Widget's custom arguments.
    $args = array(
        'widget_id' => 'arbitrary-instance-'.$id,
        'before_widget' => '<div class="widget udesign-wc-shortcode woocommerce widget_products substitute_widget_class">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    );

    ob_start();
    the_widget( $widget, $instance, $args );
    return ob_get_clean();
    
}
add_shortcode('udesign_wc_products','udesign_wc_products_func'); 


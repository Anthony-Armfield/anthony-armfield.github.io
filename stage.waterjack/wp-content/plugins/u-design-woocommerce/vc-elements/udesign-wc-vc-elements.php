<?php 
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


// Before VC init
add_action( 'vc_before_init', 'udesign_wc_vc_elements' );

function udesign_wc_vc_elements() {

    
    /**
     * -----------------------------------------------------------------------------------------------
     *  U-Design VisualComposer element that groups 
     *  "WooCommerce top rated products" ('udesign_wc_top_rated_products' shortcode) and 
     *  "WooCommerce products" ('udesign_wc_products' shortcode) into one element
     * -----------------------------------------------------------------------------------------------
     * 
     * The following  will create the [vc_udesign_wc_products]...[/vc_udesign_wc_products] element
     * 
     */
    add_shortcode('vc_udesign_wc_products', 'vc_udesign_wc_products_func');
    function vc_udesign_wc_products_func(  $atts, $content = null ) {
        $atts = shortcode_atts( array(
                        'shortcode_type'  => 'udesign_wc_top_rated_products', // options: 'udesign_wc_top_rated_products', 'udesign_wc_products'
                        // The following parameters are common in both "udesign_wc_top_rated_products" and "udesign_wc_products" shortcodes.
                        'title' => esc_html__('Top rated products', 'udesign'), 
                        'number' => 5,
                        'class' => '',
                        // 'udesign_wc_products' specific:
                        'show' => '', // options: leave blank for all products, 'featured', 'onsale'
                        'orderby' => 'date', // options: 'date', 'price', 'rand', 'sales'
                        'order' => 'desc', // options: 'asc', 'desc'
                        'hide_free' => 0,
                        'show_hidden' => 0
                ), $atts, 'vc_udesign_wc_products' );
        
        if ( $atts['shortcode_type'] === 'udesign_wc_top_rated_products' ) {
                $output = do_shortcode( '['.$atts['shortcode_type'].' title="'.$atts['title'].'" number="'.$atts['number'].'"]' );
        } else { // when 'udesign_wc_products'
                $output = do_shortcode( '['.$atts['shortcode_type'].' title="'.$atts['title'].'" number="'.$atts['number'].'" show="'.$atts['show'].'" orderby="'.$atts['orderby'].'" order="'.$atts['order'].'" hide_free="'.$atts['hide_free'].'" show_hidden="'.$atts['show_hidden'].'"]' );
        } 
        return $output;
        
    }

    vc_map(array(
        "name" => __( "Products", "udesign" ),
        "base" => "vc_udesign_wc_products",
        "category" => __( "U-Design WooCommerce", "udesign" ),
        'description' => __( "U-Design theme element", "udesign" ),
        'icon' => plugins_url(  '/images/ud-logo-small.png', __FILE__ ),
        "params" => array(
            array(
                    'type' => 'dropdown',
                    'heading' => __( 'Element Type', 'udesign' ),
                    'param_name' => 'shortcode_type',
                    'value' => array(
                            __( 'WooCommerce products', 'udesign' )    => 'udesign_wc_products',
                            __( 'WooCommerce top rated products', 'udesign' )   => 'udesign_wc_top_rated_products',
                    ),
                    'std'   => 'udesign_wc_products',
                    "save_always" => true,
                    "description" => __( 'Select the element type.', 'udesign' ),
            ),
            array(
                    "type" => "textfield",
                    "heading" => __("Title", "udesign"),
                    "param_name" => "title",
                    "value" => "",
                    "save_always" => true,
                    "description" => __( "Enter title.", "udesign" ),
                    "admin_label" => true,
            ),
            array(
                    "type" => "textfield",
                    "heading" => __("Number", "udesign"),
                    "param_name" => "number",
                    "value" => "5",
                    "save_always" => true,
                    "description" => __( "Number of products to show.", "udesign" ),
            ),
            
            // 'udesign_wc_products' specific:
            array(
                    'type' => 'dropdown',
                    'heading' => __( 'Show', 'udesign' ),
                    'param_name' => 'show',
                    'value' => array(
                            __( 'All products', 'udesign' ) => '',
                            __( 'Featured products', 'udesign' )  => 'featured',
                            __( 'On-sale products', 'udesign' ) => 'onsale',
                    ),
                    'std'   => '',
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'shortcode_type',
                            'value' => array( 'udesign_wc_products' ),
                    ),
                    "description" => __( 'Select what products to show.', 'udesign' ),
            ),
            array(
                    'type' => 'dropdown',
                    'heading' => __( 'Order by', 'udesign' ),
                    'param_name' => 'orderby',
                    'value' => array(
                            __( 'Date', 'udesign' ) => 'date',
                            __( 'Price', 'udesign' )  => 'price',
                            __( 'Random', 'udesign' ) => 'rand',
                            __( 'Sales', 'udesign' ) => 'sales',
                    ),
                    'std'   => 'date',
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'shortcode_type',
                            'value' => array( 'udesign_wc_products' ),
                    ),
                    "description" => __( 'Select what criteria should the product be ordered by.', 'udesign' ),
            ),
            array(
                    'type' => 'dropdown',
                    'heading' => __( 'Order', 'udesign' ),
                    'param_name' => 'order',
                    'value' => array(
                            __( 'DESC', 'udesign' ) => 'desc',
                            __( 'ASC', 'udesign' )  => 'asc',
                    ),
                    'std'   => 'desc',
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'shortcode_type',
                            'value' => array( 'udesign_wc_products' ),
                    ),
                    "description" => __( 'Select how the product should be ordered (Descending or Ascending).', 'udesign' ),
            ),
            array(
                    'type' => 'checkbox',
                    'heading' => __( 'Hide free products', 'udesign' ),
                    'param_name' => 'hide_free',
                    'value' => array( __( 'Yes', 'udesign' ) => 'yes' ),
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'shortcode_type',
                            'value' => array( 'udesign_wc_products' ),
                    ),
            ),
            array(
                    'type' => 'checkbox',
                    'heading' => __( 'Show hidden products', 'udesign' ),
                    'param_name' => 'show_hidden',
                    'value' => array( __( 'Yes', 'udesign' ) => 'yes' ),
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'shortcode_type',
                            'value' => array( 'udesign_wc_products' ),
                    ),
            ),
            array(
                    "type" => "textfield",
                    "heading" => __("Custom Class", "udesign"),
                    "param_name" => "class",
                    "value" => "",
                    "save_always" => true,
                    "description" => __( "Use this option to pass a unique CSS class which you may use to style this particular instance of the content block in the front end with custom CSS.", "udesign" ),
            ),
        )
    ));
    
    
    
}






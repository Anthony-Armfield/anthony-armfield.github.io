<?php
function my_theme_enqueue_styles() {
	

	$parent_style = 'u-design-style'; // For basic u_design style.
	$parent_style_two = 'u-design-custom-style'; // For uBuild style.

	wp_enqueue_style($parent_style, get_template_directory_uri() . "../u-design/styles/style1/css/style.css", false, UDESIGN_VERSION, 'screen');
	wp_enqueue_style($parent_style_two, get_template_directory_uri() . '../u-design/styles/custom/custom_style.css', false, UDESIGN_VERSION, 'screen');

    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', false, UDESIGN_VERSION, 'screen'); 
}
add_action( 'wp_enqueue_styles', 'my_theme_enqueue_styles' );
?>
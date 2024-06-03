<?php
/**
 * Useful common functions
 *
 * @package   U-Design Shortcodes Button
 * @author    AndonDesign https://themeforest.net/user/andondesign
 * @link      https://themeforest.net/item/udesign-responsive-wordpress-theme/253220?ref=AndonDesign
 * @since     2.0.0
 */


// Post Types
function udesign_shortcodes_get_post_types() {
	$array = array();
	$post_types = get_post_types( array( 'public' => true ), 'names' ); 
	foreach ( $post_types as $post_type ) {
		if ( $post_type !== 'attachment' ) {
			$array[] = $post_type;
		}
	}
	$array = array_combine( $array, $array );
	return $array;
}

// Taxonomies
function udesign_shortcodes_get_taxonomies() {
	$array = array();
	$taxonomies = get_taxonomies();
	foreach ( $taxonomies as $taxonomy ) {
		$array[] = $taxonomy;
	}
	$array = array_combine( $array, $array );
	return $array;
}
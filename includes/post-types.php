<?php
namespace GO_WP\PostTypes;
/**
 * Set up post types
 *
 * @return void
 */
function setup() {
	$n = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};
	// NOTE: Uncomment to activate post type
	add_action( 'init', $n( 'register_my_post_type' ) );
}
/**
 * Register the 'my_post_type' post type
 *
 * See https://github.com/johnbillion/extended-cpts for more information
 * on registering post types with the extended-cpts library.
 */
function register_my_post_type() {
	$artwork = register_extended_post_type( 'artwork', array(
		'menu_icon' 	=> 'dashicons-art',
		'show_in_rest'	=> true,
		'supports' 		=> array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'admin_cols'	=> array(
									'featured_image' => array(
										'title'          => 'Artwork Image',
										'featured_image' => 'thumbnail'
									),			
									// A taxonomy terms column:
									'genre' => array(
										'title'    => 'Artwork Projects',
										'taxonomy' => 'artwork_project',
										'link'     => 'edit',
									)								
								),
		'names'			=> array(
								//Override the base names used for labels:
								'singular' => 'Artwork',
								'plural'   => 'Artworks',
								'slug'     => 'art'
								)
	) );
	
	$artwork->add_taxonomy( 'artwork_project', array(
		'show_ui'	=> true,
	) );	
}
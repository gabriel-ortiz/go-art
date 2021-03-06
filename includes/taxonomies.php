<?php
namespace GO_WP\Taxonomies;
/**
 * Set up taxonomies.
 *
 * @return void
 */
function setup() {
	$n = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};
	// NOTE: Uncomment to activate taxonomy
	add_action( 'init', $n( 'register_taxonomy' ) );
}
/**
 * Register the my_taxo taxonomy and assign it to posts.
 *
 * See https://github.com/johnbillion/extended-taxos for more info on using the extended-taxos library
 */
function register_taxonomy() {
	$artwork_projects = register_extended_taxonomy( 
		'artwork_project', 
		array( 'artwork', 'page'),
		array(
			'meta_box'	=> 'radio'
			) 
		
	);
	
	
}
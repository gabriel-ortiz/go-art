<?php
namespace GO_WP\MetaBoxes\General;
/**
 * Metaboxes that appear on more than one post type around the site
 *
 * @return void
 */
function setup() {
	$n = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};
	// NOTE: Uncomment to activate metabox
	add_action( 'cmb2_init',  $n( 'artwork_options' ) );
}
/**
 * Example metabox
 * See https://github.com/WebDevStudios/CMB2/wiki/Field-Types for
 * more information on creating metaboxes and field types.
 */
function artwork_options() {
	$prefix = 'artwork_';
	$cmb = new_cmb2_box( array(
		'id'        	=> $prefix . 'metabox',
		'title'     	=> __( 'Artwork Metadata', 'cmb2' ),
		'priority'  	=> 'high',
		'show_names'	=> true,
		'object_types'	=> array( 'artwork' )
	) );

	$cmb->add_field( array(
		'name'	=> __( 'Year', 'cmb2' ),
		'desc'  => __( 'Year of Work', 'cmb2' ),
		'id'  	=> $prefix . 'year',
		'type'	=> 'text'
	) );

	$cmb->add_field( array(
		'name'    => esc_html__( 'Medium', 'cmb2' ),
		'desc'    => esc_html__( 'Type of medium', 'cmb2' ),
		'id'      => $prefix . 'medium',
		'type'    => 'radio',
		'options' => array(
			'Oil on canvas'	=> esc_html__( 'Oil on canvas', 'cmb2' ),
			'Oil on panel' 	=> esc_html__( 'Oil on panel', 'cmb2' ),
			'Oil on collaged map and panel' => esc_html__( 'Oil on collaged map and panel', 'cmb2' ),
		),
	) );	
	
	
}
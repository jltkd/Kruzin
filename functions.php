<?php

// =============================================================================
// FUNCTIONS.PHP
// -----------------------------------------------------------------------------
// Overwrite or add your own custom functions to X Pro in this file.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Enqueue Parent Stylesheet
//   02. Additional Functions
// =============================================================================

// Enqueue Parent Stylesheet
// =============================================================================

add_filter( 'x_enqueue_parent_stylesheet', '__return_true' );



// Additional Functions
// =============================================================================

// Builder Custom Post Type
function create_builder_posttype() {

	register_post_type( 'builders',
	// CPT Options
		array(
			'labels' => array(
				'name'          => __( 'Builders' ),
				'singular_name' => __( 'Builder' ),
        'add_new_item'  => __( 'Builder Name' ),
        'new_item'      => __( 'Add New Builder' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'builders'),
			'taxonomies' => array('category', 'post_tag'),
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_builder_posttype' );

// Vendor Custom Post Type
function create_vendor_posttype() {

	register_post_type( 'vendors',
	// CPT Options
		array(
			'labels' => array(
				'name'          => __( 'Vendors' ),
				'singular_name' => __( 'Vendor' ),
        'add_new_item'  => __( 'Vendor Name' ),
        'new_item'      => __( 'Add New Vendor' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'vendors'),
			'taxonomies' => array('category', 'post_tag'),
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_vendor_posttype' );

function get_excerpt(){
$excerpt = get_the_content();
$excerpt = preg_replace(" ([.*?])",'',$excerpt);
$excerpt = strip_shortcodes($excerpt);
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, 170);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = $excerpt.'... ';
return $excerpt;
}

// Updating the File upload size
@ini_set( 'upload_max_size' , '124M' );
@ini_set( 'post_max_size', '124M');
@ini_set( 'max_execution_time', '90' );


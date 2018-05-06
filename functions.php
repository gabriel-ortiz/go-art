<?php
/**
 * Functions and definitions
 */
// Useful global constants
define( 'GO_VERSION',      '0.1.0' );
define( 'GO_URL',          get_stylesheet_directory_uri() );
define( 'GO_TEMPLATE_URL', get_template_directory_uri() );
//define( 'GO_PATH',         get_template_directory() . '/' );
define( 'GO_PATH',         dirname( __FILE__ ) . '/' );
define( 'GO_INC',          GO_PATH . 'includes/' );
define( 'GO_ASSETS',       GO_TEMPLATE_URL . '/assets/' );
if ( ! defined( 'DAY_IN_SECONDS' ) ) {
    define( 'DAY_IN_SECONDS', 24 * 60 * 60 );
}		
	
//search and replace for changing plugin prefix
/**
find ./ -type f -exec sed -i -e 's/GO_WP/FWF/g' {} \;
find ./ -type f -exec sed -i -e 's/go_wp/fwf/g' {} \; 
find ./ -type f -exec sed -i 's/go_wp/fw/gI' {} \; 
find ./ -type f -exec sed -i -e 's/GO_WP/fw/g' {} \; 	
*/

// Theme support options
require_once(get_template_directory().'/functions/theme-support.php'); 

// WP Head and other cleanup functions
require_once(get_template_directory().'/functions/cleanup.php'); 

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php'); 

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php'); 

// Register sidebars/widget areas
require_once(get_template_directory().'/functions/sidebar.php'); 

// Makes WordPress comments suck less
require_once(get_template_directory().'/functions/comments.php'); 

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/functions/page-navi.php'); 

// Adds support for multiple languages
require_once(get_template_directory().'/functions/translation/translation.php'); 

// Customize the WordPress login menu
require_once(get_template_directory().'/functions/login.php'); 

// Customize the WordPress admin
require_once(get_template_directory().'/functions/admin.php'); 

// Adds site styles to the WordPress editor
//require_once(get_template_directory().'/functions/editor-styles.php');


// Include lib classes
include( GO_INC . 'libraries/extended-cpts.php' );
include( GO_INC . 'libraries/extended-taxos.php' );
include( GO_INC . 'libraries/cmb2.addons.php' );
include( GO_INC . 'libraries/cmb2/init.php' );
include( GO_INC . 'libraries/cmb2-attached-posts/cmb2-attached-posts-field.php' );
include( GO_INC . 'libraries/cmb2-post-search-field/cmb2_post_search_field.php' );


// Include compartmentalized functions
//require_once GO_INC . 'core.php';
require_once GO_INC . 'post-types.php';
require_once GO_INC . 'shortcodes.php';
require_once GO_INC . 'taxonomies.php';

require_once GO_INC . 'metaboxes.php';

// Run the setup functions
//GO_WP\Core\setup();
GO_WP\PostTypes\setup();
GO_WP\Shortcodes\setup();
GO_WP\Taxonomies\setup();


// Adds site styles to the WordPress editor
// require_once(get_template_directory().'/functions/editor-styles.php'); 

// Remove 4.2 Emoji Support
// require_once(get_template_directory().'/functions/disable-emoji.php'); 

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/functions/related-posts.php'); 

// Use this as a template for custom post types
// require_once(get_template_directory().'/functions/custom-post-type.php');


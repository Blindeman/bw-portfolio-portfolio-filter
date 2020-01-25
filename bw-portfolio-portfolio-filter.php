<?php
/**
 * Plugin Name: BW Portfolio CPT with Portfolio filter taxonomy
 * Plugin URI: https://blindeman.github.io/bw-portfolio-portfolio-filter/
 * Description: Adding portfolio post type and custom taxonomy
 * Version: 0.0.1
 * Tested up to: 5.3.2
 * Author: Naomi Blindeman
 * Author URI: https://blindemanwebsites.com/
 * License: GNU General Public License 3.0
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Github plugin URI: https://github.com/Blindeman/bw-portfolio-portfolio-filter
 * Text Domain: bw-portfolio-portfolio-filter
 * @package bw-portfolio-portfolio-filter
 */

//preventing direct access to this file
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Create custom post type `portfolio`
 */

function bw_register_portfolio() {

	/**
	 * Post Type: Portfolio.
	 */

	$labels = [
		"name" => __( "Portfolio", "dcagency" ),
		"singular_name" => __( "Portfolio item", "dcagency" ),
	];

	$args = [
		"label" => __( "Portfolio", "dcagency" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "infotheek-item", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-portfolio",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields", "comments", "revisions", "author" ],
		"taxonomies" => [ "portfolio_filter" ],
	];

	register_post_type( "portfolio", $args );
}

add_action( 'init', 'bw_register_portfolio' );


/**
 * Register custom taxonomy: Portfolio filter.
 */


function bw_register_portfolio_filter() {

	/**
	 * Taxonomy: Portfolio Filter.
	 */

	$labels = [
		"name" => __( "Portfolio Filter", "dcagency" ),
		"singular_name" => __( "Portfolio Filter", "dcagency" ),
	];

	$args = [
		"label" => __( "Portfolio Filter", "dcagency" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'portfolio_filter', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "portfolio_filter",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		];
	register_taxonomy( "portfolio_filter", [ "portfolio" ], $args );
}
add_action( 'init', 'bw_register_portfolio_filter' );

<?php

function cptui_register_my_cpts() {

	/**
	 * Post Type: oferty.
	 */

	$labels = [
		"name" => __( "oferty", "custom-post-type-ui" ),
		"singular_name" => __( "oferta", "custom-post-type-ui" ),
		"menu_name" => __( "Oferty", "custom-post-type-ui" ),
		"all_items" => __( "Wszystkie oferty", "custom-post-type-ui" ),
		"add_new" => __( "Dodaj nową", "custom-post-type-ui" ),
		"add_new_item" => __( "Dodaj nową ofertę", "custom-post-type-ui" ),
		"edit_item" => __( "Edytuj ofertę", "custom-post-type-ui" ),
		"new_item" => __( "Nowa oferta", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "oferty", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "oferty", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-list-view",
		"supports" => [ "title", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "oferty", $args );

	/**
	 * Post Type: realizacje.
	 */

	$labels = [
		"name" => __( "realizacje", "custom-post-type-ui" ),
		"singular_name" => __( "realizacja", "custom-post-type-ui" ),
		"menu_name" => __( "Realizacje", "custom-post-type-ui" ),
		"all_items" => __( "Wszystkie realizacje", "custom-post-type-ui" ),
		"add_new" => __( "Dodaj nową", "custom-post-type-ui" ),
		"add_new_item" => __( "Dodaj nową realizację", "custom-post-type-ui" ),
		"edit_item" => __( "Edytuj realizację", "custom-post-type-ui" ),
		"new_item" => __( "Nowa realizacja", "custom-post-type-ui" ),
		"view_item" => __( "Zobacz realizację", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "realizacje", "custom-post-type-ui" ),
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
		"rewrite" => [ "slug" => "realizacje", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-hammer",
		"supports" => [ "title", "thumbnail" ],
		"taxonomies" => [ "kategorie_realizacji", "tagi_realizacji" ],
		"show_in_graphql" => false,
	];

	register_post_type( "realizacje", $args );

	/**
	 * Post Type: kariera.
	 */

	$labels = [
		"name" => __( "kariera", "custom-post-type-ui" ),
		"singular_name" => __( "kariera", "custom-post-type-ui" ),
		"menu_name" => __( "Kariera", "custom-post-type-ui" ),
		"all_items" => __( "Wszystkie kariery", "custom-post-type-ui" ),
		"add_new" => __( "Dodaj nową", "custom-post-type-ui" ),
		"add_new_item" => __( "Dodaj nową karierę", "custom-post-type-ui" ),
		"edit_item" => __( "Edytuj karierę", "custom-post-type-ui" ),
		"new_item" => __( "Nowa kariera", "custom-post-type-ui" ),
		"view_item" => __( "Zobacz kariery", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "kariera", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "kariera", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-admin-users",
		"supports" => [ "title", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "kariera", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );


function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Kategorie realizacji.
	 */

	$labels = [
		"name" => __( "Kategorie realizacji", "custom-post-type-ui" ),
		"singular_name" => __( "Kategoria realizacji", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "Kategorie realizacji", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'kategorie_realizacji', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "kategorie_realizacji",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "kategorie_realizacji", [ "realizacje" ], $args );

	/**
	 * Taxonomy: Tagi realizacji.
	 */

	$labels = [
		"name" => __( "Tagi realizacji", "custom-post-type-ui" ),
		"singular_name" => __( "Tag realizacji", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "Tagi realizacji", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'tagi_realizacji', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "tagi_realizacji",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "tagi_realizacji", [ "realizacje" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );

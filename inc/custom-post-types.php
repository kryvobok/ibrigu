<?php
/*
	=====================
		Custom Post Types
	=====================	
*/



function cptui_register_my_cpts_testimonial() {

	/**
	 * Post Type: Testimonials.
	 */

	$labels = [
		"name" => __( "Testimonials", "'ikon'" ),
		"singular_name" => __( "Testimonial", "'ikon'" ),
	];

	$args = [
		"label" => __( "Testimonials", "'ikon'" ),
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
		"rewrite" => [ "slug" => "testimonial", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-format-chat",
		"supports" => [ "title" ],
		"show_in_graphql" => false,
	];

	register_post_type( "testimonial", $args );
}

add_action( 'init', 'cptui_register_my_cpts_testimonial' );
add_action( 'init', 'register_post_types' );
function register_post_types(){
	register_post_type( 'collections', [
		'label'  => null,
		'labels' => [
			'name'               => 'Collections', // основное название для типа записи
			'singular_name'      => 'Collection', // название для одной записи этого типа
			'add_new'            => 'Add Collection', // для добавления новой записи
			'add_new_item'       => 'Collection adding', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Collection editing', // для редактирования типа записи
			'new_item'           => 'New  Collection', // текст новой записи
			'view_item'          => 'Collection', // для просмотра записи этого типа.
			'search_items'       => 'Search Collection', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Collections', // название меню
		],
		'description'         => '',
		'public'              => true,
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}
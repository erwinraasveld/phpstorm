<?php
/* ---------------------------------------- *\
 * Custom post type
\* ---------------------------------------- */
function register_accessoires() {
	$prefix = 'ylt_';
	/* ---------------------------------------- *\
	 * Producten
	\* ---------------------------------------- */
	register_post_type( 'accessoire', array(
			'label'               => __( 'Losse elementen', 'ylt-dev' ),
			'labels'              => array(
				'name'               => __( 'Losse elementen', 'ylt-dev' ),
				'singular_name'      => __( 'Losse elementen', 'ylt-dev' ),
				'add_new'            => __( 'Element toevoegen', 'ylt-dev' ),
				'add_new_item'       => __( 'Nieuw element', 'ylt-dev' ),
				'edit_item'          => __( 'Bewerk element', 'ylt-dev' ),
				'new_item'           => __( 'Nieuw element', 'ylt-dev' ),
				'all_items'          => __( 'Alle losse elementen', 'ylt-dev' ),
				'view_item'          => __( 'Element weergeven', 'ylt-dev' ),
				'search_items'       => __( 'Zoek element', 'ylt-dev' ),
				'not_found'          => __( 'Geen elementen gevonden', 'ylt-dev' ),
				'not_found_in_trash' => __( 'Geen elementen gevonden in de prullenbak', 'ylt-dev' ),
			),
			'public'              => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'can_export'          => true,
			'show_ui'             => true,
			'show_in_nav_menus'   => true,
			'show_in_menu'        => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 50,
			'menu_icon'           => 'dashicons-admin-post',
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'taxonomies'          => array(),
			'has_archive'         => false,
			'supports'            => array(
				'title',
				'editor',
				'revisions',
				'thumbnail',
				//'excerpt',
				//'author',
				//'comments',
				//'trackbacks',
				//'custom-fields',
				//'page-attributes',
				//'post-formats',
			),
			'rewrite'             => array(
				'slug'       => 'losse-elementen',
				//'with_front' => false,
			),
			'show_in_rest'        => false,
		) );
	// Accessoire categories
	$labels = array(
		'name'              => __( 'Categorieën', 'ylt-dev' ),
		'singular_name'     => __( 'Categorie', 'ylt-dev' ),
		'search_items'      => __( 'Search categories', 'ylt-dev' ),
		'all_items'         => __( 'All categories', 'ylt-dev' ),
		'parent_item'       => __( 'Parent category', 'ylt-dev' ),
		'parent_item_colon' => __( 'Parent category:', 'ylt-dev' ),
		'edit_item'         => __( 'Edit category', 'ylt-dev' ),
		'update_item'       => __( 'Update category', 'ylt-dev' ),
		'add_new_item'      => __( 'Add New category', 'ylt-dev' ),
		'new_item_name'     => __( 'New category Name', 'ylt-dev' ),
		'menu_name'         => __( 'Categories', 'ylt-dev' ),
	);
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		//'public'            => false,
		'query_var'         => true,
//        'rewrite'           => array
//        (
//            'slug'       => 'accessoires',
//            'with_front' => false,
//        ),
		'rewrite'           => false
	);
	register_taxonomy( 'accessoire_categorie', array( 'accessoire' ), $args );
}

add_action( 'init', 'register_accessoires' );
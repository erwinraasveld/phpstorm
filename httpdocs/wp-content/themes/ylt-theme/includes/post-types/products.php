<?php





/* ---------------------------------------- *\
 * Custom post type
\* ---------------------------------------- */

function register_products ()
{
    $prefix = 'ylt_';





    /* ---------------------------------------- *\
     * Producten
    \* ---------------------------------------- */

    register_post_type('product_posts', array
        (
            'label' => __('Producten', 'ylt-dev'),
            'labels' => array
            (
                'name'                  => __('Producten', 'ylt-dev'),
                'singular_name'         => __('Product', 'ylt-dev'),
                'add_new'               => __('Product toevoegen', 'ylt-dev'),
                'add_new_item'          => __('Nieuw product', 'ylt-dev'),
                'edit_item'             => __('Bewerk product', 'ylt-dev'),
                'new_item'              => __('Nieuw product', 'ylt-dev'),
                'all_items'             => __('Alle producten', 'ylt-dev'),
                'view_item'             => __('Product weergeven', 'ylt-dev'),
                'search_items'          => __('Zoek producten', 'ylt-dev'),
                'not_found'             => __('Geen producten gevonden', 'ylt-dev'),
                'not_found_in_trash'    => __('Geen producten gevonden in de prullenbak', 'ylt-dev'),
            ),
            'public'                => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'can_export'            => true,
            'show_ui'               => true,
            'show_in_nav_menus'     => true,
            'show_in_menu'          => true,
            'show_in_admin_bar'     => true,
            'menu_position'         => 50,
            'menu_icon'             => 'dashicons-admin-post',
            'capability_type'       => 'post',
            'hierarchical'          => false,
            'taxonomies'            => array(),
            'has_archive'           => true,
            'supports'              => array
            (
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
            'rewrite'           => array
            (
                //'slug'       => 'product',
                //'with_front' => false,
            ),
            'show_in_rest'      => false,
        )
    );





    // Product categories
    $labels = array
    (
        'name'              => __( 'Categories', 'ylt-dev' ),
		'singular_name'     => __( 'Category', 'ylt-dev' ),
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

    $args = array
    (
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
        'rewrite'           => array
        (
            'slug'       => 'products',
            'with_front' => false,
        ),
	);

	register_taxonomy( 'product_category', array( 'product_posts' ), $args );
}
add_action('init','register_products');





/* ---------------------------------------- *\
 * Require init
\* ---------------------------------------- */

if ( file_exists( dirname( __FILE__ ) . '/../vendor/cmb2/init.php' ) )
{
	require_once dirname( __FILE__ ) . '/../vendor/cmb2/init.php';
}
elseif ( file_exists( dirname( __FILE__ ) . '/../vendor/CMB2/init.php' ) )
{
	require_once dirname( __FILE__ ) . '/../vendor/CMB2/init.php';
}





/* ---------------------------------------- *\
 * Custom meta boxes
\* ---------------------------------------- */

function register_product_meta ()
{
	$prefix = 'ylt_';

    $cmb_products = new_cmb2_box
    (
        array
        (
            'id'            => $prefix . 'products',
            'title'         => __( 'CMB template', 'ylt-dev' ),
            'object_types'  => array( 'product_posts', ), // Post type
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true, // Show field names on the left
        )
    );



    /* Fields */

    $cmb_products->add_field
    (
        array
        (
            'name'  => __( 'Test', 'ylt-dev' ),
            'id'    => $prefix . 'test',
            'type'  => 'text',
            'desc'  => 'CMB2 test field',
        )
    );
}
add_action( 'cmb2_admin_init', 'register_product_meta' );

<?

/*
	This is the taxonomy build, ready for copy pasting.
	Find and replace the word "sample" to your label.
*/

add_action( 'init', 'sample_taxonomy_options' );
function sample_taxonomy_options() {

	$name				= 		'sample';
	$post_type 			= 		'sample_posts';

	//=============== Register custom post type - VOORBEELD ================

	register_post_type( $post_type, 	// This will be the postype!
		array( 'label' 					=> __('Posttype'),
		       'labels' 					=> array( 'name' 				=> __('Posttype'),
		                                             'singular_name' 		=> __('Posttype'),
		                                             'add_new'				=> __('Bericht toevoegen'),
		                                             'add_new_item' 		=> __('Nieuw bericht'),
		                                             'edit_item' 			=> __('Wijzig bericht'),
		                                             'new_item' 			=> __('Nieuw bericht'),
		                                             'all_items'			=> __('Alle berichten'),
		                                             'view_item' 			=> __('Bekijk berichten'),
		                                             'search_items'		=> __('Zoek berichten'),
		                                             'not_found'		 	=> __('Er zijn geen berichten gevonden'),
		                                             'not_found_in_trash'	=> __('Geen berichten gevonden in de prullenbak')
		       ),
		       'public' 					=> true,
		       'can_export'				=> true,
		       'show_ui' 				=> true,
		       '_builtin' 				=> false,
		       '_edit_link' 				=> 'post.php?post=%d',
		       'capability_type' 		=> 'post',
			//'menu_icon' 			=> get_bloginfo('template_url').'/images/favicon.ico',
			   'hierarchical' 			=> true,
			   'has_archive'				=> true,
			   'rewrite' 				=> array( 	"slug" => "sample"		),	// Permalinks
			   'supports' 				=> array(	'title',
				   'editor',
				   // 'excerpt',
				   // 'thumbnail',
				   // 'author',
				   // 'comments',
				   // 'trackbacks',
				   // 'custom-fields',
				   'revisions'
			   ),
			   'show_in_menu' 			=> true,
			   'taxonomies'				=> array(	'samplecat',
				   'sampletag'
			   )
		)
	);

	//=============== Register custom taxonomy - TAGS ================

	register_taxonomy(	"sampletag",
		array(	$post_type	),		// Change this to the postype
		array(	"hierarchical" 		=> false,
		          "label" 			=> "Tags",
		          'labels' 			=> array(	'name' 				=> __('Tags'),
		                                           'singular_name' 	=> __('Tags'),
		                                           'search_items' 		=> __('Tags zoeken'),
		                                           'popular_items' 	=> __('Populaire Tags'),
		                                           'all_items' 		=> __('Alle Tags'),
		                                           'parent_item' 		=> __('Huidige Tags'),
		                                           'parent_item_colon' => __('Huidige Tags:'),
		                                           'edit_item' 		=> __('Wijzig Tags'),
		                                           'update_item'		=> __('Update Tags'),
		                                           'add_new_item' 		=> __('Nieuwe Tag toevoegen'),
		                                           'new_item_name' 	=> __('Nieuwe Tag')
		          ),
		          'public' 			=> true,
		          'show_ui' 			=> true,
		          "rewrite" 			=> true
		)
	);


	//=============== Register custom taxonomy - CATEGORY ================

	register_taxonomy(	"samplecat",
		array(	$post_type	), 		// Change this to the postype
		array(	"hierarchical" 		=> true,
		          "label" 			=> "Categorieën",
		          'labels' 			=> array(	'name' 				=> __('Categorieën'),
		                                           'singular_name' 	=> __('Categorie'),
		                                           'search_items' 		=> __('Categorieën zoeken'),
		                                           'popular_items' 	=> __('Populaire categorieën'),
		                                           'all_items' 		=> __('Alle categorieën'),
		                                           'parent_item' 		=> __('Huidige categorie'),
		                                           'parent_item_colon' => __('Huidige categorie:'),
		                                           'edit_item' 		=> __('Wijzig categorie'),
		                                           'update_item'		=> __('Wijzig categorie'),
		                                           'add_new_item' 		=> __('Nieuwe categorie toevoegen'),
		                                           'new_item_name' 	=> __('Nieuwe categorie')
		          ),
		          'public' 			=> true,
		          'show_ui' 			=> true,
		          'with_front'		=> false,
		          "rewrite" 			=> true
		)
	);

} // End custom taxonomy config

//=============== Register custom post type - Columns ================
add_filter( 'manage_edit-sample_posts_columns','sample_custom_columns', 10, 1 );
function sample_custom_columns( $columns ) {

	// $columns['column_image'] = 'Uitgelichte afbeelding';
	$columns['column_customfield_image'] = 'Uitgelichte afbeelding';
	$columns['cb'] = "<input type=\"checkbox\" />";
	$columns['title'] = "Titel";
	$columns['date'] = "Datum";
	// $columns['column_customfield_text'] = "Customfield field";
	$columns['column_posttype_category'] = "Categorie";


	// unset($columns['author']);
	// unset($columns['date']);
	// unset($columns['tags']);
	// unset($columns['categories']);
	// unset($columns['tags']);
	// unset($columns['comments']);

	return $columns;
}

//function get_featured_image($post_ID) {
//$post_thumbnail_id = get_post_thumbnail_id($post_ID);
//if ($post_thumbnail_id) {
//$post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'admin-category-image');
//return $post_thumbnail_img[0];
//}
//}

add_action( 'manage_sample_posts_posts_custom_column','sample_custom_columns_content', 10, 2);
function sample_custom_columns_content($column, $post_id) {

	global $post;

	switch( $column ) {

		/* Customfield */
		case 'column_customfield_text' :

			$customfield = get_post_meta( $post_id, 'test_text', true );
			if( get_post_meta($post->ID, 'test_text', true) != '' ) {
				echo get_post_meta($post->ID, 'test_text', true );
			} else {
				echo __( 'Niet ingesteld' );
			}
			break;

		/* Customfield image */
		case 'column_customfield_image' :

			$thumb_id = get_image_id_by_url( get_post_meta($post->ID, 'highlighted_image', true ) );
			$thumb_url = wp_get_attachment_image_src($thumb_id,'admin-category-image', true);

			if( get_post_meta($post->ID, 'highlighted_image', true) != '' ) {
				echo '<img style="-webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; padding:5px; background:#fff; border:1px solid #EEE;"" src="'. $thumb_url[0] .'">';
			} else {
				_e( 'Geen afbeelding' );
			}
			break;

		/* Image */
		//case 'column_image' :

		//	$post_featured_image = get_featured_image($post_ID);
		//	if ($post_featured_image) {
		//		echo '<img style="-webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; padding:5px; background:#fff; border:1px solid #EEE;"" src="' . $post_featured_image . '">';
		//	} else {
		//		_e( 'Geen afbeelding' );
		//	}
		//	break;

		/* Posttype category */
		case 'column_posttype_category' :

			$terms = get_the_terms( $post_id, 'samplecat' );
			if ( !empty( $terms ) ) {
				$out = array();
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'samplecat' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'samplecat', 'display' ) )
					);
				}
				echo join( ', ', $out );
			} else {
				_e( 'Geen categorie' );
			}
			break;

		/* Just break out of the switch statement for everything else. */
		default :
			break;

	}

}

//=============== Register custom metaboxes ================
add_filter( 'cmb2_meta_boxes', 'sample_meta_boxes' );
function sample_meta_boxes( array $meta_boxes ) {

	$prefix = '';

	$meta_boxes['sample_excerpt'] = array(
		'id'            => 'sample_excerpt',
		'title'         => __( 'Samenvatting', 'cmb2' ),
		'object_types'  => array( 'sample_posts', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => false, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'        => array(
			array(
				'name'    => __( '', 'cmb2' ),
				'id'      => $prefix . 'excerpt',
				'type'    => 'wysiwyg',
			),
		),
	);

	$meta_boxes['sample_thumbnail'] = array(
		'id'            => 'sample_thumbnail',
		'title'         => __( 'Uitgelichte afbeelding', 'cmb2' ),
		'object_types'  => array( 'sample_posts', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => false, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'        => array(
			array(
				'name'    => __( '', 'cmb2' ),
				'id'      => $prefix . 'highlighted_image',
				'type'    => 'file',
			),
		),
	);

	$meta_boxes['sample_metabox'] = array(
		'id'            => 'sample_metabox',
		'title'         => __( 'Extra instellingen', 'cmb2' ),
		'object_types'  => array( 'sample_posts', ), // Post type
		'context'       => 'normal',
		'priority'      => 'low',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'        => array(
			array(
				'name'       => __( 'Test Text', 'cmb2' ),
				'desc'       => __( 'field description (optional)', 'cmb2' ),
				'id'         => $prefix . 'test_text',
				'type'       => 'text',
				'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
				// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
				// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
				// 'on_front'        => false, // Optionally designate a field to wp-admin only
				// 'repeatable'      => true,
			),
			array(
				'name' => __( 'Test Text Small', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'test_textsmall',
				'type' => 'text_small',
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'Test Text Medium', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'test_textmedium',
				'type' => 'text_medium',
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'Website URL', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'url',
				'type' => 'text_url',
				// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'Test Text Email', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'email',
				'type' => 'text_email',
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'Test Time', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'test_time',
				'type' => 'text_time',
			),
			array(
				'name' => __( 'Time zone', 'cmb2' ),
				'desc' => __( 'Time zone', 'cmb2' ),
				'id'   => $prefix . 'timezone',
				'type' => 'select_timezone',
			),
			array(
				'name' => __( 'Test Date Picker', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'test_textdate',
				'type' => 'text_date',
			),
			array(
				'name' => __( 'Test Date Picker (UNIX timestamp)', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'test_textdate_timestamp',
				'type' => 'text_date_timestamp',
				// 'timezone_meta_key' => $prefix . 'timezone', // Optionally make this field honor the timezone selected in the select_timezone specified above
			),
			array(
				'name' => __( 'Test Date/Time Picker Combo (UNIX timestamp)', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'test_datetime_timestamp',
				'type' => 'text_datetime_timestamp',
			),
			// This text_datetime_timestamp_timezone field type
			// is only compatible with PHP versions 5.3 or above.
			// Feel free to uncomment and use if your server meets the requirement
			// array(
			// 	'name' => __( 'Test Date/Time Picker/Time zone Combo (serialized DateTime object)', 'cmb2' ),
			// 	'desc' => __( 'field description (optional)', 'cmb2' ),
			// 	'id'   => $prefix . 'test_datetime_timestamp_timezone',
			// 	'type' => 'text_datetime_timestamp_timezone',
			// ),
			array(
				'name' => __( 'Test Money', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'test_textmoney',
				'type' => 'text_money',
				// 'before_field' => '£', // override '$' symbol if needed
				// 'repeatable' => true,
			),
			array(
				'name'    => __( 'Test Color Picker', 'cmb2' ),
				'desc'    => __( 'field description (optional)', 'cmb2' ),
				'id'      => $prefix . 'test_colorpicker',
				'type'    => 'colorpicker',
				'default' => '#ffffff'
			),
			array(
				'name' => __( 'Test Text Area', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'test_textarea',
				'type' => 'textarea',
			),
			array(
				'name' => __( 'Test Text Area Small', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'test_textareasmall',
				'type' => 'textarea_small',
			),
			array(
				'name' => __( 'Test Text Area for Code', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'test_textarea_code',
				'type' => 'textarea_code',
			),
			array(
				'name' => __( 'Test Title Weeeee', 'cmb2' ),
				'desc' => __( 'This is a title description', 'cmb2' ),
				'id'   => $prefix . 'test_title',
				'type' => 'title',
			),
			array(
				'name'    => __( 'Test Select', 'cmb2' ),
				'desc'    => __( 'field description (optional)', 'cmb2' ),
				'id'      => $prefix . 'test_select',
				'type'    => 'select',
				'options' => array(
					'standard' => __( 'Option One', 'cmb2' ),
					'custom'   => __( 'Option Two', 'cmb2' ),
					'none'     => __( 'Option Three', 'cmb2' ),
				),
			),
			array(
				'name'    => __( 'Test Radio inline', 'cmb2' ),
				'desc'    => __( 'field description (optional)', 'cmb2' ),
				'id'      => $prefix . 'test_radio_inline',
				'type'    => 'radio_inline',
				'options' => array(
					'standard' => __( 'Option One', 'cmb2' ),
					'custom'   => __( 'Option Two', 'cmb2' ),
					'none'     => __( 'Option Three', 'cmb2' ),
				),
			),
			array(
				'name'    => __( 'Test Radio', 'cmb2' ),
				'desc'    => __( 'field description (optional)', 'cmb2' ),
				'id'      => $prefix . 'test_radio',
				'type'    => 'radio',
				'options' => array(
					'option1' => __( 'Option One', 'cmb2' ),
					'option2' => __( 'Option Two', 'cmb2' ),
					'option3' => __( 'Option Three', 'cmb2' ),
				),
			),
			array(
				'name'     => __( 'Test Taxonomy Radio', 'cmb2' ),
				'desc'     => __( 'field description (optional)', 'cmb2' ),
				'id'       => $prefix . 'text_taxonomy_radio',
				'type'     => 'taxonomy_radio',
				'taxonomy' => 'category', // Taxonomy Slug
				// 'inline'  => true, // Toggles display to inline
			),
			array(
				'name'     => __( 'Test Taxonomy Select', 'cmb2' ),
				'desc'     => __( 'field description (optional)', 'cmb2' ),
				'id'       => $prefix . 'text_taxonomy_select',
				'type'     => 'taxonomy_select',
				'taxonomy' => 'category', // Taxonomy Slug
			),
			array(
				'name'     => __( 'Test Taxonomy Multi Checkbox', 'cmb2' ),
				'desc'     => __( 'field description (optional)', 'cmb2' ),
				'id'       => $prefix . 'test_multitaxonomy',
				'type'     => 'taxonomy_multicheck',
				'taxonomy' => 'post_tag', // Taxonomy Slug
				// 'inline'  => true, // Toggles display to inline
			),
			array(
				'name' => __( 'Test Checkbox', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'test_checkbox',
				'type' => 'checkbox',
			),
			array(
				'name'    => __( 'Test Multi Checkbox', 'cmb2' ),
				'desc'    => __( 'field description (optional)', 'cmb2' ),
				'id'      => $prefix . 'test_multicheckbox',
				'type'    => 'multicheck',
				'options' => array(
					'check1' => __( 'Check One', 'cmb2' ),
					'check2' => __( 'Check Two', 'cmb2' ),
					'check3' => __( 'Check Three', 'cmb2' ),
				),
				// 'inline'  => true, // Toggles display to inline
			),
			array(
				'name'    => __( 'Test wysiwyg', 'cmb2' ),
				'desc'    => __( 'field description (optional)', 'cmb2' ),
				'id'      => $prefix . 'test_wysiwyg',
				'type'    => 'wysiwyg',
				'options' => array( 'textarea_rows' => 5, ),
			),
			array(
				'name' => __( 'Test Image', 'cmb2' ),
				'desc' => __( 'Upload an image or enter a URL.', 'cmb2' ),
				'id'   => $prefix . 'test_image',
				'type' => 'file',
			),
			array(
				'name'         => __( 'Multiple Files', 'cmb2' ),
				'desc'         => __( 'Upload or add multiple images/attachments.', 'cmb2' ),
				'id'           => $prefix . 'test_file_list',
				'type'         => 'file_list',
				'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
			),
			array(
				'name' => __( 'oEmbed', 'cmb2' ),
				'desc' => __( 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'cmb2' ),
				'id'   => $prefix . 'test_embed',
				'type' => 'oembed',
			),
		),
	);

	return $meta_boxes;
}
?>
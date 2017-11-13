<?php





/* ---------------------------------------- *\
 * Add tinyMCE button
\* ---------------------------------------- */

function myplugin_tinymce_buttons($buttons)
{
      //Add style selector to the beginning of the toolbar
      array_unshift($buttons, 'styleselect');

      return $buttons;
}
add_filter('mce_buttons_2','myplugin_tinymce_buttons');





/* ---------------------------------------- *\
 * Add styles
\* ---------------------------------------- */

function my_mce_before_init_insert_formats( $init_array )
{
    // Define the style_formats array

    $style_formats = array
    (  
		// Each array child is a format with it's own settings
        array
        (
			'title'     => 'Button',
			'selector'  => 'a',
			'classes'   => 'button',
		),
	);
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );
	
	return $init_array;
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );





/* ---------------------------------------- *\
 * Add editor stylesheet
\* ---------------------------------------- */

add_editor_style(TEMPLATE_URL. '/assets/css/admin.css' );

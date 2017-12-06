<?php
/* ---------------------------------------- *\
 * Front page
\* ---------------------------------------- */

function register_accessoire_meta ()
{
    $prefix = 'ylt_accessoire_';

    $cmb_accessoire = new_cmb2_box
    (
        array
        (
            'id'            => $prefix . 'box',
            'title'         => __( 'Accessoire informatie', 'ylt-dev' ),
            'object_types'  => array( 'accessoire', ), // Post type
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true, // Show field names on the left
        )
    );



    /* Fields */

	$cmb_accessoire->add_field
	(
		array
		(
			'name'  => __( 'Prijs', 'ylt-dev' ),
			'id'    => $prefix . 'prijs',
			'type'  => 'text',
			'desc'  => 'Prijs zonder euro teken',
		)
	);
	$cmb_accessoire->add_field
	(
		array
		(
			'name'  => __( 'Ondertitel', 'ylt-dev' ),
			'id'    => $prefix . 'ondertitel',
			'type'  => 'text',
			'desc'  => 'Tekst onder de titel',
		)
	);
}
add_action( 'cmb2_admin_init', 'register_accessoire_meta' );
<?php
/* ---------------------------------------- *\
 * Front page
\* ---------------------------------------- */

function register_front_page ()
{
    $prefix = 'ylt_';

    $cmb_front_page = new_cmb2_box
    (
        array
        (
            'id'            => $prefix . 'front_page',
            'title'         => __( 'CMB template', 'ylt-dev' ),
            'object_types'  => array( 'page', ), // Post type
            'context'       => 'normal',
            'priority'      => 'high',
            'show_on'       => array( 'key' => 'id', 'value' => array( get_option('page_on_front') ) ),
            'show_names'    => true, // Show field names on the left
        )
    );



    /* Fields */

    $cmb_front_page->add_field
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
add_action( 'cmb2_admin_init', 'register_front_page' );
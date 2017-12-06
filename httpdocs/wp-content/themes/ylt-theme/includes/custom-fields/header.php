<?php
/* ---------------------------------------- *\
 * Front page
\* ---------------------------------------- */

function register_header ()
{
	$prefix = 'ylt_header_';

	$header = new_cmb2_box
	(
		array
		(
			'id'            => $prefix . 'box',
			'title'         => __( 'Header', 'ylt-dev' ),
			'object_types'  => array( 'page', ), // Post type
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true, // Show field names on the left
		)
	);



	/* Fields */

	$titel = $header->add_field
	(
		array
		(
			'name'  => __( 'Titel', 'ylt-dev' ),
			'id'    => $prefix . 'titel',
			'type'  => 'text',
		)
	);
	$oTitel = $header->add_field
	(
		array
		(
			'name'  => __( 'Ondertitel', 'ylt-dev' ),
			'id'    => $prefix . 'oTitel',
			'type'  => 'text',
		)
	);
	$afbeeldingCheckbox = $header->add_field( array(
		'name' => 'Achtergrond afbeelding',
		'id'   => $prefix . 'afbeelding_checkbox',
		'type' => 'checkbox',
	) );
	$knopCheckbox = $header->add_field( array(
		'name' => 'Knop',
		'id'   => $prefix . 'knop_checkbox',
		'type' => 'checkbox',
	) );
	$afbeelding = $header->add_field( array(
		'name' => 'Afbeelding',
		'desc' => '',
		'id'   => $prefix.'afbeelding',
		'type' => 'file_list',
		// 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
		// 'query_args' => array( 'type' => 'image' ), // Only images attachment
		// Optional, override default text strings
		'text' => array(
			'add_upload_files_text' => 'Replacement', // default: "Add or Upload Files"
			'remove_image_text' => 'Replacement', // default: "Remove Image"
			'file_text' => 'Replacement', // default: "File:"
			'file_download_text' => 'Replacement', // default: "Download"
			'remove_text' => 'Replacement', // default: "Remove"
		),
		'attributes' => array(
			'data-conditional-id' => $prefix . 'afbeelding_checkbox',
		),
	) );
	$knopTekst = $header->add_field(array
	(
		'name'  => __( 'Knop tekst', 'ylt-dev' ),
		'id'    => $prefix . 'knop_tekst',
		'type'  => 'text',
		'attributes' => array(
			'data-conditional-id' => $prefix . 'knop_checkbox',
		),
	));
	$knopLink = $header->add_field(array
	(
		'name'  => __( 'Knop link', 'ylt-dev' ),
		'id'    => $prefix . 'knop_link',
		'type'  => 'text',
		'attributes' => array(
			'data-conditional-id' => $prefix . 'knop_checkbox',
		),
	));
	$cmb2Grid	 = new \Cmb2Grid\Grid\Cmb2Grid($header);
	$row		 = $cmb2Grid->addRow();
	$row->addColumns( array(
		array( $titel, 'class' => 'col-md-12' ),
		array( $oTitel, 'class' => 'col-md-12' ),
		array( $afbeeldingCheckbox, 'class' => 'col-md-6' ),
		array( $knopCheckbox, 'class' => 'col-md-6' ),
		array( $afbeelding, 'class' => 'col-md-12' ),
		array( $knopTekst, 'class' => 'col-md-6' ),
		array( $knopLink, 'class' => 'col-md-6' ),
	));


}
add_action( 'cmb2_admin_init', 'register_header' );
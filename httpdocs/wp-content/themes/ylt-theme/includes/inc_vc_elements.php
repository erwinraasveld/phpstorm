<?php
// Before VC Init
add_action( 'vc_before_init', 'vc_before_init_actions' );


function vc_before_init_actions() {

	// Link your VC elements's folder
	if( function_exists('vc_set_shortcodes_templates_dir') ){

		vc_set_shortcodes_templates_dir( get_template_directory() . '/includes/vendor/visual-composer/elements' );

	}

	// Require new custom Element
	require_once 'vendor/visual-composer/titel.php';


}

add_action( 'vc_after_init', 'vc_after_init_actions' );

function vc_after_init_actions() {
	if( function_exists('vc_remove_param') ){
		vc_remove_param( 'vc_btn', 'style' );
		vc_remove_param( 'vc_btn', 'shape' );
		vc_remove_param( 'vc_btn', 'size' );
		vc_remove_param( 'vc_btn', 'color' );
		vc_remove_param( 'vc_btn', 'gradient_color_1' );
		vc_remove_param( 'vc_btn', 'gradient_custom_color_1' );
		vc_remove_param( 'vc_btn', 'gradient_custom_color_2' );
		vc_remove_param( 'vc_btn', 'custom_background' );
		vc_remove_param( 'vc_btn', 'gradient_color_2' );
		vc_remove_param( 'vc_btn', 'gradient_text_color' );
		vc_remove_param( 'vc_btn', 'custom_text' );
		vc_remove_param( 'vc_btn', 'add_icon' );
		vc_remove_param( 'vc_btn', 'i_align' );
		vc_remove_param( 'vc_btn', 'i_type' );
		vc_remove_param( 'vc_btn', 'i_icon_fontawesome' );
		vc_remove_param( 'vc_btn', 'i_icon_openiconic' );
		vc_remove_param( 'vc_btn', 'i_icon_entypo' );
		vc_remove_param( 'vc_btn', 'i_icon_linecons' );
		vc_remove_param( 'vc_btn', 'i_icon_monosocial' );
		vc_remove_param( 'vc_btn', 'i_icon_material' );
		vc_remove_param( 'vc_btn', 'i_icon_pixelicons' );
		vc_remove_param( 'vc_btn', 'i_icon_typicons' );
		vc_remove_param( 'vc_btn', 'outline_custom_hover_background' );
		vc_remove_param( 'vc_btn', 'outline_custom_hover_text' );
		vc_remove_param( 'vc_btn', 'outline_custom_color' );
		vc_remove_param( 'vc_btn', 'el_id' );
		vc_remove_param( 'vc_btn', 'el_class' );
		vc_remove_param( 'vc_btn', 'custom_onclick' );
		vc_remove_param( 'vc_btn', 'custom_onclick_code' );

	}

	$vc_btn_new_params = array(

		// Example
		array(
			'type' => 'dropdown',
			'heading' => __( 'Color', 'js_composer' ),
			'param_name' => 'color',
			'description' => __( 'Select button color.', 'js_composer' ),
			// compatible with btn2, need to be converted from btn1
			'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => array(
				           // Btn1 Colors
				           __( 'Oranje', 'js_composer' ) => 'oranje',
				           __( 'Groen/blauw', 'js_composer' ) => 'blauw',
				           __( 'Transparant met stippellijn', 'js_composer' ) => 'blauw-stip'),
			'std' => 'grey',
		)
	);

	vc_add_params( 'vc_btn', $vc_btn_new_params );


}
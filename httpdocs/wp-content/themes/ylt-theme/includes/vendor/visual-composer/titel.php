<?php

class vcTitelMetRondje extends WPBakeryShortCode {

	function __construct() {
		add_action( 'init', array( $this, 'vc_titelmetrondje_mapping' ) );
		add_shortcode( 'vc_titelmetrondje', array( $this, 'vc_titelmetrondje_html' ) );
	}

	public function vc_titelmetrondje_mapping() {

		if ( ! defined( 'WPB_VC_VERSION' ) ) {
			return;
		}

		vc_map( array(
			'name'     => __( 'Titel met rondje', 'ylt-dev' ),
			'base'     => 'vc_titelmetrondje',
			'category' => __( 'Stipstap', 'ylt-dev' ),
			'icon'     => get_template_directory_uri() . '/assets/img/rondje.svg',
			'params'   => array(
				array(
					'type'        => 'textarea_html',
					'class'       => 'titel-rondje',
					'heading'     => __( 'Titel', 'ylt-dev' ),
					'param_name'  => 'content',
					'value'       => __( '<h2 class="titel-rondje" style="text-align: center;"><span style="color: #5db1bf;">Dit is mijn titel</span></h2>', 'ylt-dev' ),
					'admin_label' => true,
					'weight'      => 0,
				),
			)
		) );
	}

	public function vc_titelmetrondje_html( $atts, $content = null ) {
		//extract( shortcode_atts( array( 'content' => ''), $atts ) );
		return $content;
	}
}

new vcTitelMetRondje();



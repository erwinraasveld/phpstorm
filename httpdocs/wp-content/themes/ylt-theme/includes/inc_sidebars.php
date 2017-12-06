<?php


/* ---------------------------------------- *\
 * Register sidebars
\* ---------------------------------------- */

function ylt_widgets_init ()
{
	$max = 5;
	for ($i=1;$i <= $max;$i++){
		register_sidebar(array(
			'name' => "Footer blok $i",
			'id' => "footer-blok-$i",
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		));
	}
//    register_sidebar
//    (
//        array
//        (
//            'name'          => __( 'Footer blok 1', 'ylt-dev' ),
//            'id'            => 'footer-blok-1',
////            'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'ylt-dev' ),
//        )
//    );
}
add_action( 'widgets_init', 'ylt_widgets_init' );

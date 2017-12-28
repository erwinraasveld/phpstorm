<?php




function load_scripts ()
{
    wp_register_script( "ylt_script", TEMPLATE_URL.'/assets/js/script.min.js', array('jquery'), null, true );

    //wp_register_script( 'slidebars-js', TEMPLATE_URL.'/assets/js/vendor/slidebars/slidebars.js' , '', null, true );
    //wp_enqueue_script( 'slidebars-js' );

    // Add vars to script
    wp_localize_script( 'ylt_script', 'myAjax', array
    (
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    ));

    wp_localize_script( 'ylt_script', 'HOME_URL', HOME_URL);

    wp_enqueue_script( 'ylt_script' );
}
add_action( 'wp_enqueue_scripts', 'load_scripts' );

?>

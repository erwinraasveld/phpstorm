<?php





/* ---------------------------------------- *\
 * Register menus
\* ---------------------------------------- */

function register_menus ()
{
    register_nav_menu('main-menu', __( 'Main menu', 'ylt-dev' ));
}

add_action( 'init', 'register_menus' );

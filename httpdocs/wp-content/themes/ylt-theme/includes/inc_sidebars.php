<?php





/* ---------------------------------------- *\
 * Register sidebars
\* ---------------------------------------- */

function ylt_widgets_init ()
{
    register_sidebar
    (
        array
        (
            'name'          => __( 'Main Sidebar', 'ylt-dev' ),
            'id'            => 'main-sidebar',
            'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'ylt-dev' ),
        )
    );
}
add_action( 'widgets_init', 'ylt_widgets_init' );

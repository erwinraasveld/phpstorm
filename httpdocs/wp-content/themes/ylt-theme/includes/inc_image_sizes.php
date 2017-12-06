<?php





/* ---------------------------------------- *\
 * Add thumbnail theme support
\* ---------------------------------------- */

//add_theme_support( 'post-thumbnails', array( 'post', 'product_posts', ) );





/* ---------------------------------------- *\
 * Add custom image sizes
\* ---------------------------------------- */

//add_image_size( 'small', 175, 175, false );


add_image_size( 'header-banner', 1800, 800, array('x_crop_position' => 'center','y_crop_position' => 'center') );

/* ---------------------------------------- *\
 * Change image size names
\* ---------------------------------------- */

function register_image_sizes ( $sizes )
{
    return array_merge
    (
        $sizes, array
        (
            'small' => __( 'Small', 'ylt-dev' ),
        )
    );
}
//add_filter( 'image_size_names_choose', 'register_image_sizes' );

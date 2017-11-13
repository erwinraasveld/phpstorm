<?php





/* ---------------------------------------- *\
 * Cleanup wordpress head
\* ---------------------------------------- */

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);





/* ---------------------------------------- *\
 * Remove wp version param from any
 * enqueued scripts
\* ---------------------------------------- */

function vc_remove_wp_ver_css_js( $src )
{
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );





/* ---------------------------------------- *\
 * Add Iconifier favicon
\* ---------------------------------------- */

function add_favicon ()
{
    ?>
    <link rel="shortcut icon" href="<?php echo TEMPLATE_URL; ?>/assets/img/favicon/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php echo TEMPLATE_URL; ?>/assets/img/favicon/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo TEMPLATE_URL; ?>/assets/img/favicon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo TEMPLATE_URL; ?>/assets/img/favicon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo TEMPLATE_URL; ?>/assets/img/favicon/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo TEMPLATE_URL; ?>/assets/img/favicon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo TEMPLATE_URL; ?>/assets/img/favicon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo TEMPLATE_URL; ?>/assets/img/favicon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo TEMPLATE_URL; ?>/assets/img/favicon/apple-touch-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo TEMPLATE_URL; ?>/assets/img/favicon/apple-touch-icon-180x180.png" />
    <?php
}
add_filter( 'wp_head', 'add_favicon' );





/* ---------------------------------------- *\
 * Add Open Graph protocol
\* ---------------------------------------- */

function add_open_graph ()
{
    global $post;
    ?>
    <meta property="og:title" content="<?php echo get_the_title($post->ID); ?>" />
    <meta property="og:url" content="<?php echo get_the_permalink($post->ID); ?>" />
    <?php if ( has_post_thumbnail($post->ID) ): ?>
    <meta property="og:image" content="<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>" />
    <?php endif;
}
add_filter( 'wp_head', 'add_open_graph' );

<?php





/* ---------------------------------------- *\
 * Add YLT footer text
\* ---------------------------------------- */

function ylt_admin_footer_text( $default_text )
{
    return '<span id="footer-thankyou">Website ontwikkeld door <a href="http://www.yellowlemontree.nl" target="_blank">Yellow Lemon Tree</a><span> | Mede mogelijk gemaakt door <a href="http://www.wordpress.org">WordPress</a>';

}
add_filter( 'admin_footer_text', 'ylt_admin_footer_text' );





/* ---------------------------------------- *\
 * File uploads lowercase
\* ---------------------------------------- */

function ylt_make_filename_lowercase ( $filename )
{
    $info = pathinfo($filename);
    $ext = empty($info['extension']) ? '' : '.' . $info['extension'];
    $name = basename($filename, $ext);

    return strtolower($name) . $ext;
}
add_filter('sanitize_file_name', 'ylt_make_filename_lowercase', 10);





/* ---------------------------------------- *\
 * Get image from url
\* ---------------------------------------- */

function get_image_id_from_url ( $image_url )
{
	global $wpdb;

    if ( !empty($image_url) )
    {
        $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
        return $attachment[0];
    }
}


add_action('admin_head', 'show_favicon');
function show_favicon() {
	echo '<link href="paste the entire URL of an image here" rel="icon" type="image/x-icon">';
	printf('<link href="%s" rel="icon" type="image/x-icon">',TEMPLATE_URL.'/assets/img/favicon/favicon.ico');
}
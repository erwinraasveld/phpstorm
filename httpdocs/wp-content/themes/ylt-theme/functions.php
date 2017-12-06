<?php





/* ---------------------------------------- *\
 * Global settings
\* ---------------------------------------- */

// Set user agent string to bypass no-user-agent-block in .htaccess
ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 6.0)');

/** Define mostly used function returns to tweak performance. Use these constants inside your theme **/
define('TEMPLATE_URL',get_template_directory_uri());
define('TEMPLATE_DIR',get_template_directory());
define('HOME_URL'    ,get_home_url());
define('SITE_NAME'   ,get_bloginfo('name'));

/** Disable Wordpress' automatic updater **/
add_filter( 'automatic_updater_disabled', '__return_true' );

/** Disable Wordpress' automatic core updates **/
add_filter( 'auto_update_core', '__return_false' );

/** Disable update emails **/
add_filter( 'auto_core_update_send_email', '__return_false' );

/** Hide admin bar **/
add_filter('show_admin_bar', '__return_false');

/** Set locale **/
setlocale(LC_ALL, 'nl_NL');





/* ---------------------------------------- *\
 * Includes
\* ---------------------------------------- */

/** Plugin activation **/
include_once 'includes/inc_plugin_activation.php';

/** Standaard settings **/
include_once 'includes/inc_misc_admin.php';

/** Security settings **/
include_once 'includes/inc_security.php';

/** Wordpress head cleanup **/
include_once 'includes/inc_head_cleanup.php';

/** Init menu's **/
include_once 'includes/inc_menus.php';

/** Settings page **/
//include_once 'includes/inc_options.php';

/** Image sizes **/
include_once 'includes/inc_image_sizes.php';

/** Custom post types **/
include_once 'includes/inc_post_types.php';

/** Custom fields **/
include_once 'includes/inc_custom_fields.php';

/** Custom meta boxes **/
include_once 'includes/inc_cmb2.php';

/** Editor styles **/
//include_once 'includes/inc_editor_styles.php';

/** Sidebars **/
include_once 'includes/inc_sidebars.php';

/** Add scripts **/
include_once 'includes/inc_assets.php';

/** Add visual composer elements **/
include_once 'includes/inc_vc_elements.php';

function simiestyle(){
	wp_enqueue_style('admincss',TEMPLATE_URL.'/assets/css/admin.min.css');
}
add_action('admin_enqueue_scripts','simiestyle');

<?php





/* ---------------------------------------- *\
 * Setup
\* ---------------------------------------- */

global $post;





/* ---------------------------------------- *\
 * Require init
\* ---------------------------------------- */

if ( file_exists( dirname( __FILE__ ) . '/vendor/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/vendor/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/CMB2/init.php';
}

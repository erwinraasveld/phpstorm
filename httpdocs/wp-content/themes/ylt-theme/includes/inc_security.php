<?php





/** Disable XMLRPC **/
add_filter('xmlrpc_enabled', '__return_false');

/** Disable login messages **/
add_filter('login_errors',create_function('$a', "return null;"));





/* ---------------------------------------- *\
 * Remove author redirect
\* ---------------------------------------- */

function remove_author_query_var ( $vars )
{
    foreach ( $vars as $k => $v )
    {
        if ( $v == 'author' )
        {
            unset($vars[$k]);
        }
    }

    return $vars;
}
add_filter( 'query_vars', 'remove_author_query_var' );

<?php
/**
*   Plugin Name: THE APOD
*   Plugin URI: https://github.com/DaWoody/nasa-apod
*   Description: THE APOD, or The Astronomy Picture Of the Day. A plugin that fetches information from the NASA open API, gathering information with the Astronomy Picture Of the Day (APOD). This information can then be added as a html block to a wordpress page/post etc.
*   Version: 1.0.0
*   Author: Johan "DaWoody" Wedfelt
*   Copyright: Johan Wedfelt
*   License: GPLv2
*   License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*   Author URI: https://github.com/DaWoody
*/

require_once(dirname(__FILE__) . '/the-apod-global-vars.php');
require_once(dirname(__FILE__) . '/the-apod-admin.php');
require_once(dirname(__FILE__) . '/the-apod-shortcodes.php');

//Require this for the wp-upgrade option
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

//Enqueueing for admin interface
function the_apod_admin_enqueue($hook) {

    global $the_apod_plugin_full_name;

    if ( 'toplevel_page_' . $the_apod_plugin_full_name != $hook ) {
        return;
    }

    wp_register_style('bootstrap-style', plugin_dir_url( __FILE__ ) . 'css/bootstrap/bootstrap.min.css', false, 1.0);
    //wp_register_style('data-tables-style', plugin_dir_url( __FILE__ ) . 'css/datatables.css', false, 1.0);

    wp_enqueue_style('bootstrap-style');

    wp_register_script('the-apod-class-script', plugin_dir_url( __FILE__ ) . 'js/the-apod-class.js', ['jquery'], 1.0);
    wp_register_script('the-apod-admin-script', plugin_dir_url( __FILE__ ) . 'js/the-apod-admin.js', ['the-apod-class-script'], 1.0);

    wp_enqueue_script('the-apod-class-script');
    wp_enqueue_script('the-apod-admin-script');

    //wp_localize_script('the-apod-class-script', 'theApodImageAjax', array(
    //'ajaxurl' => admin_url( 'admin-ajax.php' ),
    // generate a nonce with a unique ID "myajax-post-comment-nonce"
    // so that you can check it later when an AJAX request is sent
    //'theApodImageNonce' => wp_create_nonce( 'the-apod-nonce' )
    // ));
}

//Add actions for admin menues
add_action( 'admin_menu', 'the_apod_create_plugin_menu' );
//add_action( 'admin_menu', 'gowp_admin_menu' );
add_action( 'admin_enqueue_scripts', 'the_apod_admin_enqueue' );

?>
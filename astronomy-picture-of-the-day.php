<?php
/**
*   Plugin Name: Astronomy Picture Of the Day
*   Plugin URI: https://github.com/DaWoody/nasa-apod
*   Description: Astronomy Picture Of the Day. A plugin that fetches information from the NASA open API, gathering information with the Astronomy Picture Of the Day (APOD). This information can then be added as a html block to a wordpress page/post etc.
*   Version: 1.0.1
*   Author: Johan "DaWoody" Wedfelt
*   Copyright: Johan Wedfelt
*   License: GPLv2
*   License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*   Author URI: https://github.com/DaWoody
*/

require_once(dirname(__FILE__) . '/astronomy-picture-of-the-day-global-vars.php');
require_once(dirname(__FILE__) . '/astronomy-picture-of-the-day-admin.php');
require_once(dirname(__FILE__) . '/astronomy-picture-of-the-day-shortcodes.php');

//Require this for the wp-upgrade option
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

//Enqueueing for admin interface
function astronomy_picture_of_the_day_admin_enqueue($hook) {

    global $astronomy_picture_of_the_day_plugin_full_name;

    if ( 'toplevel_page_' . $astronomy_picture_of_the_day_plugin_full_name != $hook ) {
        return;
    }

    wp_register_style('bootstrap-style', plugin_dir_url( __FILE__ ) . 'css/bootstrap/bootstrap.min.css', false, 1.0);
    //wp_register_style('data-tables-style', plugin_dir_url( __FILE__ ) . 'css/datatables.css', false, 1.0);

    wp_enqueue_style('bootstrap-style');

    wp_register_script('astronomy-picture-of-the-day-class-script', plugin_dir_url( __FILE__ ) . '/js/astronomy-picture-of-the-day-class.js', ['jquery'], 1.0);
    wp_register_script('astronomy-picture-of-the-day-admin-script', plugin_dir_url( __FILE__ ) . '/js/astronomy-picture-of-the-day-admin.js', ['astronomy-picture-of-the-day-class-script'], 1.0);

    wp_enqueue_script('astronomy-picture-of-the-day-class-script');
    wp_enqueue_script('astronomy-picture-of-the-day-admin-script');

    //wp_localize_script('astronomy-picture-of-the-day-class-script', 'apodImageAjax', array(
    //'ajaxurl' => admin_url( 'admin-ajax.php' ),
    // generate a nonce with a unique ID "myajax-post-comment-nonce"
    // so that you can check it later when an AJAX request is sent
    //'apodImageNonce' => wp_create_nonce( 'astronomy-picture-of-the-day-nonce' )
    // ));
}

//Add actions for admin menues
add_action( 'admin_menu', 'astronomy_picture_of_the_day_create_plugin_menu' );
//add_action( 'admin_menu', 'gowp_admin_menu' );
add_action( 'admin_enqueue_scripts', 'astronomy_picture_of_the_day_admin_enqueue' );

?>
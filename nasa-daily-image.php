<?php
/**
*   Plugin Name: NASA Daily Image
*   Plugin URI: https://github.com/DaWoody/nasa-daily-image
*   Description: NASA Daily Image. A plugin that fetches information from the NASA api, gathering information about their daily space picture taken. This information can then be added to a wordpress page/post etc.
*   Version: 1.0.0
*   Author: Johan "DaWoody" Wedfelt
*   Copyright: Johan Wedfelt
*   License: GPL
*   Author URI: https://github.com/DaWoody
*/

require_once(dirname(__FILE__) . '/nasa-daily-image-global-vars.php');
require_once(dirname(__FILE__) . '/nasa-daily-image-admin.php');
require_once(dirname(__FILE__) . '/nasa-daily-image-shortcodes.php');

//Require this for the wp-upgrade option
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

//Enqueueing for admin interface
function nasa_daily_image_admin_enqueue($hook) {

    global $nasa_daily_image_plugin_full_name;

    if ( 'toplevel_page_' . $nasa_daily_image_plugin_full_name != $hook ) {
        return;
    }

    wp_register_style('bootstrap-style', plugin_dir_url( __FILE__ ) . 'css/bootstrap/bootstrap.min.css', false, 1.0);
    //wp_register_style('data-tables-style', plugin_dir_url( __FILE__ ) . 'css/datatables.css', false, 1.0);

    wp_enqueue_style('bootstrap-style');

    wp_register_script('nasa-class-script', plugin_dir_url( __FILE__ ) . 'js/nasa-class.js', ['jquery'], 1.0);
    wp_register_script('nasa-admin-script', plugin_dir_url( __FILE__ ) . 'js/nasa-admin.js', ['nasa-class-script'], 1.0);

    wp_enqueue_script('nasa-class-script');
    wp_enqueue_script('nasa-admin-script');

    //wp_localize_script('nasa-class-script', 'nasaDailyImageAjax', array(
    //'ajaxurl' => admin_url( 'admin-ajax.php' ),
    // generate a nonce with a unique ID "myajax-post-comment-nonce"
    // so that you can check it later when an AJAX request is sent
    //'weelteDailyImageNonce' => wp_create_nonce( 'nasa-daily-image-nonce' )
    // ));
}

//Add actions for admin menues
add_action( 'admin_menu', 'nasa_daily_image_create_plugin_menu' );
//add_action( 'admin_menu', 'gowp_admin_menu' );
add_action( 'admin_enqueue_scripts', 'nasa_daily_image_admin_enqueue' );

?>
<?php
/**
*   This part includes the methods and functions that generate the short-codes used in the plugin.
*   This is a part of the NASA APOD plugin.
*/


// Creates normal nasa daily image container with explanation and title
function nasa_apod_normal(){

wp_register_script('nasa-class', plugin_dir_url( __FILE__ ) . 'js/nasa-class.js', ['jquery'] , 1.0);
wp_register_script('nasa-front-normal-script', plugin_dir_url( __FILE__ ) . 'js/nasa-front-normal.js', ['nasa-class'] , 1.0);
wp_enqueue_script('nasa-front-normal-script');

?>
<div class="nasa-apod-container">
</div>
<?php
}

// Creates hd nasa daily image container with explanation and title
function nasa_apod_hd(){

wp_register_script('nasa-class', plugin_dir_url( __FILE__ ) . 'js/nasa-class.js', ['jquery'] , 1.0);
wp_register_script('nasa-front-hd-script', plugin_dir_url( __FILE__ ) . 'js/nasa-front-hd.js', ['nasa-class'] , 1.0);
wp_enqueue_script('nasa-front-hd-script');

?>
<div class="nasa-apod-container">
</div>
<?php
}

add_shortcode('nasa-apod', 'nasa_apod_normal');
add_shortcode('nasa-apod-hd', 'nasa_apod_hd');

?>
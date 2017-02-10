<?php
/**
*   This part includes the methods and functions that generate the short-codes used in the plugin.
*   This is a part of the THE APOD plugin.
*/


// Creates normal nasa daily image container with explanation and title
function the_apod_normal(){

wp_register_script('the-apod-class', plugin_dir_url( __FILE__ ) . 'js/the-apod-class.js', ['jquery'] , 1.0);
wp_register_script('the-apod-front-normal-script', plugin_dir_url( __FILE__ ) . 'js/the-apod-front-normal.js', ['the-apod-class'] , 1.0);
wp_enqueue_script('the-apod-front-normal-script');

?>
<div class="the-apod-container">
</div>
<?php
}

// Creates hd nasa daily image container with explanation and title
function the_apod_hd(){

wp_register_script('the-apod-class', plugin_dir_url( __FILE__ ) . 'js/the-apod-class.js', ['jquery'] , 1.0);
wp_register_script('the-apod-front-hd-script', plugin_dir_url( __FILE__ ) . 'js/the-apod-front-hd.js', ['the-apod-class'] , 1.0);
wp_enqueue_script('the-apod-front-hd-script');

?>
<div class="the-apod-container">
</div>
<?php
}

add_shortcode('the-apod', 'the_apod_normal');
add_shortcode('the-apod-hd', 'the_apod_hd');

?>
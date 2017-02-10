<?php
/**
*   This part includes the methods and functions that generate the short-codes used in the plugin.
*   Part of the Astronomy Picture Of the Day plugin
*/


// Creates normal nasa daily image container with explanation and title
function astronomy_picture_of_the_day_normal(){

wp_register_script('astronomy-picture-of-the-day-class', plugin_dir_url( __FILE__ ) . 'js/astronomy-picture-of-the-day-class.js', ['jquery'] , 1.0);
wp_register_script('astronomy-picture-of-the-day-front-normal-script', plugin_dir_url( __FILE__ ) . 'js/astronomy-picture-of-the-day-front-normal.js', ['astronomy-picture-of-the-day-class'] , 1.0);
wp_enqueue_script('astronomy-picture-of-the-day-front-normal-script');

?>
<div class="astronomy-picture-of-the-day-container">
</div>
<?php
}

// Creates hd nasa daily image container with explanation and title
function astronomy_picture_of_the_day_hd(){

wp_register_script('astronomy-picture-of-the-day-class', plugin_dir_url( __FILE__ ) . 'js/astronomy-picture-of-the-day-class.js', ['jquery'] , 1.0);
wp_register_script('astronomy-picture-of-the-day-front-hd-script', plugin_dir_url( __FILE__ ) . 'js/astronomy-picture-of-the-day-front-hd.js', ['astronomy-picture-of-the-day-class'] , 1.0);
wp_enqueue_script('astronomy-picture-of-the-day-front-hd-script');

?>
<div class="astronomy-picture-of-the-day-container">
</div>
<?php
}

add_shortcode('astronomy-picture-of-the-day', 'astronomy_picture_of_the_day_normal');
add_shortcode('astronomy-picture-of-the-day-hd', 'astronomy_picture_of_the_day_hd');

?>
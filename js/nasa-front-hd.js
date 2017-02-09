/**
 * NASA APOD - plugin
 * Plugin URI: https://github.com/DaWoody/nasa-daily-image
 * Author: Johan DaWoody Wedfelt
 * Author URI: https://github.com/DaWoody
 * About: Small jQuery script to make DOM rendering on the post/page for the high definition image resolution
 */
jQuery(document).ready(function() {
    var nasaClass = new NasaClass(),
        nasaObject = nasaClass.returnStoredNasaValues();

    jQuery('.nasa-daily-image-container')
        .html('<h2 class="nasa-daily-image-title">' + nasaObject.title + '</h2>'
            + '<img class="nasa-daily-image-picture" src="' + nasaObject.hdUrl + '" alt="nasa-daily-image">'
            + '<p class="nasa-daily-image-explanation">' + nasaObject.explanation + '</p>');
});

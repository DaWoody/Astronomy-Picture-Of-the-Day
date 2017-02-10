/**
 * Astronomy Picture Of the Day - plugin
 * Plugin URI: https://github.com/DaWoody/astronomy-picture-of-the-day
 * Author: Johan DaWoody Wedfelt
 * Author URI: https://github.com/DaWoody
 * About: Small jQuery script to make DOM rendering on the post/page for the high definition image resolution
 */
jQuery(document).ready(function() {
    var nasaClass = new ApodClass(),
        nasaObject = nasaClass.returnStoredNasaValues();

    jQuery('.astronomy-picture-of-the-day-container')
        .html('<h2 class="astronomy-picture-of-the-day-title">' + nasaObject.title + '</h2>'
            + '<img class="astronomy-picture-of-the-day-picture" src="' + nasaObject.hdUrl + '" alt="astronomy-picture-of-the-day">'
            + '<p class="astronomy-picture-of-the-day-explanation">' + nasaObject.explanation + '</p>');
});

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

    jQuery('.the-apod-container')
        .html('<h2 class="the-apod-title">' + nasaObject.title + '</h2>'
            + '<img class="the-apod-picture" src="' + nasaObject.hdUrl + '" alt="the-apod">'
            + '<p class="the-apod-explanation">' + nasaObject.explanation + '</p>');
});

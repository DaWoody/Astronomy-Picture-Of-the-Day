jQuery(document).ready(function() {
    var nasaClass = new NasaClass(),
        nasaObject = nasaClass.returnStoredNasaValues();

    jQuery('.nasa-daily-image-container')
        .html('<h2 class="nasa-daily-image-title">' + nasaObject.title + '</h2>'
            + '<img class="nasa-daily-image-picture" src="' + nasaObject.url + '" alt="nasa-daily-image">'
            + '<p class="nasa-daily-image-explanation">' + nasaObject.explanation + '</p>');
});




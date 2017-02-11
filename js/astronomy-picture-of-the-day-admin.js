/**
 * Astronomy Picture Of the Day - plugin
 * Plugin URI: https://github.com/DaWoody/astronomy-picture-of-the-day
 * Author: Johan DaWoody Wedfelt
 * Author URI: https://github.com/DaWoody
 */
jQuery(document).ready(function(){
    console.log('Admin interface loaded..');
    var apodClass = new ApodClass(),
        object = apodClass.getImageDataFromNasa();

    console.log(object);
    jQuery('.astronomy-picture-of-the-day-reset-stored-data').click(function(){
       //Delete current data first then store new one.
        apodClass.resetStoredData();
        alert('Astronomy Picture Of the Day data reset');
    });
});

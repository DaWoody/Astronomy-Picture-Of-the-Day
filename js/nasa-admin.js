/**
 *
 */
jQuery(document).ready(function(){
    console.log('Admin interface loaded..');
    var nasaClass = new NasaClass();

    jQuery('.nasa-daily-image-reset-stored-data').click(function(){
       //Delete current data first then store new one.
        nasaClass.resetStoredData();
        alert('NASA Daily Image data reset');
    });
});

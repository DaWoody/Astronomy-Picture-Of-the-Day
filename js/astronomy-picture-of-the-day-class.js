/**
 * Astronomy Picture Of the Day - javascript class
 * Plugin URI: https://github.com/DaWoody/astronomy-picture-of-the-day
 * Author: Johan DaWoody Wedfelt
 * Author URI: https://github.com/DaWoody
 * About: A small javascript class written to exchange information with the NASA open API and specifically to fetch information from the APOD project
 * @constructor
 */

var ApodClass = function(){
    this.data = {};
    this.initiate();
};

ApodClass.prototype.getImageDataFromNasa = function(){

    var xhr = new XMLHttpRequest(),
        _that = this,
        url = this.data.nasaApiUrl + this.data.nasaApiKey;

    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4){
            if(xhr.status == 200){
                var response = xhr.response;
                _that.setRetrievedNasaCookie(response);
            }
        }
    };

    xhr.open('GET', url);
    xhr.responseType = 'json';
    xhr.send();
};

ApodClass.prototype.setNasaCookieNames = function(){
    //Just sets the NASA cookie names
    this.data.nasaCookieNames = {
        dateName: 'wp_plugin_nasa_image_date',
        hdUrl: 'wp_plugin_nasa_image_hdurl',
        explanation: 'wp_plugin_nasa_image_explanation',
        mediaType: 'wp_plugin_nasa_image_media_type',
        serviceVersion: 'wp_plugin_nasa_image_service_version',
        title: 'wp_plugin_nasa_image_title',
        url: 'wp_plugin_nasa_image_url'
    };

    this.data.nasaCookieValues = {
        dateName: '',
        hdUrl: '',
        explanation: '',
        mediaType: '',
        serviceVersion: '',
        title: '',
        url: ''
    };
};

ApodClass.prototype.loadNasaDataFromCookies = function(){

    //Lets load all the values into our class from the saved cookies
    this.data.nasaCookieValues.dateName = this.getCookie(this.data.nasaCookieNames.dateName);
    this.data.nasaCookieValues.hdUrl = this.getCookie(this.data.nasaCookieNames.hdUrl);
    this.data.nasaCookieValues.explanation = this.getCookie(this.data.nasaCookieNames.explanation);
    this.data.nasaCookieValues.mediaType = this.getCookie(this.data.nasaCookieNames.mediaType);
    this.data.nasaCookieValues.serviceVersion = this.getCookie(this.data.nasaCookieNames.serviceVersion);
    this.data.nasaCookieValues.title = this.getCookie(this.data.nasaCookieNames.title);
    this.data.nasaCookieValues.url = this.getCookie(this.data.nasaCookieNames.url);
};

ApodClass.prototype.checkNasaCookies = function(){
    var cookiesSet = false;

    //We are checking to see if we already have stored the data in cookies.
    for(var key in this.data.nasaCookieNames){
        //console.log('The key is..' + key);
        //console.log('The value is.. ' + this.data.nasaCookieNames[key] );
        this.checkCookie(this.data.nasaCookieNames[key]) ? cookiesSet = true : cookiesSet = false;
    }
    return cookiesSet;
};

ApodClass.prototype.setRetrievedNasaCookie = function(dataObject){
    //Taking in the dataobject reciever from the API
    //Taking it from the version 1 thing.

    //Set date
    this.setCookie(this.data.nasaCookieNames.dateName, dataObject['date'], 1);
    this.data.nasaCookieValues['dateName'] = dataObject['date'];

    this.setCookie(this.data.nasaCookieNames.hdUrl, dataObject['hdurl'], 1);
    this.data.nasaCookieValues['hdUrl'] = dataObject['hdurl'];

    this.setCookie(this.data.nasaCookieNames.explanation, dataObject['explanation'], 1);
    this.data.nasaCookieValues['explanation'] = dataObject['explanation'];

    this.setCookie(this.data.nasaCookieNames.mediaType, dataObject['media_type'], 1);
    this.data.nasaCookieValues['mediaType'] = dataObject['mediaType'];

    this.setCookie(this.data.nasaCookieNames.serviceVersion, dataObject['service_version'], 1);
    this.data.nasaCookieValues['serviceVersion'] = dataObject['service_version'];

    this.setCookie(this.data.nasaCookieNames.title, dataObject['title'], 1);
    this.data.nasaCookieValues['title'] = dataObject['title'];

    this.setCookie(this.data.nasaCookieNames.url, dataObject['url'], 1);
    this.data.nasaCookieValues['url'] = dataObject['url'];

};


ApodClass.prototype.setCookie = function(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
};

ApodClass.prototype.getCookie = function(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
};

ApodClass.prototype.checkCookie = function(cookieName) {

    var cookieSet = false,
        value = this.getCookie(cookieName);

    if (value != "") {
        cookieSet = true;
    }
    return cookieSet;
};

ApodClass.prototype.printStoredNasaData = function(){
    console.log('== Cookie values ==');
    console.log(this.data.nasaCookieValues);
};

ApodClass.prototype.setNasaApiKey = function(apiKey){
    var nasaApiKey = apiKey || 'DEMO_KEY';
    this.data.nasaApiKey = nasaApiKey;
};

ApodClass.prototype.setNasaApiUrl = function(apiUrl){
    var nasaApiUrl = apiUrl || 'https://api.nasa.gov/planetary/apod?api_key=';
    this.data.nasaApiUrl =  nasaApiUrl;
};


ApodClass.prototype.resetStoredData = function(){
    var cookieNames = this.data.nasaCookieNames;
    for(var key in cookieNames){
        this.setCookie(cookieNames[key], '', 1);
    }
};

ApodClass.prototype.returnStoredNasaValues = function(){
  return this.data.nasaCookieValues;
};

ApodClass.prototype.loadData = function(){
    if(!this.checkNasaCookies()){
        //console.log('Fetching the data from API');
        this.getImageDataFromNasa();
        console.log('Data loaded from API..');
    } else {
        this.loadNasaDataFromCookies();
        console.log('Data loaded from storage..');
    }
    this.printStoredNasaData();
};

ApodClass.prototype.initiate = function(apiKey){
    console.log('=== Hello Houston.. Astronomy Picture Of the Day plugin initiated ===');
    this.setNasaApiKey(apiKey);
    this.setNasaApiUrl();
    this.setNasaCookieNames();
    this.loadData();
};



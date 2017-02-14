=== Astronomy Picture Of the Day  ===
Contributors: DaWoody
Tags: nasa, daily, image, apod, astronomy, picture, of, the, day, space, dawoody, johan, wedfelt
Requires at least: 3.5.0, also including jquery within WP for some minor DOM manipulation working with WP.
Tested up to: 4.7.2
Stable tag: 4.7
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A plugin that fetches data from NASA's open API regarding the Astronomy Picture Of the Day to be used within posts/pages

== Description ==

The Astronomy Picture Of the Day plugin fetches data from the NASA open API and specifically data from Astronomy Picture Of the Day (APOD). The data can then be presented within posts/pages through the use of short-codes added to the editor in text-mode. The data is fetched through javascript AJAX calls, and stored within the browser as a cookie for caching purposes.
Currently the plugin uses the public ```DEMO_KEY``` for requests towards the open API, and as mentioned then stores the data as cookies for the next 24 hours, this to lessen the request load on the API and also possibly help the wordpress user to a smoother experience.

How to use:
After activating the plugin, go to your post/page, go to editor mode, and then either add ```[astronomy-picture-of-the-day]``` or ```[astronomy-picture-of-the-day-hd]``` to generate a html block consisting of a container div, with a title, the apod image and its explanation.
All elements receive css classes so they can be styled independently by the Wordpress developer.
Within the admin interface the specific ```css``` classes that gets added are mentioned.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/astronomy-picture-of-the-day` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the Settings->Astronomy Picture Of the Day screen to configure the plugin
4. The plugin basically lets you use the short-codes ```astronomy-picture-of-the-day``` or ```astronomy-picture-of-the-day-hd``` to get a ```div``` container with an image element, a header with the corresponding title and a paragraph with the explanation to the APOD.
5. In the admin interface page, there is a button that clears the browser cache from previously stored  data.

== Screenshots ==

1. This shows the admin interface of the plugin.
2. This shows an example of how to add the shortcode that will generate the html block, in the text-editor mode. In this screenshot a page is modified.

== Changelog ==

= 1.0.1 =
* Minor adjustments with readme.txt, images added to assets dir so plugin will show images on Wordpress.org
= 1.0.0 =
* Initial release

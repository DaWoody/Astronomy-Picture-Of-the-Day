<?php
/**
*  Part of the Astronomy Picture Of the Day plugin
*  This part is creating the admin interface, both menu item and the actual admin page
*/

function astronomy_picture_of_the_day_create_plugin_menu() {
	add_menu_page( 'Astronomy Picture Of the Day', 'Astronomy Picture Of the Day', 'manage_options', 'Astronomy Picture Of the Day', 'astronomy_picture_of_the_day_create_plugin_admin_page' );
}

function astronomy_picture_of_the_day_create_plugin_admin_page() {

    //global $nasa_apod_db_version;

	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}

	wp_register_style('astronomy-picture-of-the-day-style', plugin_dir_url( __FILE__ ) . 'css/astronomy-picture-of-the-day-admin-interface.css', false, 1.0);
	wp_enqueue_style('astronomy-picture-of-the-day-style');

	?>
	<div class="astronomy-picture-of-the-day-admin-wrapper">
	<?php
	echo '<img class="astronomy-picture-of-the-day-logo" alt="THE APOD" src="' . plugins_url( 'images/astronomy_picture_of_the_day_logo.png', __FILE__ ) . '" >';
	echo '<img class="astronomy-picture-of-the-day-gpl" alt="GPL" src="' . plugins_url( 'images/gpl.png', __FILE__ ) . '" >';
	?>

	<div class="astronomy-picture-of-the-day-admin-button-wrapper">
	<button class="astronomy-picture-of-the-day-reset-stored-data btn btn-info">Reset Stored Data</button>
	</div>

	<div class="astronomy-picture-of-the-day-admin-text">
	 <h3>Astronomy Picture Of the Day</h3>
     <ul>
     <li>Plugin URI: <a href="https://github.com/DaWoody/astronomy-picture-of-the-day">https://github.com/DaWoody/astronomy-picture-of-the-day</a></li>
     <li>Version: 1.0.0</li>
     <li>Author: <a href="https://github.com/DaWoody">Johan DaWoody Wedfelt</a></li>
     <li>License: <a href="https://www.gnu.org/licenses/old-licenses/gpl-2.0.html">GPLv2</a></li>
     <li>Dependencies: <a href="https://jquery.com/">jQuery</a> 1.X (supplied in Wordpress)</li>
     </ul>
     <div class="astronomy-picture-of-the-day-admin-text-container">
     <h3>What is this plugin?</h3>
     <p>
     This is a plugin that shows the current daily space image with corresponding information published by NASA within your posts or pages. Technically the plugin uses the public <a href="https://sv.wikipedia.org/wiki/Application_Programming_Interface">API</a> from <a href="https://www.nasa.gov/">NASA</a> and fetches data connected to <a href="https://apod.nasa.gov/apod/astropix.html">Astronomy Picture of the Day (APOD)</a>.
     The plugin currently uses the public <code>DEMO_KEY</code> to make request towards the API, which in turn is limited to a number of requests per day from the same ip, so this plugin basically creates a cookie with the information that is stored within the
     browser for a day (24 hours), minimizing the amount of requests towards the API and also making the plugin more responsive to user rendering.
     </p>
	 <h3>How to use this plugin?</h3>
	 <p>
	 The plugin can be used by adding short-codes to your posts, pages etc.
	 There are currently two different short-codes that can be used either for fetching a <code>normal-resolution</code> image or
	 one for fetching a <code>high-definition</code> image.
	 The structure that is returned in html is a div acting as a container with the class <b>astronomy-picture-of-the-day-container</b> containing a
	 <code>h2</code> tag including the title with the class <b>astronomy-picture-of-the-day-title</b> , an <code>img</code> tag with the class <b>astronomy-picture-of-the-day-picture</b> and a  <code>p</code> tag with the class  <b>astronomy-picture-of-the-day-explanation</b> containing
	 the explanation.


     <br>
     <br>
<h4> Select <code>text</code> mode within the editor in your posts/pages </h4>
	 By adding the short-code <code>[astronomy-picture-of-the-day]</code> you get this structure with the image tag containing a reference to the normal resolution version,
	 and by instead adding the short-code <code>[astronomy-picture-of-the-day-hd]</code> you get the high-definition version.
	</div>
    </div>

	<?php
}

?>
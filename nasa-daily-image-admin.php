<?php
/**
*   This is part of the Nasa Daily Image plugin, should be included/required in the nasa-daily-image main file nasa-daily-image.php
*   this part is methods for creating the admin menu and such.
*/

function nasa_daily_image_create_plugin_menu() {
	add_menu_page( 'NASA Daily Image', 'NASA Daily Image', 'manage_options', 'NASA Daily Image', 'nasa_daily_image_create_plugin_admin_page' );
}

function nasa_daily_image_create_plugin_admin_page() {

    //global $nasa-daily-image_db_version;

	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}

	wp_register_style('nasa-daily-image-style', plugin_dir_url( __FILE__ ) . 'css/nasa-daily-image-admin-interface.css', false, 1.0);
	wp_enqueue_style('nasa-daily-image-style');

	?>
	<div class="nasa-daily-image-admin-wrapper">
	<?php
	echo '<img class="nasa-daily-image-logo" alt="Nasa Daily Image" src="' . plugins_url( 'images/nasa_daily_image_logo.png', __FILE__ ) . '" >';
	echo '<img class="nasa-daily-image-gplv3" alt="GPLV3" src="' . plugins_url( 'images/gplv3.png', __FILE__ ) . '" >';
	?>

	<div class="nasa-daily-image-admin-button-wrapper">
	<button class="nasa-daily-image-reset-stored-data btn btn-info">Reset Stored Data</button>
	</div>

	<div class="nasa-daily-image-admin-text">
     <ul>
     <li><h3>NASA Daily Image</h3></li>
     <li>Plugin URI: <a href="https://github.com/DaWoody/nasa-daily-image">https://github.com/DaWoody/nasa-daily-image</a></li>
     <li>Version: 1.0.0</li>
     <li>Author: <a href="https://github.com/DaWoody">Johan DaWoody Wedfelt</a></li>
     <li>License: <a href="https://www.gnu.org/licenses/gpl-3.0.en.html">GPLv3</a></li>
     <li>Dependencies: jQuery 1.X (supplied in Wordpress)</li>
     </ul>
     <div class="nasa-daily-image-admin-text-container">
     <h3>What is this plugin?</h3>
     <p>
     This is a plugin that shows the current daily space image with corresponding information published by NASA within your posts or pages. Technically the plugin uses the public <a href="https://sv.wikipedia.org/wiki/Application_Programming_Interface">API</a> from <a href="https://www.nasa.gov/">NASA</a> and fetches data connected to <a href="https://apod.nasa.gov/apod/astropix.html">Astronomy Picture of the Day (APOD)</a>.
     The plugin currently uses the public <code>DEMO_KEY</code> to make request towards the API, which in turn is limited to a number of requests per day from the same ip, so this plugin basically creates a cookie with the information that is stored within the
     browser for a day (24 hours), minimizing the amount of requests towards the API and also making the plugin more responsive to user rendering.
     </p>
	 <h3>How to use this plugin?</h3>
	 <p>
	 The plugin can be used by adding short-codes to your posts, pages etc.
	 There are currently two different short-codes that can be used either for fetching a <code>normal resolution</code> image or
	 one for fetching a <code>high-definition</code> image.
	 The structure that is returned in html is a div acting as a container with the class <b>nasa-daily-image-container</b> containing a
	 <code>h3</code> tag including the title with the class <b>nasa-daily-image-title</b> , an <code>img</code> tag with the class name <b>nasa-daily-image-picture</b> and a  <code>p</code> tag with the class  <b>nasa-daily-image-explanation</b> containing
	 the explanation.


     <br>
     <br>
<h4> Select <code>text</code> mode within the editor in your posts/pages </h4>
	 By adding the short-code <code>[nasa-daily-image]</code> you get this structure with the image tag containing a reference to the normal resolution version,
	 and by instead adding the short-code <code>[nasa-daily-image-hd]</code> you get the high-definition version.
	</div>
    </div>

	<?php
}

?>
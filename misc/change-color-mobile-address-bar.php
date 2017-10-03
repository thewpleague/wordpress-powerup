Mobile address bar color changer

After you install the plugin click the Settings link or go to Settings->Mobile bar color changer, click the select color field and either use the color picker or type the hex code for the color you want your bar to be.


// Chrome, Firefox OS, Opera and Vivaldi

add_action('wp_head', function() {
	<meta name="theme-color" content="'.$color.'">
});

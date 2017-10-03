How to Remove post via email settings
Adding this snippet to the functions.php of your wordpress theme will remove the post by emails settings within the settings menu under writing.

add_filter( 'enable_post_by_email_configuration', '__return_false' );

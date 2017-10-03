Change the Author Slug URL Base
File to Edit: Functions.php
The default URL slug for authors is /author/name. For example, on WPThemeDetector my author URL is www.wpthemedetector.com/author/kevin-muldoon/.
You can change the author slug using the code snippet below. Simple change the author slug to your desired name. For example, instead of the word author, you could use profile, member, or account.



add_action('init', 'cng_author_base');
function cng_author_base() {
    global $wp_rewrite;
    $author_slug = 'profile'; // change slug name
    $wp_rewrite->author_base = $author_slug;
}

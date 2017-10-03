How to remove “private” and “protected” from the post title
Written by Jean on February 15, 2010 in Hacks & Code Snippets
DISCLAIMER: this post is older than one year and may not be up to date with latest WordPress version.
Each time you define a specific post as being private or password-protected, WordPress automatically add “Private” or “Protected” to your blog post title. If you don’t want it, nothing simpler: Just apply this great hack.

The only thing you have to do is to paste the following piece of code in your functions.php file. Once you’ll save the file, the hack will be applied to your your posts.

function the_title_trim($title) {
	$title = attribute_escape($title);
	$findthese = array(
		'#Protected:#',
		'#Private:#'
	);
	$replacewith = array(
		'', // What to replace "Protected:" with
		'' // What to replace "Private:" with
	);
	$title = preg_replace($findthese, $replacewith, $title);
	return $title;
}
add_filter('the_title', 'the_title_trim');

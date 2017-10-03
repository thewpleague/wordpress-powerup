7. Redirect To Post If Search Results Return One Post
File to Edit: Functions.php
When you search for something on a WordPress website, a search results page is displayed with all relevant posts, posts, and other post types. The problem with this setup is that WordPress will still display a results page if there is only one blog post result.
This code snippet addresses this issue. If only one blog post is found for a search, the visitor will be taken directly to the blog post in question.
Redirect To Post If Search Results Return One PostPHP

add_action('template_redirect', 'redirect_single_post');
function redirect_single_post() {
    if (is_search()) {
        global $wp_query;
        if ($wp_query->post_count == 1 && $wp_query->max_num_pages == 1) {
            wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
            exit;
        }
    }
}

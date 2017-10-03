How to add a “delete” button to WordPress admin bar
Written by Jean on June 6, 2012 in Hacks & Code Snippets
DISCLAIMER: this post is older than one year and may not be up to date with latest WordPress version.
The admin bar is a featured introduced by WordPress 3.1. It adds useful options such as adding new posts or editing an existing one. But it do not feature a “delete” button, so you can’t trash a post without accessing the post lists on the dashboard. Here is a cool hack to add a “delete” button to WordPress admin bar.

To apply this tip, simply paste the following code into your functions.php file:

<?php
function fb_add_admin_bar_trash_menu() {
  global $wp_admin_bar;
  if ( !is_super_admin() || !is_admin_bar_showing() )
      return;
  $current_object = get_queried_object();
  if ( empty($current_object) )
      return;
  if ( !empty( $current_object->post_type ) &&
     ( $post_type_object = get_post_type_object( $current_object->post_type ) ) &&
     current_user_can( $post_type_object->cap->edit_post, $current_object->ID )
  ) {
    $wp_admin_bar->add_menu(
        array( 'id' => 'delete',
            'title' => __('Move to Trash'),
            'href' => get_delete_post_link($current_object->term_id)
        )
    );
  }
}
add_action( 'admin_bar_menu', 'fb_add_admin_bar_trash_menu', 35 );
?>

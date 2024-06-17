<?php 

// Add a new bulk action option to remove all '[TAXONOMY]' terms for '[POST_TYPE]' post type
function register_bulk_remove_taxonomy_action_[POST_TYPE]($bulk_actions) {
    $bulk_actions['remove_[TAXONOMY]'] = __('Remove All [Custom Taxonomy]', 'text-domain');
    return $bulk_actions;
}
add_filter('bulk_actions-edit-[POST_TYPE]', 'register_bulk_remove_taxonomy_action_[POST_TYPE]');

// Enqueue custom admin script for bulk actions for '[POST_TYPE]' post type
function enqueue_custom_bulk_edit_script_[POST_TYPE]() {
    global $pagenow;
    if ($pagenow === 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] === '[POST_TYPE]') {
        wp_enqueue_script('custom-bulk-edit-[POST_TYPE]', get_template_directory_uri() . '/js/custom-bulk-edit.js', array('jquery'), null, true);
    }
}
add_action('admin_enqueue_scripts', 'enqueue_custom_bulk_edit_script_[POST_TYPE]');

// Handle the custom bulk action for '[POST_TYPE]' post type
function handle_bulk_remove_taxonomy_action_[POST_TYPE]($redirect_to, $doaction, $post_ids) {
    if ($doaction !== 'remove_[TAXONOMY]') {
        return $redirect_to;
    }
    
    foreach ($post_ids as $post_id) {
        // Remove all terms of the '[TAXONOMY]' taxonomy from the post
        wp_set_object_terms($post_id, array(), '[TAXONOMY]');
    }

    $redirect_to = add_query_arg('bulk_remove_[TAXONOMY]', count($post_ids), $redirect_to);
    return $redirect_to;
}
add_filter('handle_bulk_actions-edit-[POST_TYPE]', 'handle_bulk_remove_taxonomy_action_[POST_TYPE]', 10, 3);

// Display admin notice after bulk action for '[POST_TYPE]' post type
function bulk_remove_taxonomy_admin_notice_[POST_TYPE]() {
    if (!empty($_REQUEST['bulk_remove_[TAXONOMY]'])) {
        $removed_count = intval($_REQUEST['bulk_remove_[TAXONOMY]']);
        echo '<div id="message" class="updated notice is-dismissible"><p>' .
             sprintf(__('Removed all [Custom Taxonomy] terms from %s [POST_TYPE] posts.', 'text-domain'), $removed_count) .
             '</p></div>';
    }
}
add_action('admin_notices', 'bulk_remove_taxonomy_admin_notice_[POST_TYPE]');

?>
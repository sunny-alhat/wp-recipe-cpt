<?php
// Fetch categories associated with the 'recipe' post type
$recipe_categories = get_terms(array(
    'taxonomy'   => 'category', // Targeting the 'category' taxonomy
    'hide_empty' => true,       // Exclude empty categories
    'object_ids' => get_posts(array(
        'post_type'   => 'recipe',
        'fields'      => 'ids', // Get only post IDs
        'numberposts' => -1     // Fetch all recipe posts
    )),
));

// Check if categories exist and display them
if (!empty($recipe_categories) && !is_wp_error($recipe_categories)) {
    echo '<aside class="recipe-sidebar">';
    echo '<h3>Recipe Categories</h3>';
    echo '<ul class="recipe-categories">';
    foreach ($recipe_categories as $category) {
        echo '<li>';
        echo '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
        echo '</li>';
    }
    echo '</ul>';
    echo '</aside>';
} else {
    echo '<p>No recipe categories found.</p>';
}
?>

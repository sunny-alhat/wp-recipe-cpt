<?php


// Add functionalities and support
function bswp_theme_support(){
    add_theme_support('title-tag'); // Add dyanmic title tag
    add_theme_support('custom-logo'); // Add dynamic custom logo
    add_theme_support('post-thumbnails'); // Enable featured image for posts
}
add_action('after_setup_theme','bswp_theme_support');



// Enqueue stylesheets
function child_theme_enqueue_styles() {
    
    // Get the version
    $version = wp_get_theme()->get('Version');

    // Enqueue bootstrap theme styles
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3');

    // Custom theme styles
    wp_enqueue_style('custom-styling', get_template_directory_uri()."/style.css", array(), $version,'all');
    
}
add_action('wp_enqueue_scripts', 'child_theme_enqueue_styles');


// Enqueue scripts (javascript)
function child_theme_enqueue_scripts() {
    // Bootstrap JavaScript
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.3', true);
}
add_action('wp_enqueue_scripts', 'child_theme_enqueue_scripts');


// Function to add the custom post type of Recipes
function recipe_post_type(){
    $args = array(
        'labels' => array(
            'name' => __('Recipes'),
            'singular_name' => __('Recipe'),
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'recipes'),
        'supports' => array('title', 'thumbnail'),
        // 'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'taxonomies' => array('category'),
    );
    register_post_type('recipe', $args);
}
add_action('init', 'recipe_post_type');


// Function to add custom fields for our recipes
function add_recipe_custom_fields(){
    
    // Field for ingredients
    add_meta_box(
        'recipe_ingredients',
        __('Ingredients List', 'textdomain'),
        'render_ingredients_meta_box',
        'recipe',
        'normal',
        'high'
    );

    // Field for preparation
    add_meta_box(
        'recipe_preparation',
        __('Preparation Steps', 'textdomain'),
        'render_preparation_meta_box',
        'recipe',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_recipe_custom_fields');


// Function to render the field of ingredient
function render_ingredients_meta_box($post){

    // Ingredients array
    $ingredients = get_post_meta($post->ID, '_recipe_ingredients', true);

    // Display simple text field
    // echo '<textarea style="width: 100%; height: 200px;" name="recipe_ingredients">'.
    // esc_textarea($ingredients).
    // '</textarea>';

    wp_editor($ingredients, 'recipe_ingredients_editor', array(
        'textarea_name' => 'recipe_ingredients',
        'media_buttons' => false,
        'teeny' => true,
        'textarea_rows' => 10,
    ));

}


// Function to render the field of preparation
function render_preparation_meta_box($post){

    // Ingredients array
    $preparation = get_post_meta($post->ID, '_recipe_preparation', true);

    // Display simple text field
    // echo '<textarea style="width: 100%; height: 200px;" name="recipe_preparation">'.
    // esc_textarea($preparation).
    // '</textarea>';

    wp_editor($preparation, 'recipe_preparation_editor', array(
        'textarea_name' => 'recipe_preparation',
        'media_buttons' => false,
        'teeny' => true,
        'textarea_rows' => 10,
    ));
}

// Function to save the data
function save_custom_meta_boxes($post_id){

    if(array_key_exists('recipe_ingredients', $_POST)){
        update_post_meta(
            $post_id,
            '_recipe_ingredients',
            // sanitize_textarea_field($_POST['recipe_ingredients'])
            wp_kses_post($_POST['recipe_ingredients']) // Maintain the HTML list formatting
        );
    }

    if(array_key_exists('recipe_preparation', $_POST)){
        update_post_meta(
            $post_id,
            '_recipe_preparation',
            // sanitize_textarea_field($_POST['recipe_preparation'])
            wp_kses_post($_POST['recipe_preparation']) // Maintain the HTML list formatting
        );
    }
}
add_action('save_post', 'save_custom_meta_boxes');

// Add menu support to the theme to manage the links with wordpress
function enable_register_menus() {
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'textdomain'),
        'footer-menu' => __('Footer Menu', 'textdomain'),
    ));
}
add_action('init', 'enable_register_menus');
?>
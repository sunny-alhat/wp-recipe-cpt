<?php get_header(); ?>

<div class="container-fluid">
    <div class="">
        

        <div class="row flex-column-reverse flex-md-row g-3">

            <div class="col-md">
                <?php get_sidebar('recipe'); ?>
            </div>

            <div class="col-md-10">

                <h2 class="category-title"><?php single_cat_title(); ?> Recipes</h2>

                <?php
                    // Check if posts exist for the current category
                    $recipe_query = new WP_Query(array(
                        'post_type' => 'recipe', // Show only recipes
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category', // Ensure it's the category taxonomy
                                'field' => 'id',
                                'terms' => get_queried_object_id(), // Get the current category ID
                            ),
                        ),
                        'posts_per_page' => 10, // Adjust the number of posts per page
                    ));

                    if ($recipe_query->have_posts()) :
                        echo '<div class="row g-3">';
                        while ($recipe_query->have_posts()) : $recipe_query->the_post();
                        get_template_part('template-parts/content','archive');
                        endwhile;
                        echo '</div>';

                        // Pagination
                        echo '<div class="pagination">';
                        the_posts_pagination();
                        echo '</div>';
                    else :
                        echo '<p>No recipes found in this category.</p>';
                    endif;

                    wp_reset_postdata();
                ?>
            </div>

        </div>    

    </div>

   
</div>

<?php get_footer(); ?>

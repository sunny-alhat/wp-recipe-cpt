<?php get_header(); ?>

    <div class="container-fluid">

        <div class="row flex-column-reverse flex-md-row">

            <div class="col-md">
                <?php get_sidebar('recipe');?>
            </div>

            <div class="col-md-10">

                <!-- Posts -->
                <div class="row g-4">
                    <?php
                        // Fetch only 'recipe' post type
                        $args = array(
                            'post_type' => 'recipe',
                            'posts_per_page' => 8,
                            'paged' => get_query_var('paged') ? get_query_var('paged') : 1, // Handle pagination
                        );

                        $article_query = new WP_Query($args);

                        // Check if query returns posts
                        if ($article_query->have_posts()) {

                            // Loop the posts
                            while ($article_query->have_posts()) {
                                
                                $article_query->the_post();
                                
                                get_template_part('template-parts/content','archive');
                            }
                        }
                    ?>
                    
                </div>

                <!-- Pagination -->
                <div class="custom-pagination mt-4">
                    <?= the_posts_pagination(); ?>
                </div>

            </div>

        </div>
    </div>

<?php get_footer(); ?>
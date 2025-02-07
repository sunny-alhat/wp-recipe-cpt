<?php get_header(); ?>

    <div class="container-fluid">

        <!-- Page content goes here -->
        <?php

            // check if posts are there
            if(have_posts()){

                // Load posts till they're available
                while(have_posts()){

                    // fetch the page data
                    the_post();

                    // load page data as per template
                    get_template_part('template-parts/content','page');

                }
            }
        ?>
           
    </div>

<?php get_footer(); ?>
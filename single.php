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

                    // Check if the post type is recipe
                    if(get_post_type() === 'recipe'){

                        // load page data as per recipe template
                        get_template_part('template-parts/content','recipe');
                        
                    }else{

                        // load page data as per article template
                        get_template_part('template-parts/content','article');
                    }

                }
            }
        ?>
           
    </div>

<?php get_footer(); ?>
<?php get_header(); ?>

    <div class="container-fluid">
        <div class="container">

            <!-- Posts -->
            <div class="row g-3">
                <?php

                    // check if posts are there
                    if(have_posts()){

                        // Load posts till they're available
                        while(have_posts()){

                            // fetch the posts
                            the_post();

                            // load each article as per template
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

<?php get_footer(); ?>
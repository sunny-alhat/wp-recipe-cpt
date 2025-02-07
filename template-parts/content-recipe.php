<div class="container-fluid">
<div class="row">
    <div class="col-md"></div>

    <!-- main column start -->
    <div class="col-md-8">

        <!-- Image -->
        <img src="<?= the_post_thumbnail_url('thumbnail') ?>" alt="" class="w-100 mb-4 recipe-featured-image">

        <!-- Meta Data -->
        <div>
            <span class="recipe-meta-date"><?= the_date() ?></span>
            <span class="mx-3">|</span>
            <?php

                // Get the categories
                $categories = get_the_category();

                // Check if the categories are empty
                if(!empty($categories)) {

                    echo '<span class="post-categories">';

                    // Loop the categories
                    foreach($categories as $category){
                        echo '<a href="'.esc_url(get_category_link( $category->term_id)). '" class="recipe-cat-name">'. esc_html( $category->name ).'</a> ';
                    }

                    echo '</span>';

                }else{
                    echo '<span class="post-categories">No categories assigned.</span>';
                }

                

            ?>
        </div>

        <!-- Article Title -->
        <h1 class="my-4"><?= the_title() ?></h1>

        <!-- Article Content -->
        <div class="recipe">
            <?php
                
                // Fetch and display ingredients
                $ingredients = get_post_meta(get_the_ID(), '_recipe_ingredients', true);
                if(!empty($ingredients)){
                    echo '<div class="recipe-ingredients">
                        <h2>Ingredients</h2>
                        '.$ingredients.'
                    </div>';
                }

                // Fetch and display preparation
                $preparation = get_post_meta(get_the_ID(), '_recipe_preparation', true);
                if(!empty($preparation)){
                    echo '<div class="recipe-preparation py-4">
                        <h2>Preparation</h2>
                        '.$preparation.'
                    </div>';
                }
            ?>
        </div>

        <!-- Next and previous content -->
        <div class="post-navigation">
            <h2>Read More</h2>
            <?php
            // Get the previous recipe post
            $previous_post = get_previous_post(false, '', 'category'); // true = in the same taxonomy
            if ($previous_post) :
                ?>
                <div class="prev-post">
                    <a href="<?= get_permalink($previous_post->ID); ?>">
                        <?= get_the_title($previous_post->ID); ?>
                    </a>
                </div>
            <?php endif; ?>

            <?php

            // Get the next recipe post
            $next_post = get_next_post(false, '', 'category'); // true = in the same taxonomy
            if ($next_post) :
                ?>
                <div class="next-post">
                    <a href="<?= get_permalink($next_post->ID); ?>">
                        <?= get_the_title($next_post->ID); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>


    </div>
    <!-- main column end -->

    <div class="col-md"></div>
</div>
    

</div>
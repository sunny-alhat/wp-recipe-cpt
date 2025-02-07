<!-- Card start-->
<div class="col-md-4">
    <a href="<?= the_permalink() ?>" class="card-link">
        <div class="c-card">
            <div class="c-card-body">

                <!-- Featured image -->
                <img src="<?= the_post_thumbnail_url() ?>" alt="" class="archive-featured-image">

                <!-- Article title -->
                <h3><?= the_title() ?></h3>

                <!-- Article excerpt -->
                <p>
                    <?= the_excerpt() ?>
                </p>

                <!-- Read more -->
                <a href="<?= the_permalink() ?>" class="btn-read-recipe">Read Recipe</a>

            </div>
        </div>
    </a>
</div>
<!-- Card end -->
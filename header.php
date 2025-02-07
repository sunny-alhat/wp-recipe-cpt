<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <?php
            // manage the meta data with WordPress
            wp_head();
        ?>

    </head>

    <body>
        
        <!-- Header section-->
        <header class="mb-5">

            <!-- Navigation bar -->
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <!-- fetch sitename dynamically -->
                        <?= get_bloginfo('name') ?>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <!-- dynamic custom menu -->
                        <?php
                            wp_nav_menu(
                                array(
                                    'menu'  => 'primary',
                                    'container' => '',
                                    'theme_location' => 'primary',
                                    'items_wrap' => '<ul id="bswp-navbar" class="navbar-nav ms-auto mb-2 mb-lg-0">%3$s</ul>'
                                )
                            );
                        ?>

                    </div>
                </div>
            </nav>

        </header>

      

     
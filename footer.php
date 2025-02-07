        <!-- Footer -->
        <footer class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md">
                        <h4><?= get_bloginfo('name') ?></h4>
                    </div>
                    <div class="col-md text-md-end">
                        <a href="#" class="d-inline-block me-3">Home</a>
                        <a href="#" class="d-inline-block me-3">About</a>
                        <a href="#" class="d-inline-block">Contact</a>
                    </div>
                </div>
                <hr class="py-2">
                <p class="">Copyright &copy; <?= date('Y') ?></p>
            </div>
        </footer>
        
        <?php
            // Insert footer scripts
            wp_footer();
        ?>
    </body>
</html>
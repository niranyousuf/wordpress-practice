<?php

get_header();

?>

    <section class="page-banner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/hero.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content max_container">
                        <h2>404 Page not found</h2>
                        <p><a class="btn big-btn" href="<?php echo site_url(); ?>">Back to Home</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php
get_footer();
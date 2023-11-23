<?php

get_header();


pageBanner(array(
    'title' => 'Search results',
    'subtitle' => 'You\'r searched for &ldquo;'. esc_html(get_search_query()) .'&ldquo;'
));


?>
    <section class="post-page">
        <div class="container">
            <div class="row">
                <?php 
                if(have_posts()){
                    while (have_posts()) {
                        the_post(); 
                        get_template_part('template-parts/content', get_post_type());
                    }
                } else {
                    _e('<h2>No result match that serch</h2>');
                }

                get_search_form();
                ?>

                <div class="col-md-12">
                    <div class="pagination max_container">
                        <?php echo paginate_links(); ?>
                    </div>
                </div>
            </div>

            
        </div>
    </section>

<?php
get_footer();
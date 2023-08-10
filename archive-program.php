<?php

get_header();

pageBanner(array(
    'title' => 'All Program',
    'subtitle' => 'There is something for everyone. Have a look around.'
));

?>


    <section class="post-page">
        <div class="container">
            <div class="row">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-md-12">
                        <div class="single__post max_container">
                            <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                            <div class="post__content">
                                <p><?php
                                    $content = get_the_content();
                                    $trimmed_content = wp_trim_words($content, 36, '...');
                                    echo $trimmed_content; 
                                ?></p>
                            </div>

                        </div>
                    </div>
                <?php endwhile; ?>

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
<?php

get_header();


pageBanner(array(
    'title' => 'Welcome to our blog',
    'subtitle' => 'Keep up with our latest news'
));


?>

    <section class="post-page">
        <div class="container">
            <div class="row">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-md-12">
                        <div class="single__post max_container">
                            <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                            <div class="metabox">
                                <p>Posted By: 
                                <?php the_author_posts_link() ?>    
                                on 
                                <?php the_time('j. M, y') ?>
                                in 
                                <?php echo get_the_category_list( ", " ) ?>
                                </p>
                            </div>
                            <div class="post__content">
                                <?php the_excerpt() ?>
                                <p><a class="btn big-btn" href="<?php the_permalink(); ?>">Continue reading &raquo; </a></p>
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
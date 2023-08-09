<?php

get_header();

?>
	<section class="page-banner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/hero.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content max_container">
                        <h2>Welcome to our blog</h2>
                        <p>Keep up with our latest news</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
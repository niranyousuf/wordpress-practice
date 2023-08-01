<?php get_header(); ?>


	<section class="page-banner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/hero.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content max_container">
                        <h2>All Events</h2>
                        <p>See What is going on in our world.</p>
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
                        <div class="blog-page__singlle-post max_container">
                            
                            <div class="latest-details">
                                <a class="latest-date" href="#">
                                    <span class="latest-month"><?php 
                                        $eventDate = new DateTime(get_field('event_date'));
                                        echo $eventDate->format('M');
                                    ?></span>
                                    <span class="latest-day"><?php echo $eventDate->format('d'); ?></span>
                                </a>
                                <div class="latest-content">
                                    <h5 class="latest-title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h5>
                                    
                                    <p><?php
                                            $content = get_the_content();
                                            $trimmed_content = wp_trim_words($content, 32, '...');
                                            echo $trimmed_content; 
                                        ?>
                                        <a href="<?php the_permalink(); ?>">Read more</a>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endwhile; ?>

                <div class="col-md-12">
                    <div class="pagination max_container">
                        <?php echo paginate_links(); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <p class="max_container">Looking for a recap of past events <a href="<?php echo site_url('/past-events'); ?>">Check out our past events archive</a></p>
                </div>

            </div> <!-- ./Row end -->
        </div>
    </section>

<?php get_footer();
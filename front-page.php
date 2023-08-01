<?php

get_header();

?>


<section id="hero" class="hero-banner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/hero.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12 ">
                    <div class="hero-content">
                        <h1>WordPress Experience in all new ways</h1>
                        <p>
                            Experience remarkable WordPress products with a new level of power, beauty, and
                            human-centered designs.
                            Think you know WordPress products? Think deeper!
                        </p>
                        <a class="btn btn-big" href="#products">Take a look</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding news-and-events" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/feature-bg.svg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="latest-events latest">
                        <h3>Upcuming event</h3>


                        <?php
                        $today = date('Ymd');
                        $homepageEvents = new WP_Query(array(
                            'posts_per_page' => 3,
                            'post_type' => 'event',
                            'meta_key' => 'event_date',
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC',
                            'meta_query' => array(
                                array(
                                    'key' => 'event_date',
                                    'compare' => '>=',
                                    'value' => $today,
                                    'type' => 'numeric'
                                )
                            )
                        ));

                        while($homepageEvents->have_posts()) : $homepageEvents->the_post();
                        ?>

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
                                        $trimmed_content = wp_trim_words($content, 12, '...');
                                        echo $trimmed_content; 
                                    ?>
                                    <a href="<?php the_permalink(); ?>">Read more</a>
                                </p>
                            </div>
                        </div>

                        
                        <?php endwhile; wp_reset_postdata(); ?>
                        
                        <div class="text-center">
                            <a class="btn big-btn event-cta-btn" href="<?php echo site_url('/events'); ?>">View all Event </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="latest-news latest">
                        <h3>From Our Blogs</h3>

                        <?php 
                            $homepagePost = new WP_Query(array(
                                'posts_per_page' => 3
                            ));
                            while($homepagePost->have_posts()) :
                                $homepagePost->the_post(); 
                        ?>
                            
                        <div class="latest-details">
                            <a class="latest-date" href="<?php the_permalink(); ?>">
                                <span class="latest-month"><?php the_time('M') ?></span>
                                <span class="latest-day"><?php the_time('d') ?></span>
                            </a>
                            <div class="latest-content">
                                <h5 class="latest-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <p><?php
                                        $content = get_the_content();
                                        $trimmed_content = wp_trim_words($content, 12, '...');
                                        echo $trimmed_content; 
                                        
                                        // if(has_excerpt()) {
                                        //     echo get_the_excerpt();
                                        // } else {
                                        //     echo $trimmed_content; 
                                        // }
                                    ?>
                                    <a href="<?php the_permalink(); ?>">Read more</a>
                                </p>
                            </div>
                        </div>
                        <?php endwhile; wp_reset_postdata(); ?>

                        <div class="text-center">
                            <a class="btn big-btn latest-cta-btn" href="<?php echo get_post_type_archive_link('event') ?>">View all blog posts </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="testimonials">
        <div class="testimonial owl-carousel">

            <div class="single-slide" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/apples.jpg);">
                <div class="slide-content">
                    <h2>This is awesome</h2>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio, sit!</p>
                    <a href="#" class="btn">Details</a>
                </div>
            </div>

            <div class="single-slide" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/bread.jpg);">
                <div class="slide-content">
                    <h2>This is awesome</h2>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio, sit!</p>
                    <a href="#" class="btn">Details</a>
                </div>
            </div>

            <div class="single-slide" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/bus.jpg);">
                <div class="slide-content">
                    <h2>This is awesome</h2>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio, sit!</p>
                    <a href="#" class="btn">Details</a>
                </div>
            </div>

        </div>
    </div>

    <div class="scroller">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h2><marquee>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero quia rem modi non, id fugit. A earum dicta nulla voluptatibus consequatur ad optio.</marquee></h2>
                </div>
            </div>
        </div>
    </div>
    
    
    
<?php
get_footer();
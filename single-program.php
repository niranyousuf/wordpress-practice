<?php

get_header();

while(have_posts()) : the_post();
?>

	<section class="page-banner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/hero.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content max_container">
                        <h2><?php the_title() ?></h2>
                        <p>DON'T FORGET TO REPLACE ME LATER</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page__content max_container">

						<div class="metabox meta_bradcumb">
							<a class="back_to_prev_page" href="<?php echo get_post_type_archive_link('program') ?>">
								<span class="icon icon-home"></span>
								All Programs
							</a>
							<span><?php the_title(); ?></span>
						</div>

                        <div class="generic-content"><?php the_content(); ?></div>

                            <?php
                                $relatedProfessors = new WP_Query(array(
                                    'posts_per_page' => -1,
                                    'post_type' => 'professor',
                                    'orderby' => 'title',
                                    'order' => 'ASC',
                                    'meta_query' => array(
                                        array(
                                            'key' => 'related_programs',
                                            'compare' => 'LIKE',
                                            'value' => '"' . get_the_ID() . '"',
                                        )
                                    )
                                ));

                                if($relatedProfessors->have_posts()) :
                            ?> 
                                
                            <div class="post_relation post-page">
                                <h2 class="block_title"><strong><?php the_title() ?></strong> Exparts</h2>
                            <?php while($relatedProfessors->have_posts()) : $relatedProfessors->the_post(); ?>
                                <div class="single__post max_container">
                                        <div class="latest-content">
                                            <h5 class="latest-title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h5>
                                        </div>
                                </div>
                            <?php endwhile; wp_reset_postdata(); endif; ?>


                            <?php
                                $today = date('Ymd');
                                $relatedEvents = new WP_Query(array(
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
                                        ),
                                        array(
                                            'key' => 'related_programs',
                                            'compare' => 'LIKE',
                                            'value' => '"' . get_the_ID() . '"',
                                        )
                                    )
                                ));

                                if($relatedEvents->have_posts()) :
                            ?> 
                                
                            <div class="post_relation post-page">
                                <h2 class="block_title">Upcoming <strong><?php the_title() ?></strong> Events</h2>
                            <?php while($relatedEvents->have_posts()) : $relatedEvents->the_post(); ?>
                                <div class="single__post max_container">
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
                            <?php endwhile; wp_reset_postdata(); endif; ?>




                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

endwhile;

get_footer();
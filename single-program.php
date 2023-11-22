<?php

get_header();

while(have_posts()) : the_post();

pageBanner();


?>



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


                        <div class="generic-content">
                            <?php the_field('main_body_content'); ?>
                        </div>

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
                            <h2 class="block_title"><strong><?php the_title() ?></strong> Experts</h2>
                            <div class="profile-lists">
                                <?php while($relatedProfessors->have_posts()) : $relatedProfessors->the_post(); ?>
                                <div class="user-profile">
                                    <a href="<?php the_permalink(); ?>" class="profile-card">
                                        <img class="author-image" src="<?php the_post_thumbnail_url('professorLandscape'); ?>" alt="">
                                        <p><?php the_title(); ?></p>
                                    </a>
                                </div>
                                <?php endwhile; wp_reset_postdata(); endif; ?>
                            </div>
                        </div>

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
                                <?php  get_template_part('template-parts/content', 'event'); ?>
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
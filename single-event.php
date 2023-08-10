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
							<a class="back_to_prev_page" href="<?php echo get_post_type_archive_link('event') ?>">
								<span class="icon icon-home"></span>
								Event home
							</a>
							<span><?php the_title(); ?></span>
						</div>

                        <div class="generic-content">
                            <?php the_content(); ?>
                        </div>




                        <?php $relatedPrograms = get_field('related_programs'); 
                        if($relatedPrograms) : ?>
                        
                        <div class="post_relation">

                            <h2 class="block_title">Realated Programs</h2>
                            
                            <?php foreach($relatedPrograms as $program) : ?>

                                <div class="single__post max_container">
                                    <h2><a href="<?php echo get_the_permalink($program) ?>"><?php echo get_the_title($program) ?></a></h2>
                                    <div class="post__content">
                                        <p><?php
                                            $content = get_the_content($program);
                                            $trimmed_content = wp_trim_words($content, 36, '...');
                                            echo $trimmed_content; 
                                        ?></p>
                                    </div>
                                </div>

                            <?php endforeach; endif; ?>

                        </div>

                        

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

endwhile;

get_footer();
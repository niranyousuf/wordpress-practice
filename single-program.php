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
                    <div class="page-content__content max_container">

						<div class="metabox meta_bradcumb">
							<a class="back_to_prev_page" href="<?php echo get_post_type_archive_link('program') ?>">
								<span class="icon icon-home"></span>
								All Programs
							</a>
							<span><?php the_title(); ?></span>
						</div>

                        <div class="generic-content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

endwhile;

get_footer();
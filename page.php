<?php

get_header();


while(have_posts()) :
	the_post();
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


						<?php
						$the_parent = wp_get_post_parent_id(get_the_ID());
						if($the_parent) : 
						?>
							<div class="metabox meta_bradcumb">
								<a class="back_to_prev_page" href="<?php echo get_permalink( $the_parent ) ?>">
									<span class="icon icon-home"></span>
									Back to <?php echo get_the_title( $the_parent ) ?>
								</a>
								<span class="current_page"><?php the_title() ?></span>
							</div>
						<?php endif; ?>

						<?php
						$is_parent = get_pages(array(
							'child_of' => get_the_ID()
						));

						if($the_parent or $is_parent) : ?>
                        <div class="page_links">
                            <h2 class="page__title"><a href="<?php echo get_permalink($the_parent) ?>"><?php echo get_the_title($the_parent) ?></a></h2> 
                            <ul class="min_list">

							<?php 
								$findChildrenOf = ($the_parent) ? $the_parent : get_the_ID();
								
								wp_list_pages( array(
									'title_li' => NULL,
									'child_of' => $findChildrenOf,
									'sort_column' => 'menu_order'
								) );
							?>
                            </ul>

                        </div>
						<?php endif; ?>


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
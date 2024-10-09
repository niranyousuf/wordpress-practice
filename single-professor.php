<?php

get_header();

while (have_posts()) : the_post();


    pageBanner();
?>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page__content max_container">

                        <div class="generic-content">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="featured-media">
                                        <?php the_post_thumbnail('professorPortrait'); ?>

                                        <?php
                                        $likeCount = new WP_Query(array(
                                            'post_type' => 'like',
                                            'meta_query' => array(
                                                array(
                                                    'key' => 'liked_professor_id',
                                                    'compare' => '=',
                                                    'value' => get_the_ID()
                                                )
                                            )
                                        ));
                                        $existStatus = "no";
                                        $dataID = "";
                                        if (is_user_logged_in()) {
                                            $existQuery = new WP_Query(array(
                                                'author' => get_current_user_id(),
                                                'post_type' => 'like',
                                                'meta_query' => array(
                                                    array(
                                                        'key' => 'liked_professor_id',
                                                        'compare' => '=',
                                                        'value' => get_the_ID()
                                                    )
                                                )
                                            ));

                                            if ($existQuery->found_posts) {
                                                $existStatus = "yes";
                                            };
                                            
                                            
                                        }
                                        ?>
                                        <div
                                            class="like-box"
                                            data-like="<?php echo ($existQuery->posts == []) ? "" : $existQuery->posts[0]->ID; ?>"
                                            data-professor="<?php the_ID(); ?>"
                                            data-exists="<?php echo $existStatus; ?>">

                                            <span class="icon icon-thumbs-up-alt" aria-hidden="true"></span>
                                            <span class="icon icon-thumbs-up" aria-hidden="true"></span>
                                            <span class="like-count"><?php echo $likeCount->found_posts; ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <?php the_content(); ?>

                                </div>
                            </div>
                        </div>




                        <?php $relatedPrograms = get_field('related_programs');
                        if ($relatedPrograms) : ?>
                            <div class="post_relation">
                                <h2 class="block_title">Expert in</h2>
                                <?php foreach ($relatedPrograms as $program) : ?>
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
                            <?php endforeach;
                            endif; ?>
                            </div>



                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

endwhile;

get_footer();

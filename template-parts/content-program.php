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
        <p><?php
            
            $content = get_field('main_body_content');
            $trimmed_content = wp_trim_words($content, 36, '...');
            echo $trimmed_content; 
        ?></p>
            <p><a class="btn big-btn" href="<?php the_permalink(); ?>">View program &raquo; </a></p>
        </div>

    </div>
</div>
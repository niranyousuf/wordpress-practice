<div class="col-md-12">
    <div class="single__post max_container">
        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
        <div class="post__content">
            <p><?php
                $content = get_the_content();
                $trimmed_content = wp_trim_words($content, 36, '...');
                echo $trimmed_content; 
            ?></p>
            <p><a class="btn big-btn" href="<?php the_permalink(); ?>">More about &raquo; </a></p>
        </div>

    </div>
</div>
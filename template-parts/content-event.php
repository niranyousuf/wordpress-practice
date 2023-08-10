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
        
        <p>
            <?php
                $content = get_the_content();
                $workdCount = is_front_page() ? 12 : 32;
                $trimmed_content = wp_trim_words($content, $workdCount, '...');
                echo $trimmed_content; 
            ?>
            <a href="<?php the_permalink(); ?>">Read more</a>
        </p>
    </div>
</div>
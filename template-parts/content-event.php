<a href="<?php the_permalink(); ?>" class="event-details">
  <div class="event-banner">
    <?php
    echo has_post_thumbnail() ? get_the_post_thumbnail() : '<img src="' . get_template_directory_uri() . '/images/default-event.jpg" alt="Default Image">';
    ?>
  </div>
  <div class="event-date">
    <span class="event-month">
      <?php
      $eventDate = new DateTime(get_field('event_date'));
      echo $eventDate->format('M');
      ?>
    </span>
    <span class="event-day"><?php echo $eventDate->format('d'); ?></span>
  </div>
  <div class="event-content">
    <h4 class="event-title"> <?php the_title() ?> </h4>
    <p>
      <?php
      $content = get_the_content();
      // $workdCount = is_front_page() ? 12 : 32;
      $trimmed_content = wp_trim_words($content, 36, '...');
      echo $trimmed_content;
      ?>
    </p>
  </div>
</a>
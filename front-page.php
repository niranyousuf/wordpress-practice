<?php

get_header();

?>


<section id="hero" class="hero-banner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/hero.jpg);">
  <div class="container">
    <div class="hero-content">
      <h1>WordPress Experience in all new ways</h1>
      <p>
        Experience remarkable WordPress products with a new level of power, beauty, and
        human-centered designs.
        Think you know WordPress products? Think deeper!
      </p>
      <a class="btn btn-big" href="<?php echo get_post_type_archive_link('program') ?>">Take a look</a>
    </div>
  </div>
</section>

<section class="section-padding news-and-events" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/feature-bg.svg);">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title">
          <h2>Upcoming Events</h2>
        </div>
      </div>
    </div>
    <div class="row">

      <div class="col-lg-6">
        <div class="section-media">
          <img src="<?php echo get_template_directory_uri(); ?>/images/event.svg" alt="">
        </div>
      </div>

      <div class="col-lg-6">
        <div class="latest-events latest">

          <?php

          $today = date('Ymd');
          $homepageEvents = new WP_Query(array(
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
              )
            )
          ));

          while ($homepageEvents->have_posts()) {
            $homepageEvents->the_post();

            get_template_part('template-parts/content', 'event');
          }

          wp_reset_postdata();

          ?>

          <div class="text-center">
            <a class="btn big-btn event-cta-btn" href="<?php echo site_url('/events'); ?>">View all Event </a>
          </div>
        </div>
      </div>


    </div>
  </div>
</section>

<section class="section-padding news-and-events" style="display: none;">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title">
          <h2>Latest News</h2>
        </div>
      </div>
    </div>

    <div class="row">

      <div class="col-lg-6 order-last order-lg-first">
        <div class="latest-news latest">

          <?php
          $homepagePost = new WP_Query(array(
            'posts_per_page' => 3
          ));
          while ($homepagePost->have_posts()) :
            $homepagePost->the_post();
          ?>

            <div class="latest-details">
              <a class="latest-date" href="<?php the_permalink(); ?>">
                <span class="latest-month"><?php the_time('M') ?></span>
                <span class="latest-day"><?php the_time('d') ?></span>
              </a>
              <div class="latest-content">
                <h5 class="latest-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <p><?php
                    $content = get_the_content();
                    $trimmed_content = wp_trim_words($content, 12, '...');
                    echo $trimmed_content;

                    // if(has_excerpt()) {
                    //     echo get_the_excerpt();
                    // } else {
                    //     echo $trimmed_content; 
                    // }
                    ?>
                  <a href="<?php the_permalink(); ?>">Read more</a>
                </p>
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata(); ?>

          <div class="text-center">
            <a class="btn big-btn latest-cta-btn" href="<?php echo get_post_type_archive_link('event') ?>">View all blog posts </a>
          </div>
        </div>
      </div>

      <div class="col-lg-6 order-first order-lg-last">
        <div class="section-media">
          <img src="<?php echo get_template_directory_uri(); ?>/images/news-2.svg" alt="">
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Core services section -->
<section class="core-service section-padding" style="display: none;">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title">
          <h2>Get the most reliable resources with beginner friendly guideline</h2>
        </div>
      </div>
    </div>

    <div class="row">

      <div class="col-lg-4 col-md-6">
        <div class="service-block">
          <span class="layer"></span>
          <!-- <img src="/assets/img/service/automatic-order-export.svg" alt="Block Image"> -->
          <h3>Scratch</h3>
          <p>Hello World! Learn basic WordPress and start roaming with simple and easy steps! </p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-block">
          <span class="layer"></span>
          <!-- <img src="/assets/img/service/automatic-order-export.svg" alt="Block Image"> -->
          <h3>Speed</h3>
          <p>Optimizations, plugins and suggestions to help speed up your WordPress website.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-block">
          <span class="layer"></span>
          <!-- <img src="/assets/img/service/automatic-order-export.svg" alt="Block Image"> -->
          <h3>Security</h3>
          <p>Harden site security to help your website keep safe from the malicious hackers.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-block">
          <span class="layer"></span>
          <!-- <img src="/assets/img/service/automatic-order-export.svg" alt="Block Image"> -->
          <h3>SEO</h3>
          <p>Most recommended steps, plugins and strategies for having better SEO solutions. </p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-block">
          <span class="layer"></span>
          <!-- <img src="/assets/img/service/automatic-order-export.svg" alt="Block Image"> -->
          <h3>Experience</h3>
          <p>Gets the best ideas for your WordPress usage. Quick resource guide to ease your hassle.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-block">
          <span class="layer"></span>
          <!-- <img src="/assets/img/service/automatic-order-export.svg" alt="Block Image"> -->
          <h3>Technical errors</h3>
          <p>Get technical help from the professionals. We share our real life experiences here.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-block">
          <span class="layer"></span>
          <!-- <img src="/assets/img/service/automatic-order-export.svg" alt="Block Image"> -->
          <h3>Online Store</h3>
          <p>Quick and smart solutions for your business. Level up your business with an online store.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-block">
          <span class="layer"></span>
          <!-- <img src="/assets/img/service/automatic-order-export.svg" alt="Block Image"> -->
          <h3>Trending</h3>
          <p>Stay up to date with the latest WordPress news, updates and whereabouts</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-block">
          <span class="layer"></span>
          <!-- <img src="/assets/img/service/automatic-order-export.svg" alt="Block Image"> -->
          <h3>Promote</h3>
          <p>Place your products for promoting and help people to find out their solutions </p>
        </div>
      </div>

    </div>
  </div>
</section>




<div class="testimonials" style="display: none;">
  <div class="testimonial owl-carousel">

    <div class="single-slide" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/apples.jpg);">
      <div class="slide-content">
        <h2>This is awesome</h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio, sit!</p>
        <a href="#" class="btn">Details</a>
      </div>
    </div>

    <div class="single-slide" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/bread.jpg);">
      <div class="slide-content">
        <h2>This is awesome</h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio, sit!</p>
        <a href="#" class="btn">Details</a>
      </div>
    </div>

    <div class="single-slide" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/bus.jpg);">
      <div class="slide-content">
        <h2>This is awesome</h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio, sit!</p>
        <a href="#" class="btn">Details</a>
      </div>
    </div>

  </div>
</div>

<!-- <div class="scroller">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h2><marquee>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero quia rem modi non, id fugit. A earum dicta nulla voluptatibus consequatur ad optio.</marquee></h2>
                </div>
            </div>
        </div>
    </div> -->

<?php
get_footer();

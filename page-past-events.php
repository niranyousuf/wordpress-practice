<?php 

get_header(); 


pageBanner(array(
    'title' => 'Past Events',
    'subtitle' => 'A recap of our past events.'
));

?>


    <section class="post-page">
        <div class="container">
            <div class="row">

                <?php
                
                $today = date('Ymd');
                $pastEvents = new WP_Query(array(
                    'paged' => get_query_var('paged', 1),
                    'post_type' => 'event',
                    'meta_key' => 'event_date',
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC',
                    'meta_query' => array(
                        array(
                            'key' => 'event_date',
                            'compare' => '<',
                            'value' => $today,
                            'type' => 'numeric'
                        )
                    )
                ));

                while($pastEvents->have_posts()) : $pastEvents->the_post();
                
                ?>

                <div class="col-md-12">
                    <div class="single__post max_container">
                        
                    <?php  get_template_part('template-parts/content', 'event'); ?>

                    </div>
                </div>

                <?php endwhile; ?>

                <div class="col-md-12">
                    <div class="pagination max_container">
                        <?php echo paginate_links(array(
                            'total' => $pastEvents->max_num_pages
                        )); ?>
                    </div>
                </div>

            </div> <!-- ./Row end -->
        </div>
    </section>

<?php get_footer();
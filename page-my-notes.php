<?php

if(!is_user_logged_in()) {
    wp_redirect(esc_url(site_url('/')));
    exit;
};

get_header();


while(have_posts()) : the_post();

pageBanner();

?>

	<div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page__content max_container">

                        <div class="note-list" id="my-note">
                            <?php 
                                $userNotes = new WP_Query(array(
                                    'post_type' => 'note',
                                    'posts_per_page' => -1,
                                    'author' => get_current_user_id()
                                ));

                                while($userNotes->have_posts()) :
                                    $userNotes->the_post();
                            ?>

                            <div class="note_body" data-id="<?php the_ID(); ?>"=>
                                <input readonly class="note-title" value="<?php echo esc_attr(get_the_title()); ?>">
                                
                                <div class="btns">
                                    <button class="edit-note"><span class="icon icon-edit"></span> Edit</button>
                                    <button class="delete-note"><span class="icon icon-trash-empty"></span> Delete</button>
                                </div>

                                <textarea readonly class="note-body"><?php echo esc_attr( wp_strip_all_tags( get_the_content() ) ); ?></textarea>

                                <button class="update-note">Save <span class="icon icon-right"></span></button>

                                
                            </div>

                            <?php endwhile; wp_reset_query(); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
endwhile;
get_footer();
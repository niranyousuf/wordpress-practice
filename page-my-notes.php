<?php

if (!is_user_logged_in()) {
  wp_redirect(esc_url(site_url('/')));
  exit;
};

get_header();


while (have_posts()) : the_post();

  pageBanner();

?>

  <div class="note_page">
    <div class="container">
      <div class="page-content">

        <div class="new-note">
          <h2>Create New Note</h2>
          <div class="field--group">
            <input class="new-note-title" placeholder="Write your note title">
            <textarea class="new-note-content" placeholder="Write your note here"></textarea>
            <button class="create-note">Create Note</button>
          </div>
          <p class="note-limit">Note limit reached: delete an existing note to make room for new one.</p>
        </div>


        <div class="note-list" id="my-notes">
          <?php
          $userNotes = new WP_Query(array(
            'post_type' => 'note',
            'posts_per_page' => -1,
            'author' => get_current_user_id()
          ));
          while ($userNotes->have_posts()) : $userNotes->the_post();
          ?>
            <div class="note_body" data-id="<?php the_ID(); ?>"=>
              <input readonly class="note-title" value="<?php echo str_replace('Private: ', '', esc_attr(get_the_title())); ?>">
              <div class="btns">
                <button class="edit-note"><span class="icon icon-edit"></span> Edit</button>
                <button class="delete-note"><span class="icon icon-trash-empty"></span> Delete</button>
              </div>
              <textarea readonly class="note-content"><?php echo esc_textarea(wp_strip_all_tags(get_the_content())); ?></textarea>
              <button class="update-note">Save <span class="icon icon-right"></span></button>
            </div>
          <?php endwhile;
          wp_reset_query(); ?>
        </div>

      </div>
    </div>
  </div>

<?php
endwhile;
get_footer();

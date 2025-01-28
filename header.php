<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header>
    <div class="container">
      <div class="navbar_wrapper">


        <h1 class="navbar_brand" title="Code Monstar">
          <a href="<?php echo site_url(); ?>">
            <?php get_template_part('svgs/logo'); ?>
          </a>
        </h1>


        <nav class="navbar_menu" data-visible="false">

          <h1 class="menu_logo" title="Code Monstar">
            <a href="<?php echo site_url(); ?>">
              <?php get_template_part('svgs/logo'); ?>
            </a>
          </h1>

          <ul class="main_menu">
            <li class="<?php if (is_page('about-us')) echo 'current-menu-item'; ?>">
              <a href="<?php echo site_url('/about-us') ?>">About Us</a>
            </li>

            <li class="<?php if (get_post_type() == 'program') echo 'current-menu-item'; ?>">
              <a href="<?php echo get_post_type_archive_link('program') ?>">Programs</a>
            </li>

            <li class="<?php if (get_post_type() == 'event' || is_page('past-events')) echo 'current-menu-item'; ?>">
              <a href="<?php echo get_post_type_archive_link('event') ?>">Events</a>
            </li>

            <li class="<?php if (get_post_type() == 'campus') echo 'current-menu-item'; ?>">
              <a href="<?php echo get_post_type_archive_link('campus') ?>">Campuses</a>
            </li>

            <li class="<?php if (get_post_type() == 'post') echo 'current-menu-item'; ?>">
              <a href="<?php echo site_url('/blog') ?>">Blog</a>
            </li>

          </ul>

          <div class="user_nav">
            <?php if (is_user_logged_in()) : ?>
              <a class="btn light" href="<?php echo esc_url(site_url('/my-notes')); ?>">My Notes</a>
              <a class="btn btn_user" href="<?php echo wp_logout_url(); ?>">
                <span class="user_avatar"><?php echo get_avatar(get_current_user_id(), 60); ?></span>
                <span class="user_name">Log Out</span>
              </a>
            <?php else: ?>
              <a class="btn light" href="<?php echo wp_login_url(); ?>">Login</a>
              <a class="btn" href="<?php echo wp_registration_url(); ?>">Sign Up</a>
            <?php endif; ?>
            <a class="search-btn" href="<?php echo esc_url(site_url('/search')); ?>">
              <span class="icon icon-search"></span>
            </a>

          </div>
        </nav>


        <button class="navbar_toggler" type="button" aria-expanded="false">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </button>

      </div>
    </div>

  </header>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<header class="fixed-top">
    <nav class="navbar">

        <div class="container">
            <a class="navbar-brand" href="<?php echo site_url(); ?>">Code<span>Monster</span></a>
            
            <button class="navbar-toggler" type="button">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>

            <div class="menu_group">
                <div class="main_menu">
                    <ul class="navBar">
                        <li class="nav-item <?php if (is_page('about-us')) echo 'current-menu-item'; ?>">
                            <a class="nav-link" href="<?php echo site_url('/about-us') ?>">About Us</a>
                        </li>

                        <li class="nav-item <?php if (get_post_type() == 'program') echo 'current-menu-item'; ?>">
                            <a class="nav-link" href="<?php echo get_post_type_archive_link('program') ?>">Programs</a>
                        </li>

                        <li class="nav-item <?php if (get_post_type() == 'event' || is_page('past-events')) echo 'current-menu-item'; ?>">
                            <a class="nav-link" href="<?php echo get_post_type_archive_link('event') ?>">Events</a>
                        </li>

                        <li class="nav-item <?php if (get_post_type() == 'campus') echo 'current-menu-item'; ?>">
                            <a class="nav-link" href="<?php echo get_post_type_archive_link('campus') ?>">Campuses</a>
                        </li>
                        
                        <li class="nav-item <?php if (get_post_type() == 'post') echo 'current-menu-item'; ?>">
                            <a class="nav-link" href="<?php echo site_url('/blog') ?>">Blog</a>
                        </li>

                    </ul>
                </div>
                <div class="user_menu">
                    <ul class="user-nav">
                        <?php if(is_user_logged_in()) : ?>
                            <li class="nav-item">
                                <a class="nav-link btn-mini bg_sec" href="<?php echo esc_url(site_url('/my-notes')); ?>">My Notes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-mini" href="<?php echo wp_logout_url(); ?>">
                                    <span class="user_avatar"><?php echo get_avatar(get_current_user_id(), 60); ?></span>
                                    <span class="btn_text">Log Out</span>
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link btn-mini bg_sec" href="<?php echo wp_login_url(); ?>">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-mini" href="<?php echo wp_registration_url(); ?>">Sign Up</a>
                            </li>
                        <?php endif; ?>



                        <li class="nav-item">
                            <a class="search-btn nav-link" href="<?php echo esc_url(site_url('/search')); ?>"><span class="icon icon-search"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
            
        </div>
        
    </nav>
</header>
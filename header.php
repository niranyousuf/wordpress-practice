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

                        
                        <!-- <li class="nav-item">
                            <a class="search-btn nav-link" href="#"><span class="icon icon-search"></span></a>
                        </li> -->
                        <li class="nav-item">
                            <a class="search-btn nav-link" href="<?php echo esc_url(site_url('/search')) ?>"><span class="icon icon-search"></span></a>
                        </li>
                    </ul>
                </div>
                
            </div>
            
        </nav>
    </header>
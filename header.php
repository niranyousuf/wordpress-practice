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
                <a class="navbar-brand" href="<?php echo site_url(); ?>">Coding<span>Tutor</span></a>
                
                <button class="navbar-toggler" type="button">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </button>

                <div class="main_menu">
                    <ul class="navBar">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('/about-us') ?>">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Campus</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Blog</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Notes</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
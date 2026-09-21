<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link visually-hidden" href="#main-content"><?php esc_html_e( 'Skip to content', 'natural-dentistry' ); ?></a>

<!-- ═══════════════════════════════════════════
     SITE HEADER
═══════════════════════════════════════════ -->
<header id="site-header" role="banner">
    <div class="container">
        <div class="header-inner">

            <!-- Logo -->
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" rel="home" aria-label="<?php bloginfo('name'); ?> — Home">
                <?php if ( has_custom_logo() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <span class="site-logo__name"><?php bloginfo( 'name' ); ?></span>
                    <span class="site-logo__tagline"><?php esc_html_e( 'Biological Dentistry', 'natural-dentistry' ); ?></span>
                <?php endif; ?>
            </a>

            <!-- Primary Navigation (desktop) -->
            <nav class="primary-nav-wrap" aria-label="<?php esc_attr_e( 'Primary Navigation', 'natural-dentistry' ); ?>">
                <?php
                wp_nav_menu( [
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'primary-nav',
                    'fallback_cb'    => 'nd_fallback_nav',
                    'depth'          => 1,
                ] );
                ?>
            </nav>

            <!-- Header CTA -->
            <div class="header-cta">
                <a href="tel:<?php echo esc_attr( get_theme_mod( 'nd_phone', '+15550000000' ) ); ?>"
                   class="header-phone" aria-label="Call our office">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <?php echo esc_html( get_theme_mod( 'nd_phone', '+1 (555) 000-0000' ) ); ?>
                </a>
                <a href="#contact" class="btn btn-primary d-none d-md-inline-flex">
                    <?php esc_html_e( 'Schedule Consultation', 'natural-dentistry' ); ?>
                </a>
            </div>

            <!-- Hamburger -->
            <button class="nav-toggle" aria-label="<?php esc_attr_e( 'Toggle mobile menu', 'natural-dentistry' ); ?>" aria-expanded="false" aria-controls="mobile-nav">
                <span></span>
                <span></span>
                <span></span>
            </button>

        </div><!-- .header-inner -->
    </div><!-- .container -->
</header><!-- #site-header -->

<!-- Mobile Navigation Drawer -->
<nav id="mobile-nav" class="mobile-nav" aria-label="<?php esc_attr_e( 'Mobile Navigation', 'natural-dentistry' ); ?>">
    <?php
    wp_nav_menu( [
        'theme_location' => 'primary',
        'container'      => false,
        'menu_class'     => '',
        'fallback_cb'    => 'nd_mobile_fallback_nav',
        'depth'          => 1,
    ] );
    ?>
    <div class="mobile-cta">
        <a href="tel:<?php echo esc_attr( get_theme_mod( 'nd_phone', '+15550000000' ) ); ?>" class="btn btn-outline">
            <i class="fa fa-phone" aria-hidden="true"></i>
            <?php echo esc_html( get_theme_mod( 'nd_phone', '+1 (555) 000-0000' ) ); ?>
        </a>
        <a href="#contact" class="btn btn-primary">
            <?php esc_html_e( 'Schedule Consultation', 'natural-dentistry' ); ?>
        </a>
    </div>
</nav>

<!-- Main Content -->
<main id="main-content" tabindex="-1">
<?php

/**
 * Fallback nav for desktop — shows anchor links to page sections.
 */
function nd_fallback_nav() {
    $items = [
        '#about'       => 'About',
        '#services'    => 'Services',
        '#before-after'=> 'Gallery',
        '#testimonials'=> 'Patients',
        '#travel'      => 'Travel',
        '#publications'=> 'Research',
        '#contact'     => 'Contact',
    ];
    echo '<ul class="primary-nav">';
    foreach ( $items as $href => $label ) {
        echo '<li><a href="' . esc_attr( $href ) . '">' . esc_html( $label ) . '</a></li>';
    }
    echo '</ul>';
}

function nd_mobile_fallback_nav() {
    $items = [
        '#about'       => 'About Dr. May',
        '#services'    => 'Services',
        '#before-after'=> 'Before & After',
        '#testimonials'=> 'Patient Stories',
        '#travel'      => 'Traveling Patients',
        '#publications'=> 'Research',
        '#procedures'  => 'Procedures',
        '#contact'     => 'Contact',
    ];
    echo '<ul>';
    foreach ( $items as $href => $label ) {
        echo '<li><a href="' . esc_attr( $href ) . '">' . esc_html( $label ) . '</a></li>';
    }
    echo '</ul>';
}

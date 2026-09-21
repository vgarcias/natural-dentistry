<?php
/**
 * template-parts/section-hero.php
 * Hero / Banner section with animated entrance
 */
$hero_title = get_theme_mod( 'nd_hero_title', 'Biological Dentistry' );
$hero_sub   = get_theme_mod( 'nd_hero_sub',   '& Ceramic Implants' );
$hero_body  = get_theme_mod( 'nd_hero_body',  'Evidence-based biological dentistry that treats the whole person. Specializing in zirconia ceramic implants, cavitation surgery, and minimally invasive care.' );
$hero_image = get_theme_mod( 'nd_hero_image', '' );
?>

<!-- ════════════════════════════════════════════════
     SECTION: HERO
════════════════════════════════════════════════ -->
<section id="hero" aria-label="<?php esc_attr_e( 'Welcome to Natural Dentistry', 'natural-dentistry' ); ?>">

    <div class="hero-bg" <?php if ( $hero_image ) : ?>style="background-image: linear-gradient(160deg, rgba(10,10,10,0.7) 0%, rgba(10,10,10,0.4) 50%, rgba(10,10,10,0.65) 100%), url('<?php echo esc_url( $hero_image ); ?>')"<?php endif; ?> role="img" aria-label="<?php esc_attr_e( 'Dental clinic background', 'natural-dentistry' ); ?>"></div>

    <div class="container">
        <div class="hero-content">

            <!-- Certification badges -->
            <div class="hero-certs reveal" aria-label="<?php esc_attr_e( 'Professional certifications', 'natural-dentistry' ); ?>">
                <span class="cert-badge">DMD</span>
                <span class="cert-badge">AFAAID</span>
                <span class="cert-badge">IBDM</span>
                <span class="cert-badge"><?php esc_html_e( 'Biological Dentist', 'natural-dentistry' ); ?></span>
                <span class="cert-badge"><?php esc_html_e( 'Ceramic Implant Specialist', 'natural-dentistry' ); ?></span>
            </div>

            <!-- Main headline -->
            <h1 class="hero-title reveal reveal-delay-1">
                <?php echo esc_html( $hero_title ); ?><br>
                <em><?php echo esc_html( $hero_sub ); ?></em>
            </h1>

            <p class="hero-body reveal reveal-delay-2">
                <?php echo esc_html( $hero_body ); ?>
            </p>

            <div class="hero-actions reveal reveal-delay-3">
                <a href="#contact" class="btn btn-accent">
                    <i class="fa fa-calendar-check" aria-hidden="true"></i>
                    <?php esc_html_e( 'Schedule a Consultation', 'natural-dentistry' ); ?>
                </a>
                <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', get_theme_mod( 'nd_phone', '+15550000000' ) ) ); ?>" class="btn btn-ghost">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <?php echo esc_html( get_theme_mod( 'nd_phone', '+1 (555) 000-0000' ) ); ?>
                </a>
                <a href="#about" class="btn btn-ghost">
                    <?php esc_html_e( 'Learn More', 'natural-dentistry' ); ?>
                    <i class="fa fa-arrow-down" aria-hidden="true"></i>
                </a>
            </div>

        </div><!-- .hero-content -->
    </div><!-- .container -->

    <!-- Scroll cue -->
    <div class="hero-scroll" aria-hidden="true">
        <span><?php esc_html_e( 'Scroll', 'natural-dentistry' ); ?></span>
        <div class="hero-scroll__line"></div>
    </div>

</section><!-- #hero -->

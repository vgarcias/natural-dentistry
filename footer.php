<?php
// footer.php — Natural Dentistry Theme
$phone     = get_theme_mod( 'nd_phone',     '+1 (555) 000-0000' );
$email     = get_theme_mod( 'nd_email',     'info@naturaldentistry.com' );
$address   = get_theme_mod( 'nd_address',   '1234 Dental Way, Suite 100' );
$city      = get_theme_mod( 'nd_city',      'Washington' );
$state     = get_theme_mod( 'nd_state',     'DC' );
$zip       = get_theme_mod( 'nd_zip',       '20001' );
$instagram = get_theme_mod( 'nd_instagram', '' );
$facebook  = get_theme_mod( 'nd_facebook',  '' );
$youtube   = get_theme_mod( 'nd_youtube',   '' );
?>

</main><!-- #main-content -->

<!-- Lightbox Overlay -->
<div class="lightbox-overlay" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Image viewer', 'natural-dentistry' ); ?>">
    <button class="lightbox-close" aria-label="<?php esc_attr_e( 'Close image viewer', 'natural-dentistry' ); ?>">&times;</button>
    <img class="lightbox-img" src="" alt="">
</div>

<!-- ═══════════════════════════════════════════
     MAP SECTION
═══════════════════════════════════════════ -->
<section id="map-section" aria-label="<?php esc_attr_e( 'Clinic Location', 'natural-dentistry' ); ?>">
    <div class="map-container">
        <?php
        $lat     = get_theme_mod( 'nd_maps_lat', '38.9072' );
        $lng     = get_theme_mod( 'nd_maps_lng', '-77.0369' );
        $api_key = get_theme_mod( 'nd_maps_key', '' );
        if ( $api_key ) :
        ?>
        <iframe
            src="https://www.google.com/maps/embed/v1/place?key=<?php echo esc_attr( $api_key ); ?>&q=<?php echo esc_attr( $lat ); ?>,<?php echo esc_attr( $lng ); ?>&zoom=15"
            allowfullscreen
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="<?php esc_attr_e( 'Clinic location map', 'natural-dentistry' ); ?>"
        ></iframe>
        <?php else : ?>
        <!-- Placeholder when no API key is set — style mimics a map -->
        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:#1a1a1a;flex-direction:column;gap:1rem;">
            <i class="fa fa-map-location-dot" style="font-size:2.5rem;color:#c9a96e;" aria-hidden="true"></i>
            <p style="color:rgba(255,255,255,0.5);font-size:0.8rem;letter-spacing:0.1em;text-transform:uppercase;">
                <?php printf( esc_html__( '%1$s, %2$s %3$s', 'natural-dentistry' ), esc_html( $address ), esc_html( $city ), esc_html( $state ) ); ?>
            </p>
            <a href="https://www.google.com/maps/search/<?php echo rawurlencode( "$address $city $state $zip" ); ?>"
               target="_blank" rel="noopener noreferrer"
               class="btn btn-ghost"><?php esc_html_e( 'View on Google Maps', 'natural-dentistry' ); ?></a>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- ═══════════════════════════════════════════
     SITE FOOTER
═══════════════════════════════════════════ -->
<footer id="site-footer" role="contentinfo">
    <div class="container">

        <div class="footer-grid">

            <!-- Brand Column -->
            <div class="footer-brand">
                <div class="footer-brand__name"><?php bloginfo( 'name' ); ?></div>
                <div class="footer-brand__sub"><?php esc_html_e( 'Biological Dentistry & Ceramic Implants', 'natural-dentistry' ); ?></div>
                <p class="footer-brand__desc">
                    <?php esc_html_e( 'Evidence-based biological dentistry serving patients from 35 states and 15 countries. Led by Dr. Yuriy May, DMD — a globally recognized leader in ceramic implants and biological protocols.', 'natural-dentistry' ); ?>
                </p>
            </div>

            <!-- Services Column -->
            <div class="footer-col">
                <h5><?php esc_html_e( 'Services', 'natural-dentistry' ); ?></h5>
                <ul>
                    <li><a href="#services"><?php esc_html_e( 'Zirconia Ceramic Implants', 'natural-dentistry' ); ?></a></li>
                    <li><a href="#services"><?php esc_html_e( 'Full Mouth Reconstruction', 'natural-dentistry' ); ?></a></li>
                    <li><a href="#services"><?php esc_html_e( 'Front Tooth Implants', 'natural-dentistry' ); ?></a></li>
                    <li><a href="#services"><?php esc_html_e( 'Root Canal Alternatives', 'natural-dentistry' ); ?></a></li>
                    <li><a href="#services"><?php esc_html_e( 'Natural Cosmetics', 'natural-dentistry' ); ?></a></li>
                    <li><a href="#services"><?php esc_html_e( 'Jawbone Cavitations', 'natural-dentistry' ); ?></a></li>
                </ul>
            </div>

            <!-- Navigate Column -->
            <div class="footer-col">
                <h5><?php esc_html_e( 'Navigate', 'natural-dentistry' ); ?></h5>
                <?php
                wp_nav_menu( [
                    'theme_location' => 'footer',
                    'container'      => false,
                    'items_wrap'     => '<ul>%3$s</ul>',
                    'fallback_cb'    => function() {
                        $links = [
                            '#about'        => 'About Dr. May',
                            '#before-after' => 'Before & After',
                            '#testimonials' => 'Patient Stories',
                            '#travel'       => 'Traveling Patients',
                            '#publications' => 'Publications',
                            '#contact'      => 'Schedule Appointment',
                        ];
                        echo '<ul>';
                        foreach ( $links as $href => $label ) {
                            echo '<li><a href="' . esc_attr( $href ) . '">' . esc_html( $label ) . '</a></li>';
                        }
                        echo '</ul>';
                    },
                ] );
                ?>
            </div>

            <!-- Contact Column -->
            <div class="footer-col">
                <h5><?php esc_html_e( 'Contact', 'natural-dentistry' ); ?></h5>
                <ul>
                    <li>
                        <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>">
                            <i class="fa fa-phone fa-fw" aria-hidden="true"></i>
                            <?php echo esc_html( $phone ); ?>
                        </a>
                    </li>
                    <li>
                        <a href="mailto:<?php echo esc_attr( $email ); ?>">
                            <i class="fa fa-envelope fa-fw" aria-hidden="true"></i>
                            <?php echo esc_html( $email ); ?>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.google.com/maps/search/<?php echo rawurlencode( "$address $city $state $zip" ); ?>" target="_blank" rel="noopener noreferrer">
                            <i class="fa fa-location-dot fa-fw" aria-hidden="true"></i>
                            <?php echo esc_html( "$address, $city, $state $zip" ); ?>
                        </a>
                    </li>
                </ul>
            </div>

        </div><!-- .footer-grid -->

        <div class="footer-bottom">
            <p class="footer-copy">
                &copy; <?php echo esc_html( date( 'Y' ) ); ?>
                <?php bloginfo( 'name' ); ?>.
                <?php esc_html_e( 'All rights reserved.', 'natural-dentistry' ); ?>
                &nbsp;|&nbsp;
                <a href="<?php echo esc_url( get_privacy_policy_url() ); ?>"><?php esc_html_e( 'Privacy Policy', 'natural-dentistry' ); ?></a>
            </p>

            <div class="footer-social" aria-label="<?php esc_attr_e( 'Social media links', 'natural-dentistry' ); ?>">
                <?php if ( $instagram ) : ?>
                <a href="<?php echo esc_url( $instagram ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                    <i class="fab fa-instagram" aria-hidden="true"></i>
                </a>
                <?php endif; ?>
                <?php if ( $facebook ) : ?>
                <a href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                </a>
                <?php endif; ?>
                <?php if ( $youtube ) : ?>
                <a href="<?php echo esc_url( $youtube ); ?>" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                    <i class="fab fa-youtube" aria-hidden="true"></i>
                </a>
                <?php endif; ?>
            </div>
        </div><!-- .footer-bottom -->

    </div><!-- .container -->
</footer><!-- #site-footer -->

<?php wp_footer(); ?>
</body>
</html>

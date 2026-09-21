<?php
/**
 * template-parts/section-stats.php
 * Stats bar displayed below the hero
 */
?>
<!-- ════════════════════════════════════════════════
     SECTION: STATS BAR
════════════════════════════════════════════════ -->
<section id="stats-bar" aria-label="<?php esc_attr_e( 'Practice statistics', 'natural-dentistry' ); ?>">
    <div class="container">
        <div class="stats-grid">

            <div class="stat-item reveal">
                <div class="stat-number" data-count="1100">1,100<sup>+</sup></div>
                <div class="stat-label"><?php esc_html_e( 'Ceramic Implants Placed', 'natural-dentistry' ); ?></div>
            </div>

            <div class="stat-item reveal reveal-delay-1">
                <div class="stat-number" data-count="200">200<sup>+</sup></div>
                <div class="stat-label"><?php esc_html_e( 'Full Arch Restorations', 'natural-dentistry' ); ?></div>
            </div>

            <div class="stat-item reveal reveal-delay-2">
                <div class="stat-number" data-count="35">35<sup>+</sup></div>
                <div class="stat-label"><?php esc_html_e( 'States Represented', 'natural-dentistry' ); ?></div>
            </div>

            <div class="stat-item reveal reveal-delay-3">
                <div class="stat-number" data-count="15">15<sup>+</sup></div>
                <div class="stat-label"><?php esc_html_e( 'Countries Served', 'natural-dentistry' ); ?></div>
            </div>

        </div>
    </div>
</section>

<?php
/**
 * template-parts/section-about.php
 * About the Doctor section
 */
?>
<!-- ════════════════════════════════════════════════
     SECTION: ABOUT THE DOCTOR
════════════════════════════════════════════════ -->
<section id="about" class="section-pad" aria-labelledby="about-heading">
    <div class="container">
        <div class="grid-2 grid-2-lg" style="align-items:center;">

            <!-- Doctor photo -->
            <div class="about-media reveal">
                <?php
                $about_img_id = get_theme_mod( 'nd_about_image', 0 );
                if ( $about_img_id ) {
                    echo wp_get_attachment_image( $about_img_id, 'nd-portrait', false, [
                        'class'   => 'about-photo',
                        'loading' => 'lazy',
                        'alt'     => __( 'Dr. Yuriy May, DMD', 'natural-dentistry' ),
                    ] );
                } else {
                    nd_image( 0, 'nd-portrait', __( 'Dr. Yuriy May, DMD', 'natural-dentistry' ), 'about-photo' );
                }
                ?>
                <!-- Credential overlay -->
                <div class="about-credentials">
                    <span class="cred-pill">DMD</span>
                    <span class="cred-pill">AFAAID Fellow</span>
                    <span class="cred-pill">IBDM Member</span>
                    <span class="cred-pill">SMART Protocol</span>
                    <span class="cred-pill">PRF Specialist</span>
                    <span class="cred-pill">IV Sedation</span>
                </div>
            </div><!-- .about-media -->

            <!-- Content -->
            <div class="about-content">
                <div class="section-eyebrow reveal">
                    <span><?php esc_html_e( 'About the Doctor', 'natural-dentistry' ); ?></span>
                </div>

                <h2 class="dr-name reveal reveal-delay-1" id="about-heading">
                    Dr. Yuriy May, <em>DMD</em>
                </h2>
                <p class="dr-title-sub reveal reveal-delay-1">
                    <?php esc_html_e( 'Biological & Ceramic Implant Specialist', 'natural-dentistry' ); ?>
                </p>

                <div class="about-bio reveal reveal-delay-2">
                    <?php
                    // Check for a 'About Dr. May' page or use theme mod
                    $about_text = get_theme_mod( 'nd_about_bio', '' );
                    if ( empty( $about_text ) ) {
                        $about_text = __( 'Dr. Yuriy May, DMD, is a trailblazer in biological and ceramic implant dentistry. With over a decade of dedicated practice, he has placed more than 1,100 zirconia ceramic implants, helping patients reclaim their health and confidence using metal-free, biocompatible solutions.

His philosophy is simple but demanding: dentistry must serve the whole person. Dr. May\'s commitment to biological protocols includes evidence-based standards that promote healthspan and longevity — treating every case as part of a patient\'s larger systemic health picture.

Dr. May holds advanced fellowships in implant dentistry and biological medicine, is trained in IV sedation, PRF therapy, and cavitation surgery, and has published multiple peer-reviewed studies in leading implant journals.', 'natural-dentistry' );
                    }
                    echo '<p>' . nl2br( esc_html( $about_text ) ) . '</p>';
                    ?>
                </div>

                <div class="about-signature reveal reveal-delay-3">Dr. Yuriy May</div>
                <p class="about-sig-title reveal reveal-delay-3">
                    <?php esc_html_e( 'DMD · AFAAID · IBDM', 'natural-dentistry' ); ?>
                </p>

                <div class="mt-4 reveal reveal-delay-4">
                    <a href="#contact" class="btn btn-primary">
                        <?php esc_html_e( 'Schedule with Dr. May', 'natural-dentistry' ); ?>
                    </a>
                </div>
            </div><!-- .about-content -->

        </div>
    </div>
</section>

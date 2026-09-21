<?php
/**
 * template-parts/section-services.php
 * Main Services grid + Philosophy banner
 */
$services = [
    [
        'tag'   => __( 'Implants', 'natural-dentistry' ),
        'title' => __( 'Zirconia Ceramic Implants', 'natural-dentistry' ),
        'desc'  => __( 'Metal-free, biocompatible implants that integrate naturally with your body\'s biology.', 'natural-dentistry' ),
        'link'  => '#procedures',
        'icon'  => 'tooth',
    ],
    [
        'tag'   => __( 'Surgery', 'natural-dentistry' ),
        'title' => __( 'Root Canal Removal', 'natural-dentistry' ),
        'desc'  => __( 'Biological removal of failed root canals and placement of ceramic restorations.', 'natural-dentistry' ),
        'link'  => '#root-canal-edu',
        'icon'  => 'fa-x-ray',
    ],
    [
        'tag'   => __( 'Implants', 'natural-dentistry' ),
        'title' => __( 'Front Tooth Implants', 'natural-dentistry' ),
        'desc'  => __( 'Aesthetic anterior implants that restore your natural smile line with precision.', 'natural-dentistry' ),
        'link'  => '#procedures',
        'icon'  => 'smile',
    ],
    [
        'tag'   => __( 'Full Arch', 'natural-dentistry' ),
        'title' => __( 'Full Mouth Ceramic Implants', 'natural-dentistry' ),
        'desc'  => __( 'Complete All-on-X reconstructions using zirconia for total oral rehabilitation.', 'natural-dentistry' ),
        'link'  => '#procedures',
        'icon'  => 'teeth',
    ],
    [
        'tag'   => __( 'Biological', 'natural-dentistry' ),
        'title' => __( 'Jawbone Cavitations', 'natural-dentistry' ),
        'desc'  => __( 'Diagnosis and treatment of avascular necrosis using ozone and PRF protocols.', 'natural-dentistry' ),
        'link'  => '#procedures',
        'icon'  => 'fa-bone',
    ],
    [
        'tag'   => __( 'Cosmetics', 'natural-dentistry' ),
        'title' => __( 'Natural Cosmetics', 'natural-dentistry' ),
        'desc'  => __( 'Mercury-free, toxin-free aesthetic dentistry that enhances your natural beauty.', 'natural-dentistry' ),
        'link'  => '#procedures',
        'icon'  => 'fa-star',
    ],
];
?>
<!-- ════════════════════════════════════════════════
     SECTION: SERVICES
════════════════════════════════════════════════ -->
<section id="services" class="section-pad" aria-labelledby="services-heading">
    <div class="container">

        <div class="section-header reveal">
            <div class="section-eyebrow">
                <span><?php esc_html_e( 'Our Specialties', 'natural-dentistry' ); ?></span>
            </div>
            <h2 class="t-heading" id="services-heading">
                <?php esc_html_e( 'Perfecting Every', 'natural-dentistry' ); ?>
                <em><?php esc_html_e( 'Detail', 'natural-dentistry' ); ?></em>
            </h2>
            <p class="t-body-lg services-intro">
                <?php esc_html_e( 'Biological dentistry means choosing materials and techniques that work with your body — not against it. Every service is guided by that principle.', 'natural-dentistry' ); ?>
            </p>
        </div>

        <div class="services-grid" role="list">
            <?php foreach ( $services as $i => $service ) : ?>
            <article class="service-card reveal reveal-delay-<?php echo min( $i + 1, 5 ); ?>" role="listitem">
                <div class="service-card__bg" aria-hidden="true"></div>
                <p class="service-card__tag"><?php echo esc_html( $service['tag'] ); ?></p>
                <h3 class="service-card__title">
                    <a href="<?php echo esc_attr( $service['link'] ); ?>"><?php echo esc_html( $service['title'] ); ?></a>
                </h3>
                <span class="service-card__arrow" aria-hidden="true">&#x2197;</span>
            </article>
            <?php endforeach; ?>
        </div><!-- .services-grid -->

        <div class="text-center mt-5 reveal">
            <a href="#contact" class="btn btn-outline">
                <?php esc_html_e( 'Discuss Your Treatment', 'natural-dentistry' ); ?>
            </a>
        </div>

    </div>
</section><!-- #services -->

<!-- ════════════════════════════════════════════════
     SECTION: PHILOSOPHY BANNER
════════════════════════════════════════════════ -->
<section id="philosophy" class="section-pad section-dark" aria-labelledby="philosophy-heading">
    <div class="container">
        <div class="philosophy-content reveal">
            <div class="section-eyebrow" style="justify-content:center;">
                <span><?php esc_html_e( 'Our Philosophy', 'natural-dentistry' ); ?></span>
            </div>
            <blockquote class="philosophy-quote" id="philosophy-heading">
                "<?php esc_html_e( 'Dentistry Must Serve the Whole Person', 'natural-dentistry' ); ?>"
            </blockquote>
            <p class="philosophy-body">
                <?php esc_html_e( "Dr. May's philosophy is grounded in a simple but demanding belief: dentistry must serve the whole person. His commitment to biological protocols includes a dedication to evidence-based standards that promote healthspan and longevity — seeing each patient's oral health as inseparable from their systemic wellbeing.", 'natural-dentistry' ); ?>
            </p>
            <a href="#about" class="btn btn-ghost">
                <?php esc_html_e( 'Read More About Dr. May', 'natural-dentistry' ); ?>
            </a>
        </div>
    </div>
</section>

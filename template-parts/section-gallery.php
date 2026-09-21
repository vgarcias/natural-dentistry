<?php
/**
 * template-parts/section-gallery.php
 * Before & After gallery with lightbox support
 */

// Fetch BA cases from CPT or use placeholder data
$cases = [];
$ba_query = new WP_Query( [
    'post_type'      => 'nd_case',
    'posts_per_page' => 8,
    'post_status'    => 'publish',
] );
if ( $ba_query->have_posts() ) {
    while ( $ba_query->have_posts() ) {
        $ba_query->the_post();
        $cases[] = [
            'label'  => get_the_title(),
            'before' => get_post_meta( get_the_ID(), 'nd_before_image', true ),
            'after'  => get_post_meta( get_the_ID(), 'nd_after_image', true ),
        ];
    }
    wp_reset_postdata();
} else {
    // Demo placeholders — replace with actual image IDs in production
    $case_labels = [
        __( 'Full Arch Reconstruction', 'natural-dentistry' ),
        __( 'Anterior Implants', 'natural-dentistry' ),
        __( 'Zirconia Bridge', 'natural-dentistry' ),
        __( 'Cavitation & Implant', 'natural-dentistry' ),
        __( 'Smile Transformation', 'natural-dentistry' ),
        __( 'All-on-4 Ceramic', 'natural-dentistry' ),
        __( 'Crown Replacement', 'natural-dentistry' ),
        __( 'Natural Cosmetics', 'natural-dentistry' ),
    ];
    foreach ( $case_labels as $label ) {
        $cases[] = [ 'label' => $label, 'before' => '', 'after' => '' ];
    }
}
?>
<!-- ════════════════════════════════════════════════
     SECTION: BEFORE & AFTER GALLERY
════════════════════════════════════════════════ -->
<section id="before-after" class="section-pad" aria-labelledby="gallery-heading">
    <div class="container">
        <div class="section-header reveal">
            <div class="section-eyebrow">
                <span><?php esc_html_e( 'Clinical Results', 'natural-dentistry' ); ?></span>
            </div>
            <h2 class="t-heading" id="gallery-heading">
                <?php esc_html_e( 'Before &', 'natural-dentistry' ); ?>
                <em><?php esc_html_e( 'After', 'natural-dentistry' ); ?></em>
            </h2>
            <p class="t-body-lg" style="max-width:55ch;">
                <?php esc_html_e( 'Real patients, real outcomes. Each case represents Dr. May\'s commitment to precision, aesthetics, and long-term biological compatibility.', 'natural-dentistry' ); ?>
            </p>
        </div>
    </div>

    <div class="ba-grid reveal" role="list">
        <?php foreach ( $cases as $i => $case ) :
            $before_src = $case['before'] ? wp_get_attachment_image_url( $case['before'], 'nd-card' ) : '';
            $after_src  = $case['after']  ? wp_get_attachment_image_url( $case['after'],  'nd-card' ) : '';
        ?>
        <div class="ba-card reveal reveal-delay-<?php echo min( ($i % 4) + 1, 4 ); ?>"
             role="listitem"
             <?php if ( $after_src ) : ?>
             data-lightbox="<?php echo esc_url( $after_src ); ?>"
             data-lightbox-alt="<?php echo esc_attr( $case['label'] ); ?> — After"
             tabindex="0"
             aria-label="<?php echo esc_attr( sprintf( __( 'View %s clinical case', 'natural-dentistry' ), $case['label'] ) ); ?>"
             <?php endif; ?>>

            <?php if ( $after_src ) : ?>
            <img src="<?php echo esc_url( $after_src ); ?>"
                 alt="<?php echo esc_attr( $case['label'] . ' — After' ); ?>"
                 loading="lazy"
                 style="width:100%;height:100%;object-fit:cover;">
            <?php else : ?>
            <div class="ba-card__placeholder">
                <span class="ba-card__label"><?php echo esc_html( $case['label'] ); ?></span>
            </div>
            <?php endif; ?>

            <div class="ba-card__overlay" aria-hidden="true">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
                </svg>
            </div>
        </div>
        <?php endforeach; ?>
    </div><!-- .ba-grid -->

    <div class="container">
        <div class="text-center mt-5 reveal">
            <a href="#contact" class="btn btn-primary">
                <?php esc_html_e( 'Discuss Your Case', 'natural-dentistry' ); ?>
            </a>
        </div>
    </div>
</section><!-- #before-after -->

<?php
/**
 * template-parts/section-testimonials.php
 * Testimonials carousel with stars and location
 */
$testimonials = nd_get_testimonials( 9 );
?>
<!-- ════════════════════════════════════════════════
     SECTION: TESTIMONIALS
════════════════════════════════════════════════ -->
<section id="testimonials" class="section-pad" aria-labelledby="testimonials-heading">
    <div class="container">

        <div class="section-header section-header--center reveal">
            <div class="section-eyebrow">
                <span><?php esc_html_e( 'Patient Voices', 'natural-dentistry' ); ?></span>
            </div>
            <h2 class="t-heading" id="testimonials-heading">
                <?php esc_html_e( 'In Their', 'natural-dentistry' ); ?>
                <em><?php esc_html_e( 'Words', 'natural-dentistry' ); ?></em>
            </h2>
            <p class="t-body-lg" style="max-width:55ch;margin-inline:auto;">
                <?php esc_html_e( 'Patients travel from 35 states and 15 countries for Dr. May\'s biological approach. Here is what they say.', 'natural-dentistry' ); ?>
            </p>
        </div>

        <div class="testimonials-carousel reveal">
            <div class="testimonials-track" role="list">
                <?php foreach ( $testimonials as $testimonial ) :
                    // Handle both WP_Post objects and demo arrays
                    $is_post  = $testimonial instanceof WP_Post;
                    $name     = $is_post ? get_the_title( $testimonial ) : $testimonial['title'];
                    $location = $is_post ? get_post_meta( $testimonial->ID, 'nd_location', true ) : $testimonial['location'];
                    $text     = $is_post ? wp_strip_all_tags( apply_filters( 'the_content', $testimonial->post_content ) ) : $testimonial['content'];
                    $rating   = $is_post ? (int) get_post_meta( $testimonial->ID, 'nd_rating', true ) : $testimonial['rating'];
                    $initials = strtoupper( substr( $name, 0, 1 ) );
                    if ( strpos( $name, ' ' ) !== false ) {
                        $parts = explode( ' ', $name );
                        $initials = strtoupper( substr( $parts[0], 0, 1 ) . substr( end( $parts ), 0, 1 ) );
                    }
                ?>
                <div class="testimonial-slide" role="listitem">
                    <div class="testimonial-card">
                        <span class="testimonial-card__quote-mark" aria-hidden="true">&ldquo;</span>
                        <?php if ( $rating >= 1 ) : ?>
                        <div class="testimonial-stars" aria-label="<?php echo esc_attr( sprintf( __( '%d out of 5 stars', 'natural-dentistry' ), $rating ) ); ?>">
                            <?php echo str_repeat( '&#9733;', min( $rating, 5 ) ); ?>
                        </div>
                        <?php endif; ?>
                        <p class="testimonial-card__text"><?php echo esc_html( $text ); ?></p>
                        <div class="testimonial-card__author">
                            <div class="testimonial-card__avatar" aria-hidden="true"><?php echo esc_html( $initials ); ?></div>
                            <div>
                                <div class="testimonial-card__name"><?php echo esc_html( $name ); ?></div>
                                <?php if ( $location ) : ?>
                                <div class="testimonial-card__location"><?php echo esc_html( $location ); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div><!-- .testimonials-track -->
        </div><!-- .testimonials-carousel -->

        <!-- Carousel controls -->
        <div class="carousel-controls" aria-label="<?php esc_attr_e( 'Carousel navigation', 'natural-dentistry' ); ?>">
            <button class="carousel-btn carousel-prev" aria-label="<?php esc_attr_e( 'Previous testimonials', 'natural-dentistry' ); ?>">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                    <path d="M19 12H5m7 7-7-7 7-7"/>
                </svg>
            </button>
            <div class="carousel-dots" role="tablist" aria-label="<?php esc_attr_e( 'Testimonial pages', 'natural-dentistry' ); ?>"></div>
            <button class="carousel-btn carousel-next" aria-label="<?php esc_attr_e( 'Next testimonials', 'natural-dentistry' ); ?>">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                    <path d="M5 12h14m-7-7 7 7-7 7"/>
                </svg>
            </button>
        </div>

        <div class="text-center mt-5 reveal">
            <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'testimonials' ) ) ?: '#testimonials' ); ?>" class="btn btn-outline">
                <?php esc_html_e( 'Read All Patient Stories', 'natural-dentistry' ); ?>
            </a>
        </div>

    </div>
</section><!-- #testimonials -->

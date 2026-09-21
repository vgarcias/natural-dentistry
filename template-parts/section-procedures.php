<?php
/**
 * template-parts/section-travel.php
 * Traveling Patient Protocol section
 */
?>
<!-- ════════════════════════════════════════════════
     SECTION: TRAVELING PATIENT PROTOCOL
════════════════════════════════════════════════ -->
<section id="travel" class="section-pad section-dark" aria-labelledby="travel-heading">
    <div class="container">

        <div class="section-header reveal">
            <div class="section-eyebrow">
                <span><?php esc_html_e( 'Traveling Patients', 'natural-dentistry' ); ?></span>
            </div>
            <h2 class="t-heading" style="color:var(--color-white);" id="travel-heading">
                <?php esc_html_e( "It's Worth the", 'natural-dentistry' ); ?>
                <em style="color:var(--color-accent);"><?php esc_html_e( 'Trip', 'natural-dentistry' ); ?></em>
            </h2>
            <p class="t-body-lg" style="max-width:55ch;">
                <?php esc_html_e( "Patients travel from across the US and internationally because the level of biological expertise simply isn't available locally. We make the logistics easy.", 'natural-dentistry' ); ?>
            </p>
        </div>

        <div class="grid-2 travel-grid">

            <!-- Steps -->
            <div class="travel-steps">
                <div class="travel-step reveal">
                    <div class="travel-step__num" aria-hidden="true">01</div>
                    <div class="travel-step__content">
                        <h4><?php esc_html_e( 'Virtual Consultation', 'natural-dentistry' ); ?></h4>
                        <p><?php esc_html_e( 'Start with a comprehensive virtual exam. Send X-rays, photos, and a health history. We assess your case and create a full treatment plan before you arrive.', 'natural-dentistry' ); ?></p>
                    </div>
                </div>
                <div class="travel-step reveal reveal-delay-1">
                    <div class="travel-step__num" aria-hidden="true">02</div>
                    <div class="travel-step__content">
                        <h4><?php esc_html_e( 'Fly In & Same Day Evaluation', 'natural-dentistry' ); ?></h4>
                        <p><?php esc_html_e( 'Arrive the day prior to your procedure. Our team coordinates all logistics — from 3D CBCT scans to pre-operative blood work and PRF preparation.', 'natural-dentistry' ); ?></p>
                    </div>
                </div>
                <div class="travel-step reveal reveal-delay-2">
                    <div class="travel-step__num" aria-hidden="true">03</div>
                    <div class="travel-step__content">
                        <h4><?php esc_html_e( 'Procedure & Recovery', 'natural-dentistry' ); ?></h4>
                        <p><?php esc_html_e( 'Most single implants require a 48-hour stay. Full mouth reconstruction and complex cases typically require 72–96 hours. We stay in close contact throughout.', 'natural-dentistry' ); ?></p>
                    </div>
                </div>
                <div class="travel-step reveal reveal-delay-3">
                    <div class="travel-step__num" aria-hidden="true">04</div>
                    <div class="travel-step__content">
                        <h4><?php esc_html_e( 'Remote Follow-Up', 'natural-dentistry' ); ?></h4>
                        <p><?php esc_html_e( 'Comprehensive remote aftercare protocol. Regular virtual check-ins, written recovery guides, and 24/7 emergency contact for the first two weeks.', 'natural-dentistry' ); ?></p>
                    </div>
                </div>
            </div>

            <!-- Info cards -->
            <div>
                <div class="travel-info mb-4 reveal">
                    <div class="travel-info-card">
                        <div class="travel-info-card__val">48h</div>
                        <div class="travel-info-card__label"><?php esc_html_e( 'Single Implant Stay', 'natural-dentistry' ); ?></div>
                    </div>
                    <div class="travel-info-card">
                        <div class="travel-info-card__val">96h</div>
                        <div class="travel-info-card__label"><?php esc_html_e( 'Full Arch Stay', 'natural-dentistry' ); ?></div>
                    </div>
                    <div class="travel-info-card">
                        <div class="travel-info-card__val">35+</div>
                        <div class="travel-info-card__label"><?php esc_html_e( 'States Served', 'natural-dentistry' ); ?></div>
                    </div>
                    <div class="travel-info-card">
                        <div class="travel-info-card__val">15+</div>
                        <div class="travel-info-card__label"><?php esc_html_e( 'Countries Served', 'natural-dentistry' ); ?></div>
                    </div>
                </div>

                <!-- Featured travel cases -->
                <?php
                $travel_cases = [
                    [ 'proc' => __( 'Root Canal Removal + Ceramic Implant', 'natural-dentistry' ), 'from' => __( 'Boston, MA', 'natural-dentistry' ), 'stay' => '48h' ],
                    [ 'proc' => __( 'Surgery with Ozone + Cavitation Treatment', 'natural-dentistry' ), 'from' => __( 'Vancouver, Canada', 'natural-dentistry' ), 'stay' => '72h' ],
                    [ 'proc' => __( 'All-on-4 Full Arch Ceramic Implants', 'natural-dentistry' ), 'from' => __( 'London, UK', 'natural-dentistry' ), 'stay' => '96h' ],
                ];
                ?>
                <div style="display:flex;flex-direction:column;gap:1rem;" class="reveal reveal-delay-1">
                    <?php foreach ( $travel_cases as $tc ) : ?>
                    <div style="border:1px solid rgba(255,255,255,0.08);padding:1.2rem;display:flex;justify-content:space-between;align-items:center;gap:1rem;">
                        <div>
                            <div style="font-size:0.83rem;color:var(--color-white);margin-bottom:0.2rem;"><?php echo esc_html( $tc['proc'] ); ?></div>
                            <div style="font-size:0.65rem;letter-spacing:0.1em;text-transform:uppercase;color:rgba(255,255,255,0.35);"><?php echo esc_html( $tc['from'] ); ?></div>
                        </div>
                        <div style="font-size:0.75rem;font-weight:600;color:var(--color-accent);white-space:nowrap;flex-shrink:0;"><?php echo esc_html( $tc['stay'] ); ?></div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="mt-4 reveal reveal-delay-2">
                    <a href="#contact" class="btn btn-accent">
                        <?php esc_html_e( 'Start Travel Consultation', 'natural-dentistry' ); ?>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section><!-- #travel -->

<?php
/**
 * template-parts/section-publications.php
 * Publications and Research section
 */
$publications = nd_get_publications( 6 );
?>
<!-- ════════════════════════════════════════════════
     SECTION: PUBLICATIONS & RESEARCH
════════════════════════════════════════════════ -->
<section id="publications" class="section-pad" aria-labelledby="publications-heading">
    <div class="container">

        <div class="section-header reveal">
            <div class="section-eyebrow">
                <span><?php esc_html_e( 'Research & Evidence', 'natural-dentistry' ); ?></span>
            </div>
            <h2 class="t-heading" id="publications-heading">
                <?php esc_html_e( 'Advancing the', 'natural-dentistry' ); ?>
                <em><?php esc_html_e( 'Science', 'natural-dentistry' ); ?></em>
            </h2>
            <p class="t-body-lg" style="max-width:55ch;">
                <?php esc_html_e( 'Dr. May contributes to the evidence base for biological dentistry through published research, textbook chapters, and presented clinical cases.', 'natural-dentistry' ); ?>
            </p>
        </div>

        <div class="pub-list reveal" role="list">
            <?php foreach ( $publications as $pub ) :
                $is_post = $pub instanceof WP_Post;
                $year    = $is_post ? get_the_date( 'Y', $pub ) : $pub['year'];
                $journal = $is_post ? get_post_meta( $pub->ID, 'nd_journal', true ) : $pub['journal'];
                $title   = $is_post ? get_the_title( $pub ) : $pub['title'];
                $authors = $is_post ? get_post_meta( $pub->ID, 'nd_authors', true ) : $pub['authors'];
                $url     = $is_post ? get_post_meta( $pub->ID, 'nd_pub_url', true ) : '';
            ?>
            <div class="pub-item" role="listitem">
                <span class="pub-year"><?php echo esc_html( $year ); ?></span>
                <div class="pub-content">
                    <?php if ( $journal ) : ?>
                    <div class="pub-content__journal"><?php echo esc_html( $journal ); ?></div>
                    <?php endif; ?>
                    <div class="pub-content__title"><?php echo esc_html( $title ); ?></div>
                    <?php if ( $authors ) : ?>
                    <div class="pub-content__authors"><?php echo esc_html( $authors ); ?></div>
                    <?php endif; ?>
                </div>
                <?php if ( $url ) : ?>
                <a class="pub-link" href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( sprintf( __( 'Read: %s', 'natural-dentistry' ), $title ) ); ?>">
                    <?php esc_html_e( 'View →', 'natural-dentistry' ); ?>
                </a>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section><!-- #publications -->

<?php
/**
 * Root Canal Education section
 */
?>
<!-- ════════════════════════════════════════════════
     SECTION: ROOT CANAL EDUCATION
════════════════════════════════════════════════ -->
<section id="root-canal-edu" class="section-pad section-dark" aria-labelledby="edu-heading">
    <div class="container">
        <div class="edu-content">

            <div class="reveal">
                <div class="section-eyebrow">
                    <span><?php esc_html_e( 'Patient Education', 'natural-dentistry' ); ?></span>
                </div>
                <h2 class="edu-lead" id="edu-heading">
                    <?php esc_html_e( 'The Truth About', 'natural-dentistry' ); ?><br>
                    <em><?php esc_html_e( 'Root Canals', 'natural-dentistry' ); ?></em>
                </h2>
                <p class="edu-body">
                    <?php esc_html_e( 'Conventional root canals can leave behind bacterial biofilms inside the dentinal tubules — tiny canals that cannot be fully sterilized with standard techniques. Over time, these residual bacteria can produce toxins that affect systemic health.', 'natural-dentistry' ); ?>
                </p>
                <p class="edu-body">
                    <?php esc_html_e( 'Dr. May specializes in the biological removal of failed root canals and their replacement with biocompatible zirconia ceramic implants — eliminating the source of infection while restoring full function and aesthetics.', 'natural-dentistry' ); ?>
                </p>
                <a href="#contact" class="btn btn-accent mt-4">
                    <?php esc_html_e( 'Get a Second Opinion', 'natural-dentistry' ); ?>
                </a>
            </div>

            <div class="edu-facts reveal reveal-delay-1">
                <?php
                $facts = [
                    [ __( 'Bacterial Persistence', 'natural-dentistry' ), __( '<strong>Up to 97%</strong> of root canal teeth harbor pathogenic bacteria within dentinal tubules that cannot be accessed by standard root canal techniques.', 'natural-dentistry' ) ],
                    [ __( 'Systemic Link', 'natural-dentistry' ), __( 'Research links focal dental infections to <strong>cardiovascular disease, autoimmune conditions, and chronic inflammatory states.</strong>', 'natural-dentistry' ) ],
                    [ __( 'Biological Alternative', 'natural-dentistry' ), __( 'Zirconia ceramic implants placed with <strong>ozone therapy and PRF</strong> offer a healthier, long-lasting alternative to failed root canals.', 'natural-dentistry' ) ],
                    [ __( 'SMART Protocol', 'natural-dentistry' ), __( 'All amalgam removal and root canal extractions follow the <strong>SMART (Safe Mercury Amalgam Removal Technique)</strong> protocol to minimize patient exposure.', 'natural-dentistry' ) ],
                ];
                foreach ( $facts as $fact ) :
                ?>
                <div class="edu-fact">
                    <span class="edu-fact__icon" aria-hidden="true">&#9670;</span>
                    <div>
                        <strong style="display:block;font-size:0.72rem;letter-spacing:0.1em;text-transform:uppercase;color:rgba(255,255,255,0.7);margin-bottom:0.3rem;"><?php echo esc_html( $fact[0] ); ?></strong>
                        <p class="edu-fact__text"><?php echo wp_kses( $fact[1], [ 'strong' => [] ] ); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section><!-- #root-canal-edu -->

<?php
/**
 * Specialized Procedures section
 */
$procedures = [
    [ 'num' => '01', 'tag' => __( 'Full Arch', 'natural-dentistry' ),        'title' => __( 'All-on-X Ceramic Implants', 'natural-dentistry' ),       'desc' => __( 'Complete oral rehabilitation replacing all upper, lower, or both arches with fixed ceramic prosthetics supported by 4–6 ceramic implants. Planned using 3D CBCT imaging and placed under IV sedation.', 'natural-dentistry' ) ],
    [ 'num' => '02', 'tag' => __( 'Biological', 'natural-dentistry' ),        'title' => __( 'Maxillary Cavitation Surgery', 'natural-dentistry' ),      'desc' => __( 'Surgical debridement of avascular necrotic jawbone (NICO/cavitations) using ozone gas, PRF membranes, and biological grafting to promote true osseous healing.', 'natural-dentistry' ) ],
    [ 'num' => '03', 'tag' => __( 'Anterior', 'natural-dentistry' ),          'title' => __( 'Front Tooth Ceramic Implants', 'natural-dentistry' ),      'desc' => __( "Precision placement of single anterior ceramic implants with custom ceramic crowns — achieving natural emergence profiles that are indistinguishable from surrounding teeth.", 'natural-dentistry' ) ],
    [ 'num' => '04', 'tag' => __( 'Immediate', 'natural-dentistry' ),         'title' => __( 'Same-Day Ceramic Implants', 'natural-dentistry' ),         'desc' => __( 'Extraction and immediate ceramic implant placement in a single appointment for eligible patients — reducing total treatment time and healing phases.', 'natural-dentistry' ) ],
    [ 'num' => '05', 'tag' => __( 'Regenerative', 'natural-dentistry' ),      'title' => __( 'PRF Bone Grafting', 'natural-dentistry' ),                 'desc' => __( 'Patient-derived Platelet Rich Fibrin (PRF) concentrates growth factors to dramatically accelerate bone and soft tissue regeneration around implant sites.', 'natural-dentistry' ) ],
    [ 'num' => '06', 'tag' => __( 'Cosmetic', 'natural-dentistry' ),          'title' => __( 'Metal-Free Smile Makeover', 'natural-dentistry' ),         'desc' => __( 'Comprehensive mercury-free, metal-free cosmetic reconstruction combining ceramic veneers, inlays, onlays, and implant crowns for a naturally beautiful result.', 'natural-dentistry' ) ],
];
?>
<!-- ════════════════════════════════════════════════
     SECTION: SPECIALIZED PROCEDURES
════════════════════════════════════════════════ -->
<section id="procedures" class="section-pad" aria-labelledby="procedures-heading">
    <div class="container">

        <div class="section-header reveal">
            <div class="section-eyebrow">
                <span><?php esc_html_e( 'Advanced Techniques', 'natural-dentistry' ); ?></span>
            </div>
            <h2 class="t-heading" id="procedures-heading">
                <?php esc_html_e( 'Specialized', 'natural-dentistry' ); ?>
                <em><?php esc_html_e( 'Procedures', 'natural-dentistry' ); ?></em>
            </h2>
        </div>

        <div class="proc-grid">
            <?php foreach ( $procedures as $i => $proc ) : ?>
            <div class="proc-card reveal reveal-delay-<?php echo min( ($i % 3) + 1, 3 ); ?>">
                <div class="proc-card__num" aria-hidden="true"><?php echo esc_html( $proc['num'] ); ?></div>
                <span class="proc-card__tag"><?php echo esc_html( $proc['tag'] ); ?></span>
                <h3 class="proc-card__title"><?php echo esc_html( $proc['title'] ); ?></h3>
                <p class="proc-card__desc"><?php echo esc_html( $proc['desc'] ); ?></p>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section><!-- #procedures -->

<?php
/**
 * References / Bibliography section
 */
$refs = [
    [ 'num' => '1',  'citation' => 'Nair PNR. Pathogenesis of apical periodontitis and the causes of endodontic failures. <em>Critical Reviews in Oral Biology and Medicine</em>. 2004;15(6):348–381.' ],
    [ 'num' => '2',  'citation' => 'Meinig GE. <em>Root Canal Cover-Up</em>. Ojai, CA: Bion Publishing; 1994.' ],
    [ 'num' => '3',  'citation' => 'Levy TE. Hidden Epidemic: Silent Oral Infections Cause Most Heart Attacks and Breast Cancers. <em>MedFox Publishing</em>. 2017.' ],
    [ 'num' => '4',  'citation' => 'Novaes AB Jr, et al. Influence of implant surfaces on osseointegration. <em>Brazilian Dental Journal</em>. 2010;21(6):471–481.' ],
    [ 'num' => '5',  'citation' => 'Gahlert M, et al. Zirconia implants — an animal experiment on the biological behaviour. <em>Clin Oral Implants Res</em>. 2007;18(3):403–412.' ],
    [ 'num' => '6',  'citation' => 'Dohan DM, et al. Platelet-rich fibrin (PRF): a second-generation platelet concentrate. Part I: technological concepts and evolution. <em>Oral Surgery Oral Medicine</em>. 2006;101(3):e37–44.' ],
    [ 'num' => '7',  'citation' => 'Holm-Pedersen P, et al. (eds). <em>Implant Dentistry: A Practical Guide to Current Techniques</em>. Quintessence Publishing; 2008.' ],
    [ 'num' => '8',  'citation' => 'May Y. Full Mouth Reconstruction with All-on-X Ceramic Implants: A Retrospective Analysis. <em>Journal of Oral Implantology</em>. 2023.' ],
];
?>
<!-- ════════════════════════════════════════════════
     SECTION: REFERENCES / BIBLIOGRAPHY
════════════════════════════════════════════════ -->
<section id="references" class="section-pad" aria-labelledby="references-heading">
    <div class="container">

        <div class="section-header reveal">
            <div class="section-eyebrow">
                <span><?php esc_html_e( 'Evidence Base', 'natural-dentistry' ); ?></span>
            </div>
            <h2 class="t-heading" id="references-heading">
                <?php esc_html_e( 'References &', 'natural-dentistry' ); ?>
                <em><?php esc_html_e( 'Bibliography', 'natural-dentistry' ); ?></em>
            </h2>
        </div>

        <ol class="ref-list reveal" role="list">
            <?php foreach ( $refs as $ref ) : ?>
            <li class="ref-item" role="listitem">
                <span class="ref-num"><?php echo esc_html( $ref['num'] ); ?></span>
                <span class="ref-citation"><?php echo wp_kses( $ref['citation'], [ 'em' => [], 'a' => [ 'href' => [], 'target' => [], 'rel' => [] ] ] ); ?></span>
            </li>
            <?php endforeach; ?>
        </ol>

    </div>
</section><!-- #references -->

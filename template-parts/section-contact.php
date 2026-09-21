<?php
/**
 * template-parts/section-contact.php
 * Contact / Schedule Consultation section with integrated form
 * Compatible with Contact Form 7 (use shortcode below) or WPForms
 */
$phone   = get_theme_mod( 'nd_phone',   '+1 (555) 000-0000' );
$email   = get_theme_mod( 'nd_email',   'info@naturaldentistry.com' );
$address = get_theme_mod( 'nd_address', '1234 Dental Way, Suite 100' );
$city    = get_theme_mod( 'nd_city',    'Washington' );
$state   = get_theme_mod( 'nd_state',   'DC' );
$zip     = get_theme_mod( 'nd_zip',     '20001' );

// CF7 form ID — update once Contact Form 7 form is created
$cf7_form_id = get_theme_mod( 'nd_cf7_form_id', '' );
?>
<!-- ════════════════════════════════════════════════
     SECTION: CONTACT & SCHEDULE CONSULTATION
════════════════════════════════════════════════ -->
<section id="contact" class="section-pad section-dark" aria-labelledby="contact-heading">
    <div class="container">

        <div class="contact-grid">

            <!-- Left: Info -->
            <div>
                <div class="section-eyebrow reveal">
                    <span><?php esc_html_e( 'Get Started', 'natural-dentistry' ); ?></span>
                </div>
                <h2 class="contact-lead reveal reveal-delay-1" id="contact-heading">
                    <?php esc_html_e( 'Schedule Your', 'natural-dentistry' ); ?><br>
                    <em><?php esc_html_e( 'Consultation', 'natural-dentistry' ); ?></em>
                </h2>
                <p class="contact-sub reveal reveal-delay-2">
                    <?php esc_html_e( "Whether you're local or traveling from across the country, the first step is a conversation. Tell us about your situation and we'll outline a clear treatment path.", 'natural-dentistry' ); ?>
                </p>

                <div class="contact-details reveal reveal-delay-2">

                    <div class="contact-detail">
                        <span class="contact-detail__icon" aria-hidden="true">
                            <i class="fa fa-phone"></i>
                        </span>
                        <div>
                            <div class="contact-detail__label"><?php esc_html_e( 'Phone', 'natural-dentistry' ); ?></div>
                            <a class="contact-detail__val" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>">
                                <?php echo esc_html( $phone ); ?>
                            </a>
                        </div>
                    </div>

                    <div class="contact-detail">
                        <span class="contact-detail__icon" aria-hidden="true">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <div>
                            <div class="contact-detail__label"><?php esc_html_e( 'Email', 'natural-dentistry' ); ?></div>
                            <a class="contact-detail__val" href="mailto:<?php echo esc_attr( $email ); ?>">
                                <?php echo esc_html( $email ); ?>
                            </a>
                        </div>
                    </div>

                    <div class="contact-detail">
                        <span class="contact-detail__icon" aria-hidden="true">
                            <i class="fa fa-location-dot"></i>
                        </span>
                        <div>
                            <div class="contact-detail__label"><?php esc_html_e( 'Clinic Address', 'natural-dentistry' ); ?></div>
                            <address class="contact-detail__val" style="font-style:normal;">
                                <?php echo esc_html( "$address" ); ?><br>
                                <?php echo esc_html( "$city, $state $zip" ); ?>
                            </address>
                        </div>
                    </div>

                    <div class="contact-detail">
                        <span class="contact-detail__icon" aria-hidden="true">
                            <i class="fa fa-clock"></i>
                        </span>
                        <div>
                            <div class="contact-detail__label"><?php esc_html_e( 'Office Hours', 'natural-dentistry' ); ?></div>
                            <div class="contact-detail__val">
                                <?php esc_html_e( 'Monday – Friday: 8:00 AM – 5:00 PM', 'natural-dentistry' ); ?>
                            </div>
                        </div>
                    </div>

                </div><!-- .contact-details -->

                <!-- Booking plugin notice -->
                <p style="font-size:0.72rem;color:rgba(255,255,255,0.25);margin-top:1.5rem;" class="reveal">
                    <?php esc_html_e( 'Online booking powered by Bookly or Amelia. Install your preferred booking plugin to enable real-time appointment scheduling.', 'natural-dentistry' ); ?>
                </p>

            </div><!-- left -->

            <!-- Right: Form -->
            <div class="reveal reveal-delay-2">

                <?php if ( $cf7_form_id ) : ?>
                    <!-- Contact Form 7 shortcode — update ID once form is set up -->
                    <?php echo do_shortcode( '[contact-form-7 id="' . esc_attr( $cf7_form_id ) . '" title="Consultation Request"]' ); ?>
                <?php else : ?>
                    <!-- Fallback native form (no CF7 installed) -->
                    <form id="nd-contact-form" class="contact-form" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" method="POST" novalidate>
                        <?php wp_nonce_field( 'nd_contact', 'nd_nonce' ); ?>
                        <input type="hidden" name="action" value="nd_contact_form">

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="nd-first-name"><?php esc_html_e( 'First Name *', 'natural-dentistry' ); ?></label>
                                <input type="text" id="nd-first-name" name="first_name" class="form-control" required autocomplete="given-name" placeholder="Jane">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="nd-last-name"><?php esc_html_e( 'Last Name *', 'natural-dentistry' ); ?></label>
                                <input type="text" id="nd-last-name" name="last_name" class="form-control" required autocomplete="family-name" placeholder="Smith">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="nd-email"><?php esc_html_e( 'Email Address *', 'natural-dentistry' ); ?></label>
                                <input type="email" id="nd-email" name="email" class="form-control" required autocomplete="email" placeholder="jane@example.com">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="nd-phone"><?php esc_html_e( 'Phone Number', 'natural-dentistry' ); ?></label>
                                <input type="tel" id="nd-phone" name="phone" class="form-control" autocomplete="tel" placeholder="+1 (555) 000-0000">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="nd-service"><?php esc_html_e( 'Service of Interest', 'natural-dentistry' ); ?></label>
                            <select id="nd-service" name="service" class="form-control">
                                <option value="" disabled selected><?php esc_html_e( 'Select a service…', 'natural-dentistry' ); ?></option>
                                <option value="zirconia"><?php esc_html_e( 'Zirconia Ceramic Implants', 'natural-dentistry' ); ?></option>
                                <option value="full-arch"><?php esc_html_e( 'Full Mouth Reconstruction (All-on-X)', 'natural-dentistry' ); ?></option>
                                <option value="front-tooth"><?php esc_html_e( 'Front Tooth Implant', 'natural-dentistry' ); ?></option>
                                <option value="root-canal"><?php esc_html_e( 'Root Canal Removal', 'natural-dentistry' ); ?></option>
                                <option value="cavitation"><?php esc_html_e( 'Cavitation Surgery', 'natural-dentistry' ); ?></option>
                                <option value="cosmetics"><?php esc_html_e( 'Natural Cosmetics', 'natural-dentistry' ); ?></option>
                                <option value="consultation"><?php esc_html_e( 'General Consultation', 'natural-dentistry' ); ?></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="nd-location"><?php esc_html_e( 'Your Location (City, State/Country)', 'natural-dentistry' ); ?></label>
                            <input type="text" id="nd-location" name="location" class="form-control" placeholder="e.g. Austin, TX or London, UK">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="nd-message"><?php esc_html_e( 'Tell Us About Your Situation *', 'natural-dentistry' ); ?></label>
                            <textarea id="nd-message" name="message" class="form-control" required placeholder="<?php esc_attr_e( 'Describe your dental concern, any previous treatments, and your goals…', 'natural-dentistry' ); ?>"></textarea>
                        </div>

                        <!-- Honeypot anti-spam -->
                        <div style="display:none;" aria-hidden="true">
                            <input type="text" name="nd_hp" tabindex="-1" autocomplete="off">
                        </div>

                        <button type="submit" class="btn btn-accent" style="width:100%;justify-content:center;">
                            <i class="fa fa-calendar-check" aria-hidden="true"></i>
                            <?php esc_html_e( 'Request Consultation', 'natural-dentistry' ); ?>
                        </button>

                        <p style="font-size:0.68rem;color:rgba(255,255,255,0.25);text-align:center;margin-top:0.75rem;">
                            <?php esc_html_e( 'We typically respond within 24 hours. Your information is kept strictly confidential.', 'natural-dentistry' ); ?>
                        </p>

                    </form>
                <?php endif; ?>

            </div><!-- right -->

        </div><!-- .contact-grid -->

    </div>
</section><!-- #contact -->

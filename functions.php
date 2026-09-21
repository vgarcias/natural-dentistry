<?php
/**
 * Natural Dentistry — functions.php
 * Theme setup, enqueues, custom post types, widget areas, schema markup
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'ND_VERSION', '1.0.0' );
define( 'ND_DIR',     get_template_directory() );
define( 'ND_URI',     get_template_directory_uri() );

/* ─── Theme Setup ───────────────────────────────────────────── */
function nd_setup() {
    load_theme_textdomain( 'natural-dentistry', ND_DIR . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form','comment-form','comment-list','gallery','caption','script','style' ] );
    add_theme_support( 'custom-logo', [
        'height'      => 80,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ] );
    add_theme_support( 'woocommerce' );

    // Image sizes
    add_image_size( 'nd-hero',    1920, 1080, true );
    add_image_size( 'nd-card',    800,  600,  true );
    add_image_size( 'nd-portrait',600,  800,  true );
    add_image_size( 'nd-square',  600,  600,  true );
    add_image_size( 'nd-thumb',   400,  300,  true );

    // Navigation menus
    register_nav_menus( [
        'primary' => __( 'Primary Navigation', 'natural-dentistry' ),
        'footer'  => __( 'Footer Navigation',  'natural-dentistry' ),
    ] );
}
add_action( 'after_setup_theme', 'nd_setup' );

/* ─── Enqueue Styles & Scripts ──────────────────────────────── */
function nd_assets() {
    // Google Fonts
    wp_enqueue_style(
        'nd-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500;600&family=DM+Mono&display=swap',
        [],
        null
    );

    // Bootstrap 5
    wp_enqueue_style(
        'bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        [],
        '5.3.3'
    );

    // Theme stylesheet
    wp_enqueue_style(
        'natural-dentistry',
        ND_URI . '/style.css',
        [ 'bootstrap' ],
        ND_VERSION
    );

    // Font Awesome
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
        [],
        '6.5.0'
    );

    // Bootstrap JS (bundle includes Popper)
    wp_enqueue_script(
        'bootstrap-bundle',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        [],
        '5.3.3',
        true
    );

    // Main JS
    wp_enqueue_script(
        'nd-main',
        ND_URI . '/assets/js/main.js',
        [ 'bootstrap-bundle' ],
        ND_VERSION,
        true
    );

    // Pass AJAX URL and nonce to JS
    wp_localize_script( 'nd-main', 'ndData', [
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'nd_nonce' ),
        'siteUrl' => get_site_url(),
    ] );

    // Comment reply script
    if ( is_singular() && comments_open() ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'nd_assets' );

/* ─── Schema Markup (JSON-LD) ───────────────────────────────── */
function nd_schema_markup() {
    if ( ! is_front_page() && ! is_home() ) return;
    $schema = [
        '@context' => 'https://schema.org',
        '@type'    => 'Dentist',
        'name'     => get_bloginfo( 'name' ),
        'url'      => get_site_url(),
        'telephone'=> get_theme_mod( 'nd_phone', '+1-000-000-0000' ),
        'email'    => get_theme_mod( 'nd_email', 'info@naturaldentistry.com' ),
        'address'  => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => get_theme_mod( 'nd_address', '1234 Dental Way, Suite 100' ),
            'addressLocality' => get_theme_mod( 'nd_city',    'Washington' ),
            'addressRegion'   => get_theme_mod( 'nd_state',   'DC' ),
            'postalCode'      => get_theme_mod( 'nd_zip',     '20001' ),
            'addressCountry'  => 'US',
        ],
        'medicalSpecialty' => 'Dentistry',
        'hasCredential'    => [ 'DMD', 'AFAAID', 'IBDM' ],
        'sameAs'           => array_filter( [
            get_theme_mod( 'nd_instagram' ),
            get_theme_mod( 'nd_facebook' ),
            get_theme_mod( 'nd_youtube' ),
        ] ),
        'image'            => get_theme_mod( 'nd_og_image', '' ),
    ];
    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}
add_action( 'wp_head', 'nd_schema_markup' );

/* ─── Customizer Settings ───────────────────────────────────── */
function nd_customizer( $wp_customize ) {
    // Practice Info Panel
    $wp_customize->add_panel( 'nd_practice', [ 'title' => __( 'Practice Information', 'natural-dentistry' ), 'priority' => 30 ] );

    $fields = [
        'nd_phone'     => [ 'Practice Phone',     '+1 (555) 000-0000',             'nd_contact' ],
        'nd_email'     => [ 'Practice Email',      'info@naturaldentistry.com',     'nd_contact' ],
        'nd_address'   => [ 'Street Address',      '1234 Dental Way, Suite 100',    'nd_contact' ],
        'nd_city'      => [ 'City',                'Washington',                    'nd_contact' ],
        'nd_state'     => [ 'State',               'DC',                            'nd_contact' ],
        'nd_zip'       => [ 'ZIP Code',            '20001',                         'nd_contact' ],
        'nd_instagram' => [ 'Instagram URL',       '',                              'nd_social'  ],
        'nd_facebook'  => [ 'Facebook URL',        '',                              'nd_social'  ],
        'nd_youtube'   => [ 'YouTube URL',         '',                              'nd_social'  ],
        'nd_maps_key'  => [ 'Google Maps API Key', '',                              'nd_maps'    ],
        'nd_maps_lat'  => [ 'Clinic Latitude',     '38.9072',                       'nd_maps'    ],
        'nd_maps_lng'  => [ 'Clinic Longitude',    '-77.0369',                      'nd_maps'    ],
        'nd_hero_title'=> [ 'Hero Main Title',     'Biological Dentistry',          'nd_hero'    ],
        'nd_hero_sub'  => [ 'Hero Sub Title',      '& Ceramic Implants',            'nd_hero'    ],
        'nd_hero_body' => [ 'Hero Body Text',      'Evidence-based biological dentistry that treats the whole person. Specializing in zirconia ceramic implants and minimally invasive care.', 'nd_hero' ],
        'nd_og_image'  => [ 'OG / Share Image URL', '',                             'nd_seo'    ],
        'nd_hero_image'=> [ 'Hero Background Image URL', '',                        'nd_hero'   ],
        'nd_about_image'=> [ 'Doctor Photo (Attachment ID)', '',                    'nd_contact' ],
        'nd_about_bio' => [ 'Doctor Bio Text',      '',                             'nd_contact' ],
        'nd_cf7_form_id'=> [ 'Contact Form 7 Form ID', '',                         'nd_contact' ],
    ];

    $sections = [
        'nd_contact' => 'Contact Details',
        'nd_social'  => 'Social Media',
        'nd_maps'    => 'Google Maps',
        'nd_hero'    => 'Hero Section',
        'nd_seo'     => 'SEO & Sharing',
    ];

    foreach ( $sections as $id => $label ) {
        $wp_customize->add_section( $id, [ 'title' => __( $label, 'natural-dentistry' ), 'panel' => 'nd_practice' ] );
    }

    foreach ( $fields as $setting => [ $label, $default, $section ] ) {
        $wp_customize->add_setting( $setting, [ 'default' => $default, 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'refresh' ] );
        $wp_customize->add_control( $setting, [ 'label' => __( $label, 'natural-dentistry' ), 'section' => $section, 'type' => 'text' ] );
    }
}
add_action( 'customize_register', 'nd_customizer' );

/* ─── Custom Post Types ──────────────────────────────────────── */
function nd_register_cpts() {
    // Testimonials
    register_post_type( 'nd_testimonial', [
        'labels'        => [ 'name' => __( 'Testimonials', 'natural-dentistry' ), 'singular_name' => __( 'Testimonial', 'natural-dentistry' ) ],
        'public'        => false,
        'show_ui'       => true,
        'show_in_menu'  => true,
        'menu_icon'     => 'dashicons-format-quote',
        'supports'      => [ 'title', 'editor', 'custom-fields', 'thumbnail' ],
        'show_in_rest'  => true,
    ] );

    // Before & After Cases
    register_post_type( 'nd_case', [
        'labels'        => [ 'name' => __( 'Before & After', 'natural-dentistry' ), 'singular_name' => __( 'Case', 'natural-dentistry' ) ],
        'public'        => false,
        'show_ui'       => true,
        'show_in_menu'  => true,
        'menu_icon'     => 'dashicons-images-alt2',
        'supports'      => [ 'title', 'editor', 'custom-fields', 'thumbnail' ],
        'show_in_rest'  => true,
    ] );

    // Publications
    register_post_type( 'nd_publication', [
        'labels'        => [ 'name' => __( 'Publications', 'natural-dentistry' ), 'singular_name' => __( 'Publication', 'natural-dentistry' ) ],
        'public'        => false,
        'show_ui'       => true,
        'show_in_menu'  => true,
        'menu_icon'     => 'dashicons-book-alt',
        'supports'      => [ 'title', 'editor', 'custom-fields' ],
        'show_in_rest'  => true,
    ] );

    // Team Members
    register_post_type( 'nd_team', [
        'labels'        => [ 'name' => __( 'Team Members', 'natural-dentistry' ), 'singular_name' => __( 'Team Member', 'natural-dentistry' ) ],
        'public'        => false,
        'show_ui'       => true,
        'show_in_menu'  => true,
        'menu_icon'     => 'dashicons-admin-users',
        'supports'      => [ 'title', 'editor', 'custom-fields', 'thumbnail' ],
        'show_in_rest'  => true,
    ] );
}
add_action( 'init', 'nd_register_cpts' );

/* ─── Widget Areas ──────────────────────────────────────────── */
function nd_widgets() {
    register_sidebar( [ 'name' => __( 'Sidebar', 'natural-dentistry' ), 'id' => 'sidebar-1', 'before_widget' => '<section class="widget %2$s">', 'after_widget' => '</section>', 'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>' ] );
    register_sidebar( [ 'name' => __( 'Footer Col 2', 'natural-dentistry' ), 'id' => 'footer-2', 'before_widget' => '<div class="footer-widget">', 'after_widget' => '</div>', 'before_title' => '<h5>', 'after_title' => '</h5>' ] );
    register_sidebar( [ 'name' => __( 'Footer Col 3', 'natural-dentistry' ), 'id' => 'footer-3', 'before_widget' => '<div class="footer-widget">', 'after_widget' => '</div>', 'before_title' => '<h5>', 'after_title' => '</h5>' ] );
}
add_action( 'widgets_init', 'nd_widgets' );

/* ─── Template Helper Functions ─────────────────────────────── */

/**
 * Output an optimized, lazy-loaded image or placeholder.
 */
function nd_image( $post_id_or_src = '', $size = 'nd-card', $alt = '', $classes = '' ) {
    if ( is_numeric( $post_id_or_src ) ) {
        $src = wp_get_attachment_image_src( $post_id_or_src, $size );
        if ( $src ) {
            echo '<img src="' . esc_url( $src[0] ) . '" alt="' . esc_attr( $alt ) . '" class="' . esc_attr( $classes ) . '" loading="lazy" width="' . esc_attr( $src[1] ) . '" height="' . esc_attr( $src[2] ) . '">';
            return;
        }
    } elseif ( ! empty( $post_id_or_src ) ) {
        echo '<img src="' . esc_url( $post_id_or_src ) . '" alt="' . esc_attr( $alt ) . '" class="' . esc_attr( $classes ) . '" loading="lazy">';
        return;
    }
    // Placeholder
    echo '<div class="about-photo-placeholder ' . esc_attr( $classes ) . '"><span>' . esc_html( $alt ?: 'Image' ) . '</span></div>';
}

/**
 * Get testimonials from CPT or fallback to demo data.
 */
function nd_get_testimonials( $limit = 9 ) {
    $q = new WP_Query( [ 'post_type' => 'nd_testimonial', 'posts_per_page' => $limit, 'post_status' => 'publish' ] );
    if ( $q->have_posts() ) return $q->posts;
    // Demo data
    return [
        [ 'title' => 'Sarah M.', 'location' => 'Texas, USA', 'content' => 'Dr. May transformed my smile and my health. The ceramic implants are indistinguishable from natural teeth. Worth every mile I traveled.', 'rating' => 5 ],
        [ 'title' => 'James R.', 'location' => 'Ontario, Canada', 'content' => 'After years of failed conventional implants, Dr. May gave me back my quality of life. His biological approach made all the difference.', 'rating' => 5 ],
        [ 'title' => 'Elena V.', 'location' => 'London, UK', 'content' => 'I flew from London specifically for the full-mouth reconstruction. The outcome exceeded every expectation. Truly world-class care.', 'rating' => 5 ],
        [ 'title' => 'Michael T.', 'location' => 'California, USA', 'content' => 'The zirconia implants healed faster than any metal implant I have had. No inflammation, no sensitivity. Just beautiful results.', 'rating' => 5 ],
        [ 'title' => 'Ana L.', 'location' => 'São Paulo, Brazil', 'content' => 'Dr. May took the time to understand my full health picture before any procedure. The holistic approach is what sets this practice apart.', 'rating' => 5 ],
        [ 'title' => 'David K.', 'location' => 'New York, USA', 'content' => 'My cavitation surgery was done with precision and real care for recovery. The biological protocol made healing genuinely smooth.', 'rating' => 5 ],
    ];
}

/**
 * Get publications from CPT or fallback to demo data.
 */
function nd_get_publications( $limit = 6 ) {
    $q = new WP_Query( [ 'post_type' => 'nd_publication', 'posts_per_page' => $limit, 'post_status' => 'publish', 'orderby' => 'date', 'order' => 'DESC' ] );
    if ( $q->have_posts() ) return $q->posts;
    return [
        [ 'year' => '2023', 'journal' => 'Journal of Oral Implantology', 'title' => 'Full Mouth Reconstruction with All-on-X Ceramic Implants: A Retrospective Analysis', 'authors' => 'May Y, et al.' ],
        [ 'year' => '2022', 'journal' => 'Implant Dentistry', 'title' => 'Advanced Crestal Implant-Top Techniques for Minimally Invasive Placement', 'authors' => 'May Y, et al.' ],
        [ 'year' => '2022', 'journal' => 'International Journal of Biological Dentistry', 'title' => 'Full Mouth Reconstruction Under Ceramic Implants: Biological Considerations', 'authors' => 'May Y, Smith JL.' ],
        [ 'year' => '2021', 'journal' => 'AAOSH Scientific Compendium', 'title' => 'Surgical Protocol in PRP in Regenerative Bone Grafting for Ceramic Implant Placement', 'authors' => 'May Y, et al.' ],
        [ 'year' => '2020', 'journal' => 'Ozone Therapy Journal', 'title' => 'Ozone Application in Cavitation Treatment: Clinical Outcomes and Protocols', 'authors' => 'May Y.' ],
        [ 'year' => '2019', 'journal' => 'Holistic Dentistry Review', 'title' => 'Mercury-Free, Metal-Free Restorative Dentistry: Patient Outcomes Over Five Years', 'authors' => 'May Y, et al.' ],
    ];
}

/* ─── Excerpt Length ─────────────────────────────────────────── */
add_filter( 'excerpt_length', fn() => 25 );
add_filter( 'excerpt_more',   fn() => '…' );

/* ─── Body Classes ───────────────────────────────────────────── */
function nd_body_classes( $classes ) {
    $classes[] = 'nd-theme';
    if ( is_front_page() ) $classes[] = 'nd-front';
    return $classes;
}
add_filter( 'body_class', 'nd_body_classes' );

/* ─── Contact Form AJAX Handler ─────────────────────────── */
function nd_handle_contact_form() {
    check_ajax_referer( 'nd_contact', 'nd_nonce' );

    // Honeypot check
    if ( ! empty( $_POST['nd_hp'] ) ) {
        wp_send_json_error( [ 'message' => 'Spam detected.' ] );
    }

    $first_name = sanitize_text_field( $_POST['first_name'] ?? '' );
    $last_name  = sanitize_text_field( $_POST['last_name']  ?? '' );
    $email      = sanitize_email( $_POST['email']           ?? '' );
    $phone      = sanitize_text_field( $_POST['phone']      ?? '' );
    $service    = sanitize_text_field( $_POST['service']    ?? '' );
    $location   = sanitize_text_field( $_POST['location']   ?? '' );
    $message    = sanitize_textarea_field( $_POST['message'] ?? '' );

    if ( empty( $first_name ) || empty( $email ) || empty( $message ) ) {
        wp_send_json_error( [ 'message' => __( 'Please fill in all required fields.', 'natural-dentistry' ) ] );
    }

    if ( ! is_email( $email ) ) {
        wp_send_json_error( [ 'message' => __( 'Please enter a valid email address.', 'natural-dentistry' ) ] );
    }

    $to      = get_theme_mod( 'nd_email', get_option( 'admin_email' ) );
    $subject = sprintf( __( 'New Consultation Request from %s %s', 'natural-dentistry' ), $first_name, $last_name );
    $body    = sprintf(
        "Name: %s %s\nEmail: %s\nPhone: %s\nService: %s\nLocation: %s\n\nMessage:\n%s",
        $first_name, $last_name, $email, $phone, $service, $location, $message
    );
    $headers = [ 'Content-Type: text/plain; charset=UTF-8', 'Reply-To: ' . $email ];

    $sent = wp_mail( $to, $subject, $body, $headers );

    if ( $sent ) {
        wp_send_json_success( [ 'message' => __( 'Thank you! We will be in touch within 24 hours.', 'natural-dentistry' ) ] );
    } else {
        wp_send_json_error( [ 'message' => __( 'There was a problem sending your message. Please call us directly.', 'natural-dentistry' ) ] );
    }
}
add_action( 'wp_ajax_nd_contact_form',        'nd_handle_contact_form' );
add_action( 'wp_ajax_nopriv_nd_contact_form', 'nd_handle_contact_form' );

/* ─── Open Graph / SEO Tags ─────────────────────────────────── */
function nd_head_meta() {
    $og_img = get_theme_mod( 'nd_og_image', '' );
    if ( has_post_thumbnail() ) {
        $img_data = wp_get_attachment_image_src( get_post_thumbnail_id(), 'nd-hero' );
        if ( $img_data ) $og_img = $img_data[0];
    }
    $title = get_bloginfo( 'name' ) . ' — ' . get_bloginfo( 'description' );
    if ( is_singular() ) $title = get_the_title() . ' — ' . get_bloginfo( 'name' );
    ?>
    <meta name="robots" content="index,follow">
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
    <meta property="og:url" content="<?php echo esc_url( get_permalink() ?: get_site_url() ); ?>">
    <?php if ( $og_img ) : ?>
    <meta property="og:image" content="<?php echo esc_url( $og_img ); ?>">
    <?php endif; ?>
    <meta name="theme-color" content="#0a0a0a">
    <?php
}
add_action( 'wp_head', 'nd_head_meta', 1 );

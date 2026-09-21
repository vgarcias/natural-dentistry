<?php
/**
 * index.php — Fallback template
 * Displays posts or page content depending on context.
 */
get_header();
?>

<div class="container" style="padding-top: 8rem; padding-bottom: 4rem;">
    <?php if ( have_posts() ) : ?>

        <header class="section-header">
            <?php if ( is_home() && ! is_front_page() ) : ?>
                <h1 class="t-heading"><?php single_post_title(); ?></h1>
            <?php elseif ( is_archive() ) : ?>
                <h1 class="t-heading"><?php the_archive_title(); ?></h1>
                <?php the_archive_description( '<div class="t-body-lg mb-4">', '</div>' ); ?>
            <?php elseif ( is_search() ) : ?>
                <h1 class="t-heading">
                    <?php printf( esc_html__( 'Search Results: %s', 'natural-dentistry' ), '<em>' . get_search_query() . '</em>' ); ?>
                </h1>
            <?php endif; ?>
        </header>

        <div class="grid-3">
            <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'proc-card' ); ?>>
                <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'nd-card', [ 'style' => 'width:100%;aspect-ratio:3/2;object-fit:cover;margin-bottom:1rem;' ] ); ?>
                </a>
                <?php endif; ?>
                <h2 class="proc-card__title" style="font-size:1.1rem;">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <div class="proc-card__desc"><?php the_excerpt(); ?></div>
                <a href="<?php the_permalink(); ?>" class="btn btn-outline mt-4" style="font-size:0.65rem;">
                    <?php esc_html_e( 'Read More →', 'natural-dentistry' ); ?>
                </a>
            </article>
            <?php endwhile; ?>
        </div>

        <div class="mt-5">
            <?php the_posts_pagination( [ 'mid_size' => 2, 'prev_text' => '← ' . esc_html__( 'Prev', 'natural-dentistry' ), 'next_text' => esc_html__( 'Next', 'natural-dentistry' ) . ' →' ] ); ?>
        </div>

    <?php else : ?>

        <div style="text-align:center;padding:5rem 0;">
            <h2 class="t-heading"><?php esc_html_e( 'Nothing Found', 'natural-dentistry' ); ?></h2>
            <p class="t-body-lg mt-4 mb-4"><?php esc_html_e( 'It looks like nothing was found at this location.', 'natural-dentistry' ); ?></p>
            <?php get_search_form(); ?>
        </div>

    <?php endif; ?>
</div>

<?php get_footer(); ?>

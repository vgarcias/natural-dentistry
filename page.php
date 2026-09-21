<?php
/**
 * page.php — Default page template
 */
get_header();
?>
<div class="container" style="padding-top:8rem;padding-bottom:var(--section-gap);">
    <?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header style="margin-bottom:3rem;max-width:70ch;">
            <h1 class="t-heading"><?php the_title(); ?></h1>
        </header>
        <div class="t-body-lg" style="max-width:72ch;">
            <?php the_content(); ?>
        </div>
    </article>
    <?php endwhile; ?>
</div>
<?php get_footer(); ?>

<?php
/**
 * front-page.php
 * Natural Dentistry Theme — Home Page Template
 * Assembles all section template parts in order.
 */
get_header();
?>

<?php get_template_part( 'template-parts/section', 'hero' ); ?>

<?php get_template_part( 'template-parts/section', 'about' ); ?>

<?php get_template_part( 'template-parts/section', 'services' ); ?>

<?php get_template_part( 'template-parts/section', 'gallery' ); ?>

<?php get_template_part( 'template-parts/section', 'procedures' ); ?>

<?php get_template_part( 'template-parts/section', 'contact' ); ?>

<?php get_footer(); ?>

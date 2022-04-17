<?php
/* Template Name: Homepage
 * @package accom
 * @since 1.0.0
 */

get_header();
?>

<?php get_template_part( 'template-parts/home', 'hero-slider' ); ?>

<?php wp_link_pages(); ?> 
<?php
get_footer();
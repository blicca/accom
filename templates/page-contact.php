<?php
/**
 * Template Name: Contact
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 *
 */

get_header();
while ( have_posts() ) : the_post();
?>
<div class="contact-page-style">

    <div class="contact-theme-row caption-column">
        <h1><?php the_title(); ?></h1>
    </div>
    <div class="contact-theme-row">
        <div class="contact-column">
            <div class="contact-content">
                <?php the_content(); ?>
            </div>
            <div class="contact-gap"></div>
            <div class="contact-second-content">
		        <?php echo do_shortcode('[forminator_form id="167"]'); ?>
                <div class="contact-not">
                    By submitting this form you acknowledge you have read and agree with our <a href="<?php echo esc_url(get_privacy_policy_url()); ?>">Privacy Policy</a>.
                </div>
            </div>
        </div>
    </div>
</div>
<?php
endwhile; // end of the loop. 
get_footer();
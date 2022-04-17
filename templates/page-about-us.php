<?php
/**
 * Template Name: About
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
<div class="theme-row-zero">
    <div class="sub-page-title">
        <?php the_field('top_title') ?>
    </div>
    <div class="about-intro">
        <div class="about-intro-content">
            <?php the_field('intro_content'); ?>
        </div>
        <div class="about-intro-image">
	        <?php if( get_field('intro_image') ): ?>
                <img src="<?php the_field('intro_image'); ?>" />
	        <?php endif; ?>
        </div>
    </div>
    <div class="about-outro">
        <div class="about-outro-image">
			<?php if( get_field('outro_image') ): ?>
                <img src="<?php the_field('outro_image'); ?>" />
			<?php endif; ?>
        </div>

        <div class="about-outro-content">
		    <?php the_field('outro_content'); ?>
            <div class="outro-author-box">
                <div class="author-image">
	                <?php if( get_field('author_image') ): ?>
                        <img src="<?php the_field('author_image'); ?>" />
	                <?php endif; ?>
                </div>
                <div class="author-data">
                    <span><?php the_field('author_name'); ?></span>
                    <span><?php the_field('author_citation'); ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="about-note">
        <?php the_field('about_note'); ?>
    </div>
</div>
<?php
endwhile; // end of the loop. 
get_footer();
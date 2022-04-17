<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package accom
 * @since 1.0.0
 */

?>
    </main>
	<footer id="accom-footer" class="main-footer">
        <div class="footer-row">
            <div class="footer-column">
                <div class="footer-left">
                    © <?php echo date("Y"); ?> accom.com Pty Ltd.
	                <?php
	                wp_nav_menu( array(
		                'theme_location' => 'footer-menu1',
		                'menu_id'        => 'footer-menu1',
	                ));
	                ?>
                </div>
                <div class="footer-right">
		            <?php
		            wp_nav_menu( array(
			            'theme_location' => 'footer-menu2',
			            'menu_id'        => 'footer-menu2',
		            ));
		            ?>
                </div>
            </div>
        </div>
    </footer>

</div><!-- #accom-page -->

<div class="why-book-modal">
    <div class="why-book-modal-row">
        <div class="filter-modal-title"><?php the_field('why_title', 'option'); ?></div>
        <div class="filter-modal-content">
            <?php
            if( have_rows('reason', 'option') ):

            // Loop through rows.
            while( have_rows('reason', 'option') ) : the_row();

            // Load sub field value.
            ?>
            <div class="reason">
                <div class="reason-icon"><img src="<?php the_sub_field('icon'); ?>"></div>
                <div class="reason-text"><?php the_sub_field('title'); ?></div>
            </div>
            <?php
            // End loop.
            endwhile;

            // No value.
            else :
            // Do something...
            endif;
            ?>
        </div>
        <div class="close-filter-modal">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.7 0.3C13.3 -0.1 12.7 -0.1 12.3 0.3L7 5.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L5.6 7L0.3 12.3C-0.1 12.7 -0.1 13.3 0.3 13.7C0.5 13.9 0.7 14 1 14C1.3 14 1.5 13.9 1.7 13.7L7 8.4L12.3 13.7C12.5 13.9 12.8 14 13 14C13.2 14 13.5 13.9 13.7 13.7C14.1 13.3 14.1 12.7 13.7 12.3L8.4 7L13.7 1.7C14.1 1.3 14.1 0.7 13.7 0.3Z" fill="black"/>
            </svg>
        </div>
    </div>
</div>


<div class="why-book-modal subscribe">
    <div class="why-book-modal-row">
        <div class="filter-modal-title">Stay in touch!</div>
        <div class="filter-modal-content">
			<?php
            echo do_shortcode('[forminator_form id="224"]')
			?>
        </div>
        <div class="close-filter-modal">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.7 0.3C13.3 -0.1 12.7 -0.1 12.3 0.3L7 5.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L5.6 7L0.3 12.3C-0.1 12.7 -0.1 13.3 0.3 13.7C0.5 13.9 0.7 14 1 14C1.3 14 1.5 13.9 1.7 13.7L7 8.4L12.3 13.7C12.5 13.9 12.8 14 13 14C13.2 14 13.5 13.9 13.7 13.7C14.1 13.3 14.1 12.7 13.7 12.3L8.4 7L13.7 1.7C14.1 1.3 14.1 0.7 13.7 0.3Z" fill="black"/>
            </svg>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>
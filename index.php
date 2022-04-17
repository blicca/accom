<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package accom
 */

get_header();
?>
<div class="main-blog">
    <div class="theme-caption">
        <div class="theme-row">
            <div class="caption-title"><h1><?php echo esc_html__("News & Articles", "accom"); ?></h1></div>
        </div>
    </div>

    <?php
    if ( have_posts() ) {    
    global $wp_query;
    $maxpage = $wp_query->max_num_pages;
    ?>
    <div class="theme-row front-blog-row">
        <div class="blog-categories">
            <ul class="accom-category-filter">
                <?php 
                    $args= array(  
                        'show_option_all'   =>   'All', //Text for button All
                        'title_li'          => __('')
                    );
                    wp_list_categories( $args );
                    
                ?>
            </ul>   
            <?php wp_dropdown_categories($args); ?>
 
            <script>
            document.getElementById('cat').onchange = function(){
                // if value is category id
                if( this.value !== '-1' ){
                window.location='/?cat='+this.value
                }
            }
            </script> 
        </div>

        <div class="all-blog-posts" data-videomaxpage="<?php echo esc_js($maxpage); ?>">
        <div class="grid-sizer"></div>
        <div class="gutter-sizer"></div>    
        <?php
                while ( have_posts() ) { the_post();
                    
                    get_template_part( 'template-parts/global', 'loop' );

                }
        ?>
        </div>
        <div class="clearfix"></div>                 
        <div class="load-status">
            <div class="loader-ellips">
                <span class="loader-ellips__dot"></span>
                <span class="loader-ellips__dot"></span>
                <span class="loader-ellips__dot"></span>
                <span class="loader-ellips__dot"></span>
            </div>
		</div>       
    </div>  
    <?php
    }
    ?>
</div>

<?php
get_footer();
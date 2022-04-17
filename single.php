<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */
?>
<?php
get_header();
?>

<article class="single-blog" itemscope="" itemtype="http://schema.org/Article">
    <?php
	// Overview Section (over default wordpress content)
	if (have_posts()) : while (have_posts()) : the_post(); 
    ?>    
    <div class="theme-caption">
        <div class="theme-row">
            <div class="caption-title"><h1><?php the_title(); ?></h1></div>
            <div class="single-blog-meta">
                <time datetime="<?php echo esc_attr( get_the_date('c') ); ?>" itemprop="datePublished" content="<?php echo esc_attr( get_the_date('c') ); ?>"><?php echo esc_html(get_the_date()); ?></time>                                                                                                
                <?php
                    $categories = get_the_category(); 
                    if ( ! empty( $categories ) ) {
                    ?> · <?php echo esc_html( $categories[0]->name ); ?><?php   
                    } 
                ?>  
            </div>             
        </div>
    </div>
    <div class="defaul-page-content">
        <div class="default-page-row">
            <?php
            if ( has_post_thumbnail() ) {
            ?>
            <figure class="default-thumbnail">                                                
                <?php the_post_thumbnail('full', array('itemprop'=>'image')); ?>
            </figure>
            <?php
            }
            ?>
            <div class="default-page-column">
                <?php the_content(); ?>  
            </div> 

            <div class="post-navigation">
                <div class="previouspost-container">
                    <div class="previouspost">
                        <?php previous_post_link( '%link','<span>Previous post</span>%title') ?>
                    </div>    
                </div>
                <div class="nextpost-container">
                    <div class="nextpost">
                        <?php next_post_link( '%link','<span>Next post</span>%title') ?>
                    </div>
                </div>
            </div> <!-- end navigation -->            

        </div>           
    </div>
    <?php
    endwhile; else: ?>
    <p>Sorry, no posts matched your criteria.</p>
    <?php endif;
    ?>    
</article>
<?php
get_footer();
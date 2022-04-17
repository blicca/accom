<?php
get_header();
while ( have_posts() ) : the_post();
?>
<div class="theme-caption">
    <div class="theme-row">
        <div class="caption-title"><h1><?php the_title(); ?></h1></div>
    </div>
</div>

<div class="default-page-content">
    <div class="theme-row">
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
    </div>           
</div>
 
<?php endwhile; // end of the loop. ?>
<?php
get_footer();
<div class="home-hero-slider">
    <div class="hero-slider-container">
        <?php
        $images = get_field('image');
        $size = 'full'; // (thumbnail, medium, large, full or custom size)
        $i = mt_rand(0, 100);
        $i = $i % 3;
        if( $images ) {
            ?>
           <img src="<?php echo esc_url($images[$i]['image']); ?>"/>
            <?php
        }
        ?>
        <div class="hero-text">
            <?php the_field('hero_text'); ?>
        </div>
        <div class="home-search-filter">
            <div class="filter-search-column">
                <div class="filter-search">
				    <?php
				    echo facetwp_display( 'facet', 'country' );
				    ?>

                    <div style="display:none"><?php echo facetwp_display( 'template', 'accommodation' ); ?></div>
                    <button class="fwp-submit" data-href="/accommodation/">Submit</button>
                </div>

            </div>
        </div>
        <div class="hero-image-location">
            <div class="theme-row-zero">
                <?php
                $color = $images[$i]['text_color'];
                $rgba = hex2rgba($color, 0.2);
                ?>
                <a href="<?php echo esc_url($images[$i]['url']); ?>" target="_blank">
                <div class="location-border" style="color: #2E2E38; background: #ffffff;">
                    <svg id="marker-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <circle id="Oval" cx="7.5" cy="7.5" r="7.5" transform="translate(0.5 0.5)" fill="none" stroke="#FF006B" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/>
                        <path id="Path" d="M0,8,4.5,0,9,8,4.5,6,0,8Z" transform="translate(8.057 1.49) rotate(45)" fill="none" stroke="#FF006B" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/>
                    </svg>
                    <?php echo esc_html( $images[$i]['text'] ); ?>
                </div>
                </a>
            </div>
        </div>
    </div>                   
</div>
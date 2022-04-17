<?php
/**
 * Template Name: Accom
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
<div class="filter-search">
    <div class="filter-search-column">
    <?php
    echo facetwp_display( 'facet', 'country' );
    ?>
    </div>
</div>
<div class="filter-headers">
	<div class="theme-row-zero">
		<div class="filter-columns">
            <div class="filter-icon">
			<svg id="sort-tool" xmlns="http://www.w3.org/2000/svg" width="16" height="14" viewBox="0 0 16 14">
				<path id="Path" d="M3,2H1A1,1,0,0,1,0,1H0A1,1,0,0,1,1,0H3A1,1,0,0,1,4,1H4A1,1,0,0,1,3,2Z" transform="translate(6 12)" fill="#ff006b"/>
				<path id="Path-2" data-name="Path" d="M7,2H1A1,1,0,0,1,0,1H0A1,1,0,0,1,1,0H7A1,1,0,0,1,8,1H8A1,1,0,0,1,7,2Z" transform="translate(4 8)" fill="#ff006b"/>
				<path id="Path-3" data-name="Path" d="M11,2H1A1,1,0,0,1,0,1H0A1,1,0,0,1,1,0H11a1,1,0,0,1,1,1h0A1,1,0,0,1,11,2Z" transform="translate(2 4)" fill="#ff006b"/>
				<path id="Path-4" data-name="Path" d="M15,2H1A1,1,0,0,1,0,1H0A1,1,0,0,1,1,0H15a1,1,0,0,1,1,1h0A1,1,0,0,1,15,2Z" fill="#ff006b"/>
			</svg>
			Filter
            </div>

            <div class="filter-sort">
                <?php echo facetwp_display( 'sort' ); ?>
            </div>
        </div>
	</div>
</div>
<div class="all-accoms">
	<div class="theme-row-zero">
        <div class="accoms-container">
		<div class="all-filters">
            <div class="all-filters-column">
                <span class="price-filter-title">Price Range</span>
                <svg width="237" height="45" viewBox="0 0 237 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect y="35" width="4" height="10" fill="#E3E3E8"/>
                    <rect x="5" y="35" width="4" height="10" fill="#E3E3E8"/>
                    <rect x="11" y="29" width="4" height="16" fill="#E3E3E8"/>
                    <rect x="17" y="25" width="4" height="20" fill="#E3E3E8"/>
                    <rect x="23" y="35" width="4" height="10" fill="#E3E3E8"/>
                    <rect x="23" y="17" width="4" height="28" fill="#E3E3E8"/>
                    <rect x="29" y="35" width="4" height="10" fill="#E3E3E8"/>
                    <rect x="29" y="12" width="4" height="33" fill="#E3E3E8"/>
                    <rect x="35" y="28" width="4" height="17" fill="#E3E3E8"/>
                    <rect x="41" y="22" width="4" height="23" fill="#E3E3E8"/>
                    <rect x="47" y="35" width="4" height="10" fill="#E3E3E8"/>
                    <rect x="47" y="3" width="4" height="42" fill="#E3E3E8"/>
                    <rect x="53" width="4" height="45" fill="#E3E3E8"/>
                    <rect x="59" y="9" width="4" height="36" fill="#E3E3E8"/>
                    <rect x="65" y="17" width="4" height="28" fill="#E3E3E8"/>
                    <rect x="71" y="24" width="4" height="21" fill="#E3E3E8"/>
                    <rect x="77" y="14" width="4" height="31" fill="#E3E3E8"/>
                    <rect x="83" y="38" width="4" height="7" fill="#E3E3E8"/>
                    <rect x="89" y="40" width="4" height="5" fill="#E3E3E8"/>
                    <rect x="95" y="35" width="4" height="10" fill="#E3E3E8"/>
                    <rect x="95" y="32" width="4" height="13" fill="#E3E3E8"/>
                    <rect x="101" y="22" width="4" height="23" fill="#E3E3E8"/>
                    <rect x="107" y="12" width="4" height="33" fill="#E3E3E8"/>
                    <rect x="113" y="6" width="4" height="39" fill="#E3E3E8"/>
                    <rect x="119" y="9" width="4" height="36" fill="#E3E3E8"/>
                    <rect x="125" y="28" width="4" height="17" fill="#E3E3E8"/>
                    <rect x="131" y="35" width="4" height="10" fill="#E3E3E8"/>
                    <rect x="137" y="38" width="4" height="7" fill="#E3E3E8"/>
                    <rect x="143" y="41" width="4" height="4" fill="#E3E3E8"/>
                    <rect x="149" y="43" width="4" height="2" fill="#E3E3E8"/>
                    <rect x="155" y="41" width="4" height="4" fill="#E3E3E8"/>
                    <rect x="161" y="38" width="4" height="7" fill="#E3E3E8"/>
                    <rect x="167" y="31" width="4" height="14" fill="#E3E3E8"/>
                    <rect x="173" y="41" width="4" height="4" fill="#E3E3E8"/>
                    <rect x="179" y="38" width="4" height="7" fill="#E3E3E8"/>
                    <rect x="185" y="35" width="4" height="10" fill="#E3E3E8"/>
                    <rect x="191" y="41" width="4" height="4" fill="#E3E3E8"/>
                    <rect x="197" y="43" width="4" height="2" fill="#E3E3E8"/>
                    <rect x="203" y="44" width="4" height="1" fill="#E3E3E8"/>
                    <rect x="209" y="38" width="4" height="7" fill="#E3E3E8"/>
                    <rect x="215" y="40" width="4" height="5" fill="#E3E3E8"/>
                    <rect x="221" y="43" width="4" height="2" fill="#E3E3E8"/>
                    <rect x="227" y="44" width="4" height="1" fill="#E3E3E8"/>
                    <rect x="233" y="44" width="4" height="1" fill="#E3E3E8"/>
                </svg>

                <?php
                echo facetwp_display( 'facet', 'price' );
                ?>
                <div class="hotel-approved-filter">
	            <?php
	            echo facetwp_display( 'facet', 'approved' );
	            ?>
                </div>
                <span>Accom Type</span>
                <?php
                echo facetwp_display( 'facet', 'accom_type' );
                ?>

                <span>Inclusions</span>
                <?php
                echo facetwp_display( 'facet', 'inclusions' );
                ?>
                <span>Amenities</span>
                <?php
                echo facetwp_display( 'facet', 'amenities' );
                ?>
                <div class="filter-details custom-checkbox">Disabled Rooms <span>Details</span></div>
                <div class="reset-all-filters" onclick="FWP.reset(['price', 'approved', 'accom_type', 'inclusions', 'amenities', 'rooms', 'commen_areas'])">Reset filter settings</div>
            </div>
            <div class="close-filter-sidebar">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.7 0.3C13.3 -0.1 12.7 -0.1 12.3 0.3L7 5.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L5.6 7L0.3 12.3C-0.1 12.7 -0.1 13.3 0.3 13.7C0.5 13.9 0.7 14 1 14C1.3 14 1.5 13.9 1.7 13.7L7 8.4L12.3 13.7C12.5 13.9 12.8 14 13 14C13.2 14 13.5 13.9 13.7 13.7C14.1 13.3 14.1 12.7 13.7 12.3L8.4 7L13.7 1.7C14.1 1.3 14.1 0.7 13.7 0.3Z" fill="black"/>
                </svg>
            </div>
		</div>
		<div class="all-accoms-list loads-accoms">
			<?php
			$r = new WP_Query( array( 
				'posts_per_page' => '9', 
                'post_type' => 'accom_hotel', 
                'meta_key' => 'starting_price',
                'orderby' => 'meta_value_num',
                'meta_type' => 'DECIMAL',
                'order' => 'ASC',
                'facetwp' => true, 
			));
			if ($r->have_posts()) :
			while ( $r->have_posts() ) : $r->the_post();
			/* Analytics */
            $post_id = get_the_ID();
				if( ! is_user_logged_in() ) {
                  $views = json_decode(get_field('impressions', $post_id), true);

                  if ( isset( $views[date('Y').'-'.date('F').'-'.date('j')] ) ){
                      $views[date('Y').'-'.date('F').'-'.date('j')]++;
                  }
                  else {
                      $views[date('Y').'-'.date('F').'-'.date('j')] = 1;
                  }

                  $field_key = "field_60e042907cadb";
                  $value = json_encode($views);
                  update_field( $field_key, $value, $post_id );
				}
				$i      = 1;
				$images = get_field( 'gallery' );
				if ( $images ):
				?>
			<div class="accom-grid-item">
				<div class="accom-featured">

						<?php foreach( $images as $image ): ?>
                            <div class="absolute-image-container">
	                            <?php
                                $image = esc_attr($image['id']);
                                if( $image ) {
					                $srcset = wp_get_attachment_image_srcset( $image, 'full' );
					                ?>
                                    <a href="<?php the_permalink(); ?>"><img class="carousel-cell-image" data-flickity-lazyload-srcset="<?php echo esc_attr( $srcset ); ?>" sizes="(max-width: 2500px) 100vw, 2500px"/></a>
                                    <?php
                                    }
	                            ?>
                            </div>
                            <?php if ( $i == 7 ) {
                                break;
                            }
                            else {
                                $i++;
                            }
                            ?>
						<?php endforeach; ?>


                </div>
                <?php
                if( get_field('approved') ) {
	                ?>
                    <div class="hotel-approved">
                        <svg width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_d)">
                                <rect x="10" y="5" width="21" height="20" rx="10" fill="white"/>
                            </g>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M19.9149 17.9866C18.1538 17.9866 16.7341 16.4965 16.8502 14.7108C16.948 13.2089 18.1528 11.9799 19.6526 11.8546C21.381 11.7103 22.8429 13.0074 22.9741 14.6725V9.85945C21.9189 9.21952 20.6529 8.89221 19.2988 9.03186C16.4585 9.32421 14.2068 11.6541 14.014 14.5028C13.7798 17.9563 16.5119 20.8301 19.9149 20.8301C21.0361 20.8301 22.0807 20.5126 22.9741 19.9707V15.1577C22.8497 16.7379 21.5266 17.9866 19.9149 17.9866Z" fill="#FF31EC"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M25.3698 20.8257L22.9741 19.9706V9.85935L25.3741 9.03921C25.5941 8.96411 25.8225 9.12755 25.8225 9.3599V20.5065C25.8225 20.7409 25.5903 20.9045 25.3698 20.8257Z" fill="#00B7FF"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M22.9741 9.85938V14.6726V15.1576V19.9706C24.6839 18.9339 25.8301 17.0608 25.8301 14.9151C25.8301 12.7694 24.6839 10.8963 22.9741 9.85938Z" fill="#0000FF"/>
                            <defs>
                                <filter id="filter0_d" x="0" y="0" width="41" height="40" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                    <feOffset dy="5"/>
                                    <feGaussianBlur stdDeviation="5"/>
                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.15 0"/>
                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                                </filter>
                            </defs>
                        </svg>
                    </div>
                    <?php
                }
                ?>
				<div class="accom-grid-over">
                  <div class="hotel-header">
                      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  </div>
                  <div class="accom-location">
                      <?php
                      if(get_field('city')) {
                          the_field( 'city' );
                      }
                      else {
                          the_field('state');
                      }
                      ?>
                  </div>
				</div>
			</div>
            <?php
			endif;/* Grid if for empty image*/

			endwhile;
			endif;
			wp_reset_postdata();
			?>

        </div>
	        <?php echo facetwp_display( 'facet', 'accom_pager' ); ?>
            <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
            <div class="loader-location"></div>
        </div>
	</div>
</div>
<div class="filter-modal-bg">
    <div class="filter-details-modal">
        <div class="filter-modal-title">Accessibility Rooms</div>
        <div class="filter-modal-content">
            <span class="filter-modal-subtitle">Rooms</span>
			<?php
			echo facetwp_display( 'facet', 'rooms' );
			?>
            <span class="filter-modal-subtitle">Common Areas</span>
			<?php
			echo facetwp_display( 'facet', 'commen_areas' );
			?>
        </div>
        <div class="filter-modal-outro">
            <div class="filter-clear-modal" onclick="FWP.reset(['rooms', 'commen_areas'])">Clear all</div>
        </div>
        <div class="close-filter-modal">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.7 0.3C13.3 -0.1 12.7 -0.1 12.3 0.3L7 5.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L5.6 7L0.3 12.3C-0.1 12.7 -0.1 13.3 0.3 13.7C0.5 13.9 0.7 14 1 14C1.3 14 1.5 13.9 1.7 13.7L7 8.4L12.3 13.7C12.5 13.9 12.8 14 13 14C13.2 14 13.5 13.9 13.7 13.7C14.1 13.3 14.1 12.7 13.7 12.3L8.4 7L13.7 1.7C14.1 1.3 14.1 0.7 13.7 0.3Z" fill="black"/>
            </svg>
        </div>
    </div>
</div>
<?php
endwhile; // end of the loop.
get_footer();

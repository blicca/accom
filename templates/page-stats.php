<?php
/**
 * Template Name: Stats
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
    <?php
    $args = array(
        'post_type' => 'accom_hotel',
        'author'    => get_current_user_id(),
        'post_status' => array('publish', 'pending', 'future', 'private')
    );
    $wp_posts = get_posts($args);
    $hotel_id = 0;
    if (count($wp_posts)) {
        foreach ( $wp_posts as $post ) :
            setup_postdata( $post );
            $hotel_id = $post->ID;
        endforeach;
        wp_reset_postdata();
    ?>

    <?php /* Analytics */ ?>
    <div class="analytics">
        <div class="analytics-title" data-pid="<?php echo esc_js($hotel_id); ?>">
            <?php echo esc_html(get_the_title($hotel_id)); ?> Report
        </div>

        <div class="dropdown-row">
            <div class="custom-select-wrapper">
                <div class="custom-select">
                    <div class="custom-select__trigger"><span><?php echo date( 'M, Y'); ?></span>
                        <div class="arrow">
                            <svg width="8" height="4" viewBox="0 0 8 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.5 0.5L4 3.5L0.5 0.5" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                    <div class="custom-options">
                        <?php
                        $post_year = get_the_time('Y', $hotel_id);
                        $post_month = get_the_time('n', $hotel_id);
                        $current_year = date('Y');
                        $current_month = date('n');

                        if ($post_year == $current_year) {
                            for ($i=$current_month; $i >= $post_month; $i-- ) {
                                $dateObj   = DateTime::createFromFormat('!m', $i);
                                $monthName = $dateObj->format('M'); // March
                                $monthLong = $dateObj->format('F');
                                ?>
                                <span class="custom-option<?php if($i == $current_month) { echo " selected"; } ?>" data-value="<?php echo esc_js($monthName); ?><?php echo date( ', Y'); ?>" data-year="<?php echo date( 'Y'); ?>" data-month="<?php echo esc_js($i); ?>" data-monthlong="<?php echo esc_js($monthLong) ?>"><?php echo esc_js($monthName); ?><?php echo date( ', Y'); ?></span>
                                <?php

                            }
                        }
      					else {
                            for ($i=$current_month; $i >= 1; $i-- ) {
	                            $dateObj   = DateTime::createFromFormat('!m', $i);
	                            $monthName = $dateObj->format('M'); // March
                                $monthLong = $dateObj->format('F');
                                ?>
                                <span class="custom-option<?php if($i == $current_month) { echo " selected"; } ?>" data-value="<?php echo esc_js($monthName); ?><?php echo date( ', Y'); ?>" data-year="<?php echo date( 'Y'); ?>" data-month="<?php echo esc_js($i); ?>" data-monthlong="<?php echo esc_js($monthLong) ?>"><?php echo esc_js($monthName); ?><?php echo date( ', Y'); ?></span>
                                <?php

                            }
                          	$previous_years = $current_year - 1;
                          	while( $post_year <= $previous_years) {
                                for ($i=12; $i >= $post_month; $i-- ) {
                                    $dateObj   = DateTime::createFromFormat('!m', $i);
                                    $monthName = $dateObj->format('M'); // March
                                    $monthLong = $dateObj->format('F');
                                    ?>
                                    <span class="custom-option<?php if($i == $current_month) { echo " selected"; } ?>" data-value="<?php echo esc_js($monthName); ?><?php echo ', '.$previous_years; ?>" data-year="<?php echo $previous_years; ?>" data-month="<?php echo esc_js($i); ?>" data-monthlong="<?php echo esc_js($monthLong) ?>"><?php echo esc_js($monthName); ?><?php echo ', '.$previous_years; ?></span>
                                    <?php

                                }                              
                              
                              
                              	$previous_years--;
      						}
      					}      
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $current_year = date('Y');
        $current_month = date('n');
        $num = cal_days_in_month(CAL_GREGORIAN, $current_month, $current_year); // 31

        $impressions = json_decode(get_field('impressions', $hotel_id), true);
        $clicks = json_decode(get_field('clicks', $hotel_id), true);
        $views = json_decode(get_field('views', $hotel_id), true);
        $unique_views = json_decode(get_field('unique_views', $hotel_id), true);
        $total_impressions = $total_clicks = $total_views = $total_unique_views = 0;
        $data_impressions = $data_clicks = $data_views = $data_unique_views = $data_label = [];
        for($i=1; $i<=$num; $i++) {
            $date = DateTime::createFromFormat('Y-F-j', date('Y') . '-' . date('F'). '-' . date($i) );
            $label= $date->format('j M, Y - l');
            $data_label[] = $label;
            if ( isset($impressions[date('Y').'-'.date('F').'-'.date($i)]) ) {
                $total_impressions += $impressions[date('Y').'-'.date('F').'-'.date($i)];
                $data_impressions[] = $impressions[date('Y').'-'.date('F').'-'.date($i)];
            }
            else {
                $data_impressions[] = 0;
            }
            if ( isset($clicks[date('Y').'-'.date('F').'-'.date($i)]) ) {
                $total_clicks += $clicks[date('Y').'-'.date('F').'-'.date($i)];
                $data_clicks[] = $clicks[date('Y').'-'.date('F').'-'.date($i)];
            }
            else {
                $data_clicks[] = 0;
            }
            if ( isset($views[date('Y').'-'.date('F').'-'.date($i)]) ) {
                $total_views += $views[date('Y').'-'.date('F').'-'.date($i)];
                $data_views[] = $views[date('Y').'-'.date('F').'-'.date($i)];
            }
            else {
                $data_views[] = 0;
            }
            if ( isset($unique_views[date('Y').'-'.date('F').'-'.date($i)]) ) {
                $total_unique_views += $unique_views[date('Y').'-'.date('F').'-'.date($i)];
                $data_unique_views[] =  $unique_views[date('Y').'-'.date('F').'-'.date($i)];
            }
            else {
                $data_unique_views[] = 0;
            }

        }
        $ctr = 0;
        if ( $total_clicks != 0 ) {
	        $ctr = $total_clicks * 100 / $total_views;
        }
        ?>
        <div class="charts-row">
            <div class="theme-row-zero">
                <div class="charts-column">
                    <div class="charts-titles">
                        <div class="chart-title aktif">
                            <div class="chart-tab-title">Impressions</div>
                            <div class="chart-tab-value val-for-impression" data-chart="<?php echo esc_js(json_encode($data_impressions)) ?>" data-label="<?php echo esc_js(json_encode($data_label)) ?>"><?php echo esc_html($total_impressions) ?></div>
                        </div>
                        <div class="chart-title">
                            <div class="chart-tab-title">CTR</div>
                            <div class="chart-tab-value val-for-ctr" data-chart="<?php echo esc_js(json_encode($data_clicks)) ?>" data-label="<?php echo esc_js(json_encode($data_label)) ?>"><?php echo esc_html(round($ctr, 2)) ?>%</div>
                        </div>
                        <div class="chart-title">
                            <div class="chart-tab-title">Views</div>
                            <div class="chart-tab-value val-for-views" data-chart="<?php echo esc_js(json_encode($data_views)) ?>" data-label="<?php echo esc_js(json_encode($data_label)) ?>"><?php echo esc_html($total_views) ?></div>
                        </div>
                        <div class="chart-title">
                            <div class="chart-tab-title">Unique views</div>
                            <div class="chart-tab-value val-for-unique" data-chart="<?php echo esc_js(json_encode($data_unique_views)) ?>" data-label="<?php echo esc_js(json_encode($data_label)) ?>"><?php echo esc_html($total_unique_views) ?></div>
                        </div>
                    </div>
                    <div class="charts-draw">
                        <div class="chart-impression">
                            <canvas id="chart-impression" width="1234" height="291"></canvas>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php
    }
    else {
        ?>
        <div class="analytics-title" style="height: calc(100vh - 180px);">
            You don't have any reports now.
        </div>
        <?php
    }
        ?>
<?php
endwhile; // end of the loop.
get_footer();
<?php
/**
 * Accom WordPress Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * @package accom
 * @since 1.0.0
 */
 

if ( ! function_exists( 'accom_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function accom_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Accom, use a find and replace
		 * to change 'accom' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'accom', get_template_directory() . '/languages' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
    	add_theme_support( 'post-thumbnails' );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-main' => esc_html__( 'Primary', 'accom' ),
			'footer-menu1' => esc_html__( 'Footer Menu 1', 'accom'),
			'footer-menu2' => esc_html__( 'Footer Menu 2', 'accom')
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			//'search-form',
			//'comment-form',
			//'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		
		// Excerpt
		function vision_expert( $length ) {
      	return 16;
    	}
    	add_filter( 'excerpt_length', 'vision_expert', 999 );
    
		//Code to remove header fluff
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link');
		remove_action('wp_head', 'wp_generator');
		remove_action('wp_head', 'start_post_rel_link');
		remove_action('wp_head', 'index_rel_link');
		remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );		
	
	}
endif;
add_action( 'after_setup_theme', 'accom_setup' );

add_filter('register_post_type_args', 'update_hotel_cpt', 10, 2);
function update_hotel_cpt($args, $post_type){
	$slug = 'accom_hotel';
	$slug_plural = $slug . 's';
	if ($post_type == 'accom_hotel'){
		$args['capability_type'] = $slug;
		$args['capabilities'] = [
			'create_posts' => 'create_' . $slug_plural,
			'delete_others_posts' => 'delete_others_' . $slug_plural,
			'delete_posts' => 'delete_' . $slug_plural,
			'delete_private_posts' => 'delete_private_' . $slug_plural,
			'delete_published_posts' => 'delete_published_' . $slug_plural,
			'edit_posts' => 'edit_' . $slug_plural,
			'edit_others_posts' => 'edit_others_' . $slug_plural,
			'edit_private_posts' => 'edit_private_' . $slug_plural,
			'edit_published_posts' => 'edit_published_' . $slug_plural,
			'publish_posts' => 'publish_' . $slug_plural,
			'read_private_posts' => 'read_private_' . $slug_plural,
			'read' => 'read',
		];
	}

	return $args;
}




/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function accom_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'accom_content_width', 752, 0 );
}
add_action( 'after_setup_theme', 'accom_content_width', 0 );



/**
 * Enqueue scripts and styles.
 */
function accom_script_style() {
  /* CSS */
  wp_enqueue_style( 'flickity-slider', get_parent_theme_file_uri() .'/assets/css/flickity.min.css', '1.0.0' );
  wp_enqueue_style( 'accom', get_parent_theme_file_uri() . '/style.css', '1.0.0' );
  /* Scripts */
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
  }
  wp_enqueue_script('jquery-cookie', get_parent_theme_file_uri() . '/assets/js/js.cookie-2.2.1.min.js', array('jquery'), '', true);
  wp_enqueue_script('flickity-slider', get_parent_theme_file_uri() . '/assets/js/flickity.pkgd.min.js', array('jquery'), '', true);
  wp_enqueue_script('chart-js', get_parent_theme_file_uri() . '/assets/js/chart.min.js', array('jquery'), '', true);
  wp_enqueue_script('main-script', get_parent_theme_file_uri() . '/assets/js/main.js', array('jquery'), null, true);	
}
add_action( 'wp_enqueue_scripts', 'accom_script_style' );

/*
	Add OPTIONS page for the SITE and GAMES
		
*/
if( function_exists('acf_add_options_page') ) {	
		acf_add_options_page(array(
			'page_title' 	=> 'Theme Settings',
			'menu_title'	=> 'Theme Settings',
			'menu_slug' 	=> 'theme-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		)); 
}



/*********/
/* Body */
/********/
if (!function_exists('accom_body')) {
  function accom_body($classes) {
    $classes[] = "accom-helper";
    return $classes;
  }
  add_filter( 'body_class', 'accom_body' );
}

/**
 * Helper Function for ACF Image Field
 */
function awesome_acf_responsive_image($image_id,$image_size,$max_width){

	// check the image ID is not blank
	if($image_id != '') {

		// set the default src image size
		$image_src = wp_get_attachment_image_url( $image_id, $image_size );

		// set the srcset with various image sizes
		$image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );

		// generate the markup for the responsive image
		echo 'itemprop="image" src="'.$image_src.'" srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'"';

	}
}

/********************************/
/*         Pagination           */
/********************************/
if ( !function_exists('accom_blog_pagination')) {
  function accom_blog_pagination($pages = '', $range = 4)
    {  
        global $wp_query;
  
                            $big = 999999999; // need an unlikely integer
  
                            echo paginate_links( array(
                                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                'format' => '?paged=%#%',
                                'current' => max( 1, get_query_var('paged') ),
                                'total' => $wp_query->max_num_pages,
                                'type'         => 'list',
                                'prev_text'          => '&laquo;',
                                'next_text'          => '&raquo;',
                            ) );
    }
}


/*******************/
/* Remove Comments */
// Removes from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

add_filter( 'wpcf7_autop_or_not', '__return_false');

// Google Maps Api
function my_acf_google_map_api( $api ){
	$api['key'] = 'AIzaSyAPi_czTH9FhNIjJRgOcWpwQy1_ZqMGaZk';
	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
/*
 * Subscriber
 */
function accom_subscriber( $query_args, $r ) {

	$query_args['role'] = array('subscriber');

	// Unset the 'who' as this defaults to the 'author' role
	unset( $query_args['who'] );

	return $query_args;
}
add_filter( 'wp_dropdown_users_args', 'accom_subscriber', 10, 2 );
/*
 * Creating Country and City
 */
add_action('acf/save_post', 'my_acf_save_post');
function my_acf_save_post( $post_id ) {
    $location_country = trim( get_field('country') );
    $location_city = trim( get_field('visible_city') );
    $location_state = trim( get_field('visible_state') );
    $location_suburb = trim( get_field('visible_suburb') );
	$field_key_state = "field_6179375f33224";
	$field_key_city = "field_60ae178cdff17";
	$field_key_suburb = "field_616c59cc21119";
    /* Address */
	if ( !empty($location_state) ) {
		/* State */
		$value_state = $location_state.', '.$location_country;
		update_field( $field_key_state, $value_state, $post_id );
        if( !empty($location_city) ) {
            /* Update City */
            $value_city = $location_city. ', '. $location_state. ', '. $location_country;
	        update_field( $field_key_city, $value_city, $post_id );
            if ( !empty($location_suburb) ) {
                $value_suburb = $location_suburb. ', '. $value_city;
                update_field($field_key_suburb, $value_suburb, $post_id);
            }
            else {
	            update_field($field_key_suburb, '', $post_id);
            }
        }
        else {
	        update_field( $field_key_city, '', $post_id );
	        if ( !empty($location_suburb) ) {
		        $value_suburb = $location_suburb. ', '. $value_state;
		        update_field($field_key_suburb, $value_suburb, $post_id);
	        }
            else {
	            update_field($field_key_suburb, '', $post_id);
            }
        }
	}
	else {
		update_field( $field_key_state, '', $post_id );
        if ( !empty($location_city) ) {
            $value_city = $location_city. ', '. $location_country;
            update_field( $field_key_city, $value_city, $post_id);
	        if ( !empty($location_suburb) ) {
		        $value_suburb = $location_suburb. ', '. $value_city;
		        update_field($field_key_suburb, $value_suburb, $post_id);
	        }
	        else {
		        update_field($field_key_suburb, '', $post_id);
	        }
        }
        else {
	        update_field( $field_key_city, '', $post_id);
	        if ( !empty($location_suburb) ) {
		        $value_suburb = $location_suburb. ', '. $location_country;
		        update_field($field_key_suburb, $value_suburb, $post_id);
	        }
	        else {
		        update_field($field_key_suburb, '', $post_id);
	        }
        }


	}

}
/*
 * Combining Country and City for Search
 */

add_filter( 'facetwp_index_row', function( $params, $class ) {

	if ( 'state' == $params['facet_name'] ) {
		$params['facet_name'] = 'country';
	}
	if ( 'city' == $params['facet_name'] ) {
		$params['facet_name'] = 'country';
	}

	return $params;
}, 10, 2 );
/**
 * Add to your (child) theme's functions.php
 * Replace "YOUR_AC_NAME" with the actual facet name
 */
add_filter( 'facetwp_render_output', function( $output, $params ) {
	$output['settings']['country']['minChars'] = 1;
	return $output;
}, 10, 2 );

/*
 * Adding options for Sort Price
 */
add_filter( 'facetwp_sort_options', function( $options, $params ) {
	$options = [
		'default' => [
			'label' => __( 'Price - Lowest First', 'accom' ),
			'query_args' => [
				'meta_key' => 'starting_price',
				'orderby' => 'meta_value_num',
				'order' => 'ASC',
			]
		],
		'price_desc' => [
			'label' => __( 'Price - Highest First', 'accom' ),
			'query_args' => [
				'meta_key' => 'starting_price',
				'orderby' => 'meta_value_num',
				'order' => 'DESC',
			]
		]
	];
	return $options;
}, 10, 2 );


/*
 * HEX Helper
 */

function hex2rgba($color, $opacity = false) {

	$default = 'rgb(0,0,0)';

	//Return default if no color provided
	if(empty($color))
		return $default;

	//Sanitize $color if "#" is provided
	if ($color[0] == '#' ) {
		$color = substr( $color, 1 );
	}

	//Check if color has 6 or 3 characters and get values
	if (strlen($color) == 6) {
		$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	} elseif ( strlen( $color ) == 3 ) {
		$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	} else {
		return $default;
	}

	//Convert hexadec to rgb
	$rgb =  array_map('hexdec', $hex);

	//Check if opacity is set(rgba or rgb)
	if($opacity){
		if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
		$output = 'rgb('.implode(",",$rgb).')';
	}

	//Return rgb(a) color string
	return $output;
}
/*
 * Number Helper
 */
function thousandsCurrencyFormat($num) {

	if($num>1000) {

		$x = round($num);
		$x_number_format = number_format($x);
		$x_array = explode(',', $x_number_format);
		$x_parts = array('k', 'm', 'b', 't');
		$x_count_parts = count($x_array) - 1;
		$x_display = $x;
		$x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
		$x_display .= $x_parts[$x_count_parts - 1];

		return $x_display;

	}

	return $num;
}
/****************************/
/* MemberPress Account Page */
/****************************/
function mepr_add_some_tabs($user) {
	?>

    <span class="mepr-nav-item mepr-add-accom">

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
            <a href="/wp-admin/post.php?post=<?php echo esc_attr($hotel_id); ?>&action=edit">Edit your Listing</a>
        <?php
	    }
        else {
        ?>
	        <a href="/wp-admin/post-new.php?post_type=accom_hotel">Add your Listing</a>
        <?php
        }
        ?>
    </span>

    <span class="mepr-nav-item mepr-stats">
      <!-- REDIRECTS THE USER TO A DIFFERENT PAGE ON THE SITE -->
      <a href="/analytics/">Analytics</a>
    </span>
	<?php
}
add_action('mepr_account_nav', 'mepr_add_some_tabs');

/***************************/
/* Admin CSS for Dashboard */
/***************************/

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
	echo '<style>
    #acf-group_60e0428582c88,
    body.post-type-accom_hotel #members-cp,
    body.post-type-accom_hotel #mepr_unauthorized_message,
    body.post-type-accom_hotel .acf-field-616c59cc21119,
    body.post-type-accom_hotel .acf-field-60ae178cdff17,
    body.post-type-accom_hotel .acf-field-616c59cc21119,
    body.post-type-accom_hotel .acf-field-6179375f33224
    {
    display: none !important;
    }
  </style>';
}
/******************************/
/*   Archive AJAX Functions   */
/******************************/
add_action( 'wp_enqueue_scripts', 'accom_analytics_ajax_script');

function accom_analytics_ajax_script() {

	// when you use wp_localize_script(), do not enqueue the target script immediately
	wp_register_script( 'theme-ajax-library', get_parent_theme_file_uri() . '/assets/js/analytics.js', array('jquery'), '1.0', true );

	// passing parameters here
	wp_localize_script( 'theme-ajax-library', 'theme_ajax_params', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ), // WordPress AJAX
		'hotel_page' => 1,
		'cookieFlag' => "unvisited",
		'new_year' => '0',
		'new_month' => '0',
		'pid' => '0',
        'monthLong' => '0'
	) );

	wp_enqueue_script( 'theme-ajax-library' );
}

/* Analytics */
add_action('wp_ajax_accom_analytics_ajax_handler', 'accom_analytics_ajax_handler');
add_action('wp_ajax_nopriv_accom_analytics_ajax_handler', 'accom_analytics_ajax_handler');

function accom_analytics_ajax_handler(){
	if( ! is_user_logged_in() ) {
      /* Single Views */
      $post_id = sanitize_text_field($_POST['hotel_page']);
      $hotel_visited = sanitize_text_field($_POST['cookieFlag']);

      $views = json_decode(get_field('views', $post_id), true);

      if ( isset( $views[date('Y').'-'.date('F').'-'.date('j')] ) ){
          $views[date('Y').'-'.date('F').'-'.date('j')]++;
      }
      else {
          $views[date('Y').'-'.date('F').'-'.date('j')] = 1;
      }

      $field_key = "field_60e042bf7cadc";
      $value = json_encode($views);
      update_field( $field_key, $value, $post_id );

      /* Single Unique Views */
      if ( $hotel_visited == "unvisited" ) {

          $views = json_decode(get_field('unique_views', $post_id), true);

          if ( isset( $views[date('Y').'-'.date('F').'-'.date('j')] ) ){
              $views[date('Y').'-'.date('F').'-'.date('j')]++;
          }
          else {
              $views[date('Y').'-'.date('F').'-'.date('j')] = 1;
          }

          $field_key = "field_60e042c27cadd";
          $value = json_encode($views);
          update_field( $field_key, $value, $post_id );
      }
  	}
	die; // here we exit the script
}

add_action('wp_ajax_accom_clicks_ajax_handler', 'accom_clicks_ajax_handler');
add_action('wp_ajax_nopriv_accom_clicks_ajax_handler', 'accom_clicks_ajax_handler');

function accom_clicks_ajax_handler(){
	if( ! is_user_logged_in() ) {
      /* Single Views */
      $post_id = sanitize_text_field($_POST['hotel_page']);

      $clicks = json_decode(get_field('clicks', $post_id), true);

      if ( isset( $clicks[date('Y').'-'.date('F').'-'.date('j')] ) ){
          $clicks[date('Y').'-'.date('F').'-'.date('j')]++;
      }
      else {
          $clicks[date('Y').'-'.date('F').'-'.date('j')] = 1;
      }

      $field_key = "field_60e0ac971f45b";
      $value = json_encode($clicks);
      update_field( $field_key, $value, $post_id );

	}

	die; // here we exit the script
}

add_action('wp_ajax_accom_update_chart_ajax_handler', 'accom_update_chart_ajax_handler');
add_action('wp_ajax_nopriv_accom_update_chart_ajax_handler', 'accom_update_chart_ajax_handler');

function accom_update_chart_ajax_handler(){

		$new_year =  sanitize_text_field($_POST['new_year'] );
		$new_month =  sanitize_text_field($_POST['new_month'] );
		$pid =  sanitize_text_field($_POST['pid'] );
	    $monthLong = sanitize_text_field($_POST['monthLong']);

        $current_year = $new_year;
        $current_month = $new_month;
        $num = cal_days_in_month(CAL_GREGORIAN, $current_month, $current_year); // 31

        $impressions = json_decode(get_field('impressions', $pid), true);
        $clicks = json_decode(get_field('clicks', $pid), true);
        $views = json_decode(get_field('views', $pid), true);
        $unique_views = json_decode(get_field('unique_views', $pid), true);
        $total_impressions = $total_clicks = $total_views = $total_unique_views = 0;
        $data_impressions = $data_clicks = $data_views = $data_unique_views = $data_label = [];
        for($i=1; $i<=$num; $i++) {
	        $date = DateTime::createFromFormat('Y-F-j', $current_year . '-' . $monthLong . '-' . $i );
	        $label= $date->format('j M, Y - l');
	        $data_label[] = $label;
	        if ( isset($impressions[$current_year.'-'.$monthLong.'-'.$i]) ) {
		        $total_impressions += $impressions[$current_year.'-'.$monthLong.'-'.$i];
		        $data_impressions[] = $impressions[$current_year.'-'.$monthLong.'-'.$i];
	        }
	        else {
		        $data_impressions[] = 0;
	        }
	        if ( isset($clicks[$current_year.'-'.$monthLong.'-'.$i]) ) {
		        $total_clicks += $clicks[$current_year.'-'.$monthLong.'-'.$i];
		        $data_clicks[] = $clicks[$current_year.'-'.$monthLong.'-'.$i];
	        }
	        else {
		        $data_clicks[] = 0;
	        }
	        if ( isset($views[$current_year.'-'.$monthLong.'-'.$i]) ) {
		        $total_views += $views[$current_year.'-'.$monthLong.'-'.$i];
		        $data_views[] = $views[$current_year.'-'.$monthLong.'-'.$i];
	        }
	        else {
		        $data_views[] = 0;
	        }
	        if ( isset($unique_views[$current_year.'-'.$monthLong.'-'.$i]) ) {
		        $total_unique_views += $unique_views[$current_year.'-'.$monthLong.'-'.$i];
		        $data_unique_views[] =  $unique_views[$current_year.'-'.$monthLong.'-'.$i];
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
<div class="test <?php echo $current_month.'-'.$monthLong.'-'.$i ?>"> </div>
	<div class="theme-row-zero test">
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

	<?php
	die; // here we exit the script
}


function fwp_slider_set_label() {
    global $WPCS;
	$page_currency = $WPCS->current_currency;
	$all_currencies = $WPCS->get_currencies();
    $exchange_rate = $all_currencies[$page_currency]['rate'];
  	$symbol = $all_currencies[$page_currency]['symbol'];  
?>
<script>
(function($) {
    $(function() {
        FWP.hooks.addAction('facetwp/set_label/slider', function($this) {
            var facet_name = $this.attr('data-name');
            var exchange_rate = <?php echo $exchange_rate; ?>;
            var symbol = '<?php echo preg_replace('/\s\s+/', ' ', $symbol); ?>';
            var min = FWP.settings[facet_name]['lower'] * exchange_rate;
            var max = FWP.settings[facet_name]['upper'] * exchange_rate;
            var min_alpha = parseInt(min);
            var max_alpha = parseInt(max);
          	if ( min === max ) {
            label = symbol + min_alpha;  
          	}
            else {
            label = symbol + min_alpha + ' &mdash; ' + symbol + max_alpha;  
          	}
            $this.find('.facetwp-slider-label').html(label);
        });
    });
})(jQuery);
</script>
<?php
}
add_action( 'wp_head', 'fwp_slider_set_label', 999 );
<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy
 *
 */
?>
<?php
get_header();
?>
<?php
// Overview Section (over default wordpress content)
if (have_posts()) : while (have_posts()) : the_post();

$hotel_unique = get_the_ID();
$single_location['country'] = trim( get_field('country') );
$single_location['state'] = trim( get_field('visible_state') );
$single_location['city'] = trim( get_field('visible_city') );
$single_location['suburb'] = trim( get_field('visible_suburb') );
$address = '';
if ( $single_location ) {

	    foreach ( array( 'suburb', 'city', 'state', 'country' ) as $i => $k ) {
		    if ( isset( $single_location[ $k ] ) && !empty( $single_location[ $k ] ) ) {
			    $address .= sprintf( '<span class="segment-%s">%s</span>, ', $k, $single_location[ $k ] );
		    }
	    }
}

	// Trim trailing comma.
	$address = trim( $address, ', ' );

?>
<div class="single-accom-container" data-id="<?php echo esc_attr($hotel_unique) ?>">
	<div class="theme-row-zero">
		<div class="single-accom-title">
			<h1><?php the_title(); ?></h1>
			<span class="single-accom-location"><?php echo wp_kses_post($address); ?></span>
		</div>
        <div class="single-accom-gallery">
	        <?php
	        $images = get_field('gallery');
	        $i = 1;
	        if( $images ): ?>

			        <?php foreach( $images as $image ): ?>
                        <div class="single-gallery-item">
                            <a class="open-gallery-link" href="#s-photo<?php echo esc_attr($i);?>"><img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></a>
                        </div>
                        <?php
                            if ($i == 5) {
                                break;
                            }
                            $i++;
                        ?>
			        <?php endforeach; ?>

	        <?php endif; ?>
            <div class="show-all-photos"><svg width="17px" height="15px" viewBox="0 0 17 15" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>camera</title>
                    <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                        <g id="d-hotel" transform="translate(-1256.000000, -775.000000)" stroke="#FF006B">
                            <g id="Button/Regular/White" transform="translate(1247.000000, 767.000000)">
                                <g id="camera" transform="translate(10.000000, 9.000000)">
                                    <circle id="Oval" cx="8.5" cy="7.5" r="3.5"></circle>
                                    <line x1="2" y1="4" x2="3" y2="4" id="Path"></line>
                                    <path d="M14,2 L12,2 L11,0 L6,0 L5,2 L1,2 C0.448,2 0,2.448 0,3 L0,12 C0,12.552 0.448,13 1,13 L14,13 C14.552,13 15,12.552 15,12 L15,3 C15,2.448 14.552,2 14,2 Z" id="Path"></path>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg> Show me more</div>
            <div class="single-hotel-approved">
	            <?php
	            if( get_field('approved') ) {
		            ?>
                    <svg width="119" height="32" viewBox="0 0 119 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0)">
                            <g filter="url(#filter0_d)">
                                <rect width="119" height="32" rx="16" fill="white"/>
                            </g>
                            <path d="M34.096 21H35.632L37.072 17.688H42.368L43.84 21H45.392L40.352 9.64H39.12L34.096 21ZM39.712 11.656L41.776 16.344H37.664L39.712 11.656ZM47.9064 24.344V19.768C48.4344 20.536 49.5064 21.16 50.7224 21.16C52.9624 21.16 54.6424 19.288 54.6424 17C54.6424 14.712 52.9624 12.84 50.7224 12.84C49.5064 12.84 48.4344 13.464 47.9064 14.232V13H46.5304V24.344H47.9064ZM50.5144 19.896C48.9144 19.896 47.7944 18.616 47.7944 17C47.7944 15.384 48.9144 14.104 50.5144 14.104C52.1144 14.104 53.2344 15.384 53.2344 17C53.2344 18.616 52.1144 19.896 50.5144 19.896ZM57.7501 24.344V19.768C58.2781 20.536 59.3501 21.16 60.5661 21.16C62.8061 21.16 64.4861 19.288 64.4861 17C64.4861 14.712 62.8061 12.84 60.5661 12.84C59.3501 12.84 58.2781 13.464 57.7501 14.232V13H56.3741V24.344H57.7501ZM60.3581 19.896C58.7581 19.896 57.6381 18.616 57.6381 17C57.6381 15.384 58.7581 14.104 60.3581 14.104C61.9581 14.104 63.0781 15.384 63.0781 17C63.0781 18.616 61.9581 19.896 60.3581 19.896ZM66.2179 21H67.5939V17.032C67.5939 15.16 68.6979 14.28 69.7059 14.28C69.9779 14.28 70.2019 14.296 70.4579 14.408V12.984C70.2499 12.936 70.0419 12.92 69.8339 12.92C68.9219 12.92 67.8979 13.528 67.5939 14.552V13H66.2179V21ZM75.098 21.16C77.498 21.16 79.274 19.304 79.274 17C79.274 14.696 77.498 12.84 75.098 12.84C72.666 12.84 70.906 14.696 70.906 17C70.906 19.304 72.666 21.16 75.098 21.16ZM75.098 19.88C73.434 19.88 72.314 18.6 72.314 17C72.314 15.4 73.434 14.12 75.098 14.12C76.762 14.12 77.866 15.4 77.866 17C77.866 18.6 76.762 19.88 75.098 19.88ZM83.3233 21H84.4753L88.1713 13H86.6353L83.8993 19.064L81.1633 13H79.6273L83.3233 21ZM92.5477 21.16C94.5798 21.16 95.9078 19.976 96.2917 18.568H94.8838C94.3878 19.528 93.5718 19.912 92.5638 19.912C91.1078 19.912 89.9557 18.824 89.9078 17.368H96.4198C96.5958 14.888 95.1078 12.84 92.5798 12.84C90.0678 12.84 88.5158 14.648 88.5158 17C88.5158 19.384 90.2118 21.16 92.5477 21.16ZM92.5318 14.056C93.7318 14.056 94.7078 14.792 94.9638 16.28H89.9718C90.2278 14.712 91.3958 14.056 92.5318 14.056ZM101.451 21.16C102.667 21.16 103.739 20.536 104.267 19.768V21H105.643V9H104.267V14.232C103.739 13.464 102.667 12.84 101.451 12.84C99.2114 12.84 97.5314 14.712 97.5314 17C97.5314 19.288 99.2114 21.16 101.451 21.16ZM101.659 19.896C100.043 19.896 98.9234 18.616 98.9234 17C98.9234 15.384 100.043 14.104 101.659 14.104C103.259 14.104 104.379 15.384 104.379 17C104.379 18.616 103.259 19.896 101.659 19.896Z" fill="#2E2E38"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.8582 20.9776C12.923 20.9776 10.5568 18.4941 10.7503 15.5179C10.9134 13.0148 12.9213 10.9665 15.4209 10.7576C18.3016 10.5172 20.7382 12.679 20.9568 15.4541V7.43241C19.1982 6.36586 17.0882 5.82034 14.8313 6.0531C10.0975 6.54034 6.34474 10.4234 6.02336 15.1714C5.63301 20.9272 10.1865 25.7169 15.8582 25.7169C17.7268 25.7169 19.4678 25.1876 20.9568 24.2845V16.2628C20.7496 18.8966 18.5444 20.9776 15.8582 20.9776Z" fill="#FF31EC"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M24.9498 25.7096L20.957 24.2844V7.43233L24.957 6.06543C25.3236 5.94026 25.7043 6.21267 25.7043 6.59991V25.1775C25.7043 25.5682 25.3174 25.841 24.9498 25.7096Z" fill="#00B7FF"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.957 7.43237V15.4544V16.2627V24.2844C23.8067 22.5565 25.717 19.4348 25.717 15.8586C25.717 12.2824 23.8067 9.16065 20.957 7.43237Z" fill="#0000FF"/>
                        </g>
                        <defs>
                            <filter id="filter0_d" x="-10" y="-5" width="139" height="52" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                <feOffset dy="5"/>
                                <feGaussianBlur stdDeviation="5"/>
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.15 0"/>
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                            </filter>
                            <clipPath id="clip0">
                                <rect width="119" height="32" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>

		            <?php
	            }
	            ?>
            </div>
        </div>
        <div class="single-hotel-contents">
            <div class="single-hotel-main">
                <div class="single-hotel-fields">

	                <?php
	                $amenities = get_field('amenities');
	                ?>
	                <?php if( $amenities ): ?>
		                <?php foreach( $amenities as $amenity ): ?>
                            <div class="single-field-item uicon-<?php echo sanitize_title($amenity['value']); ?>">
                                <?php
                                switch ($amenity['label']) {
	                                case "24 hour front desk":
		                                ?>
                                        <svg width="24px" height="23px" viewBox="0 0 24 23" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>24h_desk</title>
                                            <defs>
                                                <filter color-interpolation-filters="auto" id="filter-1">
                                                    <feColorMatrix in="SourceGraphic" type="matrix" values="0 0 0 0 1.000000 0 0 0 0 0.000000 0 0 0 0 0.420000 0 0 0 1.000000 0"></feColorMatrix>
                                                </filter>
                                            </defs>
                                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="24h_desk" transform="translate(-782.000000, -135.000000)" filter="url(#filter-1)">
                                                    <g transform="translate(782.854767, 135.000000)">
                                                        <line x1="11" y1="4.5" x2="11" y2="0.5" id="Path" stroke="#000000"></line>
                                                        <path d="M22,15.5 C22,9.4 17.1,4.5 11,4.5 C4.9,4.5 0,9.4 0,15.5 L0,18.5 L22,18.5 L22,15.5 Z" id="Path" stroke="#000000" stroke-linecap="square"></path>
                                                        <path d="M4.1,14.5 C4.4,12.5 5.5,10.8 7,9.8" id="Path" stroke="#000000" stroke-linecap="square"></path>
                                                        <line x1="0" y1="22.5" x2="22" y2="22.5" id="Path" stroke="#000000" stroke-linecap="square"></line>
                                                        <line x1="15" y1="0.5" x2="7" y2="0.5" id="Path" stroke="#000000" stroke-linecap="square"></line>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        <?php
		                                break;
	                                case "Adults Only":
		                                ?>
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>adults_only</title>
                                            <defs>
                                                <filter color-interpolation-filters="auto" id="filter-1">
                                                    <feColorMatrix in="SourceGraphic" type="matrix" values="0 0 0 0 1.000000 0 0 0 0 0.000000 0 0 0 0 0.420000 0 0 0 1.000000 0"></feColorMatrix>
                                                </filter>
                                            </defs>
                                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="adults_only" transform="translate(-520.000000, -134.000000)" filter="url(#filter-1)">
                                                    <g transform="translate(520.854956, 135.000000)">
                                                        <line x1="19" y1="0" x2="19" y2="6" id="Path" stroke="#000000" stroke-linecap="square"></line>
                                                        <line x1="16" y1="3" x2="22" y2="3" id="Path" stroke="#000000" stroke-linecap="square"></line>
                                                        <path d="M12.616,0.139 C12.0817196,0.0510967486 11.5414436,0.0046249864 11,0 C4.92486775,0 0,4.92486775 0,11 C0,17.0751322 4.92486775,22 11,22 C17.0751322,22 22,17.0751322 22,11 C21.995375,10.4585564 21.9489033,9.9182804 21.861,9.384" id="Path" stroke="#000000" stroke-linecap="square"></path>
                                                        <polygon id="Path" fill="#000000" fill-rule="nonzero" points="6.854 8.823 6.831 8.823 5.343 9.531 5.043 8.164 7.106 7.2 8.617 7.2 8.617 15 6.854 15"></polygon>
                                                        <path d="M11.068,12.961 C11.0681997,12.0796618 11.6264254,11.2950959 12.459,11.006 L12.459,10.97 C11.7839018,10.6716657 11.3439192,10.0079829 11.332,9.27 C11.332,7.951 12.519,7.07 14.078,7.07 C15.901,7.07 16.657,8.126 16.657,9.07 C16.6491194,9.81342823 16.2083514,10.4839582 15.529,10.786 L15.529,10.821 C16.3731709,11.0943782 16.9481432,11.876711 16.957,12.764 C16.957,14.18 15.769,15.1270168 13.957,15.1270168 C11.979,15.132 11.068,14.017 11.068,12.961 Z M15.098,12.901 C15.098,12.218 14.598,11.81 13.875,11.618 C13.3221304,11.7300567 12.9252953,12.2168913 12.927,12.781 C12.9202795,13.0740244 13.0342813,13.3569329 13.2422904,13.5634291 C13.4502994,13.7699253 13.7340325,13.8818591 14.027,13.873 C14.3013966,13.8991587 14.5741231,13.8085504 14.778313,13.6233903 C14.9825029,13.4382303 15.0992752,13.1756397 15.1,12.9 L15.098,12.901 Z M13.047,9.207 C13.047,9.735 13.526,10.071 14.147,10.263 C14.6029393,10.1412546 14.9249275,9.73470392 14.939,9.263 C14.9583157,9.00516538 14.8650574,8.75159538 14.6832875,8.56771635 C14.5015176,8.38383732 14.2490403,8.28765995 13.991,8.304 C13.741798,8.28217935 13.4952797,8.36880883 13.314511,8.54172635 C13.1337423,8.71464386 13.0362591,8.95707517 13.047,9.207 L13.047,9.207 Z" id="Shape" fill="#000000" fill-rule="nonzero"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
		                                <?php
		                                break;
	                                case "Air-Conditioned":
		                                ?>
                                        <svg width="24px" height="22px" viewBox="0 0 24 22" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>ac</title>
                                            <defs>
                                                <filter color-interpolation-filters="auto" id="filter-1">
                                                    <feColorMatrix in="SourceGraphic" type="matrix" values="0 0 0 0 1.000000 0 0 0 0 0.000000 0 0 0 0 0.420000 0 0 0 1.000000 0"></feColorMatrix>
                                                </filter>
                                            </defs>
                                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="ac" transform="translate(-624.000000, -135.000000)" filter="url(#filter-1)">
                                                    <g transform="translate(624.854956, 135.000000)">
                                                        <path d="M1.186,18.455 L11.5,12.5 C9.59311818,10.2521781 6.3504198,9.69207568 3.8,11.17 C1.26955608,12.6366531 0.165298533,15.7141268 1.186,18.455 L1.186,18.455 Z" id="Path" stroke="#000000"></path>
                                                        <path d="M21.814,18.455 L11.5,12.5 C10.5089748,15.2747708 11.6458225,18.3611019 14.2,19.83 C16.7340527,21.28781 19.9499075,20.7070639 21.814,18.455 Z" id="Path" stroke="#000000"></path>
                                                        <path d="M11.5,0.59 L11.5,12.5 C14.3981286,11.9719554 16.5032252,9.44583949 16.5,6.5 C16.4970353,3.57447929 14.3846041,1.07758553 11.5,0.59 L11.5,0.59 Z" id="Path" stroke="#000000"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        <?php
		                                break;
	                                case "Bar / Lounge":
		                                ?>
                                        <svg width="24px" height="20px" viewBox="0 0 24 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>lounge</title>
                                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="square">
                                                <g id="icons" transform="translate(-467.000000, -207.000000)" stroke="#FF006B">
                                                    <g id="lounge" transform="translate(468.000000, 208.000000)">
                                                        <line x1="2" y1="18" x2="2" y2="16" id="Path"></line>
                                                        <line x1="20" y1="18" x2="20" y2="16" id="Path"></line>
                                                        <polygon id="Path" points="22 16 22 7 18 7 18 11 4 11 4 7 0 7 0 16"></polygon>
                                                        <polyline id="Path" points="2 7 2 0 20 0 20 7"></polyline>
                                                        <line x1="11" y1="11" x2="11" y2="0" id="Path"></line>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
		                                <?php
		                                break;
	                                case "BBQ":
		                                ?>
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>bbq</title>
                                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="icons" transform="translate(-265.000000, -208.000000)" stroke="#FF006B">
                                                    <g id="bbq" transform="translate(266.000000, 209.000000)">
                                                        <line x1="3" y1="22" x2="5" y2="18" id="Path"></line>
                                                        <line x1="19" y1="22" x2="17" y2="18" id="Path"></line>
                                                        <line x1="9" y1="13" x2="13" y2="13" id="Path" stroke-linecap="square"></line>
                                                        <line x1="0" y1="9" x2="22" y2="9" id="Path" stroke-linecap="square"></line>
                                                        <path d="M20.951,9 C20.983,9.329 21,9.662 21,10 C21,15.5228475 16.5228475,20 11,20 C5.4771525,20 1,15.5228475 1,10 C1,9.662 1.017,9.329 1.049,9" id="Path"></path>
                                                        <line x1="11" y1="0" x2="11" y2="3" id="Path" stroke-linecap="square"></line>
                                                        <line x1="6" y1="2" x2="6" y2="5" id="Path" stroke-linecap="square"></line>
                                                        <line x1="16" y1="2" x2="16" y2="5" id="Path" stroke-linecap="square"></line>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
		                                <?php
		                                break;
	                                case "Beachfront":
		                                ?>
                                        <svg width="22px" height="23px" viewBox="0 0 22 23" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>beachfront</title>
                                            <defs>
                                                <filter color-interpolation-filters="auto" id="filter-1">
                                                    <feColorMatrix in="SourceGraphic" type="matrix" values="0 0 0 0 1.000000 0 0 0 0 0.000000 0 0 0 0 0.420000 0 0 0 1.000000 0"></feColorMatrix>
                                                </filter>
                                            </defs>
                                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="beachfront" transform="translate(-677.000000, -135.000000)" filter="url(#filter-1)">
                                                    <g transform="translate(677.854956, 135.000000)">
                                                        <line x1="10.5" y1="22.5" x2="10.5" y2="11.5" id="Path" stroke="#000000" stroke-linecap="square"></line>
                                                        <line x1="4.5" y1="22.5" x2="16.5" y2="22.5" id="Path" stroke="#000000" stroke-linecap="square"></line>
                                                        <line x1="10.5" y1="2.5" x2="10.5" y2="0.5" id="Path" stroke="#000000" stroke-linecap="square"></line>
                                                        <path d="M10.5,2.5 C7.539,3.974 5.5,6.968 5.5,10.5 C5.5,10.84 5.5,11.5 5.5,11.5" id="Path" stroke="#000000"></path>
                                                        <path d="M10.5,2.5 C13.461,3.974 15.5,6.968 15.5,10.5 C15.5,10.84 15.5,11.5 15.5,11.5" id="Path" stroke="#000000"></path>
                                                        <path d="M20.5,11.5 C19.998,6.447 15.685,2.5 10.5,2.5 C5.315,2.5 1.002,6.447 0.5,11.5 L20.5,11.5 Z" id="Path" stroke="#000000" stroke-linecap="square"></path>
                                                        <line x1="10.5" y1="11.5" x2="10.5" y2="2.5" id="Path" stroke="#000000"></line>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
		                                <?php
		                                break;
	                                case "Breakfast Available":
		                                ?>
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>breakfast</title>
                                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="icons" transform="translate(-372.000000, -207.000000)" stroke="#FF006B">
                                                    <g id="breakfast" transform="translate(373.000000, 208.000000)">
                                                        <line x1="9" y1="0" x2="9" y2="2" id="Path" stroke-linecap="square"></line>
                                                        <line x1="4" y1="1" x2="4" y2="3" id="Path" stroke-linecap="square"></line>
                                                        <line x1="14" y1="1" x2="14" y2="3" id="Path" stroke-linecap="square"></line>
                                                        <path d="M18,7 L22,7 L22,11 C22,12.1 21.1,13 20,13 L17.5,13" id="Path"></path>
                                                        <path d="M9,19 L9,19 C4,19 0,15 0,10 L0,7 L18,7 L18,10 C18,15 14,19 9,19 Z" id="Path" stroke-linecap="square"></path>
                                                        <line x1="0" y1="22" x2="18" y2="22" id="Path" stroke-linecap="square"></line>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
		                                <?php
		                                break;
	                                case "Fireplace":
		                                ?>
                                        <svg width="18px" height="23px" viewBox="0 0 18 23" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>fireplace</title>
                                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="square">
                                                <g id="icons" transform="translate(-523.000000, -204.000000)" stroke="#FF006B">
                                                    <g id="fireplace" transform="translate(524.000000, 205.000000)">
                                                        <path d="M10.1822617,7.966 C10.1822617,7.966 11.1252617,2.412 7.2732617,0 C7.15690923,1.92993202 6.22451212,3.71908716 4.7092617,4.92 C3.0632617,6.368 -0.0327382988,9.616 0.000261701241,13.089 C-0.0222208642,16.1126943 1.67002778,18.888168 4.3682617,20.253 C4.46430707,18.9007672 5.10041201,17.6440545 6.1332617,16.766 C7.00895438,16.0931074 7.5772565,15.0963264 7.7102617,14 C10.0157441,15.2245775 11.5070383,17.5716756 11.6362617,20.179 L11.6362617,20.2 C14.1815901,19.0320263 15.8567493,16.5351272 15.9722617,13.737 C16.0562509,10.9197835 15.1093651,8.16873015 13.3092617,6" id="Path"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
		                                <?php
		                                break;
	                                case "Fitness Centre":
		                                ?>
                                        <svg width="20px" height="24px" viewBox="0 0 20 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>fitness</title>
                                            <defs>
                                                <filter color-interpolation-filters="auto" id="filter-1">
                                                    <feColorMatrix in="SourceGraphic" type="matrix" values="0 0 0 0 1.000000 0 0 0 0 0.000000 0 0 0 0 0.420000 0 0 0 1.000000 0"></feColorMatrix>
                                                </filter>
                                            </defs>
                                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="fitness" transform="translate(-937.000000, -134.000000)" filter="url(#filter-1)">
                                                    <g transform="translate(937.854767, 135.000000)">
                                                        <circle id="Oval" stroke="#000000" stroke-linecap="square" cx="9" cy="2" r="2"></circle>
                                                        <path d="M0,8.99999974 L5.846,7.051 C5.94791164,7.0171429 6.05461155,6.99992234 6.162,6.99999974 L11.838,6.99999974 C11.9453885,6.99992234 12.0520884,7.0171429 12.154,7.051 L18,8.99999974" id="Path" stroke="#000000" stroke-linecap="square"></path>
                                                        <line x1="6" y1="7.014" x2="6" y2="18" id="Path" stroke="#000000"></line>
                                                        <line x1="12" y1="7.013" x2="12" y2="22" id="Path" stroke="#000000"></line>
                                                        <path d="M0,13 C0,17.9705627 4.02943725,22 9,22" id="Path" stroke="#000000" stroke-linecap="square"></path>
                                                        <path d="M15,19.694 C16.9086833,17.9924637 18.0001626,15.5570095 18,13" id="Path" stroke="#000000" stroke-linecap="square"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
		                                <?php
		                                break;
	                                case "Kitchen":
		                                ?>
                                        <svg width="24px" height="18px" viewBox="0 0 24 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>kitchen</title>
                                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="square">
                                                <g id="icons" transform="translate(-150.000000, -208.000000)" stroke="#FF006B">
                                                    <g id="kitchen" transform="translate(151.000000, 209.000000)">
                                                        <line x1="8" y1="0" x2="8" y2="4" id="Path"></line>
                                                        <line x1="3" y1="3" x2="3" y2="7" id="Path"></line>
                                                        <line x1="13" y1="3" x2="13" y2="7" id="Path"></line>
                                                        <path d="M15,16 L2,16 C0.895,16 0,15.105 0,14 L0,11 L17,11 L17,14 C17,15.105 16.105,16 15,16 Z" id="Path"></path>
                                                        <line x1="22" y1="11" x2="17" y2="11" id="Path"></line>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
		                                <?php
		                                break;
	                                case "Laundry Facilities":
		                                ?>
                                        <svg width="20px" height="24px" viewBox="0 0 20 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>laundry</title>
                                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="square">
                                                <g id="icons" transform="translate(-204.000000, -208.000000)" stroke="#FF006B">
                                                    <g id="laundry" transform="translate(205.000000, 209.000000)">
                                                        <rect id="Rectangle" transform="translate(9.000000, 11.000000) rotate(90.000000) translate(-9.000000, -11.000000) " x="-2" y="2" width="22" height="18"></rect>
                                                        <circle id="Oval" cx="9" cy="13" r="5"></circle>
                                                        <line x1="4" y1="4" x2="7" y2="4" id="Path"></line>
                                                        <line x1="13" y1="4" x2="14" y2="4" id="Path"></line>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
		                                <?php
		                                break;
	                                case "Lift":
		                                ?>
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>lift</title>
                                            <defs>
                                                <filter color-interpolation-filters="auto" id="filter-1">
                                                    <feColorMatrix in="SourceGraphic" type="matrix" values="0 0 0 0 1.000000 0 0 0 0 0.000000 0 0 0 0 0.420000 0 0 0 1.000000 0"></feColorMatrix>
                                                </filter>
                                            </defs>
                                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="lift" transform="translate(-307.000000, -134.000000)" filter="url(#filter-1)">
                                                    <g transform="translate(308.000000, 135.000000)">
                                                        <polygon id="Path" fill="#000000" fill-rule="nonzero" points="17 9 23 9 20 5"></polygon>
                                                        <polygon id="Path" fill="#000000" fill-rule="nonzero" points="17 13 23 13 20 17"></polygon>
                                                        <rect id="Rectangle" stroke="#000000" stroke-linecap="square" x="0" y="0" width="7" height="22"></rect>
                                                        <rect id="Rectangle" stroke="#000000" stroke-linecap="square" x="7" y="0" width="7" height="22"></rect>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
		                                <?php
		                                break;
	                                case "Minibar":
		                                ?>
                                        <svg width="18px" height="24px" viewBox="0 0 18 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>minibar</title>
                                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="icons" transform="translate(-623.000000, -202.000000)" stroke="#FF006B">
                                                    <g id="minibar" transform="translate(624.000000, 203.000000)">
                                                        <path d="M14.0753226,22 L7.92732261,22 C7.40376219,22.0015542 6.96763464,21.5990085 6.92732261,21.077 L6.00132261,9 L16.0013226,9 L15.0723226,21.077 C15.0320973,21.5978563 14.5977299,22 14.0753226,22 Z" id="Path" stroke-linecap="square"></path>
                                                        <path d="M6.86032261,6 C6.45691791,5.03729226 6.16858878,4.03032208 6.00132261,3 L6.00132261,0 L2.00132261,0 L2.00132261,3 C2.00132261,4.329 0.158322614,7.53 0.158322614,10.926 C0.158322614,14.322 0.627322614,15.503 0.627322614,17.126 C0.627322614,18.749 0.00132261419,19.6 0.00132261419,20.523 C-0.0317574313,21.2954507 0.559641941,21.9522153 1.33132261,22 L4.00132261,22" id="Path"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
		                                <?php
		                                break;
	                                case "Non-Smoking Property":
		                                ?>
                                        <svg width="24px" height="23px" viewBox="0 0 24 23" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>nonsmoking</title>
                                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="icons" transform="translate(-570.000000, -205.000000)" stroke="#FF006B">
                                                    <g id="nonsmoking" transform="translate(571.000000, 206.000000)">
                                                        <polyline id="Path" points="6 12 0 12 0 16 10 16"></polyline>
                                                        <polyline id="Path" points="9 12 22 12 22 16 18 16 13 16"></polyline>
                                                        <line x1="1" y1="4" x2="18" y2="21" id="Path" stroke-linecap="square"></line>
                                                        <path d="M18,8 C18,5.790861 16.209139,4 14,4 C11.790861,4 10,2.209139 10,0" id="Path" stroke-linecap="square"></path>
                                                        <path d="M14,0 C18.418278,0 22,3.581722 22,8" id="Path" stroke-linecap="square"></path>
                                                        <line x1="18" y1="12" x2="18" y2="16" id="Path"></line>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
		                                <?php
		                                break;
	                                case "Non-Smoking Rooms":
		                                ?>
                                        <svg width="24px" height="23px" viewBox="0 0 24 23" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>nonsmoking rooms</title>
                                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="icons" transform="translate(-570.000000, -205.000000)" stroke="#FF006B">
                                                    <g id="nonsmoking" transform="translate(571.000000, 206.000000)">
                                                        <polyline id="Path" points="6 12 0 12 0 16 10 16"></polyline>
                                                        <polyline id="Path" points="9 12 22 12 22 16 18 16 13 16"></polyline>
                                                        <line x1="1" y1="4" x2="18" y2="21" id="Path" stroke-linecap="square"></line>
                                                        <path d="M18,8 C18,5.790861 16.209139,4 14,4 C11.790861,4 10,2.209139 10,0" id="Path" stroke-linecap="square"></path>
                                                        <path d="M14,0 C18.418278,0 22,3.581722 22,8" id="Path" stroke-linecap="square"></path>
                                                        <line x1="18" y1="12" x2="18" y2="16" id="Path"></line>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
		                                <?php
		                                break;
	                                case "Parking":
		                                ?>
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>parking</title>
                                            <defs>
                                                <filter color-interpolation-filters="auto" id="filter-1">
                                                    <feColorMatrix in="SourceGraphic" type="matrix" values="0 0 0 0 1.000000 0 0 0 0 0.000000 0 0 0 0 0.420000 0 0 0 1.000000 0"></feColorMatrix>
                                                </filter>
                                            </defs>
                                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="parking" transform="translate(-835.000000, -134.000000)" filter="url(#filter-1)">
                                                    <g transform="translate(835.854767, 135.000000)">
                                                        <rect id="Rectangle" stroke="#000000" stroke-linecap="square" x="0" y="0" width="22" height="22"></rect>
                                                        <line x1="8" y1="6" x2="8" y2="17" id="Path" stroke="#000000" stroke-linecap="square"></line>
                                                        <path d="M8,12 L11,12 C12.6568542,12 14,10.6568542 14,9 L14,9 C14,7.34314575 12.6568542,6 11,6 L8,6" id="Path" stroke="#000000"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
		                                <?php
		                                break;
	                                case "Pet Friendly":
		                                ?>
                                        <svg width="24px" height="22px" viewBox="0 0 24 22" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>pet_friendly</title>
                                            <defs>
                                                <filter color-interpolation-filters="auto" id="filter-1">
                                                    <feColorMatrix in="SourceGraphic" type="matrix" values="0 0 0 0 1.000000 0 0 0 0 0.000000 0 0 0 0 0.420000 0 0 0 1.000000 0"></feColorMatrix>
                                                </filter>
                                            </defs>
                                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="square">
                                                <g id="pet_friendly" transform="translate(-361.000000, -134.000000)" filter="url(#filter-1)">
                                                    <g transform="translate(362.000000, 135.000000)">
                                                        <path d="M7.48480115,0.0270967911 C7.01065409,-0.0599692841 6.52216509,0.0650688429 6.14816151,0.369235334 C5.77415793,0.673401825 5.5521917,1.12615677 5.54080115,1.60809679 C5.40499929,2.66021798 6.05475723,3.65478871 7.07280115,3.95309679 C7.5469482,4.04016287 8.03543721,3.91512474 8.40944079,3.61095825 C8.78344437,3.30679176 9.0054106,2.85403681 9.01680115,2.37209679 C9.15260301,1.3199756 8.50284507,0.325404873 7.48480115,0.0270967911 Z" id="Path" stroke="#000000"></path>
                                                        <path d="M1.22280115,5.03509679 C2.25189351,4.87758053 3.22457364,5.55208919 3.43780115,6.57109679 C3.61357629,7.03138036 3.59588458,7.54316358 3.38874417,7.99021024 C3.18160377,8.4372569 2.80259601,8.78162325 2.33780115,8.94509679 C1.30764924,9.10435739 0.333059676,8.42943874 0.119801148,7.40909679 C-0.05583541,6.94842416 -0.0377260155,6.43630512 0.170011478,5.98918925 C0.377748972,5.54207337 0.757459352,5.19796019 1.22280115,5.03509679 L1.22280115,5.03509679 Z" id="Path" stroke="#000000"></path>
                                                        <path d="M14.5728011,0.0270967911 C15.0469482,-0.0599692841 15.5354372,0.0650688429 15.9094408,0.369235334 C16.2834444,0.673401825 16.5054106,1.12615677 16.5168011,1.60809679 C16.652603,2.66021798 16.0028451,3.65478871 14.9848011,3.95309679 C14.5106541,4.04016287 14.0221651,3.91512474 13.6481615,3.61095825 C13.2741579,3.30679176 13.0521917,2.85403681 13.0408011,2.37209679 C12.9049993,1.3199756 13.5547572,0.325404873 14.5728011,0.0270967911 L14.5728011,0.0270967911 Z" id="Path" stroke="#000000"></path>
                                                        <path d="M20.8348011,5.03509679 C19.8057088,4.87758053 18.8330287,5.55208919 18.6198011,6.57109679 C18.444026,7.03138036 18.4617177,7.54316358 18.6688581,7.99021024 C18.8759985,8.4372569 19.2550063,8.78162325 19.7198011,8.94509679 C20.7488935,9.10261305 21.7215736,8.42810439 21.9348011,7.40909679 C22.1105763,6.94881322 22.0928846,6.43703 21.8857442,5.98998334 C21.6786038,5.54293668 21.299596,5.19857034 20.8348011,5.03509679 L20.8348011,5.03509679 Z" id="Path" stroke="#000000"></path>
                                                        <path d="M4.02880115,16.9900968 C4.02880115,18.646951 5.3719469,19.9900968 7.02880115,19.9900968 C9.02880115,19.9900968 9.02880115,18.9900968 11.0288011,18.9900968 C13.0288011,18.9900968 13.0288011,19.9900968 15.0288011,19.9900968 C16.6856554,19.9900968 18.0288011,18.646951 18.0288011,16.9900968 C18.0288011,12.9900968 14.0288011,7.99009679 11.0288011,7.99009679 C8.02880115,7.99009679 4.02880115,12.9900968 4.02880115,16.9900968 Z" id="Path" stroke="#000000"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
		                                <?php
		                                break;
	                                case "Pool":
		                                ?>
                                        <svg width="24px" height="20px" viewBox="0 0 24 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>pool</title>
                                            <defs>
                                                <filter color-interpolation-filters="auto" id="filter-1">
                                                    <feColorMatrix in="SourceGraphic" type="matrix" values="0 0 0 0 1.000000 0 0 0 0 0.000000 0 0 0 0 0.420000 0 0 0 1.000000 0"></feColorMatrix>
                                                </filter>
                                            </defs>
                                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="pool" transform="translate(-414.000000, -134.000000)" filter="url(#filter-1)">
                                                    <g transform="translate(415.054956, 135.000000)">
                                                        <circle id="Oval" stroke="#000000" stroke-linecap="square" cx="15" cy="5" r="2"></circle>
                                                        <path d="M13,11 L9,7 L5.707,3.707 C5.31661806,3.31650015 5.31661806,2.68349985 5.707,2.293 L8,0" id="Path" stroke="#000000" stroke-linecap="square"></path>
                                                        <path d="M0,18 C2.1478031,18.000489 4.176311,17.0124212 5.5,15.321 C6.82394598,17.012124 8.85227252,18.0001638 11,18.0001638 C13.1477275,18.0001638 15.176054,17.012124 16.5,15.321 C17.823689,17.0124212 19.8521969,18.000489 22,18" id="Path" stroke="#000000" stroke-linecap="square"></path>
                                                        <line x1="9" y1="7" x2="2" y2="14" id="Path" stroke="#000000"></line>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
		                                <?php
		                                break;
	                                case "Restaurant (On-site)":
		                                ?>
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>restaurant</title>
                                            <defs>
                                                <filter color-interpolation-filters="auto" id="filter-1">
                                                    <feColorMatrix in="SourceGraphic" type="matrix" values="0 0 0 0 1.000000 0 0 0 0 0.000000 0 0 0 0 0.420000 0 0 0 1.000000 0"></feColorMatrix>
                                                </filter>
                                            </defs>
                                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="square">
                                                <g id="restaurant" transform="translate(-467.000000, -134.000000)" filter="url(#filter-1)">
                                                    <g transform="translate(468.054956, 135.000000)">
                                                        <line x1="11" y1="0" x2="11" y2="3" id="Path" stroke="#000000"></line>
                                                        <line x1="6" y1="2" x2="6" y2="5" id="Path" stroke="#000000"></line>
                                                        <line x1="16" y1="2" x2="16" y2="5" id="Path" stroke="#000000"></line>
                                                        <line x1="0" y1="22" x2="21.8" y2="22" id="Path" stroke="#000000"></line>
                                                        <circle id="Oval" stroke="#000000" cx="11" cy="10" r="2"></circle>
                                                        <path d="M1,22 C1,16.5 5.5,12 11,12 C16.5,12 21,16.5 21,22" id="Path" stroke="#000000"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
		                                <?php
		                                break;
	                                case "Sauna":
		                                ?>
                                        <svg width="27px" height="26px" viewBox="0 0 27 26" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>sauna</title>
                                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round">
                                                <g id="icons" transform="translate(-664.000000, -200.000000)" stroke="#FF006B">
                                                    <g id="sauna" transform="translate(665.000000, 201.000000)">
                                                        <path d="M4.17812714,3.42709761 C5.77823941,7.14164395 1.4922244,7.94170009 4.57815521,11.427659" id="Path" stroke-linejoin="round"></path>
                                                        <path d="M4.17812714,3.42709761 C5.77823941,7.14164395 1.4922244,7.94170009 4.57815521,11.427659" id="Path" stroke-linejoin="round"></path>
                                                        <path d="M0.749315129,3.42709761 C2.3494274,7.14164395 -1.93658761,7.94170009 1.1493432,11.427659" id="Path" stroke-linejoin="round"></path>
                                                        <path d="M24.7509992,3.42709761 C26.3511115,7.14164395 22.0650965,7.94170009 25.1510273,11.427659" id="Path" stroke-linejoin="round"></path>
                                                        <path d="M24.7509992,3.42709761 C26.3511115,7.14164395 22.0650965,7.94170009 25.1510273,11.427659" id="Path" stroke-linejoin="round"></path>
                                                        <path d="M21.3221872,3.42709761 C22.9222995,7.14164395 18.6362845,7.94170009 21.7222153,11.427659" id="Path" stroke-linejoin="round"></path>
                                                        <line x1="25.1447411" y1="15.9994083" x2="18.8585858" y2="15.9994083" id="Path" stroke-linejoin="round"></line>
                                                        <line x1="6.28627506" y1="15.9994083" x2="0.000119704742" y2="15.9994083" id="Path" stroke-linejoin="round"></line>
                                                        <circle id="Oval" cx="12.570716" cy="2.28587467" r="2.28587467"></circle>
                                                        <path d="M7.62579762,14.3421492 L6.94003522,14.7421772 C6.48286028,14.9707647 6.19712595,15.4850865 6.31141968,15.9994083 L7.45778583,23.0570464 C7.57207956,23.6856619 8.14354823,24.08569 8.77216377,23.9713962 C9.4007793,23.8571025 9.80080737,23.2856338 9.68651364,22.6570183 L9.1436184,16.570877 L12.6078615,15.4633707 L16.0012424,16.570877 L15.4492037,22.6661618 C15.33491,23.2947773 15.734938,23.866246 16.3635536,23.9805397 C16.9921691,24.0948335 17.5636378,23.6948054 17.6779315,23.0661899 L18.83687,16.2279958 C18.9511637,15.6565271 18.6082825,15.3136459 18.0368138,14.9136178 L17.313906,14.4010104" id="Path" stroke-linejoin="round"></path>
                                                        <path d="M10.2882701,10.2830072 L9.77223394,12.2277151 C9.77223394,12.2277151 12.9135972,13.0866325 13.427919,13.2009262 C14.0565345,13.3723668 14.3994157,14.0009824 14.2279751,14.572451 C14.0565345,15.2010666 13.427919,15.5439478 12.8564503,15.3725072 L7.88638733,14.2278554 C7.14347806,14.0564148 6.68630313,13.3135056 6.91489059,12.5705963 C7.4292124,10.970484 8.17212166,8.34172815 8.40070913,7.71311262 C8.74359033,6.74161588 9.37220587,6.28444095 10.2865557,6.28444095 C12.0009617,6.28444095 13.8296615,6.28444095 14.8583051,6.28444095 C15.8869487,6.28444095 16.5155642,6.91305648 16.8012986,7.71311262 C17.0870329,8.57031562 18.0013828,11.3705121 18.2299702,12.4563026 C18.5157046,13.542093 17.9442359,14.1707086 16.8584454,14.399296 L14.0565345,15.029626" id="Path" stroke-linejoin="round"></path>
                                                        <polyline id="Path" stroke-linejoin="round" points="13.1421847 13.0866325 15.6012144 12.3991557 14.9743132 10.2830072"></polyline>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
		                                <?php
		                                break;
	                                case "Self Catering":
		                                ?>
                                        <svg width="22px" height="22px" viewBox="0 0 22 22" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>self_catering</title>
                                            <defs>
                                                <filter color-interpolation-filters="auto" id="filter-1">
                                                    <feColorMatrix in="SourceGraphic" type="matrix" values="0 0 0 0 1.000000 0 0 0 0 0.000000 0 0 0 0 0.420000 0 0 0 1.000000 0"></feColorMatrix>
                                                </filter>
                                            </defs>
                                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="square">
                                                <g id="self_catering" transform="translate(-573.000000, -134.000000)" filter="url(#filter-1)">
                                                    <g transform="translate(573.854956, 135.000000)">
                                                        <path d="M5.663,20.0002864 L14.337,20.0002864 C17.7971002,18.3375394 19.9983527,14.8391687 20,11.0002864 L0,11.0002864 C0.00164726076,14.8391687 2.20289984,18.3375394 5.663,20.0002864 L5.663,20.0002864 Z" id="Path" stroke="#000000"></path>
                                                        <path d="M1,0.000286362198 L1,0.000286362198 C3.76142375,0.000286362198 6,2.23886261 6,5.00028636 L6,7.00028636 L6,7.00028636 C3.23857625,7.00028636 1,4.76171011 1,2.00028636 L1,0.000286362198 Z" id="Path" stroke="#000000" transform="translate(3.500000, 3.500286) rotate(180.000000) translate(-3.500000, -3.500286) "></path>
                                                        <path d="M18,7.00028636 C18,5.34343211 16.6568542,4.00028636 15,4.00028636 C15.0000862,2.4278505 14.0788868,1.0012321 12.6457002,0.354292611 C11.2125136,-0.292646875 9.53324067,-0.0398799655 8.354,1.00028636" id="Path" stroke="#000000"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
		                                <?php
		                                break;
	                                case "Spa":
		                                ?>
                                        <svg width="24px" height="21px" viewBox="0 0 24 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>spa</title>
                                            <defs>
                                                <filter color-interpolation-filters="auto" id="filter-1">
                                                    <feColorMatrix in="SourceGraphic" type="matrix" values="0 0 0 0 1.000000 0 0 0 0 0.000000 0 0 0 0 0.420000 0 0 0 1.000000 0"></feColorMatrix>
                                                </filter>
                                            </defs>
                                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="square">
                                                <g id="spa" transform="translate(-729.000000, -134.000000)" filter="url(#filter-1)">
                                                    <g transform="translate(729.854956, 135.000000)">
                                                        <path d="M2.95190533,17.889 C2.02015154,17.3452122 1.25833397,16.5525756 0.751905325,15.6 C-1.14809467,12.4 1.15190533,4 1.15190533,4 C1.15190533,4 1.87990533,4.208 2.95190533,4.571" id="Path" stroke="#000000"></path>
                                                        <path d="M19.0479053,4.571 C20.1199053,4.208 20.8479053,4 20.8479053,4 C20.8479053,4 23.1479053,12.4 21.2479053,15.6 C20.7414767,16.5525756 19.9796591,17.3452122 19.0479053,17.889" id="Path" stroke="#000000"></path>
                                                        <path d="M3.99990533,11.717 C3.99990533,7.283 10.9999053,0 10.9999053,0 C10.9999053,0 17.9999053,7.283 17.9999053,11.717 C18.0968313,14.2809634 16.7842431,16.6927544 14.5785336,18.0035361 C12.3728241,19.3143178 9.62698658,19.3143178 7.42127707,18.0035361 C5.21556757,16.6927544 3.90297931,14.2809634 3.99990533,11.717 Z" id="Path" stroke="#000000"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
		                                <?php
		                                break;
	                                case "Tennis Court":
		                                ?>
                                        <svg width="23px" height="25px" viewBox="0 0 23 25" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>tennis</title>
                                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="icons" transform="translate(-425.000000, -207.000000)" stroke="#FF006B">
                                                    <g id="tennis" transform="translate(426.000000, 208.000000)">
                                                        <circle id="Oval" stroke-linecap="square" cx="8.32468595" cy="3.91148679" r="2"></circle>
                                                        <path d="M0.646685952,22.4814868 L2.85768595,19.5334868 C3.12995771,19.169221 3.12215078,18.6671118 2.83868595,18.3114868 L0.438685952,15.3114868 C-0.19865575,14.5153445 -0.134891764,13.3671619 0.586685952,12.6464868 L4.76168595,8.47448679 C5.09106744,8.14472237 5.60458626,8.08623597 5.99968595,8.33348679 L14.324686,12.9114868" id="Path" stroke-linecap="square"></path>
                                                        <path d="M8.50468595,9.71148679 L4.39668595,13.8394868 C4.1592813,14.0772259 4.05712871,14.4182935 4.12476028,14.7473935 C4.19239184,15.0764936 4.42076743,15.3496361 4.73268595,15.4744868 L7.69668595,16.6604868 C8.07594364,16.8124787 8.32459086,17.1799064 8.32468595,17.5884868 L8.32468595,21.9114868" id="Path"></path>
                                                        <ellipse id="Oval" stroke-linecap="square" transform="translate(17.736613, 3.802633) rotate(-62.083000) translate(-17.736613, -3.802633) " cx="17.736613" cy="3.80263261" rx="3" ry="2.46"></ellipse>
                                                        <line x1="16.331686" y1="6.45348679" x2="14.687686" y2="9.55548679" id="Path" stroke-linecap="square"></line>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
		                                <?php
		                                break;
	                                case "TV":
		                                ?>
                                        <svg width="24px" height="22px" viewBox="0 0 24 22" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>tv</title>
                                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="square">
                                                <g id="icons" transform="translate(-319.000000, -209.000000)" stroke="#FF006B">
                                                    <g id="tv" transform="translate(320.000000, 210.000000)">
                                                        <line x1="11" y1="20" x2="11" y2="16" id="Path"></line>
                                                        <line x1="5" y1="20" x2="17" y2="20" id="Path"></line>
                                                        <rect id="Rectangle" x="0" y="0" width="22" height="16"></rect>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
		                                <?php
		                                break;
	                                case "Walk Up (Stairs)":
		                                ?>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22.5 2.5H17.5V7.5H12.5V12.5H7.5V17.5H2.5V22.5" stroke="#FF006B" stroke-miterlimit="10" stroke-linecap="square"/>
                                        </svg>
		                                <?php
		                                break;
	                                case "Wi-Fi":
		                                ?>
                                        <svg width="23px" height="17px" viewBox="0 0 23 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>wifi</title>
                                            <defs>
                                                <filter color-interpolation-filters="auto" id="filter-1">
                                                    <feColorMatrix in="SourceGraphic" type="matrix" values="0 0 0 0 1.000000 0 0 0 0 0.000000 0 0 0 0 0.420000 0 0 0 1.000000 0"></feColorMatrix>
                                                </filter>
                                            </defs>
                                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="square">
                                                <g id="wifi" transform="translate(-255.000000, -135.000000)" filter="url(#filter-1)">
                                                    <g transform="translate(256.000000, 135.000000)">
                                                        <circle id="Oval" stroke="#000000" cx="10.5" cy="14.5" r="2"></circle>
                                                        <path d="M16.2,8.8 C14.7,7.4 12.7,6.5 10.5,6.5 C8.3,6.5 6.3,7.4 4.8,8.8" id="Path" stroke="#000000"></path>
                                                        <path d="M20.4,4.6 C17.9,2.1 14.4,0.5 10.5,0.5 C6.6,0.5 3.1,2.1 0.6,4.6" id="Path" stroke="#000000"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
		                                <?php
		                                break;

                                }
                                ?>
                                <?php echo $amenity['label']; ?>
                            </div>
		                <?php endforeach; ?>
	                <?php endif; ?>


                </div>
                <div class="single-hotel-desc">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="gutter"></div>
            <div class="single-hotel-sidebar">
                <div class="single-price-col">
                    <div class="single-price-title"></div>
                    <div class="single-price">
						Rooms from
                        <?php
                        /*$formatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
						  /*echo $formatter->formatCurrency(get_field('starting_price'), 'USD'), PHP_EOL; */
                        echo do_shortcode('[wpcs_price value='.get_field('starting_price').']');
                        ?>
                    </div>
                    <div class="single-sidebar-outro">
						<div class="single-sidebar-outro-hotel-name"><?php the_title(); ?></div>
                        <div class="single-sidebar-outro-title">
                            <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="hotel-bell">
                                    <path id="Path" d="M5 0.5H11" stroke="#FF006B" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path id="Path_2" d="M8 3.5V0.5" stroke="#FF006B" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path id="Path_3" fill-rule="evenodd" clip-rule="evenodd" d="M8 3.5C4.13401 3.5 1 6.63401 1 10.5H15C15 6.63401 11.866 3.5 8 3.5Z" stroke="#FF006B" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path id="Path_4" d="M1 13.5H15" stroke="#FF006B" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                            </svg>
                            Direct booking benefits 
                        </div>
                        <div class="single-sidebar-outro-content">
                            <ul>
                            <?php
                                if( have_rows('benefits_list') ):
                                    while( have_rows('benefits_list') ) : the_row();
                                        ?><li><svg width="8" height="7" viewBox="0 0 8 7" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M6.86162 0.862007L2.66629 5.05734L1.13762 3.52867C1.01189 3.40724 0.843484 3.34004 0.668686 3.34156C0.493888 3.34308 0.32668 3.41319 0.203075 3.53679C0.0794693 3.6604 0.00935665 3.82761 0.0078377 4.00241C0.00631876 4.1772 0.073515 4.34561 0.194954 4.47134L2.19495 6.47134C2.31997 6.59632 2.48951 6.66653 2.66629 6.66653C2.84306 6.66653 3.0126 6.59632 3.13762 6.47134L7.80429 1.80467C7.92573 1.67894 7.99292 1.51054 7.9914 1.33574C7.98988 1.16094 7.91977 0.993733 7.79617 0.870128C7.67256 0.746522 7.50535 0.67641 7.33055 0.674891C7.15576 0.673372 6.98736 0.740568 6.86162 0.862007Z" fill="#FF006B"/> </svg><?php the_sub_field('benefit'); ?></li><?php
                                    endwhile;
                                endif;
                            ?>
                            </ul>
                        </div>
						<div class="single-hotel-button refer-count" data-click="<?php echo esc_attr($hotel_unique) ?>"><a data-click="<?php echo esc_attr($hotel_unique) ?>" href="<?php the_field('hotel_link') ?>" target="_blank" onclick=“ga(‘send’,{hitType: ‘event’, eventCategory: ‘Check Availability Button’, eventAction: ‘click’});”>Check Availability</a></div>
                        <?php 
                        $link = get_field('hotel_name_&_url');
                        if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                        <?php endif; ?>   							                 
					</div>
				 <a class="sidebar-otel-new-url" href="<?php echo $link_url; ?>" target="<?php echo esc_attr( $link_target ); ?>" style="display: block; text-align: center; margin-top: 16px;"><?php echo esc_html( $link_title ); ?></a>

                </div>

                <!--<div class="sidebar-note bookdirect">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 0C3.6 0 0 3.6 0 8C0 12.4 3.6 16 8 16C12.4 16 16 12.4 16 8C16 3.6 12.4 0 8 0ZM7 12V7H9V12H7ZM7 5C7 5.6 7.4 6 8 6C8.6 6 9 5.6 9 5C9 4.4 8.6 4 8 4C7.4 4 7 4.4 7 5Z" fill="#ff006b"/>
                    </svg>
                    Why book direct?
                </div>-->
            </div>
        </div>
	</div>
    <div class="single-hotel-slider-modal">
        <div class="single-slider-row">
            <div class="single-hotel-slider">
	            <?php
	            $images = get_field('gallery');
	            if( $images ): ?>
		            <?php $i = 1; ?>
		            <?php foreach( $images as $image ): ?>
                        <div id="s-photo<?php echo esc_attr($i);?>" class="single-slide-item">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php
                            if (!empty($image['caption'])) {
                            ?>
                                <div class="slide-caption"><?php echo esc_html($image['caption']); ?></div>
                            <?php } ?>
                        </div>
                    <?php $i++; ?>
		            <?php endforeach; ?>

	            <?php endif; ?>
            </div>
        </div>
        <div class="single-thumbnail-buttons">
            <div class="single-thumbnail-slider">
	            <?php
	            $images = get_field('gallery');
	            if( $images ): ?>
		            <?php $i = 1; ?>
		            <?php foreach( $images as $image ): ?>
                        <div class="single-thumbnail-item">
                            <img class="ratio--width-to-height" src="data:image/svg+xml;utf8,&lt;svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'&gt;&lt;/svg&gt;">
                            <div class="thumbnail-image-container">
                                <a href="#s-photo<?php echo esc_attr($i);?>"><img src="<?php echo esc_url($image['url']); ?>"/></a>
                            </div>
                        </div>
			        <?php $i++; ?>
		            <?php endforeach; ?>

	            <?php endif; ?>
            </div>

        </div>
        <div class="close-slider">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.7 0.3C13.3 -0.1 12.7 -0.1 12.3 0.3L7 5.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L5.6 7L0.3 12.3C-0.1 12.7 -0.1 13.3 0.3 13.7C0.5 13.9 0.7 14 1 14C1.3 14 1.5 13.9 1.7 13.7L7 8.4L12.3 13.7C12.5 13.9 12.8 14 13 14C13.2 14 13.5 13.9 13.7 13.7C14.1 13.3 14.1 12.7 13.7 12.3L8.4 7L13.7 1.7C14.1 1.3 14.1 0.7 13.7 0.3Z" fill="black"/>
            </svg>
        </div>
    </div>



<?php
endwhile;
?>
	<?php /* Analytics */ ?>
    <?php
    $user = wp_get_current_user();
	$allowed_roles = array('administrator');
    if( array_intersect($allowed_roles, $user->roles ) ) {
    ?>
    <div class="analytics">
        <div class="analytics-title" data-pid="<?php the_ID(); ?>">
			<?php the_title(); ?>
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
                        $post_year = get_the_date('Y');
                        $post_month = get_the_date('n');
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

        $impressions = json_decode(get_field('impressions'), true);
        $clicks = json_decode(get_field('clicks'), true);
        $views = json_decode(get_field('views'), true);
        $unique_views = json_decode(get_field('unique_views'), true);
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
    <?php } ?>
	<?php /* Analytics End */ ?>

<?php
else:
?>
	<p>Sorry, no posts matched your criteria.</p>
</div><?php /* End of main container single-accom-container */ ?>


<?php
endif;
?>


<?php
get_footer();
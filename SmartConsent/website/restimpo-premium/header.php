<?php
/**
 * The header template file.
 * @package RestImpo
 * @since RestImpo 1.0.0
*/
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<?php global $restimpo_options;
foreach ($restimpo_options as $value) {
	if (isset($value['id']) && get_option( $value['id'] ) === FALSE && isset($value['std'])) {
		$$value['id'] = $value['std'];
	}
	elseif (isset($value['id'])) { $$value['id'] = get_option( $value['id'] ); }
} ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" /> 
  <meta name="viewport" content="width=device-width" />  
  <title><?php wp_title( '|', true, 'right' ); ?></title>  
  <!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
<?php if ($restimpo_favicon_url != ''){ ?>
	<link rel="shortcut icon" href="<?php echo esc_url($restimpo_favicon_url); ?>" />
<?php } ?> 
<?php wp_head(); ?> 
<?php if ($restimpo_own_javascript_header != ''){ ?>
<?php echo stripslashes_deep($restimpo_own_javascript_header); ?>
<?php } ?> 
</head>
 
<body <?php body_class(); ?> id="wrapper"> 
<header id="wrapper-header">
<?php if ( !is_page_template('template-landing-page.php') ) { ?>
<?php if ( has_nav_menu( 'top-navigation' ) || $restimpo_header_facebook_link != '' || $restimpo_header_twitter_link != '' || $restimpo_header_google_link != '' || $restimpo_header_rss_link != '' ) {  ?>
  <div class="top-navigation-wrapper">
    <div class="top-navigation">
<?php if ( has_nav_menu( 'top-navigation' ) ) { wp_nav_menu( array( 'menu_id'=>'top-nav', 'theme_location'=>'top-navigation' ) ); } ?>
      
      <div class="header-icons">
<?php if ($restimpo_header_facebook_link != ''){ ?>
        <a class="social-icon facebook-icon" href="<?php echo esc_url($restimpo_header_facebook_link); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-facebook.png" alt="Facebook" /></a>
<?php } ?>
<?php if ($restimpo_header_twitter_link != ''){ ?>
        <a class="social-icon twitter-icon" href="<?php echo esc_url($restimpo_header_twitter_link); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-twitter.png" alt="Twitter" /></a>
<?php } ?>
<?php if ($restimpo_header_google_link != ''){ ?>
        <a class="social-icon google-icon" href="<?php echo esc_url($restimpo_header_google_link); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-google.png" alt="Google +" /></a>
<?php } ?>
<?php if ($restimpo_header_rss_link != ''){ ?>
        <a class="social-icon rss-icon" href="<?php echo esc_url($restimpo_header_rss_link); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-rss.png" alt="RSS" /></a>
<?php } ?>
      </div>
    </div>
  </div>
<?php }} ?>
  
  <div class="header-content-wrapper">
    <div class="header-content">
      <div class="title-box">
<?php if ( $restimpo_logo_url == '' ) { ?>
        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
<?php } else { ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="header-logo" src="<?php echo esc_url($restimpo_logo_url); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
<?php } ?>
      </div>
<?php if ( !is_page_template('template-landing-page.php') ) { ?>
      <div class="menu-box">
<?php if ( has_nav_menu( 'main-navigation' ) ) { wp_nav_menu( array( 'menu_id'=>'nav', 'theme_location'=>'main-navigation' ) ); } ?>
      </div>
<?php } ?>
    </div>
  </div>
<?php if ( is_home() || is_front_page() ) { ?>
<?php if ( $restimpo_slider_category != '' && $restimpo_slider_category != '0' ) { ?>  
<?php $args1 = array(
  'cat' => $restimpo_slider_category,
  'showposts' => $restimpo_slider_number,
	'post_type' => 'post',
	'post_status' => 'publish'
);
$my_query = new WP_Query( $args1 ); ?> 
      <div class="flexslider" id="header-slider">
        <ul class="slides">
<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
<?php if ( has_post_thumbnail() ) {
$restimpo_large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'header-slider-thumb'); ?>            
          <li style="background-image: url(<?php echo esc_url($restimpo_large_image_url[0]); ?>);">
            <span class="header-slider-text-wrapper">
              <span class="header-slider-text"><span class="header-slider-link"><?php the_title(); ?></span><?php $restimpo_content_check = get_the_excerpt(); if ( $restimpo_content_check != '' ) { ?><span class="header-slider-info"><?php echo $restimpo_content_check; ?></span><?php } ?><a class="header-slider-more" href="<?php echo get_permalink(); ?>"><span><?php _e( 'Read more &gt;' , 'restimpo' ); ?></span></a>
              </span>
            </span>
          </li>
<?php } ?>
<?php endwhile; endif; ?>
        </ul>
      </div>
<?php } elseif ( get_header_image() != '' ) { ?>
  <div class="header-image">
    <img class="header-img" src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>" />
    <div class="header-image-container">
    <div class="header-image-text-wrapper">
      <div class="header-image-text">
<?php if ( $restimpo_header_image_headline != '' ) { ?>
        <p class="header-image-headline"><?php echo stripslashes_deep($restimpo_header_image_headline); ?></p>
<?php } if ( $restimpo_header_image_text != '' ) { ?>
        <p class="header-image-info"><?php echo stripslashes_deep($restimpo_header_image_text); ?></p>
<?php } if ( $restimpo_header_image_link_url != '' || $restimpo_header_image_link_text != '' ) { ?>
        <a class="header-image-link" href="<?php echo esc_url($restimpo_header_image_link_url); ?>"><span><?php esc_attr_e($restimpo_header_image_link_text); ?></span></a>
<?php } ?>
      </div>
    </div>
    </div>
  </div>
<?php } ?>
<?php } elseif ( $restimpo_display_header_image == 'Everywhere' && get_header_image() != '' ) { ?>
  <div class="header-image">
    <img class="header-img" src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>" />
  </div>
<?php } ?>
<?php if ( is_home() && $restimpo_display_site_description != 'Hide' ) { ?>  
  <div class="header-description-wrapper">
    <div class="header-description">
      <h1><?php bloginfo( 'description' ); ?></h1>
    </div>
  </div>
<?php } ?>
</header> <!-- end of wrapper-header -->
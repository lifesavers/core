<?php
/**
 * The main template file.
 * @package RestImpo
 * @since RestImpo 1.0.0
*/
get_header(); ?>

<div id="wrapper-content">
  <div class="container">
  <div id="main-content">
<?php if ($restimpo_display_latest_posts != 'Hide'){ ?>
    <section class="home-latest-posts">
      <h2 class="entry-headline"><span class="entry-headline-text"><?php esc_attr_e($restimpo_latest_posts_headline); ?></span></h2>
<?php $args = array(  
	'post_type' => 'post',
	'post_status' => 'publish'
);
$query = new WP_Query( $args );                 
if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; endif; ?>
<?php restimpo_content_nav( 'nav-below' ); ?>
  </section>
<?php } ?>
<?php if ( dynamic_sidebar( 'sidebar-6' ) ) : else : ?>
<?php endif; ?>    
  </div>
<?php get_sidebar(); ?>
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>
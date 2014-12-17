<?php
/**
 * The category archive template file.
 * @package RestImpo
 * @since RestImpo 1.0.0
*/
get_header(); ?>

<div id="wrapper-content">
<?php if ( have_posts() ) : ?>
  <div class="content-headline-wrapper">
    <div class="content-headline">
      <h1><?php single_cat_title(); ?></h1>
<?php restimpo_get_breadcrumb(); ?>
    </div>
  </div>
  <div class="container">
  <div id="main-content">
    <div id="content"> 
<?php if ( category_description() ) : ?><div class="archive-meta"><?php echo category_description(); ?></div><?php endif; ?>
<?php $args = array(  
	'post_type' => 'post',
	'post_status' => 'publish'
);
$query = new WP_Query( $args );                 
while (have_posts()) : the_post(); ?>      
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; endif; ?>
<?php restimpo_content_nav( 'nav-below' ); ?>
    </div> <!-- end of content -->
  </div>
<?php get_sidebar(); ?>
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>
<?php
/**
 * The post template file.
 * @package RestImpo
 * @since RestImpo 1.0.0
*/
get_header(); ?>

<div id="wrapper-content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="content-headline-wrapper">
    <div class="content-headline">
      <h1><?php the_title(); ?></h1>
<?php restimpo_get_breadcrumb(); ?>
    </div>
  </div>
  <div class="container">
  <div id="main-content">
    <article id="content">
      <div class="post-thumbnail"><?php restimpo_get_display_image_post(); ?></div> 
<?php if ( $restimpo_display_meta_post != 'Hide' ) { ?>
      <p class="post-info"><span class="post-info-author"><?php the_author_posts_link(); ?></span><span class="post-info-date"><?php echo get_the_date(); ?></span><span class="post-info-category"><?php the_category(', '); ?></span><?php the_tags( '<span class="post-info-tags">', ', ', '</span>' ); ?></p>
<?php } ?>
      <div class="entry-content">
<?php the_content( 'Continue reading' ); ?>
<?php wp_link_pages( array( 'before' => '<p class="page-link"><span>' . __( 'Pages:', 'restimpo' ) . '</span>', 'after' => '</p>' ) ); ?>
<?php edit_post_link( __( '(Edit)', 'restimpo' ), '<p>', '</p>' ); ?>
      </div>
<?php endwhile; endif; ?>
<?php restimpo_social_buttons_post(); ?>
<?php if (($restimpo_next_preview_post == '') || ($restimpo_next_preview_post == 'Display')) :  restimpo_prev_next('restimpo-post-nav');  endif; ?>

<?php if ( $restimpo_display_related_posts != 'Hide' ) { ?>
<?php $orig_post = $post;
global $post;
$categories = get_the_category($post->ID);
if ($categories) {
$category_ids = array();
foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
$args=array(
'category__in' => $category_ids,
'post__not_in' => array($post->ID),
'posts_per_page' => $restimpo_related_posts_number,
'ignore_sticky_posts' => true );

$my_query = new wp_query( $args );
if( $my_query->have_posts() ) { ?>
<div class="wrapper-related-posts">
      <h2 class="entry-headline"><span class="entry-headline-text"><?php esc_attr_e($restimpo_related_posts_headline); ?></span></h2>  
      <div <?php if ( $restimpo_related_posts_format == 'Slider' ) { ?>class="flexslider posts-slider"<?php } ?>>      
        <ul <?php if ( $restimpo_related_posts_format == 'Slider' ) { ?>class="slides"<?php } else { ?>class="unordered-list"<?php } ?>>
<?php while( $my_query->have_posts() ) {
$my_query->the_post();?>
	       <li><?php if ( $restimpo_related_posts_format == 'Slider' ) { ?><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail( 'slider-thumb' ); ?></a><?php } ?><a <?php if ( $restimpo_related_posts_format == 'Slider' ) { ?>class="slider-link"<?php } ?> href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></li>
<?php } ?>
        </ul>
      </div>
</div>
<?php }
}
$post = $orig_post;
wp_reset_query(); ?>
<?php } ?>
 
<?php comments_template( '', true ); ?>
    </article> <!-- end of content -->
  </div>
<?php get_sidebar(); ?>
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>
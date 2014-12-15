<?php
/**
 * Plugin Name: RestImpo Posts-Grid Widget
 * Description: Displays the latest posts from the selected category in the grid manner.
 * Author: Tomas Toman	
 * Version: 1.0
*/

add_action('widgets_init', create_function('', 'return register_widget("restimpo_homepage_grid");'));
class restimpo_homepage_grid extends WP_Widget {
	function restimpo_homepage_grid() {
		$widget_ops = array('classname' => 'homepage-grid-posts', 'description' => __('Displays the latest posts from the selected category as a grid.', 'restimpo') );
		$control_ops = array('width' => 200, 'height' => 400);
		$this->WP_Widget('restimpogrid', __('RestImpo Posts-Grid', 'restimpo'), $widget_ops, $control_ops);
	}
	function form($instance) {
		// outputs the options form on admin
    if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
		}
		else {
			$title = __( '', 'restimpo' );
		} 

	  if ( $instance ) {
			$category = esc_attr( $instance[ 'category' ] );
		}
		else {
			$category = __( '', 'restimpo' );
		} 

		if ( $instance ) {
			$numberposts = esc_attr( $instance[ 'numberposts' ] );
		}
		else {
			$numberposts = __( '5', 'restimpo' );
    } ?>
<!-- Title -->
<p>
	<label for="<?php echo $this->get_field_id('title'); ?>">
		<?php _e('Title:', 'restimpo'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<!-- Category -->
<p>
	<label for="<?php echo $this->get_field_id('category'); ?>">
		<?php _e('Category:', 'restimpo'); ?>
	</label>
<?php wp_dropdown_categories( array(
    'name' => $this->get_field_name('category'),
    'id' => $this->get_field_id('category'),
    'class' => 'widefat',
    'selected' => $instance["category"],
    'show_option_none' => '- not selected -'
) ); ?>
<p style="font-size: 10px; color: #999; margin: 0; padding: 0px;">
	<?php _e('Select a category of posts.', 'restimpo'); ?>
</p>
</p>
<!-- Number of posts -->
<p>
	<label for="<?php echo $this->get_field_id('numberposts'); ?>">
		<?php _e('Number of posts:', 'restimpo'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('numberposts'); ?>" name="<?php echo $this->get_field_name('numberposts'); ?>" type="text" value="<?php echo $numberposts; ?>" />
<p style="font-size: 10px; color: #999; margin: 0; padding: 0px;">
	<?php _e('Insert here the number of latest posts from the selected category which you want to display.', 'restimpo'); ?>
</p>
</p>
<?php } 

function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = $old_instance;
    $instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['category'] = $new_instance['category'];
		$instance['numberposts'] = sanitize_text_field($new_instance['numberposts']);
	return $instance;
	}

function widget($args, $instance) {
		// outputs the content of the widget
		 extract( $args );
      $title = apply_filters('widget_title', $instance['title']);
			$category = apply_filters('widget_category', $instance['category']);
			$numberposts = apply_filters('widget_numberposts', $instance['numberposts']); ?>
<?php echo $before_widget; ?>
    <section class="home-grid-posts">
<?php $args1 = array(
  'cat' => $category,
  'showposts' => $numberposts,
	'post_type' => 'post',
	'post_status' => 'publish'
);
$my_query = new WP_Query( $args1 ); ?> 
                
      <h2 class="entry-headline"><span class="entry-headline-text"><?php echo $title; ?></span></h2>
      <div class="home-grid-posts-wrapper">
<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>            
        <article class="post-entry post-entry-grid">
<?php if ( has_post_thumbnail() ) : ?>
          <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail( 'grid-thumb' ); ?></a><?php endif; ?>
          <h2 class="post-entry-headline"><a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php restimpo_short_title(); ?></a></h2>
          <p class="post-info"><span class="post-info-date"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_date(); ?></a></span><?php if ( comments_open() ) : ?><span class="post-info-comments"><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?></a></span><?php endif; ?></p>
          <p><a href="<?php echo get_permalink(); ?>" class="read-more-link"><?php _e( 'Read more &gt;' , 'restimpo' ); ?></a></p>
        </article>
<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>
      </div>
    </section>
<?php echo $after_widget; ?>
<?php
	}
}
?>
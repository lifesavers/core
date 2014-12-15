<?php
/**
 * Plugin Name: RestImpo Posts-List Widget
 * Description: Displays the latest posts from the selected category as an unordered list with highlighted first post.
 * Author: Tomas Toman	
 * Version: 1.0
*/

add_action('widgets_init', create_function('', 'return register_widget("restimpo_homepage_list");'));
class restimpo_homepage_list extends WP_Widget {
	function restimpo_homepage_list() {
		$widget_ops = array('classname' => 'homepage-list-posts', 'description' => __('Displays the latest posts from the selected category as an unordered list with highlighted first post.', 'restimpo') );
		$control_ops = array('width' => 200, 'height' => 400);
		$this->WP_Widget('restimpolist', __('RestImpo Posts-List', 'restimpo'), $widget_ops, $control_ops);
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
    <section class="home-list-posts">
<?php $args1 = array(
  'cat' => $category,
  'showposts' => $numberposts,
	'post_type' => 'post',
	'post_status' => 'publish'
);
$my_query = new WP_Query( $args1 ); ?> 
                
      <h2 class="entry-headline"><span class="entry-headline-text"><?php echo $title; ?></span></h2>

<?php if ($my_query->have_posts()) : $count = 0;
while ($my_query->have_posts()) : $my_query->the_post();
$count++; 
if ($count == 1) { ?>                  
      <article class="post-entry post-entry-list-first">
        <h2 class="post-entry-headline"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php if ( has_post_thumbnail() ) : ?>
          <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
<?php endif; ?>
          <div class="post-entry-content">
<?php the_excerpt(); ?>
          </div>
      </article>
      <div class="home-list-posts-wrapper">      
        <ul>
<?php } else { ?>           
          <li><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></li>
<?php } ?>
<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>
        </ul> 
      </div>
    </section>
<?php echo $after_widget; ?>
<?php
	}
}
?>
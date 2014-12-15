<?php
/**
 * Plugin Name: RestImpo Facebook Like Box Widget
 * Description: Displays the Facebook Like Box.
 * Author: Tomas Toman	
 * Version: 1.0
*/

add_action('widgets_init', create_function('', 'return register_widget("restimpo_facebook");'));
class restimpo_facebook extends WP_Widget {
	function restimpo_facebook() {
		$widget_ops = array('classname' => 'facebook-like-box', 'description' => __('Displays Facebook Like Box.', 'restimpo') );
		$control_ops = array('width' => 200, 'height' => 400);
		$this->WP_Widget('restimpohead', __('RestImpo Facebook Like Box Widget', 'restimpo'), $widget_ops, $control_ops);
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
			$likeurl = esc_attr( $instance[ 'likeurl' ] );
		}
		else {
			$likeurl = __( '', 'restimpo' );
		} 

		if ( $instance ) {
			$showfaces = esc_attr( $instance[ 'showfaces' ] );
		}
		else {
			$showfaces = __( '', 'restimpo' );
    }
      
    if ( $instance ) {
			$showstream = esc_attr( $instance[ 'showstream' ] );
		}
		else {
			$showstream = __( '', 'restimpo' );       
		} 
    
		if ( $instance ) {
			$boxheight = esc_attr( $instance[ 'boxheight' ] );
		}
		else {
			$boxheight = __( '', 'restimpo' );
		} ?>
<!-- Title -->
<p>
	<label for="<?php echo $this->get_field_id('title'); ?>">
		<?php _e('Title:', 'restimpo'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<!-- Page URL -->
<p>
	<label for="<?php echo $this->get_field_id('likeurl'); ?>">
		<?php _e('Facebook Page URL:', 'restimpo'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('likeurl'); ?>" name="<?php echo $this->get_field_name('likeurl'); ?>" type="text" value="<?php echo $likeurl; ?>" />
<p style="font-size: 10px; color: #999; margin: 0; padding: 0px;">
	<?php _e('Insert here the full URL of your Facebook Page that will be liked (example: http://www.facebook.com/FacebookDevelopers).', 'restimpo'); ?>
</p>
</p>
<!-- Height -->
<p>
	<label for="<?php echo $this->get_field_id('boxheight'); ?>">
		<?php _e('Like Box Height: (optional)', 'restimpo'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('boxheight'); ?>" name="<?php echo $this->get_field_name('boxheight'); ?>" type="text" value="<?php echo $boxheight; ?>" />
<p style="font-size: 10px; color: #999; margin: 0; padding: 0px;">
	<?php _e('Insert here the height of Like Box. The value is in pixels, but in the field please write ONLY NUMBERS (without symbol "px")!', 'restimpo'); ?>
</p>
</p>
<!-- Show Faces -->
<p>
	<label for="<?php echo $this->get_field_id('showfaces'); ?>">
		<?php _e('Show Faces:', 'restimpo'); ?>
	</label>
  <select class="widefat" id="<?php echo $this->get_field_id('showfaces'); ?>" name="<?php echo $this->get_field_name('showfaces'); ?>">
   <option value="true">display</option>
   <option value="false">hide</option>
 </select>
<p style="font-size: 10px; color: #999; margin: 0; padding: 0px;">
	<?php _e('Specify whether to display profile photos of people who like the page.', 'restimpo'); ?>
</p>
</p>
<!-- Show Stream -->
<p>
	<label for="<?php echo $this->get_field_id('showstream'); ?>">
		<?php _e('Show Stream:', 'restimpo'); ?>
	</label>
  <select class="widefat" id="<?php echo $this->get_field_id('showstream'); ?>" name="<?php echo $this->get_field_name('showstream'); ?>">
   <option value="true">display</option>
   <option value="false">hide</option>
 </select>
<p style="font-size: 10px; color: #999; margin: 0; padding: 0px;">
	<?php _e('Specify whether to display a stream of the latest posts by the Page.', 'restimpo'); ?>
</p>
</p>
<?php 

	} 

function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = $old_instance;
    $instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['likeurl'] = sanitize_text_field($new_instance['likeurl']);
		$instance['showfaces'] = $new_instance['showfaces'];
    $instance['showstream'] = $new_instance['showstream'];
		$instance['boxheight'] = $new_instance['boxheight'];
	return $instance;
	}

function widget($args, $instance) {
		// outputs the content of the widget
		 extract( $args );
      $title = apply_filters('widget_title', $instance['title']);
			$likeurl = apply_filters('widget_likeurl', $instance['likeurl']);
			$showfaces = apply_filters('widget_showfaces', $instance['showfaces']);
      $showstream = apply_filters('widget_showstream', $instance['showstream']);
			$boxheight = apply_filters('widget_boxheight', $instance['boxheight']); ?>
<?php if ($title=="") $title = "We are on Facebook"; ?>
<?php echo $before_widget; ?>
<?php if ( $title )
		echo $before_title . $title . $after_title;
    echo "<div class='fb-like-box-wrapper'><div class='fb-like-box' data-href='$likeurl' data-height='$boxheight' data-colorscheme='light' data-show-faces='$showfaces' data-header='false' data-stream='$showstream' data-show-border='false'></div></div>";
	 	echo $after_widget; ?>
<?php
	}
}
?>
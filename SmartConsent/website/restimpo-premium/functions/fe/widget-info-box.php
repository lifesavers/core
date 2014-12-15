<?php
/**
 * Plugin Name: RestImpo Info-Box Widget
 * Description: Displays a box with your custom text and link.
 * Author: Tomas Toman	
 * Version: 1.0
*/

add_action('widgets_init', create_function('', 'return register_widget("restimpo_info_box");'));
class restimpo_info_box extends WP_Widget {
	function restimpo_info_box() {
		$widget_ops = array('classname' => 'homepage-info-box', 'description' => __('Displays a box with your custom text and link.', 'restimpo') );
		$control_ops = array('width' => 200, 'height' => 400);
		$this->WP_Widget('infobox', __('RestImpo Info-Box', 'restimpo'), $widget_ops, $control_ops);
	}
	function form($instance) {
		// outputs the options form on admin
    if ( $instance ) {
			$icon = esc_attr( $instance[ 'icon' ] );
		}
		else {
			$icon = __( '', 'restimpo' );
		}
    
    if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
		}
		else {
			$title = __( '', 'restimpo' );
		} 

	  if ( $instance ) {
			$content = esc_attr( $instance[ 'content' ] );
		}
		else {
			$content = __( '', 'restimpo' );
		} 

		if ( $instance ) {
			$buttonlink = esc_attr( $instance[ 'buttonlink' ] );
		}
		else {
			$buttonlink = __( '', 'restimpo' );
    } ?>
<!-- Icon -->
<p>
	<label for="<?php echo $this->get_field_id('icon'); ?>">
		<?php _e('Icon:', 'restimpo'); ?>
	</label>
  <select class="widefat" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>">
   <option value="info-basket"><?php _e('Basket', 'restimpo'); ?></option>
   <option value="info-book"><?php _e('Book', 'restimpo'); ?></option>
   <option value="info-calendar"><?php _e('Calendar', 'restimpo'); ?></option>
   <option value="info-comments"><?php _e('Comments', 'restimpo'); ?></option>
   <option value="info-computer"><?php _e('Computer', 'restimpo'); ?></option>
   <option value="info-download"><?php _e('Download', 'restimpo'); ?></option>
   <option value="info-envelope"><?php _e('Envelope', 'restimpo'); ?></option>
   <option value="info-gift"><?php _e('Gift', 'restimpo'); ?></option>
   <option value="info-hand"><?php _e('Hand', 'restimpo'); ?></option>
   <option value="info-heart"><?php _e('Heart', 'restimpo'); ?></option>
   <option value="info-music"><?php _e('Music', 'restimpo'); ?></option>
   <option value="info-star"><?php _e('Star', 'restimpo'); ?></option>
   <option value="info-tick"><?php _e('Tick', 'restimpo'); ?></option>
   <option value="info-user"><?php _e('User', 'restimpo'); ?></option>
   <option value=""><?php _e('none', 'restimpo'); ?></option>
 </select>
<p style="font-size: 10px; color: #999; margin: 0; padding: 0px;">
	<?php _e('Select an icon which will be displayed in the header of the box.', 'restimpo'); ?>
</p>
</p>
<!-- Title -->
<p>
	<label for="<?php echo $this->get_field_id('title'); ?>">
		<?php _e('Title:', 'restimpo'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<!-- Content -->
<p>
	<label for="<?php echo $this->get_field_id('content'); ?>">
		<?php _e('Text:', 'restimpo'); ?>
	</label>
  <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>"><?php echo $content; ?></textarea>
</p> 
<!-- Button Link -->
<p>
	<label for="<?php echo $this->get_field_id('buttonlink'); ?>">
		<?php _e('Link:', 'restimpo'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('buttonlink'); ?>" name="<?php echo $this->get_field_name('buttonlink'); ?>" type="text" value="<?php echo $buttonlink; ?>" />
<p style="font-size: 10px; color: #999; margin: 0; padding: 0px;">
	<?php _e('Insert here the full URL which will be displayed as a button (optional).', 'restimpo'); ?>
</p>
</p>
<?php } 

function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = $old_instance;
    $instance['icon'] = $new_instance['icon'];
    $instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['content'] = esc_textarea($new_instance['content']);
		$instance['buttonlink'] = sanitize_text_field($new_instance['buttonlink']);
	return $instance;
	}

function widget($args, $instance) {
		// outputs the content of the widget
		 extract( $args );
      $icon = apply_filters('widget_icon', $instance['icon']);
      $title = apply_filters('widget_title', $instance['title']);
			$content = apply_filters('widget_content', $instance['content']);
			$buttonlink = apply_filters('widget_buttonlink', $instance['buttonlink']); ?>
<?php echo $before_widget; ?>
      <div class="info-box">
<?php if ( $icon != ''  ) { ?>
        <div class="info-box-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/info-box/<?php echo $icon; ?>.png" alt="icon" /></div>
<?php } ?>
        <h2 class="info-box-headline" <?php if ( $icon == ''  ) { ?>style="padding-top: 20px;"<?php } ?>><?php echo $title; ?></h2>
        <div class="info-box-content">
          <p><?php echo $content; ?></p>
        </div>
<?php if ( $buttonlink != ''  ) { ?>
        <a class="info-box-more" href="<?php echo $buttonlink; ?>"><?php _e( 'READ MORE' , 'restimpo' ); ?></a>
<?php } ?>
      </div>
<?php echo $after_widget; ?>
<?php
	}
}
?>
<?php
/**
 * Plugin Name: RestImpo Social Widget
 * Description: Display links to profiles on the most popular social networks.
 * Author: WPlook Team and Tomas Toman	
 * Version: 1.3
*/

add_action('widgets_init', create_function('', 'return register_widget("restimposocial");'));
class restimposocial extends WP_Widget {
	function restimposocial() {
		$widget_ops = array('classname' => 'restimposocial', 'description' => __('A Social widget by RestImpo', 'restimpo') );
		$control_ops = array('width' => 200, 'height' => 400);
		$this->WP_Widget('restimpotsoc', __('RestImpo Social Widget', 'restimpo'), $widget_ops, $control_ops);
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
			$twitter = esc_attr( $instance[ 'twitter' ] );
		}
		else {
			$twitter = __( '', 'restimpo' );
		} 

		if ( $instance ) {
			$facebook = esc_attr( $instance[ 'facebook' ] );
		}
		else {
			$facebook = __( '', 'restimpo' );
		} 
		if ( $instance ) {
			$rss = esc_attr( $instance[ 'rss' ] );
		}
		else {
			$rss = __( '', 'restimpo' );
		} 
        if ( $instance ) {
			$googleplus = esc_attr( $instance[ 'googleplus' ] );
		}
		else {
			$googleplus = __( '', 'restimpo' );
		} 
        if ( $instance ) {
			$youtube = esc_attr( $instance[ 'youtube' ] );
		}
		else {
			$youtube = __( '', 'restimpo' );
		}
		
		if ( $instance ) {
			$linkedin = esc_attr( $instance[ 'linkedin' ] );
		}
		else {
			$linkedin = __( '', 'restimpo' );
		} 
        if ( $instance ) {
			$delicious = esc_attr( $instance[ 'delicious' ] );
		}
		else {
			$delicious = __( '', 'restimpo' );
		} 
        if ( $instance ) {
			$pinterest = esc_attr( $instance[ 'pinterest' ] );
		}
		else {
			$pinterest = __( '', 'restimpo' );
		}
     	 if ( $instance ) {
			$flickr = esc_attr( $instance[ 'flickr' ] );
		}
		else {
			$flickr = __( '', 'restimpo' );
		}		
		?>
<!-- Title-->
<p>
	<label for="<?php echo $this->get_field_id('title'); ?>">
		<?php _e('Title:', 'restimpo'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<!-- Twitter-->
<p>
	<label for="<?php echo $this->get_field_id('twitter'); ?>"> <img style="float: left; margin: 0 5px 0px 0; width: 12px; height: 12px;" src="<?php echo get_template_directory_uri()  ?>/functions/be/images/icons/twitter.png" />
		<?php _e('Twitter:', 'restimpo'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo $twitter; ?>" />
<p style="font-size: 10px; color: #999; margin: 0; padding: 0px;">
	<?php _e('Insert the full URL of your Twitter profile.', 'restimpo'); ?>
</p>
</p>
<!-- Facebook-->
<p>
	<label for="<?php echo $this->get_field_id('facebook'); ?>"> <img style="float: left; margin: 0 5px 0px 0; width: 12px; height: 12px;" src="<?php echo get_template_directory_uri()  ?>/functions/be/images/icons/facebook.png" />
		<?php _e('Facebook:', 'restimpo'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo $facebook; ?>" />
<p style="font-size: 10px; color: #999; margin: 0; padding: 0px;">
	<?php _e('Insert the full URL of your Facebook profile, page or group.', 'restimpo'); ?>
</p>
</p>
<!-- RSS-->
<p>
	<label for="<?php echo $this->get_field_id('rss'); ?>"> <img style="float: left; margin: 0 5px 0px 0; width: 12px; height: 12px;" src="<?php echo get_template_directory_uri()  ?>/functions/be/images/icons/rss.png" />
		<?php _e('RSS:', 'restimpo'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" type="text" value="<?php echo $rss; ?>" />
<p style="font-size: 10px; color: #999; margin: 0; padding: 0px;">
	<?php _e('Insert the Url of your RSS. You may include your RSS from Feedburner.', 'restimpo'); ?>
</p>
</p>
<!-- Google Plus-->
<p>
	<label for="<?php echo $this->get_field_id('googleplus'); ?>"> <img style="float: left; margin: 0 5px 0px 0; width: 12px; height: 12px;" src="<?php echo get_template_directory_uri()  ?>/functions/be/images/icons/google-plus.png" />
		<?php _e('Google Plus:', 'restimpo'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('googleplus'); ?>" name="<?php echo $this->get_field_name('googleplus'); ?>" type="text" value="<?php echo $googleplus; ?>" />
<p style="font-size: 10px; color: #999; margin: 0; padding: 0px;">
	<?php _e('Insert the full URL of your Google Plus profile', 'restimpo'); ?>
</p>
</p>
<!-- You Tube-->
<p>
	<label for="<?php echo $this->get_field_id('youtube'); ?>"> <img style="float: left; margin: 0 5px 0px 0; width: 12px; height: 12px;" src="<?php echo get_template_directory_uri()  ?>/functions/be/images/icons/youtube.png" />
		<?php _e('You Tube:', 'restimpo'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo $youtube; ?>" />
<p style="font-size: 10px; color: #999; margin: 0; padding: 0px;">
	<?php _e('Insert the full URL of your YouTube profile.', 'restimpo'); ?>
</p>
</p>
<!-- Linkedin-->
<p>
	<label for="<?php echo $this->get_field_id('linkedin'); ?>"> <img style="float: left; margin: 0 5px 0px 0; width: 12px; height: 12px;" src="<?php echo get_template_directory_uri()  ?>/functions/be/images/icons/linkedin.png" />
		<?php _e('Linkedin:', 'restimpo'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo $linkedin; ?>" />
<p style="font-size: 10px; color: #999; margin: 0; padding: 0px;">
	<?php _e('Insert the full URL of your Linkedin profile.', 'restimpo'); ?>
</p>
</p>
<!-- Delicious-->
<p>
	<label for="<?php echo $this->get_field_id('delicious'); ?>"> <img style="float: left; margin: 0 5px 0px 0; width: 12px; height: 12px;" src="<?php echo get_template_directory_uri()  ?>/functions/be/images/icons/delicious.png" />
		<?php _e('Delicious:', 'restimpo'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('delicious'); ?>" name="<?php echo $this->get_field_name('delicious'); ?>" type="text" value="<?php echo $delicious; ?>" />
<p style="font-size: 10px; color: #999; margin: 0; padding: 0px;">
	<?php _e('Insert the full URL of your Delicious profile.', 'restimpo'); ?>
</p>
</p>
<!--Pinterest-->
<p>
	<label for="<?php echo $this->get_field_id('pinterest'); ?>"> <img style="float: left; margin: 0 5px 0px 0; width: 12px; height: 12px;" src="<?php echo get_template_directory_uri()  ?>/functions/be/images/icons/pinterest.png" />
		<?php _e('Pinterest:', 'restimpo'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" type="text" value="<?php echo $pinterest; ?>" />
<p style="font-size: 10px; color: #999; margin: 0; padding: 0px;">
	<?php _e('Insert the full URL of your Pinterest profile.', 'restimpo'); ?>
</p>
</p>
<!-- Flickr-->
<p>
	<label for="<?php echo $this->get_field_id('flickr'); ?>"> <img style="float: left; margin: 0 5px 0px 0; width: 12px; height: 12px;" src="<?php echo get_template_directory_uri()  ?>/functions/be/images/icons/flickr.png" />
		<?php _e('Flickr:', 'restimpo'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('flickr'); ?>" name="<?php echo $this->get_field_name('flickr'); ?>" type="text" value="<?php echo $flickr; ?>" />
<p style="font-size: 10px; color: #999; margin: 0; padding: 0px;">
	<?php _e('Insert the full URL of your Flickr profile.', 'restimpo'); ?>
</p>
</p>
<?php 

	} 

function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['twitter'] = sanitize_text_field($new_instance['twitter']);
		$instance['facebook'] = $new_instance['facebook'];
		$instance['rss'] = $new_instance['rss'];
		$instance['googleplus'] = $new_instance['googleplus'];
		$instance['youtube'] = $new_instance['youtube'];
		$instance['linkedin'] = $new_instance['linkedin'];
		$instance['delicious'] = $new_instance['delicious'];
		$instance['pinterest'] = $new_instance['pinterest'];
		$instance['flickr'] = $new_instance['flickr'];
	return $instance;
	}

function widget($args, $instance) {
		// outputs the content of the widget
		 extract( $args );
			$title = apply_filters('widget_title', $instance['title']);
			$twitter = apply_filters('widget_twitter', $instance['twitter']);
			$facebook = apply_filters('widget_facebook', $instance['facebook']);
			$rss = apply_filters('widget_rss', $instance['rss']);
			$googleplus = apply_filters('widget_googleplus', $instance['googleplus']);
			$youtube = apply_filters('widget_youtube', $instance['youtube']);
			$linkedin = apply_filters('widget_linkedin', $instance['linkedin']);
			$delicious = apply_filters('widget_delicious', $instance['delicious']);
			$pinterest = apply_filters('widget_pinterest', $instance['pinterest']);
			$flickr = apply_filters('widget_flickr', $instance['flickr']);

			?>
<?php if ($title=="") $title = "Social Widget"; ?>
<?php echo $before_widget; ?>
<?php if ( $title )
		echo $before_title . $title . $after_title; 
		echo "<div class='social-widget-body'>";
    // Facebook
		if ($facebook != "") {
			echo "<div class='social-item'>"."<a href='$facebook'><img src=\"". get_template_directory_uri()  ."/images/icons/facebook.png\" alt=\"Facebook \" /></a><p><a href='$facebook'>Facebook</a></p>" ."</div>";
		}
		// Twitter
		if ($twitter != "") {
			echo "<div class='social-item'>"."<a href='$twitter'><img src=\"". get_template_directory_uri()  ."/images/icons/twitter.png\" alt=\"Twitter \" /></a><p><a href='$twitter'>Twitter</a></p>" ."</div>";
		}		
		// Google Plus
		if ($googleplus != "") {
			echo "<div class='social-item'>"."<a href='$googleplus'><img src=\"". get_template_directory_uri()  ."/images/icons/google-plus.png\" alt=\"Google Plus \" /></a><p><a href='$googleplus'>Google +</a></p>" ."</div>";
		}		
		// You Tube
		if ($youtube != "") {
			echo "<div class='social-item'>"."<a href='$youtube'><img src=\"". get_template_directory_uri()  ."/images/icons/youtube.png\" alt=\"You Tube \" /></a><p><a href='$youtube'>You Tube</a></p>" ."</div>";
		}			
		// Linkedin
		if ($linkedin != "") {
			echo "<div class='social-item'>"."<a href='$linkedin'><img src=\"". get_template_directory_uri()  ."/images/icons/linkedin.png\" alt=\"Linkedin \" /></a><p><a href='$linkedin'>Linkedin</a></p>" ."</div>";
		}			
		// Delicious
		if ($delicious != "") {
			echo "<div class='social-item'>"."<a href='$delicious'><img src=\"". get_template_directory_uri()  ."/images/icons/delicious.png\" alt=\"Delicious\" /></a><p><a href='$delicious'>Delicious</a></p>" ."</div>";
		}			
		// Pinterest
		if ($pinterest != "") {
			echo "<div class='social-item'>"."<a href='$pinterest'><img src=\"". get_template_directory_uri() ."/images/icons/pinterest.png\" alt=\"Pinterest \" /></a><p><a href='$pinterest'>Pinterest</a></p>" ."</div>";
		}			
		// Flickr
	if ($flickr != "") {
			echo "<div class='social-item'>"."<a href='$flickr'><img src=\"". get_template_directory_uri() ."/images/icons/flickr.png\" alt=\"Flickr \" /></a><p><a href='$flickr'>Flickr</a></p>" ."</div>";
		}
    // RSS
		if ($rss != "") {
			echo "<div class='social-item'>"."<a href='$rss'><img src=\"". get_template_directory_uri()  ."/images/icons/rss.png\" alt=\"RSS \" /></a><p><a href='$rss'>RSS</a></p>" ."</div>";
		}	
		echo "<div class='clear'></div></div>";
	 	echo $after_widget; ?>
<?php
	}
}
?>
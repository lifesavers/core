<?php
/**
 * Plugin Name: RestImpo Twitter Widget
 * Description: Button for following any Twitter profile.
 * Author: WPlook Team and Tomas Toman	
 * Version: 1.0
*/
?>
<?php 
add_action('widgets_init', create_function('', 'return register_widget("restimpotwitter");'));
class restimpotwitter extends WP_Widget {
	function restimpotwitter() {
		$widget_ops = array('classname' => 'restimpotwitter', 'description' => __('Twitter widget by RestImpo', 'restimpo') );
		$control_ops = array('width' => 200, 'height' => 400);
		$this->WP_Widget('restimpottwi', __('RestImpo Twitter Widget', 'restimpo'), $widget_ops, $control_ops);
	}
	
	function form($instance) {
		// outputs the options form on admin
		if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
		}

		else {
			$title = __( 'Join us on Twitter', 'restimpo' );
		} 

		if ( $instance ) {
			$username = esc_attr( $instance[ 'username' ] );
		}
		else {
			$username = __( '', 'restimpo' );
		}  	
	
		?>
		<!-- Title-->
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
				<?php _e('Title:', 'restimpo'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<!-- Twitter Username -->
		<p>
			<label for="<?php echo $this->get_field_id('username'); ?>">
				<?php _e('Twitter Username:', 'restimpo'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" type="text" value="<?php echo $username; ?>" />
		<p style="font-size: 10px; color: #999; margin: 0; padding: 0px;">
			<?php _e('Insert your Twitter username. (ex: restimpo).', 'restimpo'); ?>
		</p>
		</p>
		<?php 
	} 

	function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['username'] = sanitize_text_field($new_instance['username']);
	return $instance;
	}
	function widget($args, $instance) {
		// outputs the content of the widget
		extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
		$username = apply_filters('widget_username', $instance['username']);
		
		?>
		<?php if ($title=="") $title = ""; ?>
		<?php echo $before_widget; ?>
		<?php if ( $title )
			echo $before_title . $title . $after_title; 
			echo "<div class='twitter-widget-body'>";


		// simple pie
		require_once(ABSPATH . 'wp-includes/class-simplepie.php');	
		$upload_dir = wp_upload_dir();
			
		$feed = new SimplePie();
		$feed->set_feed_url('http://api.twitter.com/1/statuses/user_timeline.rss?screen_name='.$username.'');
		$feed->set_cache_location($upload_dir['basedir']);
		$feed->set_cache_duration(1800);
		$feed->init();
		$feed->handle_content_type();

		function restimpomakeURL($url) {
			$url = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:\+.~#?&//=]+)','<a target="_blank" href=\\1>\\1</a>', $url);
			$url = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:\+.~#?&//=]+)','<a target="_blank" href=\\1>\\1</a>', $url);
			$url = eregi_replace('([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})','<a target="_blank" href=\\1>\\1</a>', $url);
			return $url;
		}
			
		function restimpotagurl($tag) {
			$tag = preg_replace('/([\.|\,|\:|\>|\{|\(]?)#{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1 <a target=\"_blank\" href=\"http://twitter.com/#search?q=$2\" class=\"twitter-link\"> #$2 </a> $3 ", $tag);
			return $tag;
		}
		
		function restimpouserurl($user){
			$user = preg_replace('/([\.|\,|\:|\>|\{|\(]?)@{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1 <a target=\"_blank\" href=\"http://twitter.com/#!/$2\" class=\"twitter-user\"> @$2 </a> $3 ", $user);
			return $user;
		}
			
		foreach ($feed->get_items(0,$tweets) as $item) { ?>
			<p class="tweet-text"><?php echo restimpouserurl(restimpotagurl(restimpomakeURL($item->get_description()))); ?> 
				<span class="tweet-time"><a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_date('D, M j, Y'); ?></a></span>
			</p>
			<?php 
		} ?>
		<!-- / #twitter widget -->	
		<a href="https://twitter.com/<?php echo $username; ?>" class="twitter-follow-button" data-show-count="true">Follow @<?php echo $username; ?></a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>
		
		<?php echo $after_widget; ?>
		<?php
	}
}
?>
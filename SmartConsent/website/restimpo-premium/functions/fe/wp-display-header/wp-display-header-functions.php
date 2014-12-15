<?php
/** wp-display-header-functions.php
 *
 * @author  Konstantin Obenland
 * @version 3.0.1
 */


class restimpo_Wp_Plugins_v301 {

	/////////////////////////////////////////////////////////////////////////////
	// PROPERTIES, PROTECTED
	/////////////////////////////////////////////////////////////////////////////

	/**
	 * The plugins' text domain.
	 *
	 * @since  1.1 - 03.04.2011
	 * @access protected
	 *
	 * @var    string
	 */
	protected $textdomain;


	/**
	 * The name of the calling plugin.
	 *
	 * @since  1.0 - 23.03.2011
	 * @access protected
	 *
	 * @var    string
	 */
	protected $plugin_name;


	/**
	 * The path to the plugin file.
	 *
	 * /path/to/wp-content/plugins/{plugin-name}/{plugin-name}.php
	 *
	 * @since  2.0.0 - 30.05.2012
	 * @access protected
	 *
	 * @var    string
	 */
	protected $plugin_path;


	/**
	 * The path to the plugin directory.
	 *
	 * /path/to/wp-content/plugins/{plugin-name}/
	 *
	 * @since  1.2 - 21.04.2011
	 * @access protected
	 *
	 * @var    string
	 */
	protected $plugin_dir_path;


	///////////////////////////////////////////////////////////////////////////
	// METHODS, PUBLIC
	///////////////////////////////////////////////////////////////////////////

	/**
	 * Constructor
	 *
	 * @since  1.0 - 23.03.2011
	 * @access public
	 *
	 * @param  string $plugin_name
	 * @param  string $donate_link_id
	 *
	 * @return restimpo_Wp_Plugins
	 */
	public function __construct( $args = array() ) {

		// Set class properties
		$this->textdomain      = $args['textdomain'];
		$this->plugin_path     = $args['plugin_path'];
		$this->plugin_dir_path = plugin_dir_path( $args['plugin_path'] );
		$this->plugin_name     = plugin_basename( $args['plugin_path'] );

		load_plugin_textdomain( 'restimpo-wp', false, $this->textdomain . '/lang' );

		load_plugin_textdomain( 'restimpo-wp' , false, $this->textdomain . '/lang' );

		$this->hook( 'plugins_loaded', 'parent_plugins_loaded' );
	}


	/**
	 * Hooks in all the hooks :)
	 *
	 * @since  2.0.0 - 12.04.2012
	 * @access public
	 *
	 * @return void
	 */
	public function parent_plugins_loaded() {
		$this->hook( 'plugin_row_meta' );
		if ( ! has_action( 'restimpo_side_info_column' ) ) {
			$this->hook( 'restimpo_side_info_column', 'feed_box'      );
		}
	}


	///////////////////////////////////////////////////////////////////////////
	// METHODS, PROTECTED
	///////////////////////////////////////////////////////////////////////////

	/**
	 * Hooks methods to their WordPress Actions and Filters.
	 *
	 * @example:
	 * $this->hook( 'the_title' );
	 * $this->hook( 'init', 5 );
	 * $this->hook( 'omg', 'is_really_tedious', 3 );
	 *
	 * @author Mark Jaquith
	 * @see    http://sliwww.slideshare.net/markjaquith/creating-and-maintaining-wordpress-plugins
	 * @since  1.5 - 12.02.2012
	 * @access protected
	 *
	 * @param  string $hook Action or Filter Hook name.
	 *
	 * @return boolean true
	 */
	protected function hook( $hook ) {
		$priority = 10;
		$method   = $this->sanitize_method( $hook );
		$args     = func_get_args();
		unset( $args[0] ); // Filter name

		foreach ( (array) $args as $arg ) {
			if ( is_int( $arg ) )
				$priority = $arg;
			else
				$method   = $arg;
		}

		return add_action( $hook, array( $this, $method ), $priority , 999 );
	}

	///////////////////////////////////////////////////////////////////////////
	// METHODS, PRIVATE
	///////////////////////////////////////////////////////////////////////////

	/**
	 * Sanitizes method names.
	 *
	 * @author Mark Jaquith
	 * @see    http://sliwww.slideshare.net/markjaquith/creating-and-maintaining-wordpress-plugins
	 * @since  1.5 - 12.02.2012
	 * @access private
	 *
	 * @param  string $method Method name to be sanitized.
	 *
	 * @return string Sanitized method name
	 */
	private function sanitize_method( $method ) {
		return str_replace( array( '.', '-' ), '_', $method );
	}

} // End of class restimpo_Wp_Plugins


/* End of file wp-display-header-functions.php */
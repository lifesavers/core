<?php
/**
 * Framework setup.
 * @package RestImpo
 * @since RestImpo 1.0.0
*/

function restimpo_get_categories($parent) {	
	$restimpo_categories = get_categories();
	
	foreach ($restimpo_categories as $cat) {
		$categories[$cat->term_id] = $cat->name;
	} 
	return($categories);
}
		$categories = restimpo_get_categories(0);
		$categoriesParents = restimpo_get_categories(0);
		
	if (count($categories) > 0) {
	foreach ( $categories as $key => $value ) {
			$catids[] = $key;
			$catnames[] = $value;
	}
	}
	if (count($categoriesParents) > 0){
	foreach ( $categoriesParents as $key => $value ) {

		$catidsp[] = $key;
			$catnamesp[] = $value;
		}
}

function restimpo_bar_menu() {
	global $wp_admin_bar;
	if ( !is_super_admin() || !is_admin_bar_showing() )
		return;
		$admin_dir = get_admin_url();
		
	$wp_admin_bar->add_menu( array(
	'id' => 'custom_menu',
	'title' => __( 'Theme Options', 'restimpo' ),
	'href' => $admin_dir .'admin.php?page=fw-options.php',
	'meta' => array('title' => 'RestImpo Setup', 'class' => 'restimpopanel') ) );
}
add_action('admin_bar_menu', 'restimpo_bar_menu', '1000');
?>
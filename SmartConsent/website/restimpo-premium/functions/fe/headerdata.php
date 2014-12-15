<?php
/**
 * Headerdata of Theme options.
 * @package RestImpo
 * @since RestImpo 1.0.0
*/  
global $restimpo_options;
foreach ($restimpo_options as $value) {
	if (isset($value['id']) && get_option( $value['id'] ) === FALSE && isset($value['std'])) {
		$$value['id'] = $value['std'];
	}
	elseif (isset($value['id'])) { $$value['id'] = get_option( $value['id'] ); }
}

// additional js and css
if(	!is_admin()){
function restimpo_fonts_include () {
// Google Fonts
$bodyfont = get_option('restimpo_body_google_fonts');
$headingfont = get_option('restimpo_headings_google_fonts');
$descriptionfont = get_option('restimpo_description_google_fonts');
$headlinefont = get_option('restimpo_headline_google_fonts');
$headlineboxfont = get_option('restimpo_headline_box_google_fonts');
$postentryfont = get_option('restimpo_postentry_google_fonts');
$sidebarfont = get_option('restimpo_sidebar_google_fonts');
$menufont = get_option('restimpo_menu_google_fonts');
$topmenufont = get_option('restimpo_top_menu_google_fonts');

$fonturl = "//fonts.googleapis.com/css?family=";

$bodyfonturl = $fonturl.$bodyfont;
$headingfonturl = $fonturl.$headingfont;
$descriptionfonturl = $fonturl.$descriptionfont;
$headlinefonturl = $fonturl.$headlinefont;
$headlineboxfonturl = $fonturl.$headlineboxfont;
$postentryfonturl = $fonturl.$postentryfont;
$sidebarfonturl = $fonturl.$sidebarfont;
$menufonturl = $fonturl.$menufont;
$topmenufonturl = $fonturl.$topmenufont;
	// Google Fonts
     if ($bodyfont != 'default' && $bodyfont != ''){
      wp_enqueue_style('restimpo-google-font1', $bodyfonturl); 
		 }
     if ($headingfont != 'default' && $headingfont != ''){
      wp_enqueue_style('restimpo-google-font2', $headingfonturl);
		 }
     if ($descriptionfont != 'default' && $descriptionfont != ''){
      wp_enqueue_style('restimpo-google-font3', $descriptionfonturl);
		 }
     if ($headlinefont != 'default' && $headlinefont != ''){
      wp_enqueue_style('restimpo-google-font4', $headlinefonturl); 
		 }
     if ($postentryfont != 'default' && $postentryfont != ''){
      wp_enqueue_style('restimpo-google-font5', $postentryfonturl); 
		 }
     if ($sidebarfont != 'default' && $sidebarfont != ''){
      wp_enqueue_style('restimpo-google-font6', $sidebarfonturl);
		 }
     if ($menufont != 'default' && $menufont != ''){
      wp_enqueue_style('restimpo-google-font8', $menufonturl);
		 }
     if ($topmenufont != 'default' && $topmenufont != ''){
      wp_enqueue_style('restimpo-google-font9', $topmenufonturl);
		 }
     if ($headlineboxfont != 'default' && $headlineboxfont != ''){
      wp_enqueue_style('restimpo-google-font10', $headlineboxfonturl); 
		 }
}
add_action( 'wp_enqueue_scripts', 'restimpo_fonts_include' );
}

// additional js and css
function restimpo_css_include () {
	if (get_option('restimpo_css') == 'Green (default)' ){
			wp_enqueue_style('restimpo-style', get_stylesheet_uri());
		}

		if (get_option('restimpo_css') == 'Blue' ){
			wp_enqueue_style('restimpo-style-blue', get_template_directory_uri().'/css/blue.css');
		}
    
    if (get_option('restimpo_css') == 'Brown' ){
			wp_enqueue_style('restimpo-style-brown', get_template_directory_uri().'/css/brown.css');
		}
    
    if (get_option('restimpo_css') == 'Forest' ){
			wp_enqueue_style('restimpo-style-forest', get_template_directory_uri().'/css/forest.css');
		}
    
    if (get_option('restimpo_css') == 'Lime' ){
			wp_enqueue_style('restimpo-style-lime', get_template_directory_uri().'/css/lime.css');
		}

		if (get_option('restimpo_css') == 'Orange' ){
			wp_enqueue_style('restimpo-style-orange', get_template_directory_uri().'/css/orange.css');
		}

		if (get_option('restimpo_css') == 'Pink' ){
			wp_enqueue_style('restimpo-style-pink', get_template_directory_uri().'/css/pink.css');
		}
    
    if (get_option('restimpo_css') == 'Purple' ){
			wp_enqueue_style('restimpo-style-purple', get_template_directory_uri().'/css/purple.css');
		}

		if (get_option('restimpo_css') == 'Red' ){
			wp_enqueue_style('restimpo-style-red', get_template_directory_uri().'/css/red.css');
		}
    
    if (get_option('restimpo_css') == 'Tan' ){
			wp_enqueue_style('restimpo-style-tan', get_template_directory_uri().'/css/tan.css');
		}
}
add_action( 'wp_enqueue_scripts', 'restimpo_css_include' );

//social scripts
if(	!is_admin() && ($restimpo_share_buttons_page == '' || $restimpo_share_buttons_page == 'Display' || $restimpo_share_buttons_post == '' || $restimpo_share_buttons_post == 'Display' || $restimpo_share_buttons_post_entry == '' || $restimpo_share_buttons_post_entry == 'Display' || $restimpo_share_buttons_products == '' || $restimpo_share_buttons_products == 'Display') ) {

function restimpo_scripts_social() {
$share_buttons_language = get_option('restimpo_share_buttons_language') . '/all.js#xfbml=1';
$share_buttons_language_url = "http://connect.facebook.net/";
$share_buttons_language_full_url = $share_buttons_language_url.$share_buttons_language;
	// Register all javascript files
	wp_enqueue_script('restimpo_js_google', 'http://apis.google.com/js/plusone.js', '', '', 'footer');
  if ( get_option('restimpo_share_buttons_language') != '' ) {
	wp_enqueue_script('restimpo_js_facebook', $share_buttons_language_full_url, '', '', 'footer'); } else {
  wp_enqueue_script('restimpo_js_facebook', 'http://connect.facebook.net/en_US/all.js#xfbml=1', '', '', 'footer'); }
	wp_enqueue_script('restimpo_js_twitter', 'http://platform.twitter.com/widgets.js', '', '', 'footer');
	}   
add_action('wp_enqueue_scripts', 'restimpo_scripts_social');	
}

// Background color - Entry headlines
function restimpo_background_color() {
    $background_color = get_background_color(); 
		if ($background_color != '') { ?>
		<?php _e('#wrapper .entry-headline .entry-headline-text { background-color: #'); ?><?php echo $background_color ?><?php _e(';}'); ?>
<?php } 
}

// Display sidebar
function restimpo_display_sidebar() {
    $display_sidebar = get_option('restimpo_display_sidebar'); 
		if ($display_sidebar == 'Hide') { ?>
		<?php _e('#wrapper .container #main-content { width: 100%; }'); ?>
<?php } 
}

// Display Breadcrumb Navigation - headline width
function restimpo_display_breadcrumb_headline() {
    $display_breadcrumb = get_option('restimpo_display_breadcrumb'); 
		if ($display_breadcrumb == 'Hide' || !function_exists( 'bcn_display' )) { ?>
		<?php _e('#wrapper .content-headline h1 { width: 100%; }'); ?>
<?php } 
}

// Title Box width
function restimpo_get_page_title_width() {
    $page_title_width = get_option('restimpo_page_title_width'); 
		if ($page_title_width != '' && $page_title_width != '50%') { ?>
		<?php _e('#wrapper #wrapper-header .title-box { width: '); ?><?php echo $page_title_width ?><?php _e(';}'); ?>
<?php } 
}

// Menu Box width
function restimpo_get_header_menu_width() {
    $header_menu_width = get_option('restimpo_header_menu_width'); 
		if ($header_menu_width != '' && $header_menu_width != '50%') { ?>
		<?php _e('#wrapper #wrapper-header .menu-box { width: '); ?><?php echo $header_menu_width ?><?php _e(';}'); ?>
<?php } 
}

// Slideshow Height
function restimpo_get_slider_height() {
    $slider_height = get_option('restimpo_slider_height'); 
		if ($slider_height != '') { ?>
		<?php _e('#wrapper #wrapper-header .flexslider, #wrapper #wrapper-header .flexslider .slides li { height: '); ?><?php echo $slider_height ?><?php _e('px; }'); ?>
<?php } 
}

// Social Networks Links background color
function restimpo_get_social_icons_background_color() {
    $social_icons_background_color = get_option('restimpo_social_icons_background_color'); 
		if ($social_icons_background_color != '#' && $social_icons_background_color != '') { ?>
		<?php _e('#wrapper #wrapper-header .social-icon { background-color: '); ?><?php echo $social_icons_background_color ?><?php _e('; }'); ?>
<?php } 
}

// Top Menu background color
function restimpo_get_top_menu_background_color() {
    $top_menu_background_color = get_option('restimpo_top_menu_background_color'); 
		if ($top_menu_background_color != '#' && $top_menu_background_color != '') { ?>
		<?php _e('#wrapper .top-navigation-wrapper { background-color: '); ?><?php echo $top_menu_background_color ?><?php _e('; }'); ?>
<?php } 
}

// Top Menu border-bottom color
function restimpo_get_top_menu_border_color() {
    $top_menu_border_color = get_option('restimpo_top_menu_border_color'); 
		if ($top_menu_border_color != '#' && $top_menu_border_color != '') { ?>
		<?php _e('#wrapper .top-navigation-wrapper { border-color: '); ?><?php echo $top_menu_border_color ?><?php _e('; }'); ?>
<?php } 
}

// Top Menu drop-down submenus background color
function restimpo_get_top_submenu_background_color() {
    $top_submenu_background_color = get_option('restimpo_top_submenu_background_color'); 
		if ($top_submenu_background_color != '#' && $top_submenu_background_color != '') { ?>
		<?php _e('#wrapper .top-navigation ul ul { background-color: '); ?><?php echo $top_submenu_background_color ?><?php _e('; }'); ?>
<?php } 
}

// Top Menu drop-down submenus border color
function restimpo_get_top_submenu_border_color() {
    $top_submenu_border_color = get_option('restimpo_top_submenu_border_color'); 
		if ($top_submenu_border_color != '#' && $top_submenu_border_color != '') { ?>
		<?php _e('#wrapper .top-navigation ul ul, #wrapper #top-navigation ul ul li { border-color: '); ?><?php echo $top_submenu_border_color ?><?php _e('; }'); ?>
<?php } 
}

// Top Menu drop-down submenus hover color
function restimpo_get_top_submenu_hover_color() {
    $top_submenu_hover_color = get_option('restimpo_top_submenu_hover_color'); 
		if ($top_submenu_hover_color != '#' && $top_submenu_hover_color != '') { ?>
		<?php _e('html #wrapper #wrapper-header .top-navigation ul ul a:hover, html #wrapper #wrapper-header .top-navigation ul ul :hover > a { background-color: '); ?><?php echo $top_submenu_hover_color ?><?php _e(' !important; }'); ?>
<?php } 
}

// Main Menu drop-down submenus background color
function restimpo_get_main_submenu_background_color() {
    $main_submenu_background_color = get_option('restimpo_main_submenu_background_color'); 
		if ($main_submenu_background_color != '#' && $main_submenu_background_color != '') { ?>
		<?php _e('#wrapper .menu-box ul ul { background-color: '); ?><?php echo $main_submenu_background_color ?><?php _e('; }'); ?>
<?php } 
}

// Main Menu drop-down submenus border color
function restimpo_get_main_submenu_border_color() {
    $main_submenu_border_color = get_option('restimpo_main_submenu_border_color'); 
		if ($main_submenu_border_color != '#' && $main_submenu_border_color != '') { ?>
		<?php _e('#wrapper #wrapper-header .menu-box ul ul { border-color: '); ?><?php echo $main_submenu_border_color ?><?php _e('; }'); ?>
<?php } 
}

// Main Menu drop-down submenus hover color
function restimpo_get_main_submenu_hover_color() {
    $main_submenu_hover_color = get_option('restimpo_main_submenu_hover_color'); 
		if ($main_submenu_hover_color != '#' && $main_submenu_hover_color != '') { ?>
		<?php _e('html #wrapper #wrapper-header .menu-box ul ul a:hover, html #wrapper #wrapper-header .menu-box ul ul :hover > a { background-color: '); ?><?php echo $main_submenu_hover_color ?><?php _e(' !important; }'); ?>
<?php } 
}

// Header Content background color
function restimpo_get_header_content_background_color() {
    $header_content_background_color = get_option('restimpo_header_content_background_color'); 
		if ($header_content_background_color != '#' && $header_content_background_color != '') { ?>
		<?php _e('#wrapper #wrapper-header .header-content-wrapper { background-color: '); ?><?php echo $header_content_background_color ?><?php _e('; }'); ?>
<?php } 
}

// Site Description box background color
function restimpo_get_site_description_background_color() {
    $site_description_background_color = get_option('restimpo_site_description_background_color'); 
		if ($site_description_background_color != '#' && $site_description_background_color != '') { ?>
		<?php _e('#wrapper #wrapper-header .header-description-wrapper { background-color: '); ?><?php echo $site_description_background_color ?><?php _e('; }'); ?>
<?php } 
}

// Site Description box border color
function restimpo_get_site_description_border_color() {
    $site_description_border_color = get_option('restimpo_site_description_border_color'); 
		if ($site_description_border_color != '#' && $site_description_border_color != '') { ?>
		<?php _e('#wrapper #wrapper-header .header-description-wrapper { border-color: '); ?><?php echo $site_description_border_color ?><?php _e('; }'); ?>
<?php } 
}

// Page/Post Main Headline box background color
function restimpo_get_main_headlines_background_color() {
    $main_headlines_background_color = get_option('restimpo_main_headlines_background_color'); 
		if ($main_headlines_background_color != '#' && $main_headlines_background_color != '') { ?>
		<?php _e('#wrapper #wrapper-content .content-headline-wrapper { background-color: '); ?><?php echo $main_headlines_background_color ?><?php _e('; }'); ?>
<?php } 
}

// Page/Post Main Headline box border color
function restimpo_get_main_headlines_border_color() {
    $main_headlines_border_color = get_option('restimpo_main_headlines_border_color'); 
		if ($main_headlines_border_color != '#' && $main_headlines_border_color != '') { ?>
		<?php _e('#wrapper #wrapper-content .content-headline-wrapper { border-color: '); ?><?php echo $main_headlines_border_color ?><?php _e('; }'); ?>
<?php } 
}

// Post Author’s Comments background color
function restimpo_get_author_comments_background_color() {
    $author_comments_background_color = get_option('restimpo_author_comments_background_color'); 
		if ($author_comments_background_color != '#' && $author_comments_background_color != '') { ?>
		<?php _e('#wrapper #comments .bypostauthor { background-color: '); ?><?php echo $author_comments_background_color ?><?php _e('; }'); ?>
<?php } 
}

// Sticky Post background color
function restimpo_get_sticky_post_background_color() {
    $sticky_post_background_color = get_option('restimpo_sticky_post_background_color'); 
		if ($sticky_post_background_color != '#' && $sticky_post_background_color != '') { ?>
		<?php _e('#wrapper .container .sticky { background-color: '); ?><?php echo $sticky_post_background_color ?><?php _e('; }'); ?>
<?php } 
}

// Highlighted text background color
function restimpo_get_highlight_background_color() {
    $highlight_background_color = get_option('restimpo_highlight_background_color'); 
		if ($highlight_background_color != '#' && $highlight_background_color != '') { ?>
		<?php _e('#wrapper .container .highlight-text { background-color: '); ?><?php echo $highlight_background_color ?><?php _e('; }'); ?>
<?php } 
}

// RestImpo Info-Boxes Widgets Icons background color
function restimpo_get_infobox_icon_background_color() {
    $infobox_icon_background_color = get_option('restimpo_infobox_icon_background_color'); 
		if ($infobox_icon_background_color != '#' && $infobox_icon_background_color != '') { ?>
		<?php _e('#wrapper .info-box .info-box-icon { background-color: '); ?><?php echo $infobox_icon_background_color ?><?php _e(' !important; }'); ?>
<?php } 
}

// Sidebar Widget Headlines border color
function restimpo_get_sidebar_widget_border_color() {
    $sidebar_widget_border_color = get_option('restimpo_sidebar_widget_border_color'); 
		if ($sidebar_widget_border_color != '#' && $sidebar_widget_border_color != '') { ?>
		<?php _e('#wrapper .container #sidebar .sidebar-widget .sidebar-headline { border-color: '); ?><?php echo $sidebar_widget_border_color ?><?php _e('; }'); ?>
<?php } 
}

// Footer background color
function restimpo_get_footer_background_color() {
    $footer_background_color = get_option('restimpo_footer_background_color'); 
		if ($footer_background_color != '#' && $footer_background_color != '') { ?>
		<?php _e('html #wrapper #wrapper-footer { background-color: '); ?><?php echo $footer_background_color ?><?php _e('; }'); ?>
<?php } 
}

// Footer border-top color
function restimpo_get_footer_border_top_color() {
    $footer_border_top_color = get_option('restimpo_footer_border_top_color'); 
		if ($footer_border_top_color != '#' && $footer_border_top_color != '') { ?>
		<?php _e('html #wrapper #wrapper-footer { border-color: '); ?><?php echo $footer_border_top_color ?><?php _e('; }'); ?>
<?php } 
}

// Footer Widget Headlines border color
function restimpo_get_footer_widget_border_color() {
    $footer_widget_border_color = get_option('restimpo_footer_widget_border_color'); 
		if ($footer_widget_border_color != '#' && $footer_widget_border_color != '') { ?>
		<?php _e('#wrapper #wrapper-footer #footer .footer-widget .footer-headline { border-color: '); ?><?php echo $footer_widget_border_color ?><?php _e('; }'); ?>
<?php } 
}

// Footer Notices background color
function restimpo_get_footer_notices_background_color() {
    $footer_notices_background_color = get_option('restimpo_footer_notices_background_color'); 
		if ($footer_notices_background_color != '#' && $footer_notices_background_color != '') { ?>
		<?php _e('#wrapper #wrapper-footer .footer-signature { background-color: '); ?><?php echo $footer_notices_background_color ?><?php _e('; }'); ?>
<?php } 
}

// Footer Notices border-top color
function restimpo_get_footer_notices_border_color() {
    $footer_notices_border_color = get_option('restimpo_footer_notices_border_color'); 
		if ($footer_notices_border_color != '#' && $footer_notices_border_color != '') { ?>
		<?php _e('#wrapper #wrapper-footer .footer-signature { border-color: '); ?><?php echo $footer_notices_border_color ?><?php _e('; }'); ?>
<?php } 
}

// Searchform border color
function restimpo_get_searchform_border_color() {
    $searchform_border_color = get_option('restimpo_searchform_border_color'); 
		if ($searchform_border_color != '#' && $searchform_border_color != '') { ?>
		<?php _e('html #wrapper #searchform .searchform-wrapper #s { border-color: '); ?><?php echo $searchform_border_color ?><?php _e(' !important; }'); ?>
<?php } 
}

// Search Button background color
function restimpo_get_searchform_button_background_color() {
    $searchform_button_background_color = get_option('restimpo_searchform_button_background_color'); 
		if ($searchform_button_background_color != '#' && $searchform_button_background_color != '') { ?>
		<?php _e('#wrapper #searchform .searchform-wrapper .send { background-color: '); ?><?php echo $searchform_button_background_color ?><?php _e('; }'); ?>
<?php } 
}

// Search Button hover color
function restimpo_get_searchform_button_hover_color() {
    $searchform_button_hover_color = get_option('restimpo_searchform_button_hover_color'); 
		if ($searchform_button_hover_color != '#' && $searchform_button_hover_color != '') { ?>
		<?php _e('#wrapper #searchform .searchform-wrapper .send:hover { background-color: '); ?><?php echo $searchform_button_hover_color ?><?php _e('; }'); ?>
<?php } 
}

// Form Fields background color
function restimpo_get_form_fields_background_color() {
    $form_fields_background_color = get_option('restimpo_form_fields_background_color'); 
		if ($form_fields_background_color != '#' && $form_fields_background_color != '') { ?>
		<?php _e('#searchform .searchform-wrapper #s, #wrapper input[type="text"], #wrapper input[type="file"], #wrapper input[type="password"], #wrapper input[type="number"], #wrapper input[type="search"], #wrapper input[type="email"], #wrapper input[type="url"], #wrapper textarea, #wrapper select { background-color: '); ?><?php echo $form_fields_background_color ?><?php _e(' !important; }'); ?>
<?php } 
}

// Form Fields border color
function restimpo_get_form_fields_border_color() {
    $form_fields_border_color = get_option('restimpo_form_fields_border_color'); 
		if ($form_fields_border_color != '#' && $form_fields_border_color != '') { ?>
		<?php _e('body #searchform .searchform-wrapper #s, #wrapper input[type="text"], #wrapper input[type="file"], #wrapper input[type="password"], #wrapper input[type="number"], #wrapper input[type="search"], #wrapper input[type="email"], #wrapper input[type="url"], #wrapper textarea, #wrapper select { border-color: '); ?><?php echo $form_fields_border_color ?><?php _e('; }'); ?>
<?php } 
}

// Buttons background color
function restimpo_get_form_buttons_background_color() {
    $form_buttons_background_color = get_option('restimpo_form_buttons_background_color'); 
		if ($form_buttons_background_color != '#' && $form_buttons_background_color != '') { ?>
		<?php _e('#wrapper input[type="submit"], #wrapper input[type="reset"], #wrapper .custom-button, #wrapper .info-box .info-box-more, html #wrapper .container .panel-row-style-restimpo .origin-widget-button a, #wrapper .header-image .header-image-text .header-image-link, #wrapper .header-slider-more { background: '); ?><?php echo $form_buttons_background_color ?><?php _e(' !important; }'); ?>
<?php } 
}

// Buttons hover color
function restimpo_get_form_buttons_hover_color() {
    $form_buttons_hover_color = get_option('restimpo_form_buttons_hover_color'); 
		if ($form_buttons_hover_color != '#' && $form_buttons_hover_color != '') { ?>
		<?php _e('#wrapper input[type="submit"]:hover, #wrapper input[type="reset"]:hover, #wrapper .custom-button:hover, #wrapper .info-box .info-box-more:hover, html #wrapper .container .panel-row-style-restimpo .origin-widget-button a:hover, #wrapper .header-image .header-image-text .header-image-link:hover, #wrapper .header-slider-more:hover { background: '); ?><?php echo $form_buttons_hover_color ?><?php _e(' !important; }'); ?>
<?php } 
}

// Buttons border color
function restimpo_get_form_buttons_border_color() {
    $form_buttons_border_color = get_option('restimpo_form_buttons_border_color'); 
		if ($form_buttons_border_color != '#' && $form_buttons_border_color != '') { ?>
		<?php _e('#wrapper input[type="submit"], #wrapper input[type="reset"], #wrapper .custom-button, #wrapper .info-box .info-box-more, html #wrapper .container .panel-row-style-restimpo .origin-widget-button a, #wrapper .header-image .header-image-text .header-image-link, #wrapper .header-slider-more { border-color: '); ?><?php echo $form_buttons_border_color ?><?php _e(' !important; }'); ?>
<?php } 
}

// Table Headers background color
function restimpo_get_table_headers_background_color() {
    $table_headers_background_color = get_option('restimpo_table_headers_background_color'); 
		if ($table_headers_background_color != '#' && $table_headers_background_color != '') { ?>
		<?php _e('#wrapper table th { background-color: '); ?><?php echo $table_headers_background_color ?><?php _e('; }'); ?>
<?php } 
}

// TEXT COLORS AND FONTS
// Body font and color
function restimpo_get_body_font() {
    $bodyfont = get_option('restimpo_body_google_fonts');
    $body_color = get_option('restimpo_body_color'); 
		if ($bodyfont != 'default' && $body_color != '#' && $bodyfont != '') { ?>
		<?php _e('html body, #wrapper blockquote, #wrapper q, #wrapper .container #comments .comment, #wrapper .container #comments .comment time, #wrapper .container #commentform .form-allowed-tags, #wrapper .container #commentform p, #wrapper input, #wrapper button, #wrapper select { font-family: "'); ?><?php echo $bodyfont ?><?php _e('", Arial, Helvetica, sans-serif; color: '); ?><?php echo $body_color ?><?php _e('; }'); }
    elseif ($bodyfont != 'default' && $body_color == '#') { ?>
    <?php _e('html body, #wrapper blockquote, #wrapper q, #wrapper .container #comments .comment, #wrapper .container #comments .comment time, #wrapper .container #commentform .form-allowed-tags, #wrapper .container #commentform p, #wrapper input, #wrapper button, #wrapper select { font-family: "'); ?><?php echo $bodyfont ?><?php _e('", Arial, Helvetica, sans-serif; }'); }
    elseif ($bodyfont == 'default' && $body_color != '#') { ?>
    <?php _e('html body, #wrapper blockquote, #wrapper q, #wrapper .container #comments .comment, #wrapper .container #comments .comment time, #wrapper .container #commentform .form-allowed-tags, #wrapper .container #commentform p, #wrapper input, #wrapper button, #wrapper select { color: '); ?><?php echo $body_color ?><?php _e('; }'); ?>
<?php } 
}

// Main Content area font size
function restimpo_get_body_google_fonts_size() {
    $body_google_fonts_size = get_option('restimpo_body_google_fonts_size'); 
		if ($body_google_fonts_size != '13' && $body_google_fonts_size != '') { ?>
		<?php _e('body p, body ul, body ol, body li, body dl, body address, body table { font-size: '); ?><?php echo $body_google_fonts_size ?><?php _e('px; }'); ?>
<?php } 
}

// Site title font
function restimpo_get_headings_google_fonts() {
    $headingfont = get_option('restimpo_headings_google_fonts'); 
		if ($headingfont != 'default' && $headingfont != '') { ?>
		<?php _e('#wrapper #wrapper-header .site-title { font-family: "'); ?><?php echo $headingfont ?><?php _e('", Arial, Helvetica, sans-serif; }'); ?>
<?php } 
}

// Site title font size
function restimpo_get_headings_google_fonts_size() {
    $headingfont_size = get_option('restimpo_headings_google_fonts_size'); 
		if ($headingfont_size != '37' && $headingfont_size != '') { ?>
		<?php _e('#wrapper #wrapper-header .site-title { font-size: '); ?><?php echo $headingfont_size ?><?php _e('px; }'); ?>
<?php } 
}

// Site title color
function restimpo_get_site_title_color() {
    $site_title_color = get_option('restimpo_site_title_color'); 
		if ($site_title_color != '#' && $site_title_color != '') { ?>
		<?php _e('#wrapper #wrapper-header .site-title a { color: '); ?><?php echo $site_title_color ?><?php _e('; }'); ?>
<?php } 
}

// Site title hover color
function restimpo_get_site_title_hover_color() {
    $site_title_hover_color = get_option('restimpo_site_title_hover_color'); 
		if ($site_title_hover_color != '#' && $site_title_hover_color != '') { ?>
		<?php _e('#wrapper #wrapper-header .site-title a:hover { color: '); ?><?php echo $site_title_hover_color ?><?php _e('; }'); ?>
<?php } 
}

// Site description font and color
function restimpo_get_description_font() {
    $descriptionfont = get_option('restimpo_description_google_fonts');
    $site_description_color = get_option('restimpo_site_description_color'); 
		if ($descriptionfont != 'default' && $site_description_color != '#' && $descriptionfont != '') { ?>
		<?php _e('#wrapper #wrapper-header .header-description h1 {font-family: "'); ?><?php echo $descriptionfont ?><?php _e('", Arial, Helvetica, sans-serif; color: '); ?><?php echo $site_description_color ?><?php _e('; }'); }
    elseif ($descriptionfont != 'default' && $site_description_color == '#') { ?>
    <?php _e('#wrapper #wrapper-header .header-description h1 {font-family: "'); ?><?php echo $descriptionfont ?><?php _e('", Arial, Helvetica, sans-serif; }'); }
    elseif ($descriptionfont == 'default' && $site_description_color != '#') { ?>
    <?php _e('#wrapper #wrapper-header .header-description h1 { color: '); ?><?php echo $site_description_color ?><?php _e('; }'); ?>
<?php } 
}

// Site description font size
function restimpo_get_description_font_size() {
    $descriptionfont_size = get_option('restimpo_description_google_fonts_size'); 
		if ($descriptionfont_size != '32' && $descriptionfont_size != '') { ?>
		<?php _e('#wrapper #wrapper-header .header-description h1 { font-size: '); ?><?php echo $descriptionfont_size ?><?php _e('px; }'); ?>
<?php } 
}

// Homepage Header Image Headline color
function restimpo_get_header_image_headline_color() {
    $header_image_headline_color = get_option('restimpo_header_image_headline_color'); 
		if ($header_image_headline_color != '#' && $header_image_headline_color != '') { ?>
		<?php _e('#wrapper #wrapper-header .header-image .header-image-text .header-image-headline, #wrapper #wrapper-header .flexslider .slides li .header-slider-link { color: '); ?><?php echo $header_image_headline_color ?><?php _e('; }'); ?>
<?php } 
}

// Page/post main headlines color
function restimpo_get_main_headlines_color() {
    $main_headlines_color = get_option('restimpo_main_headlines_color'); 
		if ($main_headlines_color != '#' && $main_headlines_color != '') { ?>
		<?php _e('#wrapper .content-headline-wrapper .content-headline h1 { color: '); ?><?php echo $main_headlines_color ?><?php _e('; }'); ?>
<?php } 
}

// Page/post headlines font and color
function restimpo_get_headlines_font() {
    $headlinefont = get_option('restimpo_headline_google_fonts');
    $headlines_color = get_option('restimpo_headlines_color'); 
		if ($headlinefont != 'default' && $headlines_color != '#' && $headlinefont != '') { ?>
		<?php _e('#wrapper h1, #wrapper h2, #wrapper h3, #wrapper h4, #wrapper h5, #wrapper h6, #wrapper .container .navigation .section-heading { font-family: "'); ?><?php echo $headlinefont ?><?php _e('", Arial, Helvetica, sans-serif; color: '); ?><?php echo $headlines_color ?><?php _e('; }'); }
    elseif ($headlinefont != 'default' && $headlines_color == '#') { ?>
		<?php _e('#wrapper h1, #wrapper h2, #wrapper h3, #wrapper h4, #wrapper h5, #wrapper h6, #wrapper .container .navigation .section-heading { font-family: "'); ?><?php echo $headlinefont ?><?php _e('", Arial, Helvetica, sans-serif; }'); } 
    elseif ($headlinefont == 'default' && $headlines_color != '#') { ?>
		<?php _e('#wrapper h1, #wrapper h2, #wrapper h3, #wrapper h4, #wrapper h5, #wrapper h6, #wrapper .container .navigation .section-heading { color: '); ?><?php echo $headlines_color ?><?php _e('; }');?>
<?php } 
}

// H1 Headlines font size
function restimpo_get_headline_h1_size() {
    $headline_h1_size = get_option('restimpo_headline_h1_size'); 
		if ($headline_h1_size != '28' && $headline_h1_size != '') { ?>
		<?php _e('#wrapper h1 { font-size: '); ?><?php echo $headline_h1_size ?><?php _e('px; }'); ?>
<?php } 
}

// H2 Headlines font size
function restimpo_get_headline_h2_size() {
    $headline_h2_size = get_option('restimpo_headline_h2_size'); 
		if ($headline_h2_size != '24' && $headline_h2_size != '') { ?>
		<?php _e('#wrapper h2 { font-size: '); ?><?php echo $headline_h2_size ?><?php _e('px; }'); ?>
<?php } 
}

// H3 Headlines font size
function restimpo_get_headline_h3_size() {
    $headline_h3_size = get_option('restimpo_headline_h3_size'); 
		if ($headline_h3_size != '20' && $headline_h3_size != '') { ?>
		<?php _e('#wrapper h3 { font-size: '); ?><?php echo $headline_h3_size ?><?php _e('px; }'); ?>
<?php } 
}

// H4 Headlines font size
function restimpo_get_headline_h4_size() {
    $headline_h4_size = get_option('restimpo_headline_h4_size'); 
		if ($headline_h4_size != '16' && $headline_h4_size != '') { ?>
		<?php _e('#wrapper h4 { font-size: '); ?><?php echo $headline_h4_size ?><?php _e('px; }'); ?>
<?php } 
}

// H5 Headlines font size
function restimpo_get_headline_h5_size() {
    $headline_h5_size = get_option('restimpo_headline_h5_size'); 
		if ($headline_h5_size != '14' && $headline_h5_size != '') { ?>
		<?php _e('#wrapper h5 { font-size: '); ?><?php echo $headline_h5_size ?><?php _e('px; }'); ?>
<?php } 
}

// H6 Headlines font size
function restimpo_get_headline_h6_size() {
    $headline_h6_size = get_option('restimpo_headline_h6_size'); 
		if ($headline_h6_size != '13' && $headline_h6_size != '') { ?>
		<?php _e('#wrapper h6 { font-size: '); ?><?php echo $headline_h6_size ?><?php _e('px; }'); ?>
<?php } 
}

// RestImpo Posts Widgets headlines font
function restimpo_get_headline_box_google_fonts() {
    $headline_box_google_fonts = get_option('restimpo_headline_box_google_fonts'); 
		if ($headline_box_google_fonts != 'default' && $headline_box_google_fonts != '') { ?>
		<?php _e('#wrapper .container #main-content section .entry-headline { font-family: "'); ?><?php echo $headline_box_google_fonts ?><?php _e('", Arial, Helvetica, sans-serif; }'); ?>
<?php } 
}

// RestImpo Posts Widgets headlines color
function restimpo_get_homepage_headlines_color() {
    $homepage_headlines_color = get_option('restimpo_homepage_headlines_color'); 
		if ($homepage_headlines_color != '#' && $homepage_headlines_color != '') { ?>
		<?php _e('#wrapper .container #main-content section .entry-headline { color: '); ?><?php echo $homepage_headlines_color ?><?php _e('; }'); ?>
<?php } 
}

// RestImpo Posts Widgets headlines font size
function restimpo_get_headline_box_google_fonts_size() {
    $headline_box_google_fonts_size = get_option('restimpo_headline_box_google_fonts_size'); 
		if ($headline_box_google_fonts_size != '27' && $headline_box_google_fonts_size != '') { ?>
		<?php _e('#wrapper .container #main-content section .entry-headline { font-size: '); ?><?php echo $headline_box_google_fonts_size ?><?php _e('px; }'); ?>
<?php } 
}

// Post entry font
function restimpo_get_postentry_font() {
    $postentryfont = get_option('restimpo_postentry_google_fonts'); 
		if ($postentryfont != 'default' && $postentryfont != '') { ?>
		<?php _e('#wrapper #main-content .post-entry .post-entry-headline, #wrapper #main-content .slides li, #wrapper #main-content .home-list-posts ul li, #wrapper #main-content .home-thumbnail-posts .thumbnail-hover { font-family: "'); ?><?php echo $postentryfont ?><?php _e('", Arial, Helvetica, sans-serif; }'); ?>
<?php } 
}

// Post entry font size
function restimpo_get_postentry_font_size() {
    $postentryfont_size = get_option('restimpo_postentry_google_fonts_size'); 
		if ($postentryfont_size != '23' && $postentryfont_size != '') { ?>
		<?php _e('#wrapper #main-content .post-entry .post-entry-headline { font-size: '); ?><?php echo $postentryfont_size ?><?php _e('px; }'); ?>
<?php } 
}

// Post entry color
function restimpo_get_postentry_color() {
    $post_entry_color = get_option('restimpo_post_entry_color'); 
		if ($post_entry_color != '#' && $post_entry_color != '') { ?>
		<?php _e('#wrapper #main-content .post-entry .post-entry-headline a, #wrapper #main-content .slides li a, #wrapper #main-content .home-list-posts ul li a { color: '); ?><?php echo $post_entry_color ?><?php _e('; }'); ?>
<?php } 
}  

// Post entry hover color
function restimpo_get_postentry_hover_color() {
    $post_entry_hover_color = get_option('restimpo_post_entry_hover_color'); 
		if ($post_entry_hover_color != '#' && $post_entry_hover_color != '') { ?>
		<?php _e('#wrapper #main-content .post-entry .post-entry-headline a:hover, #wrapper #main-content .slides li a:hover, #wrapper #main-content .home-list-posts ul li a:hover { color: '); ?><?php echo $post_entry_hover_color ?><?php _e(' !important; }'); ?>
<?php } 
} 

// Sidebar widget headlines font and color
function restimpo_get_sidebar_widget_font() {
    $sidebarfont = get_option('restimpo_sidebar_google_fonts');
    $sidebar_widget_color = get_option('restimpo_sidebar_widget_color');
		if ($sidebarfont != 'default' && $sidebar_widget_color != '#' && $sidebarfont != '') { ?>
		<?php _e('#wrapper .container #sidebar .sidebar-widget .sidebar-headline { font-family: "'); ?><?php echo $sidebarfont ?><?php _e('", Arial, Helvetica, sans-serif; color: '); ?><?php echo $sidebar_widget_color ?><?php _e('; }'); }
    elseif ($sidebarfont != 'default' && $sidebar_widget_color == '#') { ?>
		<?php _e('#wrapper .container #sidebar .sidebar-widget .sidebar-headline { font-family: "'); ?><?php echo $sidebarfont ?><?php _e('", Arial, Helvetica, sans-serif; }'); }
    elseif ($sidebarfont == 'default' && $sidebar_widget_color != '#') { ?>
		<?php _e('#wrapper .container #sidebar .sidebar-widget .sidebar-headline { color: '); ?><?php echo $sidebar_widget_color ?><?php _e('; }'); ?>
<?php } 
}

// Sidebar widget headlines font size
function restimpo_get_sidebar_widget_font_size() {
    $sidebarfont_size = get_option('restimpo_sidebar_google_fonts_size'); 
		if ($sidebarfont_size != '18' && $sidebarfont_size != '') { ?>
		<?php _e('#wrapper .container #sidebar .sidebar-widget .sidebar-headline { font-size: '); ?><?php echo $sidebarfont_size ?><?php _e('px; }'); ?>
<?php } 
}

// Sidebar Text color
function restimpo_get_sidebar_text_color() {
    $sidebar_text_color = get_option('restimpo_sidebar_text_color'); 
		if ($sidebar_text_color != '#' && $sidebar_text_color != '') { ?>
		<?php _e('#wrapper .container #sidebar .sidebar-widget p, #wrapper .container #sidebar .sidebar-widget ul li, #wrapper .container #sidebar .sidebar-widget ol li, #wrapper .container #sidebar .sidebar-widget table { color: '); ?><?php echo $sidebar_text_color ?><?php _e('; }'); ?>
<?php } 
}

// Footer widget headlines font and color
function restimpo_get_footer_widget_font() {
    $sidebarfont = get_option('restimpo_sidebar_google_fonts');
    $footer_widget_color = get_option('restimpo_footer_widget_color');
		if ($sidebarfont != 'default' && $footer_widget_color != '#' && $sidebarfont != '') { ?>
		<?php _e('#wrapper #wrapper-footer #footer .footer-widget .footer-headline { font-family: "'); ?><?php echo $sidebarfont ?><?php _e('", Arial, Helvetica, sans-serif; color: '); ?><?php echo $footer_widget_color ?><?php _e('; }'); }
    elseif ($sidebarfont != 'default' && $footer_widget_color == '#') { ?>
		<?php _e('#wrapper #wrapper-footer #footer .footer-widget .footer-headline { font-family: "'); ?><?php echo $sidebarfont ?><?php _e('", Arial, Helvetica, sans-serif; }'); }
    elseif ($sidebarfont == 'default' && $footer_widget_color != '#') { ?>
		<?php _e('#wrapper #wrapper-footer #footer .footer-widget .footer-headline { color: '); ?><?php echo $footer_widget_color ?><?php _e('; }'); ?>
<?php } 
}

// Footer widget headlines font size
function restimpo_get_footer_widget_font_size() {
    $footerfont_size = get_option('restimpo_footer_google_fonts_size'); 
		if ($footerfont_size != '19' && $footerfont_size != '') { ?>
		<?php _e('#wrapper #wrapper-footer #footer .footer-widget .footer-headline { font-size: '); ?><?php echo $footerfont_size ?><?php _e('px; }'); ?>
<?php } 
}

// Footer Text color
function restimpo_get_footer_text_color() {
    $footer_text_color = get_option('restimpo_footer_text_color'); 
		if ($footer_text_color != '#' && $footer_text_color != '') { ?>
		<?php _e('#wrapper #footer .footer-widget p, #wrapper #footer .footer-widget ul li, #wrapper #footer .footer-widget ol li, #wrapper #footer .footer-widget table, #wrapper .footer-signature .footer-signature-content p { color: '); ?><?php echo $footer_text_color ?><?php _e('; }'); ?>
<?php } 
}

// Main content links color
function restimpo_get_content_links_color() {
    $content_links_color = get_option('restimpo_content_links_color'); 
		if ($content_links_color != '#' && $content_links_color != '') { ?>
		<?php _e('#wrapper #main-content a { color: '); ?><?php echo $content_links_color ?><?php _e('; }'); ?>
<?php } 
}

// Sidebar links color
function restimpo_get_sidebar_links_color() {
    $sidebar_links_color = get_option('restimpo_sidebar_links_color'); 
		if ($sidebar_links_color != '#' && $sidebar_links_color != '') { ?>
		<?php _e('#wrapper .container #sidebar a { color: '); ?><?php echo $sidebar_links_color ?><?php _e('; }'); ?>
<?php } 
}

// Footer links color
function restimpo_get_footer_links_color() {
    $footer_links_color = get_option('restimpo_footer_links_color'); 
		if ($footer_links_color != '#' && $footer_links_color != '') { ?>
		<?php _e('#wrapper #wrapper-footer #footer a, #wrapper #wrapper-footer .footer-signature .footer-signature-content a { color: '); ?><?php echo $footer_links_color ?><?php _e('; }'); ?>
<?php } 
}

// Main Header menu links color
function restimpo_get_main_header_menu_color() {
    $main_header_menu_color = get_option('restimpo_main_header_menu_color'); 
		if ($main_header_menu_color != '#' && $main_header_menu_color != '') { ?>
		<?php _e('#wrapper #wrapper-header .menu-box a, #wrapper #wrapper-header .menu-box a:visited { color: '); ?><?php echo $main_header_menu_color ?><?php _e('; }'); ?>
<?php } 
}

// Main Header menu links hover color
function restimpo_get_main_header_menu_hover_color() {
    $main_header_menu_hover_color = get_option('restimpo_main_header_menu_hover_color'); 
		if ($main_header_menu_hover_color != '#' && $main_header_menu_hover_color != '') { ?>
		<?php _e('#wrapper #wrapper-header .menu-box a:hover, #wrapper #wrapper-header .menu-box :hover > a { color: '); ?><?php echo $main_header_menu_hover_color ?><?php _e('; }'); ?>
<?php } 
}

// Active Main Header menu links color
function restimpo_get_active_main_header_menu_color() {
    $active_main_header_menu_color = get_option('restimpo_active_main_header_menu_color');
    if ($active_main_header_menu_color != '#' && $active_main_header_menu_color != '') { ?>
		<?php _e('html #wrapper #wrapper-header .menu-box .current-menu-item > a, html #wrapper #wrapper-header .menu-box .current-menu-ancestor > a, html #wrapper #wrapper-header .menu-box .current_page_item > a, html #wrapper #wrapper-header .menu-box .current-page-ancestor > a { color: '); ?><?php echo $active_main_header_menu_color ?><?php _e('; }'); ?>
<?php } 
}

// Active Main Header menu links border color
function restimpo_get_active_main_header_menu_border_color() {
    $active_main_header_menu_border_color = get_option('restimpo_active_main_header_menu_border_color');
    if ($active_main_header_menu_border_color != '#' && $active_main_header_menu_border_color != '') { ?>
		<?php _e('html #wrapper #wrapper-header .menu-box .current-menu-item > a, html #wrapper #wrapper-header .menu-box .current-menu-ancestor > a, html #wrapper #wrapper-header .menu-box .current_page_item > a, html #wrapper #wrapper-header .menu-box .current-page-ancestor > a { border-color: '); ?><?php echo $active_main_header_menu_border_color ?><?php _e('; }'); ?>
<?php } 
}

// Top Header menu links color
function restimpo_get_top_header_menu_color() {
    $top_header_menu_color = get_option('restimpo_top_header_menu_color'); 
		if ($top_header_menu_color != '#' && $top_header_menu_color != '') { ?>
		<?php _e('#wrapper #wrapper-header .top-navigation a, #wrapper #wrapper-header .top-navigation a:visited { color: '); ?><?php echo $top_header_menu_color ?><?php _e('; }'); ?>
<?php } 
}

// Top Header menu links hover color
function restimpo_get_top_header_menu_hover_color() {
    $top_header_menu_hover_color = get_option('restimpo_top_header_menu_hover_color'); 
		if ($top_header_menu_hover_color != '#' && $top_header_menu_hover_color != '') { ?>
		<?php _e('#wrapper #wrapper-header .top-navigation a:hover, #wrapper #wrapper-header .top-navigation :hover > a { color: '); ?><?php echo $top_header_menu_hover_color ?><?php _e('; }'); ?>
<?php } 
}

// Active Top Header menu links color
function restimpo_get_active_top_header_menu_color() {
    $active_top_header_menu_color = get_option('restimpo_active_top_header_menu_color');
    if ($active_top_header_menu_color != '#' && $active_top_header_menu_color != '') { ?>
		<?php _e('html #wrapper #wrapper-header .top-navigation .current-menu-item > a, html #wrapper #wrapper-header .top-navigation .current-menu-ancestor > a, html #wrapper #wrapper-header .top-navigation .current_page_item > a, html #wrapper #wrapper-header .top-navigation .current-page-ancestor > a { color: '); ?><?php echo $active_top_header_menu_color ?><?php _e('; }'); ?>
<?php } 
}

// Main Header menu font
function restimpo_get_menu_font() {
    $menufont = get_option('restimpo_menu_google_fonts'); 
		if ($menufont != 'default' && $menufont != '') { ?>
		<?php _e('#wrapper #wrapper-header .menu-box ul li { font-family: "'); ?><?php echo $menufont ?><?php _e('", Arial, Helvetica, sans-serif; }'); ?>
<?php } 
}

// Main Header menu font size
function restimpo_get_menu_font_size() {
    $menufont_size = get_option('restimpo_menu_google_fonts_size'); 
		if ($menufont_size != '15' && $menufont_size != '') { ?>
		<?php _e('#wrapper #wrapper-header .menu-box ul li a { font-size: '); ?><?php echo $menufont_size ?><?php _e('px; }'); ?>
<?php } 
}

// Top Header menu font
function restimpo_get_top_menu_font() {
    $topmenufont = get_option('restimpo_top_menu_google_fonts'); 
		if ($topmenufont != 'default' && $topmenufont != '') { ?>
		<?php _e('#wrapper #wrapper-header .top-navigation ul li { font-family: "'); ?><?php echo $topmenufont ?><?php _e('", Arial, Helvetica, sans-serif; }'); ?>
<?php } 
}

// Top Header menu font size
function restimpo_get_top_menu_font_size() {
    $top_menufont_size = get_option('restimpo_top_menu_google_fonts_size'); 
		if ($top_menufont_size != '13' && $top_menufont_size != '') { ?>
		<?php _e('#wrapper #wrapper-header .top-navigation ul li a, html #wrapper #wrapper-header .top-navigation ul ul a { font-size: '); ?><?php echo $top_menufont_size ?><?php _e('px; }'); ?>
<?php } 
}

// User defined CSS.
function restimpo_get_own_css() {
    $own_css = get_option('restimpo_own_css'); 
		if ($own_css != '') { ?>
		<?php echo $own_css ?>
<?php } 
}

// Display custom CSS.
function restimpo_custom_styles() { ?>
<?php echo ("<style type='text/css'>"); ?>
<?php restimpo_get_own_css(); ?>
<?php restimpo_background_color(); ?>
<?php restimpo_display_sidebar(); ?>
<?php restimpo_display_breadcrumb_headline(); ?>
<?php restimpo_get_page_title_width(); ?>
<?php restimpo_get_header_menu_width(); ?>
<?php restimpo_get_slider_height(); ?>
<?php restimpo_get_social_icons_background_color(); ?>
<?php restimpo_get_top_menu_background_color(); ?>
<?php restimpo_get_top_menu_border_color(); ?>
<?php restimpo_get_top_submenu_background_color(); ?>
<?php restimpo_get_top_submenu_border_color(); ?>
<?php restimpo_get_top_submenu_hover_color(); ?>
<?php restimpo_get_main_submenu_background_color(); ?>
<?php restimpo_get_main_submenu_border_color(); ?>
<?php restimpo_get_main_submenu_hover_color(); ?>
<?php restimpo_get_header_content_background_color(); ?>
<?php restimpo_get_site_description_background_color(); ?>
<?php restimpo_get_site_description_border_color(); ?>
<?php restimpo_get_main_headlines_background_color(); ?>
<?php restimpo_get_main_headlines_border_color(); ?>
<?php restimpo_get_author_comments_background_color(); ?>
<?php restimpo_get_sticky_post_background_color(); ?>
<?php restimpo_get_highlight_background_color(); ?>
<?php restimpo_get_infobox_icon_background_color(); ?>
<?php restimpo_get_sidebar_widget_border_color(); ?>
<?php restimpo_get_footer_background_color(); ?>
<?php restimpo_get_footer_border_top_color(); ?>
<?php restimpo_get_footer_widget_border_color(); ?>
<?php restimpo_get_footer_notices_background_color(); ?>
<?php restimpo_get_footer_notices_border_color(); ?>
<?php restimpo_get_searchform_border_color(); ?>
<?php restimpo_get_searchform_button_background_color(); ?>
<?php restimpo_get_searchform_button_hover_color(); ?>
<?php restimpo_get_form_fields_background_color(); ?>
<?php restimpo_get_form_fields_border_color(); ?>
<?php restimpo_get_form_buttons_background_color(); ?>
<?php restimpo_get_form_buttons_hover_color(); ?>
<?php restimpo_get_form_buttons_border_color(); ?>
<?php restimpo_get_table_headers_background_color(); ?>
<?php restimpo_get_body_font(); ?>
<?php restimpo_get_body_google_fonts_size(); ?>
<?php restimpo_get_headings_google_fonts(); ?>
<?php restimpo_get_headings_google_fonts_size(); ?>
<?php restimpo_get_site_title_color(); ?>
<?php restimpo_get_site_title_hover_color(); ?>
<?php restimpo_get_description_font(); ?>
<?php restimpo_get_description_font_size(); ?>
<?php restimpo_get_header_image_headline_color(); ?>
<?php restimpo_get_main_headlines_color(); ?>
<?php restimpo_get_headlines_font(); ?>
<?php restimpo_get_headline_h1_size(); ?>
<?php restimpo_get_headline_h2_size(); ?>
<?php restimpo_get_headline_h3_size(); ?>
<?php restimpo_get_headline_h4_size(); ?>
<?php restimpo_get_headline_h5_size(); ?>
<?php restimpo_get_headline_h6_size(); ?>
<?php restimpo_get_headline_box_google_fonts(); ?>
<?php restimpo_get_homepage_headlines_color(); ?>
<?php restimpo_get_headline_box_google_fonts_size(); ?>
<?php restimpo_get_postentry_font(); ?>
<?php restimpo_get_postentry_font_size(); ?>
<?php restimpo_get_postentry_color(); ?>
<?php restimpo_get_postentry_hover_color(); ?>
<?php restimpo_get_sidebar_widget_font(); ?>
<?php restimpo_get_sidebar_widget_font_size(); ?>
<?php restimpo_get_sidebar_text_color(); ?>
<?php restimpo_get_footer_widget_font(); ?>
<?php restimpo_get_footer_widget_font_size(); ?>
<?php restimpo_get_footer_text_color(); ?>
<?php restimpo_get_content_links_color(); ?>
<?php restimpo_get_sidebar_links_color(); ?>
<?php restimpo_get_footer_links_color(); ?>
<?php restimpo_get_main_header_menu_color(); ?>
<?php restimpo_get_main_header_menu_hover_color(); ?>
<?php restimpo_get_active_main_header_menu_color(); ?>
<?php restimpo_get_active_main_header_menu_border_color(); ?>
<?php restimpo_get_top_header_menu_color(); ?>
<?php restimpo_get_top_header_menu_hover_color(); ?>
<?php restimpo_get_active_top_header_menu_color(); ?>
<?php restimpo_get_menu_font(); ?>
<?php restimpo_get_menu_font_size(); ?>
<?php restimpo_get_top_menu_font(); ?>
<?php restimpo_get_top_menu_font_size(); ?>
<?php echo ("</style>"); ?>
<?php
} 
add_action('wp_enqueue_scripts', 'restimpo_custom_styles');	?>
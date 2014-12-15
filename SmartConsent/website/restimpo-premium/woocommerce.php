<?php
/**
 * The WooCommerce pages template file.
 * @package RestImpo
 * @since RestImpo 1.2.0
*/
get_header(); ?>
<div id="wrapper-content">
  <div class="content-headline-wrapper">
    <div class="content-headline">
      <h1><?php if ( !is_product() ) { woocommerce_page_title(); } else { the_title(); } ?></h1>
<?php restimpo_get_breadcrumb(); ?>
    </div>
  </div>
  <div class="container">
  <div id="main-content"> 
    <article id="content">
<?php restimpo_social_buttons_products(); ?>
      <div class="entry-content">
<?php woocommerce_content(); ?>
      </div>
    </article> <!-- end of content -->
  </div>
<?php get_sidebar(); ?>
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>
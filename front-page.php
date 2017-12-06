<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package komorebi
 */

get_header(); 

?>

	<div id="primary" class="content-area col-xl-10">

          <?php

	/*
	 * If a regular post or page, and not the front page, show the featured image.
	 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
	 */
	if ( ( ( is_page()  ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
		echo '<div class="home-image-background">';
		echo get_the_post_thumbnail( get_queried_object_id(), 'home-featured-image' );
		echo '</div><!-- .single-featured-image-header -->';
	endif;
	?>
          
       <main id="main" class="site-main">
    
    
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
//get_footer();

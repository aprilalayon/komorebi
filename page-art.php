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

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main art-main" role="main">

                
            <?php 
                $args = array(
                    'post_status' => 'inherit',
                    'post_type'=> 'attachment',
                    'posts_per_page' => -1,
                );

                $images = new WP_Query($args);?>

            <?php if ( $images->have_posts() ) : ?>
            
             <div id="item-list" class="gallery-grid">
            	<div class="grid-sizer">	
                <?php while ( $images->have_posts() ) {
                        $images->the_post(); 

                            $termList = get_the_terms( $post->ID, 'image-types' );  //Get the assigned terms for a particular item
                            $termName = ""; //initialize the string that will contain the terms                        
    
                            if ($termList) {
                                    foreach ( $termList as $term ) { // for each term 
                                    $termName .= $term->slug.' '; //create a string that has all the slugs 
                                }
                                    
                                echo '<div class="' . $termName . 'item">';
                                
                                echo '<a href="' . wp_get_attachment_url($post->ID) . '"class="swipebox" title="' . get_post($post->ID)->post_excerpt . '">';
                                
                                echo wp_get_attachment_image( $post->ID, 'artwork-image' );
                                
                                echo '</a>';
                                echo '</div>';
                            }
                ?> 
                        
				<?php }  ?>
					</div>
                </div> <!-- end item-list -->
            <?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();

?>
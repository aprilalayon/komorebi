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
		<main id="main" class="site-main column-container">
            
            <section class="about-col-1 column">
               
               <?php

				    if (function_exists ('get_field')){

				    	if(get_field('about_me')){ ?>
				        
				           <p> <?php echo "<p>"; the_field('about_me'); echo "</p>"; ?>
						
						<?php
				        }
				    }

					?>
			</section>
			
			<figure class="about-col-2 column">
                
                <?php 

                    $image = get_field('about_image');
                    $size = 'about-profile'; // (thumbnail, medium, large, full or custom size)

                    if( $image ) {

                        echo wp_get_attachment_image( $image, $size );

                    }

                    ?>
					
			</figure>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();

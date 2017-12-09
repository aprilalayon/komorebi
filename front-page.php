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

	<div id="primary" class="content-area ">

          <?php

    // specify desired image size in place of 'full'
            $page_bg_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
            $page_bg_image_url = $page_bg_image[0]; // this returns just the URL of the image

            $img_src = wp_get_attachment_image_url( $attachment_id, 'full' );
            $img_srcset = wp_get_attachment_image_srcset( $attachment_id, 'full' );

            ?>
          
           <figure class="background-image">
       
                <img
                    src="<?php echo esc_url( $page_bg_image_url ); ?>"
                     srcset="<?php echo esc_attr( $img_srcset ); ?>"
                     sizes="(max-width: 50em) 87vw, 3000px" alt="">
         
           </figure>
           
        
        
           
       <main id="main" class="site-main">
    

    
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
//get_footer();

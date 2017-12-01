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

	<div id="primary" class="content-area col-sm-10">
		<main id="main" class="site-main">

       <?php 

    // declare $post global if used outside of the loop
    global $post;

    // check to see if the theme supports Featured Images, and one is set
    if (current_theme_supports( 'post-thumbnails' ) && has_post_thumbnail( $post->ID )) {
            
        // specify desired image size in place of 'full'
        $page_bg_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
        $page_bg_image_url = $page_bg_image[0]; // this returns just the URL of the image

    } else {
        // the fallback – our current active theme's default bg image
        $page_bg_image_url = get_background_image();
    }

    // And below, spit out the <style> tag... ?>
    
    <?php
            $img_src = wp_get_attachment_image_url( $attachment_id, 'large' );
            $img_srcset = wp_get_attachment_image_srcset( $attachment_id, 'large' );
            ?>

    <img src="<?php echo esc_url( $page_bg_image_url ); ?>"
         srcset="<?php echo esc_attr( $img_srcset ); ?>"
         sizes="(max-width: 50em) 87vw, 680px" alt="">
    
    
    <style type="text/css" id="custom-background-css-override">
        body.custom-background { background-image: url('<?php echo $page_bg_image_url; ?>'); }
    </style>
       

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();

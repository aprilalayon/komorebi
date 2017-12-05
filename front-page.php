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

	<div id="primary" class="content-area">
       
       <main id="main" class="site-main">
        
          <?php
           
           $background = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' );
                
           ?>
                
        <style>
        .site-main {
        background-image: url('<?php echo $background[0]; ?>');
        background-size: cover;
            height: 100%; 
        }
        </style>
           

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();

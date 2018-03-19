<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package komorebi
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		
		<div class="category-container">
			<?php 
			the_category(); 
			?>
		</div>
		
			<?php
				the_title( '<h1 class="blog-title">', '</h1>' );
			?>
		

	<?php
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php 
				the_time('F j, Y');
			// komorebi_posted_on(); 
			
			?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
	
			
			<figure class="news-image-container">
			 
			 <?php 

				 $image = get_field('news_image');
				 $image2 = get_field('news_image_2');
				//  $image3 = get_field('news_image_3');
				 $size = 'news-image'; // (thumbnail, medium, large, full or custom size)

				 if( $image ) {

					 echo wp_get_attachment_image( $image, $size );
					 
				 }

				 if( $image2 ) {

					 echo wp_get_attachment_image( $image2, $size );
					 
				 }

				//  if( $image3 ) {

				// 	echo wp_get_attachment_image( $image3, $size );
					
				// }


			 ?>
				 
		 </figure>
			
			
			<section class="news-content">
               
			<?php

				 if (function_exists ('get_field')){

					 if(get_field('news_content')){
					 
						echo "<p>"; the_field('news_content'); echo "</p>";
					 
					
					 }
				 }

				 ?>
		 </section>
		
		<?php
			// the_content( sprintf(
			// 	wp_kses(
			// 		/* translators: %s: Name of current post. Only visible to screen readers */
			// 		__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'komorebi' ),
			// 		array(
			// 			'span' => array(
			// 				'class' => array(),
			// 			),
			// 		)
			// 	),
			// 	get_the_title()
			// ) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'komorebi' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	
</article><!-- #post-<?php the_ID(); ?> -->

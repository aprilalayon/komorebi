Gallery filters

<ul id="filters">
                <li><a href="#" data-filter="*" class="selected">All</a></li>
                
                <?php 
                    $terms = get_terms('image-types', array( "hide_empty" => 0 )  );
                    $count = count($terms); //How many are they?
                    if ( $count > 0 ){  //If there are more than 0 terms
                        foreach ( $terms as $term ) {  //for each term:
                            echo "<li><a href='#' data-filter='.".$term->slug."'>" . $term->name . "</a></li>";
                        }
                    } 
                ?>
</ul>


<?php
wp_nav_menu( array(
    'theme_location' => 'menu-1',
    'menu_id'        => 'primary-menu',
) );

?>

<?php
class Description_Walker extends Walker_Nav_Menu
{
    /**
     * Start the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  object $item   Menu item data object.
     * @param  int $depth     Depth of menu item. May be used for padding.
     * @param  array|object $args    Additional strings. Actually always an 
                                     instance of stdClass. But this is WordPress.
     * @return void
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
    {
        $classes     = empty ( $item->classes ) ? array () : (array) $item->classes;

        $class_names = join(
            ' '
        ,   apply_filters(
                'nav_menu_css_class'
            ,   array_filter( $classes ), $item
            )
        );

        ! empty ( $class_names )
            and $class_names = ' class="'. esc_attr( $class_names ) . '"';

        $output .= "<li id='menu-item-$item->ID' $class_names>";

        $attributes  = '';

        ! empty( $item->attr_title )
            and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
        ! empty( $item->target )
            and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        ! empty( $item->xfn )
            and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        ! empty( $item->url )
            and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';

        // insert description for top level elements only
        // you may change this
        $description = ( ! empty ( $item->description ) and 0 == $depth )
            ? '<small class="nav_desc">' . esc_attr( $item->description ) . '</small>' : '';

        $title = apply_filters( 'the_title', $item->title, $item->ID );

        $item_output = $args->before
            . "<a $attributes>"
            . $args->link_before
            . $title
            . '</a> '
            . $args->link_after
            . $description
            . $args->after;

        // Since $output is called by reference we don't need to return anything.
        $output .= apply_filters(
            'walker_nav_menu_start_el'
        ,   $item_output
        ,   $item
        ,   $depth
        ,   $args
        );
    }
}
?>


-- Images background
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
    
    
    <style type="text/css" id="custom-background-css-override">
        body.custom-background { background-image: url('<?php echo $page_bg_image_url; ?>'); }
    </style>
    
     
  <?php

    // specify desired image size in place of 'full'
            $page_bg_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
            $page_bg_image_url = $page_bg_image[0]; // this returns just the URL of the image

            $img_src = wp_get_attachment_image_url( $attachment_id, 'large' );
            $img_srcset = wp_get_attachment_image_srcset( $attachment_id, 'large' );

            ?>

    <img src="<?php echo esc_url( $page_bg_image_url ); ?>"
         srcset="<?php echo esc_attr( $img_srcset ); ?>"
         sizes="(max-width: 50em) 87vw, 680px" alt="">
         
         <figure class="figure">
       
        <img
            class="img-overlay"
            src="<?php echo esc_url( $page_bg_image_url ); ?>"
             srcset="<?php echo esc_attr( $img_srcset ); ?>"
             sizes="(max-width: 50em) 87vw, 680px" alt="">
             
        <figcaption class="figure-caption">A caption for the above image.</figcaption>
         
   </figure>
   
   
   ----------------
   
    <?php
            $background = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' );
                ?>
                
        <style>
        .content-area{
        background-image: url('<?php echo $background[0]; ?>');
        background-size: cover;
        }
        </style>
        
        
--------------
       
       
  <?php

    // specify desired image size in place of 'full'
            $page_bg_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
            $page_bg_image_url = $page_bg_image[0]; // this returns just the URL of the image

            $img_src = wp_get_attachment_image_url( $attachment_id, 'large' );
            $img_srcset = wp_get_attachment_image_srcset( $attachment_id, 'large' );

            ?>
          
           <figure class="backgroud-image">
       
                <img
                    src="<?php echo esc_url( $page_bg_image_url ); ?>"
                     srcset="<?php echo esc_attr( $img_srcset ); ?>"
                     sizes="(max-width: 50em) 87vw, 3000px" alt="">
         
           </figure>
           
        
        
        -----------
        
        <?php

	/*
	 * If a regular post or page, and not the front page, show the featured image.
	 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
	 */
	if ( ( ( is_page()  ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
		echo '<div class="home-image-background">';
		echo get_the_post_thumbnail( get_queried_object_id(), 'home-featured-image' );
		echo '</div>';
	endif;
	?>
   
  
 ---------
 
<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title text-center"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title text-center"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->
		
	
------------------


<?php esc_html_e( 'Primary Menu', 'komorebi' ); ?>




-------------------


<?php

    // specify desired image size in place of 'full'
            $page_bg_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
            $page_bg_image_url = $page_bg_image[0]; // this returns just the URL of the image

            $img_src = wp_get_attachment_image_url( $attachment_id, 'full' );
            $img_srcset = wp_get_attachment_image_srcset( $attachment_id, 'full' );
            
            $bgImage = get_post_thumbnail_id( $post->ID );

            $bg_src_small = wp_get_attachment_image_srcset( $bgImage, 'bg-small' );
            $bg_src_medium = wp_get_attachment_image_srcset( $bgImage, 'bg-medium' );
            $bg_src_large = wp_get_attachment_image_srcset( $bgImage, 'bg-large' );
            $bg_src_full = wp_get_attachment_image_srcset( $bgImage, 'bg-full');
        
             $bg_info = get_post( $bgImage ); // Get post by ID
            //var_dump($thumb_img);
            $caption = $bg_info->post_excerpt; // Display Caption
            $desctiption = $bg_info->post_content; // Display Description
            $alt = $bg_info->_wp_attachment_image_alt;//Display Alt attribute



            ?>
          
           <figure class="background-image">
       
                <img
                    src="<?php echo esc_url( $page_bg_image_url ); ?>"
                     srcset="<?php echo esc_attr ( $bg_src_large ) ; ?>,
                    <?php echo esc_attr ( $bg_src_medium ); ?>,
                    <?php echo esc_attr ( $bg_src_small ); ?>, 
                    <?php echo esc_attr ( $bg_src_full ); ?>"
                     
                     alt="<?php echo $alt; ?>">
         
           </figure>
           
        
        
           
       <main id="main" class="site-main">
    

    
		</main><!-- #main -->
		
	
------------------


<?php
            $background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                ?>
                
        style="background-image:url(<?php echo $background[0]; ?>);
        "
        class="home"
        
-------------------


<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'komorebi' ) ); ?>"><?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'komorebi' ), 'WordPress' );
			?></a>
			<span class="sep"> | </span>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'komorebi' ), 'komorebi', '<a href="http://underscores.me/">April Alayon</a>' );
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	


-----------------


<div class ="work-body">
                <?php

                $args = array (

                    'post_type' => 'work',
                    'orderby'   => 'asc',
                    'posts_per_page' => 30
                ); 

                $workList = new WP_Query($args);

                if ($workList->have_posts()){


                    while($workList->have_posts()){
                        $workList->the_post();


                       if (function_exists ('get_field')){
                        
                           ?>
                    
                        <p>   
                        <?php
                        if(get_field('publication')){
                            the_field('publication');
                        }
                        ?> 
                        
                        &#11049;
                        
                        <a href=" <?php the_field('work_link'); ?> "> 
                            <?php the_field('work_title'); ?> 
                        </a>
                        </p>
                        
                        <?php

                     }

                        }

                     wp_reset_postdata();
                    }


                ?>



			<?php the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		
		</div><!--end of testimonials-->
		
	


----------------

                 <?php 

                                $image = get_field('event_image');
                                $size = 'community-image'; // (thumbnail, medium, large, full or custom size)

                                if( $image ) {

                                    echo wp_get_attachment_image( $image, $size );

                                }

                                ?>
                                
                               
                              <img src="<?php the_field('event_image'); ?>" />
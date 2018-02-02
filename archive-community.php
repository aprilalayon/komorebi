
<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package komorebi
 */

get_header(); ?>

	<div id="primary" class="content-area community-content-area">
		<main id="main" class="site-main community-main">


        <h1>Community Involvement</h1>
        
		<?php
		if ( have_posts() ) : ?>


                <div class ="community-body">
                <?php

                $args = array (

                    'post_type' => 'community',
                    'orderby'   => 'asc',
                    'posts_per_page' => -1
                ); 

                $communityList = new WP_Query($args);

                if ($communityList->have_posts()){


                    while($communityList->have_posts()){
                        $communityList->the_post();


                       if (function_exists ('get_field')){
                        
                           ?>
                    
                        <p>   
                        <?php
                        if(get_field('event_name')){
                            the_field('event_name');
                        }
                        ?> 
                        
                        &#11049;
                        
                         
                            <?php the_field('role'); ?> 
                        
                        
                            <a href=" <?php the_field('event_link'); ?> "> 
                            <p>Visit Site</p> 
                        </a>
                        </p>
                        
                        <figure>
                            
                            <?php 
//                                var_dump(get_field('event_image'));
                                $image = get_field('event_image');
                                $size = 'community-image'; // (thumbnail, medium, large, full or custom size)
//                                var_dump($image);
                                if( $image != '') {

                                    echo wp_get_attachment_image( $image );

                                }

                                ?>
                            
                        </figure>
                        
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

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();

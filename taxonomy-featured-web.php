
<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package komorebi
 */

get_header(); ?>

	<div id="primary" class="content-area web-content-area">
		<main id="main" class="site-main web-main">

		<?php
		if ( have_posts() ) : ?>

            <h1>Web</h1>
            

                <div class ="work-body">
                <?php

                $args = array (

                    'post_type' => 'work',
                    'orderby'   => 'asc',
                    'posts_per_page' => 30,
                    'tax_query' => array(
                        array (
                            'taxonomy' => 'featured',
                            'field' => 'slug',
                            'terms' => 'web',
                        )
                    ),
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

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();

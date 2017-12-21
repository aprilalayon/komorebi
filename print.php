<?php
            
            $args = array (
            
                'post_type' => 'testimonials',
                'posts_per_page' => 1,
            ); 
            
            $testimoniallist = new WP_Query($args);
            
            if ($testimoniallist->have_posts()){
               
                echo '<h4>Testimonials</h4>';
                
                while($testimoniallist->have_posts()){
                    $testimoniallist->the_post();
                    
                    
                   if (function_exists ('get_field')){
                    
                    echo '<blockquote><figure>"';
                    if(get_field('testimonial')){
                        the_field('testimonial');
                    }
                    echo '"<figcaption>';
                    if(get_field('testimonial_author')){
                        the_field('testimonial_author');
                    }
                    echo '</figcaption>';
                    echo '</figure></blockquote>';
                    
                 }
                        
                    }
                
                 wp_reset_postdata();
                }
                
            
            ?>
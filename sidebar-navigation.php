<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package komorebi
 */

//if ( ! is_active_sidebar( 'navigation' ) ) {
//	return;
//}
?>

<aside id="secondary" class="widget-area sidenav">

   <div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

    <nav id="site-navigation" class="main-navigation ">
        
        <?php dynamic_sidebar( 'navigation' ); ?>
            
		</nav><!-- #site-navigation -->
		
		
		<div class="social-menu">
        
		    <?php wp_nav_menu(array(
               	 'theme_location' => 'social'
               	)) 
               	
            ?>
		    
		</div>
</aside><!-- #secondary -->

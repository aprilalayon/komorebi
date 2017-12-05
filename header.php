<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package komorebi
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site container-fluid row d-flex flew-row">


	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'komorebi' ); ?></a>

	<header id="masthead" class="site-header">
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
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'komorebi' ); ?></button>

           <?php
            wp_nav_menu(
                array (
                    'menu'            => 'main-menu',
                    'container'       => FALSE,
                    'container_id'    => FALSE,
                    'menu_class'      => 'd-flex flex-column text-right',
                    'sub_menu'         => TRUE,
                    'show_parent'       => true,
                    'menu_id'         => FALSE,
                    'start_depth'    => 1,
                    'walker'          => new Description_Walker,
                    'walker'           => new Sub_Menu_Nav_Menu,
                    'walker'           => new Writing_Nav_Menu
                )
            );        

            ?>
            
		</nav><!-- #site-navigation -->
		
		
		<div class="social-menu">
        
		    <?php wp_nav_menu(array(
               	 'theme_location' => 'social'
               	)) 
               	
            ?>
		    
		</div>
    
	</header><!-- #masthead -->
	

	<div id="content" class="site-content">

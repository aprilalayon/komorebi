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
<!Doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'komorebi' ); ?></a>

    <div class="site-flex">
    
    <header id="masthead" class="site-header">
	
    <div class="mid-header">
		<div class="site-branding">
			
           <?php 
           $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            if ( has_custom_logo() ) {
                    echo '<img src="'. esc_url( $logo[0] ) .'" class="logo">';
            } else {
                    echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
            }
            
            ?>

		</div><!-- .site-branding -->

        
           <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i> Menu </button>
           
           

		<nav id="site-navigation" class="main-navigation ">

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
		
		<nav id="nav-mobile" class="nav-mobile">

           <?php
            wp_nav_menu(
                array (
                    'menu'            => 'main-menu',
                    'container'       => FALSE,
                    'container_id'    => FALSE,
                    'menu_class'      => 'd-flex flex-column text-center',
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
            
		</nav>
		
        </div>
        
        <div class="sticky-social">
		    <?php wp_nav_menu(array(
               	 'theme_location' => 'social',
                'menu_class'      => 'social-menu',
               	)) 
               	
            ?>
        </div>
            
		
	</header><!-- #masthead -->
	

	<div id="content" class="site-content">

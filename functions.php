<?php
/**
 * komorebi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package komorebi
 */

if ( ! function_exists( 'komorebi_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function komorebi_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on komorebi, use a find and replace
		 * to change 'komorebi' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'komorebi', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

        // Add new image size for front banners
//        add_image_size( 'bg-full', 2560, 1440, true );
//        add_image_size( 'bg-large', 1920, 1080, true );
//        add_image_size( 'bg-medium', 1024, 768, true );
//        add_image_size( 'bg-small', 960, 640, true );
        
        add_image_size( 'about-profile', 500, 700, true );
        add_image_size( 'community-image', 800, 800, true );
        add_image_size( 'news-image', 630, 280 );
        add_image_size( 'artwork-image', 250, 250, true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'komorebi' ),
            'social' => esc_html__( 'Social Menu', 'komorebi' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'komorebi_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'komorebi_setup' );




/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function komorebi_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'komorebi_content_width', 640 );
}
add_action( 'after_setup_theme', 'komorebi_content_width', 0 );

// odd or even
$odd_or_even = 'odd';

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function komorebi_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'News Sidebar', 'komorebi' ),
		'id'            => 'news-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'komorebi' ),
		'before_widget' => '<section id="%1$s" class="news-sidebar-title-container widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="news-sidebar-title">',
		'after_title'   => '</h2>',
	) );
    
     register_sidebar( array(
        'name'          => __( 'Navigation Sidebar', 'komorebi' ),
        'id'            => 'navigation',
        'before_widget' => '',
        'after_widget'  => '',
    ) );
}
add_action( 'widgets_init', 'komorebi_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function komorebi_scripts() {
    
    wp_enqueue_style( 'komorebi_bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css');
    
	wp_enqueue_style( 'komorebi-style', get_stylesheet_uri() );
    
    wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Caveat|Signika:300,400|Source+Sans+Pro', false ); 
    
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'); 

    wp_enqueue_script('jquery');
    
    wp_enqueue_script( 'komorebi-responsivemobile', get_template_directory_uri() . '/js/mobile-navigation.js', array(), true );
    
    wp_enqueue_script( 'komorebi_bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '20171129', true );

    wp_enqueue_script( 'komorebi-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'komorebi-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
    

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
    }
   
/**
* Enqueue jQuery, imagesLoaded, Isotope and its settings.
*/
   if ( is_page( 'art' ) ) {
       wp_enqueue_script( 'komorebi-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array( 'jquery' ), '4.1.1', true );
       
       wp_enqueue_script( 'komorebi-isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array( 'jquery' ), '3.0.1', true );
       
       wp_enqueue_script( 'komorebi-isotope-settings', get_template_directory_uri() . '/js/isotope-settings.js', array( 'jquery' ), '1.0', true );
   }

   if(is_page ('art') ){

    wp_enqueue_style( 'komorebi-swipebox', get_template_directory_uri() . '/css/swipebox.css');

    wp_enqueue_script( 'komorebi-swipebox-js', get_template_directory_uri() . '/js/jquery.swipebox.js', array('jquery'), '', true );
    
    wp_enqueue_script( 'komorebi-swipebox-settings', get_template_directory_uri() . '/js/swipebox-settings.js', array('jquery'), '', true );
}

}
add_action( 'wp_enqueue_scripts', 'komorebi_scripts' );


// Rename Posts to News in Menu
function komorebi_change_media_menu_label() {
    global $menu;
    global $submenu;
    $menu[10][0] = 'Artwork';
    $submenu['upload.php'][5][0] = 'Artwork Images';
    $submenu['upload.php'][10][0] = 'Add Images';
}
add_action( 'admin_menu', 'komorebi_change_media_menu_label' );

// Change Media to Artwork menu 

function komorebi_change_media_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['attachment']->labels;
    $labels->name = 'Artwork';
    $labels->singular_name = 'Artwork Item';
    $labels->add_new = 'Add Artwork Item';
    $labels->add_new_item = 'Add Artwork Item';
    $labels->edit_item = 'Edit Artwork Item';
    $labels->new_item = 'Artwork Item';
    $labels->view_item = 'View Artwork Item';
    $labels->search_items = 'Search Artwork Items';
    $labels->not_found = 'No Artwork Items found';
    $labels->not_found_in_trash = 'No Artwork Items found in Trash';
}
add_action( 'admin_menu', 'komorebi_change_media_label' );


/**
 * Custom Post Types
 */
function komorebi_register_custom_post_types() {

    
// Works CPT 
    
    $labels = array(
        'name'               => _x( 'Works', 'post type general name' ),
        'singular_name'      => _x( 'Work', 'post type singular name'),
        'menu_name'          => _x( 'Works', 'admin menu' ),
        'name_admin_bar'     => _x( 'Work', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'Works' ),
        'add_new_item'       => __( 'Add New Work' ),
        'new_item'           => __( 'New Work' ),
        'edit_item'          => __( 'Edit Work' ),
        'view_item'          => __( 'View Work' ),
        'all_items'          => __( 'All Works' ),
        'search_items'       => __( 'Search Works' ),
        'parent_item_colon'  => __( 'Parent Works:' ),
        'not_found'          => __( 'No Work images found.' ),
        'not_found_in_trash' => __( 'No Works found in Trash.' ),
        'archives'           => __( 'Work Archives'),
        'insert_into_item'   => __( 'Uploaded to this Work'),
        'uploaded_to_this_item' => __( 'Work Archives'),
        'filter_item_list'   => __( 'Filter Works list'),
        'items_list_navigation' => __( 'Works list navigation'),
        'items_list'         => __( 'Works list'),
        'featured_image'     => __( 'Work feature image'),
        'set_featured_image' => __( 'Set Work feature image'),
        'remove_featured_image' => __( 'Remove Work feature image'),
        'use_featured_image' => __( 'Use as feature image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'Works' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'thumbnail', 'editor' ),
        'menu_icon'          => 'dashicons-format-quote',
    );
    register_post_type( 'work', $args );
    
    
// Community CPT 
    
    $labels = array(
        'name'               => _x( 'Community', 'post type general name' ),
        'singular_name'      => _x( 'Community', 'post type singular name'),
        'menu_name'          => _x( 'Community', 'admin menu' ),
        'name_admin_bar'     => _x( 'Community', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'Community' ),
        'add_new_item'       => __( 'Add New Community' ),
        'new_item'           => __( 'New Community' ),
        'edit_item'          => __( 'Edit Community' ),
        'view_item'          => __( 'View Community' ),
        'all_items'          => __( 'All Community' ),
        'search_items'       => __( 'Search Community' ),
        'parent_item_colon'  => __( 'Parent Community:' ),
        'not_found'          => __( 'No Community images found.' ),
        'not_found_in_trash' => __( 'No Community found in Trash.' ),
        'archives'           => __( 'Community Archives'),
        'insert_into_item'   => __( 'Uploaded to this Entry'),
        'uploaded_to_this_item' => __( 'Community Archives'),
        'filter_item_list'   => __( 'Filter Community list'),
        'items_list_navigation' => __( 'Community list navigation'),
        'items_list'         => __( 'Community list'),
        'featured_image'     => __( 'Community feature image'),
        'set_featured_image' => __( 'Set Community feature image'),
        'remove_featured_image' => __( 'Remove Community feature image'),
        'use_featured_image' => __( 'Use as feature image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'Community' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'thumbnail', 'editor' ),
        'menu_icon'          => 'dashicons-groups',
    );
    register_post_type( 'community', $args );

 }
 add_action( 'init', 'komorebi_register_custom_post_types' );

/** Rewrite flush **/
function komorebi_rewrite_flush() {
        komorebi_register_custom_post_types();
        flush_rewrite_rules();
    }

add_action( 'after_switch_theme', 'komorebi_rewrite_flush' );


/** Changing 'Post' menu label to 'News' */
function komorebi_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add News';
    $submenu['edit.php'][16][0] = 'News Tags';
}
add_action( 'admin_menu', 'komorebi_change_post_label' );

function komorebi_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'News';
    $labels->singular_name = 'News';
    $labels->add_new = 'Add News';
    $labels->add_new_item = 'Add News';
    $labels->edit_item = 'Edit News';
    $labels->new_item = 'News';
    $labels->view_item = 'View News';
    $labels->search_items = 'Search News';
    $labels->not_found = 'No News found';
    $labels->not_found_in_trash = 'No News found in Trash';
    $labels->all_items = 'All News';
    $labels->menu_name = 'News';
    $labels->name_admin_bar = 'News';
}
add_action( 'init', 'komorebi_change_post_object' );

/** Custom taxonomies **/
function komorebi_register_taxonomies() {

    $labels = array(
        'name'                       => _x( 'Featured', 'taxonomy general name' ),
        'singular_name'              => _x( 'Featured', 'taxonomy singular name' ),
        'search_items'               => __( 'Search Featured' ),
        'popular_items'              => __( 'Popular Featured' ),
        'all_items'                  => __( 'All Featured' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit Featured' ),
        'update_item'                => __( 'Update Featured' ),
        'add_new_item'               => __( 'Add New Featured' ),
        'new_item_name'              => __( 'New Featured Name' ),
        'separate_items_with_commas' => __( 'Separate featured with commas' ),
        'add_or_remove_items'        => __( 'Add or remove featured' ),
        'choose_from_most_used'      => __( 'Choose from the most used featured' ),
        'not_found'                  => __( 'No featured found.' ),
        'menu_name'                  => __( 'Featured' ),
    );

    $args = array(

        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menu'      => true,
        'show_admin_column'     => true,
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'featured' ),
    );
    register_taxonomy( 'featured', array( 'work' ), $args );


    $labels = array(
        'name'              => _x( 'Image Types', 'taxonomy general name' ),
        'singular_name'     => _x( 'Image Type', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Image Types' ),
        'all_items'         => __( 'All Image Types' ),
        'parent_item'       => __( 'Parent Image Type' ),
        'parent_item_colon' => __( 'Parent Image Type:' ),
        'edit_item'         => __( 'Edit Image Type' ),
        'view_item'         => __( 'View Image Type' ),
        'update_item'       => __( 'Update Image Type' ),
        'add_new_item'      => __( 'Add New Image Type' ),
        'new_item_name'     => __( 'New Image Type Name' ),
        'menu_name'         => __( 'Image Type' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'image-types' ),
    );
    register_taxonomy( 'image-types', array( 'attachment' ), $args );

}

add_action( 'init', 'komorebi_register_taxonomies');


/** Walker **/

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

class Sub_Menu_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth = 0, $args = array(), $id = 0) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-item d-flex flex-column\">\n";
  }
}


class Writing_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth = 0, $args = array(), $id = 1760) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu d-flex flex-column\">\n";
  }
}


/**Allow SVG files to upload**/
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/*Remove random HTML tag CSS styling */
function my_filter_head() {
   remove_action('wp_head', '_admin_bar_bump_cb');
} 

add_action('get_header', 'my_filter_head');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


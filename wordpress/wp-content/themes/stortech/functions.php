<?php
/**
 * Theme Palace functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Theme Palace
 * @subpackage Stortech
 * @since Stortech 1.0.0
 */


if ( ! function_exists( 'stortech_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function stortech_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Theme Palace, use a find and replace
		 * to change 'stortech' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'stortech' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// add woocommerce support
		add_theme_support( 'woocommerce' );
		if ( class_exists( 'WooCommerce' ) ) {
	    	global $woocommerce;

	    	if( version_compare( $woocommerce->version, '3.0.0', ">=" ) ) {
	      		add_theme_support( 'wc-product-gallery-zoom' );
				add_theme_support( 'wc-product-gallery-lightbox' );
				add_theme_support( 'wc-product-gallery-slider' );
			}
	  	}

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// Enable support for footer widgets.
		add_theme_support( 'footer-widgets', 6 );

		// Load Footer Widget Support.
		require_if_theme_supports( 'footer-widgets', get_template_directory() . '/inc/footer-widgets.php' );
		
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 600, 450, true );
		

		// Set the default content width.
		$GLOBALS['content_width'] = 525;
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' 	=> esc_html__( 'Primary', 'stortech' ),
			'social' 	=> esc_html__( 'Social', 'stortech' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'stortech_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// This setup supports logo, site-title & site-description
		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 120,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( '/assets/css/editor-style' . stortech_min() . '.css', stortech_fonts_url() ) );

		// Gutenberg support
		add_theme_support( 'editor-color-palette', array(
	       	array(
				'name' => esc_html__( 'Blue', 'stortech' ),
				'slug' => 'blue',
				'color' => '#2c7dfa',
	       	),
	       	array(
	           	'name' => esc_html__( 'Green', 'stortech' ),
	           	'slug' => 'green',
	           	'color' => '#07d79c',
	       	),
	       	array(
	           	'name' => esc_html__( 'Orange', 'stortech' ),
	           	'slug' => 'orange',
	           	'color' => '#ff8737',
	       	),
	       	array(
	           	'name' => esc_html__( 'Black', 'stortech' ),
	           	'slug' => 'black',
	           	'color' => '#2f3633',
	       	),
	       	array(
	           	'name' => esc_html__( 'Grey', 'stortech' ),
	           	'slug' => 'grey',
	           	'color' => '#82868b',
	       	),
	   	));

		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-font-sizes', array(
		   	array(
		       	'name' => esc_html__( 'small', 'stortech' ),
		       	'shortName' => esc_html__( 'S', 'stortech' ),
		       	'size' => 12,
		       	'slug' => 'small'
		   	),
		   	array(
		       	'name' => esc_html__( 'regular', 'stortech' ),
		       	'shortName' => esc_html__( 'M', 'stortech' ),
		       	'size' => 16,
		       	'slug' => 'regular'
		   	),
		   	array(
		       	'name' => esc_html__( 'larger', 'stortech' ),
		       	'shortName' => esc_html__( 'L', 'stortech' ),
		       	'size' => 36,
		       	'slug' => 'larger'
		   	),
		   	array(
		       	'name' => esc_html__( 'huge', 'stortech' ),
		       	'shortName' => esc_html__( 'XL', 'stortech' ),
		       	'size' => 48,
		       	'slug' => 'huge'
		   	)
		));
		add_theme_support('editor-styles');
		add_theme_support( 'wp-block-styles' );
	}
endif;
add_action( 'after_setup_theme', 'stortech_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function stortech_content_width() {

	$content_width = $GLOBALS['content_width'];


	$sidebar_position = stortech_layout();
	switch ( $sidebar_position ) {

	  case 'no-sidebar':
	    $content_width = 1170;
	    break;

	  case 'left-sidebar':
	  case 'right-sidebar':
	    $content_width = 819;
	    break;

	  default:
	    break;
	}

	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 1170;
	}

	/**
	 * Filter Stortech content width of the theme.
	 *
	 * @since Stortech 1.0.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'stortech_content_width', $content_width );
}
add_action( 'template_redirect', 'stortech_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function stortech_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'stortech' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'stortech' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'WooCommerce Sidebar', 'stortech' ),
		'id'            => 'woocommerce-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'stortech' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebars( 4, array(
		'name'          => esc_html__( 'Optional Sidebar %d', 'stortech' ),
		'id'            => 'optional-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'stortech' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'stortech_widgets_init' );


if ( ! function_exists( 'stortech_fonts_url' ) ) :
/**
 * Register Google fonts
 *
 * @return string Google fonts URL for the theme.
 */
function stortech_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';


	/* translators: If there are characters in your language that are not supported by Lato, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'stortech' ) ) {
		$fonts[] = 'Lato:400,700,900';
	}

	/* translators: If there are characters in your language that are not supported by Barlow, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Barlow font: on or off', 'stortech' ) ) {
		$fonts[] = 'Barlow:400,700,900';
	}

	/* translators: If there are characters in your language that are not supported by Josefin Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Josefin Sans font: on or off', 'stortech' ) ) {
		$fonts[] = 'Josefin Sans:400,500,700,900';
	}

	/* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'stortech' ) ) {
		$fonts[] = 'Roboto:400,500,700,900';
	}

	
	$query_args = array(
		'family' => urlencode( implode( '|', $fonts ) ),
		'subset' => urlencode( $subsets ),
	);

	if ( $fonts ) {
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}
endif;

/**
 * Add preconnect for Google Fonts.
 *
 * @since Stortech 1.0.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function stortech_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'stortech-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'stortech_resource_hints', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function stortech_scripts() {
	$options = stortech_get_theme_options();
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'stortech-fonts', stortech_fonts_url(), array(), null );

	// font awesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome' . stortech_min() . '.css' );

	// slick
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick' . stortech_min() . '.css' );

	// slick theme
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/css/slick-theme' . stortech_min() . '.css' );

	// blocks
	wp_enqueue_style( 'stortech-blocks', get_template_directory_uri() . '/assets/css/blocks' . stortech_min() . '.css' );

	wp_enqueue_style( 'stortech-style', get_stylesheet_uri() );

	// Load the html5 shiv.
	wp_enqueue_script( 'stortech-html5', get_template_directory_uri() . '/assets/js/html5' . stortech_min() . '.js', array(), '3.7.3' );
	wp_script_add_data( 'stortech-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'stortech-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . stortech_min() . '.js', array(), '20160412', true );

	wp_enqueue_script( 'stortech-navigation', get_template_directory_uri() . '/assets/js/navigation' . stortech_min() . '.js', array(), '20151215', true );
	
	$stortech_l10n = array(
		'quote'          => stortech_get_svg( array( 'icon' => 'quote-right' ) ),
		'expand'         => esc_html__( 'Expand child menu', 'stortech' ),
		'collapse'       => esc_html__( 'Collapse child menu', 'stortech' ),
		'icon'           => stortech_get_svg( array( 'icon' => 'down', 'fallback' => true ) ),
	);
	
	wp_localize_script( 'stortech-navigation', 'stortech_l10n', $stortech_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/assets/js/slick' . stortech_min() . '.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'imagesloaded');

	wp_enqueue_script( 'jquery-packery.pkgd', get_template_directory_uri() . '/assets/js/packery.pkgd' . stortech_min() . '.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'jquery-match-height', get_template_directory_uri() . '/assets/js/jquery-matchHeight' . stortech_min() . '.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'stortech-custom', get_template_directory_uri() . '/assets/js/custom' . stortech_min() . '.js', array( 'jquery' ), '20151215', true );
}
add_action( 'wp_enqueue_scripts', 'stortech_scripts' );

/**
 * Enqueue editor styles for Gutenberg
 *
 * @since Stortech 1.0.0
 */
function stortech_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'stortech-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks' . stortech_min() . '.css' ) );
	// Add custom fonts.
	wp_enqueue_style( 'stortech-fonts', stortech_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'stortech_block_editor_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load core file
 */
require get_template_directory() . '/inc/core.php';




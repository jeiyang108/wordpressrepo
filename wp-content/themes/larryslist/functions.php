<?php
/*
 * larryslist theme functions and definitions
 * @since 0.9
 */
include_once( get_template_directory() . '/include/theme-options.php');
require_once( get_template_directory() . '/include/plugin-option.php'); // Plugin Activator Theme Specific
include_once( get_template_directory() . '/include/Larryslist_Widget.php'); // Theme Sidebar Widget

// initial setup
function larryslist_setup() {

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
    ));
    // supports custom editor styles
    add_editor_style('custom-editor-style.css');

    // showpost thumbnails and support type custom post thumbnail
    add_theme_support( 'post-thumbnails', array( 'listing' ) );
        //add_image_size( 'listing-thumbnails', 150, 150, false );

    /**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' ); // rss feederz
    add_theme_support( 'post-formats', array( 'aside' ) );

    // language support - add your translation
    load_theme_textdomain('larryslist', get_template_directory() . '/languages');

    // This theme uses wp_nav_menu in one location.
    register_nav_menu( 'primary', __( 'Primary Menu', 'larryslist' ) );

    // custom header image support
    add_theme_support( 'custom-header' );
    $args = array(
	'width'         => 407,
	'height'        => 148,
	'default-image' => get_template_directory_uri() . '/include/images/default-header.jpg',
	'header-text'   => false,
    );
    add_theme_support( 'custom-header', $args );

    //Enable support for site background change
    add_theme_support( 'custom-background' );
    $args = array(
	'default-color' => 'f5f5f5',
	'default-image' => '',
    );
    add_theme_support( 'custom-background', $args );
}
add_action( 'after_setup_theme', 'larryslist_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function appeal_content_width() {
$GLOBALS['content_width'] = 680;
}
add_action( 'after_setup_theme', 'appeal_content_width', 0 );

/**
 * IE enqueue HTML5shiv with conditionals
 * @link http://tiny.cc/html5shiv
 */
function larryslist_enqueue_html5shiv()  {
    wp_enqueue_script( 'html5shiv',
        get_template_directory_uri() . 'js/html5shiv.js',
        array(),
        false,
        false
    );
    wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
}
add_action('wp_enqueue_scripts', 'larryslist_enqueue_html5shiv');

    /**
     * Register scripts and styles
     */
function larryslist_custom_enqueue_scripts() {
    // Register StyleSheet
    wp_enqueue_style( 'larryslist-style', get_stylesheet_uri() );

    // script for image box
    wp_enqueue_script( 'larryslist-imagebox', get_template_directory_uri() . '/js/imagebox.js' );

    // enable threaded comments
    if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
        wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'larryslist_custom_enqueue_scripts' );

// change more link in excerpts
function larryslist_new_excerpt_more($more) {
   global $post;
   if ($post->post_type == 'listing')
   {
      return '<a class="read-more" href="'. get_permalink($post->ID) . '">' . ' [ &#187; ]' . '</a>';
   }
}
add_filter('excerpt_more', 'larryslist_new_excerpt_more');

/**
 * Header for singular articles
 * Add pingback url auto-discovery header for singular articles.
 */
function appeal_pingback_header() {

	if ( is_singular() && pings_open() ) {

		printf( '<link rel="pingback" href="%s">'
                 . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'appeal_pingback_header' );


  /**
  * Filters wp_title to print a neat <title> tag based on what is being viewed.
  * @From https://developer.wordpress.org/reference/functions/wp_title/
  * @param string $title Default title text for current view.
  * @param string $sep Optional separator.
  * @return string The filtered title.
  */
function larryslist_wp_title( $title, $sep ) {
         if ( is_feed() ) {
             return $title;
         }
         global $page, $paged;
          // Add the blog name
         $title .= get_bloginfo( 'name', 'display' );
          // Add the blog description for the home/front page.
         $site_description = get_bloginfo( 'description', 'display' );
         if ( $site_description && ( is_home() || is_front_page() ) ) {
             $title .= " $sep $site_description";
         }
          // Add a page number if necessary:
         if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
             $title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
         }
             return $title;
}
add_filter( 'wp_title', 'larryslist_wp_title', 10, 2 );

/**
 * specific to larryslist tsw custom post type
 * displays title of related custom posts by author
 */
function larryslist_get_author_posts() {

    global $authordata, $post;

    $authors_posts = get_posts( array( 'post_type' => 'listing', 'author' => $authordata->ID, 'post__not_in' => array( $post->ID ), 'posts_per_page' => 10 ) );

    $output = '<ul>';

    foreach ( $authors_posts as $authors_post ) {

        $output .= '<li><a href="' . get_permalink( $authors_post->ID ) . '">' . apply_filters( 'the_title', $authors_post->post_title, $authors_post->ID ) . '</a></li>';

    }
    $output .= '</ul>';
    return $output;
}
// end custom author display

//custom footer credits option
function larryslist_credits() {
    echo '<p><a href="http://themes.tradesouthwest.com/"> <small>Tradesouthwest</small></a></p>';
}
add_action( 'larryslist_credits', 'larryslist_credits' );

function larryslist_widgets_init() {
    // Widgets
    register_sidebar(array(
        'name' => __('Right Sidebar', 'larryslist' ),
        'id' => 'right-sidebar',
        'description' => __('Displays to Right of Content', 'larryslist' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widgettitle">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Footer Center Sidebar', 'larryslist' ),
        'description' => __('Footer Widget Area in Middle', 'larryslist' ),
        'id' => 'footer-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widgettitle">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Footer Right Sidebar', 'larryslist' ),
        'description' => __('Footer Widget Area Right Side', 'larryslist' ),
        'id' => 'footer-sidebar-2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widgettitle">',
        'after_title'   => '</h3>',
    ));
}
add_action( 'widgets_init', 'larryslist_widgets_init' );
?>

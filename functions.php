<?php
/**
 * BubbleGoals functions and definitions
 *
 */
function wpbootstrap_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap-3.3.2-dist/js/bootstrap.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

function register_my_menus() {
  register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'WP BubbleGoal site' ),
		'extra-menu' => __( 'Extra Menu', 'WP BubbleGoal site' )
	) );
}
add_action( 'init', 'register_my_menus' );


/* Header Image init */
$args = array(
	'width'         => 235,
	'height'        => 70,
	'default-image' => get_template_directory_uri() . '/images/header.jpg',
);
add_theme_support( 'custom-header', $args );


add_theme_support( 'post-thumbnails' ); 
set_post_thumbnail_size( 60, 60 ); // 50 pixels wide by 50 pixels tall, resize mode

function my_add_excerpts_to_pages() {
     add_post_type_support('page', 'excerpt');
}
add_action('init', 'my_add_excerpts_to_pages');

/* אורך תקציר פוסט בבלוג */
function custom_excerpt_length( $length ) {
        return 20;
    }
    add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
/* **************** */


/**
 * Register Widget Area.
 *
 */
function BubbleGoal_widgets_init() {
 
	register_sidebar( array(
		'name'          => __( 'Homepage', 'BubbleGoal' ),
		'description'   => __( 'טקסט תיבה צהובה בדף הבית: באבלגול זה המשחק בשבילכם' ),
		'id' => 'homepage-yellow-box-txt',
		'before_widget' => '<p>',
		'after_widget' => '</p>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'BubbleGoal_widgets_init' );
?>

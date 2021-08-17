<?php
/**
 * Go functions and definitions
 *
 * @package Go
 */

/**
 * Theme constants.
 */
define( 'GO_VERSION', '1.4.4' );

/**
 * AMPP setup, hooks, and filters.
 */
require_once get_parent_theme_file_path( 'includes/amp.php' );

/**
 * Core setup, hooks, and filters.
 */
require_once get_parent_theme_file_path( 'includes/core.php' );

/**
 * Customizer additions.
 */
require_once get_parent_theme_file_path( 'includes/customizer.php' );

/**
 * Custom template tags for the theme.
 */
require_once get_parent_theme_file_path( 'includes/template-tags.php' );

/**
 * Pluggable functions.
 */
require_once get_parent_theme_file_path( 'includes/pluggable.php' );

/**
 * TGMPA plugin activation.
 */
require_once get_parent_theme_file_path( 'includes/tgm.php' );

/**
 * WooCommerce functions.
 */
require_once get_parent_theme_file_path( 'includes/woocommerce.php' );

/**
 * Page Titles Meta functions.
 */
require_once get_parent_theme_file_path( 'includes/title-meta.php' );

/**
 * Layouts for the CoBlocks layout selector.
 */
foreach ( glob( get_parent_theme_file_path( 'partials/layouts/*.php' ) ) as $filename ) {
	require_once $filename;
}

/**
 * Run setup functions.
 */
Go\AMP\setup();
Go\Core\setup();
Go\TGM\setup();
Go\Customizer\setup();
Go\WooCommerce\setup();
Go\Title_Meta\setup();

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Fire the wp_body_open action.
	 *
	 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
	 */
	function wp_body_open() {
		// Triggered after the opening <body> tag.
		do_action( 'wp_body_open' );
	}
endif;

//start peche fuzz functions here
function pechefuzz_widgets_init() {
	register_sidebar(
		array(
		 'name'  => esc_html__('Sidebar Footer', 'pechefuzz'),
		 'id'   => 'sidebar-footer',
		 'description'  => esc_html__('Our footer widget', 'pechefuzz'), 
		 'before_widget'   => '<section id="%1$s" class="widget %2$s">',
		 'after_widget'   => '</section>',
		 'before_title'   => '<h3 class="widget-title">',
		 'after_title'   => '</h3>',
		)
		);

		register_sidebar(
            array(
             'name'  => esc_html__('Sidebar Shop', 'pechefuzz'),
             'id'   => 'sidebar-shop',
             'description'  => esc_html__('Shop widget', 'pechefuzz'), 
             'before_widget'   => '<section id="%1$s" class="widget %2$s">',
             'after_widget'   => '</section>',
             'before_title'   => '<h3 class="widget-title">',
             'after_title'   => '</h3>',
            )
            );

			register_sidebar(
				array(
				 'name'  => esc_html__('Sidebar Blog', 'pechefuzz'),
				 'id'   => 'sidebar-blog',
				 'description'  => esc_html__('Blog widget', 'pechefuzz'), 
				 'before_widget'   => '<section id="%1$s" class="widget %2$s">',
				 'after_widget'   => '</section>',
				 'before_title'   => '<h3 class="widget-title">',
				 'after_title'   => '</h3>',
				)
				);

				register_sidebar(
					array(
					 'name'  => esc_html__('Sidebar Carousel', 'pechefuzz'),
					 'id'   => 'sidebar-carousel',
					 'description'  => esc_html__('Carousel widget', 'pechefuzz'), 
					 'before_widget'   => '<section id="%1$s" class="widget %2$s">',
					 'after_widget'   => '</section>',
					 'before_title'   => '<h3 class="widget-title">',
					 'after_title'   => '</h3>',
					)
					);
	
	}
	add_action( 'widgets_init', 'pechefuzz_widgets_init');


	//Page Slug Body Class
function add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
    $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
    }
    add_filter( 'body_class', 'add_slug_body_class' );
    add_filter( 'widget_text', 'do_shortcode' ); 
	
	function year(){
        return date('Y');
    }
    add_shortcode('current_year', 'year');
    
    remove_filter('the_content', 'wpautop');
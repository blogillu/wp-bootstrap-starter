<?php
/**
 * @package wp-bootstrap-starter
 */


function theme_enqueue_styles() {
    // Enqueue Bootstrap CSS
    wp_enqueue_style( 'bootstrap-cdn', '//cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css' );
    
    // Enqueue Theme Style
   wp_enqueue_style( 'custom', get_stylesheet_directory_uri() . '/css/custom-style.css' );
	wp_enqueue_style( 'custom2', '/css/custom-style.css',array(), '1.1.0', 'screen');

    // Enqueue Bootstrap JS Bundle (includes Popper)
    wp_enqueue_script( 'bootstrap-js', '//cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js', array(), '5.3.8', true );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );





remove_action('wp_head', 'print_emoji_detection_script', 7); 
remove_action('wp_print_styles', 'print_emoji_styles');

// Remove the REST API link from the HTML head
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );

// Remove the Link header from HTTP responses
remove_action( 'template_redirect', 'rest_output_link_header', 11 );
// Remove RSD Link from WordPress Header
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');

/**
 * Clean up WordPress header by removing core wp-includes styles
 */
function purge_wp_includes_core_styles() {
    // Remove Gutenberg Block Library CSS
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    
    // Remove WooCommerce Block Styles (if active and unused)
    wp_dequeue_style( 'wc-blocks-style' ); 
    
    // Remove Classic Theme Styles (WordPress 6.1+)
    wp_dequeue_style( 'classic-theme-styles' );
}
add_action( 'wp_enqueue_scripts', 'purge_wp_includes_core_styles', 100 );

/**
 * Remove Gutenberg Global Inline Styles SVG Filters
 */
function remove_global_styles_and_svg_filters() {
    remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
    remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
}
add_action( 'init', 'remove_global_styles_and_svg_filters' );

function purge_wp_global_inline_styles() {
    // Removes the primary global-styles-inline-css block
    remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
    
    // Optional: Removes companion SVG duo-tone filters
    remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
}
add_action( 'init', 'purge_wp_global_inline_styles' );

// Prevent WordPress from printing separate inline styles for individual blocks
add_filter( 'should_load_separate_core_block_assets', '__return_false' );

// Disable Gutenberg editor.
add_filter('use_block_editor_for_post_type', '__return_false', 10);

// Remove RSS feed links from WordPress header
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
// Remove oEmbed discovery links from wp_head
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

// Optional: Also remove oEmbed-specific JavaScript from front/back-end
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);


add_theme_support( 'post-thumbnails' );


// Disable Speculative Loading via the Speculation Rules API (since WordPress v6.8).
add_filter( 'wp_speculation_rules_configuration', '__return_null' );

function theme_setup() {
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'your-theme-textdomain' ),
    ) );
}
add_action( 'after_setup_theme', 'theme_setup' );

if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'Please put class-wp-bootstrap-navwalker.php in your theme folder.', 'your-theme-textdomain' ) );
} else {
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}


<?php

/**
 * Floral Shop functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Floral_Shop
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function floral_shop_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Floral Shop, use a find and replace
		* to change 'floral-shop' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('floral-shop', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'floral-shop'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'floral_shop_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'floral_shop_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function floral_shop_content_width()
{
	$GLOBALS['content_width'] = apply_filters('floral_shop_content_width', 640);
}
add_action('after_setup_theme', 'floral_shop_content_width', 0);

/**
 * Enqueue scripts and styles.
 */
function floral_shop_scripts()
{
	wp_enqueue_style('floral-shop-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('floral-shop-style', 'rtl', 'replace');

	wp_enqueue_script('floral-shop-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'floral_shop_scripts');

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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}

function fwd_remove_admin_links()
{
	if (!current_user_can('manage_options')) {
		remove_menu_page('edit.php');           // Remove Posts link
		remove_menu_page('edit-comments.php');  // Remove Comments link
	}
}
add_action('admin_menu', 'fwd_remove_admin_links');

function my_login_logo()
{ ?>
	<style type="text/css">
		#login h1 a,
		.login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/tfs-logo-sm.png);
			height: 80px;
			width: 80px;
			background-size: 80px 80px;
			background-repeat: no-repeat;
		}

		.login {
			background-color: #f1e4de;
		}

		#loginform {
			background-color: #315C4C;
			border: 1px solid #2c2a2b;
			color: #fff;
		}

		#wp-submit {
			background-color: #2c2a2b;
			border: 1px solid #000;
		}
	</style>
<?php }
add_action('login_enqueue_scripts', 'my_login_logo');

function my_login_logo_url()
{
	return home_url();
}
add_filter('login_headerurl', 'my_login_logo_url');

function my_login_logo_url_title()
{
	return 'The Flower Shop';
}
add_filter('login_headertext', 'my_login_logo_url_title');

add_editor_style();
add_theme_support('editor-styles');


// function to declare to add the dasboard widget
function wpdocs_add_dashboard_widgets()
{
	wp_add_dashboard_widget("dashboard_widget_example", "Tutorial", "dashboard_widget_function");
	// function to add a dashboard widget
	// 1st paramater is the id you want to set
	//2nd parameter is the text or heading
	// 3rd parameter is the dashboard widget content that you wanna call so
	// you can actually add content to it
}
add_action('wp_dashboard_setup', 'wpdocs_add_dashboard_widgets');
// modify the wp_dashboard_setup and add call the function your using


function dashboard_widget_function()
{
    // some echos to output the content
    echo "<p>Good luck with your website!</p>";
    // Correctly formatted embed URL
    echo '<iframe width="485" height="300" src="' . esc_url('https://www.youtube.com/embed/mwccL7fKGVs') . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
}


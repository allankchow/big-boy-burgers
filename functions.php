<?php

/**
 * Big Boy Burgers functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Big_Boy_Burgers
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
function bigboyburgers_theme_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Big Boy Burgers, use a find and replace
		* to change 'bigboyburgers-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('bigboyburgers-theme', get_template_directory() . '/languages');

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
			'menu-1' => esc_html__('Primary', 'bigboyburgers-theme'),
			'menu-2' => esc_html__('Primary-Mobile', 'bigboyburgers-theme'),
			'footer-menu' => esc_html__('Footer Menu', 'bigboyburgers'),
			'footer-socials' => esc_html__('Footer Socials', 'bigboyburgers'),
			'footer-info' => esc_html__('Footer Info', 'bigboyburgers'),
			'footer-legal' => esc_html__('Footer Legal', 'bigboyburgers'),
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
			'bigboyburgers_theme_custom_background_args',
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

	// Remove admin menu links for non-Administrator accounts
	function fwd_remove_admin_links()
	{
		if (!current_user_can('manage_options')) {
			remove_menu_page('edit.php');           // Remove Posts link
			remove_menu_page('edit-comments.php');  // Remove Comments link
		}
	}
	add_action('admin_menu', 'fwd_remove_admin_links');
}
add_action('after_setup_theme', 'bigboyburgers_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bigboyburgers_theme_content_width()
{
	$GLOBALS['content_width'] = apply_filters('bigboyburgers_theme_content_width', 640);
}
add_action('after_setup_theme', 'bigboyburgers_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bigboyburgers_theme_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'bigboyburgers-theme'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'bigboyburgers-theme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'bigboyburgers_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function bigboyburgers_theme_scripts()
{
	wp_enqueue_style('bigboyburgers-theme-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('bigboyburgers-theme-style', 'rtl', 'replace');

	wp_enqueue_script('bigboyburgers-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	// Import the combo selector code
	wp_enqueue_script('burger-combo-selector', get_template_directory_uri() . '/js/burgerComboSelector.js', array(), _S_VERSION, true);
	// Import the custom quantity input code
	wp_enqueue_script('custom-quantity-input', get_template_directory_uri() . '/js/quantityInput.js', array(), _S_VERSION, true);
	// Import the dynamic price calculation code
	wp_enqueue_script('product-total-price', get_template_directory_uri() . '/js/productTotalPrice.js', array(), _S_VERSION, true);
	// Import the product page accordion code
	wp_enqueue_script('product-accordion', get_template_directory_uri() . '/js/productAccordion.js', array(), _S_VERSION, true);
	// Import code which adds the fire icon to Suggested Items section on single product page
	wp_enqueue_script('add-fire-icon', get_template_directory_uri() . '/js/addFireIconToSuggestedItems.js', array(), _S_VERSION, true);
	// Import code which add "btn-primary" class to the "Save Changes" button in communication preferences page
	wp_enqueue_script('communication-preferences-btn', get_template_directory_uri() . '/js/addBtnPrimaryClass.js', array(), _S_VERSION, true);
	// overrides some default cart text
    wp_enqueue_script('cart-text-override', get_template_directory_uri() . '/js/cartTextOverride.js', array(), _S_VERSION, true);
	// adds active-category class to product category menu nav
	wp_enqueue_script('active-category-script', get_template_directory_uri() . '/js/activeCategory.js', array('jquery'), _S_VERSION, true);

	// Enqueue custom JavaScript file
	wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/custom-script.js', array(), null, true);


	// Dropdown menu
	wp_enqueue_script('footer-menu-toggle', get_template_directory_uri() . '/js/footerMenuToggle.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'bigboyburgers_theme_scripts');


// Add support for Wide and Full alignment options in the block editor
function bigboyburgers_alignment()
{
	add_theme_support('align-wide');
	add_theme_support('align-full');
}
add_action('after_setup_theme', 'bigboyburgers_alignment', 0);

/**
 * Register Custom Post Types & Customer Taxnomies
 */
require get_template_directory() . '/inc/cpt-taxonomy.php';

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

// Disable block editor
function disable_title_and_editor()
{
	remove_post_type_support('abb-testimonial', 'editor');

	remove_post_type_support('abb-founder', 'editor');

	remove_post_type_support('abb-location', 'editor');
}
add_action('init', 'disable_title_and_editor');

// Remove all dashboard metaboxes
function wporg_remove_all_dashboard_metaboxes()
{
	// Remove Welcome panel
	remove_action('welcome_panel', 'wp_welcome_panel');
	// Remove the rest of the dashboard widgets
	remove_meta_box('dashboard_primary', 'dashboard', 'side');
	remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
	remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
	remove_meta_box('health_check_status', 'dashboard', 'normal');
	remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
	// Remove Yoast SEO widgets
	remove_meta_box('wpseo-dashboard-overview', 'dashboard', 'side');
	remove_meta_box('yoast_db_widget', 'dashboard', 'normal');
	remove_meta_box('wpseo-wincher-dashboard-overview', 'dashboard', 'side');
	// Remove WP Mail SMTP
	remove_meta_box('wp_mail_smtp_reports_widget_lite', 'dashboard', 'normal');
	// Remove WooCommerce Setup
	remove_meta_box('wc_admin_dashboard_setup', 'dashboard', 'normal');
	// Remove Wordfence
	remove_meta_box('wordfence_activity_report_widget', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'wporg_remove_all_dashboard_metaboxes');

// Force the dashboard to two columns
function set_dashboard_columns($option, $user_id, $option_name)
{
	// Only override the screen layout option for the dashboard
	if ('screen_layout_dashboard' === $option_name) {
		return 2;  // Set the number of columns to 2
	}

	return $option;
}
add_filter('get_user_option_screen_layout_dashboard', 'set_dashboard_columns', 10, 3);

// Welcome widget
function custom_welcome_widget()
{
?>
	<p>Welcome to your Big Boy Burgers Dashboard!</p>
	<p>For any help related to your WooCommerce website, please refer to the documentation in the "Tutorials" widget on the dashboard.</p>
	<p>For any general questions regarding WordPress or WooCommerce, please refer to the documentation:</p>
	<ul>
		<li><a href="https://wordpress.org/documentation/">WordPress Documentation</a></li>
		<li><a href="https://woocommerce.com/documentation/woocommerce/">WooCommerce Documentation</a></li>
	</ul>
<?php
}

// Tutorials widget
function custom_tutorials_widget()
{
?>
	<p>Refer to these tutorials for guidance on how to use WordPress</p>
	<ul>
		<li><a href="https://bigboyburgers.bcitwebdeveloper.ca/wp-content/uploads/2024/05/Navigating-the-WordPress-Admin-Dashboard.pdf" target="_blank">Navigating the WordPress Admin Dashboard</a></li>
		<li><a href="https://bigboyburgers.bcitwebdeveloper.ca/wp-content/uploads/2024/05/Managing-WooCommerce-Online-Orders.pdf" target="_blank">Managing WooCommerce Online Orders</a></li>
		<li><a href="https://bigboyburgers.bcitwebdeveloper.ca/wp-content/uploads/2024/05/Managing-Products.pdf" target="_blank">Managing Products</a></li>
		<li><a href="https://bigboyburgers.bcitwebdeveloper.ca/wp-content/uploads/2024/05/Managing-Gift-Cards.pdf" target="_blank">Managing Gift Cards</a></li>
		<li><a href="https://bigboyburgers.bcitwebdeveloper.ca/wp-content/uploads/2024/05/Managing-Coupons.pdf" target="_blank">Managing Coupons</a></li>
		<li><a href="https://bigboyburgers.bcitwebdeveloper.ca/wp-content/uploads/2024/05/Email-Marketing-with-AutomateWoo.pdf" target="_blank">Email Marketing with AutomateWoo</a></li>
		<li><a href="https://bigboyburgers.bcitwebdeveloper.ca/wp-content/uploads/2024/05/Managing-Testimonials.pdf" target="_blank">Managing Testimonials</a></li>
	</ul>
<?php
}

function add_custom_dashboard_widgets()
{
	wp_add_dashboard_widget(
		'dashboard_welcome_message',         // Widget slug.
		'Welcome',         // Title.
		'custom_welcome_widget'  // Display function.
	);

	wp_add_dashboard_widget(
		'dashboard_tutorials',
		'Tutorials',
		'custom_tutorials_widget'
	);
}
add_action('wp_dashboard_setup', 'add_custom_dashboard_widgets');


// font import
wp_enqueue_style(
	'bbgs-montserrat',
	'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap',
	array(),
	null // Set null if loading multiple Google Fonts from their CDN
);
wp_enqueue_style(
	'bbgs-open_sans',
	'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap',
	array(),
	null // Set null if loading multiple Google Fonts from their CDN
);

wp_enqueue_style('custom-login', get_stylesheet_directory_uri() . '/style-login.css');

// Add Google Maps API key
function my_acf_init()
{
	acf_update_setting('google_api_key', 'AIzaSyCZKeADZ_2NoOUX_6nIEIZm3m3bRH4mP8w');
}
add_action('acf/init', 'my_acf_init');

// Change WordPress login image to be bbb logo
function my_login_logo()
{
?>
	<style type="text/css">
		#login h1 a,
		.login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/mascot-head.svg);
			height: 150px;
			width: 320px;
			background-size: 320px 150px;
			background-repeat: no-repeat;
			padding-bottom: 12px;
			object-fit: cover;
		}
	</style>
	<?php
}
add_action('login_enqueue_scripts', 'my_login_logo');

// Make login logo link to main page
function my_login_logo_url()
{
	return home_url();
}
add_filter('login_headerurl', 'my_login_logo_url');

function my_login_logo_url_title()
{
	return 'Big Boy Burgers';
}
add_filter('login_headertext', 'my_login_logo_url_title');

// Move yoast seo content to the bottom when creating new posts with acf
function adjust_yoast_seo_metabox_priority()
{
	global $wp_meta_boxes;

	// Check if Yoast SEO metabox exists and move it to a lower priority
	$post_types = get_post_types(array('public' => true));
	foreach ($post_types as $post_type) {
		if (isset($wp_meta_boxes[$post_type]['normal']['high']['wpseo_meta'])) {
			$yoast_metabox = $wp_meta_boxes[$post_type]['normal']['high']['wpseo_meta'];
			unset($wp_meta_boxes[$post_type]['normal']['high']['wpseo_meta']);
			$wp_meta_boxes[$post_type]['normal']['low']['wpseo_meta'] = $yoast_metabox;
		}
	}
}
add_action('add_meta_boxes', 'adjust_yoast_seo_metabox_priority', 20);


// change sorting of products in menu 2 page
function custom_sort_products_by_category($query)
{
	if (!is_admin() && is_shop() || is_product_category()) {
		$query->set('orderby', 'category');
		$query->set('order', 'ASC');
	}
}
add_action('woocommerce_product_query', 'custom_sort_products_by_category');

// Remove pagination
function show_all_products_on_shop_page()
{
	return -1;  // Return '-1' will display all products without pagination.
}
add_filter('loop_shop_per_page', 'show_all_products_on_shop_page', 20);

// remove number of results found on shop page and drop down sorting
function remove_woocommerce_result_count_ordering()
{
	remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
	remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
}
add_action('init', 'remove_woocommerce_result_count_ordering');

function add_custom_category_tabs()
{
	// Get all product categories excluding 'uncategorized'
	$product_categories = get_terms('product_cat', array(
		'hide_empty' => false,
		'exclude' => array(get_term_by('slug', 'uncategorized', 'product_cat')->term_id)
	));

	// Defining custom order for the categories
	$custom_order = ['burgers', 'sides', 'drinks', 'desserts', 'gift-cards', 'merch'];
	$ordered_categories = [];
	foreach ($custom_order as $slug) {
		foreach ($product_categories as $category) {
			if ($category->slug == $slug) {
				$ordered_categories[] = $category;
				break;
			}
		}
	}

	// Create links directly to category pages instead of using JavaScript
	if (!empty($ordered_categories) && !is_wp_error($ordered_categories)) {
		echo '<div class="product-categories-tabs">';
		foreach ($ordered_categories as $category) {
			$url = esc_url(get_term_link($category));
			echo sprintf('<a href="%s" class="category-link">%s</a>', $url, esc_html($category->name));
		}
		echo '</div>';
	}
}
add_action('woocommerce_before_shop_loop', 'add_custom_category_tabs', 5);

// Remove sidebars
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
function remove_default_wordpress_sidebar()
{
	unregister_sidebar('sidebar-1');
}
add_action('widgets_init', 'remove_default_wordpress_sidebar', 11); // Priority 11 to ensure it runs after the sidebar is registered

/*
	SINGLE PRODUCT ITEM PAGE HOOKS
*/
// Remove unnecessary details from the product item page
function remove_unwanted_product_page()
{
	// Remove product sale flash
	remove_action(
		'woocommerce_before_single_product_summary',
		'woocommerce_show_product_sale_flash',
		10
	);

	// Remove product rating
	remove_action(
		'woocommerce_single_product_summary',
		'woocommerce_template_single_rating',
		10
	);

	// Remove product meta data like categories, tags, and SKU
	remove_action(
		'woocommerce_single_product_summary',
		'woocommerce_template_single_meta',
		40
	);
}
add_action('init', 'remove_unwanted_product_page');

// Remove woocommerce breadcrumb nav
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

// Change the price of the Build Your Own Burger product to say "FROM: $x.xx"
function change_byob_price_display($price, $product)
{
	if ($product->get_id() == 367) {
		$price = '<span class="amount">FROM $' . $product->get_price() . '</span>';
	}
	return $price;
}
add_filter('woocommerce_get_price_html', 'change_byob_price_display', 20, 2);

/*
	SINGLE PRODUCT PAGE WRAPPER DIV
	WRAP THE woocommerce-product-gallery and entry-summary CONTENT IN A WRAPPER DIV (product-content-wrapper)
*/
function open_product_content_wrapper_div()
{
	echo '<div class="product-content-wrapper">';
}
add_action('woocommerce_before_single_product_summary', 'open_product_content_wrapper_div', 5);

// Add a link back to the product's category page
function add_back_link()
{
	global $product;

	// Get product categories
	$categories = wp_get_post_terms($product->get_id(), 'product_cat');
	if (!empty($categories)) {
		$category = $categories[0];			// This returns an array of categories, since items only have 1 category, select the first one
		$url = get_term_link($category); 	// link to the category page

	?>
		<div class="container back-link-container">
			<a class='back-link' href='<?php echo esc_url($url); ?>'>
				<?php include(get_template_directory() . '/assets/icon-arrow-left.php'); ?>
				<p><?php echo esc_html($category->name); ?></p>
			</a>
		</div>
		<?php
	}
}
add_action('woocommerce_before_single_product', 'add_back_link', 10);

function close_product_content_wrapper_div()
{
	echo '</div>';
}
add_action('woocommerce_after_single_product_summary', 'close_product_content_wrapper_div', 5);

/*
	SINGLE PRODUCT PAGE WRAPPER DIVS
	Wrap the product title, calorie count, and short description in a wrapper div
*/
// Open the wrapper div before the product title
function open_product_details_wrapper()
{
	echo '<div class="product-details-wrapper">';
}
add_action('woocommerce_single_product_summary', 'open_product_details_wrapper', 4);

// Add product title by modifying its existing action priority
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

// Add calories to product page
function add_calories_to_product_page()
{
	global $product;

	if (function_exists('get_field')) {
		$calories = get_field('calories', $product->get_id());

		if ($calories) {
			echo '<p class="product-calories">' . esc_html($calories) . '</p>';
		}
	}
}
add_action('woocommerce_single_product_summary', 'add_calories_to_product_page', 6);

// Ensure the short description stays within the wrapper
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 6);

// Close the wrapper div after the short description
function close_product_details_wrapper()
{
	echo '</div>';
}
add_action('woocommerce_single_product_summary', 'close_product_details_wrapper', 7);

// Add the custom container class to the single product page content
function add_custom_class_to_single_product($classes, $class, $product_id)
{
	if (is_product() && get_the_ID() == $product_id) {
		$classes[] = 'container';  // Add your custom class
	}
	return $classes;
}
add_filter('post_class', 'add_custom_class_to_single_product', 10, 3);

// Customize the product price
function modify_product_page_price()
{
	global $product;
	$price = $product->get_price_html();    // The price displayed in the HTML
	$base_price = $product->get_price();    // The price of the product

	// Also add a span which is hidden which holds the base price for the total price calculation
	$formatted_price = '<div class="total-price-container"><p class="small-heading">Total Price:</p>
						<h3 class="product-total-price">' . $price . '</h3>
						<span class="product-base-price" style="display:none;">' . $base_price . '</span></div>';

	echo $formatted_price;
}

// Move price in product single page
function move_product_page_price()
{
	// Remove item price, to re-add with lower priority
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);

	add_action('woocommerce_after_add_to_cart_quantity', 'modify_product_page_price', 11);
}
add_action('init', 'move_product_page_price');

// Change the product title to h2 rather than h1
function custom_woocommerce_template_single_title()
{
	// Output the product title in an h2 tag
	echo '<h2 class="product_title_entry_title">' . get_the_title() . '</h2>';
}

// Remove the default title tag and add the new h2 title
function modify_product_title_tag()
{
	// Remove title to re-add as a h2 tag
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

	add_action('woocommerce_single_product_summary', 'custom_woocommerce_template_single_title', 5);
}
add_action('init', 'modify_product_title_tag');

// Remove the "Details" and "Additional Information" sections in product item page
function remove_description_tab($tabs)
{
	unset($tabs['description']);  // Removes the description tab
	return $tabs;
}
add_filter('woocommerce_product_tabs', 'remove_description_tab', 98);

// Change "Add to cart" to "ORDER NOW"
function customize_add_to_cart_button_single_product()
{
	return 'ORDER NOW';
}
add_filter('woocommerce_product_single_add_to_cart_text', 'customize_add_to_cart_button_single_product');
add_filter('woocommerce_product_add_to_cart_text', 'customize_add_to_cart_button_single_product');

// Change "Related Products" to "Suggested Items"
function change_related_products_text()
{
	return 'Suggested Items';
}
add_filter('woocommerce_product_related_products_heading', 'change_related_products_text');

// Output 4 related products instead of 3 (default)
function custom_related_products_args($args)
{
	$args['posts_per_page'] = 4;  // Number of related products
	$args['columns'] = 4;         // Number of columns in the grid

	return $args;
}
add_filter('woocommerce_output_related_products_args', 'custom_related_products_args');

// Add a custom 'Add to Cart' button
function custom_add_to_cart_button()
{
	global $product;

	if ($product->get_id() == 367) {
		echo '<a class="btn-primary w-full" href="' . esc_url($product->add_to_cart_url()) . '">BUILD NOW</a>';
	} else {
		echo '<a class="btn-primary w-full" href="' . esc_url($product->add_to_cart_url()) . '">ADD TO CART</a>';
	}
}
// Remove the default 'Add to Cart' button in loops
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
add_action('woocommerce_after_shop_loop_item', 'custom_add_to_cart_button', 10);

// Add the ingredient and allergens information
function add_ingredients_and_allergens_to_product_page()
{
	global $product;

	if (function_exists('get_field')) {
		// Get the ingredients/allergens ACF field data
		$ingredients = get_field('ingredients', $product->get_id());
		$allergens = get_field('allergies', $product->get_id());

		// Output the ingredients/allergens in a accordion

		if ($ingredients || $allergens) {
		?>
			<section class='additional-information-section'>
				<?php
				if ($ingredients) {
				?>
					<div class='additional-information-container'>
						<button class='accordion-button'>
							<h2>ingredients</h2>
							<?php include(get_template_directory() . '/assets/icon-caret-down.php'); ?>
						</button>
						<div class='accordion-content'>
							<?php echo esc_html($ingredients); ?>
						</div>
					</div>
				<?php
				}

				if ($allergens) {
				?>
					<div class='additional-information-container'>
						<button class='accordion-button'>
							<h2>allergens</h2>
							<?php include(get_template_directory() . '/assets/icon-caret-down.php'); ?>
						</button>
						<div class='accordion-content'>
							<?php echo esc_html($allergens); ?>
						</div>
					</div>
				<?php
				}
				?>
			</section>
		<?php
		}
	}
}
add_action('woocommerce_single_product_summary', 'add_ingredients_and_allergens_to_product_page', 31);

// Add the material information
function add_materials_to_product_page()
{
	global $product;

	if (function_exists('get_field')) {
		$materials = get_field('materials', $product->get_id());

		if ($materials) {
		?>
			<section class='additional-information-section'>
				<div class='additional-information-container'>
					<button class='accordion-button'>
						<h2>materials</h2>
						<?php include(get_template_directory() . '/assets/icon-caret-down.php'); ?>
					</button>
					<div class='accordion-content'>
						<?php echo  esc_html($materials); ?>
					</div>
				</div>
			</section>
		<?php
		}
	}
}
add_action('woocommerce_single_product_summary', 'add_materials_to_product_page', 31);

// Display all of the products given the category slug, output the sides and drinks options on the burger item page
function list_products_by_category($category)
{
	// Specify the order in which is display the sides/drink add-ons
	$custom_order_ids;
	if ($category === 'sides') {
		// Fries, Sweet Potatao Fries, Onion RIngs, Poutine, Nachos
		$custom_order_ids = ['59', '65', '64', '63', '66'];
	} else if ($category === 'drinks') {
		// Coke, Spirte, Nestea, Root Beer, Vanilla Milkshake, Strawberry Milkshake
		$custom_order_ids = ['67', '68', '72', '71', '311', '308'];
	}

	// Query and get the product CPT
	$args = array(
		'post_type' => 'product',
		'posts_per_page' => -1,
		'product_cat' => $category,
		'post__in' => $custom_order_ids,
		'orderby' => 'post__in'
	);
	$query = new WP_Query($args);
	if ($query->have_posts()) {
		echo '<div class="add-ons-option-container" data-product-category="' . esc_html($category) . '">';
		while ($query->have_posts()) {
			$query->the_post();
			global $product;
			$inputName = ($category == 'sides' ? 'selected_side' : 'selected_drink');
			$price_html = $product->get_price_html();
		?>
			<div class='add-on-option'>
				<input type='radio' id='add-on-<?php echo esc_attr($product->get_id()); ?>' class='add-on-radio' name='<?php echo $inputName; ?>' value='<?php echo esc_attr($product->get_id()); ?>'>
				<label for='add-on-<?php echo esc_attr($product->get_id()); ?>'>
					<div class='add-on-label'>
						<img src='<?php echo get_the_post_thumbnail_url($product->get_id(), 'thumbnail'); ?>' alt='<?php echo get_the_title(); ?>' />
						<p class='add-on-name'><?php echo get_the_title(); ?></p>
						<p class='add-on-price'><?php echo $price_html; ?></p>
					</div>
				</label>
			</div>
		<?php
		}
		echo '</div>';
	}
	wp_reset_postdata();
}

// Add sides and drink options to the Add to Cart form
function add_sides_and_drinks_options()
{
	global $product;

	// Check if product is burger category
	if (has_term('burgers', 'product_cat', $product->get_id())) {
		?>
		<section class='add-ons-section'>
			<p>Why not make it a combo? (Get automatic 15% discount at checkout).</p>
			<div>
				<p class='add-ons-title small-heading'>Sides:</p>
				<?php list_products_by_category('sides'); ?>
			</div>
			<div>
				<p class='add-ons-title small-heading'>Drinks:</p>
				<?php list_products_by_category('drinks'); ?>
			</div>
		</section>
	<?php
	}
}
add_action('woocommerce_after_add_to_cart_quantity', 'add_sides_and_drinks_options', 10);

// Add selected add-ons to the cart
function handle_add_on_products_to_cart($cart_item_key, $product_id, $quantity, $variation_id, $variation, $cart_item_data)
{
	// Handle the selected side
	if (!empty($_POST['selected_side'])) {
		$selected_side_id = sanitize_text_field($_POST['selected_side']);
		if (!isset($_SESSION['added_to_cart'][$selected_side_id])) { // Prevent duplicate additions
			$_SESSION['added_to_cart'][$selected_side_id] = true;
			WC()->cart->add_to_cart($selected_side_id, $quantity);
		}
	}

	// Handle the selected drink
	if (!empty($_POST['selected_drink'])) {
		$selected_drink_id = sanitize_text_field($_POST['selected_drink']);
		if (!isset($_SESSION['added_to_cart'][$selected_drink_id])) { // Prevent duplicate additions
			$_SESSION['added_to_cart'][$selected_drink_id] = true;
			WC()->cart->add_to_cart($selected_drink_id, $quantity);
		}
	}
}
add_action('woocommerce_add_to_cart', 'handle_add_on_products_to_cart', 10, 6);

// Add a custom quantity input field with +/- increment/decrement buttons
function add_custom_quantity_field()
{
	global $product;

	ob_start();
	?>
	<div class='quantity custom-quantity buttons_added'>
		<p class='small-heading'>Quantity:</p>
		<div class='quantity-button-container'>
			<button type='button' class='custom-quantity-minus' value='-'>
				<?php include(get_template_directory() . '/assets/icon-minus-sign.php'); ?>
			</button>
			<input type='number' class='custom-quantity-input' step='1' min='1' max='50' name='custom-quantity' value='1' size='4' inputmode='numeric' readonly>
			<button type='button' class='custom-quantity-plus' value='+'>
				<?php include(get_template_directory() . '/assets/icon-plus-sign.php'); ?>
			</button>
		</div>
	</div>
<?php
	echo ob_get_clean();
}
add_action('woocommerce_before_add_to_cart_button', 'add_custom_quantity_field', 10);

// Remove the default quantity input
function remove_default_quantity_input($args, $product)
{
	$args['max_value'] = 1;   // Set maximum value to 1
	$args['min_value'] = 1;   // Set minimum value to 1
	$args['input_value'] = 1; // Set starting value to 1
	return $args;
}
add_filter('woocommerce_quantity_input_args', 'remove_default_quantity_input', 10, 2);

// Customize the product article title and price to output in a wrapper div
function custom_product_article_title_and_price()
{
	echo '<div class="">';
	echo '<h4 class="woocommerce-loop-product__title">' . get_the_title() . '</h4>';    // Replace default h2 product title wiht h4
	woocommerce_template_loop_price();
	echo '</div>';
}

// Replace default product article title and price with custom one
function modify_product_article_title_and_price()
{
	remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
	remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);

	add_action('woocommerce_shop_loop_item_title', 'custom_product_article_title_and_price', 10);
}
add_action('init', 'modify_product_article_title_and_price');

// Automatic meal set discount
function apply_meal_set_discount()
{
	$cart = WC()->cart;
	$meal_sets = [];

	// Temporary storage to hold products by categories with quantities
	$products_by_category = [
		'burgers' => [],
		'sides' => [],
		'drinks' => []
	];

	// Sort items into categories and respect quantities
	foreach ($cart->get_cart() as $cart_item_key => $cart_item) {
		$product_id = $cart_item['product_id'];
		$product_qty = $cart_item['quantity'];
		$terms = get_the_terms($product_id, 'product_cat');

		if ($terms) {
			foreach ($terms as $term) {
				if (isset($products_by_category[$term->slug])) {
					// Store item key and remaining quantity
					$products_by_category[$term->slug][] = ['key' => $cart_item_key, 'qty' => $product_qty];
				}
			}
		}
	}

	// Build complete meal sets accounting for quantities
	while (!empty($products_by_category['burgers']) && !empty($products_by_category['sides']) && !empty($products_by_category['drinks'])) {
		$burger = &$products_by_category['burgers'][0];
		$side = &$products_by_category['sides'][0];
		$drink = &$products_by_category['drinks'][0];

		$meal_sets[] = [
			'burger' => $burger['key'],
			'side'   => $side['key'],
			'drink'  => $drink['key']
		];

		// Decrement quantities and remove entries if depleted
		foreach (['burgers', 'sides', 'drinks'] as $category) {
			if (--$products_by_category[$category][0]['qty'] <= 0) {
				array_shift($products_by_category[$category]);
			}
		}
	}

	// Calculate the discount for each set
	$discount_total = 0;
	foreach ($meal_sets as $set) {
		foreach ($set as $category => $cart_item_key) {
			$cart_item = $cart->get_cart()[$cart_item_key];
			$discount_per_item = ($cart_item['data']->get_price()) * 0.15;
			$discount_total += $discount_per_item;
		}
	}

	// Apply the total discount as a single fee
	if ($discount_total > 0) {
		$cart->add_fee('Complete Meal Set Discount 15% (' . count($meal_sets) . ')', -$discount_total, true);
	}
}
add_action('woocommerce_cart_calculate_fees', 'apply_meal_set_discount', 20);


/*
	CART & CHECKOUT PAGE
*/
// Add the custom container class to the cart & checkout page
function add_custom_class_to_cart_and_checkout_page($classes, $class, $post_id)
{
	// Check if the current post is the cart page with ID 22 or checkout page with ID 23
	if ((is_cart() && $post_id == 22) || (is_checkout() && $post_id == 23)) {
		$classes[] = 'container'; // Add your custom class name here
	}
	return $classes;
}
add_filter('post_class', 'add_custom_class_to_cart_and_checkout_page', 10, 3);


// product category page return to menu button 
function add_return_to_menu_button()
{
	if (is_shop() || is_product_category()) {
		// Get all pages and find the one with 'menu' in the slug
		$pages = get_pages();
		$menu_url = '';

		foreach ($pages as $page) {
			if (strpos($page->post_name, 'menu') !== false) {
				$menu_url = get_permalink($page->ID);
				break;
			}
		}

		if (!empty($menu_url)) {
			echo '<div class="return-to-menu"><a href="' . $menu_url . '">Menu</a></div>';
		}
	}
}
add_action('woocommerce_before_main_content', 'add_return_to_menu_button', 15);


// Remove admin menu links for non-Administrator accounts
function abb_remove_admin_links()
{
	if (!current_user_can('manage_options')) {
		remove_menu_page('edit.php');           // Remove Posts link
		remove_menu_page('edit-comments.php');  // Remove Comments link
		remove_menu_page('edit.php?post_type=abb-founder');   // Remove abb-founder CPT link
		remove_menu_page('edit.php?post_type=abb-location');   // Remove abb-location CPT link
		remove_menu_page('edit.php?post_type=page');    // Remove Pages link
		remove_menu_page('themes.php');                 // Remove Appearance link
		remove_menu_page('users.php');                  // Remove Users link
		remove_menu_page('tools.php');                  // Remove Tools link
	}
}
add_action('admin_menu', 'abb_remove_admin_links');

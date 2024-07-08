<!-- Custom loop to display menu categories -->
<?php
// Get all of the product categories
$product_categories = get_terms(array(
    'taxonomy' => 'product_cat',
    'hide_empty' => false
));

// Define the category names for each section
$all_day_menu = ['Burgers', 'Sides', 'Drinks', 'Desserts'];
$merch = ['Gift Cards', 'Merch'];

$menu_title = 'All Day Menu';
$merch_title = 'Big Boy Gift\'s and Merchandise';

// Outputs the product articles
function display_categories($desired_categories, $product_categories) {
    // Create an associative array to hold the sorted categories
    $sorted_categories = array();
    foreach ($product_categories as $category) {
        if (in_array($category->name, $desired_categories)) {
            // Use the category name as a key and assign the category object
            $sorted_categories[$category->name] = $category;
        }
    }

    // Loop through all of the product categories
    foreach ($desired_categories as $category_name) {
        if (array_key_exists($category_name, $sorted_categories)) {
            $category = $sorted_categories[$category_name];
            $thumbnail_id = get_woocommerce_term_meta($category->term_id, 'thumbnail_id', true);
            $shop_catalog_img = wp_get_attachment_image_src($thumbnail_id, 'shop_catalog');
            $url = esc_url(get_term_link($category));

            ?>
                <article class='category-article'>
                    <a href='<?php echo $url; ?>'>
                        <div class='image-container <?php echo str_replace(" ", "-", strtolower($category_name)); ?>'>
                            <img src='<?php echo esc_url($shop_catalog_img[0]); ?>' alt='<?php echo esc_attr($category->name); ?>' />
                        </div>
                        <h4><?php echo esc_html($category->name); ?></h4>
                    </a>
                </article>
            <?php
        }
    }
}

if ( !empty($product_categories) && !is_wp_error($product_categories) ) {
    ?>
    <div class='menu-page container'>
        <div class='menu-category-container'>
            <h2><?php echo $menu_title; ?></h2>
            <div class='menu-category-grid'>
                <?php display_categories($all_day_menu, $product_categories); ?>
            </div>
        </div>
        <div class='menu-category-container'>
            <h2><?php echo $merch_title; ?></h2>
            <div class='menu-category-grid'>
                <?php display_categories($merch, $product_categories); ?>
            </div>
        </div>
        
    </div>
    <?php
}
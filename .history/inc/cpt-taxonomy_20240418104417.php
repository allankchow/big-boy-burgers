<?php
function abb_register_custom_post_types()
{
    // Register Testimonials
    $labels = array(
        'name'                  => _x('Testimonials', 'post type general name'),
        'singular_name'         => _x('Testimonial', 'post type singular name'),
        'menu_name'             => _x('Testimonials', 'admin menu'),
        'name_admin_bar'        => _x('Testimonial', 'add new on admin bar'),
        'add_new'               => _x('Add New', 'testimonial'),
        'add_new_item'          => __('Add New Testimonial'),
        'new_item'              => __('New Testimonial'),
        'edit_item'             => __('Edit Testimonial'),
        'view_item'             => __('View Testimonial'),
        'all_items'             => __('All Testimonials'),
        'search_items'          => __('Search Testimonials'),
        'parent_item_colon'     => __('Parent Testimonials:'),
        'not_found'             => __('No testimonials found.'),
        'not_found_in_trash'    => __('No testimonials found in Trash.'),
        'archives'              => __('Testimonial Archives'),
        'insert_into_item'      => __('Insert into testimonial'),
        'uploaded_to_this_item' => __('Uploaded to this testimonial'),
        'filter_item_list'      => __('Filter testimonials list'),
        'items_list_navigation' => __('Testimonials list navigation'),
        'items_list'            => __('Testimonials list'),
        'featured_image'        => __('Testimonial featured image'),
        'set_featured_image'    => __('Set testimonial featured image'),
        'remove_featured_image' => __('Remove testimonial featured image'),
        'use_featured_image'    => __('Use as featured image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'testimonials'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-testimonial',
        'template_lock'      => 'all'
    );
    register_post_type('abb-testimonial', $args);

    // Register Founders
    $labels = array(
        'name'                  => _x('Founders', 'post type general name'),
        'singular_name'         => _x('Founder', 'post type singular name'),
        'menu_name'             => _x('Founders', 'admin menu'),
        'name_admin_bar'        => _x('Founder', 'add new on admin bar'),
        'add_new'               => _x('Add New', 'founder'),
        'add_new_item'          => __('Add New Founder'),
        'new_item'              => __('New Founder'),
        'edit_item'             => __('Edit Founder'),
        'view_item'             => __('View Founder'),
        'all_items'             => __('All Founders'),
        'search_items'          => __('Search Founders'),
        'parent_item_colon'     => __('Parent Founders:'),
        'not_found'             => __('No founders found.'),
        'not_found_in_trash'    => __('No founders found in Trash.'),
        'archives'              => __('Founder Archives'),
        'insert_into_item'      => __('Insert into founder'),
        'uploaded_to_this_item' => __('Uploaded to this founder'),
        'filter_item_list'      => __('Filter founders list'),
        'items_list_navigation' => __('Founders list navigation'),
        'items_list'            => __('Founders list'),
        'featured_image'        => __('Founder featured image'),
        'set_featured_image'    => __('Set founder featured image'),
        'remove_featured_image' => __('Remove founder featured image'),
        'use_featured_image'    => __('Use as featured image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'founders'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-groups',
        'template_lock'      => 'all'
    );
    register_post_type('abb-founder', $args);

    // Register Location CPT
    $labels = array(
        'name'                  => _x('Locations', 'post type general name'),
        'singular_name'         => _x('Location', 'post type singular name'),
        'menu_name'             => _x('Locations', 'admin menu'),
        'name_admin_bar'        => _x('Location', 'add new on admin bar'),
        'add_new'               => _x('Add New', 'Location'),
        'add_new_item'          => __('Add New Location'),
        'new_item'              => __('New Location'),
        'edit_item'             => __('Edit Location'),
        'view_item'             => __('View Location'),
        'all_items'             => __('All Locations'),
        'search_items'          => __('Search Locations'),
        'parent_item_colon'     => __('Parent Locations:'),
        'not_found'             => __('No locations found.'),
        'not_found_in_trash'    => __('No locations found in Trash.'),
        'archives'              => __('Location Archives'),
        'insert_into_item'      => __('Insert into location'),
        'uploaded_to_this_item' => __('Uploaded to this location'),
        'filter_item_list'      => __('Filter locations list'),
        'items_list_navigation' => __('Locations list navigation'),
        'items_list'            => __('Locations list'),
        'featured_image'        => __('Location featured image'),
        'set_featured_image'    => __('Set location featured image'),
        'remove_featured_image' => __('Remove location featured image'),
        'use_featured_image'    => __('Use as featured image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'locations'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-location',
        'template_lock'      => 'all'
    );
    register_post_type('abb-location', $args);


    // Register CTA-Article CPT
    $labels = array(
        'name'                  => _x('CTA-Articles', 'post type general name'),
        'singular_name'         => _x('CTA-Article', 'post type singular name'),
        'menu_name'             => _x('CTA-Articles', 'admin menu'),
        'name_admin_bar'        => _x('CTA-Article', 'add new on admin bar'),
        'add_new'               => _x('Add New', 'CTA-Article'),
        'add_new_item'          => __('Add New CTA-Article'),
        'new_item'              => __('New CTA-Article'),
        'edit_item'             => __('Edit CTA-Article'),
        'view_item'             => __('View CTA-Article'),
        'all_items'             => __('All CTA-Articles'),
        'search_items'          => __('Search CTA-Articles'),
        'parent_item_colon'     => __('Parent CTA-Articles:'),
        'not_found'             => __('No cta-articles found.'),
        'not_found_in_trash'    => __('No cta-articles found in Trash.'),
        'archives'              => __('CTA-Article Archives'),
        'insert_into_item'      => __('Insert into cta-article'),
        'uploaded_to_this_item' => __('Uploaded to this cta-article'),
        'filter_item_list'      => __('Filter cta-articles list'),
        'items_list_navigation' => __('CTA-Articles list navigation'),
        'items_list'            => __('CTA-Articles list'),
        'featured_image'        => __('CTA-Article featured image'),
        'set_featured_image'    => __('Set cta-article featured image'),
        'remove_featured_image' => __('Remove cta-article featured image'),
        'use_featured_image'    => __('Use as featured image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'cta-articles'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 8,
        'menu_icon'          => 'dashicons-align-center',
        'template_lock'      => 'all'
    );
    register_post_type('abb-cta-article', $args);
}
add_action("init", "abb_register_custom_post_types");

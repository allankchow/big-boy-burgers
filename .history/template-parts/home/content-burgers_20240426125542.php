<div class="container botm-container">
    <div class="heading-icon">
        <?php
        echo wp_get_attachment_image(228, [36, 36], true);
        ?>
        <h2>BURGER OF THE MONTH</h2>
    </div>
    <div class="botm-content">
        <?php
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => 4,
            'order'          => 'ASC',
            'tax_query'      => array(
                array(
                    'taxonomy' => 'product_tag',
                    'field'    => 'slug',
                    'terms'    => 'burger-of-the-month',

                ),
            ),
        );

        $products = new WP_Query($args);

        if ($products->have_posts()) :
            while ($products->have_posts()) :
                $products->the_post();
                $product = wc_get_product(get_the_ID());
                $categories = get_the_terms($product->get_id(), 'product_cat');
                $cat_class = '';
                if ($categories && !is_wp_error($categories)) {
                    $cat_class = array();
                    foreach ($categories as $category) {
                        $cat_class[] = $category->slug;
                    }
                    $cat_class = join(' ', $cat_class);
                }
        ?>
                <div class="product-card">
                    <div class="product-image <?php echo esc_attr($cat_class); ?>">
                        <a href="<?php echo esc_url(get_permalink($product->get_id())); ?>"></a>
                        <?php the_post_thumbnail(); ?>

                    </div>
                    <div class=" product-content">
                        <h4><?php the_title(); ?></h4>
                        <div class="product-price">
                            <?php echo $product->get_price_html(); ?>
                        </div><a class="btn-primary w-full" href="<?php echo esc_url($product->add_to_cart_url()); ?>">Add to Cart</a>
                    </div>


                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo 'No products found.';
        endif;

        ?>
    </div>


</div>
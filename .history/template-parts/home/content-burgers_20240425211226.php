<div class="container founder-container">
    <div class="heading-icon">
        <?php
        echo wp_get_attachment_image(228, [36, 36], true);
        ?>
        <h2>Who are we</h2>
    </div>
    <div class="founder-content-container">
        <?php
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => 4, // Change this number if you want to display more or fewer products
            'tax_query'      => array(
                array(
                    'taxonomy' => 'product_tag',
                    'field'    => 'slug',
                    'terms'    => 'burger-of-the-month', // Change this to your actual tag slug
                ),
            ),
        );

        $products = new WP_Query($args);

        if ($products->have_posts()) :
            while ($products->have_posts()) :
                $products->the_post();
        ?>
                <div class="product">
                    <div class="product-image">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <h2><?php the_title(); ?></h2>
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
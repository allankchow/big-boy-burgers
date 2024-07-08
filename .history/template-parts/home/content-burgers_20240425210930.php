<div class="container founder-container">
    <div class="heading-icon">
        <?php
        echo wp_get_attachment_image(228, [36, 36], true);
        ?>
        <h2>Who are we</h2>
    </div>
    <div class="founder-content-container">

        To render out products with a specific tag (in this case, "botm") on your WordPress front page using Visual Studio Code (VSC), you'll typically need to modify your WordPress theme files. Here's a basic guide on how to do it:

        Access Your Theme Files: You'll need to access the theme files of your WordPress website. You can do this via FTP or through your hosting provider's file manager.
        Navigate to the Front Page Template: Look for the template file responsible for rendering your front page. This could be front-page.php, home.php, or index.php, depending on your theme.
        Edit the Template File: Open the chosen template file in your code editor (like Visual Studio Code).
        Add Code to Retrieve Products with "botm" Tag: Inside the template file, you'll need to write PHP code to retrieve and display products with the "botm" tag. You can use the WP_Query class to achieve this. Here's a sample code snippet:
        php
        Copy code
        <?php
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => 4,
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
        ?>
                <div class="product">
                    <h2><?php the_title(); ?></h2>
                    <div class="product-content">
                        <?php the_content(); ?>
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
<div class="testimonial-wrapper">
    <div class="testimonial-content-container">
        <?php
        $testimonial_query = new WP_Query(array(
            'post_type' => 'abb-testimonial',
            'posts_per_page' => -1,
        ));

        if ($testimonial_query->have_posts()) {
            while ($testimonial_query->have_posts()) {
                $testimonial_query->the_post();
                $testimonial_quote = get_field('quote');
                $testimonial_name = get_field('customer_name');

                echo "<div class='testimonial-item' >";

                if ($testimonial_name) {
                    echo '<h4 class="">' . $testimonial_name . '</h4>';
                }
                if ($testimonial_quote) {
                    echo '<p class="text-lg">' . $testimonial_quote . '</p>';
                }

                echo "</div>";
            }
            wp_reset_postdata();
        }
        ?>
    </div>

</div>

<div class="newspaper-wrapper">
    <div class="container">

        <div class="testimonial-image-1 testimonial-image">
            <?php
            echo wp_get_attachment_image(259, 'full', false);
            ?>
        </div>
        <div class="testimonial-image-2 testimonial-image">
            <?php
            echo wp_get_attachment_image(260, 'full', false);
            ?>
        </div>
        <div class="testimonial-image-3 testimonial-image">
            <?php
            echo wp_get_attachment_image(261, 'full', false);
            ?>
        </div>
        <div class="testimonial-image-4 testimonial-image">
            <?php
            echo wp_get_attachment_image(262, 'full', false);
            ?>
        </div>
    </div>

</div>
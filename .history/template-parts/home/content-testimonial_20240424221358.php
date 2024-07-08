<div class="testimonial-wrapper">
    <div class="founder-content-container">

        <?php
        $founder_query = new WP_Query(array(
            'post_type' => 'abb-testimonial',
            'posts_per_page' => -1,
        ));

        if ($founder_query->have_posts()) {
            while ($founder_query->have_posts()) {
                $founder_query->the_post();
                $founder_image = get_field('founder_image');
                $founder_name = get_field('name');
                $founder_description = get_field('description');

                echo "<div class='flex-col flex gap-4' >";

                if ($founder_name) {
                    echo '<h4 class="">' . $founder_name . '</h4>';
                }
                if ($founder_description) {
                    echo '<p class="text-lg">' . $founder_description . '</p>';
                }

                echo "</div>";
            }
            wp_reset_postdata();
        }
        ?>
    </div>
    <div class="testimonial-item">

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
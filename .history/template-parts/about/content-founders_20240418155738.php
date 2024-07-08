<div class="container">
    <h4>Who are we</h4>
    <div class="founder-content-container">
        <?php
        $founder_query = new WP_Query(array(
            'post_type' => 'abb-founder',
            'posts_per_page' => -1,
        ));

        if ($founder_query->have_posts()) {
            while ($founder_query->have_posts()) {
                $founder_query->the_post();
                $founder_image = get_field('founder_image');
                $founder_name = get_field('name');
                $founder_description = get_field('description');

                echo "<div class='flex-col flex gap-4' >";
                if ($founder_image) {
                    $image_url = $founder_image['url'];
                    $image_alt = $founder_image['alt'];
                    echo '<img class="founder_image" src="' . esc_url($image_url) . '" alt="' . esc_attr($image_alt) . '">';
                }

                echo "<div class='flex-col flex' >";
                if ($founder_name) {
                    echo '<h4 class="">' . $founder_name . '</h4>';
                }
                if ($founder_description) {
                    echo '<p class="text-lg">' . $founder_description . '</p>';
                }
                echo "</div>";

                echo "</div>";
            }
            wp_reset_postdata();
        }
        ?>
    </div>


</div>
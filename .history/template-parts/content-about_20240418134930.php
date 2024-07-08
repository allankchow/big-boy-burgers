<div class="container">
    <?php

    // $founder_title = get_field('founder_title');

    // $founder_1_image = get_field('founder_1_image');
    // $founder_1_title = get_field('founder_1_title');
    // $founder_1_role = get_field('founder_1_role');

    // if ($founder_title) {
    //     echo '<h2 class="">' . $founder_title . '</h2>';
    // }

    // if ($founder_1_image) {
    //     echo wp_get_attachment_image($founder_1_image, 'full');
    // }

    // if ($founder_1_title) {
    //     echo '<h4 class="">' . $founder_1_title . '</h4>';
    // }

    // if ($founder_1_role) {
    //     echo '<h4 class="">' . $founder_1_role . '</h4>';
    // }
    ?>
    <?php
    $founder_query = new WP_Query(array(
        'post_type' => 'abb-founder',
        'posts_per_page' => -1, // -1 to retrieve all posts
    ));

    if ($founder_query->have_posts()) {
        while ($founder_query->have_posts()) {
            $founder_query->the_post();
            $founder_image = get_field('founder_image');
            $founder_name = get_field('name');
            $founder_description = get_field('description');
            if ($founder_image) {
                echo wp_get_attachment_image($founder_image, 'full');
            }
            if ($founder_name) {
                echo '<h4 class="">' . $founder_name . '</h4>';
            }
            if ($founder_description) {
                echo '<h4 class="">' . $founder_description . '</h4>';
            }
        }
        wp_reset_postdata();
    }
    ?>

</div>
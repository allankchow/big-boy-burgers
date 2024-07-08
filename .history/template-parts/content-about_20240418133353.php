<div class="container">
    <?php

    $founder_title = get_field('founder_title');

    $founder_1_image = get_field('founder_1_image');
    $founder_1_title = get_field('founder_1_title');
    $founder_1_role = get_field('founder_1_role');
    $founder_1_role = get_field('founder_1_role');

    if ($founder_title) {
        echo '<h2 class="">' . $founder_title . '</h2>';
    }

    if ($founder_1_image) {
        echo wp_get_attachment_image($founder_1_image, 'full');
    }

    if ($founder_1_title) {
        echo '<h4 class="">' . $founder_1_title . '</h4>';
    }

    if ($founder_1_title) {
        echo '<h4 class="">' . $founder_1_title . '</h4>';
    }
    ?>

</div>
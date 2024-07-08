<div class="container">
    <?php

    $founder_title = get_field('founder_title');
    $founder_1_image = get_field('founder_1_image');

    if ($founder_title) {
        echo '<h2 class="custom-text">' . $founder_title . '</h2>';
    }
    ?>
</div>
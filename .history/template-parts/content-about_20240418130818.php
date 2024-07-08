<?php

$custom_text = get_field('founder_title');

if ($custom_text) {
    echo '<div class="custom-text">' . $custom_text . '</div>';
}

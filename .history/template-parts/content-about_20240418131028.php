<div class=""></div>
<?php

$founder_title = get_field('founder_title');

if ($founder_title) {
    echo '<div class="custom-text">' . $founder_title . '</div>';
}
?>
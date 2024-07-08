<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Big_Boy_Burgers
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    get_template_part('template-parts/about/content', 'banner');

    get_template_part('template-parts/about/content', 'founders');

    get_template_part('template-parts/about/content', 'media-great');

    get_template_part('template-parts/about/content', 'media-fresh');

    get_template_part('template-parts/about/content', 'media-happy-hour');

    get_template_part('template-parts/about/content', 'media-menu');


    ?>

</main><!-- #main -->

<?php
get_footer();

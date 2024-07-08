<?php
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

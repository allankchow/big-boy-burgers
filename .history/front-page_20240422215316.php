<?php
get_header();
?>

<main id="primary" class="site-main">

    <?php
    get_template_part('template-parts/home/content', 'banner');

    get_template_part('template-parts/home/content', 'burgers');

    get_template_part('template-parts/home/content', 'two_cards');




    ?>

</main><!-- #main -->

<?php
get_footer();

<?php
get_header();
?>

<main id="primary" class="site-main">

    <?php
    get_template_part('template-parts/home/content', 'banner');

    get_template_part('template-parts/home/content', 'burgers');

    get_template_part('template-parts/home/content', 'two_cards');

    get_template_part('template-parts/home/content', 'first_order');

    get_template_part('template-parts/home/content', 'testimonial');
    ?>

    <div class="instagram-feed">
        <?php echo do_shortcode('[instagram-feed feed=1]'); ?>
    </div>

</main><!-- #main -->

<?php
get_footer();

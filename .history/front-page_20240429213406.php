<?php
get_header();
?>

<main id="primary" class="site-main">

    <?php
    get_template_part('template-parts/home/content', 'banner');

    get_template_part('template-parts/home/content', 'testimonial');

    get_template_part('template-parts/home/content', 'burgers');

    get_template_part('template-parts/home/content', 'two_cards');

    get_template_part('template-parts/home/content', 'first_order');


    ?>


    <div class="instagram-feed container">
        <div class="heading-icon">
            <?php
            echo wp_get_attachment_image(228, [36, 36], true);
            ?>
            <h2>CHECK IN WITH US</h2>
        </div>
        <?php echo do_shortcode('[instagram-feed feed=2]'); ?>
    </div>

</main><!-- #main -->

<?php
get_footer();

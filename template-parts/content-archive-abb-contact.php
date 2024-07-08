<?php
/**
 * Template part for displaying page content in content-archive-abb-contact.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Big_Boy_Burgers
 */
?>

<section class="contact-wrapper">
    
    <h1>Contact</h1>
    <div class="google-maps">
        <?php
        // Display Google Maps
        echo do_shortcode('[wpgmza id="1"]'); 
        ?>
    </div>

    <?php
    // Query locations
    $location_query = new WP_Query(array(
        'post_type'      => 'abb-location',
        'posts_per_page' => -1,
    ));
    // Display Location Content
    if ($location_query->have_posts()) :
    ?>
        <div class="location-posts">
            <?php
            while ($location_query->have_posts()) : $location_query->the_post();
            ?>
                <div class="location-post">
                    <h2><?php the_title(); ?></h2>
                    <div class="location-content">
                        <p><strong>Hours:</strong> <?php echo get_field('hours'); ?></p>
                        <p><strong>Address:</strong> <?php echo get_field('address'); ?></p>
                        <p><strong>Telephone:</strong> <?php echo get_field('telephone'); ?></p>
                    </div>
                </div>
            <?php
            endwhile;
            ?>
        </div>
    <?php
        wp_reset_postdata();
    endif;
    ?>
</section>
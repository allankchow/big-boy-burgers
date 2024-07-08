<?php
/**
 * The template for displaying the menu page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Big_Boy_Burgers
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/content', 'menu-page' );
            endwhile; // End of the loop.
        else:
            get_template_part( 'template-parts/content', 'none' );
        endif;
		?>

	</main><!-- #main -->

<?php
get_footer();

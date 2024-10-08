<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Big_Boy_Burgers
 */

get_header();
?>

<main id="primary" class="site-main">

    <section class="error-404 not-found">

        <div class="page-content">
			<h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'bigboyburgers-theme'); ?></h1>
            <p><?php esc_html_e('It looks like nothing was found on this page. Click below to go back to home.', 'bigboyburgers-theme'); ?></p>
            <button class="btn-primary" onclick="window.location.href='<?php echo esc_url( home_url() ); ?>'"><?php esc_html_e('Back to Home', 'bigboyburgers-theme'); ?></button>
        </div><!-- .page-content -->
    </section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
?>
<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Big_Boy_Burgers
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-content">
			<div class="footer-logo">
				<a href="<?php echo home_url(); ?>">
					<?php get_template_part( '/assets/logo-lettermark-white' ); ?>
				</a>
			</div>

			<section class="footer-links">
				<nav class ="footer-menu">
					<button>
						<h4>Menu</h4>
						<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
							<title>Accordion Arrow</title>
							<path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"/>
						</svg>
					</button>
					<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
				</nav>

				<nav class="footer-socials">
					<button>
						<h4>Social Media</h4>
						<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
							<title>Accordion Arrow</title>
							<path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"/>
						</svg>
					</button>
					<?php wp_nav_menu( array( 'theme_location' => 'footer-socials' ) ); ?>
				</nav>

				<nav class="footer-info">
					<button>
						<h4>Info</h4>
						<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
								<title>Accordion Arrow</title>
								<path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"/>
							</svg>
					</button>
					<?php wp_nav_menu( array( 'theme_location' => 'footer-info' ) ); ?>
				</nav>
			</section>
		</div>
		<hr>
		<section class="footer-legal">
			<p>&copy; <?php echo esc_html( date('Y') ); ?> Big Boy Burgers</p>
			<div>
				<?php wp_nav_menu( array( 'theme_location' => 'footer-legal' ) ); ?>
			</div>
		</section>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

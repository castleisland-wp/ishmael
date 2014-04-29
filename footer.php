<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Ishael
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div id="footer-widget-area" class="widget-area" role="complementary">
			<?php if ( ! dynamic_sidebar( 'sidebar-5' ) ) : ?>


				<aside id="meta" class="widget">
					<h1 class="widget-title"><?php _e( 'Meta', 'paul-mcelligott-dot-com' ); ?></h1>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>

			<?php endif; // end sidebar widget area ?>
		</div><!-- #lower-widget-area -->

		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'paul-mcelligott-dot-com' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'paul-mcelligott-dot-com' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'paul-mcelligott-dot-com' ), 'Ishael', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

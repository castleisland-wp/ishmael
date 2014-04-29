<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Ishael
 */
?>
	<section id="secondary-1">
		<div id="top-widget-area" class="widget-area" role="complementary">
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

				<aside id="search" class="widget widget_search">
					<?php get_search_form(); ?>
				</aside>

			<?php endif; // end sidebar widget area ?>
		</div><!-- #top-widget-area -->

		<div id="second-widget-area" class="widget-area" role="complementary">
			<?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>


				<aside id="archives" class="widget">
					<h1 class="widget-title"><?php _e( 'Archives', 'ishmael' ); ?></h1>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>
	

			<?php endif; // end sidebar widget area ?>
		</div><!-- #second-widget-area -->

	</section>
	<section id="secondary-2">

		<div id="third-widget-area" class="widget-area" role="complementary">
			<?php if ( ! dynamic_sidebar( 'sidebar-3' ) ) : ?>


			<?php endif; // end sidebar widget area ?>
		</div><!-- #third-widget-area -->

		<div id="lower-widget-area" class="widget-area" role="complementary">
			<?php if ( ! dynamic_sidebar( 'sidebar-4' ) ) : ?>


				<aside id="meta" class="widget">
					<h1 class="widget-title"><?php _e( 'Meta', 'ishmael' ); ?></h1>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>

			<?php endif; // end sidebar widget area ?>
		</div><!-- #lower-widget-area -->

	</section>
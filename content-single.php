<?php
/**
 * @package Ishamel
 */
global $page;
global $numpages;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php if(($page==1) and ($numpages > 1)) { ?>	<header class="entry-header">
		<div class="entry-meta">
			<?php ishmael_post_date(); ?>
		</div><!-- .entry-meta -->

		<h1 class="entry-title"><?php the_title(); ?></h1>

	</header><!-- .entry-header -->
<?php } else { ?>
	<header class="entry-header">
	
		<h2 class="entry-title"><?php the_title(); ?><?php if ($page > 1) echo ' (' . $page .')'; ?></h2>

	</header><!-- .entry-header -->

<?php }
	if(has_post_thumbnail()) 
	{

		if ( ($page==1) AND ($numpages > 1) ) 
		{
			echo '<div id="post_thumbnail">';
			the_post_thumbnail(array(200,400));
			echo '</div>';
	   	} elseif($page > 1) {
	   		echo '<div id="post_thumbnail" class="small_thumb">';
	   		the_post_thumbnail('thumbnail');
			echo '</div>';
	   	}
	}
?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'ishmael' ),
				'after'  => '</div>',
			) );
	if(($numpages==1) OR (($numpages > 1) AND ($page == $numpages))) {
		ishmael_custom_byline();
	}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'ishmael' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'ishmael' ) );

			if ( ! ishmael_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'ishmael' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'ishmael' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'ishmael' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'ishmael' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>

		<?php edit_post_link( __( 'Edit', 'ishmael' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

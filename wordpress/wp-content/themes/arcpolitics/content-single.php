<?php
/**
 * @package arcpolitics
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<section class="tags">
		<?php
		$categories = get_the_category();
		if($categories){
			$output = '<a class="category" href="'.get_category_link( $categories[0]->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $categories[0]->name ) ) . '">'.$categories[0]->cat_name.'</a> ';
			if(count($categories) > 1) {
				$output .= '<a class="sub-category" href="'.get_category_link( $categories[1]->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $categories[1]->name ) ) . '">'.$categories[1]->cat_name.'</a>';
			}
			echo $output;
		}
		?>
		</section>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php arcpolitics_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'arcpolitics' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'arcpolitics' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'arcpolitics' ) );

			if ( ! arcpolitics_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'arcpolitics' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'arcpolitics' );
				}
			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'arcpolitics' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'arcpolitics' );
				}
			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>

		<?php edit_post_link( __( 'Edit', 'arcpolitics' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

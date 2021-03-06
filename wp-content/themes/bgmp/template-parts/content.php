<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bgmp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( has_category() ) {
				?>

				<div class="entry-categories">
					<span class="screen-reader-text"><?php _e( 'Categories', 'bgmp' ); ?></span>
					<div class="entry-categories-inner">
						<?php the_category( ' ' ); ?>
					</div><!-- .entry-categories-inner -->
				</div><!-- .entry-categories -->

		<?php
			}

		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				bgmp_posted_by();
				bgmp_posted_on();
				?>
				<span class="comments"><a href="#comments"><i class="far fa-comment-alt"></i> <?=get_comments_number()?></a></span>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="container">
		<?php bgmp_post_thumbnail(); ?>

		<div class="entry-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bgmp' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bgmp' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
	</div><!-- .container -->

	<?php /*
	<footer class="entry-footer">
		<?php bgmp_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	*/ ?>
</article><!-- #post-<?php the_ID(); ?> -->

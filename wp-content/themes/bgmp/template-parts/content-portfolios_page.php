<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bgmp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(['col-12', 'col-md-4']); ?>>
	<a href="<?php the_permalink(); ?>">

		<?php the_post_thumbnail(); ?>

		<div class="overlay">
			<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
		</div><!-- .overlay -->

	</a>
</article><!-- #post-<?php the_ID(); ?> -->

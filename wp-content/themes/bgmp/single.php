<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bgmp
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		?>

			<div class="container">
				<?php
					the_post_navigation(
						array(
							'prev_text' => '<i class="fas fa-angle-double-left"></i>'.'<span class="nav-subtitle">' . esc_html__( '', 'bgmp' ) . '</span><span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . esc_html__( '', 'bgmp' ) . '</span> <span class="nav-title">%title</span>'.'<i class="fas fa-angle-double-right"></i>',
						)
					);

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
			</div>

		<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();

<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bgmp
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">Portfolio</h1>
			</header><!-- .page-header -->

			<div class="container">
				<div class="competences">
					<h2>Compétences</h2>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum doloremque aspernatur nobis voluptates consequatur ad illum autem quae facere nesciunt maiores reiciendis quaerat similique praesentium repellendus ipsum, quo, soluta totam.</p>
				</div>

				<div class="sites">
					<h2>Les sites</h2>
					<div class="row">
						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content', get_post_type() );

						endwhile; ?>
					</div>
				</div>
			</div><!-- .container -->

			<?php
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();

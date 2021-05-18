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
					<p>
						De par ma formation, je connais les principaux langages permettant le développement de pages web
						(tels que HTML, CSS, JavaScript, PHP). Ces compétences me permettent de créer un site en utilisant
						différentes technologies pour répondre au mieux au besoin du client.
					</p>
					<p>
						Je développe des sites web principalement sous Wordpress.
						Ce qui permet d'avoir une gestion facile pour les clients, tout en permettant une création visuelle à leur image.
					</p>
					<div class="logos row">
						<img src="<?= get_template_directory_uri(); ?>/assets/img/html.png" alt="Logo html">
						<img src="<?= get_template_directory_uri(); ?>/assets/img/js.png" alt="Logo Javascript">
						<img src="<?= get_template_directory_uri(); ?>/assets/img/php.png" alt="Logo php">
						<img src="<?= get_template_directory_uri(); ?>/assets/img/wordpress.png" alt="Logo Wordpress">
					</div>
				</div>

				<div class="sites">
					<h2>Les sites</h2>
					<p>Découvrez ici les différents sites sur lesquels j'ai travaillé.</p>
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

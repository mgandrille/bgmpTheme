<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bgmp
 */

?>

<footer id="colophon" class="site-footer">
		<div class="site-info container-fluid">
			<div class="row">
				<div class="logo col-12 col-md-2">
					<a href="<?=get_home_url()?>"><img src="<?= get_template_directory_uri().'/assets/img/logo.png' ?>" alt="Logo Hello Familles"></a>
				</div>
				<div class="search col-12 col-md-3 offset-md-1">
					<?php get_search_form();?>
				</div>
				<div class="contact-us col-6 col-md-2 btn">
					<a href="<?= get_page_link( get_page_by_title( 'contact' ) ); ?>">Prendre contact</a>
				</div>
				<div class="social-network col-12 col-md-4">
					<p>Suivez moi sur les réseaux sociaux</p>
					<div class="row">
						<div class="col-2"><a href="https://www.facebook.com/blogdemarie" target="_blank"><i class="fab fa-facebook"></i></a></div>
						<!-- <div class="col-2"><a href="" target="_blank"><i class="fab fa-instagram"></i></a></div> -->
						<div class="col-2"><a href="https://twitter.com/Marie_gdrl" target="_blank"><i class="fab fa-twitter"></i></a></div>
						<div class="col-2"><a href="https://www.linkedin.com/in/marie-gandrille" target="_blank"><i class="fab fa-linkedin"></i></a></div>
						<div class="col-2"><a href="https://github.com/mgandrille" target="_blank"><i class="fab fa-github"></i></a></div>
					</div>
				</div>
			</div>
		</div><!-- .site-info -->
		<div class="mentions container">
			<div class="row justify-content-around">
				<div class="ml col-12 col-md-6">
					<a href="<?= get_permalink( get_page_by_path( 'mentions-legales' ) ); ?>">Mentions légales</a>
					- <a href="<?= get_permalink( get_page_by_path( 'politique-de-confidentialite' ) ); ?>">Politique de confidentialité</a>
				</div>
				<div class="copy col-12 col-md-6">
					<b>© <a href="https://www.bgmp.fr/" target="_blank">BGMP</a></b> - 2021 -
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

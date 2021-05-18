<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bgmp
 */

wp_enqueue_style( 'slick-slider', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), _S_VERSION );
wp_enqueue_style( 'slick-slider-theme', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), _S_VERSION );
wp_enqueue_style( 'fancybox', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css', array(), _S_VERSION );


$infos = get_field('goal', $post->ID);
$technos = get_field('tech', $post->ID);
$site_name = get_field('site', $post->ID)['title'];
$site_url = get_field('site', $post->ID)['url'];

// Get all gallery images from post
if(has_block( 'gallery', $post->post_content )) {
	$post_blocks = parse_blocks( $post->post_content );
	foreach($post_blocks as $post_block) {
		if($post_block["blockName"] === 'core/gallery') {
			$ids = $post_block['attrs']['ids'];
		}
	}
} else {
	$gallery = [get_the_post_thumbnail_url()];
}

foreach ($ids as $id) {
	$image_url = wp_get_attachment_image_src( $id, 'full' )[0];
	$gallery[] = $image_url;
}


get_header();
?>

	<main id="primary" class="site-main">

		<section class="container">
			<?php the_title('<h1 class="main-title"> BGMP - <span>', '</span></h1>') ?>

			<div class="row">
				<div class="goal col-12 col-md-8">
					<h2>Objectifs</h2>
					<?= $infos; ?>
				</div>
				<?php if($technos) : ?>
					<div class="tech col-12 col-md-4">
						<h2>Technologies</h2>
						<ul>
						<?php foreach ($technos as $tech) : ?>
							<li><img src="<?= get_template_directory_uri(); ?>/assets/img/<?=$tech?>.png" alt="logo <?=$tech?>"></li>
						<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>
			</div>

			<?php if(!empty($site_name)) : ?>
				<div class="link">
					Envie de visiter le site ? C'est par ici :
					<a href="<?=$site_url?>" target="_blank" rel="noopener noreferrer"><?= $site_name?></a>
				</div>
			<?php endif; ?>
		</section>

		<?php if(!empty($gallery) && $gallery[0] !== NULL) : ?>
			<div class="container">
				<div class="slider">
					<?php foreach($gallery as $img) : ?>
						<div class="carousel-image" title="" data-fancybox="gallery" href="<?=$img?>" style="background-image: url('<?=$img?>'); "></div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>

		<div id="footer-nav" class="container">
			<?php
				the_post_navigation(
					array(
						'prev_text' => '<i class="fas fa-angle-double-left"></i>'.'<span class="nav-subtitle">' . esc_html__( '', 'bgmp' ) . '</span><span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( '', 'bgmp' ) . '</span> <span class="nav-title">%title</span>'.'<i class="fas fa-angle-double-right"></i>',
					)
				);
			?>
		</div>

	</main><!-- #main -->

<?php
wp_enqueue_script( 'slick-slider', "https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js", array('jquery'), _S_VERSION, true );
wp_enqueue_script( 'fancybox', "https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js", array('jquery'), _S_VERSION, true );

get_footer();

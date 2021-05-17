<?php
/**
 * Template Name: Home
 *
 * @package bgmp
 */


// Get Portfolio
$args = array(
    'post_type' => 'portfolios_page',
    'posts_per_page' => 3
);
$portfolios = new WP_Query( $args );


get_header();
?>

    <main id="primary" class="site-main">

        <section id="presentation">
            <div class="container">
                <h1>BGMP <span>Développement Web</span></h1>
                <p>Vous souhaitez créer un site web ? Parlons-en !</p>
            </div>
            <div class="i-down"><i class="fas fa-chevron-down"></i></div>
        </section>
        <section id="description">
            <div class="container">
                <h2>Développeur web freelance à Lyon - création de sites Wordpress</h2>
                <p>
                    Développeuse Web sur Lyon, j’ai découvert sur le tard le métier. Et depuis 2020, je m’investis à 100% pour créer des sites web.
                </p>
                <p>
                    La création d'un site web est une étape importante dans la vie d'une société.
                    Il permet de mettre en avant votre image, votre savoir faire, vos produits...
                    <br>Il est donc important que votre site web soit développé pour vous ressembler.
                    C'est ce que je m'applique à faire lors de notre collaboration.
                </p>
                <p>
                    Je suis disponible pour étudier de nouveaux projets de site web.
                    Avec vous et surtout pour vous !
                </p>
                <a href="#contact" class="btn">Me contacter</a>
            </div>
        </section>
        <section id="portfolio">
            <div class="container">
                <h2>Portfolio</h2>
                <p>
                    Tout au long de mon expérience, j'ai développé différents types de sites web :
                    <br>- Landing pages pour les promoteurs immobiliers
                    <br>- Sites vitrines
                </p>
                <p>
                    Et quoi de mieux que des exemples pour se faire une idée ?
                </p>
                <div class="websites row">
                <?php if ( $portfolios->have_posts() ) : ?>
                    <?php while ( $portfolios->have_posts() ) : $portfolios->the_post(); ?>
                        <div class="items col-12 col-md-4">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail(); ?>
                                <div class="overlay">
                                    <?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
                                </div><!-- .overlay -->
                            </a>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                <?php else:  ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>
                    </div>
                <p>Pour découvrir plus en détail tous les sites web que j'ai développé, vous pouvez passer voir mon portfolio !</p>
                <a href="<?= get_post_type_archive_link('portfolios_page') ?>" class="btn">Découvrir mon portfolio</a>
            </div>
        </section>
        <section id="blog">
            <div class="container">
                <h2>Ma reconversion, mes apprentissages</h2>
                <p>
                    Lorsque j'ai débuté ma reconversion dans le développement web, je me suis lancée dans la rédaction
                    d'un blog pour partager mes apprentissages.
                    <br>Le développement et la création de sites web nécessite l'acquisition de différentes notions, de nouveaux langages, de connaissances bien spécifiques...
                </p>
                <p>Cliquez ici pour découvrir <a href="<?= get_permalink( get_page_by_path( 'le-blog-de-marie' ) ); ?>"><span>Le Blog de Marie</span></a> !</p>
            </div>
        </section>
        <section id="contact">
            <div class="container">
                <h2>Prendre contact</h2>
                <div class="row">
                    <div class="col-12 col-md-6 mb-4">
                        <img src="<?= get_template_directory_uri(); ?>/assets/img/contact.jpg" alt="">
                    </div>
                    <div class="col-12 col-md-6">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- #main -->

<?php
get_footer();

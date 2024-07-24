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
                <h1><span>BGMP</span> votre expert en création de sites vitrines à Lyon.</h1>
                <p>Spécialiste WordPress, découvrez comment je peux vous aider à créer le site web de vos rêves.</p>
            </div>
            <!-- <div class="i-down"><i class="fas fa-chevron-down"></i></div> -->
        </section>

        <section id="description">
            <div class="container">
                <h2>Développeur web freelance à Lyon - création de sites Wordpress</h2>
                <p>
                    La conception d’un site web est une étape cruciale dans le développement d’une entreprise. Il sert 
                    de <b>vitrine numérique</b> pour votre marque, mettant en avant votre expertise, vos produits ou services. 
                    C’est pourquoi il est essentiel que votre site web soit conçu pour <b>représenter fidèlement qui vous 
                    êtes.</b>
                </p>
                <p>
                    En tant que <b>développeuse web basée à Lyon</b>, je m’engage pleinement à créer des sites web 
                    qui reflètent fidèlement <b>votre identité et vos valeurs</b>.
                </p>
                <p>
                    Lors de notre collaboration, nous aurons des échanges approfondis sur vos attentes et votre vision 
                    afin d’établir une feuille de route claire pour la réalisation de votre projet. <b>Je suis là pour 
                    travailler avec vous, et surtout, pour vous.</b> Ensemble, nous transformerons vos idées pour faire 
                    briller votre entreprise en ligne.
                </p>
                <a href="<?= get_permalink( get_page_by_path( 'a-propos' ) ); ?>" class="btn">
                    Découvrez pourquoi je suis le bon choix pour votre projet
                </a>
            </div>
        </section>

        <section id="offre">
            <div class="container">
                <h2>Mon offre</h2>
                <p>
                    En tant que développeur web freelance, je propose une gamme complète de services pour répondre à 
                    vos besoins. Que vous ayez besoin d'un site vitrine pour présenter votre entreprise, ou d'une 
                    refonte de votre site existant, je suis là pour vous aider. Mes services incluent la conception 
                    de sites web, l'optimisation pour les moteurs de recherche, la maintenance et la mise à jour de 
                    sites web, et bien plus encore. Chaque projet est réalisé avec soin et attention aux détails, 
                    garantissant un produit final qui répond à vos attentes et aide votre entreprise à se démarquer 
                    en ligne.
                </p>
                <p>
                    Commencez votre projet dès aujourd’hui&nbsp;!
                </p>
                <a href="<?= get_permalink( get_page_by_path( 'contact' ) ); ?>" class="btn">
                    Contactez-moi dès maintenant pour discuter de vos besoins
                </a>
            </div>
        </section>

        <section id="portfolio">
            <div class="container">
                <h2>Projets</h2>
                <p>
                    Chaque site web que je crée est conçu pour répondre aux besoins spécifiques de chaque client.
                </p>
                <p>
                    Quoi de mieux que de visualiser quelques réalisations récentes pour se faire une idée&nbsp;?
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
                <p>Découvrez aussi toutes mes créations de sites web Wordpress dans mon portfolio.</p>
                <a href="<?= get_post_type_archive_link('portfolios_page') ?>" class="btn">Découvrir mon portfolio</a>
            </div>
        </section>
        <!-- <section id="blog">
            <div class="container">
                <h2>Ma reconversion, mes apprentissages</h2>
                <p>
                    Lorsque j'ai débuté ma reconversion dans le développement web, je me suis lancée dans la rédaction
                    d'un blog pour partager mes apprentissages.
                    <br>Le développement et la création de sites web nécessitent l'acquisition de différentes notions, de
                    nouveaux langages, de connaissances bien spécifiques...
                </p>
                <p>Cliquez ici pour découvrir <a href="https://leblogdemarie.bgmp.fr"><span>Le Blog de Marie</span></a> !</p>
            </div>
        </section> -->
        <section id="contact">
            <div class="container">
                <h2>Prendre contact</h2>
                <p>Prêt à commencer dès aujourd’hui votre projet web&nbsp;?</p>
                <a href="<?= get_permalink( get_page_by_path( 'contact' ) ); ?>" class="btn">
                    Contactez-moi pour une consultation gratuite
                </a>
                <!-- <div class="row">
                    <div class="col-12 col-md-6 mb-4">
                        <img src="<?= get_template_directory_uri(); ?>/assets/img/contact.jpg" alt="">
                    </div>
                    <div class="col-12 col-md-6">
                        <?php the_content(); ?>
                    </div>
                </div> -->
            </div>
        </section>

    </main><!-- #main -->

<?php
get_footer();

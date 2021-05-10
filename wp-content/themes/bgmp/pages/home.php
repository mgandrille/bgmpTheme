<?php
/**
 * Template Name: Home
 *
 * @package bgmp
 */


get_header();
?>

    <main id="primary" class="site-main">

        <section id="presentation">
            <div class="container">
                <h1>BGMP <span>Développement Web</span></h1>
                <p>Vous souhaitez avoir un site web ? Parlons-en !</p>
            </div>
            <div class="i-down"><i class="fas fa-chevron-down"></i></div>
        </section>
        <section id="description">
            <div class="container">
                <h2>Développeur web freelance à Lyon</h2>
                <p>
                    Développeuse Web sur Lyon, j’ai découvert sur le tard le métier.
                    <br>Depuis 2020, je m’investis à 100% pour créer des sites web.
                </p>
                <p>
                    Je suis disponible pour étudier de nouveaux projets de site web.
                    Avec vous et surtout pour vous !
                </p>
            </div>
        </section>
        <section id="portfolio">
            <div class="container">
                <h2>Portfolio</h2>
                <p>
                    Tous au long de mon expérience, j'ai réalisé différents types de sites web :
                    <br>- Landing pages pour les promoteurs immobiliers
                    <br>- Sites vitrines
                </p>
                <div class="websites">
                    *** 3 sites web ***
                    *** A METTRE SOUS FORME DE CARTES ***
                </div>
                <a href="" class="btn">Découvrir mon portfolio</a>
            </div>
        </section>
        <section id="blog">
            <div class="container">
                <h2>Ma reconversion</h2>
                <p>
                    Lorsque j'ai débuté ma reconversion dans le développement web, je me suis lancée dans la rédaction
                    d'un blog pour partager mes apprentissages.
                </p>
                <p>Cliquez ici pour découvrir <a href=""><span>Le Blog de Marie</span></a> !</p>
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

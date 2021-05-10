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
                <p>Vous souhaitez un site web ? Parlons-en !</p>
            </div>
            <div class="i-down"><i class="fas fa-chevron-down"></i></div>
        </section>
        <section id="portfolio">
            <div class="container">
                <div class="pres">
                    <p>
                        Ceci est ma présentation...
                        Développeuse Web, j’ai découvert sur le tard le métier.
                        Depuis 2020, je m’investis à 100% pour créer des sites web.
                    </p>
                </div>

                Vous pouvez découvrir mon portfolio ici…

            </div>
        </section>
        <section id="blog">
            <div class="container">
                Lors de ma reconversion, j’ai créé un blog dédié à mes apprentissage.
                Vous pouvez le découvrir là !

            </div>
        </section>
        <section id="contact">
            <div class="container">
                <?php the_content(); ?>
            </div>
        </section>

    </main><!-- #main -->

<?php
get_footer();

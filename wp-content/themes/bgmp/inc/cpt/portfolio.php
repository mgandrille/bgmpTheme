<?php
if( !function_exists( 'create_programmes' ) ){

    function create_portfolios_page() {

        // On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
        $labels = array(
            // Le nom au pluriel
            'name'                => _x( 'Portfolios', 'Post Type General Name'),
            // Le nom au singulier
            'singular_name'       => _x( 'Portfolio', 'Post Type Singular Name'),
            // Le libellé affiché dans le menu
            'menu_name'           => __( 'Portfolios'),
            // Les différents libellés de l'administration
            'all_items'           => __( 'Tous les portfolios'),
            'view_item'           => __( 'Voir un portfolio'),
            'add_new_item'        => __( 'Ajouter un nouveau portfolio'),
            'add_new'             => __( 'Ajouter'),
            'edit_item'           => __( 'Editer le portfolio'),
            'update_item'         => __( 'Modifier le portfolio'),
            'search_items'        => __( 'Rechercher un portfolio'),
            'not_found'           => __( 'Non trouvé'),
            'not_found_in_trash'  => __( 'Non trouvé dans la corbeille'),
        );

        // On peut définir ici d'autres portfolios pour notre custom post type

        $args = array(
            'labels'            => $labels,
			'public'            => true,
			'publicly_queryable'=> true,
			'show_ui'           => true,
			'query_var'         => true,
			'has_archive'       => true,
			'capability_type'   => 'post',
			'hierarchical'      => true,
			// 'menu_position' => 5,
			'supports'          => array('title','thumbnail','revisions'),

            'label'             => __( 'Portfolios Page'),
            'description'       => __( 'Tout sur Portfolios Page'),
            // On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
            'supports'          => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', 'taxonomy' ),
            /*
            * Différentes options supplémentaires
            */
            'show_in_rest'      => true,
            'rewrite'			=> array( 'slug' => 'portfolio'),
			'menu_icon'         => 'dashicons-images-alt',

        );

        // On enregistre notre custom post type qu'on nomme ici "portfolios_page" et ses arguments
        register_post_type( 'portfolios_page', $args );

    }
}

add_action( 'init', 'create_portfolios_page', 0 );

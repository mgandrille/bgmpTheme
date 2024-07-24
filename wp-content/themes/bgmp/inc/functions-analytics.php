<?php

/*--------------------------------------------------*/
/* GOOGLE ANALYTICS
/*--------------------------------------------------*/

	/*
	 * Google Analytics
	 * Ajout d'un champ pour l'identifiant Google Analytics
	 */
	add_action( 'admin_init', 'register_google_analytics_setting' );
	function register_google_analytics_setting() {
		$args = array(
				'type' => 'string',
				'sanitize_callback' => 'sanitize_text_field',
				'default' => NULL,
				);
		register_setting( 'google-analytics-settings-group', 'google-analytics', $args );
		register_setting( 'google-analytics-settings-group', 'google-analytics-testmode', $args );
		register_setting( 'google-analytics-settings-group', 'google-analytics-ga4', $args );
		register_setting( 'google-analytics-settings-group', 'google-analytics-ga4-testmode', $args );

		// Google Tag Manager
		register_setting( 'google-analytics-settings-group', 'google-tag-manager', $args );

		// AdWords et Analytics
		$args['type'] = 'string';
		register_setting( 'google-analytics-settings-group', 'google-adwords-on', $args );
		register_setting( 'google-analytics-settings-group', 'facebook-tracking-on', $args );
        register_setting( 'google-analytics-settings-group', 'facebook-tracking-code', $args );
		register_setting( 'google-analytics-settings-group', 'google-display-on', $args );
	}


	/*
	 * Google Analytics
	 * Ajout d'une page de sous-menu pour administrer l'identifiant Google Analytics
	 */
	add_action( 'admin_menu', 'google_analytics_menu' );
	function google_analytics_menu() {
		add_options_page( 'Google Analytics', 'Google Analytics', 'manage_options', 'google-analytics-settings', 'google_analytics_options' );
	}
	function google_analytics_options() {
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		echo '<div class="wrap">';
		echo '<h1>Réglages de Google Analytics</h1>';
		echo '<form method="post" action="options.php">';
		settings_fields( 'google-analytics-settings-group' );
		do_settings_sections( 'google-analytics-settings-group' );
		echo '<table class="form-table">
            <!--Analytics GA4 mode Prod-->
			<tr valign="top">
			<th scope="row">Identifiant Google Analytics GA4</th>
			<td><input type="text" name="google-analytics-ga4" value="'. esc_attr( get_option('google-analytics-ga4') ) .'" /></td>
			</tr>
			<!--Analytics GA4 mode Test-->
			<tr valign="top">
			<th scope="row">Identifiant Google Analytics GA4 - Mode Test</th>
			<td><input type="text" name="google-analytics-ga4-testmode" value="'. esc_attr( get_option('google-analytics-ga4-testmode') ) .'" /><p><i>L\'UA de test sera utilisée par défaut si le site est en mode test, ou si le champ UA de Prod est laissé vide.</i></p></td>
			</tr>
			<!--Campagne AdWords-->
			<tr valign="top">
			<th scope="row">Activer le suivi AdWords</th>
			<td><input type="checkbox" name="google-adwords-on" value="1"'. ((get_option('google-adwords-on')) ? 'checked="checked"' : '') .' /></td>
			</tr>
			<!--Campagne Facebook-->
			<tr valign="top">
			<th scope="row">Activer le suivi Facebook</th>
			<td><input type="checkbox" name="facebook-tracking-on" value="1"'. ((get_option('facebook-tracking-on')) ? 'checked="checked"' : '') .' /></td>
			</tr>
            <tr valign="top">
			<th scope="row">Identifiant Facebook</th>
			<td><input type="text" name="facebook-tracking-code" value="'. esc_attr( get_option('facebook-tracking-code') ) .'" /></td>
			</tr>
			<!--Campagne Display-->
			<tr valign="top">
			<th scope="row">Activer le suivi Display</th>
			<td><input type="checkbox" name="google-display-on" value="1"'. ((get_option('google-display-on')) ? 'checked="checked"' : '') .' /></td>
			</tr>
			<!--Google Tag Manager-->
			<tr valign="top">
			<th scope="row">Identifiant Google Tag Manager</th>
			<td><input type="text" name="google-tag-manager" value="'. esc_attr( get_option('google-tag-manager') ) .'" /><p><i>L\'option est activée si le champ est rempli. Si l\'option est activée, les trois cases ci-dessus devraient être décochées pour éviter les doublons.</i></p></td>
			</tr>
		</table>';
		submit_button();
		echo '</form>';
		echo '</div>';
	}


	/*
	 * Google Analytics
	 * Insertion du tag de suivi global en fin de </head> à partir du champ créé plus haut
	 */
	if( !function_exists('google_analytics_print_script') ) {

		add_action('wp_head','google_analytics_print_script');
		function google_analytics_print_script() {

			if(get_option('google-analytics-ga4') || get_option('google-analytics-ga4-testmode')) {

				$ga4 = (get_field('statut', 'option') == 'dev' || !get_option('google-analytics-ga4')) ? esc_attr( get_option('google-analytics-ga4-testmode')) : esc_attr( get_option('google-analytics-ga4'));

				echo "<!-- Global site tag (gtag.js) - Google Analytics -->
				<script async src=\"https://www.googletagmanager.com/gtag/js?id=" . $ga4 . "\"></script>
				<script>
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag('js', new Date());

				gtag('config', '" . $ga4 . "');
				</script>";

			}
		}

	}



/*--------------------------------------------------*/
/* ÉVÉNEMENTS
/*--------------------------------------------------*/

	/*
	 * Google Analytics
	 * Génère le tag de suivi d'événement (gtag.js)
	 */
	function lum_google_analytics_event_tag($action, array $params) {

		/*
		 * Expected $params :
		 * -> 'event_category'
		 * -> 'event_label'
		 * -> 'value'
		 * -> 'non_interaction:true' (pour le lancement de la vidéo en autoplay)
		 */

		$tag_params = "{";

		$i = 0;
		foreach($params as $key => $value) {

			$tag_params .= "'" . $key . "': " . ( (is_numeric($value) || is_bool($value)) ? $value : "'".$value."'" );

			$i++;
			$tag_params .= ($i < count($params)) ? "," : "";

		}

		$tag_params .= "}";

		$tag = "gtag('event', '" . $action . "', " . $tag_params . ");";

		return $tag;

	}



/*--------------------------------------------------*/
/* SUIVI AVANCÉ POUR LES CAMPAGNES SOCIAL MEDIA
/*--------------------------------------------------*/

	/*
	 * Google Adwords
 	 * Insertion du tag AdWords pour les sites dont l'option est activée
	 */
	if( !function_exists('ess_google_adwords_global_tag') ) {

		add_action('wp_head','ess_google_adwords_global_tag');
		function ess_google_adwords_global_tag() {

			if(get_option('google-adwords-on')) {

				echo "<!-- Global site tag (gtag.js) - Google Ads: 779826302 -->
				<script type=\"text/plain\" class=\"cmplz-script\" data-category=\"marketing\" async src=\"https://www.googletagmanager.com/gtag/js?id=AW-779826302\"></script>
				<script>
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag('js', new Date());

				gtag('config', 'AW-779826302');
				</script>";

			}

		}

	}

	/*
	 * Facebook Tracking
 	 * Insertion du pixel Facebook pour les sites dont l'option est activée
	 */
	if( !function_exists('ess_facebook_pixel_global_tag') ) {

		add_action('wp_head','ess_facebook_pixel_global_tag');
		function ess_facebook_pixel_global_tag() {

			if(get_option('facebook-tracking-on')) {
                
                $idfb = (!get_option('facebook-tracking-code')) ? '2170376243243437' : esc_attr( get_option('facebook-tracking-code'));

				echo "<!-- Facebook Pixel Code -->
				<script type=\"text/plain\" class=\"cmplz-script\" data-category=\"marketing\">
				!function(f,b,e,v,n,t,s)
				{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
					n.callMethod.apply(n,arguments):n.queue.push(arguments)};
					if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
					n.queue=[];t=b.createElement(e);t.async=!0;
					t.src=v;s=b.getElementsByTagName(e)[0];
					s.parentNode.insertBefore(t,s)}(window, document,'script',
					'https://connect.facebook.net/en_US/fbevents.js');
					fbq('init', '".$idfb."');
					fbq('track', 'PageView');
					</script>
					<noscript class=\"cmplz-script\" data-category=\"marketing\"><img height=\"1\" width=\"1\" style=\"display:none\"
					src=\"https://www.facebook.com/tr?id=".$idfb."&ev=PageView&noscript=1\"
					/></noscript>
					<!-- End Facebook Pixel Code -->";

			}

		}

	}

	/*
	 * Google Display
 	 * Insertion du tag Google Display pour les sites dont l'option est activée
	 */
	if( !function_exists('ess_google_display_global_tag') ) {

		add_action('wp_head','ess_google_display_global_tag');
		function ess_google_display_global_tag() {

			if(get_option('google-display-on')) {

				echo "<!--
				Start of global snippet: Please do not remove
				Place this snippet between the <head> and </head> tags on every page of your site.
				-->
				<!-- Global site tag (gtag.js) - Google Marketing Platform -->
				<script type=\"text/plain\" class=\"cmplz-script\" data-category=\"marketing\" async src=\"https://www.googletagmanager.com/gtag/js?id=DC-9027788\"></script>
				<script type=\"text/plain\" class=\"cmplz-script\" data-category=\"marketing\">
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag('js', new Date());

				gtag('config', 'DC-9027788');
				</script>
				<!-- End of global snippet: Please do not remove -->";

			}

		}

	}

	/*
	 * Google Tag Manager - HEAD
 	 * Insertion du tag GTM pour les sites dont l'option est activée
	 */
	if( !function_exists('ess_google_tag_manager_head') ) {

		add_action('wp_head','ess_google_tag_manager_head');
		function ess_google_tag_manager_head() {

			if(get_option('google-tag-manager')) {

				echo "<!-- Google Tag Manager -->
				<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
					new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
					j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
					'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
				})(window,document,'script','dataLayer','".get_option('google-tag-manager')."');</script>
				<!-- End Google Tag Manager -->";

			}

		}

	}

	/*
	 * Google Tag Manager - BODY
 	 * Insertion du tag GTM pour les sites dont l'option est activée
	 */
	if( !function_exists('ess_google_tag_manager_body') ) {

		add_action('loop_start','ess_google_tag_manager_body');
		function ess_google_tag_manager_body() {

			if(get_option('google-tag-manager')) {

				echo '<!-- Google Tag Manager (noscript) -->
				<noscript><iframe src="https://www.googletagmanager.com/ns.html?id='.get_option('google-tag-manager').'"
					height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
					<!-- End Google Tag Manager (noscript) -->';

			}

		}

	}

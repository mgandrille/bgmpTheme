/* global wp, jQuery */
/**
 * File main.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	$( document ).ready( function( event ) {
		$( 'input.search-submit' ).attr( 'value', '🔍' );

		$( '.i-down' ).click( function() {
			const header = $( '#masthead' ).height();
			const pos = $( '#description' ).offset().top;
			$( 'html, body' ).animate( {
				scrollTop: eval( pos - header - 30 ),
			}, 2000 );
		} );
	} );
}( jQuery ) );

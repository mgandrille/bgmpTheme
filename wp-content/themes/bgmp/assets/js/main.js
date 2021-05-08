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
		console.log( 'MAiN SCRIPT' );
		$( 'input.search-submit' ).attr( 'value', '🔍' );
	} );
}( jQuery ) );

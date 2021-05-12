/* global wp, jQuery */
/**
 * File main.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	$( document ).ready( function( ) {
		if ( $( '.slider' ).length > 0 ) {
			slider();
		}

		$( 'input.search-submit' ).attr( 'value', '🔍' );

		$( '.i-down' ).click( function() {
			const header = $( '#masthead' ).height();
			const pos = $( '#description' ).offset().top;
			$( 'html, body' ).animate( {
				scrollTop: eval( pos - header - 30 ),
			}, 2000 );
		} );

		/**
		 * Smooth scrolling effect for anchors
		 */
		// Add smooth scrolling to all links
		$( 'a' ).on( 'click', function( event ) {
		// Make sure this.hash has a value before overriding default behavior
			if ( this.hash !== '' ) {
			// Prevent default anchor click behavior
				event.preventDefault();

				// Store hash
				const hash = this.hash;

				// Using jQuery's animate() method to add smooth page scroll
				// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
				$( 'html, body' ).animate( {
					scrollTop: $( hash ).offset().top,
				}, 800, function() {
					// Add hash (#) to URL when done scrolling (default click behavior)
					window.location.hash = hash;
				} );
			} // End if
		} );
	} );

	/**
	 * SLICK - SLIDER
	 */

	function slider() {
		$( '.slider' ).slick( {
			autoplay: true,
			arrows: false,
			dots: true,
			dotsClass: 'slick-custom-dots',
			infinite: true,
			speed: 300,
			slidesToShow: 1,
			adaptiveHeight: true,
		} );
	}
}( jQuery ) );

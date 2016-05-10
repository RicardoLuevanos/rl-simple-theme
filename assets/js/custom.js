/**
 * custom.js
 *
 * Custom JS for rl-simple-theme.
 */
( function( $ ) {
  var previousScrollY = window.scrollY;

  window.addEventListener( 'scroll', function() {

    if ( window.scrollY < previousScrollY ) {
      $( '.site-header' ).fadeIn( 150 );
    } else {
      $( '.site-header' ).fadeOut( 150 );
    }

    previousScrollY = window.scrollY;
  });
} ( jQuery ) );

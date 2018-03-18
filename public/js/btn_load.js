var buttons = document.querySelectorAll( '.ladda-button' );

Array.prototype.slice.call( buttons ).forEach( function( button ) {
    button.addEventListener( 'click', function() {
        
        if( typeof button.getAttribute( 'data-loading' ) === 'string' ) {
            button.removeAttribute( 'data-loading' );
        }
        else {
            button.setAttribute( 'data-loading', '' );
        }

    }, false );
} );
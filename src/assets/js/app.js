jQuery(function($){
    $("a[href='#sns-share']").on( 'click', function() {
        $("a[href='#sns-share'], .p-sp-footer-share").toggleClass( 'is-active' );
        $("a[href='#sns-follow'], .p-sp-footer-follow").removeClass( 'is-active' );
        $("a[href='#header-menu'], .p-header-menu, .p-hamburger-button").removeClass( 'is-active' );
    });
    $("a[href='#sns-follow']").on( 'click', function() {
        $("a[href='#sns-follow'], .p-sp-footer-follow").toggleClass( 'is-active' );
        $("a[href='#sns-share'], .p-sp-footer-share").removeClass( 'is-active' );
        $("a[href='#header-menu'], .p-header-menu, .p-hamburger-button").removeClass( 'is-active' );
    });
    $("a[href='#header-menu'], .p-hamburger-button").on( 'click', function() {
        $('.p-header-menu, .p-hamburger-button').toggleClass( 'is-active' );
        $("a[href='#header-menu']").toggleClass( 'is-active' );
        $("a[href='#sns-share'], .p-sp-footer-share").removeClass( 'is-active' );
        $("a[href='#sns-follow'], .p-sp-footer-follow").removeClass( 'is-active' );
    });
});

/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
( function() {
    var isIe = /(trident|msie)/i.test( navigator.userAgent );

    if ( isIe && document.getElementById && window.addEventListener ) {
        window.addEventListener( 'hashchange', function() {
            var id = location.hash.substring( 1 ),
                element;

            if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
                return;
            }

            element = document.getElementById( id );

            if ( element ) {
                if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
                    element.tabIndex = -1;
                }

                element.focus();
            }
        }, false );
    }
} )();
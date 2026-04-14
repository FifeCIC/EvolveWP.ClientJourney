/*global evolvewp_cj_setup_params */
jQuery( function( $ ) {

    $( '.button-next' ).on( 'click', function() {
        $('.evolvewp-clientjourney-setup-content').block({
            message: null,
            overlayCSS: {
                background: '#fff',
                opacity: 0.6
            }
        });
        return true;
    } );

    $( '.evolvewp-clientjourney-wizard-plugin-extensions' ).on( 'change', '.evolvewp-clientjourney-wizard-extension-enable input', function() {
        if ( $( this ).is( ':checked' ) ) {
            $( this ).closest( 'li' ).addClass( 'checked' );
        } else {
            $( this ).closest( 'li' ).removeClass( 'checked' );
        }
    } );

    $( '.evolvewp-clientjourney-wizard-plugin-extensions' ).on( 'click', 'li.evolvewp-clientjourney-wizard-extension', function() {
        var $enabled = $( this ).find( '.evolvewp-clientjourney-wizard-extension-enable input' );

        $enabled.prop( 'checked', ! $enabled.prop( 'checked' ) ).change();
    } );

    $( '.evolvewp-clientjourney-wizard-plugin-extensions' ).on( 'click', 'li.evolvewp-clientjourney-wizard-extension table, li.evolvewp-clientjourney-wizard-extension a', function( e ) {
        e.stopPropagation();
    } );
} );

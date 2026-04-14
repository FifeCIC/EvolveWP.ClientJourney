<?php
/**
 * Admin View: Notice - Update
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<div id="message" class="updated evolvewp-clientjourney-message evolvewp-clientjourney-connect">
    <p><strong><?php esc_html_e( 'EvolveWP ClientJourney Data Update', 'evolvewp-clientjourney' ); ?></strong> &#8211; <?php esc_html_e( 'We need to update your store\'s database to the latest version.', 'evolvewp-clientjourney' ); ?></p>
    <p class="submit"><a href="<?php echo esc_url( add_query_arg( array( 'do_update_evolvewp-clientjourney' => 'true', '_evolvewp_cj_update_nonce' => wp_create_nonce( 'evolvewp_cj_do_update' ) ), admin_url( 'admin.php?page=evolvewp-clientjourney-settings' ) ) ); ?>" class="evolvewp-clientjourney-update-now button-primary"><?php esc_html_e( 'Run the updater', 'evolvewp-clientjourney' ); ?></a></p>
</div>
<script type="text/javascript">
    jQuery( '.evolvewp-clientjourney-update-now' ).click( 'click', function() {
        return window.confirm( '<?php echo esc_js( __( 'It is strongly recommended that you backup your database before proceeding. Are you sure you wish to run the updater now?', 'evolvewp-clientjourney' ) ); ?>' ); // jshint ignore:line
    });
</script>

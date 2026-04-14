<?php
/**
 * Admin View: Notice - Updated
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<div id="message" class="updated evolvewp-clientjourney-message evolvewp-clientjourney-connect">
    <a class="evolvewp-clientjourney-message-close notice-dismiss" href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'evolvewp-clientjourney-hide-notice', 'update', remove_query_arg( 'do_update_evolvewp-clientjourney' ) ), 'evolvewp_cj_hide_notices_nonce', '_evolvewp_cj_notice_nonce' ) ); ?>"><?php esc_html_e( 'Dismiss', 'evolvewp-clientjourney' ); ?></a>

    <p><?php esc_html_e( 'EvolveWP ClientJourney data update complete. Thank you for updating to the latest version!', 'evolvewp-clientjourney' ); ?></p>
</div>

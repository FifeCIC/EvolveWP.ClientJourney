<?php
/**
 * Admin View: Custom Notices
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<div id="message" class="updated evolvewp-clientjourney-message">
    <a class="evolvewp-clientjourney-message-close notice-dismiss" href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'evolvewp-clientjourney-hide-notice', $notice ), 'evolvewp_cj_hide_notices_nonce', '_evolvewp_cj_notice_nonce' ) ); ?>"><?php esc_html_e( 'Dismiss', 'evolvewp-clientjourney' ); ?></a>
    <?php echo wp_kses_post( wpautop( $notice_html ) ); ?>
</div>

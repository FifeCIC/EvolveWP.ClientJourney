<?php
/**
 * Admin View: Notice - Install with wizard start button.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<div id="message" class="updated evolvewp-clientjourney-message evolvewp-clientjourney-connect">
    <p><strong><?php esc_html_e( 'Welcome to WordPress Seed', 'evolvewp-clientjourney' ); ?></strong> &#8211; <?php esc_html_e( 'You&lsquo;re almost ready to begin using the plugin.', 'evolvewp-clientjourney' ); ?></p>
    <p class="submit"><a href="<?php echo esc_url( admin_url( 'admin.php?page=evolvewp-clientjourney-setup' ) ); ?>" class="button-primary"><?php esc_html_e( 'Run the Setup Wizard', 'evolvewp-clientjourney' ); ?></a> <a class="button-secondary skip" href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'evolvewp-clientjourney-hide-notice', 'install' ), 'evolvewp_cj_hide_notices_nonce', '_evolvewp_cj_notice_nonce' ) ); ?>"><?php esc_html_e( 'Skip Setup', 'evolvewp-clientjourney' ); ?></a></p>
</div>

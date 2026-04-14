<?php
/**
 * Admin View: Notice - Updating
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<div id="message" class="updated evolvewp-clientjourney-message evolvewp-clientjourney-connect">
    <p><strong><?php esc_html_e( 'EvolveWP ClientJourney Data Update', 'evolvewp-clientjourney' ); ?></strong> &#8211; <?php esc_html_e( 'Your database is being updated in the background.', 'evolvewp-clientjourney' ); ?> <a href="<?php echo esc_url( add_query_arg( 'force_update_evolvewp-clientjourney', 'true', admin_url( 'admin.php?page=evolvewp-clientjourney-settings' ) ) ); ?>"><?php esc_html_e( 'Taking a while? Click here to run it now.', 'evolvewp-clientjourney' ); ?></a></p>
</div>

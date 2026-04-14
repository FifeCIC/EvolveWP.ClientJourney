<?php
/**
 * EvolveWP ClientJourney - Admin Only Functions
 *
 * @author   Ryan Bayne
 * @category Admin
 * @package  EvolveWP ClientJourney/Admin
 * @since    1.0.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Get all WordPress EvolveWP ClientJourney screen ids.
 *
 * @return array
 */
function evolvewp_cj_get_screen_ids() {
    $screen_ids = array(
        'toplevel_page_evolvewp-clientjourney',
        'evolvewp_cj_page_evolvewp-clientjourney-settings',
    );

    return apply_filters( 'evolvewp_cj_screen_ids', $screen_ids );
}

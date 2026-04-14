<?php
/**
 * EvolveWP ClientJourney Tools Settings Page
 *
 * @package EvolveWP ClientJourney/Admin/Settings
 * @version 1.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'EvolveWP_CJ_Settings_Tools' ) ) :

/**
 * EvolveWP_CJ_Settings_Tools
 */
class EvolveWP_CJ_Settings_Tools extends EvolveWP_CJ_Settings_Page {

    /**
     * Constructor
     */
    public function __construct() {
        $this->id    = 'tools';
        $this->label = __( 'Tools', 'evolvewp-clientjourney' );

        parent::__construct();
    }

    /**
     * Get settings array
     */
    public function get_settings() {
        $settings = array(

            array(
                'title' => __( 'Plugin Tools', 'evolvewp-clientjourney' ),
                'type'  => 'title',
                'desc'  => __( 'Utilities for managing your plugin settings and data.', 'evolvewp-clientjourney' ),
                'id'    => 'tools_section'
            ),

            array(
                'type' => 'sectionend',
                'id'   => 'tools_section'
            ),

        );

        return apply_filters( 'evolvewp_cj_tools_settings', $settings );
    }

    /**
     * Output the settings
     */
    public function output() {
        $settings = $this->get_settings();
        EvolveWP_CJ_Admin_Settings::output_fields( $settings );
        
        // Output import/export UI
        do_action( 'evolvewp_cj_settings_export_import' );
    }

    /**
     * Save settings
     */
    public function save() {
        // Import/export handles its own saving
    }
}

endif;

return new EvolveWP_CJ_Settings_Tools();

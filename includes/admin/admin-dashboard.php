<?php                 
/**
 * EvolveWP ClientJourney - WP Admin Dashboard
 *
 * Custom dashboard widgets and functionality goes here.  
 *
 * @author   Ryan Bayne
 * @category WordPress Dashboard
 * @package  EvolveWP ClientJourney/Admin
 * @since    1.0.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'EvolveWP_CJ_Admin_Dashboard' ) ) :

/**
 * EvolveWP_CJ_Admin_Dashboard Class.
 */
class EvolveWP_CJ_Admin_Dashboard {

    /**
     * Init dashboard widgets.
     */
    public function init() {           
        if ( function_exists('current_user_can') && current_user_can( 'activate_plugins' ) ) {
            wp_add_dashboard_widget( 'evolvewp_cj_dashboard_widget_example', __( 'Example Widget', 'evolvewp-clientjourney' ), array( $this, 'example_widget' ) );
        }
    }
       
    /**
     * Recent reviews widget.
     */
    public function example_widget() {              
        echo '<p>' . esc_html__( 'This is an example widget only. A developer must use it or remove it.', 'evolvewp-clientjourney' ) . '</p>';
    }

}

endif;

return new EvolveWP_CJ_Admin_Dashboard();

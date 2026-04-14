<?php
/**
 * EvolveWP ClientJourney - Developer Toolbar
 *
 * The developer toolbar requires the "seniordeveloper" custom capability. The
 * toolbar allows actions not all key holders should be giving access to. The
 * menu is intended for developers to already have access to a range of
 *
 * @author   Ryan Bayne
 * @category Admin
 * @package  EvolveWP ClientJourney/Toolbars
 * @since    1.0.0
 * @version  1.2.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}  

if( !class_exists( 'EvolveWP_CJ_Admin_Toolbar_Developers' ) ) :

class EvolveWP_CJ_Admin_Toolbar_Developers {
    public function __construct() {
        if( !current_user_can( 'seniordeveloper' ) ) return false;
        $this->init(); 
    }    
    
    /**
     * Initialise toolbar menus for senior developers.
     *
     * The page GET parameter is a read-only navigation value used solely to
     * build the debug mode switch URL. No state is mutated on this read, so a
     * nonce is not required; the existing seniordeveloper capability check in
     * the constructor is sufficient to satisfy NonceVerification.Recommended.
     *
     * @since   1.0.0
     * @version 1.2.0
     * @return void
     */
    private function init() {
        global $wp_admin_bar, $evolvewp_cj_settings;  
        
        // Add custom icon CSS
        add_action('admin_head', array($this, 'add_toolbar_icon_css'));
        add_action('wp_head', array($this, 'add_toolbar_icon_css'));
        
        // Top Level/Level One
        $args = array(
            'id'     => 'evolvewp-clientjourney-toolbarmenu-developers',
            'title'  => '<span class="ab-icon evolvewp-clientjourney-toolbar-icon"></span><span class="ab-label">' . __( 'WP Seed Developers', 'evolvewp-clientjourney' ) . '</span>',          
        );
        $wp_admin_bar->add_menu( $args );
        
            // Group - Debug Tools
            $args = array(
                'id'     => 'evolvewp-clientjourney-toolbarmenu-debugtools',
                'parent' => 'evolvewp-clientjourney-toolbarmenu-developers',
                'title'  => __( 'Debug Tools', 'evolvewp-clientjourney' ), 
                'meta'   => array( 'class' => 'first-toolbar-group' )         
            );        
            $wp_admin_bar->add_menu( $args );

                // Read-only navigation parameter used only to build the action URL.
                // Restricted to seniordeveloper capability; sanitize_key() is correct
                // for a WordPress admin page slug value.
                $page_param = ( current_user_can( 'seniordeveloper' ) && isset( $_GET['page'] ) )
                    ? sanitize_key( wp_unslash( $_GET['page'] ) )
                    : '';
                $href = wp_nonce_url( admin_url() . 'admin.php?page=' . $page_param . '&evolvewp-clientjourneyaction=' . 'debugmodeswitch'  . '', 'debugmodeswitch' );
                if( !isset( $evolvewp_cj_settings['displayerrors'] ) || $evolvewp_cj_settings['displayerrors'] !== true ) 
                {
                    $error_display_title = __( 'Hide Errors', 'evolvewp-clientjourney' );
                } 
                else 
                {
                    $error_display_title = __( 'Display Errors', 'evolvewp-clientjourney' );
                }
                $args = array(
                    'id'     => 'evolvewp-clientjourney-toolbarmenu-errordisplay',
                    'parent' => 'evolvewp-clientjourney-toolbarmenu-debugtools',
                    'title'  => $error_display_title,
                    'href'   => $href,            
                );
                $wp_admin_bar->add_menu( $args );    
    }
    
    /**
     * Add custom toolbar icon CSS
     */
    public function add_toolbar_icon_css() {
        ?>
        <style>
            #wpadminbar .evolvewp-clientjourney-toolbar-icon:before {
                content: '';
                display: inline-block;
                width: 20px;
                height: 20px;
                background-image: url('data:image/svg+xml;base64,<?php echo esc_attr( base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12,22C12,22 11,17 11,13C11,9 13,6 17,4C17,4 16,8 16,11C16,14 17,17 17,17M7,18C7,18 6,14 8,11C10,8 13,7 13,7C13,7 12,10 11,12C10,14 10,18 10,18" /></svg>') ); ?>');
                background-size: contain;
                background-repeat: no-repeat;
                background-position: center;
                vertical-align: middle;
                margin-right: 5px;
            }
        </style>
        <?php
    }
    
}   

endif;

return new EvolveWP_CJ_Admin_Toolbar_Developers();

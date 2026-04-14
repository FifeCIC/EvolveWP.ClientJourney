<?php
/**
 * EvolveWP ClientJourney - Developer Toolbar
 *
 * @package EvolveWP ClientJourney/Toolbars
 * @since 1.0.0
 */
 
if (!defined('ABSPATH')) {
    exit;
}  

if (!class_exists('EvolveWP_CJ_Admin_Toolbar_Developers')) :

class EvolveWP_CJ_Admin_Toolbar_Developers {
    public function __construct() {
        if (!current_user_can('manage_options')) {
            return false;
        }
        
        $this->init(); 
    }    
    
    private function init() {
        global $wp_admin_bar;  

        self::parent_level();
        self::second_level_tools();
    }

    private static function parent_level() {
        global $wp_admin_bar;   
        
        $args = array(
            'id'     => 'evolvewp-clientjourney-toolbarmenu-developers',
            'title'  => __('EvolveWP ClientJourney Dev', 'evolvewp-clientjourney'),          
        );
        $wp_admin_bar->add_menu($args);        
    }
    
    private static function second_level_tools() {
        global $wp_admin_bar;
        
        // Group - Developer Tools
        $args = array(
            'id'     => 'evolvewp-clientjourney-toolbarmenu-devtools',
            'parent' => 'evolvewp-clientjourney-toolbarmenu-developers',
            'title'  => __('Developer Tools', 'evolvewp-clientjourney'), 
            'meta'   => array('class' => 'second-toolbar-group')         
        );        
        $wp_admin_bar->add_menu($args);        
            
        // Demo Mode Switch
        $thisaction = 'evolvewp_cj_demo_mode_switch';
        $href = admin_url('admin-post.php?action=' . $thisaction);
        
        $is_demo = get_option('evolvewp_cj_demo_mode', false);
        
        if ($is_demo) {
            $title = __('✅ Demo Mode: ON', 'evolvewp-clientjourney');        
        } else {
            $title = __('❌ Demo Mode: OFF', 'evolvewp-clientjourney');    
        }
           
        $args = array(
            'id'     => 'evolvewp-clientjourney-toolbarmenu-toggledemomode',
            'parent' => 'evolvewp-clientjourney-toolbarmenu-devtools',
            'title'  => $title,
            'href'   => esc_url($href),            
        );
        
        $wp_admin_bar->add_menu($args);
        
        // Reset Pointers
        $thisaction = 'evolvewp_cj_reset_pointers';
        $href = admin_url('admin-post.php?action=' . $thisaction);
        
        $args = array(
            'id'     => 'evolvewp-clientjourney-toolbarmenu-resetpointers',
            'parent' => 'evolvewp-clientjourney-toolbarmenu-devtools',
            'title'  => __('Reset Pointers', 'evolvewp-clientjourney'),
            'href'   => esc_url(wp_nonce_url($href, 'evolvewp_cj_reset_pointers')),
        );
        
        $wp_admin_bar->add_menu($args);
        
        // Link to Development Page
        $args = array(
            'id'     => 'evolvewp-clientjourney-toolbarmenu-devpage',
            'parent' => 'evolvewp-clientjourney-toolbarmenu-devtools',
            'title'  => __('Development Page', 'evolvewp-clientjourney'),
            'href'   => admin_url('admin.php?page=evolvewp_cj_development'),
        );
        
        $wp_admin_bar->add_menu($args);
    }
}   

endif;

if (current_user_can('manage_options')) {
    return new EvolveWP_CJ_Admin_Toolbar_Developers();
}

<?php
/**
 * EvolveWP ClientJourney Installation Class
 *
 * @package EvolveWP ClientJourney/Classes
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class EvolveWP_CJ_Install {

    public function __construct() {
        register_activation_hook(EVOLVEWP_CJ_PLUGIN_FILE, array($this, 'install'));
        add_action('admin_init', array($this, 'check_version'), 5);
    }

    public function check_version() {
        if (get_option('evolvewp_cj_version') !== EVOLVEWP_CJ_VERSION) {
            $this->install();
            do_action('evolvewp_cj_updated');
        }
    }

    public function install() {
        if ('yes' === get_transient('evolvewp_cj_installing')) {
            return;
        }

        set_transient('evolvewp_cj_installing', 'yes', MINUTE_IN_SECONDS * 10);
        
        $this->create_options();
        $this->create_roles();
        $this->setup_environment();
        $this->create_cron_jobs();
        
        delete_transient('evolvewp_cj_installing');
        
        delete_option('evolvewp_cj_version');
        add_option('evolvewp_cj_version', EVOLVEWP_CJ_VERSION);
        
        flush_rewrite_rules();
        
        do_action('evolvewp_cj_installed');
    }

    private function create_options() {
        add_option('evolvewp_cj_installed', 'yes');
        add_option('evolvewp_cj_demo_mode', 'yes');
    }
    
    private function create_roles() {
        add_role(
            'evolvewp_cj_user',
            __('EvolveWP ClientJourney User', 'evolvewp-clientjourney'),
            array(
                'read' => true,
                'manage_evolvewp-clientjourney' => true
            )
        );
        
        $admin = get_role('administrator');
        if ($admin) {
            $admin->add_cap('manage_evolvewp-clientjourney');
        }
    }
    
    private function setup_environment() {
        $this->register_post_types();
        $this->register_taxonomies();
    }
    
    private function register_post_types() {
        if (!is_blog_installed() || post_type_exists('evolvewp_cj_item')) {
            return;
        }
        
        register_post_type('evolvewp_cj_item', array(
            'labels' => array(
                'name' => __('Items', 'evolvewp-clientjourney'),
                'singular_name' => __('Item', 'evolvewp-clientjourney'),
                'add_new' => __('Add Item', 'evolvewp-clientjourney'),
                'edit_item' => __('Edit Item', 'evolvewp-clientjourney'),
                'view_item' => __('View Item', 'evolvewp-clientjourney')
            ),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => 'evolvewp-clientjourney',
            'supports' => array('title', 'editor', 'thumbnail'),
            'show_in_rest' => true,
            'rewrite' => array('slug' => 'evolvewp-clientjourney-item')
        ));
    }
    
    private function register_taxonomies() {
        if (!is_blog_installed() || taxonomy_exists('evolvewp_cj_category')) {
            return;
        }
        
        register_taxonomy('evolvewp_cj_category', array('evolvewp_cj_item'), array(
            'hierarchical' => true,
            'labels' => array(
                'name' => __('Categories', 'evolvewp-clientjourney'),
                'singular_name' => __('Category', 'evolvewp-clientjourney')
            ),
            'show_ui' => true,
            'show_in_rest' => true,
            'rewrite' => array('slug' => 'evolvewp-clientjourney-category')
        ));
    }
    
    private function create_cron_jobs() {
        // Example: Daily cleanup job (commented out by default)
        // if (!wp_next_scheduled('evolvewp_cj_daily_cleanup')) {
        //     wp_schedule_event(time(), 'daily', 'evolvewp_cj_daily_cleanup');
        // }
    }
}

new EvolveWP_CJ_Install();

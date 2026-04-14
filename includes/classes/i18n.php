<?php
/**
 * Internationalization Helper
 *
 * @package EvolveWP ClientJourney/i18n
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class EvolveWP_CJ_i18n {
    
    public function __construct() {
        add_action('init', array($this, 'load_plugin_textdomain'));
    }
    
    public function load_plugin_textdomain() {
        load_plugin_textdomain(
            'evolvewp-clientjourney',
            false,
            dirname(plugin_basename(EVOLVEWP_CJ_PLUGIN_FILE)) . '/languages/'
        );
    }
    
    public static function is_rtl() {
        return is_rtl();
    }
}

return new EvolveWP_CJ_i18n();

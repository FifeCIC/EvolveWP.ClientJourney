<?php
/**
 * EvolveWP ClientJourney UI Library
 *
 * @package EvolveWP ClientJourney/Admin/Views
 * @version 1.0.0
 */

if (!defined('ABSPATH')) exit;

class EvolveWP_CJ_Admin_Development_UI_Library {
    
    public static function output() {
        require_once EVOLVEWP_CJ_PLUGIN_DIR_PATH . 'admin/page/development/partials/ui-library/main-container.php';
    }
}

EvolveWP_CJ_Admin_Development_UI_Library::output();

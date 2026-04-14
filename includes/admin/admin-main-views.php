<?php
/**
 * EvolveWP ClientJourney Admin Main Views
 *
 * @package EvolveWP ClientJourney/Admin
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class EvolveWP_CJ_Admin_Main_Views {
    
    public static function output() {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e('EvolveWP ClientJourney Plugin', 'evolvewp-clientjourney'); ?></h1>
            
            <div class="evolvewp-clientjourney-main-dashboard">
                <p><?php esc_html_e('Welcome to EvolveWP ClientJourney - The AI-Powered WordPress EvolveWP ClientJourney', 'evolvewp-clientjourney'); ?></p>
                
                <div class="evolvewp-clientjourney-quick-links" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 30px;">
                    <div class="evolvewp-clientjourney-card" style="background: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 4px;">
                        <h2><?php esc_html_e('Development Tools', 'evolvewp-clientjourney'); ?></h2>
                        <p><?php esc_html_e('Access 10-tab developer dashboard with assets, debugging, and architecture tools.', 'evolvewp-clientjourney'); ?></p>
                        <a href="<?php echo esc_url(admin_url('admin.php?page=evolvewp-clientjourney-development')); ?>" class="button button-primary"><?php esc_html_e('Open Development', 'evolvewp-clientjourney'); ?></a>
                    </div>
                    
                    <div class="evolvewp-clientjourney-card" style="background: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 4px;">
                        <h2><?php esc_html_e('Settings', 'evolvewp-clientjourney'); ?></h2>
                        <p><?php esc_html_e('Configure plugin settings, API keys, and preferences.', 'evolvewp-clientjourney'); ?></p>
                        <a href="<?php echo esc_url(admin_url('options-general.php?page=evolvewp-clientjourney-settings')); ?>" class="button button-primary"><?php esc_html_e('Open Settings', 'evolvewp-clientjourney'); ?></a>
                    </div>
                    
                    <div class="evolvewp-clientjourney-card" style="background: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 4px;">
                        <h2><?php esc_html_e('Documentation', 'evolvewp-clientjourney'); ?></h2>
                        <p><?php esc_html_e('Read guides, API reference, and integration examples.', 'evolvewp-clientjourney'); ?></p>
                        <a href="https://github.com/ryanbayne/evolvewp-clientjourney" target="_blank" class="button"><?php esc_html_e('View Docs', 'evolvewp-clientjourney'); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

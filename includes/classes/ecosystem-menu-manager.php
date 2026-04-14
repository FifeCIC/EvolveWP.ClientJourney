<?php
/**
 * Ecosystem Menu Manager
 * Dynamically places menus based on ecosystem mode
 *
 * @package EvolveWP ClientJourney/Ecosystem
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class EvolveWP_CJ_Ecosystem_Menu_Manager {
    
    public function __construct() {
        add_action('admin_menu', array($this, 'register_menus'), 999);
    }
    
    /**
     * Register menus based on ecosystem mode
     */
    public function register_menus() {
        $ecosystem = evolvewp_cj_ecosystem();
        
        if ($ecosystem->use_shared_menu()) {
            $this->register_shared_menus();
        } else {
            $this->register_plugin_menus();
        }
    }
    
    /**
     * Register shared menus (Tools & Settings)
     */
    private function register_shared_menus() {
        // Shared Logging in Tools
        add_management_page(
            __('Ecosystem Logging', 'evolvewp-clientjourney'),
            __('Ecosystem Logs', 'evolvewp-clientjourney'),
            'manage_options',
            'evolvewp-clientjourney-ecosystem-logs',
            array($this, 'render_shared_logging')
        );
        
        // Shared Cron/Background Tasks in Tools
        add_management_page(
            __('Background Tasks', 'evolvewp-clientjourney'),
            __('Background Tasks', 'evolvewp-clientjourney'),
            'manage_options',
            'evolvewp-clientjourney-ecosystem-tasks',
            array($this, 'render_shared_tasks')
        );
        
        // Shared Settings
        add_options_page(
            __('Ecosystem Settings', 'evolvewp-clientjourney'),
            __('Ecosystem', 'evolvewp-clientjourney'),
            'manage_options',
            'evolvewp-clientjourney-ecosystem-settings',
            array($this, 'render_shared_settings')
        );
    }
    
    /**
     * Register plugin-specific menus
     */
    private function register_plugin_menus() {
        // Keep in plugin's own menu
        // (existing menu structure remains)
    }
    
    /**
     * Render shared logging view
     */
    public function render_shared_logging() {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e('Ecosystem Logging', 'evolvewp-clientjourney'); ?></h1>
            <p><?php esc_html_e('Unified logging across all Ryan Bayne plugins', 'evolvewp-clientjourney'); ?></p>
            
            <?php
            $ecosystem = evolvewp_cj_ecosystem();
            $plugins = $ecosystem->get_plugins();
            ?>
            
            <div class="ecosystem-tabs">
                <?php foreach ($plugins as $slug => $plugin): ?>
                    <?php if ($plugin['has_logging']): ?>
                        <a href="#<?php echo esc_attr($slug); ?>-logs" class="nav-tab">
                            <?php echo esc_html($plugin['name']); ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            
            <?php foreach ($plugins as $slug => $plugin): ?>
                <?php if ($plugin['has_logging']): ?>
                    <div id="<?php echo esc_attr($slug); ?>-logs" class="tab-content">
                        <?php
                        // Call plugin's logging view
                        $resources = $ecosystem->get_shared_resources('logging');
                        foreach ($resources as $resource) {
                            if (is_callable($resource['callback'])) {
                                call_user_func($resource['callback'], $slug);
                            }
                        }
                        ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <?php
    }
    
    /**
     * Render shared background tasks view
     */
    public function render_shared_tasks() {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e('Background Tasks Monitor', 'evolvewp-clientjourney'); ?></h1>
            <p><?php esc_html_e('View CRON jobs, async processes, and background tasks across all plugins', 'evolvewp-clientjourney'); ?></p>
            
            <?php
            $ecosystem = evolvewp_cj_ecosystem();
            $plugins = $ecosystem->get_plugins();
            ?>
            
            <h2><?php esc_html_e('WordPress CRON Jobs', 'evolvewp-clientjourney'); ?></h2>
            <?php $this->render_cron_jobs($plugins); ?>
            
            <h2><?php esc_html_e('Background Processes', 'evolvewp-clientjourney'); ?></h2>
            <?php $this->render_background_processes($plugins); ?>
            
            <h2><?php esc_html_e('Async Tasks', 'evolvewp-clientjourney'); ?></h2>
            <?php $this->render_async_tasks($plugins); ?>
        </div>
        <?php
    }
    
    /**
     * Render CRON jobs
     */
    private function render_cron_jobs($plugins) {
        $crons = _get_cron_array();
        
        if (empty($crons)) {
            echo '<p>' . esc_html__('No scheduled CRON jobs found.', 'evolvewp-clientjourney') . '</p>';
            return;
        }
        
        ?>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th><?php esc_html_e('Hook', 'evolvewp-clientjourney'); ?></th>
                    <th><?php esc_html_e('Plugin', 'evolvewp-clientjourney'); ?></th>
                    <th><?php esc_html_e('Next Run', 'evolvewp-clientjourney'); ?></th>
                    <th><?php esc_html_e('Recurrence', 'evolvewp-clientjourney'); ?></th>
                    <th><?php esc_html_e('Actions', 'evolvewp-clientjourney'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($crons as $timestamp => $cron): ?>
                    <?php foreach ($cron as $hook => $events): ?>
                        <?php
                        // Detect which plugin owns this hook
                        $owner = 'Unknown';
                        foreach ($plugins as $slug => $plugin) {
                            if (strpos($hook, $slug) !== false) {
                                $owner = $plugin['name'];
                                break;
                            }
                        }
                        ?>
                        <?php foreach ($events as $event): ?>
                            <tr>
                                <td><code><?php echo esc_html($hook); ?></code></td>
                                <td><?php echo esc_html($owner); ?></td>
                                <td><?php echo esc_html(human_time_diff($timestamp, current_time('timestamp')) . ' from now'); ?></td>
                                <td><?php echo esc_html($event['schedule'] ?? 'One-time'); ?></td>
                                <td>
                                    <button class="button button-small run-now" data-hook="<?php echo esc_attr($hook); ?>">
                                        <?php esc_html_e('Run Now', 'evolvewp-clientjourney'); ?>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php
    }
    
    /**
     * Render background processes
     */
    private function render_background_processes($plugins) {
        ?>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th><?php esc_html_e('Process', 'evolvewp-clientjourney'); ?></th>
                    <th><?php esc_html_e('Plugin', 'evolvewp-clientjourney'); ?></th>
                    <th><?php esc_html_e('Status', 'evolvewp-clientjourney'); ?></th>
                    <th><?php esc_html_e('Progress', 'evolvewp-clientjourney'); ?></th>
                    <th><?php esc_html_e('Started', 'evolvewp-clientjourney'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Get background processes from each plugin
                $ecosystem = evolvewp_cj_ecosystem();
                $resources = $ecosystem->get_shared_resources('background_tasks');
                
                if (empty($resources)) {
                    echo '<tr><td colspan="5">' . esc_html__('No background processes running.', 'evolvewp-clientjourney') . '</td></tr>';
                } else {
                    foreach ($resources as $resource) {
                        if (is_callable($resource['callback'])) {
                            call_user_func($resource['callback']);
                        }
                    }
                }
                ?>
            </tbody>
        </table>
        <?php
    }
    
    /**
     * Render async tasks
     */
    private function render_async_tasks($plugins) {
        ?>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th><?php esc_html_e('Task', 'evolvewp-clientjourney'); ?></th>
                    <th><?php esc_html_e('Plugin', 'evolvewp-clientjourney'); ?></th>
                    <th><?php esc_html_e('Status', 'evolvewp-clientjourney'); ?></th>
                    <th><?php esc_html_e('Queued', 'evolvewp-clientjourney'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Get async tasks from each plugin
                $ecosystem = evolvewp_cj_ecosystem();
                $resources = $ecosystem->get_shared_resources('async_tasks');
                
                if (empty($resources)) {
                    echo '<tr><td colspan="4">' . esc_html__('No async tasks queued.', 'evolvewp-clientjourney') . '</td></tr>';
                } else {
                    foreach ($resources as $resource) {
                        if (is_callable($resource['callback'])) {
                            call_user_func($resource['callback']);
                        }
                    }
                }
                ?>
            </tbody>
        </table>
        <?php
    }
    
    /**
     * Render shared settings
     */
    public function render_shared_settings() {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e('Ecosystem Settings', 'evolvewp-clientjourney'); ?></h1>
            
            <form method="post" action="options.php">
                <?php settings_fields('evolvewp_cj_ecosystem'); ?>
                
                <h2><?php esc_html_e('Menu Location', 'evolvewp-clientjourney'); ?></h2>
                <table class="form-table">
                    <tr>
                        <th><?php esc_html_e('Shared Views Location', 'evolvewp-clientjourney'); ?></th>
                        <td>
                            <label>
                                <input type="radio" name="evolvewp_cj_ecosystem_menu_location" value="shared" <?php checked(get_option('evolvewp_cj_ecosystem_menu_location', 'shared'), 'shared'); ?>>
                                <?php esc_html_e('Tools & Settings (Recommended for 2+ plugins)', 'evolvewp-clientjourney'); ?>
                            </label><br>
                            <label>
                                <input type="radio" name="evolvewp_cj_ecosystem_menu_location" value="plugin" <?php checked(get_option('evolvewp_cj_ecosystem_menu_location', 'shared'), 'plugin'); ?>>
                                <?php esc_html_e('Each Plugin Menu (Single plugin mode)', 'evolvewp-clientjourney'); ?>
                            </label>
                            <p class="description">
                                <?php esc_html_e('When multiple Ryan Bayne plugins are installed, shared views (logging, CRON, background tasks) can be moved to WordPress Tools and Settings menus.', 'evolvewp-clientjourney'); ?>
                            </p>
                        </td>
                    </tr>
                </table>
                
                <h2><?php esc_html_e('Installed Plugins', 'evolvewp-clientjourney'); ?></h2>
                <?php
                $ecosystem = evolvewp_cj_ecosystem();
                $plugins = $ecosystem->get_plugins();
                ?>
                <table class="wp-list-table widefat fixed striped">
                    <thead>
                        <tr>
                            <th><?php esc_html_e('Plugin', 'evolvewp-clientjourney'); ?></th>
                            <th><?php esc_html_e('Version', 'evolvewp-clientjourney'); ?></th>
                            <th><?php esc_html_e('Features', 'evolvewp-clientjourney'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($plugins as $slug => $plugin): ?>
                            <tr>
                                <td><strong><?php echo esc_html($plugin['name']); ?></strong></td>
                                <td><?php echo esc_html($plugin['version']); ?></td>
                                <td>
                                    <?php if ($plugin['has_logging']): ?>
                                        <span class="dashicons dashicons-list-view" title="<?php esc_attr_e('Logging', 'evolvewp-clientjourney'); ?>"></span>
                                    <?php endif; ?>
                                    <?php if ($plugin['has_cron']): ?>
                                        <span class="dashicons dashicons-clock" title="<?php esc_attr_e('CRON Jobs', 'evolvewp-clientjourney'); ?>"></span>
                                    <?php endif; ?>
                                    <?php if ($plugin['has_background_tasks']): ?>
                                        <span class="dashicons dashicons-update" title="<?php esc_attr_e('Background Tasks', 'evolvewp-clientjourney'); ?>"></span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }
}

return new EvolveWP_CJ_Ecosystem_Menu_Manager();

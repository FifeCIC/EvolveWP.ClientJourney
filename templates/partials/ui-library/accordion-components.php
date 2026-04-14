<?php
/**
 * UI Library Accordion Components Partial
 *
 * @package EvolveWP ClientJourney/Admin/Views/Partials
 * @version 1.0.0
 */

defined('ABSPATH') || exit;
?>
<div class="evolvewp-clientjourney-ui-section">
    <h3><?php esc_html_e('Accordion Components', 'evolvewp-clientjourney'); ?></h3>
    <p><?php esc_html_e('Collapsible content panels, expandable sections, tree-view components, and FAQ-style accordions for organizing information.', 'evolvewp-clientjourney'); ?></p>
    
    <div class="evolvewp-clientjourney-component-group">
        <!-- Basic Accordion -->
        <div class="component-demo">
            <h4><?php esc_html_e('Basic Accordion', 'evolvewp-clientjourney'); ?></h4>
            <div class="evolvewp-clientjourney-accordion">
                <div class="evolvewp-clientjourney-accordion-item">
                    <div class="evolvewp-clientjourney-accordion-header">
                        <h4><?php esc_html_e('Feature Overview', 'evolvewp-clientjourney'); ?></h4>
                        <span class="evolvewp-clientjourney-accordion-icon dashicons dashicons-arrow-down-alt2"></span>
                    </div>
                    <div class="evolvewp-clientjourney-accordion-content">
                        <p><?php esc_html_e('This section contains detailed information about plugin features, including configuration options, usage examples, and best practices.', 'evolvewp-clientjourney'); ?></p>
                        <div class="evolvewp-clientjourney-grid evolvewp-clientjourney-grid-2">
                            <div class="evolvewp-clientjourney-card">
                                <h5><?php esc_html_e('Core Features', 'evolvewp-clientjourney'); ?></h5>
                                <ul>
                                    <li><?php esc_html_e('Custom post types', 'evolvewp-clientjourney'); ?></li>
                                    <li><?php esc_html_e('REST API endpoints', 'evolvewp-clientjourney'); ?></li>
                                    <li><?php esc_html_e('Settings framework', 'evolvewp-clientjourney'); ?></li>
                                </ul>
                            </div>
                            <div class="evolvewp-clientjourney-card">
                                <h5><?php esc_html_e('Advanced Features', 'evolvewp-clientjourney'); ?></h5>
                                <ul>
                                    <li><?php esc_html_e('Background processing', 'evolvewp-clientjourney'); ?></li>
                                    <li><?php esc_html_e('Logging system', 'evolvewp-clientjourney'); ?></li>
                                    <li><?php esc_html_e('Asset management', 'evolvewp-clientjourney'); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="evolvewp-clientjourney-accordion-item">
                    <div class="evolvewp-clientjourney-accordion-header">
                        <h4><?php esc_html_e('Configuration', 'evolvewp-clientjourney'); ?></h4>
                        <span class="evolvewp-clientjourney-accordion-icon dashicons dashicons-arrow-down-alt2"></span>
                    </div>
                    <div class="evolvewp-clientjourney-accordion-content">
                        <p><?php esc_html_e('Configuration options and settings for customizing plugin behavior.', 'evolvewp-clientjourney'); ?></p>
                        <div class="evolvewp-clientjourney-table-container">
                            <table class="evolvewp-clientjourney-table">
                                <thead>
                                    <tr>
                                        <th><?php esc_html_e('Setting', 'evolvewp-clientjourney'); ?></th>
                                        <th><?php esc_html_e('Value', 'evolvewp-clientjourney'); ?></th>
                                        <th><?php esc_html_e('Status', 'evolvewp-clientjourney'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php esc_html_e('Debug Mode', 'evolvewp-clientjourney'); ?></td>
                                        <td>Enabled</td>
                                        <td><span class="evolvewp-clientjourney-badge evolvewp-clientjourney-badge-success"><?php esc_html_e('Active', 'evolvewp-clientjourney'); ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><?php esc_html_e('Logging', 'evolvewp-clientjourney'); ?></td>
                                        <td>File + Database</td>
                                        <td><span class="evolvewp-clientjourney-badge evolvewp-clientjourney-badge-success"><?php esc_html_e('Active', 'evolvewp-clientjourney'); ?></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="evolvewp-clientjourney-accordion-item">
                    <div class="evolvewp-clientjourney-accordion-header">
                        <h4><?php esc_html_e('Performance', 'evolvewp-clientjourney'); ?></h4>
                        <span class="evolvewp-clientjourney-accordion-icon dashicons dashicons-arrow-down-alt2"></span>
                    </div>
                    <div class="evolvewp-clientjourney-accordion-content">
                        <p><?php esc_html_e('Performance metrics and optimization settings.', 'evolvewp-clientjourney'); ?></p>
                        <div class="media-progress-bar">
                            <div style="width: 85%;"><?php esc_html_e('85% Optimized', 'evolvewp-clientjourney'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php
    // Add interactive functionality
    $evolvewp_cj_accordion_script = "
        jQuery(document).ready(function($) {
            $('.evolvewp-clientjourney-accordion-header').on('click', function() {
                var \$item = $(this).closest('.evolvewp-clientjourney-accordion-item');
                var \$content = \$item.find('.evolvewp-clientjourney-accordion-content').first();
                var \$icon = $(this).find('.evolvewp-clientjourney-accordion-icon');
                
                \$content.slideToggle(300);
                \$item.toggleClass('evolvewp-clientjourney-accordion-expanded');
                \$icon.toggleClass('dashicons-arrow-down-alt2 dashicons-arrow-up-alt2');
                
                \$item.siblings('.evolvewp-clientjourney-accordion-item').each(function() {
                    var \$siblingContent = $(this).find('.evolvewp-clientjourney-accordion-content').first();
                    var \$siblingIcon = $(this).find('.evolvewp-clientjourney-accordion-icon').first();
                    
                    if (\$siblingContent.is(':visible')) {
                        \$siblingContent.slideUp(300);
                        $(this).removeClass('evolvewp-clientjourney-accordion-expanded');
                        \$siblingIcon.removeClass('dashicons-arrow-up-alt2').addClass('dashicons-arrow-down-alt2');
                    }
                });
            });
        });
    ";
    
    wp_add_inline_script('jquery', $evolvewp_cj_accordion_script);
    ?>
</div>

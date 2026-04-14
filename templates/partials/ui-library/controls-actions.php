<?php
/**
 * UI Library Controls and Actions Partial
 *
 * @package evolvewp-clientjourney/Admin/Views/Partials
 * @version 1.0.6
 */

defined('ABSPATH') || exit;
?>
<div class="evolvewp-clientjourney-ui-section">
    <h3><?php esc_html_e('Controls & Actions', 'evolvewp-clientjourney'); ?></h3>
    <p><?php esc_html_e('UI controls for user interactions, filtering, and action buttons.', 'evolvewp-clientjourney'); ?></p>
    
    <div class="controls-showcase">
        <!-- Action Buttons Group -->
        <div class="component-demo">
            <h4><?php esc_html_e('Action Button Groups', 'evolvewp-clientjourney'); ?></h4>
            <div class="control-panel">
                <div class="control-panel-header">
                    <h5><?php esc_html_e('Symbol Actions', 'evolvewp-clientjourney'); ?></h5>
                </div>
                <div class="control-panel-body">
                    <div class="control-group">
                        <button class="evolvewp-clientjourney-control-button evolvewp-clientjourney-control-primary">
                            <span class="control-icon dashicons dashicons-chart-line"></span>
                            <span class="control-text"><?php esc_html_e('Analyze', 'evolvewp-clientjourney'); ?></span>
                        </button>
                        <button class="evolvewp-clientjourney-control-button">
                            <span class="control-icon dashicons dashicons-portfolio"></span>
                            <span class="control-text"><?php esc_html_e('Add to Portfolio', 'evolvewp-clientjourney'); ?></span>
                        </button>
                        <button class="evolvewp-clientjourney-control-button">
                            <span class="control-icon dashicons dashicons-star-filled"></span>
                            <span class="control-text"><?php esc_html_e('Watchlist', 'evolvewp-clientjourney'); ?></span>
                        </button>
                        <button class="evolvewp-clientjourney-control-button evolvewp-clientjourney-control-danger">
                            <span class="control-icon dashicons dashicons-dismiss"></span>
                            <span class="control-text"><?php esc_html_e('Ignore', 'evolvewp-clientjourney'); ?></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Toggle Controls -->
        <div class="component-demo">
            <h4><?php esc_html_e('Toggle Controls', 'evolvewp-clientjourney'); ?></h4>
            <div class="control-panel">
                <div class="control-panel-header">
                    <h5><?php esc_html_e('View Options', 'evolvewp-clientjourney'); ?></h5>
                </div>
                <div class="control-panel-body">
                    <div class="control-toggle-group">
                        <button class="evolvewp-clientjourney-toggle-button active">
                            <span class="dashicons dashicons-grid-view"></span>
                            <span class="control-label"><?php esc_html_e('Grid', 'evolvewp-clientjourney'); ?></span>
                        </button>
                        <button class="evolvewp-clientjourney-toggle-button">
                            <span class="dashicons dashicons-list-view"></span>
                            <span class="control-label"><?php esc_html_e('List', 'evolvewp-clientjourney'); ?></span>
                        </button>
                        <button class="evolvewp-clientjourney-toggle-button">
                            <span class="dashicons dashicons-table-row-after"></span>
                            <span class="control-label"><?php esc_html_e('Table', 'evolvewp-clientjourney'); ?></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Action Bar -->
        <div class="component-demo">
            <h4><?php esc_html_e('Action Bar', 'evolvewp-clientjourney'); ?></h4>
            <div class="action-bar">
                <div class="action-bar-left">
                    <button class="evolvewp-clientjourney-action-button">
                        <span class="dashicons dashicons-plus"></span>
                        <?php esc_html_e('Add New', 'evolvewp-clientjourney'); ?>
                    </button>
                    <button class="evolvewp-clientjourney-action-button">
                        <span class="dashicons dashicons-edit"></span>
                        <?php esc_html_e('Edit', 'evolvewp-clientjourney'); ?>
                    </button>
                </div>
                <div class="action-bar-right">
                    <button class="evolvewp-clientjourney-action-button evolvewp-clientjourney-action-secondary">
                        <span class="dashicons dashicons-trash"></span>
                        <?php esc_html_e('Delete', 'evolvewp-clientjourney'); ?>
                    </button>
                    <div class="action-dropdown">
                        <button class="evolvewp-clientjourney-action-button evolvewp-clientjourney-action-dropdown">
                            <?php esc_html_e('More Actions', 'evolvewp-clientjourney'); ?>
                            <span class="dashicons dashicons-arrow-down-alt2"></span>
                        </button>
                        <div class="action-dropdown-content">
                            <a href="#" class="action-dropdown-item"><?php esc_html_e('Export', 'evolvewp-clientjourney'); ?></a>
                            <a href="#" class="action-dropdown-item"><?php esc_html_e('Duplicate', 'evolvewp-clientjourney'); ?></a>
                            <a href="#" class="action-dropdown-item"><?php esc_html_e('Share', 'evolvewp-clientjourney'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Control Panel -->
        <div class="component-demo">
            <h4><?php esc_html_e('Control Panel', 'evolvewp-clientjourney'); ?></h4>
            <div class="control-panel control-panel-expanded">
                <div class="control-panel-header">
                    <h5><?php esc_html_e('Trading Settings', 'evolvewp-clientjourney'); ?></h5>
                    <div class="control-panel-actions">
                        <button class="evolvewp-clientjourney-control-button evolvewp-clientjourney-control-small">
                            <span class="dashicons dashicons-admin-generic"></span>
                        </button>
                        <button class="evolvewp-clientjourney-control-button evolvewp-clientjourney-control-small evolvewp-clientjourney-control-toggle">
                            <span class="dashicons dashicons-arrow-up-alt2"></span>
                        </button>
                    </div>
                </div>
                <div class="control-panel-body">
                    <div class="control-row">
                        <label class="control-label"><?php esc_html_e('Execution Mode', 'evolvewp-clientjourney'); ?></label>
                        <div class="control-options">
                            <label class="control-radio">
                                <input type="radio" name="execution_mode" checked>
                                <span><?php esc_html_e('Manual', 'evolvewp-clientjourney'); ?></span>
                            </label>
                            <label class="control-radio">
                                <input type="radio" name="execution_mode">
                                <span><?php esc_html_e('Semi-Auto', 'evolvewp-clientjourney'); ?></span>
                            </label>
                            <label class="control-radio">
                                <input type="radio" name="execution_mode">
                                <span><?php esc_html_e('Automatic', 'evolvewp-clientjourney'); ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="control-row">
                        <label class="control-label"><?php esc_html_e('Risk Level', 'evolvewp-clientjourney'); ?></label>
                        <div class="control-slider">
                            <input type="range" min="1" max="10" value="5">
                            <span class="control-value">5</span>
                        </div>
                    </div>
                </div>
                <div class="control-panel-footer">
                    <button class="evolvewp-clientjourney-button evolvewp-clientjourney-button-small evolvewp-clientjourney-button-secondary"><?php esc_html_e('Reset', 'evolvewp-clientjourney'); ?></button>
                    <button class="evolvewp-clientjourney-button evolvewp-clientjourney-button-small evolvewp-clientjourney-button-primary"><?php esc_html_e('Apply', 'evolvewp-clientjourney'); ?></button>
                </div>
            </div>
        </div>
    </div>
    
    <?php
    // Add inline script for controls functionality
    $evolvewp_cj_controls_script = "
        jQuery(document).ready(function($) {
            // Toggle buttons
            $('.evolvewp-clientjourney-toggle-button').on('click', function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
            });
            
            // Action dropdown
            $('.evolvewp-clientjourney-action-dropdown').on('click', function(e) {
                e.preventDefault();
                $(this).next('.action-dropdown-content').toggleClass('show');
            });
            
            // Close dropdown when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.action-dropdown').length) {
                    $('.action-dropdown-content').removeClass('show');
                }
            });
            
            // Control panel toggle
            $('.evolvewp-clientjourney-control-toggle').on('click', function() {
                var panel = $(this).closest('.control-panel');
                panel.toggleClass('control-panel-expanded');
                
                // Toggle icon
                var icon = $(this).find('.dashicons');
                if (panel.hasClass('control-panel-expanded')) {
                    icon.removeClass('dashicons-arrow-down-alt2').addClass('dashicons-arrow-up-alt2');
                } else {
                    icon.removeClass('dashicons-arrow-up-alt2').addClass('dashicons-arrow-down-alt2');
                }
            });
            
            // Update slider value display
            $('.control-slider input[type=\"range\"]').on('input', function() {
                $(this).next('.control-value').text($(this).val());
            });
        });
    ";
    
    wp_add_inline_script('jquery', $evolvewp_cj_controls_script);
    ?>

</div>

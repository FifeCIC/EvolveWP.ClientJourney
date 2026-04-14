<?php
/**
 * UI Library Modal Components Partial
 *
 * @package evolvewp-clientjourney/Admin/Views/Partials
 * @version 1.0.6
 */

defined('ABSPATH') || exit;
?>
<div class="evolvewp-clientjourney-ui-section">
    <h3><?php esc_html_e('Modal Components', 'evolvewp-clientjourney'); ?></h3>
    <p><?php esc_html_e('Dialog boxes or pop-up windows that are displayed on top of the current page.', 'evolvewp-clientjourney'); ?></p>

    <div class="evolvewp-clientjourney-component-group">
        <!-- Basic Modal Demo -->
        <div class="component-demo">
            <h4><?php esc_html_e('Basic Modal', 'evolvewp-clientjourney'); ?></h4>
            <button class="tp-button tp-button-primary" id="open-demo-modal"><?php esc_html_e('Open Modal', 'evolvewp-clientjourney'); ?></button>

            <!-- Modal Structure (hidden by default) -->
            <div id="ui-library-demo-modal" class="evolvewp-clientjourney-modal" style="display:none;">
                <div class="evolvewp-clientjourney-modal-content">
                    <div class="evolvewp-clientjourney-modal-header">
                        <h2><?php esc_html_e('Sample Modal Title', 'evolvewp-clientjourney'); ?></h2>
                        <button class="evolvewp-clientjourney-modal-close" aria-label="<?php esc_attr_e('Close modal', 'evolvewp-clientjourney'); ?>">&times;</button>
                    </div>
                    <div class="evolvewp-clientjourney-modal-body">
                        <p><?php esc_html_e('This is the content of the modal. You can put any HTML here, including forms, text, or other components.', 'evolvewp-clientjourney'); ?></p>
                        <p><?php esc_html_e('Modal dialogs are useful for displaying additional information, forms, or confirmation messages without navigating away from the current page.', 'evolvewp-clientjourney'); ?></p>
                    </div>
                    <div class="evolvewp-clientjourney-modal-footer">
                        <button class="tp-button tp-button-secondary close-demo-modal"><?php esc_html_e('Cancel', 'evolvewp-clientjourney'); ?></button>
                        <button class="tp-button tp-button-primary"><?php esc_html_e('Save Changes', 'evolvewp-clientjourney'); ?></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Task Detail Modal Demo -->
        <div class="component-demo">
            <h4><?php esc_html_e('Task Detail Modal', 'evolvewp-clientjourney'); ?></h4>
            <button class="tp-button tp-button-secondary" id="open-task-modal"><?php esc_html_e('View Task Details', 'evolvewp-clientjourney'); ?></button>

            <!-- Task Detail Modal Structure -->
            <div id="ui-library-task-modal" class="evolvewp-clientjourney-modal" style="display:none;">
                <div class="evolvewp-clientjourney-modal-content">
                    <div class="evolvewp-clientjourney-modal-header">
                        <h2><?php esc_html_e('Task Details', 'evolvewp-clientjourney'); ?></h2>
                        <button class="evolvewp-clientjourney-modal-close" aria-label="<?php esc_attr_e('Close modal', 'evolvewp-clientjourney'); ?>">&times;</button>
                    </div>
                    <div class="evolvewp-clientjourney-modal-body">
                        <div class="evolvewp-clientjourney-task-detail-header">
                            <h3 class="evolvewp-clientjourney-task-detail-title"><?php esc_html_e('Analyze AAPL Stock Performance', 'evolvewp-clientjourney'); ?></h3>
                        </div>
                        
                        <div class="evolvewp-clientjourney-task-detail-meta">
                            <div class="evolvewp-clientjourney-task-detail-meta-item">
                                <span class="evolvewp-clientjourney-task-detail-meta-label"><?php esc_html_e('Status:', 'evolvewp-clientjourney'); ?></span>
                                <span class="status-active"><?php esc_html_e('Active', 'evolvewp-clientjourney'); ?></span>
                            </div>
                            <div class="evolvewp-clientjourney-task-detail-meta-item">
                                <span class="evolvewp-clientjourney-task-detail-meta-label"><?php esc_html_e('Priority:', 'evolvewp-clientjourney'); ?></span>
                                <span class="priority-high"><?php esc_html_e('High', 'evolvewp-clientjourney'); ?></span>
                            </div>
                            <div class="evolvewp-clientjourney-task-detail-meta-item">
                                <span class="evolvewp-clientjourney-task-detail-meta-label"><?php esc_html_e('Created:', 'evolvewp-clientjourney'); ?></span>
                                <span><?php echo esc_html( gmdate( 'Y-m-d H:i' ) ); ?></span>
                            </div>
                        </div>

                        <div class="evolvewp-clientjourney-task-description">
                            <h4><?php esc_html_e('Description', 'evolvewp-clientjourney'); ?></h4>
                            <p><?php esc_html_e('Complete technical analysis of Apple Inc. (AAPL) stock performance over the last quarter. Include price movements, volume analysis, and comparison with sector averages.', 'evolvewp-clientjourney'); ?></p>
                        </div>

                        <div class="evolvewp-clientjourney-task-attachments">
                            <h4><?php esc_html_e('Attachments', 'evolvewp-clientjourney'); ?></h4>
                            <ul>
                                <li><span class="dashicons dashicons-media-spreadsheet"></span> AAPL_Q3_Data.xlsx</li>
                                <li><span class="dashicons dashicons-chart-line"></span> Technical_Indicators.pdf</li>
                            </ul>
                        </div>
                    </div>
                    <div class="evolvewp-clientjourney-modal-footer">
                        <button class="tp-button tp-button-secondary close-task-modal"><?php esc_html_e('Close', 'evolvewp-clientjourney'); ?></button>
                        <button class="tp-button tp-button-primary"><?php esc_html_e('Edit Task', 'evolvewp-clientjourney'); ?></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Loading Modal Demo -->
        <div class="component-demo">
            <h4><?php esc_html_e('Loading Modal', 'evolvewp-clientjourney'); ?></h4>
            <button class="tp-button tp-button-secondary" id="open-loading-modal"><?php esc_html_e('Show Loading', 'evolvewp-clientjourney'); ?></button>

            <!-- Loading Modal Structure -->
            <div id="ui-library-loading-modal" class="evolvewp-clientjourney-modal" style="display:none;">
                <div class="evolvewp-clientjourney-modal-content">
                    <div class="evolvewp-clientjourney-modal-header">
                        <h2><?php esc_html_e('Processing Request', 'evolvewp-clientjourney'); ?></h2>
                    </div>
                    <div class="evolvewp-clientjourney-modal-body">
                        <div class="evolvewp-clientjourney-loading-spinner">
                            <span class="spinner is-active"></span>
                            <p><?php esc_html_e('Please wait while we process your request...', 'evolvewp-clientjourney'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Confirmation Modal Demo -->
        <div class="component-demo">
            <h4><?php esc_html_e('Confirmation Modal', 'evolvewp-clientjourney'); ?></h4>
            <button class="tp-button tp-button-danger" id="open-confirm-modal"><?php esc_html_e('Delete Item', 'evolvewp-clientjourney'); ?></button>

            <!-- Confirmation Modal Structure -->
            <div id="ui-library-confirm-modal" class="evolvewp-clientjourney-modal" style="display:none;">
                <div class="evolvewp-clientjourney-modal-content">
                    <div class="evolvewp-clientjourney-modal-header">
                        <h2><?php esc_html_e('Confirm Deletion', 'evolvewp-clientjourney'); ?></h2>
                        <button class="evolvewp-clientjourney-modal-close" aria-label="<?php esc_attr_e('Close modal', 'evolvewp-clientjourney'); ?>">&times;</button>
                    </div>
                    <div class="evolvewp-clientjourney-modal-body">
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <span class="dashicons dashicons-warning" style="color: #d63638; font-size: 32px; width: 32px; height: 32px;"></span>
                            <div>
                                <p style="margin: 0; font-weight: 600;"><?php esc_html_e('Are you sure you want to delete this item?', 'evolvewp-clientjourney'); ?></p>
                                <p style="margin: 5px 0 0 0; color: #646970;"><?php esc_html_e('This action cannot be undone.', 'evolvewp-clientjourney'); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="evolvewp-clientjourney-modal-footer">
                        <button class="tp-button tp-button-secondary close-confirm-modal"><?php esc_html_e('Cancel', 'evolvewp-clientjourney'); ?></button>
                        <button class="tp-button tp-button-danger"><?php esc_html_e('Delete', 'evolvewp-clientjourney'); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Add inline script for modal functionality using existing patterns
    $evolvewp_cj_modal_script = "
        jQuery(document).ready(function($) {
            // Basic modal functionality
            $('#open-demo-modal').on('click', function() {
                $('#ui-library-demo-modal').show().addClass('open');
            });

            $('#open-task-modal').on('click', function() {
                $('#ui-library-task-modal').show().addClass('open');
            });

            $('#open-loading-modal').on('click', function() {
                var modal = $('#ui-library-loading-modal');
                modal.show().addClass('open');
                
                // Auto close loading modal after 3 seconds
                setTimeout(function() {
                    modal.hide().removeClass('open');
                }, 3000);
            });

            $('#open-confirm-modal').on('click', function() {
                $('#ui-library-confirm-modal').show().addClass('open');
            });

            // Close modal functionality
            $('.evolvewp-clientjourney-modal-close, .close-demo-modal, .close-task-modal, .close-confirm-modal').on('click', function() {
                $(this).closest('.evolvewp-clientjourney-modal').hide().removeClass('open');
            });

            // Close modal by clicking outside
            $('.evolvewp-clientjourney-modal').on('click', function(event) {
                if ($(event.target).is('.evolvewp-clientjourney-modal')) {
                    $(this).hide().removeClass('open');
                }
            });

            // Escape key to close modal
            $(document).on('keydown', function(event) {
                if (event.keyCode === 27) { // ESC key
                    $('.evolvewp-clientjourney-modal:visible').hide().removeClass('open');
                }
            });
        });
    ";

    wp_add_inline_script('jquery', $evolvewp_cj_modal_script);
    ?>
</div>

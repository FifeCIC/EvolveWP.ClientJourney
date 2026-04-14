<?php
/**
 * UI Library Form Components Partial
 *
 * @package evolvewp-clientjourney/Admin/Views/Partials
 * @version 1.0.0
 */

defined('ABSPATH') || exit;
?>
<div class="evolvewp-clientjourney-ui-section">
    <h3><?php esc_html_e('Form Components', 'evolvewp-clientjourney'); ?></h3>
    <p><?php esc_html_e('Standard form elements and input controls for consistent user input handling.', 'evolvewp-clientjourney'); ?></p>

    <!-- Text Inputs -->
    <div class="evolvewp-clientjourney-component-group">
        <h4><?php esc_html_e('Text Inputs', 'evolvewp-clientjourney'); ?></h4>
        <div class="evolvewp-clientjourney-form-showcase">
            <div class="evolvewp-clientjourney-form-row">
                <label class="evolvewp-clientjourney-form-label" for="demo-text-input"><?php esc_html_e('Text Input', 'evolvewp-clientjourney'); ?></label>
                <input type="text" id="demo-text-input" class="evolvewp-clientjourney-form-input" placeholder="<?php esc_attr_e('Enter text...', 'evolvewp-clientjourney'); ?>">
            </div>
            <div class="evolvewp-clientjourney-form-row">
                <label class="evolvewp-clientjourney-form-label" for="demo-email-input"><?php esc_html_e('Email Input', 'evolvewp-clientjourney'); ?></label>
                <input type="email" id="demo-email-input" class="evolvewp-clientjourney-form-input" placeholder="<?php esc_attr_e('user@example.com', 'evolvewp-clientjourney'); ?>">
            </div>
            <div class="evolvewp-clientjourney-form-row">
                <label class="evolvewp-clientjourney-form-label" for="demo-password-input"><?php esc_html_e('Password Input', 'evolvewp-clientjourney'); ?></label>
                <input type="password" id="demo-password-input" class="evolvewp-clientjourney-form-input" placeholder="<?php esc_attr_e('Enter password...', 'evolvewp-clientjourney'); ?>">
            </div>
            <div class="evolvewp-clientjourney-form-row">
                <label class="evolvewp-clientjourney-form-label" for="demo-number-input"><?php esc_html_e('Number Input', 'evolvewp-clientjourney'); ?></label>
                <input type="number" id="demo-number-input" class="evolvewp-clientjourney-form-input evolvewp-clientjourney-form-input-number" min="0" max="100" value="50">
            </div>
        </div>
    </div>

    <!-- Textarea -->
    <div class="evolvewp-clientjourney-component-group">
        <h4><?php esc_html_e('Textarea', 'evolvewp-clientjourney'); ?></h4>
        <div class="evolvewp-clientjourney-form-showcase">
            <div class="evolvewp-clientjourney-form-row">
                <label class="evolvewp-clientjourney-form-label" for="demo-textarea"><?php esc_html_e('Description', 'evolvewp-clientjourney'); ?></label>
                <textarea id="demo-textarea" class="evolvewp-clientjourney-form-textarea" rows="4" placeholder="<?php esc_attr_e('Enter detailed description...', 'evolvewp-clientjourney'); ?>"></textarea>
            </div>
        </div>
    </div>

    <!-- Select Dropdowns -->
    <div class="evolvewp-clientjourney-component-group">
        <h4><?php esc_html_e('Select Dropdowns', 'evolvewp-clientjourney'); ?></h4>
        <div class="evolvewp-clientjourney-form-showcase">
            <div class="evolvewp-clientjourney-form-row">
                <label class="evolvewp-clientjourney-form-label" for="demo-select"><?php esc_html_e('Single Select', 'evolvewp-clientjourney'); ?></label>
                <select id="demo-select" class="evolvewp-clientjourney-form-select">
                    <option value=""><?php esc_html_e('Choose option...', 'evolvewp-clientjourney'); ?></option>
                    <option value="option1"><?php esc_html_e('Option 1', 'evolvewp-clientjourney'); ?></option>
                    <option value="option2"><?php esc_html_e('Option 2', 'evolvewp-clientjourney'); ?></option>
                    <option value="option3"><?php esc_html_e('Option 3', 'evolvewp-clientjourney'); ?></option>
                </select>
            </div>
            <div class="evolvewp-clientjourney-form-row">
                <label class="evolvewp-clientjourney-form-label" for="demo-multiselect"><?php esc_html_e('Multi Select', 'evolvewp-clientjourney'); ?></label>
                <select id="demo-multiselect" class="evolvewp-clientjourney-form-select evolvewp-clientjourney-form-select-multiple" multiple size="4">
                    <option value="apple"><?php esc_html_e('Apple', 'evolvewp-clientjourney'); ?></option>
                    <option value="banana" selected><?php esc_html_e('Banana', 'evolvewp-clientjourney'); ?></option>
                    <option value="cherry"><?php esc_html_e('Cherry', 'evolvewp-clientjourney'); ?></option>
                    <option value="date" selected><?php esc_html_e('Date', 'evolvewp-clientjourney'); ?></option>
                </select>
            </div>
        </div>
    </div>

    <!-- Checkbox and Radio Groups -->
    <div class="evolvewp-clientjourney-component-group">
        <h4><?php esc_html_e('Checkbox and Radio Groups', 'evolvewp-clientjourney'); ?></h4>
        <div class="evolvewp-clientjourney-form-showcase">
            <div class="evolvewp-clientjourney-form-row">
                <fieldset class="evolvewp-clientjourney-form-fieldset">
                    <legend class="evolvewp-clientjourney-form-legend"><?php esc_html_e('Checkbox Group', 'evolvewp-clientjourney'); ?></legend>
                    <div class="evolvewp-clientjourney-form-checkbox-group">
                        <label class="evolvewp-clientjourney-form-checkbox-label">
                            <input type="checkbox" name="demo-checkbox[]" value="option1" checked class="evolvewp-clientjourney-form-checkbox">
                            <span class="evolvewp-clientjourney-form-checkbox-text"><?php esc_html_e('Option 1', 'evolvewp-clientjourney'); ?></span>
                        </label>
                        <label class="evolvewp-clientjourney-form-checkbox-label">
                            <input type="checkbox" name="demo-checkbox[]" value="option2" class="evolvewp-clientjourney-form-checkbox">
                            <span class="evolvewp-clientjourney-form-checkbox-text"><?php esc_html_e('Option 2', 'evolvewp-clientjourney'); ?></span>
                        </label>
                        <label class="evolvewp-clientjourney-form-checkbox-label">
                            <input type="checkbox" name="demo-checkbox[]" value="option3" checked class="evolvewp-clientjourney-form-checkbox">
                            <span class="evolvewp-clientjourney-form-checkbox-text"><?php esc_html_e('Option 3', 'evolvewp-clientjourney'); ?></span>
                        </label>
                    </div>
                </fieldset>
            </div>
            <div class="evolvewp-clientjourney-form-row">
                <fieldset class="evolvewp-clientjourney-form-fieldset">
                    <legend class="evolvewp-clientjourney-form-legend"><?php esc_html_e('Radio Group', 'evolvewp-clientjourney'); ?></legend>
                    <div class="evolvewp-clientjourney-form-radio-group">
                        <label class="evolvewp-clientjourney-form-radio-label">
                            <input type="radio" name="demo-radio" value="small" checked class="evolvewp-clientjourney-form-radio">
                            <span class="evolvewp-clientjourney-form-radio-text"><?php esc_html_e('Small', 'evolvewp-clientjourney'); ?></span>
                        </label>
                        <label class="evolvewp-clientjourney-form-radio-label">
                            <input type="radio" name="demo-radio" value="medium" class="evolvewp-clientjourney-form-radio">
                            <span class="evolvewp-clientjourney-form-radio-text"><?php esc_html_e('Medium', 'evolvewp-clientjourney'); ?></span>
                        </label>
                        <label class="evolvewp-clientjourney-form-radio-label">
                            <input type="radio" name="demo-radio" value="large" class="evolvewp-clientjourney-form-radio">
                            <span class="evolvewp-clientjourney-form-radio-text"><?php esc_html_e('Large', 'evolvewp-clientjourney'); ?></span>
                        </label>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>

    <!-- Form Validation States -->
    <div class="evolvewp-clientjourney-component-group">
        <h4><?php esc_html_e('Validation States', 'evolvewp-clientjourney'); ?></h4>
        <div class="evolvewp-clientjourney-form-showcase">
            <div class="evolvewp-clientjourney-form-row">
                <label class="evolvewp-clientjourney-form-label" for="demo-success-input"><?php esc_html_e('Success State', 'evolvewp-clientjourney'); ?></label>
                <input type="text" id="demo-success-input" class="evolvewp-clientjourney-form-input evolvewp-clientjourney-form-input-success" value="<?php esc_attr_e('Valid input', 'evolvewp-clientjourney'); ?>">
                <div class="evolvewp-clientjourney-form-feedback evolvewp-clientjourney-form-feedback-success">
                    <span class="dashicons dashicons-yes-alt"></span>
                    <?php esc_html_e('This field is valid', 'evolvewp-clientjourney'); ?>
                </div>
            </div>
            <div class="evolvewp-clientjourney-form-row">
                <label class="evolvewp-clientjourney-form-label" for="demo-error-input"><?php esc_html_e('Error State', 'evolvewp-clientjourney'); ?></label>
                <input type="text" id="demo-error-input" class="evolvewp-clientjourney-form-input evolvewp-clientjourney-form-input-error" value="<?php esc_attr_e('Invalid input', 'evolvewp-clientjourney'); ?>">
                <div class="evolvewp-clientjourney-form-feedback evolvewp-clientjourney-form-feedback-error">
                    <span class="dashicons dashicons-dismiss"></span>
                    <?php esc_html_e('This field has an error', 'evolvewp-clientjourney'); ?>
                </div>
            </div>
            <div class="evolvewp-clientjourney-form-row">
                <label class="evolvewp-clientjourney-form-label" for="demo-warning-input"><?php esc_html_e('Warning State', 'evolvewp-clientjourney'); ?></label>
                <input type="text" id="demo-warning-input" class="evolvewp-clientjourney-form-input evolvewp-clientjourney-form-input-warning" value="<?php esc_attr_e('Warning input', 'evolvewp-clientjourney'); ?>">
                <div class="evolvewp-clientjourney-form-feedback evolvewp-clientjourney-form-feedback-warning">
                    <span class="dashicons dashicons-warning"></span>
                    <?php esc_html_e('This field has a warning', 'evolvewp-clientjourney'); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Input -->
    <div class="evolvewp-clientjourney-component-group">
        <h4><?php esc_html_e('Search Input', 'evolvewp-clientjourney'); ?></h4>
        <div class="evolvewp-clientjourney-form-showcase">
            <div class="evolvewp-clientjourney-form-row">
                <label class="evolvewp-clientjourney-form-label" for="demo-search-input"><?php esc_html_e('Search', 'evolvewp-clientjourney'); ?></label>
                <div class="evolvewp-clientjourney-search-wrapper">
                    <input type="search" id="demo-search-input" class="evolvewp-clientjourney-form-input evolvewp-clientjourney-search-input" placeholder="<?php esc_attr_e('Search...', 'evolvewp-clientjourney'); ?>">
                    <span class="evolvewp-clientjourney-search-icon dashicons dashicons-search"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- File Upload -->
    <div class="evolvewp-clientjourney-component-group">
        <h4><?php esc_html_e('File Upload', 'evolvewp-clientjourney'); ?></h4>
        <div class="evolvewp-clientjourney-form-showcase">
            <div class="evolvewp-clientjourney-form-row">
                <label class="evolvewp-clientjourney-form-label" for="demo-file-input"><?php esc_html_e('File Upload', 'evolvewp-clientjourney'); ?></label>
                <input type="file" id="demo-file-input" class="evolvewp-clientjourney-form-file">
                <p class="evolvewp-clientjourney-form-description"><?php esc_html_e('Choose a file to upload (max 2MB)', 'evolvewp-clientjourney'); ?></p>
            </div>
        </div>
    </div>

    <!-- Form Layouts -->
    <div class="evolvewp-clientjourney-component-group">
        <h4><?php esc_html_e('Form Layouts', 'evolvewp-clientjourney'); ?></h4>
        <div class="evolvewp-clientjourney-form-showcase">
            <!-- Horizontal Layout -->
            <div class="evolvewp-clientjourney-form-layout evolvewp-clientjourney-form-layout-horizontal">
                <h5><?php esc_html_e('Horizontal Layout', 'evolvewp-clientjourney'); ?></h5>
                <div class="evolvewp-clientjourney-form-row evolvewp-clientjourney-form-row-horizontal">
                    <label class="evolvewp-clientjourney-form-label evolvewp-clientjourney-form-label-horizontal" for="demo-horizontal-1"><?php esc_html_e('First Name:', 'evolvewp-clientjourney'); ?></label>
                    <input type="text" id="demo-horizontal-1" class="evolvewp-clientjourney-form-input">
                </div>
                <div class="evolvewp-clientjourney-form-row evolvewp-clientjourney-form-row-horizontal">
                    <label class="evolvewp-clientjourney-form-label evolvewp-clientjourney-form-label-horizontal" for="demo-horizontal-2"><?php esc_html_e('Last Name:', 'evolvewp-clientjourney'); ?></label>
                    <input type="text" id="demo-horizontal-2" class="evolvewp-clientjourney-form-input">
                </div>
            </div>

            <!-- Inline Layout -->
            <div class="evolvewp-clientjourney-form-layout evolvewp-clientjourney-form-layout-inline">
                <h5><?php esc_html_e('Inline Layout', 'evolvewp-clientjourney'); ?></h5>
                <div class="evolvewp-clientjourney-form-row evolvewp-clientjourney-form-row-inline">
                    <label class="evolvewp-clientjourney-form-label evolvewp-clientjourney-form-label-inline" for="demo-inline-1"><?php esc_html_e('City:', 'evolvewp-clientjourney'); ?></label>
                    <input type="text" id="demo-inline-1" class="evolvewp-clientjourney-form-input evolvewp-clientjourney-form-input-inline">
                    <label class="evolvewp-clientjourney-form-label evolvewp-clientjourney-form-label-inline" for="demo-inline-2"><?php esc_html_e('State:', 'evolvewp-clientjourney'); ?></label>
                    <select id="demo-inline-2" class="evolvewp-clientjourney-form-select evolvewp-clientjourney-form-select-inline">
                        <option value=""><?php esc_html_e('Select...', 'evolvewp-clientjourney'); ?></option>
                        <option value="ca"><?php esc_html_e('California', 'evolvewp-clientjourney'); ?></option>
                        <option value="ny"><?php esc_html_e('New York', 'evolvewp-clientjourney'); ?></option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Simple Contact Form -->
    <div class="evolvewp-clientjourney-component-group">
        <h4><?php esc_html_e('Simple Contact Form', 'evolvewp-clientjourney'); ?></h4>
        <div class="evolvewp-clientjourney-form-showcase">
            <form method="post" action="" class="evolvewp-clientjourney-demo-form">
                <?php wp_nonce_field('evolvewp_cj_ui_contact_form'); ?>
                <input type="hidden" name="evolvewp_cj_form_action" value="contact_form">
                
                <div class="evolvewp-clientjourney-form-row">
                    <label class="evolvewp-clientjourney-form-label" for="contact-name"><?php esc_html_e('Name *', 'evolvewp-clientjourney'); ?></label>
                    <input type="text" id="contact-name" name="contact_name" class="evolvewp-clientjourney-form-input" required>
                </div>
                <div class="evolvewp-clientjourney-form-row">
                    <label class="evolvewp-clientjourney-form-label" for="contact-email"><?php esc_html_e('Email *', 'evolvewp-clientjourney'); ?></label>
                    <input type="email" id="contact-email" name="contact_email" class="evolvewp-clientjourney-form-input" required>
                </div>
                <div class="evolvewp-clientjourney-form-row">
                    <label class="evolvewp-clientjourney-form-label" for="contact-message"><?php esc_html_e('Message *', 'evolvewp-clientjourney'); ?></label>
                    <textarea id="contact-message" name="contact_message" class="evolvewp-clientjourney-form-textarea" rows="4" required></textarea>
                </div>
                <div class="evolvewp-clientjourney-form-actions">
                    <button type="submit" class="evolvewp-clientjourney-button evolvewp-clientjourney-button-primary"><?php esc_html_e('Send Message', 'evolvewp-clientjourney'); ?></button>
                </div>
            </form>
        </div>
    </div>

    <!-- Trading Settings Form -->
    <div class="evolvewp-clientjourney-component-group">
        <h4><?php esc_html_e('Trading Settings Form', 'evolvewp-clientjourney'); ?></h4>
        <div class="evolvewp-clientjourney-form-showcase">
            <form method="post" action="" class="evolvewp-clientjourney-demo-form">
                <?php wp_nonce_field('evolvewp_cj_ui_trading_settings'); ?>
                <input type="hidden" name="evolvewp_cj_form_action" value="trading_settings">
                
                <div class="evolvewp-clientjourney-form-row">
                    <label class="evolvewp-clientjourney-form-label" for="risk-level"><?php esc_html_e('Risk Level', 'evolvewp-clientjourney'); ?></label>
                    <select id="risk-level" name="risk_level" class="evolvewp-clientjourney-form-select">
                        <option value="low"><?php esc_html_e('Low Risk', 'evolvewp-clientjourney'); ?></option>
                        <option value="medium" selected><?php esc_html_e('Medium Risk', 'evolvewp-clientjourney'); ?></option>
                        <option value="high"><?php esc_html_e('High Risk', 'evolvewp-clientjourney'); ?></option>
                    </select>
                </div>
                <div class="evolvewp-clientjourney-form-row">
                    <label class="evolvewp-clientjourney-form-label" for="max-investment"><?php esc_html_e('Max Investment ($)', 'evolvewp-clientjourney'); ?></label>
                    <input type="number" id="max-investment" name="max_investment" class="evolvewp-clientjourney-form-input" min="100" max="100000" value="5000">
                </div>
                <div class="evolvewp-clientjourney-form-row">
                    <fieldset class="evolvewp-clientjourney-form-fieldset">
                        <legend class="evolvewp-clientjourney-form-legend"><?php esc_html_e('Trading Preferences', 'evolvewp-clientjourney'); ?></legend>
                        <div class="evolvewp-clientjourney-form-checkbox-group">
                            <label class="evolvewp-clientjourney-form-checkbox-label">
                                <input type="checkbox" name="preferences[]" value="day_trading" class="evolvewp-clientjourney-form-checkbox">
                                <span class="evolvewp-clientjourney-form-checkbox-text"><?php esc_html_e('Day Trading', 'evolvewp-clientjourney'); ?></span>
                            </label>
                            <label class="evolvewp-clientjourney-form-checkbox-label">
                                <input type="checkbox" name="preferences[]" value="swing_trading" class="evolvewp-clientjourney-form-checkbox" checked>
                                <span class="evolvewp-clientjourney-form-checkbox-text"><?php esc_html_e('Swing Trading', 'evolvewp-clientjourney'); ?></span>
                            </label>
                            <label class="evolvewp-clientjourney-form-checkbox-label">
                                <input type="checkbox" name="preferences[]" value="long_term" class="evolvewp-clientjourney-form-checkbox">
                                <span class="evolvewp-clientjourney-form-checkbox-text"><?php esc_html_e('Long-term Investment', 'evolvewp-clientjourney'); ?></span>
                            </label>
                        </div>
                    </fieldset>
                </div>
                <div class="evolvewp-clientjourney-form-actions">
                    <button type="submit" class="evolvewp-clientjourney-button evolvewp-clientjourney-button-primary"><?php esc_html_e('Save Settings', 'evolvewp-clientjourney'); ?></button>
                    <button type="reset" class="evolvewp-clientjourney-button evolvewp-clientjourney-button-secondary"><?php esc_html_e('Reset', 'evolvewp-clientjourney'); ?></button>
                </div>
            </form>
        </div>
    </div>

    <!-- Ajax Validation Form -->
    <div class="evolvewp-clientjourney-component-group">
        <h4><?php esc_html_e('Ajax Validation Form', 'evolvewp-clientjourney'); ?></h4>
        <div class="evolvewp-clientjourney-form-showcase">
            <form id="ajax-validation-form" class="evolvewp-clientjourney-demo-form">
                <?php wp_nonce_field('evolvewp_cj_ui_ajax_validation', 'ajax_nonce'); ?>
                
                <div class="evolvewp-clientjourney-form-row">
                    <label class="evolvewp-clientjourney-form-label" for="username"><?php esc_html_e('Username *', 'evolvewp-clientjourney'); ?></label>
                    <input type="text" id="username" name="username" class="evolvewp-clientjourney-form-input" required>
                    <div id="username-feedback" class="evolvewp-clientjourney-form-feedback" style="display:none;"></div>
                </div>
                <div class="evolvewp-clientjourney-form-row">
                    <label class="evolvewp-clientjourney-form-label" for="symbol-check"><?php esc_html_e('Stock Symbol *', 'evolvewp-clientjourney'); ?></label>
                    <input type="text" id="symbol-check" name="symbol" class="evolvewp-clientjourney-form-input" placeholder="AAPL" required>
                    <div id="symbol-feedback" class="evolvewp-clientjourney-form-feedback" style="display:none;"></div>
                </div>
                <div class="evolvewp-clientjourney-form-actions">
                    <button type="submit" class="evolvewp-clientjourney-button evolvewp-clientjourney-button-primary" id="ajax-submit-btn"><?php esc_html_e('Validate & Submit', 'evolvewp-clientjourney'); ?></button>
                </div>
            </form>
        </div>
    </div>

    <script>
    jQuery(document).ready(function($) {
        // Username validation
        $('#username').on('blur', function() {
            var username = $(this).val();
            if (username.length < 3) return;
            
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'evolvewp_cj_validate_username',
                    username: username,
                    nonce: $('#ajax_nonce').val()
                },
                success: function(response) {
                    var feedback = $('#username-feedback');
                    feedback.show();
                    
                    if (response.success) {
                        feedback.removeClass('evolvewp-clientjourney-form-feedback-error')
                               .addClass('evolvewp-clientjourney-form-feedback-success')
                               .html('<span class="dashicons dashicons-yes-alt"></span>' + response.data.message);
                        $('#username').removeClass('evolvewp-clientjourney-form-input-error')
                                     .addClass('evolvewp-clientjourney-form-input-success');
                    } else {
                        feedback.removeClass('evolvewp-clientjourney-form-feedback-success')
                               .addClass('evolvewp-clientjourney-form-feedback-error')
                               .html('<span class="dashicons dashicons-dismiss"></span>' + response.data.message);
                        $('#username').removeClass('evolvewp-clientjourney-form-input-success')
                                     .addClass('evolvewp-clientjourney-form-input-error');
                    }
                }
            });
        });
        
        // Symbol validation
        $('#symbol-check').on('blur', function() {
            var symbol = $(this).val().toUpperCase();
            if (symbol.length < 1) return;
            
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'evolvewp_cj_validate_symbol',
                    symbol: symbol,
                    nonce: $('#ajax_nonce').val()
                },
                success: function(response) {
                    var feedback = $('#symbol-feedback');
                    feedback.show();
                    
                    if (response.success) {
                        feedback.removeClass('evolvewp-clientjourney-form-feedback-error')
                               .addClass('evolvewp-clientjourney-form-feedback-success')
                               .html('<span class="dashicons dashicons-yes-alt"></span>' + response.data.message);
                        $('#symbol-check').removeClass('evolvewp-clientjourney-form-input-error')
                                         .addClass('evolvewp-clientjourney-form-input-success');
                    } else {
                        feedback.removeClass('evolvewp-clientjourney-form-feedback-success')
                               .addClass('evolvewp-clientjourney-form-feedback-error')
                               .html('<span class="dashicons dashicons-dismiss"></span>' + response.data.message);
                        $('#symbol-check').removeClass('evolvewp-clientjourney-form-input-success')
                                         .addClass('evolvewp-clientjourney-form-input-error');
                    }
                }
            });
        });
        
        // Form submission
        $('#ajax-validation-form').on('submit', function(e) {
            e.preventDefault();
            
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'evolvewp_cj_submit_ajax_form',
                    username: $('#username').val(),
                    symbol: $('#symbol-check').val(),
                    nonce: $('#ajax_nonce').val()
                },
                success: function(response) {
                    if (response.success) {
                        alert('Form submitted successfully: ' + response.data.message);
                    } else {
                        alert('Error: ' + response.data.message);
                    }
                }
            });
        });
    });
    </script>
</div>

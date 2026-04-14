<?php
/**
 * UI Library Button Components Partial
 *
 * @package evolvewp-clientjourney/Admin/Views/Partials
 * @version 1.0.7
 */

defined('ABSPATH') || exit;
?>
<div class="evolvewp-clientjourney-ui-section">
    <h3><?php esc_html_e('Button Components', 'evolvewp-clientjourney'); ?></h3>
    <p><?php esc_html_e('Standard button variations for consistent UI interactions.', 'evolvewp-clientjourney'); ?></p>

    <!-- Primary Buttons -->
    <div class="evolvewp-clientjourney-component-group">
        <h4><?php esc_html_e('Primary Buttons', 'evolvewp-clientjourney'); ?></h4>
        <div class="evolvewp-clientjourney-component-showcase">
            <button class="button button-primary"><?php esc_html_e('Primary Button', 'evolvewp-clientjourney'); ?></button>
            <button class="button button-primary" disabled><?php esc_html_e('Disabled Primary', 'evolvewp-clientjourney'); ?></button>
            <button class="button button-primary button-large"><?php esc_html_e('Large Primary', 'evolvewp-clientjourney'); ?></button>
            <button class="button button-primary button-small"><?php esc_html_e('Small Primary', 'evolvewp-clientjourney'); ?></button>
        </div>
    </div>

    <!-- Secondary Buttons -->
    <div class="evolvewp-clientjourney-component-group">
        <h4><?php esc_html_e('Secondary Buttons', 'evolvewp-clientjourney'); ?></h4>
        <div class="evolvewp-clientjourney-component-showcase">
            <button class="button button-secondary"><?php esc_html_e('Secondary Button', 'evolvewp-clientjourney'); ?></button>
            <button class="button button-secondary" disabled><?php esc_html_e('Disabled Secondary', 'evolvewp-clientjourney'); ?></button>
            <button class="button button-secondary button-large"><?php esc_html_e('Large Secondary', 'evolvewp-clientjourney'); ?></button>
            <button class="button button-secondary button-small"><?php esc_html_e('Small Secondary', 'evolvewp-clientjourney'); ?></button>
        </div>
    </div>

    <!-- Icon Buttons -->
    <div class="evolvewp-clientjourney-component-group">
        <h4><?php esc_html_e('Icon Buttons', 'evolvewp-clientjourney'); ?></h4>
        <div class="evolvewp-clientjourney-component-showcase">
            <button class="button button-primary">
                <span class="dashicons dashicons-plus-alt"></span>
                <?php esc_html_e('Add New', 'evolvewp-clientjourney'); ?>
            </button>
            <button class="button button-secondary">
                <span class="dashicons dashicons-edit"></span>
                <?php esc_html_e('Edit', 'evolvewp-clientjourney'); ?>
            </button>
            <button class="button button-secondary">
                <span class="dashicons dashicons-trash"></span>
                <?php esc_html_e('Delete', 'evolvewp-clientjourney'); ?>
            </button>
            <button class="button button-secondary">
                <span class="dashicons dashicons-download"></span>
                <?php esc_html_e('Download', 'evolvewp-clientjourney'); ?>
            </button>
        </div>
    </div>

    <!-- Link Buttons -->
    <div class="evolvewp-clientjourney-component-group">
        <h4><?php esc_html_e('Link Buttons', 'evolvewp-clientjourney'); ?></h4>
        <div class="evolvewp-clientjourney-component-showcase">
            <button class="button-link"><?php esc_html_e('Link Button', 'evolvewp-clientjourney'); ?></button>
            <button class="button-link-delete"><?php esc_html_e('Delete Link', 'evolvewp-clientjourney'); ?></button>
            <button class="button-link" disabled><?php esc_html_e('Disabled Link', 'evolvewp-clientjourney'); ?></button>
        </div>
    </div>

    <!-- Button Groups -->
    <div class="evolvewp-clientjourney-component-group">
        <h4><?php esc_html_e('Button Groups', 'evolvewp-clientjourney'); ?></h4>
        <div class="evolvewp-clientjourney-component-showcase">
            <div class="button-group">
                <button class="button button-secondary"><?php esc_html_e('Left', 'evolvewp-clientjourney'); ?></button>
                <button class="button button-secondary"><?php esc_html_e('Center', 'evolvewp-clientjourney'); ?></button>
                <button class="button button-secondary"><?php esc_html_e('Right', 'evolvewp-clientjourney'); ?></button>
            </div>
        </div>
    </div>

    <!-- API Status Buttons -->
    <div class="evolvewp-clientjourney-component-group">
        <h4><?php esc_html_e('API Status Buttons', 'evolvewp-clientjourney'); ?></h4>
        <div class="evolvewp-clientjourney-component-showcase">
            <button class="button"><?php esc_html_e('Call Test', 'evolvewp-clientjourney'); ?></button>
            <button class="button"><?php esc_html_e('Query Test', 'evolvewp-clientjourney'); ?></button>
            <button class="button"><?php esc_html_e('Status Details', 'evolvewp-clientjourney'); ?></button>
            <button class="button"><?php esc_html_e('Switch to Paper', 'evolvewp-clientjourney'); ?></button>
            <button class="button"><?php esc_html_e('Switch to Live', 'evolvewp-clientjourney'); ?></button>
            <button class="button"><?php esc_html_e('Enable', 'evolvewp-clientjourney'); ?></button>
            <button class="button"><?php esc_html_e('Disable', 'evolvewp-clientjourney'); ?></button>
        </div>
    </div>

    <!-- Status Badge Buttons -->
    <div class="evolvewp-clientjourney-component-group">
        <h4><?php esc_html_e('Status Badge Buttons', 'evolvewp-clientjourney'); ?></h4>
        <div class="evolvewp-clientjourney-component-showcase">
            <span class="status-badge status-active"><?php esc_html_e('Operational', 'evolvewp-clientjourney'); ?></span>
            <span class="status-badge status-inactive"><?php esc_html_e('Disabled', 'evolvewp-clientjourney'); ?></span>
            <span class="type-badge type-data"><?php esc_html_e('Data Only', 'evolvewp-clientjourney'); ?></span>
            <span class="type-badge type-trading"><?php esc_html_e('Trading', 'evolvewp-clientjourney'); ?></span>
            <span class="mode-badge mode-live"><?php esc_html_e('Live', 'evolvewp-clientjourney'); ?></span>
            <span class="mode-badge mode-paper"><?php esc_html_e('Paper', 'evolvewp-clientjourney'); ?></span>
            <span class="rate-limit-badge rate-normal"><?php esc_html_e('Normal', 'evolvewp-clientjourney'); ?></span>
        </div>
    </div>
</div>

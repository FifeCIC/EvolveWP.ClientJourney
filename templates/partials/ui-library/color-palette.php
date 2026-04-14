<?php
/**
 * UI Library Color Palette Partial
 *
 * @package evolvewp-clientjourney/Admin/Views/Partials
 * @version 1.0.0
 */

defined('ABSPATH') || exit;
?>
<div class="evolvewp-clientjourney-ui-section">
    <h3><?php esc_html_e('Color Palette', 'evolvewp-clientjourney'); ?></h3>
    <p><?php esc_html_e('The evolvewp-clientjourney color system uses CSS custom properties for consistent theming.', 'evolvewp-clientjourney'); ?></p>

    <!-- Primary Colors -->
    <div class="evolvewp-clientjourney-color-group">
        <h4><?php esc_html_e('Primary Colors', 'evolvewp-clientjourney'); ?></h4>
        <div class="evolvewp-clientjourney-color-grid">
            <div class="evolvewp-clientjourney-color-item" onclick=evolvewp-clientjourneyUILibrary.showColorInfo(this, 'Primary', '#2271b1', '--evolvewp-clientjourney-color-primary')">
                <div class="evolvewp-clientjourney-color-swatch evolvewp-clientjourney-color-primary"></div>
                <div class="evolvewp-clientjourney-color-info">
                    <span class="evolvewp-clientjourney-color-name">Primary</span>
                    <span class="evolvewp-clientjourney-color-value">#2271b1</span>
                </div>
            </div>
            <div class="evolvewp-clientjourney-color-item" onclick=evolvewp-clientjourneyUILibrary.showColorInfo(this, 'Primary Dark', '#135e96', '--evolvewp-clientjourney-color-primary-dark')">
                <div class="evolvewp-clientjourney-color-swatch evolvewp-clientjourney-color-primary-dark"></div>
                <div class="evolvewp-clientjourney-color-info">
                    <span class="evolvewp-clientjourney-color-name">Primary Dark</span>
                    <span class="evolvewp-clientjourney-color-value">#135e96</span>
                </div>
            </div>
            <div class="evolvewp-clientjourney-color-item" onclick=evolvewp-clientjourneyUILibrary.showColorInfo(this, 'Primary Light', '#72aee6', '--evolvewp-clientjourney-color-primary-light')">
                <div class="evolvewp-clientjourney-color-swatch evolvewp-clientjourney-color-primary-light"></div>
                <div class="evolvewp-clientjourney-color-info">
                    <span class="evolvewp-clientjourney-color-name">Primary Light</span>
                    <span class="evolvewp-clientjourney-color-value">#72aee6</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Status Colors -->
    <div class="evolvewp-clientjourney-color-group">
        <h4><?php esc_html_e('Status Colors', 'evolvewp-clientjourney'); ?></h4>
        <div class="evolvewp-clientjourney-color-grid">
            <div class="evolvewp-clientjourney-color-item" onclick=evolvewp-clientjourneyUILibrary.showColorInfo(this, 'Success', '#00a32a', '--evolvewp-clientjourney-color-success')">
                <div class="evolvewp-clientjourney-color-swatch evolvewp-clientjourney-color-success"></div>
                <div class="evolvewp-clientjourney-color-info">
                    <span class="evolvewp-clientjourney-color-name">Success</span>
                    <span class="evolvewp-clientjourney-color-value">#00a32a</span>
                </div>
            </div>
            <div class="evolvewp-clientjourney-color-item" onclick=evolvewp-clientjourneyUILibrary.showColorInfo(this, 'Warning', '#dba617', '--evolvewp-clientjourney-color-warning')">
                <div class="evolvewp-clientjourney-color-swatch evolvewp-clientjourney-color-warning"></div>
                <div class="evolvewp-clientjourney-color-info">
                    <span class="evolvewp-clientjourney-color-name">Warning</span>
                    <span class="evolvewp-clientjourney-color-value">#dba617</span>
                </div>
            </div>
            <div class="evolvewp-clientjourney-color-item" onclick=evolvewp-clientjourneyUILibrary.showColorInfo(this, 'Error', '#d63638', '--evolvewp-clientjourney-color-error')">
                <div class="evolvewp-clientjourney-color-swatch evolvewp-clientjourney-color-error"></div>
                <div class="evolvewp-clientjourney-color-info">
                    <span class="evolvewp-clientjourney-color-name">Error</span>
                    <span class="evolvewp-clientjourney-color-value">#d63638</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Neutral Colors -->
    <div class="evolvewp-clientjourney-color-group">
        <h4><?php esc_html_e('Neutral Colors', 'evolvewp-clientjourney'); ?></h4>
        <div class="evolvewp-clientjourney-color-grid">
            <div class="evolvewp-clientjourney-color-item" onclick=evolvewp-clientjourneyUILibrary.showColorInfo(this, 'White', '#ffffff', '--evolvewp-clientjourney-color-white')">
                <div class="evolvewp-clientjourney-color-swatch evolvewp-clientjourney-color-white"></div>
                <div class="evolvewp-clientjourney-color-info">
                    <span class="evolvewp-clientjourney-color-name">White</span>
                    <span class="evolvewp-clientjourney-color-value">#ffffff</span>
                </div>
            </div>
            <div class="evolvewp-clientjourney-color-item" onclick=evolvewp-clientjourneyUILibrary.showColorInfo(this, 'Gray 100', '#f0f0f1', '--evolvewp-clientjourney-color-gray-100')">
                <div class="evolvewp-clientjourney-color-swatch evolvewp-clientjourney-color-gray-100"></div>
                <div class="evolvewp-clientjourney-color-info">
                    <span class="evolvewp-clientjourney-color-name">Gray 100</span>
                    <span class="evolvewp-clientjourney-color-value">#f0f0f1</span>
                </div>
            </div>
            <div class="evolvewp-clientjourney-color-item" onclick=evolvewp-clientjourneyUILibrary.showColorInfo(this, 'Gray 300', '#dcdcde', '--evolvewp-clientjourney-color-gray-300')">
                <div class="evolvewp-clientjourney-color-swatch evolvewp-clientjourney-color-gray-300"></div>
                <div class="evolvewp-clientjourney-color-info">
                    <span class="evolvewp-clientjourney-color-name">Gray 300</span>
                    <span class="evolvewp-clientjourney-color-value">#dcdcde</span>
                </div>
            </div>
            <div class="evolvewp-clientjourney-color-item" onclick=evolvewp-clientjourneyUILibrary.showColorInfo(this, 'Gray 500', '#a7aaad', '--evolvewp-clientjourney-color-gray-500')">
                <div class="evolvewp-clientjourney-color-swatch evolvewp-clientjourney-color-gray-500"></div>
                <div class="evolvewp-clientjourney-color-info">
                    <span class="evolvewp-clientjourney-color-name">Gray 500</span>
                    <span class="evolvewp-clientjourney-color-value">#a7aaad</span>
                </div>
            </div>
            <div class="evolvewp-clientjourney-color-item" onclick=evolvewp-clientjourneyUILibrary.showColorInfo(this, 'Gray 700', '#646970', '--evolvewp-clientjourney-color-gray-700')">
                <div class="evolvewp-clientjourney-color-swatch evolvewp-clientjourney-color-gray-700"></div>
                <div class="evolvewp-clientjourney-color-info">
                    <span class="evolvewp-clientjourney-color-name">Gray 700</span>
                    <span class="evolvewp-clientjourney-color-value">#646970</span>
                </div>
            </div>
            <div class="evolvewp-clientjourney-color-item" onclick=evolvewp-clientjourneyUILibrary.showColorInfo(this, 'Gray 900', '#1d2327', '--evolvewp-clientjourney-color-gray-900')">
                <div class="evolvewp-clientjourney-color-swatch evolvewp-clientjourney-color-gray-900"></div>
                <div class="evolvewp-clientjourney-color-info">
                    <span class="evolvewp-clientjourney-color-name">Gray 900</span>
                    <span class="evolvewp-clientjourney-color-value">#1d2327</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Color Information Display -->
    <div id="evolvewp-clientjourney-color-info-display" class="evolvewp-clientjourney-color-info-panel" style="display: none;">
        <h4><?php esc_html_e('Color Information', 'evolvewp-clientjourney'); ?></h4>
        <div id="evolvewp-clientjourney-color-details"></div>
    </div>
</div>

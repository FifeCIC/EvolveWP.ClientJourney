<?php
/**
 * UI Library Animation Showcase Partial
 *
 * @package evolvewp-clientjourney/Admin/Views/Partials
 * @version 1.0.9
 */

defined('ABSPATH') || exit;
?>
<div class="evolvewp-clientjourney-ui-section">
    <h3><?php esc_html_e('Animation Showcase', 'evolvewp-clientjourney'); ?></h3>
    <p><?php esc_html_e('CSS animations and transitions for enhancing user experience and providing visual feedback.', 'evolvewp-clientjourney'); ?></p>
    
    <div class="evolvewp-clientjourney-component-group">
        <!-- Fade Animations -->
        <div class="component-demo">
            <h4><?php esc_html_e('Fade Animations', 'evolvewp-clientjourney'); ?></h4>
            <div class="evolvewp-clientjourney-component-showcase">
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Fade In', 'evolvewp-clientjourney'); ?></div>
                    <div class="evolvewp-clientjourney-card fade-in-demo" data-animation="evolvewp-clientjourney-fade-in"><?php esc_html_e('Hover Me', 'evolvewp-clientjourney'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Fade Out', 'evolvewp-clientjourney'); ?></div>
                    <div class="evolvewp-clientjourney-card fade-out-demo" data-animation="evolvewp-clientjourney-fade-out"><?php esc_html_e('Hover Me', 'evolvewp-clientjourney'); ?></div>
                </div>
            </div>
        </div>
        
        <!-- Slide Animations -->
        <div class="component-demo">
            <h4><?php esc_html_e('Slide Animations', 'evolvewp-clientjourney'); ?></h4>
            <div class="evolvewp-clientjourney-component-showcase">
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Slide Down', 'evolvewp-clientjourney'); ?></div>
                    <div class="evolvewp-clientjourney-card slide-down-demo" data-animation="evolvewp-clientjourney-slide-in-down"><?php esc_html_e('Hover Me', 'evolvewp-clientjourney'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Slide Up', 'evolvewp-clientjourney'); ?></div>
                    <div class="evolvewp-clientjourney-card slide-up-demo" data-animation="evolvewp-clientjourney-slide-in-up"><?php esc_html_e('Hover Me', 'evolvewp-clientjourney'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Slide Left', 'evolvewp-clientjourney'); ?></div>
                    <div class="evolvewp-clientjourney-card slide-left-demo" data-animation="evolvewp-clientjourney-slide-in-left"><?php esc_html_e('Hover Me', 'evolvewp-clientjourney'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Slide Right', 'evolvewp-clientjourney'); ?></div>
                    <div class="evolvewp-clientjourney-card slide-right-demo" data-animation="evolvewp-clientjourney-slide-in-right"><?php esc_html_e('Hover Me', 'evolvewp-clientjourney'); ?></div>
                </div>
            </div>
        </div>
        
        <!-- Continuous Animations -->
        <div class="component-demo">
            <h4><?php esc_html_e('Continuous Animations', 'evolvewp-clientjourney'); ?></h4>
            <div class="evolvewp-clientjourney-component-showcase">
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Pulse', 'evolvewp-clientjourney'); ?></div>
                    <div class="evolvewp-clientjourney-card evolvewp-clientjourney-pulse"><?php esc_html_e('Pulse', 'evolvewp-clientjourney'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Heartbeat', 'evolvewp-clientjourney'); ?></div>
                    <div class="evolvewp-clientjourney-card evolvewp-clientjourney-heartbeat"><?php esc_html_e('Heartbeat', 'evolvewp-clientjourney'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Spin', 'evolvewp-clientjourney'); ?></div>
                    <div class="evolvewp-clientjourney-card">
                        <span class="dashicons dashicons-update evolvewp-clientjourney-spin"></span>
                    </div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Bounce', 'evolvewp-clientjourney'); ?></div>
                    <div class="evolvewp-clientjourney-card evolvewp-clientjourney-bounce"><?php esc_html_e('Bounce', 'evolvewp-clientjourney'); ?></div>
                </div>
            </div>
        </div>
        
        <!-- Attention Animations -->
        <div class="component-demo">
            <h4><?php esc_html_e('Attention Animations', 'evolvewp-clientjourney'); ?></h4>
            <div class="evolvewp-clientjourney-component-showcase">
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Shake', 'evolvewp-clientjourney'); ?></div>
                    <div class="evolvewp-clientjourney-card shake-demo" data-animation="evolvewp-clientjourney-shake"><?php esc_html_e('Click Me', 'evolvewp-clientjourney'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Flash', 'evolvewp-clientjourney'); ?></div>
                    <div class="evolvewp-clientjourney-card evolvewp-clientjourney-flash"><?php esc_html_e('Flash', 'evolvewp-clientjourney'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Highlight', 'evolvewp-clientjourney'); ?></div>
                    <div class="evolvewp-clientjourney-card highlight-demo" data-animation="evolvewp-clientjourney-highlight"><?php esc_html_e('Click Me', 'evolvewp-clientjourney'); ?></div>
                </div>
            </div>
        </div>
        
        <!-- Scale Animations -->
        <div class="component-demo">
            <h4><?php esc_html_e('Scale Animations', 'evolvewp-clientjourney'); ?></h4>
            <div class="evolvewp-clientjourney-component-showcase">
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Scale In', 'evolvewp-clientjourney'); ?></div>
                    <div class="evolvewp-clientjourney-card scale-in-demo" data-animation="evolvewp-clientjourney-scale-in"><?php esc_html_e('Hover Me', 'evolvewp-clientjourney'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Scale Out', 'evolvewp-clientjourney'); ?></div>
                    <div class="evolvewp-clientjourney-card scale-out-demo" data-animation="evolvewp-clientjourney-scale-out"><?php esc_html_e('Hover Me', 'evolvewp-clientjourney'); ?></div>
                </div>
            </div>
        </div>
        
        <!-- Transitions -->
        <div class="component-demo">
            <h4><?php esc_html_e('Transitions', 'evolvewp-clientjourney'); ?></h4>
            <div class="evolvewp-clientjourney-component-showcase">
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Color Transition', 'evolvewp-clientjourney'); ?></div>
                    <div class="evolvewp-clientjourney-card evolvewp-clientjourney-transition-colors transition-demo"><?php esc_html_e('Hover Me', 'evolvewp-clientjourney'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Transform Transition', 'evolvewp-clientjourney'); ?></div>
                    <div class="evolvewp-clientjourney-card evolvewp-clientjourney-transition-transform transform-demo"><?php esc_html_e('Hover Me', 'evolvewp-clientjourney'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Fast Transition', 'evolvewp-clientjourney'); ?></div>
                    <div class="evolvewp-clientjourney-card evolvewp-clientjourney-transition-fast transition-demo"><?php esc_html_e('Hover Me', 'evolvewp-clientjourney'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Slow Transition', 'evolvewp-clientjourney'); ?></div>
                    <div class="evolvewp-clientjourney-card evolvewp-clientjourney-transition-slow transition-demo"><?php esc_html_e('Hover Me', 'evolvewp-clientjourney'); ?></div>
                </div>
            </div>
        </div>
        
        <!-- Sequenced Animations -->
        <div class="component-demo">
            <h4><?php esc_html_e('Sequenced Animations', 'evolvewp-clientjourney'); ?></h4>
            <div class="animation-sequence">
                <button id="sequence-trigger" class="button button-primary"><?php esc_html_e('Start Sequence', 'evolvewp-clientjourney'); ?></button>
                <div class="sequence-container">
                    <div class="sequence-item evolvewp-clientjourney-delay-100"><?php esc_html_e('First', 'evolvewp-clientjourney'); ?></div>
                    <div class="sequence-item evolvewp-clientjourney-delay-300"><?php esc_html_e('Second', 'evolvewp-clientjourney'); ?></div>
                    <div class="sequence-item evolvewp-clientjourney-delay-500"><?php esc_html_e('Third', 'evolvewp-clientjourney'); ?></div>
                    <div class="sequence-item evolvewp-clientjourney-delay-700"><?php esc_html_e('Fourth', 'evolvewp-clientjourney'); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

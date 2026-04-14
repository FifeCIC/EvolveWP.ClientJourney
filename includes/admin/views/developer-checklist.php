<?php
/**
 * Developer Checklist View
 *
 * @package EvolveWP ClientJourney/Admin/Views
 */

if (!defined('ABSPATH')) exit;

// Only show in dev environment
if (!EvolveWP_CJ_Developer_Mode::is_dev_environment()) {
    wp_die('Access denied');
}

$evolvewp_cj_checklist_file = plugin_dir_path(EVOLVEWP_CJ_PLUGIN_FILE) . 'docs/DEVELOPER-CHECKLIST.md';
$checklist = file_exists($evolvewp_cj_checklist_file) ? file_get_contents($evolvewp_cj_checklist_file) : '';
?>

<div class="wrap evolvewp-clientjourney-developer-checklist">
    <h1><?php esc_html_e('Developer Checklist', 'evolvewp-clientjourney'); ?></h1>
    
    <div class="evolvewp-clientjourney-checklist-content">
        <?php if ($checklist): ?>
            <div class="markdown-content">
                <?php echo wp_kses_post(wpautop($checklist)); ?>
            </div>
        <?php else: ?>
            <p><?php esc_html_e('Checklist file not found.', 'evolvewp-clientjourney'); ?></p>
        <?php endif; ?>
    </div>
</div>



<?php
/**
 * EvolveWP ClientJourney UI Library Main Container
 *
 * @package EvolveWP ClientJourney/Admin/Views/Partials
 */

defined('ABSPATH') || exit;

$evolvewp_cj_ui_sections = array(
    'color-palette' => __('Color Palette', 'evolvewp-clientjourney'),
    'button-components' => __('Button Components', 'evolvewp-clientjourney'),
    'form-components' => __('Form Components', 'evolvewp-clientjourney'),
    'notice-components' => __('Notice Components', 'evolvewp-clientjourney'),
    'controls-actions' => __('Controls & Actions', 'evolvewp-clientjourney'),
    'filters-search' => __('Filters & Search', 'evolvewp-clientjourney'),
    'pagination-controls' => __('Pagination Controls', 'evolvewp-clientjourney'),
    'progress-indicators' => __('Progress Indicators', 'evolvewp-clientjourney'),
    'animation-showcase' => __('Animation Showcase', 'evolvewp-clientjourney'),
    'accordion-components' => __('Accordion Components', 'evolvewp-clientjourney'),
    'status-indicators' => __('Status Indicators', 'evolvewp-clientjourney'),
    'data-analysis-components' => __('Data Analysis Components', 'evolvewp-clientjourney'),
    'chart-visualization' => __('Chart Visualization', 'evolvewp-clientjourney'),
    'modal-components' => __('Modal Components', 'evolvewp-clientjourney'),
    'tooltips' => __('Tooltips', 'evolvewp-clientjourney'),
    'pointers' => __('Pointers', 'evolvewp-clientjourney')
);
?>

<div class="wrap evolvewp-clientjourney-ui-library">
    <h1><?php esc_html_e('EvolveWP ClientJourney UI Library', 'evolvewp-clientjourney'); ?></h1>
    <p class="description"><?php esc_html_e('Comprehensive showcase of EvolveWP ClientJourney UI components, styles, and interactive elements.', 'evolvewp-clientjourney'); ?></p>
    
    <!-- Section Visibility Controls -->
    <div class="evolvewp-clientjourney-ui-section-controls">
        <div class="evolvewp-clientjourney-card">
            <div class="evolvewp-clientjourney-card-header">
                <h3><?php esc_html_e('Section Visibility Controls', 'evolvewp-clientjourney'); ?></h3>
                <div class="control-actions">
                    <button type="button" class="button button-secondary" id="show-all-sections">
                        <?php esc_html_e('Show All', 'evolvewp-clientjourney'); ?>
                    </button>
                    <button type="button" class="button button-secondary" id="hide-all-sections">
                        <?php esc_html_e('Hide All', 'evolvewp-clientjourney'); ?>
                    </button>
                </div>
            </div>
            <div class="evolvewp-clientjourney-card-body">
                <p class="description">
                    <?php esc_html_e('Use these controls to show/hide specific sections while working on styles.', 'evolvewp-clientjourney'); ?>
                </p>
                <div class="section-toggles">
                    <?php foreach ($evolvewp_cj_ui_sections as $evolvewp_cj_section_id => $evolvewp_cj_section_name) : ?>
                        <label class="section-toggle">
                            <input type="checkbox" 
                                   id="toggle-<?php echo esc_attr($evolvewp_cj_section_id); ?>" 
                                   class="section-toggle-checkbox" 
                                   data-section="<?php echo esc_attr($evolvewp_cj_section_id); ?>" 
                                   checked>
                            <span class="section-toggle-label"><?php echo esc_html($evolvewp_cj_section_name); ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    
    <?php
    $evolvewp_cj_sections = array(
        'color-palette.php',
        'button-components.php',
        'form-components.php',
        'notice-components.php',
        'controls-actions.php',
        'filters-search.php',
        'pagination-controls.php',
        'progress-indicators.php',
        'animation-showcase.php',
        'accordion-components.php',
        'status-indicators.php',
        'data-analysis-components.php',
        'chart-visualization.php',
        'modal-components.php',
        'tooltips.php',
        'pointers.php'
    );
    
    $evolvewp_cj_partials_dir = EVOLVEWP_CJ_PLUGIN_DIR_PATH . 'templates/partials/ui-library/';
    
    foreach ($evolvewp_cj_sections as $evolvewp_cj_section) {
        $evolvewp_cj_section_id = str_replace('.php', '', $evolvewp_cj_section);
        $evolvewp_cj_section_path = $evolvewp_cj_partials_dir . $evolvewp_cj_section;
        
        echo '<div class="ui-library-section" data-section-id="' . esc_attr($evolvewp_cj_section_id) . '" id="section-' . esc_attr($evolvewp_cj_section_id) . '">';
        
        if (file_exists($evolvewp_cj_section_path)) {
            require_once $evolvewp_cj_section_path;
        } else {
            $evolvewp_cj_section_name = str_replace(array('-', '.php'), array(' ', ''), $evolvewp_cj_section);
            $evolvewp_cj_section_name = ucwords($evolvewp_cj_section_name);
            echo '<div class="evolvewp-clientjourney-ui-section">';
            echo '<h3>' . esc_html($evolvewp_cj_section_name) . '</h3>';
            /* translators: %s: Section name */
            echo '<p>' . sprintf(esc_html__('Section "%s" is not yet available.', 'evolvewp-clientjourney'), esc_html($evolvewp_cj_section_name)) . '</p>';
            echo '</div>';
        }
        
        echo '</div>';
    }
    ?>
</div>

<style>
.evolvewp-clientjourney-ui-section-controls { margin: 20px 0; }
.evolvewp-clientjourney-card { background: #fff; border: 1px solid #ccd0d4; box-shadow: 0 1px 1px rgba(0,0,0,.04); }
.evolvewp-clientjourney-card-header { padding: 15px 20px; border-bottom: 1px solid #ddd; display: flex; justify-content: space-between; align-items: center; }
.evolvewp-clientjourney-card-header h3 { margin: 0; }
.evolvewp-clientjourney-card-body { padding: 20px; }
.section-toggles { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 10px; }
.section-toggle { display: flex; align-items: center; gap: 8px; }
.ui-library-section { margin-bottom: 30px; }
.evolvewp-clientjourney-ui-section { padding: 20px; background: #fff; border: 1px solid #ccd0d4; }
.evolvewp-clientjourney-ui-section h3 { margin-top: 0; border-bottom: 1px solid #ddd; padding-bottom: 10px; }
</style>

<script>
jQuery(document).ready(function($) {
    $('#show-all-sections').on('click', function() {
        $('.section-toggle-checkbox').prop('checked', true).trigger('change');
    });
    
    $('#hide-all-sections').on('click', function() {
        $('.section-toggle-checkbox').prop('checked', false).trigger('change');
    });
    
    $('.section-toggle-checkbox').on('change', function() {
        var sectionId = $(this).data('section');
        var $section = $('#section-' + sectionId);
        
        if ($(this).is(':checked')) {
            $section.show();
        } else {
            $section.hide();
        }
    });
});
</script>

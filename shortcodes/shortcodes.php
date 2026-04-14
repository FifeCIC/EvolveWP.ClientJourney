<?php
/**
 * EvolveWP ClientJourney Shortcodes
 *
 * @package EvolveWP ClientJourney/Shortcodes
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Example shortcode with template loading
 */
function evolvewp_cj_example_shortcode($atts) {
    $atts = shortcode_atts(array(
        'title' => 'Example',
        'count' => 5
    ), $atts, 'evolvewp_cj_example');
    
    // Get data
    $data = array(
        'title' => sanitize_text_field($atts['title']),
        'count' => absint($atts['count']),
        'items' => evolvewp_cj_get_example_items($atts['count'])
    );
    
    // Load template
    ob_start();
    evolvewp_cj_load_template('example', $data);
    return ob_get_clean();
}
add_shortcode('evolvewp_cj_example', 'evolvewp_cj_example_shortcode');

/**
 * Load template file
 */
function evolvewp_cj_load_template($name, $data = array()) {
    $template = EVOLVEWP_CJ_PLUGIN_DIR_PATH . 'templates/' . $name . '.php';
    
    if (file_exists($template)) {
        extract($data);
        include $template;
    }
}

/**
 * Get example items (placeholder function)
 */
function evolvewp_cj_get_example_items($count) {
    $items = array();
    for ($i = 1; $i <= $count; $i++) {
        $items[] = array(
            'id' => $i,
            'name' => 'Item ' . $i
        );
    }
    return $items;
}

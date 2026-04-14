<?php
/**
 * EvolveWP ClientJourney - Primary Sidebar Widgets File
 *
 * @author   Ryan Bayne
 * @category Widgets
 * @package  EvolveWP ClientJourney/Widgets
 * @since    1.0.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Include widget classes.
//include_once( 'abstracts/abstract-evolvewp-clientjourney-widget.php' );

/**
 * Register Widgets.
 */
function evolvewp_cj_register_widgets() {
    //register_widget( 'EvolveWP_CJ_Widget_Example' );
}
add_action( 'widgets_init', 'evolvewp_cj_register_widgets' );
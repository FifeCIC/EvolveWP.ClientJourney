<?php
/**
 * EvolveWP ClientJourney - Depreciated Functions
 *
 * Please add the WordPress core function for triggering and error if a
 * depreciated function is used. 
 * 
 * Use: _deprecated_function( 'evolvewp_cj_function_called', '2.1', 'evolvewp_cj_replacement_function' );  
 *
 * @author   Ryan Bayne
 * @category Core
 * @package  EvolveWP ClientJourney/Core
 * @since    1.0.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
} 
  
/**
 * @deprecated example only
 */
function evolvewp_cj_function_called() {
    _deprecated_function( 'evolvewp_cj_function_called', '2.1', 'evolvewp_cj_replacement_function' );
    //evolvewp_cj_replacement_function();
}
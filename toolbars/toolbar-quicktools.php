<?php
/**
 * Admin Toolbar - Quick Tools
 * 
 * @package EvolveWP ClientJourney
 */

defined( 'ABSPATH' ) || die;

global $wp_admin_bar;

$wp_admin_bar->add_menu( array(
    'id'    => 'evolvewp_cj_toolbar',
    'title' => '⚡ EvolveWP ClientJourney',
    'href'  => admin_url( 'admin.php?page=evolvewp-clientjourney-development' ),
) );

$wp_admin_bar->add_menu( array(
    'parent' => 'evolvewp_cj_toolbar',
    'id'     => 'evolvewp_cj_development',
    'title'  => 'Development',
    'href'   => admin_url( 'admin.php?page=evolvewp-clientjourney-development' ),
) );

$wp_admin_bar->add_menu( array(
    'parent' => 'evolvewp_cj_toolbar',
    'id'     => 'evolvewp_cj_settings',
    'title'  => 'Settings',
    'href'   => admin_url( 'admin.php?page=evolvewp-clientjourney-settings' ),
) );

if ( function_exists( 'evolvewp_cj_is_developer_mode' ) && evolvewp_cj_is_developer_mode() ) {
    $wp_admin_bar->add_menu( array(
        'parent' => 'evolvewp_cj_toolbar',
        'id'     => 'evolvewp_cj_clear_cache',
        'title'  => 'Clear Cache',
        'href'   => wp_nonce_url( admin_url( 'admin-post.php?action=evolvewp_cj_clear_cache' ), 'evolvewp_cj_clear_cache' ),
    ) );
}

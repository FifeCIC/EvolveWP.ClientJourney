<?php
/**
 * Plugin Name: EvolveWP ClientJourney
 * Plugin URI:  https://evolvewp.dev/plugins/clientjourney
 * Github URI:  https://github.com/FifeCIC/EvolveWP.ClientJourney
 * Description: CRM, proposals, and client portal for the EvolveWP ecosystem.
 * Version:     1.0.0
 * Author:      FifeCIC
 * Author URI:  https://evolvewp.dev
 * Requires at least: 5.6
 * Tested up to: 6.9
 * Requires PHP: 7.4
 * License:     GPL-3.0-or-later
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: evolvewp-clientjourney
 * Domain Path: /i18n/languages/
 *
 * @package EvolveWP\ClientJourney
 * @category Core
 * @author FifeCIC
 * @license GNU General Public License, Version 3
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'EvolveWPClientJourney' ) ) :

	if ( ! defined( 'EVOLVEWP_CJ_VERSION' ) ) { define( 'EVOLVEWP_CJ_VERSION', '1.0.0' ); }
	if ( ! defined( 'EVOLVEWP_CJ_PLUGIN_FILE' ) ) { define( 'EVOLVEWP_CJ_PLUGIN_FILE', __FILE__ ); }
	if ( ! defined( 'EVOLVEWP_CJ_PLUGIN_BASENAME' ) ) { define( 'EVOLVEWP_CJ_PLUGIN_BASENAME', plugin_basename( __FILE__ ) ); }
	if ( ! defined( 'EVOLVEWP_CJ_PLUGIN_DIR_PATH' ) ) { define( 'EVOLVEWP_CJ_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) ); }
	if ( ! defined( 'EVOLVEWP_CJ_PLUGIN_DIR' ) ) { define( 'EVOLVEWP_CJ_PLUGIN_DIR', plugin_dir_path( __FILE__ ) ); }
	if ( ! defined( 'EVOLVEWP_CJ_PLUGIN_URL' ) ) { define( 'EVOLVEWP_CJ_PLUGIN_URL', plugin_dir_url( __FILE__ ) ); }

	// Composer PSR-4 autoloader — handles all EvolveWP\ClientJourney\ namespaced classes.
	if ( file_exists( EVOLVEWP_CJ_PLUGIN_DIR_PATH . 'vendor/autoload.php' ) ) {
		require_once EVOLVEWP_CJ_PLUGIN_DIR_PATH . 'vendor/autoload.php';
	}

	// Load core functions with importance on making them available to third-party.
	require_once EVOLVEWP_CJ_PLUGIN_DIR_PATH . 'install.php';
	include_once EVOLVEWP_CJ_PLUGIN_DIR_PATH . 'functions.php';
	include_once EVOLVEWP_CJ_PLUGIN_DIR_PATH . 'deprecated.php';

	// Run the plugin.
	include_once EVOLVEWP_CJ_PLUGIN_DIR_PATH . 'loader.php';

endif;

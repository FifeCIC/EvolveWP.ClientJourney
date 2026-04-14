<?php
/**
 * EvolveWP ClientJourney global helper functions.
 *
 * ROLE: Global accessor functions for namespaced classes.
 * DEPENDS ON: EvolveWP\ClientJourney\ namespaced classes via Composer autoloader.
 * CONSUMED BY: Any plugin or template that needs the ecosystem registry or main instance.
 * DATA FLOW: Provides shorthand access to singleton instances.
 *
 * @package  EvolveWP\EvolveWPClientJourney
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return the main EvolveWP ClientJourney plugin instance.
 *
 * Shorthand for EvolveWPClientJourney::instance(). Prevents the need to use
 * globals anywhere in the codebase.
 *
 * @since  1.0.0
 *
 * @return EvolveWPClientJourney
 */
function EvolveWPClientJourney() {
	return EvolveWPClientJourney::instance();
}

/**
 * Return the ecosystem Registry singleton.
 *
 * Global accessor for \EvolveWP\ClientJourney\Ecosystem\Registry.
 *
 * @since  1.0.0
 *
 * @return \EvolveWP\ClientJourney\Ecosystem\Registry
 */
function evolvewp_cj_ecosystem() {
	return \EvolveWP\ClientJourney\Ecosystem\Registry::instance();
}

/**
 * Return the structured Logger singleton.
 *
 * Global accessor for \EvolveWP\ClientJourney\Core\Logger.
 *
 * @since  1.0.0
 *
 * @return \EvolveWP\ClientJourney\Core\Logger
 */
function evolvewp_cj_log() {
	return \EvolveWP\ClientJourney\Core\Logger::instance();
}

/**
 * Record a trace entry via the structured Logger.
 *
 * Convenience shorthand for evolvewp_cj_log()->trace().
 *
 * @since  1.0.0
 *
 * @param string $type    Trace type.
 * @param string $message Description.
 * @param array  $data    Optional structured data.
 *
 * @return void
 */
function evolvewp_cj_trace( $type, $message, $data = array() ) {
	\EvolveWP\ClientJourney\Core\Logger::instance()->trace( $type, $message, $data );
}

/**
 * Create or retrieve an API connector instance.
 *
 * Global accessor for EvolveWP_CJ_API_Factory::create_from_settings().
 *
 * @since  1.0.0
 *
 * @param string $provider_id Provider identifier (e.g. 'github', 'discord').
 * @param string $account_id  Optional. Account identifier for multi-account setups.
 *
 * @return \EvolveWP\ClientJourney\API\Connector_Interface|\WP_Error Connector instance or error.
 */
function evolvewp_cj_connector( $provider_id, $account_id = '' ) {
	return EvolveWP_CJ_API_Factory::create_from_settings( $provider_id, $account_id );
}

/**
 * Check whether a user has a specific capability.
 *
 * Global accessor for \EvolveWP\ClientJourney\Core\Capability_Manager::user_can().
 *
 * @since  1.0.0
 *
 * @param string   $capability Capability name to check.
 * @param int|null $user_id    User ID to check. Null = current user.
 *
 * @return bool True if the user has the capability.
 */
function evolvewp_cj_user_can( $capability, $user_id = null ) {
	return \EvolveWP\ClientJourney\Core\Capability_Manager::user_can( $capability, $user_id );
}

/**
 * Return all registered REST Bridge endpoints.
 *
 * Global accessor for \EvolveWP\ClientJourney\API\REST_Bridge::get_registered_endpoints().
 *
 * @since  1.0.0
 *
 * @param string $source Optional. Filter by source: 'manual', 'connector', or empty for all.
 *
 * @return array Registered endpoint metadata.
 */
function evolvewp_cj_rest_endpoints( $source = '' ) {
	return \EvolveWP\ClientJourney\API\REST_Bridge::get_registered_endpoints( $source );
}


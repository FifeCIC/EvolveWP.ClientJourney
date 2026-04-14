<?php
/**
 * WordPress dashboard widgets for EvolveWP ClientJourney.
 *
 * ROLE: admin-ui
 *
 * Single responsibility: Register and render EvolveWP ClientJourney dashboard widgets on the
 * WordPress admin dashboard. Does NOT handle settings or plugin-specific pages.
 *
 * DEPENDS ON:
 *   - WordPress functions: wp_add_dashboard_widget, wp_cache_get
 *
 * CONSUMED BY:
 *   - Hook: wp_dashboard_setup (registered in constructor)
 *
 * DATA FLOW:
 *   Input  → wp_cache_get('evolvewp_cj_api_calls_today')
 *   Output → HTML rendered in WordPress dashboard widgets
 *
 * @package  EvolveWP\ClientJourney\Admin
 * @since    1.0.0
 */

namespace EvolveWP\ClientJourney\Admin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers and renders EvolveWP ClientJourney dashboard widgets.
 *
 * Single responsibility: Dashboard widget UI only. Does NOT handle
 * data collection or settings.
 *
 * @since 1.0.0
 */
class Dashboard_Widgets {

	/**
	 * Constructor — hooks into wp_dashboard_setup.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'wp_dashboard_setup', array( $this, 'add_widgets' ) );
	}

	/**
	 * Register dashboard widgets.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function add_widgets() {
		wp_add_dashboard_widget(
			'evolvewp_cj_stats_widget',
			__( 'EvolveWP ClientJourney Stats', 'evolvewp-clientjourney' ),
			array( $this, 'render_stats_widget' )
		);

		wp_add_dashboard_widget(
			'evolvewp_cj_quick_links_widget',
			__( 'EvolveWP ClientJourney Quick Links', 'evolvewp-clientjourney' ),
			array( $this, 'render_quick_links_widget' )
		);
	}

	/**
	 * Render the stats widget.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function render_stats_widget() {
		$stats = $this->get_plugin_stats();
		?>
		<div class="evolvewp-clientjourney-dashboard-widget">
			<ul>
				<li><strong><?php esc_html_e( 'Active Features:', 'evolvewp-clientjourney' ); ?></strong> <?php echo (int) $stats['features']; ?></li>
				<li><strong><?php esc_html_e( 'API Calls Today:', 'evolvewp-clientjourney' ); ?></strong> <?php echo (int) $stats['api_calls']; ?></li>
				<li><strong><?php esc_html_e( 'Cache Hit Rate:', 'evolvewp-clientjourney' ); ?></strong> <?php echo (int) $stats['cache_rate']; ?>%</li>
			</ul>
			<p><a href="<?php echo esc_url( admin_url( 'admin.php?page=evolvewp-clientjourney-development' ) ); ?>" class="button button-primary"><?php esc_html_e( 'View Details', 'evolvewp-clientjourney' ); ?></a></p>
		</div>
		<?php
	}

	/**
	 * Render the quick links widget.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function render_quick_links_widget() {
		?>
		<div class="evolvewp-clientjourney-dashboard-widget">
			<ul>
				<li><a href="<?php echo esc_url( admin_url( 'admin.php?page=evolvewp-clientjourney-development' ) ); ?>"><?php esc_html_e( 'Development Dashboard', 'evolvewp-clientjourney' ); ?></a></li>
				<li><a href="<?php echo esc_url( admin_url( 'admin.php?page=evolvewp-clientjourney-settings' ) ); ?>"><?php esc_html_e( 'Settings', 'evolvewp-clientjourney' ); ?></a></li>
				<li><a href="<?php echo esc_url( admin_url( 'admin.php?page=evolvewp-clientjourney-learning' ) ); ?>"><?php esc_html_e( 'Learning Centre', 'evolvewp-clientjourney' ); ?></a></li>
			</ul>
		</div>
		<?php
	}

	/**
	 * Get basic plugin statistics for the dashboard widget.
	 *
	 * @since  1.0.0
	 * @return array{features: int, api_calls: int, cache_rate: int}
	 */
	private function get_plugin_stats() {
		return array(
			'features'   => 5,
			'api_calls'  => wp_cache_get( 'evolvewp_cj_api_calls_today' ) ?: 0,
			'cache_rate' => 85,
		);
	}
}

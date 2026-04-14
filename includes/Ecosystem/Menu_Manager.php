<?php
/**
 * Ecosystem menu manager — places shared menus based on ecosystem mode.
 *
 * ROLE: admin-ui
 *
 * Single responsibility: Register shared admin menus (logging, background tasks,
 * settings) in either the plugin's own menu or the WordPress Tools/Settings menus,
 * depending on whether ecosystem mode is active (2+ plugins installed).
 * Does NOT handle plugin registration (Registry) or plugin installation (Installer).
 *
 * DEPENDS ON:
 *   - EvolveWP ClientJourney\Ecosystem\Registry via evolvewp_cj_ecosystem() in functions.php
 *
 * CONSUMED BY:
 *   - Hook: admin_menu (priority 999, registered in constructor)
 *
 * DATA FLOW:
 *   Input  → evolvewp_cj_ecosystem_menu_location option
 *   Output → WordPress admin menu pages
 *
 * @package  EvolveWP\ClientJourney\Ecosystem
 * @since    1.0.0
 */

namespace EvolveWP\ClientJourney\Ecosystem;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Dynamically places shared menus based on ecosystem mode.
 *
 * Single responsibility: Menu registration and rendering for shared ecosystem
 * views. Does NOT manage the registry or handle plugin installation.
 *
 * @since 1.0.0
 */
class Menu_Manager {

	/**
	 * Constructor — hooks into admin_menu at low priority so all plugins
	 * have registered their menus before ecosystem menus are placed.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'register_menus' ), 999 );
	}

	/**
	 * Register menus based on ecosystem mode.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function register_menus() {
		$ecosystem = evolvewp_cj_ecosystem();

		if ( $ecosystem->use_shared_menu() ) {
			$this->register_shared_menus();
		} else {
			$this->register_plugin_menus();
		}
	}

	/**
	 * Register shared menus under Tools and Settings.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	private function register_shared_menus() {
		add_management_page(
			__( 'Ecosystem Logging', 'evolvewp-clientjourney' ),
			__( 'Ecosystem Logs', 'evolvewp-clientjourney' ),
			'manage_options',
			'evolvewp-clientjourney-ecosystem-logs',
			array( $this, 'render_shared_logging' )
		);

		add_management_page(
			__( 'Background Tasks', 'evolvewp-clientjourney' ),
			__( 'Background Tasks', 'evolvewp-clientjourney' ),
			'manage_options',
			'evolvewp-clientjourney-ecosystem-tasks',
			array( $this, 'render_shared_tasks' )
		);

		add_options_page(
			__( 'Ecosystem Settings', 'evolvewp-clientjourney' ),
			__( 'Ecosystem', 'evolvewp-clientjourney' ),
			'manage_options',
			'evolvewp-clientjourney-ecosystem-settings',
			array( $this, 'render_shared_settings' )
		);
	}

	/**
	 * Register plugin-specific menus (placeholder for single-plugin mode).
	 *
	 * @since 1.0.0
	 * @return void
	 */
	private function register_plugin_menus() {
		// In single-plugin mode, menus stay in the plugin's own menu.
	}

	/**
	 * Render the shared logging view.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function render_shared_logging() {
		$ecosystem = evolvewp_cj_ecosystem();
		$plugins   = $ecosystem->get_plugins();
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'Ecosystem Logging', 'evolvewp-clientjourney' ); ?></h1>
			<p><?php esc_html_e( 'Unified logging across all EvolveWP plugins.', 'evolvewp-clientjourney' ); ?></p>

			<div class="ecosystem-tabs">
				<?php foreach ( $plugins as $slug => $plugin ) : ?>
					<?php if ( $plugin['has_logging'] ) : ?>
						<a href="#<?php echo esc_attr( $slug ); ?>-logs" class="nav-tab">
							<?php echo esc_html( $plugin['name'] ); ?>
						</a>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>

			<?php foreach ( $plugins as $slug => $plugin ) : ?>
				<?php if ( $plugin['has_logging'] ) : ?>
					<div id="<?php echo esc_attr( $slug ); ?>-logs" class="tab-content">
						<?php
						$resources = $ecosystem->get_shared_resources( 'logging' );
						foreach ( $resources as $resource ) {
							if ( is_callable( $resource['callback'] ) ) {
								call_user_func( $resource['callback'], $slug );
							}
						}
						?>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
		<?php
	}

	/**
	 * Render the shared background tasks view.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function render_shared_tasks() {
		$ecosystem = evolvewp_cj_ecosystem();
		$plugins   = $ecosystem->get_plugins();
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'Background Tasks Monitor', 'evolvewp-clientjourney' ); ?></h1>
			<p><?php esc_html_e( 'View CRON jobs, async processes, and background tasks across all plugins.', 'evolvewp-clientjourney' ); ?></p>

			<h2><?php esc_html_e( 'WordPress CRON Jobs', 'evolvewp-clientjourney' ); ?></h2>
			<?php $this->render_cron_jobs( $plugins ); ?>

			<h2><?php esc_html_e( 'Background Processes', 'evolvewp-clientjourney' ); ?></h2>
			<?php $this->render_background_processes(); ?>

			<h2><?php esc_html_e( 'Async Tasks', 'evolvewp-clientjourney' ); ?></h2>
			<?php $this->render_async_tasks(); ?>
		</div>
		<?php
	}

	/**
	 * Render CRON jobs table.
	 *
	 * @since 1.0.0
	 * @param array $plugins Registered plugins.
	 * @return void
	 */
	private function render_cron_jobs( $plugins ) {
		$crons = _get_cron_array();

		if ( empty( $crons ) ) {
			echo '<p>' . esc_html__( 'No scheduled CRON jobs found.', 'evolvewp-clientjourney' ) . '</p>';
			return;
		}
		?>
		<table class="wp-list-table widefat fixed striped">
			<thead>
				<tr>
					<th><?php esc_html_e( 'Hook', 'evolvewp-clientjourney' ); ?></th>
					<th><?php esc_html_e( 'Plugin', 'evolvewp-clientjourney' ); ?></th>
					<th><?php esc_html_e( 'Next Run', 'evolvewp-clientjourney' ); ?></th>
					<th><?php esc_html_e( 'Recurrence', 'evolvewp-clientjourney' ); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $crons as $timestamp => $cron ) : ?>
					<?php foreach ( $cron as $hook => $events ) : ?>
						<?php
						$owner = 'Unknown';
						foreach ( $plugins as $slug => $plugin ) {
							if ( strpos( $hook, $slug ) !== false ) {
								$owner = $plugin['name'];
								break;
							}
						}
						?>
						<?php foreach ( $events as $event ) : ?>
							<tr>
								<td><code><?php echo esc_html( $hook ); ?></code></td>
								<td><?php echo esc_html( $owner ); ?></td>
								<td><?php echo esc_html( human_time_diff( $timestamp, time() ) . ' from now' ); ?></td>
								<td><?php echo esc_html( $event['schedule'] ?? 'One-time' ); ?></td>
							</tr>
						<?php endforeach; ?>
					<?php endforeach; ?>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?php
	}

	/**
	 * Render background processes table.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	private function render_background_processes() {
		$ecosystem = evolvewp_cj_ecosystem();
		$resources = $ecosystem->get_shared_resources( 'background_tasks' );
		?>
		<table class="wp-list-table widefat fixed striped">
			<thead>
				<tr>
					<th><?php esc_html_e( 'Process', 'evolvewp-clientjourney' ); ?></th>
					<th><?php esc_html_e( 'Plugin', 'evolvewp-clientjourney' ); ?></th>
					<th><?php esc_html_e( 'Status', 'evolvewp-clientjourney' ); ?></th>
					<th><?php esc_html_e( 'Progress', 'evolvewp-clientjourney' ); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php if ( empty( $resources ) ) : ?>
					<tr><td colspan="4"><?php esc_html_e( 'No background processes running.', 'evolvewp-clientjourney' ); ?></td></tr>
				<?php else : ?>
					<?php
					foreach ( $resources as $resource ) {
						if ( is_callable( $resource['callback'] ) ) {
							call_user_func( $resource['callback'] );
						}
					}
					?>
				<?php endif; ?>
			</tbody>
		</table>
		<?php
	}

	/**
	 * Render async tasks table.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	private function render_async_tasks() {
		$ecosystem = evolvewp_cj_ecosystem();
		$resources = $ecosystem->get_shared_resources( 'async_tasks' );
		?>
		<table class="wp-list-table widefat fixed striped">
			<thead>
				<tr>
					<th><?php esc_html_e( 'Task', 'evolvewp-clientjourney' ); ?></th>
					<th><?php esc_html_e( 'Plugin', 'evolvewp-clientjourney' ); ?></th>
					<th><?php esc_html_e( 'Status', 'evolvewp-clientjourney' ); ?></th>
					<th><?php esc_html_e( 'Queued', 'evolvewp-clientjourney' ); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php if ( empty( $resources ) ) : ?>
					<tr><td colspan="4"><?php esc_html_e( 'No async tasks queued.', 'evolvewp-clientjourney' ); ?></td></tr>
				<?php else : ?>
					<?php
					foreach ( $resources as $resource ) {
						if ( is_callable( $resource['callback'] ) ) {
							call_user_func( $resource['callback'] );
						}
					}
					?>
				<?php endif; ?>
			</tbody>
		</table>
		<?php
	}

	/**
	 * Render the shared ecosystem settings page.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function render_shared_settings() {
		$ecosystem = evolvewp_cj_ecosystem();
		$plugins   = $ecosystem->get_plugins();
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'Ecosystem Settings', 'evolvewp-clientjourney' ); ?></h1>

			<form method="post" action="options.php">
				<?php settings_fields( 'evolvewp_cj_ecosystem' ); ?>

				<h2><?php esc_html_e( 'Menu Location', 'evolvewp-clientjourney' ); ?></h2>
				<table class="form-table">
					<tr>
						<th><?php esc_html_e( 'Shared Views Location', 'evolvewp-clientjourney' ); ?></th>
						<td>
							<label>
								<input type="radio" name="evolvewp_cj_ecosystem_menu_location" value="shared" <?php checked( get_option( 'evolvewp_cj_ecosystem_menu_location', 'shared' ), 'shared' ); ?>>
								<?php esc_html_e( 'Tools & Settings (Recommended for 2+ plugins)', 'evolvewp-clientjourney' ); ?>
							</label><br>
							<label>
								<input type="radio" name="evolvewp_cj_ecosystem_menu_location" value="plugin" <?php checked( get_option( 'evolvewp_cj_ecosystem_menu_location', 'shared' ), 'plugin' ); ?>>
								<?php esc_html_e( 'Each Plugin Menu (Single plugin mode)', 'evolvewp-clientjourney' ); ?>
							</label>
						</td>
					</tr>
				</table>

				<h2><?php esc_html_e( 'Installed Plugins', 'evolvewp-clientjourney' ); ?></h2>
				<table class="wp-list-table widefat fixed striped">
					<thead>
						<tr>
							<th><?php esc_html_e( 'Plugin', 'evolvewp-clientjourney' ); ?></th>
							<th><?php esc_html_e( 'Version', 'evolvewp-clientjourney' ); ?></th>
							<th><?php esc_html_e( 'Features', 'evolvewp-clientjourney' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ( $plugins as $slug => $plugin ) : ?>
							<tr>
								<td><strong><?php echo esc_html( $plugin['name'] ); ?></strong></td>
								<td><?php echo esc_html( $plugin['version'] ); ?></td>
								<td>
									<?php if ( $plugin['has_logging'] ) : ?>
										<span class="dashicons dashicons-list-view" title="<?php esc_attr_e( 'Logging', 'evolvewp-clientjourney' ); ?>"></span>
									<?php endif; ?>
									<?php if ( $plugin['has_cron'] ) : ?>
										<span class="dashicons dashicons-clock" title="<?php esc_attr_e( 'CRON Jobs', 'evolvewp-clientjourney' ); ?>"></span>
									<?php endif; ?>
									<?php if ( $plugin['has_background_tasks'] ) : ?>
										<span class="dashicons dashicons-update" title="<?php esc_attr_e( 'Background Tasks', 'evolvewp-clientjourney' ); ?>"></span>
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>

				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}
}

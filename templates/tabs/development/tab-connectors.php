<?php
/**
 * Development tab — Connectors.
 *
 * ROLE: template
 *
 * Shows all registered API connectors with their configuration status,
 * capabilities, and a test connection button for configured connectors.
 *
 * @package  EvolveWP ClientJourney
 * @category Admin
 * @since    3.1.0
 */

defined( 'ABSPATH' ) || exit;

$providers  = EvolveWP_CJ_API_Directory::get_all_providers();
$configured = EvolveWP_CJ_API_Directory::get_configured_providers();
?>

<div class="evolvewp-clientjourney-admin-wrap">

	<div class="evolvewp-clientjourney-arch-section">
		<h3><?php esc_html_e( 'Registered Connectors', 'evolvewp-clientjourney' ); ?></h3>
		<p><?php esc_html_e( 'API connectors registered via the API Directory. Each implements the Connector Interface.', 'evolvewp-clientjourney' ); ?></p>

		<?php if ( empty( $providers ) ) : ?>
			<p><em><?php esc_html_e( 'No connectors registered.', 'evolvewp-clientjourney' ); ?></em></p>
		<?php else : ?>

			<div class="evolvewp-clientjourney-components-grid">
				<?php foreach ( $providers as $provider_id => $provider ) :
					$is_configured = isset( $configured[ $provider_id ] );
					$status_class  = $is_configured ? 'evolvewp-clientjourney-status-success' : 'evolvewp-clientjourney-status-warning';
					$status_label  = $is_configured
						? __( 'Configured', 'evolvewp-clientjourney' )
						: __( 'Not Configured', 'evolvewp-clientjourney' );
				?>
					<div class="evolvewp-clientjourney-card">
						<div class="evolvewp-clientjourney-card-header" style="display: flex; justify-content: space-between; align-items: center;">
							<strong>
								<span class="dashicons <?php echo esc_attr( $provider['icon'] ?? 'dashicons-admin-generic' ); ?>" style="margin-right: 4px;"></span>
								<?php echo esc_html( $provider['name'] ?: $provider_id ); ?>
							</strong>
							<span class="evolvewp-clientjourney-badge <?php echo esc_attr( $status_class ); ?>">
								<?php echo esc_html( $status_label ); ?>
							</span>
						</div>
						<div class="evolvewp-clientjourney-card-body">
							<?php if ( ! empty( $provider['description'] ) ) : ?>
								<p class="description"><?php echo esc_html( $provider['description'] ); ?></p>
							<?php endif; ?>

							<table class="evolvewp-clientjourney-table evolvewp-clientjourney-table-sm" style="margin-top: 8px;">
								<tr>
									<th scope="row"><?php esc_html_e( 'Provider ID', 'evolvewp-clientjourney' ); ?></th>
									<td><code><?php echo esc_html( $provider_id ); ?></code></td>
								</tr>
								<tr>
									<th scope="row"><?php esc_html_e( 'Auth Type', 'evolvewp-clientjourney' ); ?></th>
									<td><?php echo esc_html( $provider['auth_type'] ?? 'bearer' ); ?></td>
								</tr>
								<tr>
									<th scope="row"><?php esc_html_e( 'Class', 'evolvewp-clientjourney' ); ?></th>
									<td><code><?php echo esc_html( $provider['class_name'] ?? '—' ); ?></code></td>
								</tr>
								<?php if ( ! empty( $provider['url'] ) ) : ?>
								<tr>
									<th scope="row"><?php esc_html_e( 'Website', 'evolvewp-clientjourney' ); ?></th>
									<td><a href="<?php echo esc_url( $provider['url'] ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $provider['url'] ); ?></a></td>
								</tr>
								<?php endif; ?>
							</table>

							<?php
							// Show capabilities if the connector class exists.
							$caps = EvolveWP_CJ_API_Directory::get_provider_capabilities( $provider_id );
							if ( ! empty( $caps ) ) :
							?>
								<h4 style="margin-top: 12px;"><?php esc_html_e( 'Capabilities', 'evolvewp-clientjourney' ); ?></h4>
								<table class="evolvewp-clientjourney-table evolvewp-clientjourney-table-sm">
									<thead>
										<tr>
											<th scope="col"><?php esc_html_e( 'Action', 'evolvewp-clientjourney' ); ?></th>
											<th scope="col"><?php esc_html_e( 'Method', 'evolvewp-clientjourney' ); ?></th>
											<th scope="col"><?php esc_html_e( 'Description', 'evolvewp-clientjourney' ); ?></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ( $caps as $action => $cap ) : ?>
										<tr>
											<td><code><?php echo esc_html( $action ); ?></code></td>
											<td><?php echo esc_html( $cap['method'] ?? 'POST' ); ?></td>
											<td><?php echo esc_html( $cap['description'] ?? '' ); ?></td>
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							<?php endif; ?>

							<?php if ( $is_configured ) : ?>
								<div style="margin-top: 12px;">
									<button type="button"
										class="button evolvewp-clientjourney-test-connector"
										data-provider="<?php echo esc_attr( $provider_id ); ?>">
										<span class="dashicons dashicons-yes-alt" style="margin-top: 3px;"></span>
										<?php esc_html_e( 'Test Connection', 'evolvewp-clientjourney' ); ?>
									</button>
									<span class="evolvewp-clientjourney-test-result" data-provider="<?php echo esc_attr( $provider_id ); ?>"></span>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

		<?php endif; ?>
	</div>

	<div class="evolvewp-clientjourney-arch-section" style="margin-top: 20px;">
		<h3><?php esc_html_e( 'REST Bridge Endpoints', 'evolvewp-clientjourney' ); ?></h3>
		<p><?php esc_html_e( 'Endpoints registered via the REST Bridge. Connector routes are auto-generated.', 'evolvewp-clientjourney' ); ?></p>

		<?php
		$endpoints = evolvewp_cj_rest_endpoints();
		if ( empty( $endpoints ) ) :
		?>
			<p><em><?php esc_html_e( 'No endpoints registered yet. Endpoints are registered on rest_api_init.', 'evolvewp-clientjourney' ); ?></em></p>
		<?php else : ?>
			<table class="evolvewp-clientjourney-table">
				<thead>
					<tr>
						<th scope="col"><?php esc_html_e( 'Method', 'evolvewp-clientjourney' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Route', 'evolvewp-clientjourney' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Capability', 'evolvewp-clientjourney' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Source', 'evolvewp-clientjourney' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Label', 'evolvewp-clientjourney' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $endpoints as $key => $ep ) : ?>
					<tr>
						<td><code><?php echo esc_html( $ep['method'] ); ?></code></td>
						<td><code>/wp-json/<?php echo esc_html( $ep['namespace'] . $ep['route'] ); ?></code></td>
						<td><?php echo esc_html( $ep['capability'] ); ?></td>
						<td>
							<span class="evolvewp-clientjourney-badge <?php echo 'connector' === $ep['source'] ? 'evolvewp-clientjourney-status-info' : ''; ?>">
								<?php echo esc_html( $ep['source'] ); ?>
							</span>
						</td>
						<td><?php echo esc_html( $ep['label'] ); ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif; ?>
	</div>

</div>

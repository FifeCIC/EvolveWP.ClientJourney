<?php
/**
 * Uninstall feedback modal — collects user feedback on plugin deactivation.
 *
 * ROLE: admin-ui
 *
 * Single responsibility: Show a feedback modal when the user deactivates the
 * plugin from the Plugins screen, collect the reason, and store/email it.
 *
 * DEPENDS ON:
 *   - WordPress functions: wp_enqueue_style, wp_enqueue_script, wp_mail
 *   - EVOLVEWP_CJ_PLUGIN_FILE, EVOLVEWP_CJ_PLUGIN_BASENAME, EVOLVEWP_CJ_VERSION constants
 *
 * CONSUMED BY:
 *   - Hook: admin_footer (renders modal on plugins.php)
 *   - Hook: admin_enqueue_scripts (enqueues CSS/JS on plugins.php)
 *   - Hook: wp_ajax_evolvewp_cj_uninstall_feedback
 *
 * DATA FLOW:
 *   Input  → $_POST['reason'], $_POST['details'], $_POST['email']
 *   Output → evolvewp_cj_uninstall_feedbacks option, admin email
 *
 * @package  EvolveWP\ClientJourney\Admin
 * @since    1.0.0
 */

namespace EvolveWP\ClientJourney\Admin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Deactivation feedback modal.
 *
 * @since 1.0.0
 */
class Uninstall_Feedback {

	/**
	 * Constructor — registers all hooks.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'admin_footer', array( $this, 'render_modal' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_assets' ) );
		add_action( 'wp_ajax_evolvewp_cj_uninstall_feedback', array( $this, 'handle_feedback' ) );
	}

	/**
	 * Enqueue assets only on the plugins screen.
	 *
	 * @since  1.0.0
	 * @param  string $hook Current admin page hook suffix.
	 * @return void
	 */
	public function enqueue_assets( $hook ) {
		if ( 'plugins.php' !== $hook ) {
			return;
		}

		wp_enqueue_style( 'evolvewp-clientjourney-uninstall-feedback', plugins_url( 'assets/css/uninstall-feedback.css', EVOLVEWP_CJ_PLUGIN_FILE ), array(), EVOLVEWP_CJ_VERSION );
		wp_enqueue_script( 'evolvewp-clientjourney-uninstall-feedback', plugins_url( 'assets/js/uninstall-feedback.js', EVOLVEWP_CJ_PLUGIN_FILE ), array( 'jquery' ), EVOLVEWP_CJ_VERSION, true );

		wp_localize_script( 'evolvewp-clientjourney-uninstall-feedback', 'evolvewpCoreUninstall', array(
			'ajaxurl'     => admin_url( 'admin-ajax.php' ),
			'nonce'       => wp_create_nonce( 'evolvewp_cj_uninstall_feedback' ),
			'plugin_slug' => EVOLVEWP_CJ_PLUGIN_BASENAME,
		) );
	}

	/**
	 * Render the feedback modal on the plugins screen.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function render_modal() {
		$screen = get_current_screen();
		if ( ! $screen || 'plugins' !== $screen->id ) {
			return;
		}
		?>
		<div id="evolvewp-clientjourney-uninstall-feedback-modal" style="display:none;">
			<div class="evolvewp-clientjourney-modal-overlay"></div>
			<div class="evolvewp-clientjourney-modal-content">
				<div class="evolvewp-clientjourney-modal-header">
					<h2><?php esc_html_e( 'Quick Feedback', 'evolvewp-clientjourney' ); ?></h2>
					<button class="evolvewp-clientjourney-modal-close">&times;</button>
				</div>
				<div class="evolvewp-clientjourney-modal-body">
					<p><?php esc_html_e( 'If you have a moment, please let us know why you\'re deactivating:', 'evolvewp-clientjourney' ); ?></p>
					<form id="evolvewp-clientjourney-feedback-form">
						<label class="evolvewp-clientjourney-reason"><input type="radio" name="reason" value="temporary"><span><?php esc_html_e( 'Temporary deactivation', 'evolvewp-clientjourney' ); ?></span></label>
						<label class="evolvewp-clientjourney-reason"><input type="radio" name="reason" value="missing_features"><span><?php esc_html_e( 'Missing features I need', 'evolvewp-clientjourney' ); ?></span></label>
						<label class="evolvewp-clientjourney-reason"><input type="radio" name="reason" value="found_better"><span><?php esc_html_e( 'Found a better plugin', 'evolvewp-clientjourney' ); ?></span></label>
						<label class="evolvewp-clientjourney-reason"><input type="radio" name="reason" value="not_working"><span><?php esc_html_e( 'Plugin not working', 'evolvewp-clientjourney' ); ?></span></label>
						<label class="evolvewp-clientjourney-reason"><input type="radio" name="reason" value="too_complex"><span><?php esc_html_e( 'Too complex to use', 'evolvewp-clientjourney' ); ?></span></label>
						<label class="evolvewp-clientjourney-reason"><input type="radio" name="reason" value="other"><span><?php esc_html_e( 'Other', 'evolvewp-clientjourney' ); ?></span></label>
						<div class="evolvewp-clientjourney-details" style="display:none;">
							<textarea name="details" placeholder="<?php esc_attr_e( 'Please tell us more...', 'evolvewp-clientjourney' ); ?>" rows="4"></textarea>
						</div>
						<div class="evolvewp-clientjourney-email">
							<input type="email" name="email" placeholder="<?php esc_attr_e( 'Your email (optional)', 'evolvewp-clientjourney' ); ?>">
							<small><?php esc_html_e( 'We may follow up to help resolve issues', 'evolvewp-clientjourney' ); ?></small>
						</div>
					</form>
				</div>
				<div class="evolvewp-clientjourney-modal-footer">
					<button class="button button-secondary evolvewp-clientjourney-skip"><?php esc_html_e( 'Skip & Deactivate', 'evolvewp-clientjourney' ); ?></button>
					<button class="button button-primary evolvewp-clientjourney-submit"><?php esc_html_e( 'Submit & Deactivate', 'evolvewp-clientjourney' ); ?></button>
				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Handle the AJAX feedback submission.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function handle_feedback() {
		check_ajax_referer( 'evolvewp_cj_uninstall_feedback', 'nonce' );

		$reason  = sanitize_text_field( wp_unslash( $_POST['reason'] ?? '' ) );
		$details = sanitize_textarea_field( wp_unslash( $_POST['details'] ?? '' ) );
		$email   = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );

		$feedback = array(
			'reason'      => $reason,
			'details'     => $details,
			'email'       => $email,
			'date'        => current_time( 'mysql' ),
			'site_url'    => get_site_url(),
			'wp_version'  => get_bloginfo( 'version' ),
			'php_version' => PHP_VERSION,
		);

		$feedbacks = get_option( 'evolvewp_cj_uninstall_feedbacks', array() );
		array_unshift( $feedbacks, $feedback );
		update_option( 'evolvewp_cj_uninstall_feedbacks', array_slice( $feedbacks, 0, 50 ) );

		$admin_email = get_option( 'admin_email' );
		$subject     = sprintf( __( '[%s] Plugin Deactivation Feedback', 'evolvewp-clientjourney' ), get_bloginfo( 'name' ) );
		$message     = sprintf(
			"Reason: %s\n\nDetails: %s\n\nEmail: %s\n\nSite: %s\nWP: %s\nPHP: %s",
			$reason, $details, $email, get_site_url(), get_bloginfo( 'version' ), PHP_VERSION
		);

		wp_mail( $admin_email, $subject, $message );
		wp_send_json_success();
	}
}

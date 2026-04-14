<?php
/**
 * EvolveWP ClientJourney License Settings Page
 *
 * @package EvolveWP ClientJourney/Admin/Settings
 * @version 1.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'EvolveWP_CJ_Settings_License' ) ) :

/**
 * EvolveWP_CJ_Settings_License
 */
class EvolveWP_CJ_Settings_License extends EvolveWP_CJ_Settings_Page {

    /**
     * License manager instance
     */
    private $license_manager;

    /**
     * Constructor
     */
    public function __construct() {
        $this->id    = 'license';
        $this->label = __( 'License', 'evolvewp-clientjourney' );

        parent::__construct();
    }

    /**
     * Get settings array
     */
    public function get_settings() {
        $settings = array(

            array(
                'title' => __( 'License Management', 'evolvewp-clientjourney' ),
                'type'  => 'title',
                'desc'  => __( 'Manage your plugin license and access premium features.', 'evolvewp-clientjourney' ),
                'id'    => 'license_section'
            ),

            array(
                'type' => 'sectionend',
                'id'   => 'license_section'
            ),

        );

        return apply_filters( 'evolvewp_cj_license_settings', $settings );
    }

    /**
     * Output the settings
     */
    public function output() {
        $settings = $this->get_settings();
        EvolveWP_CJ_Admin_Settings::output_fields( $settings );
        
        // Output license UI
        $this->output_license_ui();
    }

    /**
     * Output license management UI
     */
    private function output_license_ui() {
        $license_key = get_option( 'evolvewp_cj_license_key', '' );
        $license_status = get_option( 'evolvewp_cj_license_status', 'inactive' );
        $license_data = get_option( 'evolvewp_cj_license_data', array() );
        
        ?>
        <div class="evolvewp-clientjourney-license-manager">
            <?php settings_errors( 'evolvewp_cj_license' ); ?>

            <?php if ( $license_status === 'active' ) : ?>
                <!-- Active License -->
                <div class="evolvewp-clientjourney-license-active">
                    <div class="license-status-badge active">
                        <span class="dashicons dashicons-yes-alt"></span>
                        <?php esc_html_e( 'License Active', 'evolvewp-clientjourney' ); ?>
                    </div>

                    <table class="form-table">
                        <tr>
                            <th><?php esc_html_e( 'License Key', 'evolvewp-clientjourney' ); ?></th>
                            <td>
                                <code><?php echo esc_html( $this->mask_license_key( $license_key ) ); ?></code>
                            </td>
                        </tr>
                        <tr>
                            <th><?php esc_html_e( 'Status', 'evolvewp-clientjourney' ); ?></th>
                            <td>
                                <span class="license-status-text active"><?php esc_html_e( 'Active', 'evolvewp-clientjourney' ); ?></span>
                            </td>
                        </tr>
                        <?php if ( ! empty( $license_data['license_type'] ) ) : ?>
                        <tr>
                            <th><?php esc_html_e( 'License Type', 'evolvewp-clientjourney' ); ?></th>
                            <td><?php echo esc_html( ucfirst( $license_data['license_type'] ) ); ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ( ! empty( $license_data['expires'] ) ) : ?>
                        <tr>
                            <th><?php esc_html_e( 'Expires', 'evolvewp-clientjourney' ); ?></th>
                            <td>
                                <?php echo esc_html( date_i18n( get_option( 'date_format' ), strtotime( $license_data['expires'] ) ) ); ?>
                                <?php
                                $days_left = floor( ( strtotime( $license_data['expires'] ) - time() ) / DAY_IN_SECONDS );
                                if ( $days_left > 0 && $days_left <= 30 ) {
                                    /* translators: %d: Number of days until license expires */
                                    echo ' <span class="license-expiring">(' . esc_html(sprintf( __( '%d days left', 'evolvewp-clientjourney' ), $days_left )) . ')</span>';
                                }
                                ?>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <?php if ( isset( $license_data['sites_allowed'] ) && isset( $license_data['sites_used'] ) ) : ?>
                        <tr>
                            <th><?php esc_html_e( 'Sites', 'evolvewp-clientjourney' ); ?></th>
                            <td>
                                <?php echo esc_html( $license_data['sites_used'] ); ?> / 
                                <?php echo $license_data['sites_allowed'] == 999 ? esc_html__( 'Unlimited', 'evolvewp-clientjourney' ) : esc_html( $license_data['sites_allowed'] ); ?>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <?php if ( ! empty( $license_data['customer_name'] ) ) : ?>
                        <tr>
                            <th><?php esc_html_e( 'Licensed To', 'evolvewp-clientjourney' ); ?></th>
                            <td><?php echo esc_html( $license_data['customer_name'] ); ?></td>
                        </tr>
                        <?php endif; ?>
                    </table>

                    <div class="license-actions">
                        <form method="post" style="display: inline-block; margin-right: 10px;">
                            <?php wp_nonce_field( 'evolvewp_cj_license_action' ); ?>
                            <input type="hidden" name="evolvewp_cj_license_action" value="deactivate" />
                            <button type="submit" class="button button-secondary">
                                <?php esc_html_e( 'Deactivate License', 'evolvewp-clientjourney' ); ?>
                            </button>
                        </form>
                        
                        <button type="button" class="button" onclick="document.getElementById('transfer-form').style.display='block';">
                            <?php esc_html_e( 'Transfer License', 'evolvewp-clientjourney' ); ?>
                        </button>
                        
                        <button type="button" class="button" onclick="document.getElementById('upgrade-form').style.display='block';">
                            <?php esc_html_e( 'Upgrade License', 'evolvewp-clientjourney' ); ?>
                        </button>
                    </div>

                    <!-- Transfer Form (Hidden) -->
                    <div id="transfer-form" style="display:none; margin-top: 20px; padding: 15px; background: #f8f9fa; border: 1px solid #ddd;">
                        <h4><?php esc_html_e( 'Transfer License to New Site', 'evolvewp-clientjourney' ); ?></h4>
                        <form method="post">
                            <?php wp_nonce_field( 'evolvewp_cj_license_action' ); ?>
                            <input type="hidden" name="evolvewp_cj_license_action" value="transfer" />
                            <p>
                                <label><?php esc_html_e( 'New Site URL', 'evolvewp-clientjourney' ); ?></label><br>
                                <input type="url" name="new_site_url" class="regular-text" required />
                            </p>
                            <button type="submit" class="button button-primary"><?php esc_html_e( 'Transfer', 'evolvewp-clientjourney' ); ?></button>
                            <button type="button" class="button" onclick="document.getElementById('transfer-form').style.display='none';"><?php esc_html_e( 'Cancel', 'evolvewp-clientjourney' ); ?></button>
                        </form>
                    </div>

                    <!-- Upgrade Form (Hidden) -->
                    <div id="upgrade-form" style="display:none; margin-top: 20px; padding: 15px; background: #f8f9fa; border: 1px solid #ddd;">
                        <h4><?php esc_html_e( 'Upgrade License', 'evolvewp-clientjourney' ); ?></h4>
                        <p><?php esc_html_e( 'Enter your new license key to upgrade your license type.', 'evolvewp-clientjourney' ); ?></p>
                        <form method="post">
                            <?php wp_nonce_field( 'evolvewp_cj_license_action' ); ?>
                            <input type="hidden" name="evolvewp_cj_license_action" value="upgrade" />
                            <p>
                                <label><?php esc_html_e( 'New License Key', 'evolvewp-clientjourney' ); ?></label><br>
                                <input type="text" name="new_license_key" class="regular-text" required />
                            </p>
                            <button type="submit" class="button button-primary"><?php esc_html_e( 'Upgrade', 'evolvewp-clientjourney' ); ?></button>
                            <button type="button" class="button" onclick="document.getElementById('upgrade-form').style.display='none';"><?php esc_html_e( 'Cancel', 'evolvewp-clientjourney' ); ?></button>
                        </form>
                    </div>
                </div>

            <?php else : ?>
                <!-- Inactive License -->
                <div class="evolvewp-clientjourney-license-inactive">
                    <div class="license-status-badge inactive">
                        <span class="dashicons dashicons-warning"></span>
                        <?php esc_html_e( 'No Active License', 'evolvewp-clientjourney' ); ?>
                    </div>

                    <p><?php esc_html_e( 'Enter your license key to activate premium features and receive updates.', 'evolvewp-clientjourney' ); ?></p>

                    <form method="post">
                        <?php wp_nonce_field( 'evolvewp_cj_license_action' ); ?>
                        <input type="hidden" name="evolvewp_cj_license_action" value="activate" />
                        
                        <table class="form-table">
                            <tr>
                                <th>
                                    <label for="license_key"><?php esc_html_e( 'License Key', 'evolvewp-clientjourney' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" 
                                           name="license_key" 
                                           id="license_key" 
                                           class="regular-text" 
                                           placeholder="XXXX-XXXX-XXXX-XXXX"
                                           value="<?php echo esc_attr( $license_key ); ?>" 
                                           required />
                                    <p class="description">
                                        <?php esc_html_e( 'Enter your license key received after purchase.', 'evolvewp-clientjourney' ); ?>
                                    </p>
                                </td>
                            </tr>
                        </table>

                        <button type="submit" class="button button-primary">
                            <?php esc_html_e( 'Activate License', 'evolvewp-clientjourney' ); ?>
                        </button>
                    </form>

                    <div class="license-purchase-info">
                        <h3><?php esc_html_e( 'Don\'t have a license?', 'evolvewp-clientjourney' ); ?></h3>
                        <p><?php esc_html_e( 'Purchase a license to unlock premium features, priority support, and automatic updates.', 'evolvewp-clientjourney' ); ?></p>
                        <a href="https://your-site.com/pricing" class="button button-secondary" target="_blank">
                            <?php esc_html_e( 'View Pricing', 'evolvewp-clientjourney' ); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>

            <!-- License Types -->
            <div class="license-types-info">
                <h3><?php esc_html_e( 'License Types', 'evolvewp-clientjourney' ); ?></h3>
                <div class="license-types-grid">
                    <div class="license-type">
                        <h4><?php esc_html_e( 'Single Site', 'evolvewp-clientjourney' ); ?></h4>
                        <p><?php esc_html_e( 'Use on one website', 'evolvewp-clientjourney' ); ?></p>
                    </div>
                    <div class="license-type">
                        <h4><?php esc_html_e( 'Multi-Site', 'evolvewp-clientjourney' ); ?></h4>
                        <p><?php esc_html_e( 'Use on up to 5 websites', 'evolvewp-clientjourney' ); ?></p>
                    </div>
                    <div class="license-type">
                        <h4><?php esc_html_e( 'Unlimited', 'evolvewp-clientjourney' ); ?></h4>
                        <p><?php esc_html_e( 'Use on unlimited websites', 'evolvewp-clientjourney' ); ?></p>
                    </div>
                    <div class="license-type">
                        <h4><?php esc_html_e( 'Developer', 'evolvewp-clientjourney' ); ?></h4>
                        <p><?php esc_html_e( 'For agencies and developers', 'evolvewp-clientjourney' ); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    /**
     * Mask license key for display
     */
    private function mask_license_key( $key ) {
        if ( strlen( $key ) <= 8 ) {
            return $key;
        }
        
        return substr( $key, 0, 4 ) . str_repeat( '*', strlen( $key ) - 8 ) . substr( $key, -4 );
    }

    /**
     * Save settings
     */
    public function save() {
        // License activation/deactivation is handled by License_Manager
    }
}

endif;

return new EvolveWP_CJ_Settings_License();

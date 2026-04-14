<?php
/**
 * Add the default content to the help tab.
 *
 * @author      Ryan Bayne
 * @category    Admin
 * @package     EvolveWP ClientJourney/Admin
 * @version     2.0.0
 */
          
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! class_exists( 'EvolveWP_CJ_Admin_Help', false ) ) :

/**
 * EvolveWP_CJ_Admin_Help Class.
 *
 * @since   1.0.0
 * @version 2.0.0
 */
class EvolveWP_CJ_Admin_Help {

    /**
     * Hook in tabs.
     */
    public function __construct() {
        add_action( 'current_screen', array( $this, 'add_tabs' ), 50 );
    }

    /**
     * Add contextual help tabs to EvolveWP ClientJourney admin screens.
     *
     * Registers all help tabs and the sidebar for any screen whose ID is
     * included in evolvewp_cj_get_screen_ids(). The $_GET['page'] and $_GET['tab']
     * reads that previously appeared here were unused after assignment and have
     * been removed — eliminating the NonceVerification.Recommended warning
     * without adding a nonce to a purely display-only help context.
     *
     * @since   1.0.0
     * @version 2.0.0
     * @return void
     */
    public function add_tabs() {
        $screen = get_current_screen();

        if ( ! $screen || ! in_array( $screen->id, evolvewp_cj_get_screen_ids() ) ) {
            return;
        }

        $screen->add_help_tab( array(
            'id'        => 'evolvewp_cj_instructions_tab',
            'title'     => __( 'Instructions', 'evolvewp-clientjourney' ),
            'content'   => '',
            'callback'  => array( $this, 'instructions' ),
        ) );

        $screen->add_help_tab( array(
            'id'        => 'evolvewp_cj_support_tab',
            'title'     => __( 'Help &amp; Support', 'evolvewp-clientjourney' ),
            'content'   => '<h2>' . __( 'Help &amp; Support', 'evolvewp-clientjourney' ) . '</h2>' .
            '<p>' . __( 'Support resources for this boilerplate are being updated. In the meantime, refer to the inline documentation throughout the codebase, the docs directory, and the README for guidance on getting started and extending the plugin.', 'evolvewp-clientjourney' ) . '</p>',
        ) );

        if( defined( 'EVOLVEWP_CJ_GITHUB' ) ) { 
            $screen->add_help_tab( array(
                'id'        => 'evolvewp_cj_bugs_tab',
                'title'     => __( 'Found a bug?', 'evolvewp-clientjourney' ),
                'content'   =>
                    '<h2>' . __( 'Please Report Bugs!', 'evolvewp-clientjourney' ) . '</h2>' .
                    '<p>You could save a lot of people a lot of time by reporting issues. Tell the developers and community what has gone wrong by creating a ticket. Please explain what you were doing, what you expected from your actions and what actually happened. Screenshots and short videos are often a big help as the evidence saves us time, we will give you cookies in return.</p>' .  
                    '<p><a href="' . EVOLVEWP_CJ_GITHUB . '/issues?state=open' . '" class="button button-primary">' . __( 'Report a bug', 'evolvewp-clientjourney' ) . '</a></p>',
            ) );
        }
        
        /**
        * This is the right side sidebar, usually displaying a list of links. 
        * 
        * @var {WP_Screen|WP_Screen}
        */
        $screen->set_help_sidebar(
            '<p><strong>' . __( 'For more information:', 'evolvewp-clientjourney' ) . '</strong></p>' .
            '<p><a href="' . EVOLVEWP_CJ_GITHUB . '/wiki" target="_blank">' . __( 'About EvolveWP ClientJourney', 'evolvewp-clientjourney' ) . '</a></p>' .
            '<p><a href="' . EVOLVEWP_CJ_GITHUB . '" target="_blank">' . __( 'GitHub project', 'evolvewp-clientjourney' ) . '</a></p>' .
            '<p><a href="' . EVOLVEWP_CJ_GITHUB . '/blob/master/CHANGELOG.txt" target="_blank">' . __( 'Change Log', 'evolvewp-clientjourney' ) . '</a></p>' .
            '<p><a href="https://pluginseed.wordpress.com" target="_blank">' . __( 'Blog', 'evolvewp-clientjourney' ) . '</a></p>'
        );
        
        $screen->add_help_tab( array(
            'id'        => 'evolvewp_cj_wizard_tab',
            'title'     => __( 'Setup wizard', 'evolvewp-clientjourney' ),
            'content'   =>
                '<h2>' . __( 'Setup wizard', 'evolvewp-clientjourney' ) . '</h2>' .
                '<p>' . __( 'If you need to access the setup wizard again, please click on the button below.', 'evolvewp-clientjourney' ) . '</p>' .
                '<p><a href="' . admin_url( 'index.php?page=evolvewp-clientjourney-setup' ) . '" class="button button-primary">' . __( 'Setup wizard', 'evolvewp-clientjourney' ) . '</a></p>',
        ) );   
             
        $screen->add_help_tab( array(
            'id'        => 'evolvewp_cj_tutorial_tab',
            'title'     => __( 'Tutorial', 'evolvewp-clientjourney' ),
            'content'   =>
                '<h2>' . __( 'Pointers Tutorial', 'evolvewp-clientjourney' ) . '</h2>' .
                '<p>' . __( 'The plugin will explain some features using WordPress pointers.', 'evolvewp-clientjourney' ) . '</p>' .
                '<p><a href="' . admin_url( 'admin.php?page=evolvewp-clientjourney&amp;evolvewp-clientjourneytutorial=normal' ) . '" class="button button-primary">' . __( 'Star Tutorial', 'evolvewp-clientjourney' ) . '</a></p>',
        ) );
  
        $screen->add_help_tab( array(
            'id'        => 'evolvewp_cj_contribute_tab',
            'title'     => __( 'Contribute', 'evolvewp-clientjourney' ),
            'content'   => '<h2>' . __( 'Everyone Can Contribute', 'evolvewp-clientjourney' ) . '</h2>' .
            '<p>' . __( 'You can contribute in many ways and by doing so you will help the project thrive.', 'evolvewp-clientjourney' ) . '</p>' .
            '<p><a href="' . EVOLVEWP_CJ_DONATE . '" class="button button-primary">' . __( 'Donate', 'evolvewp-clientjourney' ) . '</a> <a href="' . EVOLVEWP_CJ_GITHUB . '/wiki" class="button button-primary">' . __( 'Update Wiki', 'evolvewp-clientjourney' ) . '</a> <a href="' . EVOLVEWP_CJ_GITHUB . '/issues" class="button button-primary">' . __( 'Fix Bugs', 'evolvewp-clientjourney' ) . '</a></p>',
        ) );

        $screen->add_help_tab( array(
            'id'        => 'evolvewp_cj_newsletter_tab',
            'title'     => __( 'Newsletter', 'evolvewp-clientjourney' ),
            'content'   => '<h2>' . __( 'Annual Newsletter', 'evolvewp-clientjourney' ) . '</h2>' .
            '<p>' . __( 'Mailchip is used to manage the projects newsletter subscribers list.', 'evolvewp-clientjourney' ) . '</p>' .
            '<p>' . __( 'Visit the MailChimp website to subscribe to the EvolveWP ClientJourney newsletter.', 'evolvewp-clientjourney' ) . '</p>' .
            '<p><a href="http://eepurl.com/2W_2n" class="button button-primary" target="_blank">' . __( 'Subscribe to Newsletter', 'evolvewp-clientjourney' ) . '</a></p>',
        ) );
        
        $screen->add_help_tab( array(
            'id'        => 'evolvewp_cj_credits_tab',
            'title'     => __( 'Credits', 'evolvewp-clientjourney' ),
            'content'   => '<h2>' . __( 'Credits', 'evolvewp-clientjourney' ) . '</h2>' .
            '<p>Please do not remove credits from the plugin. You may edit them or give credit somewhere else in your project.</p>' . 
            '<h4>' . __( 'Automattic - they created the best way to create plugins so we can all get more from WP.', 'evolvewp-clientjourney' ) . '</h4>' .
            '<h4>' . __( 'Brian at WPMUDEV - our discussion led to this project and entirely new approach in my development.', 'evolvewp-clientjourney' ) . '</h4>' . 
            '<h4>' . __( 'Ignacio Cruz at WPMUDEV - has provided a great approach to handling shortcodes.', 'evolvewp-clientjourney' ) . '</h4>' .
            '<h4>' . __( 'Ashley Rich (A5shleyRich) - author of a crucial piece of the puzzle, related to asynchronous background tasks.', 'evolvewp-clientjourney' ) . '</h4>' .
            '<h4>' . __( 'Igor Vaynberg - thank you for an elegant solution to searching within a menu.', 'evolvewp-clientjourney' ) . '</h4>'
        ) );

        $screen->add_help_tab( array(
            'id'        => 'evolvewp_cj_about_tab',
            'title'     => __( 'FifeCIC', 'evolvewp-clientjourney' ),
            'content'   => '<!-- FifeCIC About Tab v1.0 --><h2>' . __( 'About FifeCIC', 'evolvewp-clientjourney' ) . '</h2>' .
            '<p>' . __( 'This plugins developer is supported by FifeCIC (Fife Community Interest Company), a non-profit organization dedicated to serving our local community through technology and innovation.', 'evolvewp-clientjourney' ) . '</p>' .
            '<h3>' . __( 'Our Mission', 'evolvewp-clientjourney' ) . '</h3>' .
            '<p>' . __( 'FifeCIC exists to empower communities through accessible digital solutions. We believe that quality software should be available to everyone, regardless of budget, and that technology can be a force for positive social change.', 'evolvewp-clientjourney' ) . '</p>' .
            '<h3>' . __( 'Volunteer Development', 'evolvewp-clientjourney' ) . '</h3>' .
            '<p>' . __( 'This plugin was lovingly crafted by Ryan Bayne, a volunteer developer committed to FifeCIC\'s vision. Every feature, every line of code, represents hours of unpaid dedication to making WordPress better for everyone.', 'evolvewp-clientjourney' ) . '</p>' .
            '<p>' . __( 'As a Community Interest Company, we reinvest everything back into our projects and community initiatives. We don\'t have corporate backing or venture capital—just passionate people who believe in what we\'re doing.', 'evolvewp-clientjourney' ) . '</p>' .
            '<h3>' . __( 'How You Can Help', 'evolvewp-clientjourney' ) . '</h3>' .
            '<p>💝 <strong>' . __( 'Donate:', 'evolvewp-clientjourney' ) . '</strong> ' . __( 'Your financial support helps us dedicate more time to development, hosting, and community outreach. Every contribution, no matter how small, makes a real difference.', 'evolvewp-clientjourney' ) . '</p>' .
            '<p>🤝 <strong>' . __( 'Get Involved:', 'evolvewp-clientjourney' ) . '</strong> ' . __( 'Whether you\'re a developer, designer, tester, or just enthusiastic about our mission, we\'d love to have you join us. Check out our GitHub repository or contact us directly.', 'evolvewp-clientjourney' ) . '</p>' .
            '<p>⭐ <strong>' . __( 'Spread the Word:', 'evolvewp-clientjourney' ) . '</strong> ' . __( 'Leave a review, share with colleagues, or simply tell others about FifeCIC. Community support is our lifeblood.', 'evolvewp-clientjourney' ) . '</p>' .
            '<p>🐛 <strong>' . __( 'Report Issues:', 'evolvewp-clientjourney' ) . '</strong> ' . __( 'Help us improve by reporting bugs and suggesting features. Your feedback shapes our roadmap.', 'evolvewp-clientjourney' ) . '</p>' .
            '<h3>' . __( 'Connect With Us', 'evolvewp-clientjourney' ) . '</h3>' .
            '<p><a href="#" class="button">' . __( 'Website', 'evolvewp-clientjourney' ) . '</a> ' .
            '<a href="#" class="button">' . __( 'GitHub', 'evolvewp-clientjourney' ) . '</a> ' .
            '<a href="#" class="button">' . __( 'Email', 'evolvewp-clientjourney' ) . '</a> ' .
            '<a href="#" class="button button-primary">' . __( 'Donate', 'evolvewp-clientjourney' ) . '</a></p>'
        ) );
                    
        $screen->add_help_tab( array(
            'id'        => 'evolvewp_cj_faq_tab',
            'title'     => __( 'FAQ', 'evolvewp-clientjourney' ),
            'content'   => '',
            'callback'  => array( $this, 'faq' ),
        ) );
                        
    }
    
    /**
     * Instructions tab content - step-by-step guide for using verification tabs
     */
    public function instructions() {
        ?>
        <div class="evolvewp-clientjourney-instructions">
            <h2><?php esc_html_e( 'Step-by-Step Verification Process', 'evolvewp-clientjourney' ); ?></h2>
            <p><?php esc_html_e( 'Follow these tabs in order to achieve optimal verification results:', 'evolvewp-clientjourney' ); ?></p>
            
            <div class="instruction-steps">
                <div class="step-card">
                    <h3><span class="step-number">1</span> <?php esc_html_e( 'Configure', 'evolvewp-clientjourney' ); ?></h3>
                    <p><?php esc_html_e( 'Set up your verification preferences, exclusion rules, and scanning options. This determines what files will be checked and which rules to apply.', 'evolvewp-clientjourney' ); ?></p>
                    <p><strong><?php esc_html_e( 'Key Actions:', 'evolvewp-clientjourney' ); ?></strong> <?php esc_html_e( 'Select verification rules, configure exclusions, set scanning depth.', 'evolvewp-clientjourney' ); ?></p>
                </div>
                
                <div class="step-card">
                    <h3><span class="step-number">2</span> <?php esc_html_e( 'Hash Generation', 'evolvewp-clientjourney' ); ?></h3>
                    <p><?php esc_html_e( 'Generate file hashes for incremental scanning. This creates a baseline to detect which files have changed since the last scan.', 'evolvewp-clientjourney' ); ?></p>
                    <p><strong><?php esc_html_e( 'Key Actions:', 'evolvewp-clientjourney' ); ?></strong> <?php esc_html_e( 'Generate initial hashes, validate hash creation, review file coverage.', 'evolvewp-clientjourney' ); ?></p>
                </div>
                
                <div class="step-card">
                    <h3><span class="step-number">3</span> <?php esc_html_e( 'Exclusions', 'evolvewp-clientjourney' ); ?></h3>
                    <p><?php esc_html_e( 'Manage files and directories to exclude from verification. This step processes your exclusion rules and creates the final scan list.', 'evolvewp-clientjourney' ); ?></p>
                    <p><strong><?php esc_html_e( 'Key Actions:', 'evolvewp-clientjourney' ); ?></strong> <?php esc_html_e( 'Review excluded files, add new exclusions, validate exclusion patterns.', 'evolvewp-clientjourney' ); ?></p>
                </div>
                
                <div class="step-card">
                    <h3><span class="step-number">4</span> <?php esc_html_e( 'Readiness Check', 'evolvewp-clientjourney' ); ?></h3>
                    <p><?php esc_html_e( 'Verify your configuration is ready for verification. This generates a readiness score based on your current settings and file status.', 'evolvewp-clientjourney' ); ?></p>
                    <p><strong><?php esc_html_e( 'Key Actions:', 'evolvewp-clientjourney' ); ?></strong> <?php esc_html_e( 'Review readiness score, address any issues, confirm scan parameters.', 'evolvewp-clientjourney' ); ?></p>
                </div>
                
                <div class="step-card">
                    <h3><span class="step-number">5</span> <?php esc_html_e( 'Advanced Verification', 'evolvewp-clientjourney' ); ?></h3>
                    <p><?php esc_html_e( 'Run the comprehensive verification scan. This performs the actual code analysis and generates your final results.', 'evolvewp-clientjourney' ); ?></p>
                    <p><strong><?php esc_html_e( 'Key Actions:', 'evolvewp-clientjourney' ); ?></strong> <?php esc_html_e( 'Start verification, monitor progress, review results and recommendations.', 'evolvewp-clientjourney' ); ?></p>
                </div>
            </div>
            
            <div class="instruction-tips">
                <h3><?php esc_html_e( 'Important Tips', 'evolvewp-clientjourney' ); ?></h3>
                <ul>
                    <li><?php esc_html_e( 'Complete each step before moving to the next for best results', 'evolvewp-clientjourney' ); ?></li>
                    <li><?php esc_html_e( 'Use the validation features in each step to ensure proper configuration', 'evolvewp-clientjourney' ); ?></li>
                    <li><?php esc_html_e( 'The readiness score helps identify potential issues before running the full scan', 'evolvewp-clientjourney' ); ?></li>
                    <li><?php esc_html_e( 'Review exclusions carefully to avoid scanning unnecessary files', 'evolvewp-clientjourney' ); ?></li>
                </ul>
            </div>
        </div>
        
        <style>
        .evolvewp-clientjourney-instructions {
            max-width: 800px;
        }
        .instruction-steps {
            margin: 20px 0;
        }
        .step-card {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 15px;
            margin: 10px 0;
            border-left: 4px solid #0073aa;
        }
        .step-card h3 {
            margin-top: 0;
            color: #0073aa;
        }
        .step-number {
            background: #0073aa;
            color: white;
            border-radius: 50%;
            padding: 5px 10px;
            margin-right: 10px;
            font-weight: bold;
        }
        .instruction-tips {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 5px;
            padding: 15px;
            margin-top: 20px;
        }
        .instruction-tips h3 {
            margin-top: 0;
            color: #856404;
        }
        .instruction-tips ul {
            margin-bottom: 0;
        }
        </style>
        <?php
    }
    
    public function faq() {
        $questions = array(
            0 => __( '-- Select a question --', 'evolvewp-clientjourney' ),
            1 => __( "Do I need to give credit to you (Ryan Bayne) if I create a plugin using the seed?", 'evolvewp-clientjourney' ),
            2 => __( "Can I hire you (Ryan Bayne) to create a plugin for me using the seed?", 'evolvewp-clientjourney' ),
            3 => __( "Is there support for anyone using this boilerplate to create a plugin?", 'evolvewp-clientjourney' ),
        );  
        
        wp_add_inline_style( 'wp-admin', '.faq-answers li { background:white; padding:10px 20px; border:1px solid #cacaca; }' );
        
        ?>

        <p>
            <ul id="faq-index">
                <?php foreach ( $questions as $question_index => $question ): ?>
                    <li data-answer="<?php echo esc_attr($question_index); ?>"><a href="#q<?php echo esc_attr($question_index); ?>"><?php echo esc_html($question); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </p>
        
        <ul class="faq-answers">
            <li class="faq-answer" id='q1'>
                <?php esc_html_e('There are multiple developers mentioned in the documentation of this plugin. You must continue to give credit to them all. Removing credits and any reference to repositories will make it difficult for developers to maintain the plugin you create. If you want my support you must also mentioned myself and the WordPress Plugin Seed on your plugins main page.', 'evolvewp-clientjourney');?>
            </li>
            <li class="faq-answer" id='q2'>
                <p> <?php esc_html_e('Yes, you can hire me (the plugin author) to create a plugin for you and prices vary but start very low. Technically it takes a only a few minutes to create a new plugin using my boilerplate. You can pay me a small fee to start your plugin and then make separate agreements for doing more work to it.', 'evolvewp-clientjourney');?> </p>
            </li>

            <li class="faq-answer" id='q3'>
                <p> <?php esc_html_e('There is always some level of free support but I will expect to see some credit giving to myself and the project. Support is only offered when getting started or your plugin is already available on the WordPress.org repository. If you require support for a premium/commercial plugin project then you will have to pay a small consultation fee.', 'evolvewp-clientjourney');?> </p>
            </li>
     
        </ul>
             
        <?php
        $faq_script = "
            jQuery( document).ready( function( $ ) {
                var selectedQuestion = '';

                function selectQuestion() {
                    var q = $( '#' + $(this).val() );
                    if ( selectedQuestion.length ) {
                        selectedQuestion.hide();
                    }
                    q.show();
                    selectedQuestion = q;
                }

                var faqAnswers = $('.faq-answer');
                var faqIndex = $('#faq-index');
                faqAnswers.hide();
                faqIndex.hide();

                var indexSelector = $('<select/>')
                    .attr( 'id', 'question-selector' )
                    .addClass( 'widefat' );
                var questions = faqIndex.find( 'li' );
                var advancedGroup = false;
                questions.each( function () {
                    var self = $(this);
                    var answer = self.data('answer');
                    var text = self.text();
                    var option;

                    if ( answer === 39 ) {
                        advancedGroup = $( '<optgroup />' )
                            .attr( 'label', '" . esc_js( __( 'Advanced: This part of FAQ requires some knowledge about HTML, PHP and/or WordPress coding.', 'evolvewp-clientjourney' ) ) . "' );

                        indexSelector.append( advancedGroup );
                    }

                    if ( answer !== '' && text !== '' ) {
                        option = $( '<option/>' )
                            .val( 'q' + answer )
                            .text( text );
                        if ( advancedGroup ) {
                            advancedGroup.append( option );
                        }
                        else {
                            indexSelector.append( option );
                        }

                    }

                });

                faqIndex.after( indexSelector );
                indexSelector.before(
                    $('<label />')
                        .attr( 'for', 'question-selector' )
                        .text( '" . esc_js( __( 'Select a question', 'evolvewp-clientjourney' ) ) . "' )
                        .addClass( 'screen-reader-text' )
                );

                indexSelector.change( selectQuestion );
            });
        ";
        wp_add_inline_script( 'jquery', $faq_script );
        ?>        

        <?php 
    }
}

endif;

return new EvolveWP_CJ_Admin_Help();

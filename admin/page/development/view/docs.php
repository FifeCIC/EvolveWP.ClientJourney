<?php
/**
 * EvolveWP ClientJourney Documentation Viewer
 *
 * @package EvolveWP ClientJourney/Admin/Views
 * @version 1.1.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * EvolveWP_CJ_Admin_Development_Docs Class.
 *
 * @since   1.1.0
 * @version 1.2.0
 */
class EvolveWP_CJ_Admin_Development_Docs {
    
    /**
     * Output the documentation viewer.
     *
     * The doc GET parameter is a read-only display selector used to choose
     * which Markdown file to render. It carries no privilege and mutates no
     * state, so a nonce is not required; capability verification is sufficient.
     *
     * @since  1.1.0
     * @version 1.2.0
     * @return void
     */
    public static function output() {
        $docs_dir = EVOLVEWP_CJ_PLUGIN_DIR_PATH . 'docs/';

        // Read-only navigation parameter — selects which doc file to render.
        // Restricted to administrators; sanitize_file_name() prevents path traversal.
        $current_doc = ( current_user_can( 'manage_options' ) && isset( $_GET['doc'] ) )
            ? sanitize_file_name( wp_unslash( $_GET['doc'] ) )
            : 'GETTING-STARTED';
        
        ?>
        <div class="evolvewp-clientjourney-docs-viewer">
            <div class="evolvewp-clientjourney-docs-sidebar">
                <h3><?php esc_html_e('Documentation', 'evolvewp-clientjourney'); ?></h3>
                <?php self::render_docs_menu($docs_dir, $current_doc); ?>
            </div>
            
            <div class="evolvewp-clientjourney-docs-content">
                <?php self::render_doc_content($docs_dir, $current_doc); ?>
            </div>
        </div>
        
        <style>
            .evolvewp-clientjourney-docs-viewer {
                display: flex;
                gap: 20px;
                margin-top: 20px;
            }
            .evolvewp-clientjourney-docs-sidebar {
                width: 250px;
                background: #fff;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 3px;
            }
            .evolvewp-clientjourney-docs-sidebar h3 {
                margin-top: 0;
                padding-bottom: 10px;
                border-bottom: 2px solid #0073aa;
            }
            .evolvewp-clientjourney-docs-sidebar ul {
                list-style: none;
                margin: 0;
                padding: 0;
            }
            .evolvewp-clientjourney-docs-sidebar li {
                margin: 0;
                padding: 0;
            }
            .evolvewp-clientjourney-docs-sidebar a {
                display: block;
                padding: 8px 12px;
                text-decoration: none;
                color: #333;
                border-radius: 3px;
                transition: background 0.2s;
            }
            .evolvewp-clientjourney-docs-sidebar a:hover {
                background: #f0f0f0;
            }
            .evolvewp-clientjourney-docs-sidebar a.active {
                background: #0073aa;
                color: #fff;
                font-weight: 600;
            }
            .evolvewp-clientjourney-docs-content {
                flex: 1;
                background: #fff;
                padding: 30px;
                border: 1px solid #ddd;
                border-radius: 3px;
                max-width: 900px;
            }
            .evolvewp-clientjourney-docs-content h1 {
                margin-top: 0;
                padding-bottom: 15px;
                border-bottom: 2px solid #0073aa;
            }
            .evolvewp-clientjourney-docs-content h2 {
                margin-top: 30px;
                color: #0073aa;
            }
            .evolvewp-clientjourney-docs-content pre {
                background: #f5f5f5;
                padding: 15px;
                border-left: 3px solid #0073aa;
                overflow-x: auto;
            }
            .evolvewp-clientjourney-docs-content code {
                background: #f5f5f5;
                padding: 2px 6px;
                border-radius: 3px;
                font-size: 0.9em;
            }
            .evolvewp-clientjourney-docs-content pre code {
                background: none;
                padding: 0;
            }
            .evolvewp-clientjourney-docs-content table {
                width: 100%;
                border-collapse: collapse;
                margin: 20px 0;
            }
            .evolvewp-clientjourney-docs-content table th,
            .evolvewp-clientjourney-docs-content table td {
                padding: 10px;
                border: 1px solid #ddd;
                text-align: left;
            }
            .evolvewp-clientjourney-docs-content table th {
                background: #f5f5f5;
                font-weight: 600;
            }
            .evolvewp-clientjourney-docs-content blockquote {
                border-left: 4px solid #0073aa;
                padding-left: 20px;
                margin-left: 0;
                color: #666;
                font-style: italic;
            }
        </style>
        <?php
    }
    
    /**
     * Render documentation menu
     */
    private static function render_docs_menu($docs_dir, $current_doc) {
        $docs = array(
            'GETTING-STARTED' => __('Getting Started', 'evolvewp-clientjourney'),
            'REPEATER-FIELDS' => __('Repeater Fields', 'evolvewp-clientjourney'),
            'REPEATER-QUICK-REFERENCE' => __('Repeater Quick Ref', 'evolvewp-clientjourney'),
            'ADVANCED-FEATURES' => __('Advanced Features', 'evolvewp-clientjourney'),
            'INTEGRATIONS' => __('Integrations', 'evolvewp-clientjourney'),
            'DEVELOPER-CHECKLIST' => __('Developer Checklist', 'evolvewp-clientjourney'),
            'ECOSYSTEM' => __('Ecosystem', 'evolvewp-clientjourney'),
            'UNIFIED-FEATURE' => __('Unified Feature', 'evolvewp-clientjourney'),
            'DOCUMENTATION-STANDARD' => __('Doc Standards', 'evolvewp-clientjourney'),
        );
        
        echo '<ul>';
        foreach ($docs as $doc_file => $doc_title) {
            $file_path = $docs_dir . $doc_file . '.md';
            if (file_exists($file_path)) {
                $active_class = ($current_doc === $doc_file) ? 'active' : '';
                $url = add_query_arg(array('tab' => 'docs', 'doc' => $doc_file));
                printf(
                    '<li><a href="%s" class="%s">%s</a></li>',
                    esc_url($url),
                    esc_attr($active_class),
                    esc_html($doc_title)
                );
            }
        }
        echo '</ul>';
    }
    
    /**
     * Render documentation content
     */
    private static function render_doc_content($docs_dir, $current_doc) {
        $file_path = $docs_dir . $current_doc . '.md';
        
        if (!file_exists($file_path)) {
            echo '<p>' . esc_html__('Documentation file not found.', 'evolvewp-clientjourney') . '</p>';
            return;
        }
        
        $content = file_get_contents($file_path);
        
        // Simple markdown to HTML conversion
        $html = self::markdown_to_html($content);
        
        echo wp_kses_post($html);
    }
    
    /**
     * Convert markdown to HTML (basic implementation)
     */
    private static function markdown_to_html($markdown) {
        // Headers
        $markdown = preg_replace('/^### (.+)$/m', '<h3>$1</h3>', $markdown);
        $markdown = preg_replace('/^## (.+)$/m', '<h2>$1</h2>', $markdown);
        $markdown = preg_replace('/^# (.+)$/m', '<h1>$1</h1>', $markdown);
        
        // Code blocks
        $markdown = preg_replace('/```(\w+)?\n(.*?)\n```/s', '<pre><code>$2</code></pre>', $markdown);
        
        // Inline code
        $markdown = preg_replace('/`([^`]+)`/', '<code>$1</code>', $markdown);
        
        // Bold
        $markdown = preg_replace('/\*\*(.+?)\*\*/', '<strong>$1</strong>', $markdown);
        
        // Italic
        $markdown = preg_replace('/\*(.+?)\*/', '<em>$1</em>', $markdown);
        
        // Links
        $markdown = preg_replace('/\[([^\]]+)\]\(([^\)]+)\)/', '<a href="$2">$1</a>', $markdown);
        
        // Lists
        $markdown = preg_replace('/^\- (.+)$/m', '<li>$1</li>', $markdown);
        $markdown = preg_replace('/(<li>.*<\/li>)/s', '<ul>$1</ul>', $markdown);
        
        // Paragraphs
        $markdown = preg_replace('/\n\n/', '</p><p>', $markdown);
        $markdown = '<p>' . $markdown . '</p>';
        
        // Clean up empty paragraphs
        $markdown = preg_replace('/<p>\s*<\/p>/', '', $markdown);
        $markdown = preg_replace('/<p>(<h[1-6]>)/', '$1', $markdown);
        $markdown = preg_replace('/(<\/h[1-6]>)<\/p>/', '$1', $markdown);
        $markdown = preg_replace('/<p>(<ul>)/', '$1', $markdown);
        $markdown = preg_replace('/(<\/ul>)<\/p>/', '$1', $markdown);
        $markdown = preg_replace('/<p>(<pre>)/', '$1', $markdown);
        $markdown = preg_replace('/(<\/pre>)<\/p>/', '$1', $markdown);
        
        return $markdown;
    }
}

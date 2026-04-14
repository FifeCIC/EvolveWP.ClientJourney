<?php
/**
 * Architecture View
 * 
 * @package EvolveWP ClientJourney
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once EVOLVEWP_CJ_PLUGIN_DIR . 'includes/classes/architecture-mapper.php';

?>

<div class="evolvewp-clientjourney-architecture-view">
    <h2>Plugin Architecture</h2>
    <p>Visual guide to EvolveWP ClientJourney structure for developers and AI assistants.</p>
    
    <?php EvolveWP_CJ_Architecture_Mapper::render_tree(); ?>
</div>

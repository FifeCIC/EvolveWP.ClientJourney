<?php
/**
 * Example Test Case
 *
 * @package EvolveWP ClientJourney/Tests
 */

class EvolveWP_CJ_Test_Example extends WP_UnitTestCase {
    
    public function test_plugin_activated() {
        $this->assertTrue(function_exists('EvolveWP ClientJourney'));
    }
    
    public function test_version_constant() {
        $this->assertTrue(defined('EVOLVEWP_CJ_VERSION'));
    }
}

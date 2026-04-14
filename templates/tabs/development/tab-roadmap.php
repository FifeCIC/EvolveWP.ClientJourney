<?php
/**
 * Roadmap tab — development planning and task management.
 *
 * ROLE: template
 *
 * Displays the plugin's development roadmap with accordion phases, two-column
 * task/architecture layout, priority badges, and localStorage-persisted
 * checkboxes. Every plugin cloned from EvolveWP ClientJourney gets this tab and populates
 * it with its own phases.
 *
 * DEPENDS ON:
 *   - assets/js/admin/roadmap.js (accordion + localStorage)
 *   - assets/css/components/roadmap.css (styling)
 *
 * @package  EvolveWP ClientJourney
 * @since    3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="evolvewp-clientjourney-roadmap-intro">
	<p><?php esc_html_e( 'Development roadmap with task tracking. Checkbox states are saved in your browser.', 'evolvewp-clientjourney' ); ?></p>
	<p><small><?php esc_html_e( 'Keyboard: Ctrl+Shift+E = expand all, Ctrl+Shift+C = collapse all, Ctrl+Shift+R = reset tasks.', 'evolvewp-clientjourney' ); ?></small></p>
</div>

<!-- Phase Status Overview -->
<div class="evolvewp-clientjourney-roadmap-status-grid">
	<div class="evolvewp-clientjourney-roadmap-status-card evolvewp-clientjourney-status-completed">
		<h3><?php esc_html_e( 'PHASE 0', 'evolvewp-clientjourney' ); ?></h3>
		<div class="evolvewp-clientjourney-status-title"><?php esc_html_e( 'Composer & Namespaces', 'evolvewp-clientjourney' ); ?></div>
		<div class="evolvewp-clientjourney-status-badge"><?php esc_html_e( '✅ COMPLETE', 'evolvewp-clientjourney' ); ?></div>
	</div>
	<div class="evolvewp-clientjourney-roadmap-status-card evolvewp-clientjourney-status-completed">
		<h3><?php esc_html_e( 'PHASE 1', 'evolvewp-clientjourney' ); ?></h3>
		<div class="evolvewp-clientjourney-status-title"><?php esc_html_e( 'Structure — loader & includes', 'evolvewp-clientjourney' ); ?></div>
		<div class="evolvewp-clientjourney-status-badge"><?php esc_html_e( '✅ COMPLETE', 'evolvewp-clientjourney' ); ?></div>
	</div>
	<div class="evolvewp-clientjourney-roadmap-status-card evolvewp-clientjourney-status-active">
		<h3><?php esc_html_e( 'PHASE 2', 'evolvewp-clientjourney' ); ?></h3>
		<div class="evolvewp-clientjourney-status-title"><?php esc_html_e( 'Structure — templates', 'evolvewp-clientjourney' ); ?></div>
		<div class="evolvewp-clientjourney-status-badge"><?php esc_html_e( '🔄 IN PROGRESS', 'evolvewp-clientjourney' ); ?></div>
	</div>
	<div class="evolvewp-clientjourney-roadmap-status-card evolvewp-clientjourney-status-pending">
		<h3><?php esc_html_e( 'PHASE 3', 'evolvewp-clientjourney' ); ?></h3>
		<div class="evolvewp-clientjourney-status-title"><?php esc_html_e( 'Structure — assets', 'evolvewp-clientjourney' ); ?></div>
		<div class="evolvewp-clientjourney-status-badge"><?php esc_html_e( '📋 PLANNED', 'evolvewp-clientjourney' ); ?></div>
	</div>
	<div class="evolvewp-clientjourney-roadmap-status-card evolvewp-clientjourney-status-pending">
		<h3><?php esc_html_e( 'PHASE 4', 'evolvewp-clientjourney' ); ?></h3>
		<div class="evolvewp-clientjourney-status-title"><?php esc_html_e( 'AI-Readable Standards', 'evolvewp-clientjourney' ); ?></div>
		<div class="evolvewp-clientjourney-status-badge"><?php esc_html_e( '📋 PLANNED', 'evolvewp-clientjourney' ); ?></div>
	</div>
</div>

<!-- Main Roadmap Content -->
<div class="evolvewp-clientjourney-roadmap-main">

	<!-- PHASE 0: Composer & Namespaces -->
	<div class="evolvewp-clientjourney-roadmap-phase">
		<div class="evolvewp-clientjourney-roadmap-phase-header" data-phase="phase0">
			<h2><?php esc_html_e( 'PHASE 0: Composer & Namespace Foundation ✅', 'evolvewp-clientjourney' ); ?></h2>
			<div class="evolvewp-clientjourney-roadmap-phase-toggle">▶</div>
		</div>
		<div class="evolvewp-clientjourney-roadmap-phase-content" id="phase0-content" style="display:none;">
			<div class="evolvewp-clientjourney-roadmap-objective">
				<strong><?php esc_html_e( 'Objective:', 'evolvewp-clientjourney' ); ?></strong>
				<?php esc_html_e( 'Establish PSR-4 autoloading via Composer so every new file uses namespaces from the start.', 'evolvewp-clientjourney' ); ?>
			</div>
			<div class="evolvewp-clientjourney-roadmap-section">
				<div class="evolvewp-clientjourney-roadmap-tasks-grid">
					<div class="evolvewp-clientjourney-roadmap-tasks-column">
						<h4><?php esc_html_e( 'Tasks', 'evolvewp-clientjourney' ); ?></h4>
						<div class="evolvewp-clientjourney-roadmap-task">
							<input type="checkbox" id="t01" class="evolvewp-clientjourney-task-checkbox" checked disabled>
							<label for="t01"><?php esc_html_e( 'Create composer.json with PSR-4 autoload map', 'evolvewp-clientjourney' ); ?></label>
						</div>
						<div class="evolvewp-clientjourney-roadmap-task">
							<input type="checkbox" id="t02" class="evolvewp-clientjourney-task-checkbox" checked disabled>
							<label for="t02"><?php esc_html_e( 'Load Composer autoloader in evolvewp-clientjourney.php', 'evolvewp-clientjourney' ); ?></label>
						</div>
						<div class="evolvewp-clientjourney-roadmap-task">
							<input type="checkbox" id="t03" class="evolvewp-clientjourney-task-checkbox" checked disabled>
							<label for="t03"><?php esc_html_e( 'Create namespace directory structure', 'evolvewp-clientjourney' ); ?></label>
						</div>
						<div class="evolvewp-clientjourney-roadmap-task">
							<input type="checkbox" id="t04" class="evolvewp-clientjourney-task-checkbox" checked disabled>
							<label for="t04"><?php esc_html_e( 'Migrate Registry as proof-of-concept', 'evolvewp-clientjourney' ); ?></label>
						</div>
						<div class="evolvewp-clientjourney-roadmap-task">
							<input type="checkbox" id="t05" class="evolvewp-clientjourney-task-checkbox" checked disabled>
							<label for="t05"><?php esc_html_e( 'Delete legacy SPL autoloader', 'evolvewp-clientjourney' ); ?></label>
						</div>
					</div>
					<div class="evolvewp-clientjourney-roadmap-architecture-column">
						<h4><?php esc_html_e( 'Key Files', 'evolvewp-clientjourney' ); ?></h4>
						<div class="evolvewp-clientjourney-roadmap-arch-item">
							<code>composer.json</code><br>
							<?php esc_html_e( 'PSR-4 map: EvolveWP\Core\\ → includes/', 'evolvewp-clientjourney' ); ?>
						</div>
						<div class="evolvewp-clientjourney-roadmap-arch-item">
							<code>vendor/autoload.php</code><br>
							<?php esc_html_e( 'Composer autoloader entry point', 'evolvewp-clientjourney' ); ?>
						</div>
						<div class="evolvewp-clientjourney-roadmap-arch-item">
							<code>includes/Ecosystem/Registry.php</code><br>
							<?php esc_html_e( 'First namespaced class — proof of concept', 'evolvewp-clientjourney' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- PHASE 1: Structure -->
	<div class="evolvewp-clientjourney-roadmap-phase">
		<div class="evolvewp-clientjourney-roadmap-phase-header" data-phase="phase1">
			<h2><?php esc_html_e( 'PHASE 1: Structure — loader & includes ✅', 'evolvewp-clientjourney' ); ?></h2>
			<div class="evolvewp-clientjourney-roadmap-phase-toggle">▶</div>
		</div>
		<div class="evolvewp-clientjourney-roadmap-phase-content" id="phase1-content" style="display:none;">
			<div class="evolvewp-clientjourney-roadmap-objective">
				<strong><?php esc_html_e( 'Objective:', 'evolvewp-clientjourney' ); ?></strong>
				<?php esc_html_e( 'Reorganise includes/ so the category of any file is obvious from its path. Namespace and migrate all Tier 1 classes.', 'evolvewp-clientjourney' ); ?>
			</div>
			<div class="evolvewp-clientjourney-roadmap-section">
				<div class="evolvewp-clientjourney-roadmap-tasks-grid">
					<div class="evolvewp-clientjourney-roadmap-tasks-column">
						<h4><?php esc_html_e( 'Migrated Classes (13 total)', 'evolvewp-clientjourney' ); ?></h4>
						<div class="evolvewp-clientjourney-roadmap-task">
							<input type="checkbox" id="t11" class="evolvewp-clientjourney-task-checkbox" checked disabled>
							<label for="t11"><?php esc_html_e( 'Ecosystem: Registry, Menu_Manager, Installer', 'evolvewp-clientjourney' ); ?></label>
						</div>
						<div class="evolvewp-clientjourney-roadmap-task">
							<input type="checkbox" id="t12" class="evolvewp-clientjourney-task-checkbox" checked disabled>
							<label for="t12"><?php esc_html_e( 'Core: Install, AJAX_Handler, Logger, Enhanced_Logger, Task_Scheduler', 'evolvewp-clientjourney' ); ?></label>
						</div>
						<div class="evolvewp-clientjourney-roadmap-task">
							<input type="checkbox" id="t13" class="evolvewp-clientjourney-task-checkbox" checked disabled>
							<label for="t13"><?php esc_html_e( 'Admin: Dashboard_Widgets, Notification_Bell, Uninstall_Feedback', 'evolvewp-clientjourney' ); ?></label>
						</div>
						<div class="evolvewp-clientjourney-roadmap-task">
							<input type="checkbox" id="t14" class="evolvewp-clientjourney-task-checkbox" checked disabled>
							<label for="t14"><?php esc_html_e( 'API: REST_Controller, Base_API', 'evolvewp-clientjourney' ); ?></label>
						</div>
					</div>
					<div class="evolvewp-clientjourney-roadmap-architecture-column">
						<h4><?php esc_html_e( 'Namespace Map', 'evolvewp-clientjourney' ); ?></h4>
						<div class="evolvewp-clientjourney-roadmap-arch-item">
							<code>EvolveWP ClientJourney\Ecosystem\</code> → <code>includes/Ecosystem/</code>
						</div>
						<div class="evolvewp-clientjourney-roadmap-arch-item">
							<code>EvolveWP ClientJourney\Core\</code> → <code>includes/Core/</code>
						</div>
						<div class="evolvewp-clientjourney-roadmap-arch-item">
							<code>EvolveWP ClientJourney\Admin\</code> → <code>includes/Admin/</code>
						</div>
						<div class="evolvewp-clientjourney-roadmap-arch-item">
							<code>EvolveWP ClientJourney\API\</code> → <code>includes/API/</code>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- PHASE 2: Templates (active) -->
	<div class="evolvewp-clientjourney-roadmap-phase evolvewp-clientjourney-roadmap-phase-active">
		<div class="evolvewp-clientjourney-roadmap-phase-header" data-phase="phase2">
			<h2><?php esc_html_e( 'PHASE 2: Structure — templates 🔄', 'evolvewp-clientjourney' ); ?></h2>
			<div class="evolvewp-clientjourney-roadmap-phase-toggle">▼</div>
		</div>
		<div class="evolvewp-clientjourney-roadmap-phase-content" id="phase2-content">
			<div class="evolvewp-clientjourney-roadmap-objective">
				<strong><?php esc_html_e( 'Objective:', 'evolvewp-clientjourney' ); ?></strong>
				<?php esc_html_e( 'Consolidate all templates into templates/ with predictable naming: pages → tabs → partials.', 'evolvewp-clientjourney' ); ?>
			</div>
			<div class="evolvewp-clientjourney-roadmap-section">
				<div class="evolvewp-clientjourney-roadmap-section-header">
					<h3><?php esc_html_e( 'Template Migration', 'evolvewp-clientjourney' ); ?></h3>
					<span class="evolvewp-clientjourney-priority-badge evolvewp-clientjourney-priority-high"><?php esc_html_e( 'HIGH PRIORITY', 'evolvewp-clientjourney' ); ?></span>
				</div>
				<div class="evolvewp-clientjourney-roadmap-tasks-grid">
					<div class="evolvewp-clientjourney-roadmap-tasks-column">
						<h4><?php esc_html_e( 'Tasks', 'evolvewp-clientjourney' ); ?></h4>
						<div class="evolvewp-clientjourney-roadmap-task">
							<input type="checkbox" id="t21" class="evolvewp-clientjourney-task-checkbox" checked>
							<label for="t21"><?php esc_html_e( 'Inventory all template files in FILE-INVENTORY.md', 'evolvewp-clientjourney' ); ?></label>
						</div>
						<div class="evolvewp-clientjourney-roadmap-task">
							<input type="checkbox" id="t22" class="evolvewp-clientjourney-task-checkbox" checked>
							<label for="t22"><?php esc_html_e( 'Move 15 development tab files to templates/tabs/development/', 'evolvewp-clientjourney' ); ?></label>
						</div>
						<div class="evolvewp-clientjourney-roadmap-task">
							<input type="checkbox" id="t23" class="evolvewp-clientjourney-task-checkbox" checked>
							<label for="t23"><?php esc_html_e( 'Move 17 UI library partials to templates/partials/ui-library/', 'evolvewp-clientjourney' ); ?></label>
						</div>
						<div class="evolvewp-clientjourney-roadmap-task">
							<input type="checkbox" id="t24" class="evolvewp-clientjourney-task-checkbox">
							<label for="t24"><?php esc_html_e( 'Add roadmap tab scaffold (this tab)', 'evolvewp-clientjourney' ); ?></label>
						</div>
						<div class="evolvewp-clientjourney-roadmap-task">
							<input type="checkbox" id="t25" class="evolvewp-clientjourney-task-checkbox">
							<label for="t25"><?php esc_html_e( 'Add architecture tab scaffold', 'evolvewp-clientjourney' ); ?></label>
						</div>
					</div>
					<div class="evolvewp-clientjourney-roadmap-architecture-column">
						<h4><?php esc_html_e( 'Structure', 'evolvewp-clientjourney' ); ?></h4>
						<div class="evolvewp-clientjourney-roadmap-arch-item">
							<code>templates/pages/</code><br>
							<?php esc_html_e( 'Full admin pages (one per menu item)', 'evolvewp-clientjourney' ); ?>
						</div>
						<div class="evolvewp-clientjourney-roadmap-arch-item">
							<code>templates/tabs/{page}/</code><br>
							<?php esc_html_e( 'Tab content (one per tab)', 'evolvewp-clientjourney' ); ?>
						</div>
						<div class="evolvewp-clientjourney-roadmap-arch-item">
							<code>templates/partials/</code><br>
							<?php esc_html_e( 'Reusable HTML fragments', 'evolvewp-clientjourney' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- PHASE 3: Assets -->
	<div class="evolvewp-clientjourney-roadmap-phase">
		<div class="evolvewp-clientjourney-roadmap-phase-header" data-phase="phase3">
			<h2><?php esc_html_e( 'PHASE 3: Structure — assets 📋', 'evolvewp-clientjourney' ); ?></h2>
			<div class="evolvewp-clientjourney-roadmap-phase-toggle">▶</div>
		</div>
		<div class="evolvewp-clientjourney-roadmap-phase-content" id="phase3-content" style="display:none;">
			<div class="evolvewp-clientjourney-roadmap-objective">
				<strong><?php esc_html_e( 'Objective:', 'evolvewp-clientjourney' ); ?></strong>
				<?php esc_html_e( 'Convert procedural asset files to Asset_Manager class. Add component CSS for roadmap and architecture tabs.', 'evolvewp-clientjourney' ); ?>
			</div>
			<div class="evolvewp-clientjourney-roadmap-section">
				<div class="evolvewp-clientjourney-roadmap-tasks-grid">
					<div class="evolvewp-clientjourney-roadmap-tasks-column">
						<h4><?php esc_html_e( 'Tasks', 'evolvewp-clientjourney' ); ?></h4>
						<div class="evolvewp-clientjourney-roadmap-task">
							<input type="checkbox" id="t31" class="evolvewp-clientjourney-task-checkbox">
							<label for="t31"><?php esc_html_e( 'Create Asset_Manager class', 'evolvewp-clientjourney' ); ?></label>
						</div>
						<div class="evolvewp-clientjourney-roadmap-task">
							<input type="checkbox" id="t32" class="evolvewp-clientjourney-task-checkbox">
							<label for="t32"><?php esc_html_e( 'Create assets/css/components/roadmap.css', 'evolvewp-clientjourney' ); ?></label>
						</div>
						<div class="evolvewp-clientjourney-roadmap-task">
							<input type="checkbox" id="t33" class="evolvewp-clientjourney-task-checkbox">
							<label for="t33"><?php esc_html_e( 'Create assets/js/admin/roadmap.js', 'evolvewp-clientjourney' ); ?></label>
						</div>
					</div>
					<div class="evolvewp-clientjourney-roadmap-architecture-column">
						<h4><?php esc_html_e( 'Key Files', 'evolvewp-clientjourney' ); ?></h4>
						<div class="evolvewp-clientjourney-roadmap-arch-item">
							<code>assets/Asset_Manager.php</code><br>
							<?php esc_html_e( 'Replaces manage-assets.php + queue-assets.php', 'evolvewp-clientjourney' ); ?>
						</div>
						<div class="evolvewp-clientjourney-roadmap-arch-item">
							<code>assets/css/components/</code><br>
							<?php esc_html_e( 'roadmap.css, flow-diagram.css, action-docs.css', 'evolvewp-clientjourney' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- PHASE 4: AI Standards -->
	<div class="evolvewp-clientjourney-roadmap-phase">
		<div class="evolvewp-clientjourney-roadmap-phase-header" data-phase="phase4">
			<h2><?php esc_html_e( 'PHASE 4: AI-Readable Code Standards 📋', 'evolvewp-clientjourney' ); ?></h2>
			<div class="evolvewp-clientjourney-roadmap-phase-toggle">▶</div>
		</div>
		<div class="evolvewp-clientjourney-roadmap-phase-content" id="phase4-content" style="display:none;">
			<div class="evolvewp-clientjourney-roadmap-objective">
				<strong><?php esc_html_e( 'Objective:', 'evolvewp-clientjourney' ); ?></strong>
				<?php esc_html_e( 'Every file has a standard header with ROLE, DEPENDS ON, CONSUMED BY, and DATA FLOW tags so AI can navigate the codebase without reading implementations.', 'evolvewp-clientjourney' ); ?>
			</div>
			<div class="evolvewp-clientjourney-roadmap-section">
				<div class="evolvewp-clientjourney-roadmap-tasks-grid">
					<div class="evolvewp-clientjourney-roadmap-tasks-column">
						<h4><?php esc_html_e( 'Tasks', 'evolvewp-clientjourney' ); ?></h4>
						<div class="evolvewp-clientjourney-roadmap-task">
							<input type="checkbox" id="t41" class="evolvewp-clientjourney-task-checkbox" checked>
							<label for="t41"><?php esc_html_e( 'Create FILE-HEADER-TEMPLATE.md', 'evolvewp-clientjourney' ); ?></label>
						</div>
						<div class="evolvewp-clientjourney-roadmap-task">
							<input type="checkbox" id="t42" class="evolvewp-clientjourney-task-checkbox">
							<label for="t42"><?php esc_html_e( 'Apply headers to all Core/ files', 'evolvewp-clientjourney' ); ?></label>
						</div>
						<div class="evolvewp-clientjourney-roadmap-task">
							<input type="checkbox" id="t43" class="evolvewp-clientjourney-task-checkbox">
							<label for="t43"><?php esc_html_e( 'Apply headers to all Ecosystem/ files', 'evolvewp-clientjourney' ); ?></label>
						</div>
						<div class="evolvewp-clientjourney-roadmap-task">
							<input type="checkbox" id="t44" class="evolvewp-clientjourney-task-checkbox">
							<label for="t44"><?php esc_html_e( 'Create Hook_Registry.php', 'evolvewp-clientjourney' ); ?></label>
						</div>
						<div class="evolvewp-clientjourney-roadmap-task">
							<input type="checkbox" id="t45" class="evolvewp-clientjourney-task-checkbox" checked>
							<label for="t45"><?php esc_html_e( 'Create NAMING-CONVENTIONS.md', 'evolvewp-clientjourney' ); ?></label>
						</div>
					</div>
					<div class="evolvewp-clientjourney-roadmap-architecture-column">
						<h4><?php esc_html_e( 'Reference', 'evolvewp-clientjourney' ); ?></h4>
						<div class="evolvewp-clientjourney-roadmap-arch-item">
							<code>docs/FILE-HEADER-TEMPLATE.md</code><br>
							<?php esc_html_e( 'Copy-paste headers for all 10 role types', 'evolvewp-clientjourney' ); ?>
						</div>
						<div class="evolvewp-clientjourney-roadmap-arch-item">
							<code>docs/NAMING-CONVENTIONS.md</code><br>
							<?php esc_html_e( 'All naming patterns documented', 'evolvewp-clientjourney' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<!-- Progress Summary -->
<div class="evolvewp-clientjourney-roadmap-summary">
	<h3><?php esc_html_e( 'Development Progress', 'evolvewp-clientjourney' ); ?></h3>
	<div class="evolvewp-clientjourney-roadmap-progress-bars">
		<div class="evolvewp-clientjourney-progress-item">
			<label><?php esc_html_e( 'Phase 0 — Composer & Namespaces', 'evolvewp-clientjourney' ); ?></label>
			<div class="evolvewp-clientjourney-progress-bar"><div class="evolvewp-clientjourney-progress-fill" style="width:100%; background: linear-gradient(90deg, #46b450, #28a745);"></div></div>
			<span class="evolvewp-clientjourney-progress-text"><?php esc_html_e( '5/5 tasks completed', 'evolvewp-clientjourney' ); ?></span>
		</div>
		<div class="evolvewp-clientjourney-progress-item">
			<label><?php esc_html_e( 'Phase 1 — Structure (loader & includes)', 'evolvewp-clientjourney' ); ?></label>
			<div class="evolvewp-clientjourney-progress-bar"><div class="evolvewp-clientjourney-progress-fill" style="width:100%; background: linear-gradient(90deg, #46b450, #28a745);"></div></div>
			<span class="evolvewp-clientjourney-progress-text"><?php esc_html_e( '13/13 classes migrated', 'evolvewp-clientjourney' ); ?></span>
		</div>
		<div class="evolvewp-clientjourney-progress-item">
			<label><?php esc_html_e( 'Phase 2 — Structure (templates)', 'evolvewp-clientjourney' ); ?></label>
			<div class="evolvewp-clientjourney-progress-bar"><div class="evolvewp-clientjourney-progress-fill" style="width:60%;"></div></div>
			<span class="evolvewp-clientjourney-progress-text"><?php esc_html_e( '3/5 tasks completed', 'evolvewp-clientjourney' ); ?></span>
		</div>
	</div>
</div>

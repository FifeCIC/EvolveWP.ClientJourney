<?php
/**
 * UI Library Pagination Controls Partial
 *
 * @package evolvewp-clientjourney/Admin/Views/Partials
 * @version 1.0.6
 */

defined('ABSPATH') || exit;
?>
<div class="evolvewp-clientjourney-ui-section">
    <h3><?php esc_html_e('Pagination Controls', 'evolvewp-clientjourney'); ?></h3>
    <p><?php esc_html_e('Navigation controls for paginated content and data tables.', 'evolvewp-clientjourney'); ?></p>
    
    <div class="pagination-showcase">
        <!-- Standard Pagination -->
        <div class="component-demo">
            <h4><?php esc_html_e('Standard Pagination', 'evolvewp-clientjourney'); ?></h4>
            <div class="pagination-container">
                <div class="pagination">
                    <a href="#" class="pagination-item disabled">
                        <span class="dashicons dashicons-arrow-left-alt2"></span>
                        <span class="pagination-text"><?php esc_html_e('Previous', 'evolvewp-clientjourney'); ?></span>
                    </a>
                    <a href="#" class="pagination-item active">1</a>
                    <a href="#" class="pagination-item">2</a>
                    <a href="#" class="pagination-item">3</a>
                    <span class="pagination-ellipsis">...</span>
                    <a href="#" class="pagination-item">12</a>
                    <a href="#" class="pagination-item">
                        <span class="pagination-text"><?php esc_html_e('Next', 'evolvewp-clientjourney'); ?></span>
                        <span class="dashicons dashicons-arrow-right-alt2"></span>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- evolvewp-clientjourney Legacy Pagination -->
        <div class="component-demo">
            <h4><?php esc_html_e('evolvewp-clientjourney Style Pagination', 'evolvewp-clientjourney'); ?></h4>
            <div class="evolvewp-clientjourney-pagination">
                <a href="#" class="evolvewp-clientjourney-pagination-prev disabled"><?php esc_html_e('Previous', 'evolvewp-clientjourney'); ?></a>
                <ul class="evolvewp-clientjourney-pagination-list">
                    <li><a href="#" class="evolvewp-clientjourney-pagination-item active">1</a></li>
                    <li><a href="#" class="evolvewp-clientjourney-pagination-item">2</a></li>
                    <li><a href="#" class="evolvewp-clientjourney-pagination-item">3</a></li>
                    <li><span class="evolvewp-clientjourney-pagination-item">...</span></li>
                    <li><a href="#" class="evolvewp-clientjourney-pagination-item">24</a></li>
                </ul>
                <a href="#" class="evolvewp-clientjourney-pagination-next"><?php esc_html_e('Next', 'evolvewp-clientjourney'); ?></a>
            </div>
        </div>
        
        <!-- Compact Pagination -->
        <div class="component-demo">
            <h4><?php esc_html_e('Compact Pagination', 'evolvewp-clientjourney'); ?></h4>
            <div class="pagination-container">
                <div class="pagination-compact">
                    <button class="pagination-button" disabled>
                        <span class="dashicons dashicons-arrow-left-alt2"></span>
                    </button>
                    <span class="pagination-info">Page 1 of 24</span>
                    <button class="pagination-button">
                        <span class="dashicons dashicons-arrow-right-alt2"></span>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Table Pagination with Page Size -->
        <div class="component-demo">
            <h4><?php esc_html_e('Table Pagination with Page Size', 'evolvewp-clientjourney'); ?></h4>
            <div class="pagination-container pagination-with-options">
                <div class="pagination-left">
                    <span class="pagination-status"><?php esc_html_e('Showing 1-10 of 243 items', 'evolvewp-clientjourney'); ?></span>
                </div>
                <div class="pagination-center">
                    <div class="pagination">
                        <a href="#" class="pagination-item disabled">
                            <span class="dashicons dashicons-arrow-left-alt2"></span>
                        </a>
                        <a href="#" class="pagination-item active">1</a>
                        <a href="#" class="pagination-item">2</a>
                        <a href="#" class="pagination-item">3</a>
                        <span class="pagination-ellipsis">...</span>
                        <a href="#" class="pagination-item">25</a>
                        <a href="#" class="pagination-item">
                            <span class="dashicons dashicons-arrow-right-alt2"></span>
                        </a>
                    </div>
                </div>
                <div class="pagination-right">
                    <div class="pagination-page-size">
                        <label for="page-size-select"><?php esc_html_e('Show:', 'evolvewp-clientjourney'); ?></label>
                        <select id="page-size-select" class="evolvewp-clientjourney-select evolvewp-clientjourney-select-small">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Infinite Scroll Pagination -->
        <div class="component-demo">
            <h4><?php esc_html_e('Infinite Scroll Pagination', 'evolvewp-clientjourney'); ?></h4>
            <div class="infinite-scroll-container">
                <div class="infinite-scroll-items">
                    <div class="infinite-scroll-item">
                        <h5><?php esc_html_e('Item 1', 'evolvewp-clientjourney'); ?></h5>
                        <p><?php esc_html_e('Example content for the first item in the infinite scroll list.', 'evolvewp-clientjourney'); ?></p>
                    </div>
                    <div class="infinite-scroll-item">
                        <h5><?php esc_html_e('Item 2', 'evolvewp-clientjourney'); ?></h5>
                        <p><?php esc_html_e('Example content for the second item in the infinite scroll list.', 'evolvewp-clientjourney'); ?></p>
                    </div>
                    <div class="infinite-scroll-item">
                        <h5><?php esc_html_e('Item 3', 'evolvewp-clientjourney'); ?></h5>
                        <p><?php esc_html_e('Example content for the third item in the infinite scroll list.', 'evolvewp-clientjourney'); ?></p>
                    </div>
                </div>
                <div class="infinite-scroll-loader">
                    <div class="infinite-scroll-spinner"></div>
                    <p><?php esc_html_e('Loading more items...', 'evolvewp-clientjourney'); ?></p>
                </div>
                <button class="evolvewp-clientjourney-button evolvewp-clientjourney-button-secondary infinite-scroll-button">
                    <?php esc_html_e('Load More', 'evolvewp-clientjourney'); ?>
                </button>
            </div>
        </div>
    </div>
    
    <?php
    // Add inline script for pagination functionality
    $evolvewp_cj_pagination_script = "
        jQuery(document).ready(function($) {
            // Pagination item click handling
            $('.pagination-item:not(.disabled), .evolvewp-clientjourney-pagination-item:not(.disabled)').on('click', function(e) {
                e.preventDefault();
                if (!$(this).hasClass('pagination-prev') && !$(this).hasClass('pagination-next') && 
                    !$(this).hasClass('evolvewp-clientjourney-pagination-prev') && !$(this).hasClass('evolvewp-clientjourney-pagination-next')) {
                    $(this).closest('ul, div').find('.active').removeClass('active');
                    $(this).addClass('active');
                }
            });
            
            // Load more button
            $('.infinite-scroll-button').on('click', function() {
                var button = $(this);
                var loader = $('.infinite-scroll-loader');
                
                button.hide();
                loader.show();
                
                setTimeout(function() {
                    loader.hide();
                    
                    var newItems = '';
                    for (var i = 4; i <= 6; i++) {
                        newItems += '<div class=\"infinite-scroll-item\">' +
                                    '<h5>Item ' + i + '</h5>' +
                                    '<p>Example content for item ' + i + ' in the infinite scroll list.</p>' +
                                    '</div>';
                    }
                    
                    $('.infinite-scroll-items').append(newItems);
                    button.show();
                }, 1500);
            });
            
            // Page size change
            $('#page-size-select').on('change', function() {
                alert('Page size changed to: ' + $(this).val() + ' items per page');
            });
        });
    ";
    
    wp_add_inline_script('jquery', $evolvewp_cj_pagination_script);
    ?>
</div>

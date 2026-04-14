jQuery(document).ready(function($) {
    'use strict';

    // Initialize repeater fields
    $('.evolvewp-clientjourney-repeater-container').each(function() {
        var $container = $(this);
        var $items = $container.find('.evolvewp-clientjourney-repeater-items');
        var $template = $container.find('.evolvewp-clientjourney-repeater-template');
        var itemIndex = $items.find('.evolvewp-clientjourney-repeater-item').length;

        // Make items sortable
        $items.sortable({
            handle: '.evolvewp-clientjourney-repeater-handle',
            placeholder: 'evolvewp-clientjourney-repeater-placeholder',
            update: function() {
                updateItemNumbers($items);
            }
        });

        // Add new item
        $container.on('click', '.evolvewp-clientjourney-repeater-add', function(e) {
            e.preventDefault();
            var template = $template.html();
            var newItem = template.replace(/\{\{INDEX\}\}/g, itemIndex);
            $items.append(newItem);
            itemIndex++;
            updateItemNumbers($items);
        });

        // Remove item
        $container.on('click', '.evolvewp-clientjourney-repeater-remove', function(e) {
            e.preventDefault();
            if (confirm('Are you sure you want to remove this item?')) {
                $(this).closest('.evolvewp-clientjourney-repeater-item').remove();
                updateItemNumbers($items);
            }
        });

        // Toggle item content
        $container.on('click', '.evolvewp-clientjourney-repeater-toggle', function(e) {
            e.preventDefault();
            var $item = $(this).closest('.evolvewp-clientjourney-repeater-item');
            $item.toggleClass('collapsed');
            $(this).find('.dashicons').toggleClass('dashicons-arrow-down-alt2 dashicons-arrow-up-alt2');
        });
    });

    // Update item numbers
    function updateItemNumbers($items) {
        $items.find('.evolvewp-clientjourney-repeater-item').each(function(index) {
            $(this).find('.evolvewp-clientjourney-repeater-number').text(index + 1);
        });
    }
});

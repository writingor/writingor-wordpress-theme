<?php
add_action('after_setup_theme', function () {
    remove_filter('the_content', 'wpautop');
});

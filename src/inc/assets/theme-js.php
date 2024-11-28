<?php
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('swiper',  writingor_assets() . 'libs/swiper/swiper-bundle.min.js', [], '10.3.0', 'in_footer');
    wp_enqueue_script('writingor', writingor_assets() . 'js/common.js', ['swiper'], WRITINGOR_VERSION, 'in_footer');
    
    wp_localize_script('writingor', 'writingorAjax', [
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('writingor_nonce')
    ]);
});

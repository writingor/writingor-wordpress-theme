<?php
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('swiper',  writingor_assets() . 'libs/swiper/swiper-bundle.min.css', [], '10.3.0', 'all');
    wp_enqueue_style('writingor',  writingor_assets() . 'css/common.css', ['swiper'], WRITINGOR_VERSION, 'all');
});

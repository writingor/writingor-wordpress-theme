<?php
function writingor_render_page_default($content = null, $before = '', $after = '') {
    $parts = [
        'begin' => [
            'document/begin',
            'header/header',
            'page/begin',
            'main/begin'
        ],
        'end' => [
            'main/end',
            'page/end',
            'footer/footer',
            'document/end'
        ]
    ];

    foreach ($parts['begin'] as $part) {
        writingor_part($part);
    }
    
    echo $before;
    $content ? print $content : the_content();
    echo $after;

    foreach ($parts['end'] as $part) {
        writingor_part($part);
    }
}

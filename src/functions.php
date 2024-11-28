<?php

/**
 * Base constants
 */
define('WRITINGOR_DIR', get_template_directory());
define('WRITINGOR_DIR_URI', get_template_directory_uri());
define('WRITINGOR_VERSION', wp_get_theme()->get('Version'));
define('WRITINGOR_TEXT_DOMAIN', wp_get_theme()->get('TextDomain'));

/**
 * Base functions
 */
function writingor_assets() { return WRITINGOR_DIR_URI.'/assets/'; }
function writingor_include($path) { include WRITINGOR_DIR.'/inc/'.$path.'.php'; }

function writingor_part($part, $data = null) {
    if ($data) {
        !is_array($data) && $data = ['data' => $data];
        $GLOBALS['writingor_part_data'] = $data;
    }

    is_string($part) && get_template_part("template-parts/$part");
    $data && $GLOBALS['writingor_part_data'] = null;
}

/**
 * Setup
 */
writingor_include('theme-support');
writingor_include('filter/content');

/**
 * Styles & Scripts
 */
writingor_include('assets/theme-css');
writingor_include('assets/theme-js');

/**
 * Renderers
 */
writingor_include('renderer/page-default');

/**
 * Contact Form
 */
writingor_include('ajax/contact-form');

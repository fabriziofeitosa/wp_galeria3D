<?php

// Registrar novo menu
register_nav_menus( array(
    'exhibition_menu'  => 'Menu Exposições',
) );

// Add class no item de menu
function add_menuclass_exhibition($ulclass) {
    return preg_replace('/<a/', '<a class="menu__link"', $ulclass, -1);
}
add_filter('wp_nav_menu','add_menuclass_exhibition');


/////////////////////////////////////////////////////

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

/////////////////////////////////////////////////////

// Add 5 minute update interval
// add_filter( 'wp_feed_cache_transient_lifetime',create_function('$a', 'return 300;') );
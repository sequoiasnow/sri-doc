<?php
// Define the web root of the site so that no confusion of site resources can
// result.
define('WEB_ROOT', 'http://localhost/~sequoiasnow/work/doc');

// Include all dependencies installed via composer.
require __DIR__ . '/vendor/autoload.php';

// Include the functions that transform strings.
require __DIR__ . '/php/functions.php';

// Include the parser for the YML data.
require __DIR__ . '/php/parse/parse.php';

// Include find functionality for the search capability.
require __DIR__ .'/php/find/find.php';

// Shows the path in order to GET the proper page.
$path = isset($_GET['path']) ? $_GET['path'] : '';


// Determine the last component of the path.
if ( preg_match('/\/?([^\/]+)(?:#.*)?(?:\?.*)?$/', $path, $matches) ) {
    $component = $matches[1];

    $data = find('items', $component);
    $dataType = 'item';

    if ( ! $data ) {
        $data = find('groups', $component);
        $dataType = 'item';
    }

    if ( ! $data ) {
        load_tmpl('404');
    } else {
        load_tmpl($dataType, $data);
    }
} else {
    load_tmpl('home');
}

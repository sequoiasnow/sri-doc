<?php
// Include all dependencies installed via composer.
require __DIR__ . '/vendor/autoload.php';

// Include the functions that transform strings.
require __DIR__ . '/php/functions.php';

// Include the parser for the YML data.
require __DIR__ . '/php/parse/parse.php';

// Shows the path in order to GET the proper page.
$path = $_GET['path'];

// The data to store the information from the item.
$data = new YamlData('items/example-item');

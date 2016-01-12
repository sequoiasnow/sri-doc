<?php
/**
 * Escapes a given string for html special chars.
 *
 * @param string $data
 *
 * @return string
 */
function __($data) {
    return htmlspecialchars($data);
}

/**
 * Escapes a string of html special chars and prints it.
 *
 * @param string $data
 */
function __p($data) {
    print __($data);
}

/**
 * Escapes a string and saves the effect into the string.
 *
 * @param string $data
 */
function __S(&$data) {
    $data = __($data);
}

/**
 * Escapes a given string for more than special chars but all convertable
 * entities.
 *
 * @param string $data
 *
 * @return string
 */
function __e($data) {
    return htmlentities($data);
}

/**
 * A method which transformes markdown into html.
 *
 * @param string $md
 *
 * @return string.
 */
function __MD($md) {
    return \Michelf\Markdown::defaultTransform($md);
}

/**
 * A methof which transforms yaml into data.
 *
 * @param string $contents
 *
 * @return array
 */
function __YML($contents) {
    return Symfony\Component\Yaml\Yaml::parse($contents);
}

/**
 * Gets the path to an image file from a potentially relative link.
 *
 * @param string $image
 *
 * @return string
 */
function get_image($image) {
    // Check if image is local.
    if ( strpos('http', $image) === 0 ) {
        return $image;
    }

    // Check if image is a relative link.
    if ( file_exists($image) ) {
        return $image;
    }

    return "data/images/$image";
}

/**
 * Gets the path to a file from a potentially relative link.
 *
 * @param string $image
 *
 * @return string
 */
function get_file($file) {
    // Check if image is local.
    if ( strpos('http', $file) === 0 ) {
        return $file;
    }

    // Check if image is a relative link.
    if ( file_exists($file) ) {
        return $file;
    }

    return "data/files/$file";
}

/**
 * Loads a template file with the given data if provided. A bit of a relative
 * type of include.
 *
 * @param string $file
 * @param mixed $data
 */
function load_tmpl($file, $data = array()) {
    $file = "tmpl/$file.php";

    if ( file_exists($file) ) {
        include $file;
    }
}

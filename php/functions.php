<?php
/**
 * Escapes a given string for html special chars. Preserves tags.
 *
 * @link http://stackoverflow.com/questions/1364933/htmlentities-in-php-but-preserving-html-tags
 *
 * @param string $htmlText
 * @param int $ent
 *
 * @return string
 */
function __($htmlText, $ent = 0) {
    if ( ! $ent ) $ent = ENT_COMPAT | ENT_HTML401;

    $matches = Array();
    $sep = '###HTMLTAG###';

    preg_match_all(":</{0,1}[a-z]+[^>]*>:i", $htmlText, $matches);

    $tmp = preg_replace(":</{0,1}[a-z]+[^>]*>:i", $sep, $htmlText);
    $tmp = explode($sep, $tmp);

    for ($i=0; $i<count($tmp); $i++)
        $tmp[$i] = htmlentities($tmp[$i], $ent, 'UTF-8', false);

    $tmp = join($sep, $tmp);

    for ($i=0; $i<count($matches[0]); $i++)
        $tmp = preg_replace(":$sep:", $matches[0][$i], $tmp, 1);

    return $tmp;
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
function __e($string) {
    return htmlentities($string);
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

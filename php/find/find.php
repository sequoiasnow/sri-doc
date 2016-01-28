<?php
require 'filters.php';

/**
 * Simply attempts to find if a component exists in the given folder. Only
 * searches one level of depth. The result is false or transformed into a
 * yaml data structure.
 *
 * @param string $kind,
 * @param string $name
 *
 * @return mixed
 */
function find($kind, $name) {
    if ( YamlData::isFile("$kind/$name") ) {
        return new YamlData("$kind/$name");
    }
    return false;
}

/**
 * Finds everything given an apropriate filter. The filters can be piped
 * together to form a more comprehensive lookup.
 */
function findFilter( $filter ) {
    if ( $filter & FILTER_GROUP || $filter & FILTER_ITEM ) {
        // Find the correct directory.
        $dirName = $filter & FILTER_GROUP ? 'groups' : 'items';

        $data = array();
        // Search through all files in folder.
        foreach ( scandir( ROOT_DIR . '/data/' . $dirName ) as $file ) {
            if ( YamlData::isFile("$dirName/$file") ) {
                $data[] = new YamlData("$dirName/$file");
            }
        }

        return $data;
    }
}

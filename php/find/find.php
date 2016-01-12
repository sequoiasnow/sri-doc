<?php
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

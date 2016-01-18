<?php
class YamlData implements ArrayAccess {
    /**
     * Determines if the relative path to a yml data file exists.
     *
     * @param string $relPath
     *
     * @return bool
     */
    public static function isFile($relPath) {
        return file_exists("data/$relPath.yml");
    }


    /**
     * At this point all data is completly raw. In order to format it, it will
     * go through a process of editing the existing data comparing what is to
     * what should be.
     *
     * This assumes all fields from the items yaml file are properly defined.
     */
    protected function render_data() {
        $data = $this->data;

        // Establish what simple string data is.
        $escapeKeys = array( 'name', 'description' );

        // Loop through base level data in order to render simple string data.
        foreach ( $escapeKeys as $key ) {
            if ( ! is_array($data[$key]) && isset( $data[$key] ) ) {
                __S($data[$key]);
            }
        }

        // Loop through the images to establish their variables.
        foreach ( $data['images'] as &$image ) {
            if ( isset( $image['name'] ) ) {
                __S($image['name']);
            }

            if ( isset( $image['description'] ) ) {
                __S($image['description']);
            }

            $image['file'] = get_image($image['file']);
        }

        // Establish the locations used, these are given by data items, and are
        // stored in the locations used.
        foreach ( $data['locations_used'] as &$location ) {
            if ( is_array($location) ) {
                if ( isset( $location['name'] ) ) {
                    __S($location['name']);
                }

                if ( isset( $location['description'] ) ) {
                    __S($location['description']);
                }
            } else {
                if ( self::isFile("items/$location") ) {
                    $location = new self("items/$location");
                }
            }
        }

        // The taks of the current item will be rendered from the task form.
        foreach ( $data['tasks'] as &$task ) {
            __S($task['name']);
            $method = '__';

            if ( isset($task['format']) && $task['format'] == 'markdown' ) {
                $method = '__MD';
            }

            $task['content'] = $method($task['content']);
        }

        // The files will be rendered into their proper orders using functions.
        foreach ( $data['files'] as &$file ) {
            if ( isset($file['name']) ) {
                __S($file['name']);
            }

            if ( isset($file['description']) ) {
                __S($file['description']);
            }

            $file['path'] = get_file($file['path']);
        }

        //  Transform the groups into individual yamldata objects. In so doing,
        //  recursion is invoked, each arent object is then added to a group
        //  of 'parents'
        if ( isset( $data['group'] ) ) {
            $data['group'] = new self('groups/' . $data['group']);
            $data['groups'] = array();

            $currentGroup = $data['group'];

            while ( $currentGroup ) {
                $data['groups'][] = $currentGroup;

                if ( isset( $currentGroup['group'] ) ) {
                    $currentGroup = $currentGroup['group'];
                } else {
                    break;
                }
            }

            // Set up a url to access the item at, this allows for a reference to
            // the current item.
            $url = '';

            foreach ( $data['groups'] as $group ) {
                $url .= $group->machine_name . '/';
            }

            $this->data['url'] = $url . '/' . $this->machine_name;
        } else {
            $this->data['url'] = $this->machine_name;
        }

        $this->data = $data;
    }

    /**
     * Inititates the data with a construction of a file. No file ending should
     * be applied, yml is the default ending
     *
     * @param string $file
     */
    public function __construct($file) {
        $this->machineName = $file;
        $this->content = file_get_contents("data/{$file}.yml");
        $this->data    = __YML($this->content);

        $this->render_data();
    }

    /**
     * Check if the data has an offset and if that offset is valid.
     *
     * @param string $key
     */
    public function offsetExists($key) {
        return isset($this->data[$key]);
    }

    /**
     * Get the contents of a given offset.
     *
     * @param string $key
     */
    public function offsetGet($key) {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }

    /**
     * Add a new offset with data accompanying it
     *
     * @param string $key
     * @param mixed $val
     */
    public function offsetSet($key, $val) {
        $this->data[$key] = $val;
    }

    /**
     * Unset and offset in the data array to remove it.
     *
     * @param string $key
     */
    public function offsetUnset($key) {
        unset($this->data[$key]);
    }
}

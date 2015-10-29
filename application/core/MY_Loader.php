<?php

(defined('BASEPATH')) or exit('No direct script access allowed');

/* load the HMVC_Loader class */
require APPPATH . 'third_party/HMVC/Loader.php';

define('MODPATH', APPPATH . 'modules' . DIRECTORY_SEPARATOR);

function modulePath() {
    $module = null;
    $traceback = debug_backtrace();

    foreach ($traceback as $element) {
        if ($element['file'] !== __FILE__) {
            $path = $element['file'];
            if (strpos($path, MODPATH) !== FALSE) {
                $trace = explode('/', str_replace(MODPATH, '', $path));
                $module = MODPATH . $trace[0] . DIRECTORY_SEPARATOR;
            } else {
                $module = APPPATH;
            }
            break;
        }
    }

    return $module;
}

class MY_Loader extends HMVC_Loader {

    public function __construct() {
        parent::__construct();
    }

    public $layout;

    /**
     * Setup Layout
     * 
     * @param string $view  layout path
     */
    public function set_layout($view) {
        $this->layout = $view;
    }

    /**
     * Get Layout 
     */
    public function get_layout() {
        return $this->layout;
    }

    /**
     * Get module path
     * 
     * @return string path of modles
     */
    public function modulePath() {
        return modulePath();
    }

    /**
     * Get view directory path
     * 
     * view directory path of module will be diferrent another
     * 
     * @return string view directory path
     */
    private function _viewpath() {
        $viewpath = $this->modulePath() . 'views' . DIRECTORY_SEPARATOR;

        return $viewpath;
    }

    /**
     * Get layout directory path
     * 
     * Layout directory contain all of layout file
     * 
     * @return string Layout directory path
     */
    public function _layoutPath() {
        $viewpath = $this->_viewpath();

        $layoutPath = $viewpath . 'layout' . DIRECTORY_SEPARATOR;

        return $layoutPath;
    }

    /**
     * Render View include the template layout
     * 
     * @param string $view - name or path of view
     * @param array $data - data push into view
     * @param array $input - data push into layout
     * @param array $layout - using another layout
     * @param bool $return - if true: get result to string; Else: express instant
     * 
     * @return string (if $return true)
     */
    public function render($view, $data = array(), $input = array(), $layout = null, $return = FALSE) {
        if (empty($layout)) {
            if (empty($this->layout)) {
                return parent::view($view, $data, $return);
            } else {
                $layout = $this->layout;
            }
        }

        $layout = 'layout' . DIRECTORY_SEPARATOR . $layout;

        $input['contentHtml'] = parent::view($view, $data, TRUE);

        return $this->load->view($layout, $input, $return);
    }
}
// End of class
    
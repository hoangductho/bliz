<?php

(defined('BASEPATH')) or exit('No direct script access allowed');

/* load the HMVC_Loader class */
require APPPATH . 'third_party/HMVC/Loader.php';

class MY_Loader extends HMVC_Loader {

    protected $layout;

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
     * Render Multiple 
     */
    public function render() {

        $controller = new My_Controller();
        echo $controller->layout();
    }

}

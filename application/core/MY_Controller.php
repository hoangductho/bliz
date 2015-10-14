<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MY_Controller extends CI_Controller {
    public $layoutPath = 'Default layout';
    
    public function layout() {
        return $this->layoutPath;
    }
}
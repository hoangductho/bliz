<?php

/**
 * Bliz 
 * An Opensource System Development from CI3
 * 
 * Copyright (c) 2015, Hoang Duc Tho
 * 
 * @copyright (c) 2015, Hoang Duc Tho (hoangductho.3690@gmail.com)
 * 
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * DBCreate Class
 * 
 * This Class contains function to setup database for application
 * 
 * @package         Bliz
 * @subpackage          Setup
 * @category        Database
 * @author          Tho Hoang
 * @link            https://github.com/hoangductho
 */
class Database extends CI_Controller {

    /**
     * Connection database
     * 
     * @todo try connection with database by config info. If connect error, this function will show form to input new config info 
     * 
     */
    public function index() {
        try {
            include(APPPATH . 'config/database.php');
            $pdo = new PDO($db['default']['hostname'], $db['default']['username'], $db['default']['password']);
        } catch (Exception $ex) {
            $this->load->view();
            var_dump($ex);
        }
    }

}

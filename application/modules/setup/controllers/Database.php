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

    public $layout = 'myLayout';

    /**
     * Contruct class
     */
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->set_layout('setup');
    }

    /**
     * Connection database
     * 
     * @todo try connection with database by config info. If connect error, this function will show form to input new config info 
     * 
     */
    public function index() {
        $default = array();
        $post = filter_input(INPUT_POST, 'default', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        if (!empty($post)) {
            $default = $post;
        } else {
            include(APPPATH . 'config/database.php');
            $default = $db[$active_group];
        }
        try {
//            $driver = $default['dbdriver'];
//            if ($driver == 'mysqli') {
//                $driver = 'mysql';
//            }
//            $dsn = "{$driver}:host={$default['hostname']};dbname={$default['database']};charset={$default['char_set']}";
//            $pdo = new PDO($dsn, $default['username'], $default['password']);
//            var_dump($this->load->database());
            var_dump($this->load->database());
            echo 'OK';
        } catch (Exception $ex) {
            $data['errmsg'] = $ex->getMessage();
            $data['db']['default'] = $default;
            $this->load->render('database', $data);
        }
    }

    /**
     * 
     */
}

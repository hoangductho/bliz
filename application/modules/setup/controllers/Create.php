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
 * Table Class
 * 
 * This Class contains function to setup database for application
 * 
 * @package         Bliz
 * @subpackage          Setup
 * @category        Database
 * @author          Tho Hoang
 * @link            https://github.com/hoangductho
 */
class Create extends CI_Controller {

    /**
     * list tables default of system
     * 
     * In list have tables name and query create table
     */
    public $tables;

    /**
     * Function Contructor
     */
    public function __construct() {
        parent::__construct();
        $this->tables = include_once modulePath() . 'config/tables.php';
        $this->load->model('SetupModel');
        $this->load->set_layout('setup');
    }

    /**
     * Setup Table Processing
     * 
     * @todo check tables list in database and create new table if not exists
     */
    public function table() {
        $post = filter_input(INPUT_POST, 'create', FILTER_DEFAULT, FILTER_VALIDATE_INT);
        $error = null;
        
        if (!empty($post) && $post) {
            foreach ($this->tables as $name => $query) {
                if($this->SetupModel->db->dbdriver == 'mongo') {
                    $create = $this->SetupModel->createCollection($name, $query);
                }else {
                    $create = $this->SetupModel->createTable($query);
                }

                if ($create['code']) {
                    $create['heading'] = "Create table $name error";
                    $error[] = $create;
                }
            }

            if (empty($error)) {
                redirect('/setup/create/account');
            }
        }

        $data['tables'] = array_keys($this->tables);
        $data['error'] = $error;
        $this->load->render('table', $data);
    }

    public function account() {
        var_dump(getallheaders(), apache_request_headers());
        var_dump($_SERVER);
    }

    public function regexp($string) {
        $options = array(
            'prefix' => 'abc',
            'suffix' => '@vienvong.vn',
            'modifier' => 'um',
            'min_length' => 4,
            'max_length' => 9,
        );

        $BLFilter = new BLFilter($options);
        $filter = $BLFilter->regular();

        if($filter['ok']) {
            $options['regexp'] = $filter['data'];
            $regexp = array('options' => $options);
            var_dump($filter['data'], filter_var($string.'@vienvong.com', FILTER_VALIDATE_EMAIL, $regexp));
        }else {
            var_dump($filter);
        }
    }
}

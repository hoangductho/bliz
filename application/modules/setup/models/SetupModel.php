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
class SetupModel extends CI_Model {

    /**
     * Class Constructor
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Create Tables
     * 
     * @param query create table
     * 
     * @return bool insert result
     */
    public function createTable($query) {
        $this->db->simple_query($query);
        return $this->db->error();
    }

}

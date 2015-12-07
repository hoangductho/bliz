<?php

/**
 * User: thohoang
 * Date: 12/7/15
 * Time: 3:36 PM
 *
 * Class SessionModel
 *
 * @Description: Read-write session data of user
 *
 * @Property:
 *  - table - table name storage session
 */
class SessionModel extends CI_Model
{
    /**
     * Define name of table storage account
     */
    private $table = 'session';

    /**
     * Contructor
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Get table name
     *
     * @return string table name
     */
    public function tableName() {
        return $this->table;
    }
}
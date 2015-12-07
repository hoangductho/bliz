<?php

/**
 * User: thohoang
 * Date: 12/7/15
 * Time: 3:04 PM
 *
 * Class AccountModel
 *
 * @Description:Read-Write data from table account
 *
 * @Property:
 *  - table - name of table
 */
class AccountModel extends CI_Model {
    /**
     * Define name of table storage account
     */
    private $table = 'account';

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

    /**
     * Create Account
     *
     * @param array $data account data
     *
     * @return array create result detail
     */
    public function createAccount($data) {

    }
}
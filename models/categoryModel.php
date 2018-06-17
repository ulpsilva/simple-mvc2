<?php

/**
 * Category model
 * Table name: categories
 *
 * Developer: Lakmal Silva
 */
class CategoryModel extends Model {

    public $id;
    public $name;

    function __construct() {
        Parent::__construct();
    }

    /**
     * Create category
     * @return bool|mixed
     */
    public function create() {
        $query = "INSERT INTO `categories`(`name`) VALUES ('"
            . $this->escape_string($this->name) . "'"
            .")";

        if ($this->query($query)) {
            return $this->last_query_id();
        } else {
            return false;
        }
    }

    /**
     * Check name
     * @return bool
     */
    public function checkName() {
        $result_set = $this->query("SELECT * FROM categories WHERE `name` = '" . $this->escape_string($this->name) . "' LIMIT 1");
        if (mysqli_num_rows($result_set)) {
            return true;
        } else {
            return false;
        }
    }
}
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
     * Find all categories.
     * @return array|bool
     */
    public function findAll() {
        $result_set = $this->query("SELECT * FROM categories");
        $the_obj_array = array();

        if ($result_set) {
            while ($row = mysqli_fetch_array($result_set)) {
                $the_obj_array[] = $this->instantiation(new CategoryModel(), $row);
            }
            return $the_obj_array;
        } else {
            return false;
        }
    }

    /**
     * Find category by id
     * @param $id int
     * @return bool|Model
     */
    public function findById($id) {
        $result_set = $this->query("SELECT * FROM categories WHERE id = $id LIMIT 1");
        if (mysqli_num_rows($result_set)) {
            $found_category = mysqli_fetch_array($result_set);
            return $this->instantiation(new CategoryModel(), $found_category);
        } else {
            return false;
        }
    }

    /**
     * Update category
     * @return bool|mixed
     */
    public function update() {
        $query = "UPDATE `categories` SET "
            ."`name`='" . $this->escape_string($this->name) . "' "
            ."WHERE `id`=" . $this->escape_string($this->id);

        if ($this->query($query)) {
            return $this->id;
        } else {
            return false;
        }
    }

    /**
     * Delete category
     * @return bool|mysqli_result
     */
    public function delete() {
        $query = "DELETE FROM `categories` "
            ."WHERE `id`=" . $this->escape_string($this->id);

        return $this->query($query);
    }

    /**
     * Check name
     * @return bool|int
     */
    public function checkName() {
        $result_set = $this->query("SELECT * FROM categories WHERE `name` = '" . $this->escape_string($this->name) . "' LIMIT 1");
        if (mysqli_num_rows($result_set)) {
            $found_category = mysqli_fetch_array($result_set);
            return $found_category['id'];
        } else {
            return false;
        }
    }
}
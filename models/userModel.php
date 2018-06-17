<?php

/**
 * User model
 * Table name: users
 *
 * Developer: Lakmal Silva
 */
class UserModel extends Model {

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    function __construct() {
        Parent::__construct();
    }

    /**
     * Find all users.
     * @return array|bool
     */
    public function findAll() {
        $result_set = $this->query("SELECT * FROM users");
        $the_obj_array = array();

        if ($result_set) {
            while ($row = mysqli_fetch_array($result_set)) {
                $the_obj_array[] = $this->instantiation(new UserModel(), $row);
            }
            return $the_obj_array;
        } else {
            return false;
        }
    }

    /**
     * Find user by id
     * @param $id int
     * @return bool|Model
     */
    public function findById($id) {
        $result_set = $this->query("SELECT * FROM users WHERE id = $id LIMIT 1");
        if (mysqli_num_rows($result_set)) {
            $found_user = mysqli_fetch_array($result_set);
            return $this->instantiation(new UserModel(), $found_user);
        } else {
            return false;
        }
    }

    /**
     * Create user
     * @return bool|mixed
     */
    public function create() {
        $query = "INSERT INTO `users`(`username`, `password`, `first_name`, `last_name`) VALUES ('"
            . $this->escape_string($this->username) . "','"
            . $this->escape_string(sha1($this->password)) . "','"
            . $this->escape_string($this->first_name) . "','"
            . $this->escape_string($this->last_name) . "'"
            .")";

        if ($this->query($query)) {
            return $this->last_query_id();
        } else {
            return false;
        }
    }

    /**
     * Update user
     * @return bool|mixed
     */
    public function update() {
        $query = "UPDATE `users` SET "
            ."`username`='" . $this->escape_string($this->username) . "',"
            ."`password`='" . $this->escape_string(sha1($this->password)) . "',"
            ."`first_name`='" . $this->escape_string($this->first_name) . "',"
            ."`last_name`='" . $this->escape_string($this->last_name) . "' "
            ."WHERE `id`=" . $this->escape_string($this->id);

        if ($this->query($query)) {
            return $this->last_query_id();
        } else {
            return false;
        }
    }

    /**
     * Delete user
     * @return bool|mysqli_result
     */
    public function delete() {
        $query = "DELETE FROM `users` "
            ."WHERE `id`=" . $this->escape_string($this->id);

        return $this->query($query);
    }

    /**
     * Check username
     * @return bool
     */
    public function checkUsername() {
        $result_set = $this->query("SELECT * FROM users WHERE `username` = '" . $this->escape_string($this->username) . "' LIMIT 1");
        if (mysqli_num_rows($result_set)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Login user
     * @return bool|Model
     */
    public function login() {
        $result_set = $this->query("SELECT * FROM users WHERE username = '" . $this->escape_string($this->username) . "' AND password = '" . $this->escape_string(sha1($this->password)) . "' LIMIT 1");
        if (mysqli_num_rows($result_set)) {
            $found_user = mysqli_fetch_array($result_set);
            return $this->instantiation(new UserModel(), $found_user);
        } else {
            return false;
        }
    }

}
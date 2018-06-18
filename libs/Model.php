<?php

/**
 * Base model class.
 *
 * Developer: Lakmal Silva
 */
class Model {

    // mysql connection
    public $connection;

    function __construct() {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->connection->connect_errno) {
            die("Database connection failed");
        }
    }

    /**
     * Querying the database.
     * @param $sql string
     * @return bool|mysqli_result
     */
    public function query($sql) {
        $result = mysqli_query($this->connection, $sql);
        return $result;
    }

    /**
     * Get last insert/update id
     * @return mixed
     */
    public function last_query_id() {
        return $this->connection->insert_id;
    }

    /**
     * Escape string for sql query.
     * @param $string string
     * @return string
     */
    public function escape_string($string) {
        return mysqli_real_escape_string($this->connection, trim($string));
    }

    /**
     * Assign database recode values to object attributes.
     * @param $obj Model
     * @param $the_record array
     * @return Model
     */
    public function instantiation($obj, $the_record) {
        foreach ($the_record as $the_attribute => $value) {
            if ($obj->has_the_attribute($the_attribute)) {
                $obj->$the_attribute = $value;
            }
        }
        return $obj;
    }

    /**
     * Is object has the attribute.
     * @param $the_attribute string
     * @return bool
     */
    public function has_the_attribute($the_attribute) {
        $obj_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $obj_properties);
    }
}
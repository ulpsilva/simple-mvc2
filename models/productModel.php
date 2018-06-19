<?php

/**
 * Product model
 * Table name: products
 *
 * Developer: Lakmal Silva
 */
class ProductModel extends Model
{

    public $id;
    public $title;
    public $description;
    public $quantity;
    public $price;
    public $image;
    public $category_id;

    function __construct()
    {
        Parent::__construct();
    }

    /**
     * Create product
     * @return bool|mixed
     */
    public function create()
    {
        $query = "INSERT INTO `products`(`title`, `description`, `quantity`, `price`, `image`, `category_id`) VALUES ('"
            . $this->escape_string($this->title) . "','"
            . $this->escape_string($this->description) . "','"
            . $this->escape_string($this->quantity) . "','"
            . $this->escape_string($this->price) . "','"
            . $this->escape_string($this->image) . "','"
            . $this->escape_string($this->category_id) . "'"
            . ")";

        if ($this->query($query)) {
            return $this->last_query_id();
        } else {
            return false;
        }
    }

    /**
     * Find all products.
     * @return array|bool
     */
    public function findAll()
    {
        $result_set = $this->query("SELECT * FROM products");
        $the_obj_array = array();

        if ($result_set) {
            while ($row = mysqli_fetch_array($result_set)) {
                $the_obj_array[] = $this->instantiation(new ProductModel(), $row);
            }
            return $the_obj_array;
        } else {
            return false;
        }
    }

    /**
     * Find product by id
     * @param $id int
     * @return bool|Model
     */
    public function findById($id)
    {
        $result_set = $this->query("SELECT * FROM products WHERE id = $id LIMIT 1");
        if (mysqli_num_rows($result_set)) {
            $found_product = mysqli_fetch_array($result_set);
            return $this->instantiation(new ProductModel(), $found_product);
        } else {
            return false;
        }
    }

    /**
     * Update product
     * @return bool|mixed
     */
    public function update()
    {
        $query = "UPDATE `products` SET "
            . "`title`='" . $this->escape_string($this->title) . "',"
            . "`description`='" . $this->escape_string($this->description) . "',"
            . "`quantity`='" . $this->escape_string($this->quantity) . "',"
            . "`price`='" . $this->escape_string($this->price) . "',"
            . "`image`='" . $this->escape_string($this->image) . "',"
            . "`category_id`='" . $this->escape_string($this->category_id) . "' "
            . "WHERE `id`=" . $this->escape_string($this->id);

        if ($this->query($query)) {
            return $this->id;
        } else {
            return false;
        }
    }

    /**
     * Delete product
     * @return bool|mysqli_result
     */
    public function delete()
    {
        $query = "DELETE FROM `products` "
            . "WHERE `id`=" . $this->escape_string($this->id);

        return $this->query($query);
    }
}
<?php

/**
 * Article model
 * Table name: articles
 *
 * Developer: Lakmal Silva
 */
class ArticleModel extends Model
{

    public $id;
    public $title;
    public $content;
    public $category_id;

    function __construct()
    {
        Parent::__construct();
    }

    /**
     * Create article
     * @return bool|mixed
     */
    public function create()
    {
        $query = "INSERT INTO `articles`(`title`, `content`, `category_id`) VALUES ('"
            . $this->escape_string($this->title) . "','"
            . $this->escape_string($this->content) . "','"
            . $this->escape_string($this->category_id) . "'"
            . ")";

        if ($this->query($query)) {
            return $this->last_query_id();
        } else {
            return false;
        }
    }

    /**
     * Find all articles.
     * @return array|bool
     */
    public function findAll()
    {
        $result_set = $this->query("SELECT * FROM articles");
        $the_obj_array = array();

        if ($result_set) {
            while ($row = mysqli_fetch_array($result_set)) {
                $the_obj_array[] = $this->instantiation(new ArticleModel(), $row);
            }
            return $the_obj_array;
        } else {
            return false;
        }
    }

    /**
     * Find article by id
     * @param $id int
     * @return bool|Model
     */
    public function findById($id)
    {
        $result_set = $this->query("SELECT * FROM articles WHERE id = $id LIMIT 1");
        if (mysqli_num_rows($result_set)) {
            $found_article = mysqli_fetch_array($result_set);
            return $this->instantiation(new ArticleModel(), $found_article);
        } else {
            return false;
        }
    }

    /**
     * Update article
     * @return bool|mixed
     */
    public function update()
    {
        $query = "UPDATE `articles` SET "
            . "`title`='" . $this->escape_string($this->title) . "',"
            . "`content`='" . $this->escape_string($this->content) . "',"
            . "`category_id`='" . $this->escape_string($this->category_id) . "' "
            . "WHERE `id`=" . $this->escape_string($this->id);

        if ($this->query($query)) {
            return $this->id;
        } else {
            return false;
        }
    }

    /**
     * Delete article
     * @return bool|mysqli_result
     */
    public function delete()
    {
        $query = "DELETE FROM `articles` "
            . "WHERE `id`=" . $this->escape_string($this->id);

        return $this->query($query);
    }
}
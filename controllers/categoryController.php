<?php
require "models/categoryModel.php";

/**
 * Category controller
 *
 * Developer: Lakmal Silva
 */
class CategoryController extends Controller {

    function __construct() {
        Parent::__construct();
    }

    /**
     * Create new category
     */
    function newAction() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $category = new CategoryModel();
            $category->name = $_POST['name'];

            if ($category->checkName()) {
                $this->view->error = "Name already exists.";
                $this->view->render("category/new");
            } else {
                if ($category->create()) {
                    Session::addFlash("success", "Category created.");
                    Helper::redirect("category");
                } else {
                    $this->view->error = "Category creation failed.";
                    $this->view->render("category/new");
                }
            }
        } else {
            $this->view->render("category/new");
        }
    }

    /**
     * Category list
     */
    function indexAction() {
        $this->view->render("category/index");
    }
}
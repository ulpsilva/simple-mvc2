<?php
require "models/productModel.php";
require "models/categoryModel.php";

/**
 * Index page controller
 *
 * Developer: Lakmal Silva
 */
class IndexController extends Controller
{

    function __construct()
    {
        Parent::__construct();
    }

    /**
     * Index page
     */
    function indexAction()
    {
        $product = new ProductModel();
        $category = new CategoryModel();
        $this->view->categories = $category->findAll();
        $this->view->products = $product->findAll();
        $this->view->render("index/index");
    }
}
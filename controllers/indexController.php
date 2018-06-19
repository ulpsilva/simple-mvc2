<?php
require "models/articleModel.php";
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
        $article = new ArticleModel();
        $category = new CategoryModel();
        $this->view->categories = $category->findAll();
        $this->view->articles = $article->findAll();
        $this->view->render("index/index");
    }
}
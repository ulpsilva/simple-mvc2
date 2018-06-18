<?php
require "models/articleModel.php";
require "models/categoryModel.php";

/**
 * Article controller
 *
 * Developer: Lakmal Silva
 */
class ArticleController extends Controller
{

    function __construct()
    {
        Parent::__construct();
    }

    /**
     * Create new article
     */
    function newAction()
    {
        Helper::guestRedirect();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $article = new ArticleModel();
            $article->title = $_POST['title'];
            $article->content = $_POST['content'];
            $article->category_id = $_POST['category_id'];

            if ($article->create()) {
                Session::addFlash("success", "Article created.");
                Helper::redirect("article");
            } else {
                $this->view->error = "Article creation failed.";
                $this->view->render("article/new");
            }
        } else {
            $this->view->render("article/new");
        }
    }

    /**
     * Article list
     */
    function indexAction()
    {
        Helper::guestRedirect();
        $article = new ArticleModel();
        $this->view->articles = $article->findAll();
        $this->view->render("article/index");
    }

    /**
     * Show article
     * @param $id int
     */
    function showAction($id = 0)
    {
        Helper::guestRedirect();
        $article = new ArticleModel();
        $article = $article->findById($id);

        if ($article) {
            $this->view->article = $article;
            $this->view->render("article/show");
        } else {
            Helper::redirect("error");
        }
    }

    /**
     * Update article
     * @param $id int
     */
    function editAction($id)
    {
        Helper::guestRedirect();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $article = new ArticleModel();
            $article->id = $_POST['id'];
            $article->title = $_POST['title'];
            $article->content = $_POST['content'];
            $article->category_id = $_POST['category_id'];

            if ($article->update()) {
                Session::addFlash("success", "Article updated.");
                Helper::redirect("article/edit/" . $id);
            } else {
                $this->view->error = "Article update failed.";
                $this->view->article = $article;
                $this->view->render("article/edit");
            }

        } else {
            $article = new ArticleModel();
            $article = $article->findById($id);

            if ($article) {
                $this->view->article = $article;
                $this->view->render("article/edit");
            } else {
                Helper::redirect("error");
            }
        }
    }

    /**
     * Delete article
     * @param $id int
     */
    function deleteAction($id)
    {
        Helper::guestRedirect();
        $article = new ArticleModel();
        $article->id = $id;

        if ($article->delete()) {
            Session::addFlash('success', "Article deleted.");
        } else {
            Session::addFlash('error', "Article delete failed.");
        }
        Helper::redirect("article");
    }
}
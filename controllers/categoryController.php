<?php
require "models/categoryModel.php";

/**
 * Category controller
 *
 * Developer: Lakmal Silva
 */
class CategoryController extends Controller
{

    function __construct()
    {
        Parent::__construct();
    }

    /**
     * Create new category
     */
    function newAction()
    {
        Helper::guestRedirect();
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
    function indexAction()
    {
        Helper::guestRedirect();
        $category = new CategoryModel();
        $this->view->categories = $category->findAll();
        $this->view->render("category/index");
    }

    /**
     * Show category
     * @param $id int
     */
    function showAction($id = 0)
    {
        Helper::guestRedirect();
        $category = new CategoryModel();
        $category = $category->findById($id);

        if ($category) {
            $this->view->category = $category;
            $this->view->render("category/show");
        } else {
            Helper::redirect("error");
        }
    }

    /**
     * Update category
     * @param $id int
     */
    function editAction($id)
    {
        Helper::guestRedirect();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $category = new CategoryModel();
            $category->id = $_POST['id'];
            $category->name = $_POST['name'];

            $checkName = $category->checkName();

            if ($checkName && $checkName != $id) {
                $this->view->error = "Name already exists.";
                $this->view->category = $category;
                $this->view->render("category/edit");
            } else {
                if ($category->update()) {
                    Session::addFlash("success", "Category updated.");
                    Helper::redirect("category/edit/" . $id);
                } else {
                    $this->view->error = "Category update failed.";
                    $this->view->category = $category;
                    $this->view->render("category/edit");
                }
            }
        } else {
            $category = new CategoryModel();
            $category = $category->findById($id);

            if ($category) {
                $this->view->category = $category;
                $this->view->render("category/edit");
            } else {
                Helper::redirect("error");
            }
        }
    }

    /**
     * Delete category
     * @param $id int
     */
    function deleteAction($id)
    {
        Helper::guestRedirect();
        $category = new CategoryModel();
        $category->id = $id;

        if ($category->delete()) {
            Session::addFlash('success', "Category deleted.");
        } else {
            Session::addFlash('error', "Category delete failed.");
        }
        Helper::redirect("category");
    }
}
<?php
require "models/productModel.php";
require "models/categoryModel.php";

/**
 * Product controller
 *
 * Developer: Lakmal Silva
 */
class ProductController extends Controller
{

    function __construct()
    {
        Parent::__construct();
    }

    /**
     * Create new product
     */
    function newAction()
    {
        Helper::guestRedirect();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $product = new ProductModel();
            $product->title = $_POST['title'];
            $product->description = $_POST['description'];
            $product->quantity = $_POST['quantity'];
            $product->price = $_POST['price'];
            $product->image = $_POST['image'];
            $product->category_id = $_POST['category_id'];

            if ($product->create()) {
                Session::addFlash("success", "Product created.");
                Helper::redirect("product");
            } else {
                $category = new CategoryModel();
                $this->view->categories = $category->findAll();
                $this->view->error = "Product creation failed.";
                $this->view->render("product/new");
            }
        } else {
            $category = new CategoryModel();
            $this->view->categories = $category->findAll();
            $this->view->render("product/new");
        }
    }

    /**
     * Product list
     */
    function indexAction()
    {
        Helper::guestRedirect();
        $product = new ProductModel();
        $category = new CategoryModel();
        $this->view->categories = $category->findAll();
        $this->view->products = $product->findAll();
        $this->view->render("product/index");
    }

    /**
     * Show product
     * @param $id int
     */
    function showAction($id = 0)
    {
        Helper::guestRedirect();
        $product = new ProductModel();
        $product = $product->findById($id);

        if ($product) {
            $category = new CategoryModel();
            $this->view->categories = $category->findAll();
            $this->view->product = $product;
            $this->view->render("product/show");
        } else {
            Helper::redirect("error");
        }
    }

    /**
     * Update product
     * @param $id int
     */
    function editAction($id)
    {
        Helper::guestRedirect();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $product = new ProductModel();
            $product->id = $_POST['id'];
            $product->title = $_POST['title'];
            $product->description = $_POST['description'];
            $product->quantity = $_POST['quantity'];
            $product->price = $_POST['price'];
            $product->image = $_POST['image'];
            $product->category_id = $_POST['category_id'];

            if ($product->update()) {
                Session::addFlash("success", "Product updated.");
                Helper::redirect("product/edit/" . $id);
            } else {
                $category = new CategoryModel();
                $this->view->categories = $category->findAll();
                $this->view->error = "Product update failed.";
                $this->view->product = $product;
                $this->view->render("product/edit");
            }

        } else {
            $product = new ProductModel();
            $product = $product->findById($id);

            if ($product) {
                $category = new CategoryModel();
                $this->view->categories = $category->findAll();
                $this->view->product = $product;
                $this->view->render("product/edit");
            } else {
                Helper::redirect("error");
            }
        }
    }

    /**
     * Delete product
     * @param $id int
     */
    function deleteAction($id)
    {
        Helper::guestRedirect();
        $product = new ProductModel();
        $product->id = $id;

        if ($product->delete()) {
            Session::addFlash('success', "Product deleted.");
        } else {
            Session::addFlash('error', "Product delete failed.");
        }
        Helper::redirect("product");
    }
}
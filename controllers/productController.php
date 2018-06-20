<?php

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
        Helper::userRedirect();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $product = new ProductModel();
            $product->title = $_POST['title'];
            $product->description = $_POST['description'];
            $product->quantity = $_POST['quantity'];
            $product->price = $_POST['price'];
            $product->category_id = $_POST['category_id'];

            $target_dir = "public/uploads/products/";
            $temp = explode(".", $_FILES["image"]["name"]);
            $target_file = $target_dir . round(microtime(true)) . '.' . end($temp);

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    $category = new CategoryModel();
                    $this->view->categories = $category->findAll();
                    $this->view->error = "Sorry, only JPG, JPEG, PNG & GIF images are allowed.";
                    $this->view->render("product/new");
                } else {
                    $product->image = $target_file;

                    if ($product->create()) {
                        Session::addFlash("success", "Product created.");
                        Helper::redirect("product");
                    } else {
                        $category = new CategoryModel();
                        $this->view->categories = $category->findAll();
                        $this->view->error = "Product creation failed.";
                        $this->view->render("product/new");
                    }
                }

            } else {
                $category = new CategoryModel();
                $this->view->categories = $category->findAll();
                $this->view->error = "Sorry, there was an error uploading your image.";
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
        Helper::userRedirect();
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
        Helper::userRedirect();
        $product = new ProductModel();
        $product = $product->findById($id);

        if ($product) {
            $category = new CategoryModel();
            $this->view->category = $category->findById($product->category_id);
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
    function editAction($id = 0)
    {
        Helper::guestRedirect();
        Helper::userRedirect();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $product = new ProductModel();
            $product->id = $_POST['id'];
            $product->title = $_POST['title'];
            $product->description = $_POST['description'];
            $product->quantity = $_POST['quantity'];
            $product->price = $_POST['price'];
            $product->category_id = $_POST['category_id'];

            if ($_FILES["image"]["size"] != 0) {
                $target_dir = "public/uploads/products/";
                $temp = explode(".", $_FILES["image"]["name"]);
                $target_file = $target_dir . round(microtime(true)) . '.' . end($temp);

                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    // Allow certain file formats
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif"
                    ) {
                        $category = new CategoryModel();
                        $this->view->categories = $category->findAll();
                        $this->view->error = "Sorry, only JPG, JPEG, PNG & GIF images are allowed.";
                        $this->view->product = $product;
                        $this->view->render("product/edit");
                    } else {
                        $product->image = $target_file;

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
                    }

                } else {

                    $category = new CategoryModel();
                    $this->view->categories = $category->findAll();
                    $this->view->error = "Sorry, there was an error uploading your image.";
                    $this->view->product = $product;
                    $this->view->render("product/edit");
                }
            } else {
                $product->image = $_POST['image_old'];

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
        Helper::userRedirect();
        $product = new ProductModel();
        $product->id = $id;

        if ($product->delete()) {
            Session::addFlash('success', "Product deleted.");
        } else {
            Session::addFlash('error', "Product delete failed.");
        }
        Helper::redirect("product");
    }

    /**
     * More info page
     * @param $id int
     */
    function infoAction($id = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $product = new ProductModel();
            $product = $product->findById($_POST['id']);

            $result = Session::setToCart($product, $_POST['quantity']);

            if ($result == 1) {
                Session::addFlash('success', "Shopping cart updated");
            } else if ($result == -1) {
                Session::addFlash('error', "Requested quantity not available");
            } else {
                Session::addFlash('error', "Shopping cart update failed");
            }
            Helper::redirect("product/info/" . $id);
        } else {
            $product = new ProductModel();
            $product = $product->findById($id);

            if ($product) {
                $category = new CategoryModel();
                $this->view->category = $category->findById($product->category_id);
                $this->view->product = $product;
                $this->view->render("product/info");
            } else {
                Helper::redirect("error");
            }
        }

    }
}
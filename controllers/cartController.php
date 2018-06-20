<?php

/**
 * Shopping cart controller
 *
 * Developer: Lakmal Silva
 */
class CartController extends Controller
{

    function __construct()
    {
        Parent::__construct();
    }

    /**
     * Shopping cart list
     */
    function indexAction()
    {
        $this->view->items = Session::getCart();
        $this->view->total = Session::getCartTotal();
        $this->view->render("cart/index");
    }

    /**
     * Delete shopping cart item
     * @param $id int
     */
    function deleteAction($id)
    {
        if (Session::deleteCartItem($id)) {
            Session::addFlash('success', "Item removed");
        } else {
            Session::addFlash('success', "Item removing failed");
        }
        Helper::redirect("cart/index");
    }

    /**
     * Edit shopping cart item
     * @param $id int
     */
    function editAction($id)
    {
        if (!Session::getCartItem($id)) {
            Helper::redirect("error");
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $product = new ProductModel();
            $product = $product->findById($_POST['id']);

            $result = Session::editCartItem($product, $_POST['quantity']);

            if ($result == 1) {
                Session::addFlash('success', "Shopping cart updated");
                Helper::redirect("cart");
            } else if ($result == -1) {
                Session::addFlash('error', "Requested quantity not available");
                $this->view->item = Session::getCartItem($id);
                $this->view->render("cart/edit");
            } else {
                Session::addFlash('error', "Shopping cart update failed");
                $this->view->item = Session::getCartItem($id);
                $this->view->render("cart/edit");
            }
        } else {
            $this->view->item = Session::getCartItem($id);
            $this->view->render("cart/edit");
        }
    }
}
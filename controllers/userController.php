<?php
require "models/userModel.php";

/**
 * User controller
 *
 * Developer: Lakmal Silva
 */
class UserController extends Controller {

    function __construct() {
        Parent::__construct();
    }

    /**
     * User Registration action.
     */
    function registerAction() {
        Helper::userRedirect();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user = new UserModel();
            $user->username = $_POST['username'];
            $user->password = $_POST['password'];
            $user->first_name = $_POST['first_name'];
            $user->last_name = $_POST['last_name'];

            if ($user->checkUsername()) {
                $this->view->error = "Username already exists.";
                $this->view->render("user/register");
            } else {
                if ($user->create()) {
                    Session::addFlash("success", "User registration complete. Please login to continue.");
                    Helper::redirect("user/login");
                } else {
                    $this->view->error = "User registration failed.";
                    $this->view->render("user/register");
                }
            }
        } else {
            $this->view->render("user/register");
        }
    }

    /**
     * User login action
     */
    function loginAction() {
        Helper::userRedirect();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user = new UserModel();
            $user->username = $_POST['username'];
            $user->password = $_POST['password'];

            $user = $user->login();

            if($user) {
                Session::login($user);
                Helper::redirect();
            } else {
                $this->view->error = "Username / Password invalid";
                $this->view->render("user/login");
            }

        } else {
            $this->view->render("user/login");
        }
    }

    function logoutAction() {
        Session::logout();
        Helper::redirect();
    }

}
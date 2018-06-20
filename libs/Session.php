<?php

/**
 * Session helper class
 *
 * Developer: Lakmal Silva
 */
class Session
{

    /**
     * Create flash array and remove old flash values
     */
    function __construct()
    {
        session_start();

        if (!isset($_SESSION['is_login'])) {
            $_SESSION['is_login'] = false;
        }

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        if (isset($_SESSION['flash'])) {
            foreach ($_SESSION['flash'] as $name => $value) {
                if ($value['flash_count'] == 0) {
                    $_SESSION['flash'][$name]['flash_count'] = 1;
                } else {
                    unset($_SESSION['flash'][$name]);
                }
            }
        } else {
            $_SESSION['flash'] = array();
        }
    }

    /**
     * Add values to flash array
     * @param $name string
     * @param $value string
     */
    public static function addFlash($name, $value)
    {
        $_SESSION['flash'][$name] = [
            "flash_count" => 0,
            "value" => $value
        ];
    }

    /**
     * Get flash value by its name
     * @param $name string
     * @return string|bool
     */
    public static function getFlash($name)
    {
        if (isset($_SESSION['flash'][$name])) {
            return $_SESSION['flash'][$name]['value'];
        } else {
            return false;
        }
    }

    /**
     * Check flash value by its name
     * @param $name string
     * @return bool
     */
    public static function checkFlash($name)
    {
        return isset($_SESSION['flash'][$name]);
    }

    /**
     * Saving user object in session
     * @param $user UserModel
     */
    public static function login($user)
    {
        $_SESSION['is_login'] = true;
        $_SESSION['current_user'] = $user;
    }

    /**
     * check is user login
     * @return bool
     */
    public static function isLogin()
    {
        return $_SESSION['is_login'];
    }

    /**
     * Get user role
     * @return string
     */
    public static function userRole()
    {
        if (isset($_SESSION['current_user'])) {
            return $_SESSION['current_user']->role;
        } else {
            return "guest";
        }
    }

    /**
     * Get current user
     * @return UserModel|bool
     */
    public static function getCurrentUser()
    {
        if (isset($_SESSION['current_user'])) {
            return $_SESSION['current_user'];
        } else {
            return false;
        }
    }

    /**
     * Unset session when user logout
     */
    public static function logout()
    {
        $_SESSION['is_login'] = false;
        unset($_SESSION['current_user']);
    }

    /**
     * Add products to cart array
     * @param $product ProductModel
     * @param $quantity int
     * @return int
     */
    public static function setToCart($product, $quantity)
    {
        if ($quantity > 0) {

            if (isset($_SESSION['cart'][$product->id])) {
                $totalQuantity = $_SESSION['cart'][$product->id]['quantity'] + $quantity;
            } else {
                $totalQuantity = $quantity;
            }

            if ($totalQuantity > $product->quantity) {
                return -1;
            }

            if (isset($_SESSION['cart'][$product->id])) {
                $_SESSION['cart'][$product->id]['product'] = $product;
                $_SESSION['cart'][$product->id]['quantity'] += $quantity;
                $_SESSION['cart'][$product->id]['price'] = $_SESSION['cart'][$product->id]['quantity'] * $_SESSION['cart'][$product->id]['product']->price;
            } else {
                $_SESSION['cart'][$product->id] = [
                    "product" => $product,
                    "quantity" => $quantity,
                    "price" => $quantity * $product->price
                ];
            }
            return 1;
        } else {
            return 0;
        }

    }

    /**
     * Get cart array
     * @return array
     */
    public static function getCart()
    {
        return $_SESSION['cart'];
    }

    /**
     * Get cart item by its id
     * @return array|bool
     */
    public static function getCartItem($id)
    {
        if ($_SESSION['cart'][$id]) {
            return $_SESSION['cart'][$id];
        } else {
            return false;
        }

    }

    /**
     * Update cart item by its id
     * @param $product ProductModel
     * @param $quantity int
     * @return int
     */
    public static function editCartItem($product, $quantity)
    {
        if ($quantity > $product->quantity) {
            return -1;
        }

        if ($_SESSION['cart'][$product->id] && $quantity > 0) {
            $_SESSION['cart'][$product->id]['product'] = $product;
            $_SESSION['cart'][$product->id]['quantity'] = $quantity;
            $_SESSION['cart'][$product->id]['price'] = $quantity * $product->price;

            return 1;
        } else {
            return 0;
        }

    }

    /**
     * Delete cart item by its id
     * @param $id int
     * @return bool
     */
    public static function deleteCartItem($id)
    {
        if ($_SESSION['cart'][$id]) {
            unset($_SESSION['cart'][$id]);
            return true;
        } else {
            return false;
        }

    }

    /**
     * Check cart item by its id
     * @param $id int
     * @return bool
     */
    public static function checkCart($id)
    {
        return isset($_SESSION['flash'][$id]);
    }

    /**
     * Get shopping cart total
     * @return int
     */
    public static function getCartTotal()
    {
        $total = 0;
        foreach ($_SESSION['cart'] as $id => $item) {
            $total += $item['price'];
        }
        return $total;
    }
}
<?php

class CartController {

    public function actionIndex() {
        $itemInCart = Cart::getItem();
        if ($itemInCart) {
            $itemIdArr = array_keys($itemInCart);
            $itemArr = Item::getItemById($itemIdArr);
            $totalPrice = Cart::getTotalPrice($itemArr);
        }
        require_once(ROOT . "/view/cart/index.php");
        return true;
    }

    public function actionAddAjax($itemId) {
        echo Cart::addItem($itemId);
        return true;
    }

    public function actionDelAjax($itemId) {
        echo Cart::delItem($itemId);
        return true;
    }

    public function actionOrder() {
        $itemInCart = Cart::getItem();
        if (!$itemInCart) {
            header("Location: /");
        } else {
            $itemIdArr = array_keys($itemInCart);
            $itemArr = Item::getItemById($itemIdArr);
            $totalPrice = Cart::getTotalPrice($itemArr);
            $totalCount = Cart::countItem();
            $result = false;
            $userId = null;
            $userName = false;
            $userPhone = false;
            $userComment = false;
            if (User::checkLoggedName() != "Гость") {
                $userId = User::checkLoggedId();
                $userName = User::checkLoggedName();
            }
            if (filter_input(INPUT_POST, "submit")) {
                $userName = filter_input(INPUT_POST, "name");
                $userPhone = filter_input(INPUT_POST, "phone");
                $userComment = filter_input(INPUT_POST, "comment");
                $errorArr[] = User::checkName($userName);
                $errorArr[] = User::checkPhone($userPhone);
                $errorArr = array_filter($errorArr);
                if (empty($errorArr)) {
                    $result = Order::save($userId, $userName, $userPhone, $userComment, $itemInCart);
                    if ($result) {
                        //$adminEmail = "";
                        //$subject = "";
                        //$message = "";
                        //mail($adminEmail, $subject, $message);
                        Cart::clear();
                    }
                }
            }
            require_once(ROOT . "/view/cart/order.php");
            return true;
        }
    }

}

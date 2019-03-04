<?php

class Cart {

    public static function addItem($itemId) {
        $itemInCart = array();
        if (isset($_SESSION["item"])) {
            $itemInCart = $_SESSION["item"];
        }
        if (array_key_exists($itemId, $itemInCart)) {
            $itemInCart[$itemId] ++;
        } else {
            $itemInCart[$itemId] = 1;
        }
        $_SESSION["item"] = $itemInCart;
        return self::countItem();
    }

    public static function clear() {
        if (isset($_SESSION["item"])) {
            unset($_SESSION["item"]);
        }
    }

    public static function countItem() {
        $count = 0;
        if (isset($_SESSION["item"])) {
            foreach ($_SESSION["item"] as $itemId => $itemCount) {
                $count += $itemCount;
            }
        }
        return $count;
    }

    public static function delItem($itemId) {
        $itemInCart = array();
        if (isset($_SESSION["item"])) {
            $itemInCart = $_SESSION["item"];
        }
        if (array_key_exists($itemId, $itemInCart)) {
            if ($itemInCart[$itemId] > 0) {
                $itemInCart[$itemId] --;
                if ($itemInCart[$itemId] == 0) {
                    unset($itemInCart[$itemId]);
                }
            }
        }
        $_SESSION["item"] = $itemInCart;
        return self::countItem();
    }

    public static function getItem() {
        if (isset($_SESSION["item"])) {
            return $_SESSION["item"];
        }
        return false;
    }

    public static function getTotalPrice($itemArr) {
        $itemInCart = self::getItem();
        $total = 0;
        if ($itemInCart) {
            foreach ($itemArr as $item) {
                $total += $item["price"] * $itemInCart[$item["id"]];
            }
        }
        return $total;
    }

}

<?php

class Item {

    const SHOW_BY_DEFAULT = 10;

    public static function getFullItem($itemId) {
        $pdo = Db::connect();
        $query = "SELECT id, name, price, description FROM item "
                . "WHERE id = :itemId";
        $result = $pdo->prepare($query);
        $result->bindParam(":itemId", $itemId, PDO::PARAM_INT);
        $result->execute();
        return $result->fetch();
    }

    public static function getItemById($itemIdArr) {
        $pdo = Db::connect();
        $itemIdStr = implode(",", $itemIdArr);
        $query = "SELECT * FROM item WHERE id IN ($itemIdStr)";
        $result = $pdo->query($query);
        foreach ($result as $row) {
            $itemArr[] = [
                "id" => $row["id"],
                "name" => $row["name"],
                "price" => $row["price"],
            ];
        }
        return $itemArr;
    }

    public static function getShortItem($count = self::SHOW_BY_DEFAULT) {
        $pdo = Db::connect();
        $query = "SELECT id, name, price FROM item "
                . "ORDER BY id DESC LIMIT :count";
        $result = $pdo->prepare($query);
        $result->bindParam(":count", $count, PDO::PARAM_INT);
        $result->execute();
        foreach ($result as $row) {
            $itemArr[] = [
                "id" => $row["id"],
                "name" => $row["name"],
                "price" => $row["price"],
            ];
        }
        return $itemArr;
    }

    public static function getShortItemPage($count = self::SHOW_BY_DEFAULT, $page = 1) {
        $offset = ($page - 1) * $count;
        $pdo = Db::connect();
        $query = "SELECT id, name, price FROM item "
                . "ORDER BY id ASC LIMIT :count OFFSET :offset";
        $result = $pdo->prepare($query);
        $result->bindParam(":count", $count, PDO::PARAM_INT);
        $result->bindParam(":offset", $offset, PDO::PARAM_INT);
        $result->execute();
        foreach ($result as $row) {
            $itemArr[] = [
                "id" => $row["id"],
                "name" => $row["name"],
                "price" => $row["price"],
            ];
        }
        return $itemArr;
    }

    public static function getTotalItem() {
        $pdo = Db::connect();
        $query = "SELECT COUNT(id) AS count FROM item";
        $result = $pdo->prepare($query);
        $result->execute();
        $row = $result->fetch();
        return $row["count"];
    }

}

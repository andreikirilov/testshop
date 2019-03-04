<?php

class Order {

    public static function save($userId, $userName, $userPhone, $userComment, $itemInCart) {
        $pdo = Db::connect();
        $query = "INSERT INTO item_order (user_id, user_name, user_phone, user_comment, item_json) "
                . "VALUES (:userId, :userName, :userPhone, :userComment, :itemJson)";
        $itemJson = json_encode($itemInCart);
        $result = $pdo->prepare($query);
        $result->bindParam(':userId', $userId, PDO::PARAM_INT);
        $result->bindParam(':userName', $userName, PDO::PARAM_STR);
        $result->bindParam(':userPhone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':userComment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':itemJson', $itemJson, PDO::PARAM_STR);
        return $result->execute();
    }

}

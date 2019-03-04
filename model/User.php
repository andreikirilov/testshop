<?php

class User {

    public static function checkEmail($userEmail) {
        if (filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
            return;
        }
        return "Неправильный E-mail";
    }

    public static function checkEmailExists($userEmail) {
        $pdo = Db::connect();
        $query = "SELECT COUNT(*) AS count FROM user WHERE email = :userEmail";
        $result = $pdo->prepare($query);
        $result->bindParam(":userEmail", $userEmail, PDO::PARAM_STR);
        $result->execute();
        if ($result->fetchColumn()) {
            return "Такой email уже используется";
        }
        return;
    }

    public static function checkLoggedId() {
        if (isset($_SESSION["user"])) {
            return $_SESSION["user"]["id"];
        }
        header("Location: /user/login");
    }

    public static function checkLoggedName() {
        if (isset($_SESSION["user"])) {
            return $_SESSION["user"]["name"];
        }
        return "Гость";
    }

    public static function checkName($userName) {
        if (strlen($userName) >= 3) {
            return;
        }
        return "Имя не должно быть короче 3-ех символов";
    }

    public static function checkPassword($userPass) {
        if (strlen($userPass) >= 6) {
            return;
        }
        return "Пароль не должен быть короче 6-ти символов";
    }

    public static function checkPhone($userPhone) {
        if (strlen($userPhone) >= 10) {
            return;
        }
        return "Неправильный телефон";
    }

    public static function editUserById($userId, $userName, $userPass) {
        $pdo = Db::connect();
        $query = "UPDATE user "
                . "SET name = :userName, password = :userPass "
                . "WHERE id = :userId";
        $result = $pdo->prepare($query);
        $result->bindParam(":userId", $userId, PDO::PARAM_INT);
        $result->bindParam(":userName", $userName, PDO::PARAM_STR);
        $result->bindParam(":userPass", $userPass, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function getUserById($userId) {
        $pdo = Db::connect();
        $query = "SELECT * FROM user WHERE id = :userId";
        $result = $pdo->prepare($query);
        $result->bindParam(":userId", $userId, PDO::PARAM_INT);
        $result->execute();
        return $result->fetch();
    }

    public static function getUserData($userEmail, $userPass) {
        $pdo = Db::connect();
        $query = "SELECT id, name FROM user "
                . "WHERE email = :userEmail AND password = :userPass";
        $result = $pdo->prepare($query);
        $result->bindParam(":userEmail", $userEmail, PDO::PARAM_STR);
        $result->bindParam(":userPass", $userPass, PDO::PARAM_STR);
        $result->execute();
        return $result->fetch();
    }

    public static function register($userName, $userEmail, $userPass) {
        $pdo = Db::connect();
        $query = "INSERT INTO user (name, email, password) "
                . "VALUES (:userName, :userEmail, :userPass)";
        $result = $pdo->prepare($query);
        $result->bindParam(":userName", $userName, PDO::PARAM_STR);
        $result->bindParam(":userEmail", $userEmail, PDO::PARAM_STR);
        $result->bindParam(":userPass", $userPass, PDO::PARAM_STR);
        return $result->execute();
    }

}

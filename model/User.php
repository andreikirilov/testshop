<?php

class User {

    public static function checkEmail($userEmail) {
        if (filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkEmailExists($userEmail) {
        $pdo = Db::connect();
        $query = "SELECT COUNT(*) AS count FROM user WHERE email = :userEmail";
        $result = $pdo->prepare($query);
        $result->bindParam(":userEmail", $userEmail, PDO::PARAM_STR);
        $result->execute();
        if ($result->fetchColumn()) {
            return false;
        }
        return true;
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
            return true;
        }
        return false;
    }

    public static function checkPassword($userPass) {
        if (strlen($userPass) >= 6) {
            return true;
        }
        return false;
    }

    public static function checkPhone($userPhone) {
        if (strlen($userPhone) >= 10) {
            return true;
        }
        return false;
    }

    public static function checkUserData($userEmail, $userPass) {
        $pdo = Db::connect();
        $query = "SELECT id, name FROM user "
                . "WHERE email = :userEmail AND password = :userPass";
        $result = $pdo->prepare($query);
        $result->bindParam(":userEmail", $userEmail, PDO::PARAM_STR);
        $result->bindParam(":userPass", $userPass, PDO::PARAM_STR);
        $result->execute();
        return $result->fetch();
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

<?php

class AccountController {

    public function actionIndex() {
        $userId = User::checkLoggedId();
        require_once(ROOT . "/view/account/index.php");
        return true;
    }

    public function actionEdit() {
        $result = false;
        $errorArr = false;
        $userId = User::checkLoggedId();
        $userArr = User::getUserById($userId);
        $userName = $userArr["name"];
        $userPass = $userArr["password"];
        if (filter_input(INPUT_POST, "submit")) {
            $userName = filter_input(INPUT_POST, "name");
            $userPass = filter_input(INPUT_POST, "password");
            if (!User::checkName($userName)) {
                $errorArr[] = "Имя не должно быть короче 3-ех символов";
            }
            if (!User::checkPassword($userPass)) {
                $errorArr[] = "Пароль не должен быть короче 6-ти символов";
            }
            if ($errorArr == false) {
                $result = User::editUserById($userId, $userName, $userPass);
            }
        }
        require_once(ROOT . "/view/account/edit.php");
        return true;
    }

}

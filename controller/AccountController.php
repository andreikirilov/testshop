<?php

class AccountController {

    public function actionIndex() {
        $userId = User::checkLoggedId();
        require_once(ROOT . "/view/account/index.php");
        return true;
    }

    public function actionEdit() {
        $result = false;
        $userId = User::checkLoggedId();
        $userArr = User::getUserById($userId);
        $userName = $userArr["name"];
        $userPass = $userArr["password"];
        if (filter_input(INPUT_POST, "submit")) {
            $userName = filter_input(INPUT_POST, "name");
            $userPass = filter_input(INPUT_POST, "password");
            $errorArr[] = User::checkName($userName);
            $errorArr[] = User::checkPassword($userPass);
            $errorArr = array_filter($errorArr);
            if (empty($errorArr)) {
                $result = User::editUserById($userId, $userName, $userPass);
            }
        }
        require_once(ROOT . "/view/account/edit.php");
        return true;
    }

}

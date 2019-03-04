<?php

class UserController {

    public function actionRegistration() {
        $result = false;
        $userName = false;
        $userEmail = false;
        $userPass = false;
        if (filter_input(INPUT_POST, "submit")) {
            $userName = filter_input(INPUT_POST, "name");
            $userEmail = filter_input(INPUT_POST, "email");
            $userPass = filter_input(INPUT_POST, "password");
            $errorArr[] = User::checkName($userName);
            $errorArr[] = User::checkEmail($userEmail);
            $errorArr[] = User::checkEmailExists($userEmail);
            $errorArr[] = User::checkPassword($userPass);
            $errorArr = array_filter($errorArr);
            if (empty($errorArr)) {
                $result = User::register($userName, $userEmail, $userPass);
            }
        }
        require_once(ROOT . "/view/user/registation.php");
        return true;
    }

    public function actionLogin() {
        $userEmail = false;
        $userPass = false;
        if (filter_input(INPUT_POST, "submit")) {
            $userEmail = filter_input(INPUT_POST, "email");
            $userPass = filter_input(INPUT_POST, "password");
            $errorArr[] = User::checkEmail($userEmail);
            $errorArr[] = User::checkPassword($userPass);
            $errorArr = array_filter($errorArr);
            if (empty($errorArr)) {
                $userArr = User::getUserData($userEmail, $userPass);
                if (!$userArr) {
                    $errorArr[] = "Неправильные данные для входа на сайт";
                } else {
                    $_SESSION["user"] = $userArr;
                    header("Location: /");
                }
            }
        }
        require_once(ROOT . "/view/user/login.php");
        return true;
    }

    public function actionLogout() {
        unset($_SESSION["user"]);
        header("Location: /");
        return true;
    }

}

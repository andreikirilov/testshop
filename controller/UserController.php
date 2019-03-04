<?php

class UserController {

    public function actionRegistration() {
        $result = false;
        $errorArr = false;
        $userName = false;
        $userEmail = false;
        $userPass = false;
        if (filter_input(INPUT_POST, "submit")) {
            $userName = filter_input(INPUT_POST, "name");
            $userEmail = filter_input(INPUT_POST, "email");
            $userPass = filter_input(INPUT_POST, "password");
            if (!User::checkName($userName)) {
                $errorArr[] = "Имя не должно быть короче 3-ех символов!";
            }
            if (!User::checkEmail($userEmail)) {
                $errorArr[] = "Неправильный E-mail!";
            }
            if (!User::checkEmailExists($userEmail)) {
                $errorArr[] = "Такой email уже используется!";
            }
            if (!User::checkPassword($userPass)) {
                $errorArr[] = "Пароль не должен быть короче 6-ти символов!";
            }
            if ($errorArr == false) {
                $result = User::register($userName, $userEmail, $userPass);
            }
        }
        require_once(ROOT . "/view/user/registation.php");
        return true;
    }

    public function actionLogin() {
        $errorArr = false;
        $userEmail = false;
        $userPass = false;
        if (filter_input(INPUT_POST, "submit")) {
            $userEmail = filter_input(INPUT_POST, "email");
            $userPass = filter_input(INPUT_POST, "password");
            if (!User::checkEmail($userEmail)) {
                $errorArr[] = "Неправильный E-mail!";
            }
            if (!User::checkPassword($userPass)) {
                $errorArr[] = "Пароль не должен быть короче 6-ти символов";
            }
            $userArr = User::checkUserData($userEmail, $userPass);
            if (!$userArr) {
                $errorArr[] = "Неправильные данные для входа на сайт";
            } else {
                $_SESSION["user"] = $userArr;
                header("Location: /");
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

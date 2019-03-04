<?php

class Db {

    public static function connect() {
        $paramPath = ROOT . "/config/db_param.php";
        $param = include($paramPath);
        $dsn = "mysql:host={$param["host"]};dbname={$param["dbname"]};charset={$param["charset"]}";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        return new PDO($dsn, $param["user"], $param["password"], $opt);
    }

}

<?php

spl_autoload_register(function($className) {
    $pathArr = [
        "/component/",
        "/controller/",
        "/model/",
    ];
    foreach ($pathArr as $path) {
        $path = ROOT . $path . $className . ".php";
        if (is_file($path)) {
            include_once $path;
        }
    }
});

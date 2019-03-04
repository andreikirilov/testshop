<?php

class Router {

    private $route;

    public function __construct() {
        $routePath = ROOT . "/config/route.php";
        $this->route = include($routePath);
    }

    private function getUri() {
        $reqUri = filter_input(INPUT_SERVER, "REQUEST_URI");
        if ($reqUri) {
            return trim($reqUri, "/");
        }
    }

    public function run() {
        $result = false;
        $reqUri = $this->getURI();
        foreach ($this->route as $uriPattern => $path) {
            if (preg_match("~^$uriPattern$~", $reqUri)) {
                $internalRoute = preg_replace("~$uriPattern~", $path, $reqUri);
                $segment = explode("/", $internalRoute);
                $controllerName = ucfirst(array_shift($segment)) . "Controller";
                $actionName = "action" . ucfirst(array_shift($segment));
                $param = $segment;
                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionName), $param);
                break;
            }
        }
        if (!$result) {
            header("HTTP/1.1 404 Not Found");
            die("404 Not Found");
        }
    }

}

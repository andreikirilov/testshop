<?php

class SiteController {

    public function actionIndex() {
        $itemCount = 3;
        $itemArr = Item::getShortItem($itemCount);
        require_once ROOT . "/view/site/index.php";
        return true;
    }

    public function actionAll($page = 1) {
        $itemCount = 3;
        $itemArr = Item::getShortItemPage($itemCount, $page);
        $itemTotal = Item::getTotalItem();
        $pagination = new Pagination($itemTotal, $page, $itemCount, "page-");
        require_once ROOT . "/view/site/all.php";
        return true;
    }

}

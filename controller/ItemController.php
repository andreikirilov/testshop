<?php

class ItemController {

    public function actionIndex($itemId) {
        $itemArr = Item::getFullItem($itemId);
        require_once ROOT . "/view/item/index.php";
        return true;
    }

}

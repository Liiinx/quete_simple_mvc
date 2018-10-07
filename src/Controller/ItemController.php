<?php

namespace Controller;
// src/Controller/ItemController.php
use Model\ItemManager;

//require __DIR__ . '/../Model/ItemManager.php';

class ItemController{

    public function index() {
        $itemManager = new ItemManager();
        $items =  $itemManager->selectAllItems();
        require __DIR__ . '/../View/item.php';
    }

    public function show($id) {
        $itemManager = new ItemManager();
        $item =  $itemManager->selectOneItem($id);
        require __DIR__ . '/../View/showItem.php';
    }
    /*
    // controller pour toutes les categories
    public function categories() {
        $itemManager = new ItemManager();
        $categories =  $itemManager->selectAllCategories();
        require __DIR__ . '/../View/categories.php';
    }
    // controller pour une category
    public function category($id) {
        $itemManager = new ItemManager();
        $category = $itemManager->selectOneCategory($id);
        require __DIR__ . '/../View/showCategory.php';
    } */
}
?>
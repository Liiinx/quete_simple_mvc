<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 07/10/18
 * Time: 19:34
 */

namespace Controller;
// src/Controller/ItemController.php
use Model\CategoryManager;


class CategoryController {

    // controller pour toutes les categories
    public function categories() {
        $categoryManager = new CategoryManager();
        $categories =  $categoryManager->selectAllCategories();
        require __DIR__ . '/../View/categories.php';
    }
    // controller pour une category
    public function category($id) {
        $itemManager = new CategoryManager();
        $category = $itemManager->selectOneCategory($id);
        require __DIR__ . '/../View/showCategory.php';
    }
}
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
//use View\View;
use Twig_Loader_Filesystem;
use Twig_Environment;


class CategoryController extends AbstractController {

    //private $twig;

    // controller pour toutes les categories
    public function categories() {
        $categoryManager = new CategoryManager();
        $categories =  $categoryManager->selectAllCategories();
        //require __DIR__ . '/../View/categories.html.twig';
        return $this->twig->render('categories.html.twig', ['categories' => $categories]);
    }
    // controller pour une category
    public function category($id) {
        $itemManager = new CategoryManager();
        $category = $itemManager->selectOneCategory($id);
        //require __DIR__ . '/../View/showCategory.html.twig';
        return $this->twig->render('showCategory.html.twig', ['category' => $category]);

    }
}
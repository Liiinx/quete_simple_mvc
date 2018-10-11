<?php

namespace Controller;
// src/Controller/ItemController.php
use Model\ItemManager;

use Twig_Loader_Filesystem;
use Twig_Environment;

//require __DIR__ . '/../Model/ItemManager.php';

class ItemController{

    private $twig;

    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem(__DIR__.'/../View');
        $this->twig = new Twig_Environment($loader);
    }

    public function index() {
        $itemManager = new ItemManager();
        $items =  $itemManager->selectAllItems();
        //require __DIR__ . '/../View/item.html.twig';

        // appel de la vue avec method twig
        return $this->twig->render('item.html.twig', ['items' => $items]);

    }

    public function show($id) {
        $itemManager = new ItemManager();
        $item =  $itemManager->selectOneItem($id);
        //require __DIR__ . '/../View/showItem.html.twig';
        return $this->twig->render('showItem.html.twig', ['item' => $item]);

    }
    /*
    // controller pour toutes les categories
    public function categories() {
        $itemManager = new ItemManager();
        $categories =  $itemManager->selectAllCategories();
        require __DIR__ . '/../View/categories.html.twig';
    }
    // controller pour une category
    public function category($id) {
        $itemManager = new ItemManager();
        $category = $itemManager->selectOneCategory($id);
        require __DIR__ . '/../View/showCategory.html.twig';
    } */
}
?>
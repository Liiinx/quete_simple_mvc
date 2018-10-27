<?php

namespace Controller;
use Model\CategoryManager;
use Model\Category;


class CategoryController extends AbstractController
{

    // controller pour toutes les categories
    public function categories() {

        $categoryManager = new CategoryManager($this->pdo);
        $categories = $categoryManager->selectAll();
        return $this->twig->render('categories.html.twig', ['categories' => $categories]);
    }
    // controller pour une category
    public function category($id) {

        $categoryManager = new CategoryManager($this->pdo);
        $category = $categoryManager->selectOneById($id);

        return $this->twig->render('showCategory.html.twig', ['category' => $category]);

    }

    public function add()
    {
        if (!empty($_POST)) {
            // TODO : validations des valeurs saisies dans le form
            $addCategory = htmlspecialchars(trim(strip_tags($_POST['category'])));
            // création d'un nouvel objet Item et hydratation avec les données du formulaire
            $categoryManager = new CategoryManager($this->pdo);
            $category = new Category();
            $category->setName($addCategory);
            // l'objet $item hydraté est simplement envoyé en paramètre de insert()
            $categoryManager->insert($category);
            // si tout se passe bien, redirection
            header('Location: /categories');
        }
        return $this->twig->render('addCategory.html.twig');
    }

    public function edit(int $id)
    {
        $categoryManager = new CategoryManager($this->pdo);
        $category = $categoryManager->selectOneById($id);
        //var_dump($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //var_dump($_POST);
            $category->setName($_POST['category']);
            $categoryManager->update($category);
            header('Location:/categories');
        }
        return $this->twig->render('addCategory.html.twig', ['category'=> $category]);
    }

    public function delete(int $id)
    {
        $categoryManager = new CategoryManager($this->pdo);
        $categoryManager->delete($id);
        header('Location:/categories');
    }
}
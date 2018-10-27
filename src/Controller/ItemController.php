<?php

namespace Controller;
use Model\ItemManager;
use Model\Item;

class ItemController extends AbstractController {

    public function index() {
        $itemManager = new ItemManager($this->pdo);
        $items =  $itemManager->selectAll();
        // appel de la vue avec method twig
        return $this->twig->render('item.html.twig', ['items' => $items]);

    }

    public function show($id) {
        $itemManager = new ItemManager($this->pdo);
        $item =  $itemManager->selectOneById($id);
        return $this->twig->render('showItem.html.twig', ['item' => $item]);

    }

    public function add()
    {

        if (!empty($_POST)) {
            // TODO : validations des valeurs saisies dans le form
            $addItem = htmlspecialchars(trim(strip_tags($_POST['item'])));
            // création d'un nouvel objet Item et hydratation avec les données du formulaire
            $itemManager = new ItemManager($this->pdo);
            $item = new Item();
            $item->setTitle($addItem);
            // l'objet $item hydraté est simplement envoyé en paramètre de insert()
            $itemManager->insert($item);
            // si tout se passe bien, redirection
            header('Location: /');
            //exit("merde");
        }
        // le formulaire HTML est affiché (vue à créer)
        return $this->twig->render('add.html.twig');
    }

    public function delete(int $id)
    {

        $itemManager = new ItemManager($this->pdo);
        $itemManager->delete($id);
        header('Location:/');
    }

    public function edit(int $id)
    {
        $itemManager = new ItemManager($this->pdo);
        $item = $itemManager->selectOneById($id);
        //var_dump($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            var_dump($_POST);
            $item->setTitle($_POST['item']);
            $itemManager->update($item);
            header('Location:/');
        }
        return $this->twig->render('edit.html.twig', ['item'=> $item]);
    }
}

?>
<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 07/10/18
 * Time: 19:40
 */

namespace Model;
require __DIR__ . '/../../app/db.php';

class CategoryManager {

    // récupération de toutes les catégories
    public function selectAllCategories() : array
    {
        $pdo = new \PDO(DSN, USER, PASS);
        $query = "SELECT * FROM category";
        $res = $pdo->query($query);
        return $res->fetchAll();
    }
    // recuperation de 1 categorie
    public function selectOneCategory($id) : array
    {
        $pdo = new \PDO(DSN, USER, PASS);
        $query = "SELECT * FROM category WHERE id = :id";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
        // contrairement à fetchAll(), fetch() ne renvoie qu'un seul résultat
        return $statement->fetch();
    }

}
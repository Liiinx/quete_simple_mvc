<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 07/10/18
 * Time: 19:40
 */

namespace Model;


class CategoryManager extends AbstractManager
{
    const TABLE = 'category';

    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }

    public function insert($category)
    {
        $statement = $this->pdo->prepare("INSERT INTO $this->table (name) VALUES (:name)");
        $statement->bindValue(':name', $category->getName(), \PDO::PARAM_STR);
        if ($statement->execute()) {
            return $this->pdo->lastInsertId();
        }
    }

    public function update($category) :int
    {
        $statement = $this->pdo->prepare("UPDATE $this->table set name = :name WHERE id = :id");
        $statement->bindValue('name', $category->getName(), \PDO::PARAM_STR);
        $statement->bindValue('id', $category->getId(), \PDO::PARAM_INT);

        return $statement->execute();
    }

    public function delete(int $id)
    {
        $statement = $this->pdo->prepare("DELETE FROM $this->table WHERE id = :id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

    }
}
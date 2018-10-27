<?php

namespace Model;


class ItemManager extends AbstractManager
{
    const TABLE = 'item';

    public function __construct( \PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }

    public function insert(Item $item)
    {
        $statement = $this->pdo->prepare("INSERT INTO $this->table (title) VALUES (:title)");
        $statement->bindValue(':title', $item->getTitle(), \PDO::PARAM_STR);
        if ($statement->execute()) {
            return $this->pdo->lastInsertId();
        }
    }

    public function delete(int $id)
    {
        $statement = $this->pdo->prepare("DELETE FROM $this->table WHERE id = :id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        //$_SERVER['HTTP_REFERER'] = Sert à retourner sur la page précédente
        //return header('Location: ' .  $_SERVER['HTTP_REFERER']);
    }

    public function update($item) :int
    {
        $statement = $this->pdo->prepare("UPDATE $this->table set title = :title WHERE id = :id");
        $statement->bindValue('title', $item->getTitle(), \PDO::PARAM_STR);
        $statement->bindValue('id', $item->getId(), \PDO::PARAM_INT);

        return $statement->execute();
    }
}
?>
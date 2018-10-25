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

}
?>
<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 14/10/18
 * Time: 20:15
 */

namespace Model;


class Item
{
    private $id;
    private $title;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): Item
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle($title):Item
    {
        $this->title = $title;
        return $this;
    }
}
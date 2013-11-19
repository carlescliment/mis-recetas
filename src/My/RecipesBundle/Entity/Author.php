<?php

namespace My\RecipesBundle\Entity;


class Author
{
    private $id;

    protected $name;

    protected $surname;

    public function __construct($name, $surname)
    {
        $this->name = $name;
        $this->surname = $surname;
    }

    public function __toString()
    {
        return $this->name . ' ' . $this->surname;
    }
}
<?php

namespace My\RecipesBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Author
{
    private $id;

    protected $name;

    protected $surname;

    protected $recipes;

    public function __construct($name, $surname)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->recipes = new ArrayCollection;
    }

    public function __toString()
    {
        return $this->name . ' ' . $this->surname;
    }

    public function getRecipes()
    {
        return $this->recipes;
    }
}
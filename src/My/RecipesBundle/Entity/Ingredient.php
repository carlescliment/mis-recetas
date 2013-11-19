<?php

namespace My\RecipesBundle\Entity;


class Ingredient
{
    private $id;

    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return $this->name;
    }
}

<?php

namespace My\RecipesBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Recipe
{
    private $id;

    protected $name;

    protected $difficulty;

    protected $description;

    protected $author;

    protected $ingredients;

    public function __construct(Author $author, $name, $description, $difficulty)
    {
        $this->author = $author;
        $this->name = $name;
        $this->description = $description;
        $this->difficulty = $difficulty;
        $this->ingredients = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Recipe
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Recipe
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getIngredients()
    {
        return $this->ingredients;
    }

    public function add(Ingredient $ingredient)
    {
        $this->ingredients[] = $ingredient;
        return $this;
    }
}
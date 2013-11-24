<?php


namespace My\RecipesBundle\Twig;

use My\RecipesBundle\Entity\Recipe;

class RecipesExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('cssClass', array($this, 'cssClass')),
        );
    }

    public function cssClass($recipe)
    {
        if ($recipe->isEasy()) {
            return 'easy';
        }
        if ($recipe->isNormal()) {
            return 'normal';
        }
        return 'hard';
    }

    public function getName()
    {
        return 'my_recipes_extension';
    }
}
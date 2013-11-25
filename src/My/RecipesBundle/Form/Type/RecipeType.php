<?php

// src/My/RecipesBundle/Form/Type/RecipeType.php
namespace My\RecipesBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'string')
            ->add('surname', 'string')
            ->add('save', 'submit');
    }

    public function getName()
    {
        return 'recipe';
    }
}
<?php

// src/My/RecipesBundle/Form/Type/RecipeType.php
namespace My\RecipesBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AuthorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('PUT')
            ->add('name', 'text')
            ->add('surname', 'text')
            ->add('save', 'submit');
    }

    public function getName()
    {
        return 'recipe';
    }
}
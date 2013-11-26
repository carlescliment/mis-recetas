<?php

// src/My/RecipesBundle/Form/Type/AuthorType.php
namespace My\RecipesBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use My\RecipesBundle\Model\Difficulties;

class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text')
            ->add('difficulty', 'choice', array('choices' => Difficulties::toArray(),
                ))
            ->add('save', 'submit');
    }

    public function getName()
    {
        return 'recipe';
    }
}
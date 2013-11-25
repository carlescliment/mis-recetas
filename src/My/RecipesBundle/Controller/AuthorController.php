<?php

namespace My\RecipesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use My\RecipesBundle\Entity\Author;

class AuthorController extends Controller
{

    /**
     * @Template()
     */
    public function createAction()
    {
        $author = new Author;
        $form = $this->createFormBuilder($author)
            ->add('name', 'text')
            ->add('surname', 'text')
            ->add('save', 'submit')
            ->getForm();
        return array('form' => $form->createView());
    }

}

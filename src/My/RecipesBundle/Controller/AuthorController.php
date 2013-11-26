<?php

namespace My\RecipesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use My\RecipesBundle\Form\Type\AuthorType;

use My\RecipesBundle\Entity\Author;

class AuthorController extends Controller
{

    /**
     * @Template()
     */
    public function createAction(Request $request)
    {
        $author = new Author;
        $form = $this->createForm(new AuthorType, $author);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($author);
            $em->flush();
            return $this->redirect($this->generateUrl('my_recipes_author_show', array('id' => $author->getId())));
        }
        return array('form' => $form->createView());
    }

    /**
     * @Template()
     */
    public function showAction(Author $author)
    {
        return array('author' => $author);
    }

}

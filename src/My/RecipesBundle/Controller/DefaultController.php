<?php

namespace My\RecipesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use My\RecipesBundle\Entity\Author,
    My\RecipesBundle\Entity\Ingredient,
    My\RecipesBundle\Entity\Recipe;

class DefaultController extends Controller
{

    /**
     * @Template()
     */
    public function showAction(Recipe $recipe)
    {
        return array('recipe' => $recipe);
    }


    public function createAction()
    {
        $author = new Author('Karlos', 'Arguiñano');
        $ingredient = new Ingredient('Pollo');
        $recipe = new Recipe($author, 'Pollo al pil-pil', 'Deliciosa y económica receta.', 'fácil');
        $recipe->add($ingredient);

        $this->persistAndFlush($recipe);

        return $this->redirect($this->generateUrl('my_recipes_show', array('id' => $recipe->getId())));
    }


    /**
     * @Template()
     */
    public function topChefsAction()
    {
        $repository = $this->getDoctrine()->getRepository('MyRecipesBundle:Author');
        $chefs = $repository->findTopChefs();
        return array('chefs' => $chefs);
    }

    /**
     * @Template()
     */
    public function lastRecipesAction()
    {
        $date = new \DateTime('-10 days');
        $repository = $this->getDoctrine()->getRepository('MyRecipesBundle:Recipe');
        $recipes = $repository->findPublishedAfter($date);;
        return array('recipes' => $recipes);
    }

    private function persistAndFlush(Recipe $recipe)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($recipe);
        $em->flush();
    }

}

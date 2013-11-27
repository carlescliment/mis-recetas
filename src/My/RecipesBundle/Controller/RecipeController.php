<?php
// src/My/RecipesBundle/Controller/RecipeController.php
namespace My\RecipesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use My\RecipesBundle\Entity\Author,
    My\RecipesBundle\Entity\Ingredient,
    My\RecipesBundle\Entity\Recipe;

use My\RecipesBundle\Form\Type\RecipeType;

class RecipeController extends Controller
{

    /**
     * @Template()
     */
    public function showAction(Recipe $recipe)
    {
        return array('recipe' => $recipe);
    }

    /**
     * @Template()
     */
    public function editAction(Recipe $recipe, Request $request)
    {
        $form = $this->createForm(new RecipeType, $recipe);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirect($this->generateUrl('my_recipes_recipe_show', array('id' => $recipe->getId())));
        }
        return array(
            'form' => $form->createView(),
            'recipe' => $recipe);
    }

    /**
     * @Template()
     */
    public function createAction(Request $request)
    {
        $recipe = new Recipe();
        $form = $this->createForm(new RecipeType, $recipe);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->persistAndFlush($recipe);
            return $this->redirect($this->generateUrl('my_recipes_recipe_show', array('id' => $recipe->getId())));
        }
        return array('form' => $form->createView());
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

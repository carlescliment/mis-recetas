<?php

namespace My\RecipesBundle\Repository;

use Doctrine\ORM\EntityRepository;

class RecipeRepository extends EntityRepository {

    public function findPublishedAfter(\DateTime $date) {
        return $this->getEntityManager()
            ->createQuery('SELECT r
                           FROM MyRecipesBundle:Recipe r
                           WHERE r.published >= :date')
            ->setParameter('date', $date)
            ->getResult();
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: olegyurievich
 * Date: 16.11.17
 * Time: 7:53
 */

namespace AppBundle\Repository;

use AppBundle\Entity\Genus;
use AppBundle\Entity\GenusScientist;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityRepository;

class GenusScientistRepository extends EntityRepository
{
    static public function createExpertCriteria()
    {
        return Criteria::create()
            ->andWhere(Criteria::expr()->gt('yearsStudied', 27))
            ->orderBy(['yearsStudied' => Criteria::DESC]);
    }

    /**
     * @return GenusScientist[]
     */
    public function findAllExperts()
    {
        return $this->createQueryBuilder('genus_scientist')
            ->addCriteria(self::createExpertCriteria())
            ->getQuery()
            ->execute();
    }
}
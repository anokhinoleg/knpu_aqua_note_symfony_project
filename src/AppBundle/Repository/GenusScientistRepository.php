<?php
/**
 * Created by PhpStorm.
 * User: olegyurievich
 * Date: 16.11.17
 * Time: 7:53
 */

namespace AppBundle\Repository;

use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityRepository;

class GenusScientistRepository extends EntityRepository
{
    static public function createExpertCriteria()
    {
        return Criteria::create()
            ->andWhere(Criteria::expr()->gt('yearsStudied', 5))
            ->orderBy(['yearsStudied', 'DESC']);
    }

    public function findAllExperts()
    {
        return $this->createQueryBuilder('genus')
            ->addCriteria(self::createExpertCriteria())
            ->getQuery()
            ->execute();
    }
}
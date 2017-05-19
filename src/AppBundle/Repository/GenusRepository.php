<?php
/**
 * Created by PhpStorm.
 * User: olegyurievich
 * Date: 05.05.17
 * Time: 20:48
 */

namespace AppBundle\Repository;


use AppBundle\Entity\Genus;
use Doctrine\ORM\EntityRepository;

class GenusRepository extends EntityRepository
{
    /**
     * @return Genus[]
     */
    public function findAllPublishedOrderedBySize()
    {
        return $this->createQueryBuilder('genus')
            ->andWhere('genus.isPublished = :isPublished')
            ->setParameter('isPublished', true)
            ->orderBy('genus.speciesCount','DESC')
            ->getQuery()
            ->execute();
    }
}
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
    public function findAllPublishedOrderedByRecentlyActive()
    {
        return $this->createQueryBuilder('genus')
            ->andWhere('genus.isPublished = :isPublished')
            ->setParameter('isPublished', true)
            ->leftJoin('genus.notes', 'genus_note')
            ->orderBy('genus_note.createdAt', 'DESC')
//            ->leftJoin('genus.genusScientists', 'genusScientists')
//            ->addSelect('genusScientists')
            ->getQuery()
            ->execute();
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: olegyurievich
 * Date: 18.05.17
 * Time: 18:40
 */

namespace AppBundle\Repository;


use AppBundle\Entity\Post;
use Doctrine\ORM\EntityRepository;

class PostRepository extends EntityRepository
{
    /**
     * @return Post[]
     */
    public function findAllPublishedOrderBySize()
    {
        return $this->createQueryBuilder('post')
            ->andWhere('post.isPublished = :isPublished')
            ->setParameter('isPublished',true)
            ->orderBy('post.date', 'DESC')
            ->getQuery()
            ->execute();

    }
}
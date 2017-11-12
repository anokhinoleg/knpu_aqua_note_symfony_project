<?php
/**
 * Created by PhpStorm.
 * User: olegyurievich
 * Date: 05.05.17
 * Time: 20:48
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class SubFamilyRepository extends EntityRepository
{
    public function createAlphabeticalQueryBuilder()
    {
        return $this->createQueryBuilder('sub_family')
            ->orderBy('sub_family.name', 'ASC');
    }
}
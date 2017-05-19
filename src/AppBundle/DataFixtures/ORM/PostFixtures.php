<?php
/**
 * Created by PhpStorm.
 * User: olegyurievich
 * Date: 17.05.17
 * Time: 11:00
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Post;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;


class PostFixtures
{
/*    public function load(ObjectManager $manager)
    {
        Fixtures::load(
            __DIR__.'/fixtures.yml',
                $manager,
                [
                    'providers' => [$this]
                ]
            );
    }

    public function author()
    {
        $names = [
            'Ambrose Bierce',
            'Isaac Asimov',
            'Ray Bradbury',
            'William Gibson',
            'Philip Dick',
            'Stephen King',
            'Howard Phillips Lovecraft',
            'Robert Anson Heinlein',
            'Arthur C. Clarke',
            'H. G. Wells',
            'Станислав Лем',
            'Иван Ефремов',
            'Братья Стругацкие',
            'Иван Ефремов',
            'Евгений Замятин',
            'George Orwell',
            'Aldous Huxley'
            ];

        $key = array_rand($names);
        return $names[$key];
    }*/
}
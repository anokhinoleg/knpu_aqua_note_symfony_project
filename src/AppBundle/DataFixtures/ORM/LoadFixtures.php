<?php
/**
 * Created by PhpStorm.
 * User: olegyurievich
 * Date: 05.05.17
 * Time: 20:13
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Genus;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;

class LoadFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        Fixtures::load(
            __DIR__.'/fixtures.yml',
            $manager,
            [
                'providers' => [$this]
            ]
        );
    }

    public function genus()
    {
        $genera = [
            'Octopus',
            'Baleana',
            'Orcinus',
            'Hippocampus',
            'Asterias',
            'Amphiphrion',
            'Carcadon',
            'Aurelia',
            'Cucumaria',
            'Balistodes',
            'Paralethodias',
            'Chelonia',
            'Trihcecus',
            'Eumetopias',
        ];
        $key = array_rand($genera);
        return $genera[$key];
    }
}
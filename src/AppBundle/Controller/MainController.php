<?php
/**
 * Created by PhpStorm.
 * User: olegyurievich
 * Date: 25.04.17
 * Time: 17:26
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function homepageAction()
    {
        return $this->render('main/homepage.html.twig');
    }
}
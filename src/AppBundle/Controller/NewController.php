<?php
    namespace AppBundle\Controller;

    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Response;

    class NewController extends Controller
    {
        /**
         * @Route("/new/number")
         */
        public function someAction()
        {
            $number = mt_rand(0, 100);

            return $this->render('new/new.html.twig', [
                'number' => $number,
            ]);
        }


        /**
         * @Route(
         *     "articles/{_locale}/{year}/{slug}.{_format}",
         *     defaults={"_format": "html"},
         *     requirements={
         *      "_locale": "en|fr",
         *      "_format": "html|rss",
         *      "year": "\d+"
         *     }
         * )
         */
        public function lolAction($_locale, $year, $slug)
        {
            $resp = new Response("<h1>Good job</h1>");
            return $resp;
        }




    }
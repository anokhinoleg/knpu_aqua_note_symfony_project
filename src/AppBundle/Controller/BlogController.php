<?php
/**
 * Created by PhpStorm.
 * User: olegyurievich
 * Date: 27.04.17
 * Time: 16:45
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    /**
     * @Route("/symfony", name="home")
     */
    public function homeAction()
    {
        return $this->render(':main:home.html.twig');
    }

    /**
     * @Route("/symfony/blog", name="blog_list")
     */

    public function listAction()
    {

        $em = $this->getDoctrine()->getManager();
        /*dump($em->getRepository('AppBundle:Post'));die;*/

        $posts = $em->getRepository('AppBundle:Post')
            ->findAllPublishedOrderBySize();
        return $this->render(
            'blog/blog_list.html.twig',
            [
                /*'hrefs' => $hrefs,*/
                'posts' => $posts,
            ]
        );

    }

    /**
     * @Route("/blog/new")
     */
    public function newPostAction()
    {
        $date = new \DateTime();
        $post = new Post();
        $post->setTitle('Fahrenheit 451');
        $post->setAllusio('Tемпература воспламенения бумаги — 451 °F (233 °C)');
        $post->setContent('Hаучно-фантастический роман-антиутопия Рэя Брэдбери, изданный в 1953 году.');
        $post->setAuthor('Ray Bradbury');
        $post->setDate($date->format('Y-m-d H:i:s'));
        $em = $this->getDoctrine()->getManager();
        $em->persist($post);
        $em->flush();
        return $this->redirectToRoute('blog_list');
    }

    /**
     * @Route("/blog/update_{id}", name="update")
     */
    public function updateAction($id)
    {
        $date = new \DateTime();
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('AppBundle:Post')->find($id);
        $post->setName('Aristotle');
        $post->setArticle('Аристотель был первым мыслителем, создавшим всестороннюю систему философии.');
        $post->setDate($date->format('Y-m-d H:i:s'));
        $em->flush();
        return $this->redirectToRoute('blog_list');
    }

    /**
     * @Route("/blog/{slug}/{id}", name="blog_show")
     */
    public function showAction($slug, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('AppBundle:Post')
            ->findOneBy(['id'=> $id]);
        dump($post);
        if (!$post) {
            throw $this->createNotFoundException('Not found ' . $slug);
        }
        return $this->render(
            'blog/blog_post.html.twig',
            [
                /*'hrefs' => $hrefs,*/
                'post' => $post,
            ]
        );

    }
}
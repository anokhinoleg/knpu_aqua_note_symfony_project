<?php
/**
 * Created by PhpStorm.
 * User: olegyurievich
 * Date: 03.08.17
 * Time: 10:02
 */

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserFormType;
use AppBundle\Form\UserRegistrationForm;
use AppBundle\Security\LoginFormAuthenticator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/register", name="user_register")
     */
    public function registerAction(Request $request, LoginFormAuthenticator $loginFormAuthenticator)
    {
        $form = $this->createForm(UserRegistrationForm::class);
        $form->handleRequest($request);
        if ($form->isValid()) {
            /** $var User $user  */
            $user = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Welcome '. $user->getEmail());

            return $this->get('security.authentication.guard_handler')
                ->authenticateUserAndHandleSuccess(
                    $user,
                    $request,
                    $loginFormAuthenticator,
                    'main'
                );

        }
        return $this->render('user/register.html.twig', [
           'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/user/{id}", name="user_show")
     */
    public function showAction(User $user)
    {
        return $this->render("user/show.html.twig", [
            'user' => $user
        ]);
    }

    /**
     * @Route("user/{id}/edit", name="user_edit")
     */
    public function editAction(User $user, Request $request)
    {
        $form = $this->createForm(UserFormType::class, $user);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $this->addFlash('success', 'User Updated!');
            return $this->redirectToRoute('user_edit', [
                'id' => $user->getId()
            ]);
        }
        return $this->render('user/edit.html.twig', [
            'userForm' => $form->createView()
        ]);
    }
}
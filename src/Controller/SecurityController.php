<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('Security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
    
    /**
    * @Route("/register", name="app_register")
    */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder) {
        
        $em = $this->getDoctrine()->getManager();

        $userEntityForm= new \App\Entity\User();
        $userForm = $this->createForm(\App\Form\UserType::class, $userEntityForm );
        $userForm->handleRequest($request);
        if($userForm->isSubmitted() && $userForm->isValid()){
            
                
            
            $pswrd = $passwordEncoder->encodePassword($userEntityForm, $userEntityForm->getPassword());
$userEntityForm->setPassword($pswrd);

            $em->persist($userEntityForm);
            $em->flush();
                
            
        }
        return $this->render("Security/register.html.twig", array("userForm" => $userForm->createView()));
        
    }
}
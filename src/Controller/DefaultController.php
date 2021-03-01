<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class DefaultController extends AbstractController
{


    /**
     * @Route("/testTitleSimple", name="testTitleSimple")
     */
    public function testTitleSimpleAction()
    {


        return $this->render("Default/testTitleSimple.html.twig");

    }

    /**
     * @Route("/testTitleBinding/{id}", name="testTitleBinding")
     */
    public function testTitleBindingAction(\App\Entity\Moun $mounEntity)
    {


        return $this->render("Default/testTitleBinding.html.twig", array("mounEntity" => $mounEntity));

    }

    /**
     * @Route("/testTitBindingList", name="testTitBindingList")
     */
    public function testTitBindingListAction()
    {

        $em = $this->getDoctrine()->getManager();

        $mounRepository = $em->getRepository(
            \App\Entity\Moun::class);

        $mounEntities = $mounRepository->findAll();


        return $this->render("Default/testTitBindingList.html.twig", array("mounEntities" => $mounEntities));

    }

    /**
     * @Route("/testTitTextBindingList", name="testTitTextBindingList")
     */
    public function testTitTextBindingListAction()
    {

        $em = $this->getDoctrine()->getManager();

        $mounRepository = $em->getRepository(
            \App\Entity\Moun::class);

        $mounEntities = $mounRepository->findAll();


        return $this->render("Default/testTitTextBindingList.html.twig", array("mounEntities" => $mounEntities));

    }

    /**
     * @Route("/testTitTextBinding/{id}", name="testTitTextBinding")
     */
    public function testTitTextBindingAction(\App\Entity\Moun $mounEntity)
    {


        return $this->render("Default/testTitTextBinding.html.twig", array("mounEntity" => $mounEntity));

    }

    /**
     * @Route("/testForm", name="testForm")
     */
    public function testFormAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $mounEntityForm = new \App\Entity\Moun();
        $mounForm = $this->createForm(\App\Form\MounType::class, $mounEntityForm);
        $mounForm->handleRequest($request);
        if ($mounForm->isSubmitted() && $mounForm->isValid()) {
            if ($this->getUser() !== null) {
                if (\method_exists($mounEntityForm, "addUser")) {
                    $mounEntityForm->addUser($this->getUser());
                } else {
                    $mounEntityForm->setUser($this->getUser());
                }


                $em->persist($mounEntityForm);
                $em->flush();

            } else {
                throw $this->createAccessDeniedException();
            }
        }
        return $this->render("Default/testForm.html.twig", array("mounForm" => $mounForm->createView()));

    }

    /**
     * @Route("/testCss", name="testCss")
     */
    public function testCssAction()
    {


        return $this->render("Default/testCss.html.twig");

    }

    /**
     * @Route("/TestCssWithoutLayout", name="TestCssWithoutLayout")
     */
    public function TestCssWithoutLayoutAction()
    {


        return $this->render("Default/TestCssWithoutLayout.html.twig");

    }

    /**
     * @Route("/testSecurityRoleUser", name="testSecurityRoleUser")
     * @IsGranted("ROLE_USER")
     */
    public function testSecurityRoleUserAction()
    {


        return $this->render("Default/testSecurityRoleUser.html.twig");

    }

    /**
     * @Route("/testSecurityRoleAdmin", name="testSecurityRoleAdmin")
     * @IsGranted("ROLE_ADMIN")
     */
    public function testSecurityRoleAdminAction()
    {


        return $this->render("Default/testSecurityRoleAdmin.html.twig");

    }

    /**
     * @Route("/testSecurityChckUser/{id}", name="testSecurityChckUser")
     * @IsGranted("ROLE_USER")
     */
    public function testSecurityChckUserAction(\App\Entity\User $userEntity)
    {

        if ($userEntity === $this->getUser()) {

            return $this->render("Default/testSecurityChckUser.html.twig", array("userEntity" => $userEntity));
        } else {
            throw $this->createAccessDeniedException();
        }
    }

    /**
     * @Route("/testSecurityCustomRole", name="testSecurityCustomRole")
     * @IsGranted("PROMOT")
     */
    public function testSecurityCustomRoleAction()
    {


        return $this->render("Default/testSecurityCustomRole.html.twig");

    }

    /**
     * @Route("/testSecurityCheckUserWithRelation/{id}", name="testSecurityCheckUserWithRelation")
     */
    public function testSecurityCheckUserWithRelationAction(\App\Entity\Akseswa $akseswaEntity)
    {

        if ($akseswaEntity->getMoun()->getUser() === $this->getUser()) {

            return $this->render("Default/testSecurityCheckUserWithRelation.html.twig", array("akseswaEntity" => $akseswaEntity));
        } else {
            throw $this->createAccessDeniedException();
        }
    }

    /**
     * @Route("/testHiddenElemnt", name="testHiddenElemnt")
     */
    public function testHiddenElemntAction()
    {


        return $this->render("Default/testHiddenElemnt.html.twig");

    }

    /**
     * @Route("/testCSSGroupFromLayout1", name="testCSSGroupFromLayout1")
     */
    public function testCSSGroupFromLayout1Action()
    {


        return $this->render("Default/testCSSGroupFromLayout1.html.twig");

    }

    /**
     * @Route("/testCSSGroupFromLayout2", name="testCSSGroupFromLayout2")
     */
    public function testCSSGroupFromLayout2Action()
    {


        return $this->render("Default/testCSSGroupFromLayout2.html.twig");

    }

    /**
     * @Route("/simpleForm", name="simpleForm")
     */
    public function simpleFormAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $simpleFormEntityForm = new \App\Entity\SimpleForm();
        $simpleFormForm = $this->createForm(\App\Form\SimpleFormType::class, $simpleFormEntityForm);
        $simpleFormForm->handleRequest($request);
        if ($simpleFormForm->isSubmitted() && $simpleFormForm->isValid()) {


            $em->persist($simpleFormEntityForm);
            $em->flush();


        }
        return $this->render("Default/simpleForm.html.twig", array("simpleFormForm" => $simpleFormForm->createView()));

    }

    /**
     * @Route("/", name="index")
     */
    public function indexAction()
    {


        return $this->render("Default/index.html.twig");

    }
}
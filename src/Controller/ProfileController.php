<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UpdateUserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProfileController
 * @package App\Controller
 * @IsGranted("ROLE_USER")
 */

class ProfileController extends AbstractController
{


    /**
     * @Route("/profile/cv/{id}", name = "cv_show")
     */

    public function showCv(User $user)
    {
       return $this->render('profile/cv.html.twig', [
           'user' => $user,
       ]);
    }



    /**
     * @Route("/{id}/edit", name="cv_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UpdateUserType::class, $user);
        $form->handleRequest($request);
        $user=$this->getUser();

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Article Created! Knowledge is power!');


            return $this->redirectToRoute('cv_show',['id' => $user->getId()]);
        }

        return $this->render('profile/edit.html.twig', [
            'user' => $user,
            'registrationForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/profile/pdf", name="cv_pdf")
     */

    public function pdf()
    {

    }
}

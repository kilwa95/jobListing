<?php

namespace App\Controller;

use App\Entity\Experience;
use App\Entity\User;
use App\Form\ExperienceType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/experience")
 * @IsGranted("ROLE_CANDIDAT")
 */
class ExperienceController extends AbstractController
{


    /**
     * @Route("/new", name="experience_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $experience = new Experience();
        $user =$this->getUser();
        $experience->setUser($user);
        $form = $this->createForm(ExperienceType::class, $experience);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($experience);
            $entityManager->flush();

            return $this->redirectToRoute('experience_show',['id' => $user->getId()]);
        }

        return $this->render('experience/new.html.twig', [
            'experience' => $experience,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="experience_show")
     */
    public function show(User $user)
    {
        return $this->render('experience/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="experience_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Experience $experience): Response
    {
        $form = $this->createForm(ExperienceType::class, $experience);
        $form->handleRequest($request);
        $user=$this->getUser();

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('experience_show',['id' => $user->getId()]);
        }

        return $this->render('experience/edit.html.twig', [
            'experience' => $experience,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="experience_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Experience $experience): Response
    {
        $user=$this->getUser();
        if ($this->isCsrfTokenValid('delete'.$experience->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($experience);
            $entityManager->flush();
        }

        return $this->redirectToRoute('experience_show',['id' => $user->getId()]);
    }
}

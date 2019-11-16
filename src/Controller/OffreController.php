<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Form\OffreType;
use App\Service\UploaderHelper;
use Doctrine\ORM\EntityManagerInterface;
use Gedmo\Sluggable\Util\Urlizer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class OffreController
 * @package App\Controller
 * @IsGranted("ROLE_RECRETEUR")
 */

class OffreController extends AbstractController
{
    /**
     * @Route("/offre/add", name="offre_add")
     */
    public function add(EntityManagerInterface $entityManager,Request $request, UploaderHelper $uploaderHelper)
    {
        $offre = new Offre();
        $user =$this->getUser();
        $offre->setUser($user);
        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            /** @var UploadedFile $uploadedFile */
             $uploadedFile = $form['image']->getData();

             if ($uploadedFile) {
                $newFilename = $uploaderHelper->uploadOffreImage($uploadedFile);
                $offre->setImage($newFilename);

            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($offre);
            $entityManager->flush();

            return $this->redirectToRoute('app_homepage');
        }

        return $this->render('offre/add.html.twig', [
            'offre' => $offre,
            'form' => $form->createView(),
        ]);

    }


    /**
     * @Route("/offre/update", name="offre_update")
     */
    public function update()
    {
        return $this->render('offre/update.html.twig', [
            'controller_name' => 'OffreController',
        ]);
    }

    /**
     * @Route("/offre/delete", name="offre_delete")
     */
    public function delete()
    {
        return $this->render('offre/delete.html.twig', [
            'controller_name' => 'OffreController',
        ]);
    }







}

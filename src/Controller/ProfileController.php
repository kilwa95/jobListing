<?php

namespace App\Controller;



use App\Entity\Location;
use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}

<?php

namespace App\Controller;



use App\Repository\UserRepository;
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
     * @Route("/profile", name="user_profile")
     */

    public function index()
    {

        return $this->render('profile/index.html.twig');

    }
}

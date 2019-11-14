<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\OffreRepository;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function index(OffreRepository $repository,PaginatorInterface $paginator ,Request $request,CategoryRepository $categoryRepository)
    {

        $queryBuilder = $repository->findAll();
        $pagination = $paginator->paginate(
            $queryBuilder,
            $request->query->getInt('page', 1),
            6
        );

        return $this->render('index/index.html.twig', [
            'offres' => $pagination,
        ]);
    }




    /**
     * @Route("/show/{id}" , name="offre_show")
     */

    public function show($id,OffreRepository $repository){

        $offre= $repository->find($id);


        
        return $this->render('index/show.html.twig',[
            'offre' => $offre,
        ]);

    }


}

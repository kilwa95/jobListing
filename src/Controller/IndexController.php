<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\OffreRepository;
use App\Repository\TypeEmploieRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function index(OffreRepository $repository,PaginatorInterface $paginator ,Request $request,CategoryRepository $categoryRepository,TypeEmploieRepository $typeEmploieRepository)
    {

        $categories = $categoryRepository->findAll();
        $emploi = $typeEmploieRepository->findAll();
        $queryBuilder = $repository->findAll();

        $pagination = $paginator->paginate(
            $queryBuilder,
            $request->query->getInt('page', 1),
            3
        );

        return $this->render('index/index.html.twig', [
            'offres' => $pagination,
            'categories' => $categories,
            'emolois' => $emploi,
        ]);
    }


    /**
     * @Route("/category/", name="category_fiche")

     */

    public function ficheCategorie(CategoryRepository $categoryRepository)
    {
        $category = $categoryRepository->findBycategory();
        dd($category);

       return $this->render("index/ficheCategory.html.twig");
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

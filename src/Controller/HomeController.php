<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\OffreRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(OffreRepository $offreRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'offres' =>  $offreRepository->findAll(),
        ]);
    }
    public function listOffres(OffreRepository $offreRepository): Response
    {
        $array = [
            "foo" => "bar",
            "bar" => "foo",
        ];
        $data = $offreRepository->findAll() ;
        return $this->json($array);
    }

    /**
     * @Route("/categories", name="catgories_list_api", methods={"GET"})
     */
    public function listCatgories(CategoryRepository $categoryRepository): Response
    {
        $array = [
            "foo" => "bar",
            "bar" => "foo",
        ];

        $data = $categoryRepository->findAll() ;
        return $this->json($array, 200, ["Content-Type" => "application/json"]);
    }
}

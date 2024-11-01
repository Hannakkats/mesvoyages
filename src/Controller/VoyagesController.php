<?php

namespace App\Controller;

use App\Repository\VisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description of AccueilController
 *
 * @author hanna
 */
class VoyagesController extends AbstractController {

    #[Route('/voyages', name: 'voyages')]
    public function index(): Response {
        $visites = $this->repository->findAllOrderBy('datecreation', 'DESC');
        return $this->render("pages/voyages.html.twig",[
            'visites' =>$visites        
        ]);
    }
    #[Route('/voyages/tri/{champ}/{ordre}', name: 'voyages.sort')]
    public function sort($champ, $ordre): Response {
        $visites = $this->repository->findAllOrderBy($champ, $ordre);
        return $this->render("pages/voyages.html.twig",[
            'visites' =>$visites        
        ]);
    }
    #[Route('/voyages/tri/{champ}/{ordre}', name: 'voyages.entre')]
    public function entre($champ, $ordre): Response {
        $visites = $this->repository->findAllOrderBy($champ, $ordre);
        return $this->render("pages/voyages.html.twig",[
            'visites' =>$visites        
        ]);
    }
    #[Route('/voyages/tri/{champ}/{ordre}', name: 'voyages.venu')]
    public function venu($champ, $ordre): Response {
        $visites = $this->repository->findAllOrderBy($champ, $ordre);
        return $this->render("pages/voyages.html.twig",[
            'visites' =>$visites        
        ]);
    }
    #[Route('/voyages/tri/{champ}/{ordre}', name: 'voyages.arrive')]
    public function arrive($champ, $ordre): Response {
        $visites = $this->repository->findAllOrderBy($champ, $ordre);
        return $this->render("pages/voyages.html.twig",[
            'visites' =>$visites        
        ]);
    }

    /**
     * 
     * @var VisiteRepository 
     */
    private $repository;

    /**
     * 
     * @param VisiteRepository $repository 
     */
    public function __construct(VisiteRepository $repository) {
        $this->repository = $repository;
    }

}
<?php


namespace App\Controller\admin;

use App\Entity\Environnement;
use App\Repository\EnvironnementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\httpFoundation\Response;

/**
 * Description of AdminEnvironnementController
 *
 * @author hanna
 */
class AdminEnvironnementController extends AbstractController {
    #[Route('/admin/environnements', name: 'admin.environnements')]
    public function index(): Response {
        $environnements = $this->repository->findALL();
        return $this->render("admin/admin.environnements.html.twig", [
            'environnements' =>$environnements
        ]);
    }
    
    #[Route('/admin/environnement/suppr/{id}', name: 'admin.environnement.suppr')]
    public function suppr(int $id): Response{
        $environnement = $this->repository->find($id);
        $this->repository->remove($environnement);
        return $this->redirectToRoute('admin.environnements');
    }

    #[Route('/admin/environnement/ajout', name: 'admin.environnement.ajout')]
    public function ajout(Request $request): Response{
        $nomEnvironnement = $request->get("nom");
        $environnement = new Environnement();
        $environnement->setNom($nomEnvironnement);
        $this->repository->add($environnement);
        return $this->redirectToRoute('admin.environnements');
    }


/**
     * 
     * @var EnvironnementRepository 
     */
    private $repository;

    /**
     * 
     * @param VisiteRepository $repository 
     */
    public function __construct(EnvironnementRepository $repository) {
        $this->repository = $repository;
    }
}
    
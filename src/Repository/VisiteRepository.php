<?php

namespace App\Repository;

use App\Entity\Visite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Visite>
 */
class VisiteRepository extends ServiceEntityRepository {

    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Visite::class);
    }

    /**
     * Retourne toutes les visites triées sur un champ
     * @param type $champ
     * @param type $ordre
     * return Visite []
     */
    public function findALLOrderBy($champ, $ordre): array {
        return $this->createQueryBuilder('v')
                        ->orderBy('v.' . $champ, $ordre)
                        ->getQuery()
                        ->getResult();
    }
/**
 * Enregistrement dont un champ est egal à une valeure
 * ou tous les enregistrements si la valeur est vide
 * @param type $champ
 * @param type $valeur
 * @return Visite []
 */
    public function findByEqualValue($champ, $valeur): array {
        if ($valeur=="") {
            return $this->createQueryBuilder('v') //alias de la table
                            ->orderBy('v.'.$champ, 'ASC')
                            ->getQuery()
                            ->getResult();
        }else{
            return $this->createQueryBuilder('v') //alias de la table
                            ->where('v.' .$champ.'=:valeur')
                            ->setParameter('valeur', $valeur)
                            ->orderBy('v.datecreation', 'DESC')
                            ->getQuery()
                            ->getResult();
        }
    }



/**
 * supprime une visite
 * @param Visite $Visite
 * @return void
 */
public function remove(Visite $visite): void
{
    $this->getEntityManager()->remove($visite);
    $this->getEntityManager()->flush();
}    
 

/**
 * Ajoute ou modifie une visite
 * @param Visite $visite
 * @return void
 */
public function add(Visite $visite): void
{
    $this->getEntityManager()->persist($visite);
    $this->getEntityManager()->flush();
}    
}    
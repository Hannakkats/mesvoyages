<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symphony\Component\Routing\Annotation\Route;
/**
 * Description of AccueilController
 *
 * @author hanna
 */
class AccueilController {
    
      #[Route('/', name: 'accueil')]
      public function index (): Response {
          return new Response('Hello world !');//put your code here
      }

}
